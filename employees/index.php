<?php
include("../includes/auth_check.php");
include("../config/db.php");

$search = "";
$department = "";

$query = "SELECT * FROM employees WHERE 1";

if (isset($_GET["search"]) && $_GET["search"] != "") {
    $search = mysqli_real_escape_string($conn, $_GET["search"]);
    $query .= " AND (name LIKE '%$search%' OR email LIKE '%$search%')";
}

if (isset($_GET["department"]) && $_GET["department"] != "") {
    $department = mysqli_real_escape_string($conn, $_GET["department"]);
    $query .= " AND department='$department'";
}

$query .= " ORDER BY id DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Employee Management</h2>

        <form method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search by Name or Email" value="<?php echo $search; ?>">
            <input type="text" name="department" placeholder="Filter by Department" value="<?php echo $department; ?>">
            <button type="submit">Search</button>
        </form>

        <div style="margin-top: 15px;">
            <a href="add.php" class="btn">+ Add Employee</a>
            <a href="../dashboard.php" class="btn">Back to Dashboard</a>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>

            <?php if(mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["phone"]; ?></td>
                        <td><?php echo $row["department"]; ?></td>
                        <td>₹<?php echo $row["salary"]; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align:center;">No employees found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
