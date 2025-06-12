<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard - sairam Fabrication</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="dashboard">
    <aside id="sidebar" class="sidebar active">
        <h2 class="logo">sai Fabrication</h2>
        <ul>
            <li><a href="index.php">🏠 Home</a></li>
            <li><a href="about.php">ℹ️ About Us</a></li>
            <li><a href="services.php">🛠️ Services</a></li>
            <li><a href="gallery.php">🖼️ Gallery</a></li>
            <li><a href="contact.php">📞 Contact</a></li>
           
            
            <li><a href="admin/admin_dashboard.php">🧑‍💼 Admin Panel</a></li>
            <li><a href="logout.php" style="color:red;">🚪 Logout</a></li>
        </ul>
    </aside>

    <main class="main-content">
      
        <div class="container">
            <h2>Welcome in sai Fabrication,  <?php echo htmlspecialchars($user['username']); ?>!</h2>
            <p>This is your client dashboard. Choose what you'd like to do:</p>

           

</body>
</html>
