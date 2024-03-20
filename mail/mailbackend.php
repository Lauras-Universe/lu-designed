<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$input = json_decode(file_get_contents('php://input'), true);
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'pro.turbo-smtp.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'weigand@milawe.com'; // SMTP username
    $mail->Password = 'tFWSwiuc'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    //Recipients
    $mail->setFrom('weigand@milawe.com', 'LU Backend');
    $mail->addAddress('hosting2021@outlook.com', 'LU'); // Add a recipient

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Neue Nachricht von ' . $input['name'];
    $mail->Body    = 'Name: ' . $input['name'] . '<br>Email: ' . $input['email'] . '<br>Nachricht: ' . $input['message'];
    $mail->AltBody = 'Name: ' . $input['name'] . '\nEmail: ' . $input['email'] . '\nNachricht: ' . $input['message'];

    $mail->send();
    echo 'Nachricht wurde gesendet';
} catch (Exception $e) {
    http_response_code(500);
    echo "Nachricht konnte nicht gesendet werden. Mailer Error: {$mail->ErrorInfo}";
}
?>
