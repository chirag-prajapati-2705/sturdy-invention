<?php
/**
 * Created by PhpStorm.
 * User: Akash
 * Date: 1/1/2009
 * Time: 12:06 AM
 */

namespace App\Service;
use Mail;
Class EmailService {

    public function __construct(){

    }

    public function sendEmail($to,$message,$subject,$view){
        $from_name=env('FROM_NAME');
        Mail::send($view, ['content'=>$message], function ($event) use ($to,$from_name, $subject) {
            $event->from(env('FROM_EMAIL'), $from_name)->to($to)->subject($subject);
        });
        return Mail::failures();
    }
}