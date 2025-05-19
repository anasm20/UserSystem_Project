<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'user') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: #fff;">

    <div class="box">
        <h1>Welcome, <span><?= $_SESSION['name']; ?></span></h1>
        <p>This is a <span>user</span> page</p>
        <p>Your email: <span><?= $_SESSION['email']; ?></span></p>
        <button onclick="window.location.href='logout.php'">Logout</button>
    </div>

</body>
</html>
