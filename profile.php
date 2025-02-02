<?php
session_start();
include_once "User.php";

$user = new User();

if (!$user->isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$userData = $user->getUsers($_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout'])) {
    session_unset(); 
    session_destroy(); 
    setcookie(session_name(), '', time() - 3600, '/'); 
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="profile-container">
        <h2>👤 Profili i Përdoruesit</h2>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($userData['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($userData['email']); ?></p>
        <p class="success-msg">✅ Ju jeni i kyçur në sistem!</p>
        
        <form method="post">
            <button type="submit" name="logout" class="logout-btn">🔒 Dil nga llogaria</button>
            <button type="button" onclick="window.location.href='index.php'">Kthehu</button>

        </form>
    </div>

</body>
</html>
