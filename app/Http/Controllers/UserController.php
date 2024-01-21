<?php

namespace App\Http\Controllers;

use App\User;
use App\Reservepage;
use App\Doreserve;
use App\Calendar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'page_address' => ['required', 'string', 'min:3', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'store_name' => ['required', 'string', 'max:255'],
            'industry' => ['required', 'string', 'max:255'],
        ]);
    }
    
    public function mypage()
     {
         $user = Auth::user();
 
         return view('users.mypage', compact('user'));
     }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();
 
         return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'store_name' => ['required', 'string', 'max:255'],
            'industry' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect('/users/mypage/edit')
            ->withErrors($validator)
            ->withInput();
          } else {
        
        $user = Auth::user();
 
         $user->phone = $request->input('phone') ? $request->input('phone') : $user->phone;
         $user->name = $request->input('name') ? $request->input('name') : $user->name;
         $user->store_name = $request->input('store_name') ? $request->input('store_name') : $user->store_name;
         $user->industry = $request->input('industry') ? $request->input('industry') : $user->industry;
         
         $user->update();
 
         return redirect()->route('mypage');
          }
    }
    

    public function edit_password()
     {
         $user = Auth::user();
         return view('users.edit_password', compact('user'));
     }

    public function membership()
     {
         $user = Auth::user();
         
         return view('users.membership', compact('user'))->with( [
            'intent' => auth()->user()->createSetupIntent()
        ]);
     }
     
    public function paid_membership(Request $request)
     {
        $request->user()->newSubscription(
            'default', 'price_1OL14lLtSGE4625lf5ONKr2X'
        )->quantity(0)->create($request->paymentMethodId);
        
        // 有料会員への切り替え
        $user = Auth::user();
        $user->member_flag = 1;
        $user->update();
    
        return redirect('users/mypage/membership');
    }
    
    public function edit_credit()
     {
         $user = Auth::user();
         return view('users.edit_credit', compact('user'))->with( [
            'intent' => auth()->user()->createSetupIntent()
        ]);
     }
     
    public function update_credit(Request $request)
     {
        $user = Auth::user();
        if ($user->hasPaymentMethod()) {
          $user->updateDefaultPaymentMethod($request->paymentMethodId);
        } else {
          $user->addPaymentMethod($request->paymentMethodId);
        }
        return redirect()->route('mypage.membership'); 

     }
     
     public function membership_cancel(Request $request)
     {
        $user = Auth::user();
        $user->subscription('default', 'price_1OL14lLtSGE4625lf5ONKr2X')->cancel();
            
        $user->member_flag = 0;
        $user->update();
        
        $reservepages = Reservepage::where('user_id', $user->id)->get();
        foreach ($reservepages as $reservepage) {
            $reservepage->release = 1;
            $reservepage->update();
        }
        
        return redirect()->route('mypage.membership'); 

     }


      public function question_admin()
     {
         $user = Auth::user();
         return view('question_admin.index', compact('user'));
     }


    public function update_password(Request $request)
     {
         $user = Auth::user();
 
         if ($request->input('password') == $request->input('password_confirmation')) {
             $user->password = bcrypt($request->input('password'));
             $user->update();
         } else {
             return redirect()->route('mypage.edit_password');
         }
 
         return redirect()->route('mypage');
     }
     
     public function destroy(Request $request)
    {
        $user = Auth::user();
        
        // Reservepageの取得と削除
        $reservepages = Reservepage::where('user_id', $user->id)->get();
        foreach ($reservepages as $reservepage) {
            
            // Calendarの取得と削除
            $calendars = Calendar::where('reservepage_id', $reservepage->id)->get();
            foreach ($calendars as $calendar) {
                // Doreserveの取得と削除
                $doreserves = Doreserve::where('calendar_id', $calendar->id)->get();
                foreach ($doreserves as $doreserve) {
                    $doreserve->delete();
                }
                $calendar->delete();
            }
            $reservepage->delete();
        }

        if (!$user->subscription('default')->cancelled()) {
            $user->subscription('default', 'price_1OL14lLtSGE4625lf5ONKr2X')->cancel();
        }
        
        $user->member_flag =  0;
        
        $user->deleted_flag = true;

 
        $user->update();
 
        Auth::logout();
 
        return redirect('/');
    }
    
    public function __construct()
{
    $this->middleware('auth');
}

}
