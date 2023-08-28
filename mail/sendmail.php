<?php

  include_once('PHPMailer-master/src/PHPMailer.php');
  include_once('PHPMailer-master/src/SMTP.php');
  include_once('PHPMailer-master/src/Exception.php');
class Mailer {
   public function dathangmail($tieude,$noidung,$maildathang){
      
      $mail = new PHPMailer\PHPMailer\PHPMailer();
      $mail->CharSet ='UTF-8';
      $mail->IsSMTP(); // enable SMTP
      $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
      //authentication SMTP enabled
      $mail->SMTPAuth = true; 
      $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
      $mail->Host = "smtp.gmail.com";
      //indico el puerto que usa Gmail 465 or 587
      $mail->Port = 465; 
      $mail->Username = "letrung042001@gmail.com";
      $mail->Password = "srkgvgvumifxjyib";
      $mail->SetFrom('letrung042001@gmail.com','trung');
      $mail->AddAddress($maildathang,'hoang trung');
      $mail->addCC('letrung042001@gmail.com');

      $mail->isHTML(true);
      $mail->Subject = $tieude;
      $mail->Body = $noidung;
      

      if(!$mail->Send()) {
         echo "Mailer Error: " . $mail->ErrorInfo;
      } else {
         echo "Message has been sent";
      }
   }
}
?>