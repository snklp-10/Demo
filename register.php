<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $users = json_decode(file_get_contents("users.json"), true);

    foreach ($users as $user) {
        if ($user['username'] === $username) {
            die("<div class='container'>Username already exists. <a href='register.php'>Try again</a></div>");
        }
    }

    $users[] = ["username" => $username, "password" => $password];
    file_put_contents("users.json", json_encode($users));

    echo "<div class='container'>Registration successful. <a href='login.php'>Login here</a></div>";
}
?>

<link rel="stylesheet" href="style.css">
<div class="container">
    <h2>Register</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Enter username" required><br>
        <input type="password" name="password" placeholder="Enter password" required><br>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</div>
