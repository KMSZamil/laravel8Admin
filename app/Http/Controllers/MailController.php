<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function basic_email(){
        $data = array('name' => 'Zamil');

        Mail::send(['text'=>'mail.mailtext'], $data, function ($mail){
            $mail->to('zamil@aci-bd.com','My test email sending')->subject('Test Mail Send');
            $mail->from('ear@aci-bd.com','Sender User Name');
        });
        echo "Mail Sent Successful";
    }
}
