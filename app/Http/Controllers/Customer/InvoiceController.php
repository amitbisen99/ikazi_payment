<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;


use App\User;
use App\Models\Invoice;
use App\Models\Job;
use App\Models\Payment;
//use App\CustomClass\PayPal;

class InvoiceController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Pay invoice.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pay(Request $request)
    {
        $invoice_id = $request->invoiceId ;
        $invoice = \App\Models\Invoice::find($invoice_id);
        $invoice->invoice_status_id = 3;
        $invoice->save();

        $job = \App\Models\Job::find($invoice->job_id);
        $job->job_status_id = 3;
        $job->save();

        $commission = \App\Models\Invoice::
            select('inquirys.customer_id','inquiry_providers.provider_id','categories.commission_percent')
            ->join('jobs','jobs.id','=','invoices.job_id')
            ->join('inquiry_providers','inquiry_providers.id','=','jobs.inquiry_provider_id')
            ->join('inquirys','inquirys.id','=','inquiry_providers.inquiry_id')
            ->join('categories','categories.id','=','inquirys.category_id')
            ->where('invoices.id',$invoice->id)
            ->first(); 
            
        $commissionPercent = (10 * 100) / $invoice->total;
        $commissionAmount = 10 ;
        if($invoice->total > 500)
        {
            $commissionAmount = ( $invoice->total * $commission->commission_percent ) / 100 ;
            $commissionPercent = $commission->commission_percent;
        }
        $providerAmount =  $invoice->total -  $commissionAmount ;

        $payment = \App\Models\Payment::create([
            'invoice_id' => $invoice->id ,
            'payment_mode_id' => 2,
            'amount' => $invoice->total,
            'payment_ref' => '',
            'provider_amount' => $providerAmount ,
            'provider_amount_ref' => '',
            'commission_percent' =>  $commissionPercent ,
            'commission_amount' =>  $commissionAmount ,
            'commission_ref' => '',
            'commission_status_id' => 0,
            'payment_date' => date("Y-m-d"),
        ]);  
        $user = \App\User::find($commission->customer_id);
        \App\Models\Notification::create(
            ['from_id' => $user->id ,'to_id' => $commission->provider_id, 
                'notification'=> $user->name." paid INV no. ".$invoice->id." By Cash", 
                'notification_date'=>date("Y-m-d"),
                'redirect_to'=>'provider/invoice'
            ]
        );    
        return $this->successResponse('success'); 
    }
}
