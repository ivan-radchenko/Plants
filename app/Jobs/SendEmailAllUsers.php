<?php

namespace App\Jobs;

use App\Mail\MailFromAdmin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailAllUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $text;
    public $email;
    public function __construct($text,$email)
    {
        $this->text = $text;
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \Mail::to($this->email)->send(new MailFromAdmin($this->text));
    }
}
