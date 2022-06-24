<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;


class PaymentController extends Controller
{

    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->with(['error'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $payment = Paystack::getPaymentData();
        if($payment['data']['status'] == 'success')
        {
            $paymentDb = new Payment();
            $amount = $payment['data']['amount'];
            
            $user_id = $payment['data']['metadata']['user_id'];
            $paymentDb->user_id = $user_id;
            $paymentDb->amount = substr($amount,0,-2);
            $paymentDb->trans_id = $payment['data']['reference'];
            $paymentDb->trans_date = $payment['data']['transaction_date'];
            $paymentDb->status = $payment['data']['status'];
            $transaction = $paymentDb->save();

            User::where('id', $user_id)->update(['role'=>'paid_user']);
            return Redirect::route('user')->with(['success'=>'Thank you for upgrading to our full package, be ready to enjoy unlimited services']);
        }else{
            return Redirect::back()->with(['error'=>'Transaction failed, Try again. Contact us if problem persist >', 'type'=>'error']);
        }
        
    }
    
}
