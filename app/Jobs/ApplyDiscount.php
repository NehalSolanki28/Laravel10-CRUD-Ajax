<?php

namespace App\Jobs;

use App\Models\Discount;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ApplyDiscount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     */
    public $discount1, $discount2, $discount3;

    public function __construct($discount1, $discount2, $discount3)
    {
        $this->discount1 = $discount1;
        $this->discount2 = $discount2;
        $this->discount3 = $discount3;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // \Log::info("dasd".$this->discount1['productId']);
        $discountArr = 
        [
            [
                'product_id' => $this->discount1['product_id'],
                'code' => $this->discount1['code'],
                'percentage' => $this->discount1['percentage'],
                'min_amount' => $this->discount1['min_amount'],
                'expiry_date' => $this->discount1['expiry_date'],
                'status' => 'active',
            ],
            [
                'product_id' => $this->discount2['product_id'],
                'code' => $this->discount2['code'],
                'percentage' => $this->discount2['percentage'],
                'min_amount' => $this->discount2['min_amount'],
                'expiry_date' => $this->discount2['expiry_date'],
                'status' => 'active',
            ],
            [
                'product_id' => $this->discount3['product_id'],
                'code' => $this->discount3['code'],
                'percentage' => $this->discount3['percentage'],
                'min_amount' => $this->discount3['min_amount'],
                'expiry_date' => $this->discount3['expiry_date'],
                'status' => 'active',
            ],
        ];

        foreach ($discountArr as $ele) {
            Discount::create($ele);
        }
    }
}
