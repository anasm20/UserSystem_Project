<?php
session_start();
require_once 'config.php';

// Nur Admins dürfen löschen
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

// Prüfen ob ID vorhanden und gültig ist
if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);

    // Optional: verhindern, dass der Admin sich selbst löscht
    if ($_SESSION['email'] === 'admin@example.com') { // Passe ggf. an
        // oder wenn du ID vergleichen willst:
        // if ($user_id == $_SESSION['user_id']) { ... }
    }

    // Benutzer löschen
    $conn->query("DELETE FROM users WHERE id = $user_id");
}

// Zurück zur Admin-Seite
header("Location: admin_page.php");
exit();
?>
