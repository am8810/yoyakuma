<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends \Laravel\Cashier\Http\Controllers\WebhookController
{
    public function handleInvoicePaymentFailed($payload)
    {
        $billable = $this->getBillable(
            $payload['data']['object']['customer']
        );
    
        if ($billable) {
            $user = User::find($billable);
            $user->member_flag = 0;
            $user->update();
        
            $reservepages = Reservepage::where('user_id', $user->id)->get();
            foreach ($reservepages as $reservepage) {
                $reservepage->release = 1;
                $reservepage->update();
            }
            $user->subscription('default', 'price_1OL14lLtSGE4625lf5ONKr2X')->cancel();
        }
    
        return new Response('Webhook Handled', 200);
    }
}