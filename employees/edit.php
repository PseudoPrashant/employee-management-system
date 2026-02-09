<?php
include("../includes/auth_check.php");
include("../config/db.php");

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit();
}

$id = $_GET["id"];

$query = "SELECT * FROM employees WHERE id=$id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) != 1) {
    header("Location: index.php");
    exit();
}

$employee = mysqli_fetch_assoc($result);

$error = "";

if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["department"]) && isset($_POST["salary"])) {

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $department = mysqli_real_escape_string($conn, $_POST["department"]);
    $salary = mysqli_real_escape_string($conn, $_POST["salary"]);

    $updateQuery = "UPDATE employees SET 
        name='$name',
        email='$email',
        phone='$phone',
        department='$department',
        salary='$salary'
        WHERE id=$id";

    if (mysqli_query($conn, $updateQuery)) {
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
    <title>Edit Employee</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Employee</h2>

        <?php if($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="name" value="<?php echo $employee["name"]; ?>" required>
            <input type="email" name="email" value="<?php echo $employee["email"]; ?>" required>
            <input type="text" name="phone" value="<?php echo $employee["phone"]; ?>" required>
            <input type="text" name="department" value="<?php echo $employee["department"]; ?>" required>
            <input type="number" name="salary" value="<?php echo $employee["salary"]; ?>" required>

            <button type="submit">Update Employee</button>
        </form>

        <a href="index.php" class="btn">Back</a>
    </div>
</body>
</html>
