<?php
include("../includes/auth_check.php");
include("../config/db.php");

$error = "";

if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["department"]) && isset($_POST["salary"])) {

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $department = mysqli_real_escape_string($conn, $_POST["department"]);
    $salary = mysqli_real_escape_string($conn, $_POST["salary"]);

    $query = "INSERT INTO employees (name, email, phone, department, salary)
              VALUES ('$name', '$email', '$phone', '$department', '$salary')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Add Employee</h2>

        <?php if($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="name" placeholder="Employee Name" required>
            <input type="email" name="email" placeholder="Employee Email" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <input type="text" name="department" placeholder="Department" required>
            <input type="number" name="salary" placeholder="Salary" required>

            <button type="submit">Add Employee</button>
        </form>

        <a href="index.php" class="btn">Back</a>
    </div>
</body>
</html>
