<?php

namespace App\Jobs;

use App\Mail\BroadcastEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subscribers;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subscribers)
    {
        $this->subscribers = $subscribers;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mail = new BroadcastEmail();
        foreach ($this->subscribers as $subscriber) {
            Mail::to($subscriber)->send($mail);
        }
    }
}
