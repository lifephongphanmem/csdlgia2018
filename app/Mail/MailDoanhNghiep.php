<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailDoanhNghiep extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $modeldn;
    protected $contentdn;
    public function __construct($modeldn,$contentdn)
    {
        $this->modeldn = $modeldn;
        $this->contentdn = $contentdn;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.maildn')
            ->with('modeldn',$this->modeldn)
            ->with('contentdn',$this->contentdn);
    }
}
