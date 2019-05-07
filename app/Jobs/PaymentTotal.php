<?php

namespace App\Jobs;

use App\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PaymentTotal implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $payment;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Payment $payment)
    {

        $this->payment = $payment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $paymentsAmount = Payment::where('payment_id', '<', $this->payment->payment_id)->sum('amount');
        \Log::info('Payment to of payments_id less than ' . $this->payment->payment_id. ' 12312312   '. $paymentsAmount . ' USD');
    }
}
