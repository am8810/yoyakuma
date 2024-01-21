<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify' => true]);
  

Route::get('/', function () {
    return view('top');
});
  // ヨヤクマについて（メインサイト）
  Route::get('/about', 'MainController@about')->name('about');

  // 機能について（メインサイト）
  Route::get('/performance', 'MainController@performance')->name('performance');
  
  // 予約ページの作成（メインサイト）
  Route::get('/performance/create', 'MainController@create')->name('create');
  
  // 予約ページの編集（メインサイト）
  Route::get('/performance/edit', 'MainController@edit')->name('edit');
  
  // 作成される予約ページ（メインサイト）
  Route::get('/performance/createpage', 'MainController@createpage')->name('createpage');
  
  // 予約ページの運用（メインサイト）
  Route::get('/performance/operation', 'MainController@operation')->name('operation');
  
  // 料金（メインサイト）
  Route::get('/price', 'MainController@price')->name('price');

  // よくある質問（メインサイト）
  Route::get('/question', 'MainController@question')->name('question');
  
  // お問い合わせ入力（メインサイト）
  Route::get('/contact', 'ContactController@index')->name('contact.index');
  //送信内容確認
  Route::post('/contact/confirm', 'ContactController@confirm')->name('contact.confirm');
  //送信完了
  Route::post('/contact/thanks', 'ContactController@send')->name('contact.send');
  
  // 特定商取引法に基づく表示（メインサイト）
  Route::get('/legal_notice', 'MainController@legal_notice')->name('legal_notice');
  
  // プライバシーポリシー（メインサイト）
  Route::get('/privacy', 'MainController@privacy')->name('privacy');
  
  // 利用規約（メインサイト）
  Route::get('/terms', 'MainController@terms')->name('terms');


  
  // トップ（会員ページ）
  Route::get('/home', 'HomeController@index')->middleware(['auth', 'verified'])->name('home');
  Route::post('/home/get_homecalendar', 'HomeController@getHomeCalendar')->middleware(['auth', 'verified']); // トップページカレンダーを表示する為の記述（Ajax）
  Route::post('/home/delete_doreserve', 'HomeController@deleteDoreserve')->middleware(['auth', 'verified']); // 予約キャンセルの為の記述（Ajax）
  Route::post('/home/change_doreserve', 'HomeController@changeDoreserve')->middleware(['auth', 'verified']); // 予約人数変更の為の記述（Ajax）

  
  // 基本情報（会員ページ）
  Route::get('users/mypage', 'UserController@mypage')->middleware(['auth'])->name('mypage');
  Route::get('users/mypage/edit', 'UserController@edit')->middleware(['auth'])->name('mypage.edit');
  Route::get('users/mypage/address/edit', 'UserController@edit_address')->middleware(['auth'])->name('mypage.edit_address');
  Route::put('users/mypage', 'UserController@update')->middleware(['auth'])->name('mypage.update');
  Route::get('users/mypage/password/edit', 'UserController@edit_password')->middleware(['auth'])->name('mypage.edit_password');
  Route::put('users/mypage/password', 'UserController@update_password')->middleware(['auth'])->name('mypage.update_password');
  Route::delete('users/mypage/delete', 'UserController@destroy')->middleware(['auth'])->name('mypage.destroy');
  // 有料会員登録（会員ページ）
  Route::get('users/mypage/membership', 'UserController@membership')->middleware(['auth'])->name('mypage.membership');
  
  use Illuminate\Http\Request;
  Route::post('/user/subscribe', 'UserController@paid_membership')->middleware(['auth', 'verified'])->name('subscribe.post');
  
  // 有料会員登録の編集（会員ページ）
  Route::get('users/mypage/edit_credit', 'UserController@edit_credit')->middleware(['auth', 'verified'])->name('mypage.edit_credit');
  Route::post('users/mypage/update_credit', 'UserController@update_credit')->middleware(['auth', 'verified'])->name('mypage.update_credit');
  Route::post('users/mypage/membership_cancel', 'UserController@membership_cancel')->middleware(['auth', 'verified'])->name('mypage.membership_cancel');

  // Laravel Cashierの為のルート
  // Route::get('users/ajax/subscription/status', 'User\Ajax\SubscriptionController@status');
  // Route::post('users/ajax/subscription/subscribe', 'User\Ajax\SubscriptionController@subscribe');
  // Route::post('users/ajax/subscription/cancel', 'User\Ajax\SubscriptionController@cancel');
  // Route::post('users/ajax/subscription/resume', 'User\Ajax\SubscriptionController@resume');
  // Route::post('users/ajax/subscription/change_plan', 'User\Ajax\SubscriptionController@change_plan');
  // Route::post('users/ajax/subscription/update_card', 'User\Ajax\SubscriptionController@update_card');
  
  // よくある質問（会員ページ）
  Route::get('/question_admin', 'UserController@question_admin')->middleware(['auth'])->name('question_admin');

  // 予約ページ作成・編集（会員ページ）
  Route::post('/calendar', 'ReservepageController@createCalendarSchedule')->middleware(['auth', 'verified']); // カレンダーを作成・削除
  Route::post('/drop_calendar', 'ReservepageController@dropCalendarSchedule')->middleware(['auth', 'verified']); // カレンダーを全て削除（作成画面）
  Route::post('/edit_calendar', 'ReservepageController@editCalendarSchedule')->middleware(['auth', 'verified']); // カレンダー編集の為のAjax等記述
  Route::get('/reservepages/{reservepage}/edit_datetime', 'ReservepageController@edit_datetime')->middleware(['auth', 'verified'])->name('reservepages.edit_datetime'); // カレンダー編集画面
  Route::post('/update_calendar', 'ReservepageController@update_datetime')->middleware(['auth', 'verified']); // カレンダーを後から編集
  Route::post('/edit_drop_calendar', 'ReservepageController@edit_dropCalendarSchedule')->middleware(['auth', 'verified']); // カレンダーを全て削除（編集画面）
  Route::get('/reservepages/step1', 'ReservepageController@createStep1')->middleware(['auth', 'verified'])->name('reservepages.create_step1'); // 予約ページ作成 1ページ目（基本情報）
  Route::post('/reservepages/saveStep1', 'ReservepageController@saveStep1')->middleware(['auth', 'verified'])->name('reservepages.save_step1'); // 予約ページ作成 1ページ目（基本情報）の保存
  Route::get('/reservepages/step2', 'ReservepageController@createStep2')->middleware(['auth', 'verified'])->name('reservepages.create_step2'); // 予約ページ作成 2ページ目（日時・定員数）
  Route::post('/reservepages/saveStep2', 'ReservepageController@saveStep2')->middleware(['auth', 'verified'])->name('reservepages.save_step2'); // 予約ページ作成 2ページ目（日時・定員数）の保存
  Route::get('/reservepages/step3', 'ReservepageController@createStep3')->middleware(['auth', 'verified'])->name('reservepages.create_step3'); // 予約ページ作成 3ページ目（完了）
  Route::resource('reservepages', 'ReservepageController')->middleware('auth', 'verified');
  
  
  // 顧客一覧（会員ページ）
  Route::get('/customerlist', 'CustomerController@customerlist')->middleware(['auth', 'verified'])->name('customerlist');
  
  // zoomサポート（会員ページ）
  Route::get('/support', 'SupportController@index')->middleware(['auth'])->name('support.index');
  //送信内容確認
  Route::post('/support/confirm', 'SupportController@confirm')->middleware(['auth'])->name('support.confirm');
  //送信完了
  Route::post('/support/thanks', 'SupportController@send')->middleware(['auth'])->name('support.send');
  
  // 予約ページ
  Route::get('/reserve/{page_address}', 'DoreserveController@index')->name('reserve');
  Route::get('/reserve/{page_address}/{reservepage_id}', 'DoreserveController@show')->name('reserve');
  Route::post('/reserve/{page_address}/{reservepage_id}/date_time', 'DoreserveController@date_time')->name('reserve');
  Route::post('/reserve/{page_address}/{reservepage_id}/date_time/customer', 'DoreserveController@customer')->name('reserve');
  Route::post('/reserve/{page_address}/{reservepage_id}/date_time/customer/confirmation', 'DoreserveController@confirmation')->name('reserve.confirmation');
  Route::post('/reserve/{page_address}/{reservepage_id}/date_time/customer/confirmation/completion', 'DoreserveController@completion')->name('reserve');
  Route::post('/reserve/{page_address}/{reservepage_id}/calendar/create_time', 'DoreserveController@createTime');
  
  // 利用規約（予約ページ）
  Route::get('/terms_reserve', 'DoreserveController@terms_reserve')->name('terms_reserve');
  
  // プライバシーポリシー（予約ページ）
  Route::get('/privacy_reserve', 'DoreserveController@privacy_reserve')->name('privacy_reserve');
  
  // ダッシュボード
  Route::get('/dashboard', 'DashboardController@index')->middleware('auth:admins');
  Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('login', 'Dashboard\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Dashboard\Auth\LoginController@login')->name('login');
    Route::resource('users', 'Dashboard\UserController')->middleware('auth:admins');
  });
  
  Route::post('stripe/webhook','StripeController@handleWebhook');

  
