<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $timeout = 5;
    public $id;
    public $name;
    public $email;
    public $idcode;
    public function __construct($id, $name, $email, $idcode)
    {
        //
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->idcode = $idcode;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //App\Jobs\SendMailJop
        Mail::to($this->email )->send(new \App\Mail\Email($this->id, $this->name, $this->idcode));
    }
}
