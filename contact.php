<?php
     // if(isset($_POST['submit']))
     // {
     //   echo 'IT WORKED!';

     //  //  $name = $_POST['name'];
     //  //  $mailFrom = $_POST['email'];
     //  //  $subject = $_POST['subject'];
     //  //  $message = $_POST['message'];

     //  //  $mailTo = "jay4399@gmail.com";
     //  //  $headers = "From: ".$mailFrom;
     //  //  $txt = "You have recieved an email from".$name.".\n\n".$message;

     //  //  mail($mailTo, $subject, $txt, $headers);
     //  //  header("Location: index.php?mailsend");

     // }

$receiving_email_address = 'jay4399@gmail.com';

if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
include( $php_email_form );
} else {
die( 'Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

$contact->smtp = array(
'host' => 'gmail.com',
'username' => 'jay4399@gmail.com',
'password' => '',
'port' => '587'
);

$contact->add_message( $_POST['name'], 'From');
$contact->add_message( $_POST['email'], 'Email');
$contact->add_message( $_POST['message'], 'Message', 10);

if($_POST['privacy'] !='accept') {
     die('Please accept our terms of service and privacy policy');
   }

$contact->recaptcha_secret_key = '6LdQBdEZAAAAAMsFfVgp4OSQsIWKKczpu5SPUsSx';

echo $contact->send();

?>
