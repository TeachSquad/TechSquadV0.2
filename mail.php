<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'abdshubham13@gmail.com';                 // SMTP username
$mail->Password = '@Kukki303';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                           //         // TCP port to connect to
$mail->setFrom('abdshubham13@gmail.com', 'Gedion 24/7');
$mail->addAddress($doner_email, 'Joe User');     // Add a recipient              // Name is optional
$mail->addReplyTo('abdshubham13@gmail.com', 'Information');
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Thank you for donating';
$mail->Body    = 'Dear '.$doner_name.' Thank you for your donation. Our Volunteer will contact you soon  ';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

// $get_volunteer_email="select * from volunteer where pickup_location='$doner_pickup_location'"or die(mysqli_error($conn));
// $volunteer_email_result=mysqli_query($conn,$get_volunteer_email);
// $row2=mysqli_fetch_array($volunteer_email_result);
// $volunteer_email=$row2['email'];
// echo $volunteer_email;
?>