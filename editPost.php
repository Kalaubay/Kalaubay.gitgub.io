<?php

session_start();

require_once 'common/checkAuth.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'] ?? null; // ID-ді қосу
    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;
    $category_id = $_POST['category_id'] ?? null;

    $user_id = $user['id']; // Пайдаланушы ID-і

    require_once 'common/connect.php';
    $result = editPost($id, $title, $content, $category_id); // ID-ді жіберу

    if($result) {
        header("Location: indexAdmin.php");
        exit; // Кодтың орындалуын тоқтату
    }
}
?>
