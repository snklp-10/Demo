<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $users = json_decode(file_get_contents("users.json"), true);

    foreach ($users as $user) {
        if ($user['username'] === $username && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
            exit();
        }
    }
    $error = "Invalid username or password.";
}
?>

<link rel="stylesheet" href="style.css">
<div class="container">
    <h2>Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Enter username" required><br>
        <input type="password" name="password" placeholder="Enter password" required><br>
        <button type="submit">Login</button>
    </form>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <p>Don't have an account? <a href="register.php">Register</a></p>
</div>
