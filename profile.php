<?php
session_start();
include_once "User.php";

$user = new User();

if (!$user->isLoggedIn()) {
    header("Location: login.php");
    exit();
}


$userData = $user->getUserData($_SESSION['user_id']);

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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['kthehu'])) {
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
        <p><strong>Username:</strong> <?php echo htmlspecialchars($userData['username'] ?? "Përdorues i panjohur"); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($userData['email'] ?? "Email i panjohur"); ?></p>
        <p class="success-msg">✅ Ju jeni i kyçur në sistem!</p>
        
        <form method="post">
            <button type="submit" name="logout" class="logout-btn">🔒 Dil nga llogaria</button>
        </form>
        <form method="post">
            <button type="submit" name="kthehu" class="kthehu-btn">🏠 Kthehu në Home Page</button>
        </form>
    </div>

</body>
</html>


<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        .profile-container {
            background: white;
            padding: 25px;
            max-width: 400px;
            margin: auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            transition: transform 0.3s ease-in-out;
        }

        .profile-container:hover {
            transform: scale(1.03);
        }

        h2 {
            color: #1565c0;
            font-size: 24px;
        }

        .success-msg {
            color: green;
            font-weight: bold;
            font-size: 16px;
        }

        .logout-btn, .kthehu-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 12px 24px;
            background: #d32f2f;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .kthehu-btn {
            background: #1565c0;
        }

        .logout-btn:hover {
            background: #b71c1c;
        }

        .kthehu-btn:hover {
            background: #0d47a1;
        }

        @media (max-width: 768px) {
            .profile-container {
                max-width: 90%;
                padding: 20px;
            }

            h2 {
                font-size: 20px;
            }

            .logout-btn, .kthehu-btn {
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>
