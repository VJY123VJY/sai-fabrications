<link rel="stylesheet" href="css/style.css">



<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    header("Location: admin_register.php");
    exit();
}
?>

<h2>Admin Panel</h2>
<ul>
    <li><a href="manage_clients.php">Manage Clients</a></li>
    <li><a href="manage_employees.php">Manage Employees</a></li>
    <li><a href="../logout.php">Logout</a></li>
</ul>
