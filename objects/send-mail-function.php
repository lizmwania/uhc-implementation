
function sendMail(){
// Multiple recipients
    $to = $email;

// Subject
    $subject = 'Verification of your account';

// Message
    $message = '';

// To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=UTF-8';
    $headers[] = 'From: //Email here //recepient';

// Mail it
    mail($to, $subject, $message, implode("\r\n", $headers));
}
?>