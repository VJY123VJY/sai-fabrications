

<link rel="stylesheet" href="css/style1.css">

<?php
include('../includes/db.php');
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name     = $_POST['name'];
    $position = $_POST['position'];
    $salary   = $_POST['salary'];
    $tasks    = $_POST['tasks'];

    $sql = "INSERT INTO employees (name, position, salary, tasks) VALUES ('$name', '$position', '$salary', '$tasks')";
    mysqli_query($conn, $sql);
}
?>

<h2>Manage Employees</h2>

<form method="POST">
    <input name="name" placeholder="Name" required><br>
    <input name="position" placeholder="Position" required><br>
    <input name="salary" type="number" step="0.01" placeholder="Salary" required><br>
    <textarea name="tasks" placeholder="Assigned Tasks"></textarea><br>
    <button type="submit">Add Employee</button>
</form>

<h3>Employee List:</h3>
<?php
$result = mysqli_query($conn, "SELECT * FROM employees");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>{$row['name']} - {$row['position']} - ₹{$row['salary']}</p>";
}
?>
