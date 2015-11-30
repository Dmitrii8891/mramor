<?php

namespace common\components;
require( __DIR__.'/../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php');
use yii\base\Widget;
use yii\helpers\Html;

class MailWidget extends Widget{
    public $message;
    public $email;
    public $text;
    public $subject;

    public function init(){

        parent::init();

    }

    public function run(){

        $mail = new \PHPMailer;

        $mail->IsSMTP();

        $mail->CharSet = 'UTF-8';
        $mail->Host = '192.168.10.15';
        $mail->Port  = 25;
        $mail->SetFrom("butik@bareks.com.ua");
        $mail->Subject = $this->subject;
        $mail->MsgHTML($this->text);
        $address = "dockdep@gmail.com";
        $mail->AddAddress($address);

        if(!$mail->send()) {
            die('Mailer Error: ' . $mail->ErrorInfo);
        } else {
            die('Message has been sent');
        }

    }



}

