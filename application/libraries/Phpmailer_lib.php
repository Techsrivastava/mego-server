<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Phpmailer_lib{


	function  __construct(){
		
    }

	public function load()
	{
		require_once APPPATH.'third_party/PHPMailer/Exception.php';
		require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
		require_once APPPATH.'third_party/PHPMailer/SMTP.php';


		$mail = new PHPMailer;
        
        $mail->isSMTP();
         $mail->Host     = 'smtp.gmail.com';//'mail.milleniance.in';
        $mail->SMTPAuth = true;
        $mail->Username ='rohit.cbtech@gmail.com'; //'rohit@milleniance.in';
        $mail->Password = 'ashadevi@3294';
       // $mail->SMTPDebug  =3;   
       $mail->SMTPSecure = "tls";    
       // $mail->SMTPSecure = 'ssl';
		$mail->Port =587;//465;
		$mail->isHTML = true;
		
		return $mail;


	}


}

?>
