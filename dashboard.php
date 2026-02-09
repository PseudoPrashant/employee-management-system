<?php
include("includes/auth_check.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION["admin_username"]; ?> 👋</h2>

        <div style="margin-top: 20px;">
            <a href="employees/index.php" class="btn">Manage Employees</a>
            <a href="auth/logout.php" class="btn danger">Logout</a>
        </div>
    </div>
</body>
</html>
