<?php
session_start();
require_once 'config.php';

// Nur Admins haben Zugriff
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

// Benutzerdaten abrufen
$query = "SELECT id, name, email, role FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background:rgb(244, 115, 115);
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .box {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 800px;
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        h1 span {
            color: #444;
        }

        .box p span {
            color: #888;
        }

        button {
            background: #555;
            color: white;
            border: none;
            padding: 10px 25px;
            font-size: 1em;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 15px;
        }

        h2 {
            margin-bottom: 15px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
        }

        table, th, td {
            border: 1px solid #888;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color:rgb(241, 155, 74);
        }

        table a {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 0.9em;
        }

        a[href*="edit_user.php"] {
            background-color: #4CAF50;
            color: white;
            margin-right: 8px;
        }

        a[href*="delete_user.php"] {
            background-color: #f44336;
            color: white;
        }

        @media (max-width: 600px) {
            .box {
                padding: 20px;
            }

            h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>

    <div class="box">
        <h1>Welcome, <span><?= $_SESSION['name']; ?></span></h1>
        <p>This is an <span>admin</span> page</p>
        <button onclick="window.location.href='logout.php'">Logout</button>
    </div>

    <div class="box">
        <h2>Alle BenutzerInnen</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Rolle</th>
                <th>Aktionen</th>
            </tr>
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                    echo "<td>
                            <a href='edit_user.php?id=" . $row['id'] . "'>Edit</a>
                            <a href='delete_user.php?id=" . $row['id'] . "' onclick=\"return confirm('Benutzer wirklich löschen?');\">Remove</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Keine Benutzer gefunden</td></tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>