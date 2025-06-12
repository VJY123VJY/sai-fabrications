<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$admin = $_SESSION['admin']; // Get admin info from session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style10.css">
   <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to right, #e0f7fa, #ffffff);
        margin: 0;
        padding: 0;
    }

    .dashboard {
        max-width: 1000px;
        margin: 60px auto;
        background: #ffffff;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border-radius: 12px;
    }

    .dashboard h2 {
        text-align: center;
        font-size: 2rem;
        color: #0f172a;
        margin-bottom: 30px;
        position: relative;
    }

    .dashboard h2::after {
        content: '';
        display: block;
        width: 80px;
        height: 4px;
        background-color: #2563eb;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    .menu {
        margin-top: 30px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 25px;
    }

    .menu a {
        text-decoration: none;
        background: #2563eb;
        color: white;
        padding: 18px;
        text-align: center;
        border-radius: 8px;
        transition: 0.3s ease;
        font-weight: 600;
        box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
        font-size: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .menu a:hover {
        background: #1e40af;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(30, 64, 175, 0.4);
    }

    .logout {
        display: block;
        margin: 50px auto 0;
        text-align: center;
        color: #d32f2f;
        text-decoration: none;
        font-weight: 600;
        font-size: 16px;
        transition: color 0.3s;
    }

    .logout:hover {
        color: #b71c1c;
        text-decoration: underline;
    }

    @media (max-width: 600px) {
        .dashboard {
            padding: 20px;
        }

        .menu a {
            font-size: 14px;
            padding: 14px;
        }

        .dashboard h2 {
            font-size: 1.5rem;
        }
    }
</style>

</head>
<body>

<div class="dashboard">
    <h2>Welcome- <?php echo htmlspecialchars($admin['username']); ?>!</h2>
    <p>This is your Admin Dashboard.</p>

    <div class="menu">
        <a href="manage_employees.php">Manage Employees</a>
        <a href="client.php">Client Form</a>
        <a href="admin_login.php">admin login</a>
        <a href="admin_register.php">Admin register</a>
        
        
    </div>

    <a class="logout" href="logout.php">Logout</a>
</div>

</body>
</html>
