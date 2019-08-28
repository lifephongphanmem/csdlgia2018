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
        sleep(5);
        $emaildn = new MailDoanhNghiep($this->modeldn,$this->contentdn);
        //dd($emaildn);
        Mail::to($this->modeldn->email)->send($emaildn);
        $emailht = new MailHeThong($this->contentht,$this->modeldv);
//        dd($emailht);;
        Mail::to($this->modeldv->emailql)->send($emailht);
        echo 'End send email';
    }
}
