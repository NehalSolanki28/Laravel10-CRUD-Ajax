<?php

namespace App\Jobs;

use App\Mail\WelcomeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $userEmail,$userName;

    public function __construct($userEmail,$userName)
    {
        $this->userEmail = $userEmail;
        $this->userName = $userName;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // dd($this->userEmail);
        $msg = new WelcomeMail($this->userName);
        Mail::to($this->userEmail)->send($msg);
        // \Log::info("Job Created..." . $this->userEmail);
    }
}
