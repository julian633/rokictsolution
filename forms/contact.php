<?php
  

  // Replace contact@example.com with your real receiving email address
  
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  
  //Load Composer's autoloader
  require '../vendor/autoload.php';
  

  $phpmailer = new PHPMailer(true);

try {
    //Server settings
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'efe2ba5131b37b';
    $phpmailer->Password = 'c5a8e70f07ac56';
    //Recipients
    $phpmailer->setFrom($_POST['email'], $_POST['name']);
    $phpmailer->addAddress('Enquiries@rokictsolutions.co.za');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $phpmailer->isHTML(true);                                  //Set email format to HTML
    $phpmailer->Subject = 'Enquiry';
    $phpmailer->Body    = "Message:".$_POST['message'];
    $phpmailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $phpmailer->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
}

  
  
  
  
  
  $receiving_email_address = 'Enquiries@rokictsolutions.co.za';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( '');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  $contact->smtp = array(
    'SMTP host' => 'rokictsolutions.co.za',
    'POP3 host' => 'rokictsolutions.co.za',
    'username' => 'rokicikf',
    'password' => 'h1T!05w1iHh)',
    'port' => '587'
  );
  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
