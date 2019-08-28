<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailHeThong extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $contentht;
    protected $modeldv;

    public function __construct($contenht,$modeldv)
    {
        $this->contentht = $contenht;
        $this->modeldv = $modeldv;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.mailhethong')
            ->with('modeldv',$this->modeldv)
            ->with('contentht',$this->contentht);
    }
}
