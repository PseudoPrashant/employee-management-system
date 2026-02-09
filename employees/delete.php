<?php
include("../includes/auth_check.php");
include("../config/db.php");

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit();
}

$id = $_GET["id"];

$query = "DELETE FROM employees WHERE id=$id";

mysqli_query($conn, $query);

header("Location: index.php");
exit();
?>
