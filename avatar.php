<?<?php 
	
session_start();

if (!isset($_SESSION['user_id'])) {
    // Егер сессияда user_id жоқ болса, қолданушы логинге қайта бағытталады
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id']; // сессиядағы қолданушы ID-сі
$query = $pdo->prepare("SELECT name, email, avatar FROM users WHERE id = ?");
$query->execute([$userId]);

$user = $query->fetch(PDO::FETCH_ASSOC);

if ($user) {
    // Егер қолданушы табылса, профил мәліметтерін шығарамыз
    echo "Аты: " . $user['name'];
    echo "Почта: " . $user['email'];
    echo "<img src='images/avatars/" . $user['avatar'] . "'>";
} else {
    echo "Қолданушы табылған жоқ!";
}

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профил</title>
    <style>
        .profile-container {
            width: 300px;
            margin: 0 auto;
            text-align: center;
        }
        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>Қолданушының профилі</h1>
        <img src="images/avatars/<?= htmlspecialchars($user['avatar']) ?>" alt="Аватар" class="profile-avatar">
        <p>Аты: <?= htmlspecialchars($user['name']) ?></p>
        <p>Почта: <?= htmlspecialchars($user['email']) ?></p>
    </div>
</body>
</html>
