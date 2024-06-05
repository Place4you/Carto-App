<?php

namespace App\Jobs;

use App\Mail\NewEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendNewEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $incoming;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($incoming)
    {
        $this->incoming= $incoming;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->incoming['toSend'])->send(new NewEmail(
            ['username'=>$this->incoming['username'],
            'title' =>$this->incoming['title']]
        ));

    }
}
