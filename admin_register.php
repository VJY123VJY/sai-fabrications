<?php
session_start();
include('../includes/db.php');

$error = "";
$success = "";

// Handle registration form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if username already exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Username already exists!";
    } else {
        $sql = "INSERT INTO users (username, email, password, role)
                VALUES ('$username', '$email', '$password', 'admin')";

        if (mysqli_query($conn, $sql)) {
            $success = "Admin registered successfully! <a href='admin_login.php'>Login Now</a>";
        } else {
            $error = "Something went wrong!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Register</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>

<div class="auth-container">
    <div class="form-container">
        <h2>Admin Register</h2>

        <?php
        if ($error) echo "<p class='error'>$error</p>";
        if ($success) echo "<p class='success'>$success</p>";
        ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Register</button>
        </form>

        <p>Already have an account? <a href="admin_login.php">Login here</a></p>
    </div>
</div>

</body>
</html>
