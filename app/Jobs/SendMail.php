<?php

namespace App\Jobs;

use App\Mail\MailDoanhNghiep;
use App\Mail\MailHeThong;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $modeldn;
    protected $contendn;
    protected $modeldv;
    protected $contentht;

    public function __construct($modeldn,$contentdn,$modeldv,$contentht)
    {
        $this->modeldn = $modeldn;
        $this->contentht = $contentht;
        $this->modeldv = $modeldv;
        $this->contentdn = $contentdn;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emaildn = new MailDoanhNghiep($this->modeldn,$this->contentdn);
        if(isset($this->modeldn) && $this->modeldn->email != '' && emailValid($this->modeldn->email))
            Mail::to($this->modeldn->email)->send($emaildn);
        $emailht = new MailHeThong($this->contentht,$this->modeldv);
        if(isset($this->modeldv) && $this->modeldv->emailql != '' && emailValid($this->modeldv->emailql))
            Mail::to($this->modeldv->emailql)->send($emailht);
    }
}
