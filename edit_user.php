<?php
session_start();
require_once 'config.php';

// Nur Admins dürfen Benutzer bearbeiten
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

// Prüfen, ob eine ID übergeben wurde
if (!isset($_GET['id'])) {
    header("Location: admin_page.php");
    exit();
}

$user_id = intval($_GET['id']);

// Benutzer aus Datenbank holen
$result = $conn->query("SELECT * FROM users WHERE id = $user_id");
if ($result->num_rows !== 1) {
    header("Location: admin_page.php");
    exit();
}

$user = $result->fetch_assoc();

// Wenn das Formular gesendet wurde
if (isset($_POST['update'])) {
    $name = htmlspecialchars($_POST['name']);
    $role = $_POST['role'];

    $conn->query("UPDATE users SET name = '$name', role = '$role' WHERE id = $user_id");
    header("Location: admin_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Benutzer bearbeiten</title>
    <style>
        body {
            background: #f4c473;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            padding: 50px;
        }
        .form-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h2 {
            margin-top: 0;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
        }
        a.back {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #555;
        }
    </style>
</head>
<body>

<div class="form-box">
    <h2>Benutzer bearbeiten</h2>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>

        <label for="role">Rolle:</label>
        <select name="role" required>
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
        </select>

        <button type="submit" name="update">Änderungen speichern</button>
    </form>

    <a class="back" href="admin_page.php">← Zurück zur Admin-Seite</a>
</div>

</body>
</html>
