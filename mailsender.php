<?php

include "code/class.phpmailer.php";
include "code/class.smtp.php";

class Email{
    public function __construct()
    {
        $this->email="daniel.robles.is@unipolidgo.edu.mx";
        $this->password="Dany17GP89";

    }

    public function sendEmail($recipient, $title, $subject, $message){
        $mail= new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth=true;
        $mail->SMTPSecure="tls";
        $mail->Host="smtp.gmail.com";
        $mail->Port="587";
        $mail->Username=$this->email;
        $mail->Password=$this->password;
        $mail->From=$this->email;
        $mail->FromName="Admin";
        $mail->Subject=$subject;
        $mail->Wordwrap=50;

        $mail->isHTML(true);
        $mail->MsgHTML($message);

        $mail->AddAddress("$recipient",$title);
        $mail->CharSet="UTF-8";

        if(!$mail->send()){
            echo "Error".$mail->ErrorInfo;


        }
        else{
            echo "your email has been send";
        }

    }
}
$obj=new Email();

$email = $_POST["email"];

$message= "Welcome aboard!";
$obj->SendEmail($email, "Mr.", "Confirm your email", $message);

?>