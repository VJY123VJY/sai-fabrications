<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - Sairam Fabrication</title>
    <link rel="stylesheet" href="css/style6.css">
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>
        <p>If you have any questions, project inquiries, or need a custom quote, feel free to contact us using the form below. We’ll get back to you as soon as possible!</p>

        <!-- PHP Mail Handling -->
        <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        require 'vendor/autoload.php';

        $success = "";
        $error = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST["name"]);
            $email = htmlspecialchars($_POST["email"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $message = htmlspecialchars($_POST["message"]);

            $mail = new PHPMailer(true);

            try {
                // Send to admin
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp.gmail.com';        
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = 'vijaydhavan04@gmail.com';                     
                $mail->Password   = 'utee knto ccwt eyjc';  // Gmail App Password
                $mail->SMTPSecure = 'tls';                  
                $mail->Port       = 587;                                    

                $mail->setFrom($email, $name);
                $mail->addAddress('vijaydhavan04@gmail.com', 'Sairam Fabrication');
                $mail->addReplyTo($email, $name);

                $mail->isHTML(true);                                  
                $mail->Subject = 'New Contact Form Submission';
                $mail->Body    = "
                    <h2>Contact Form Submission</h2>
                    <p><strong>Name:</strong> {$name}</p>
                    <p><strong>Email:</strong> {$email}</p>
                    <p><strong>Phone:</strong> {$phone}</p>
                    <p><strong>Message:</strong><br>{$message}</p>
                ";
                $mail->AltBody = "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";
                $mail->send();

                // Send confirmation to user
                $userMail = new PHPMailer(true);
                $userMail->isSMTP();
                $userMail->Host       = 'smtp.gmail.com';
                $userMail->SMTPAuth   = true;
                $userMail->Username   = 'vijaydhavan04@gmail.com';
                $userMail->Password   = 'pnql rwbl yqsn hueo';
                $userMail->SMTPSecure = 'tls';
                $userMail->Port       = 587;

                $userMail->setFrom('vijaydhavan04@gmail.com', 'Sairam Fabrication');
                $userMail->addAddress($email, $name);
                $userMail->addReplyTo('vijaydhavan04@gmail.com', 'Sairam Fabrication');

                $userMail->isHTML(true);
                $userMail->Subject = 'Thanks for contacting Sairam Fabrication';

                $userMail->Body = "
                    <h2>Thank you for contacting us, {$name}!</h2>
                    <p>We’ve received your message and will respond as soon as possible.</p>
                    <hr>
                    <h3>Our Company Info:</h3>
                    <p><strong>Sairam Fabrication Pvt. Ltd.</strong><br>
                    Sairam Nagar, Manjri, near Serum Institute<br>
                    Pune, Maharashtra 411001<br>
                    📞 +91-9049184539<br>
                    📧 <a href='mailto:vijaydhavan04@gmail.com'>vijaydhavan04@gmail.com</a></p>
                    <p><strong>Location on Map:</strong></p>
                    <p><a href='https://goo.gl/maps/A6EiG7iS8ULRC7G18'>Click here to view on Google Maps</a></p>
                    <br>
                    <p>We appreciate your interest in Sairam Fabrication!</p>
                ";
                $userMail->AltBody = "Thank you for contacting Sairam Fabrication. Address: Sairam Nagar, Manjri, Pune 411001. Phone: +91-9049184539";
                $userMail->send();
                

                $success = "Thank you! Your message has been sent successfully.";
            } catch (Exception $e) {
                $error = "Message could not be sent. Error: {$mail->ErrorInfo}";
            }
        }

        if ($success) echo "<p style='color: green;'>$success</p>";
        if ($error) echo "<p style='color: red;'>$error</p>";
        ?>

        <!-- Contact Form -->
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="tel" name="phone" placeholder="Phone Number" required>
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>

        <!-- Google Maps -->
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.1927998275575!2d73.85674431489142!3d18.56055388738839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c06dc5eafc1d%3A0x62e16f5d2b3d1f15!2sPune%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1588243773992!5m2!1sen!2sin" 
            width="100%" 
            height="300" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>

        <!-- Company Info -->
        <h3>Our Office</h3>
        <p><strong>Sairam Fabrication Pvt. Ltd.</strong><br>
            Sairam Nagar, Manjri, near Serum Institute<br>
            Pune, Maharashtra 411001<br>
            📞 +91-9049184539<br>
            📧 <a href="mailto:vijaydhavan04@gmail.com">vijaydhavan04@gmail.com</a>
        </p>
    </div>
</body>
</html>
