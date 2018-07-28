<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Service\EmailService;

class EmailNotifier
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    protected $email_service;
    public function __construct(EmailService $email_service)
    {
        //
        $this->email_service=$email_service;
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {

        //dd($event->user->email);
        $to=$event->user->email;
        $message="Welcome ,You have successfully registered";
        $subject="Registration";
        $send_email= $this->email_service->sendEmail($to,$message,$subject,'email.register_email');
    }
}
