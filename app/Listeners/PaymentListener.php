<?php

namespace App\Listeners;

use App\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentListener implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * The name of the connection the job should be sent to.
     *
     * @var string|null
     */
    public $connection = 'database';

    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public $queue = 'listeners';

    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public $delay = '5';

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $id = $event->payment->payment_id;
        $totalAmount = Payment::where('payment_id', '<=', $id)->sum('amount');
        \Log::info('==============='. strtoupper($event->type). '==================');
        \Log::info('Payment to of payments_id less than ' . $id. ' is: '. $totalAmount . ' USD');
    }
}
