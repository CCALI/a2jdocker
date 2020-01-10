<?php
/***
Messaging integration
Tobias Nteireho
***/

$config = parse_ini_file('/var/www/private/config.ini');

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once $config['lib_dir'] . '/twilio-php-master/Twilio/autoload.php';
require_once $config['lib_dir'] . '/PHPMailer-master/src/Exception.php';
require_once $config['lib_dir'] . '/PHPMailer-master/src/PHPMailer.php';
require_once $config['lib_dir'] . '/PHPMailer-master/src/SMTP.php';
require_once __DIR__ . '/ics.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


//Make calendar

$mail_body = $firstname .
  ', this is a reminder that you have a meeting with ' .
  'your parole officer '.  $meeting_day . '.';
//Send email
if (strlen($client_email)){
  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->SMTPDebug = 2;                                       // Enable verbose debug output
      $mail->isSMTP();                                            // Set mailer to use SMTP
      $mail->Host       = $config['smtp_host'];  // Specify main and backup SMTP servers
      //$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      //$mail->Username   = $config['smtp_user'];                     // SMTP username
      //$mail->Password   = $config['smtp_pass'];                               // SMTP password
      //$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
      $mail->Port       = $config['smtp_port'];                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('no-reply@a2j.org', 'a2jauthor hackathon');
      $mail->addAddress('tobias@cali.org', 'Tobias');     // Add a recipient

      // Attachments
      //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Parole Officer Meeting Reminder';
      $mail->Body    = $mail_body;
      $mail->AltBody = $mail_body;

      //$mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}


//print($message->sid);
