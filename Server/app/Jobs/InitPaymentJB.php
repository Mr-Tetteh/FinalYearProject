<?php

namespace App\Jobs;

use App\Models\Payment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class InitPaymentJB implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $hospital)
    {
        //
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
       try {
            $init = paystackInit($this->hospital->hospital_email, $this->hospital->number_of_monthly_subscription * 100);

            Payment::create([
                'hospital_id' => $this->hospital->id,
                'amount' => $this->hospital->number_of_monthly_subscription * 100,
                'status' => 'pending',
                'payment_type' => 'monthly_subscription',
                'payment_method' => 'paystack',
                'payment_url' => $init['data']['authorization_url'],
                'reference' => $init['data']['reference'],
            ]);
        } catch (\Exception $e) {
            // Handle the exception (log, rethrow, etc.)
            \Log::error('InitPaymentJB failed: ' . $e->getMessage());
        }

    }
}
