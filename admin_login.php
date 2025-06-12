    <link rel="stylesheet" href="css/style1.css">


    <?php
    session_start();
    include('../includes/db.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username' AND role='admin'";
        $result = mysqli_query($conn, $sql);
        $admin = mysqli_fetch_assoc($result);

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = $admin;
            header("Location: admin_dashboard.php");
        } else {
            echo "Invalid credentials or not an admin!";
        }
    }
    ?>

    <h2>Admin Login</h2>
    <form method="POST">
        <input name="username" placeholder="Username" required><br>
        <input name="password" type="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
