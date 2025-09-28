<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<link rel="stylesheet" href="style.css">
<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> 🎉</h2>
    <a href="logout.php"><button>Logout</button></a>
</div>
