<?php

namespace App\Mail;

use App\Models\general_setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $msg;

    public function __construct($msg)
    {
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $gen = general_setting::first();

        return $this->view('mails.userContactUsMail')
            ->subject('Contact Us Email')
            ->from($gen->site_email,$gen->site_name);
    }
}
