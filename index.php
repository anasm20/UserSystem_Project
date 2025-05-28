<?php
session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error) {
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            background: #f4a940;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header, footer {
        background-color: transparent;
        color: #000;
        text-align: center;
        padding: 15px 0;
        }


        header h1 {
            margin: 0;
            font-size: 2rem;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .form-box {
            background: #fff2d5;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .form-box h2 {
            margin-bottom: 20px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            width: 100%;
            background-color: #222;
            color: white;
            border: none;
            padding: 12px;
            font-size: 1em;
            border-radius: 6px;
            cursor: pointer;
        }

        .form-box p {
            margin-top: 15px;
            font-size: 0.9em;
        }

        .form-box a {
            color: #f4a940;
            text-decoration: none;
            font-weight: bold;
        }

        .error-message {
            background-color: #f44336;
            color: #fff;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .form-box:not(.active) {
            display: none;
        }

        @media (max-width: 600px) {
            header h1 {
                font-size: 1.5rem;
            }

            .form-box {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Welcome to the UserSystem</h1>
        <p>This project is a simple user system for registration, login, and user management, developed using HTML, CSS, JavaScript, and PHP.</p>
    </header>

    <main>
        <!-- Login Form -->
        <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
            <form action="login_register.php" method="post">
                <h2>Login</h2>
                <?= showError($errors['login']); ?>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
                <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
            </form>
        </div>

        <!-- Register Form -->
        <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
            <form action="login_register.php" method="post">
                <h2>Register</h2>
                <?= showError($errors['register']); ?>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="">--Select Role--</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="register">Register</button>
                <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
            </form>
        </div>
    </main>

    <footer>
        <p> 2025 - UserSystem. All rights reserved.</p>
    </footer>

    <script>
        function showForm(formId) {
            document.getElementById("login-form").classList.remove("active");
            document.getElementById("register-form").classList.remove("active");
            document.getElementById(formId).classList.add("active");
        }

        // Beim Laden: das richtige Formular anzeigen
        window.onload = () => {
            showForm("<?= $activeForm ?>-form");
        };
    </script>
</body>
</html>
