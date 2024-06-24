<?php

namespace App\Console\Commands;

use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DiscountCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:discount-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentTime = Carbon::parse('now')->format('Y-m-d');
        $discount = Discount::all();
        // $discount = Discount::where('expiry_date', '2024-06-21')->update(['status' => 'inactive']);

        foreach ($discount as $element) {
            if ($element->expiry_date ==  $currentTime) {
                $element->status = 'inactive';
                $element->save();
                Log::info('Status Updated ...  Product Expired .....');
            }
        }
    }
}
