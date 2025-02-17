<?php
  // استبدل بإيميلك الحقيقي لاستقبال الرسائل
  $receiving_email_address = 'mostafak20212002@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  $contact->to = $receiving_email_address;
  $contact->from_name = isset($_POST['name']) ? $_POST['name'] : 'No Name';
  $contact->from_email = isset($_POST['email']) ? $_POST['email'] : 'No Email';
  $contact->subject = isset($_POST['subject']) ? $_POST['subject'] : 'No Subject';

  // استخدام SMTP لإرسال الرسائل عبر Gmail
  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'mostafak20212002@gmail.com', // بريد Gmail الخاص بك
    'password' => 'your-app-password', // استخدم App Password هنا
    'port' => '587',
    'encryption' => 'tls'
  );

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
