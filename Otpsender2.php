<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer-6.0.5/src/Exception.php';
require 'PHPMailer-6.0.5/src/PHPMailer.php';
require 'PHPMailer-6.0.5/src/SMTP.php';

$email_r = $_GET['email'];

class VerificationCode
{

    public $smtpHost;
    public $smtpPort;
    public $sender;
    public $password;
    public $receiver;
    public $code;

    public function __construct($receiver)
    {
        /**
         * Your email id  
         * For example : johndoe@gmail.com
         * contact@johndoe.com
         * 
         */
        $this->sender = "ahmedagouri22@gmail.com"; 

        /**
         *  YOUR PASSWORD 
         *  ************
         */               

        $this->password = "safovpqfvbilxyfz
        ";  

        /**
         * Receiver email
         * For example : johndoe@gmail.com
         */     
        $this->receiver = $receiver;  

        /**
         * YOUR SMTP HOST NAME 
         * For example : smtp.gmail.com 
         * OR mail.youwebsite.com
         */     
        $this->smtpHost="smtp.gmail.com";        
        
        /**
         * SMTP port number
         * For example :587
         */
        $this->smtpPort = 587;
        

    }
    public function sendMail(){
       
        $mail = new PHPMailer();

        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->Host = $this->smtpHost;   
        $mail->Port = $this->smtpPort;    
        $mail->IsHTML(true);
        $mail->Username = $this->sender;
        $mail->Password = $this->password;
        $mail->Body=$this->getHTMLMessage();
        $mail->Subject = "Your verification code is {$this->code}";
        $mail->SetFrom($this->sender,"Verification Codes");
        $mail->AddAddress($this->receiver);
        if($mail->send()){
          header("Location: otp.php");
          // return true;
          exit;  
        }
        echo "FAILED TO SEND MAIL";
        // return false;

    }
    public function getVerificationCode()
    {
        return (int) substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    }

    public function getHTMLMessage(){
        $this->code=$this->getVerificationCode();
        $_SESSION['otp'] = $this->code;
        $htmlMessage=<<<MSG
        <!DOCTYPE html>
        <html>
         <body>
            <h1>Your verification code is {$this->code}</h1>
            <p>Use this code to verify your account.</p>
         </body>
        </html>        
MSG;
    return $htmlMessage;
    }

}

// pass your recipient's email

$vc=new VerificationCode($email_r); 

$vc->sendMail(); // MAIL SENT SUCCESSFULLY
