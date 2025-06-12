<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $service = $_POST['service'];
    $ip      = $_SERVER['REMOTE_ADDR']; // ✅ Get user's IP address

    include('includes/db.php');

    // ✅ Save form data including IP address
    $sql = "INSERT INTO clients (name, email, phone, service, ip_address)
            VALUES ('$name', '$email', '$phone', '$service', '$ip')";
    mysqli_query($conn, $sql);

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'vijaydhavan04@gmail.com';
        $mail->Password   = 'pnql rwbl yqsn hueo'; // Make sure this is an App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('vijaydhavan04@gmail.com', 'sairam fabrication');
        $mail->addReplyTo($email, $name);
        $mail->addAddress('vijaydhavan04@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = "New Client Inquiry from $name";
        $mail->Body    = "
            <h3>New Client Inquiry</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Service:</strong> $service</p>
            <p><strong>IP Address:</strong> $ip</p>
        ";

        $mail->send();
        echo "<div class='success'>Request submitted and email sent successfully!</div>";
    } catch (Exception $e) {
        echo "<div class='success'>Form saved, but email failed. Error: {$mail->ErrorInfo}</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client Inquiry Form</title>
    <link rel="stylesheet" href="css/style11.css">
</head>
<body>

<div class="form-container">
    <h2>Client Inquiry Form</h2>
    <form method="POST">
        <input name="name" type="text" placeholder="Full Name" required>
        <input name="email" type="email" placeholder="Email" required>
        <input name="phone" type="tel" placeholder="Phone Number" required>
        <textarea name="service" placeholder="Service Required" required></textarea>
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
