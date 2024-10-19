<?php

session_start();

require_once 'common/checkAuth.php';
require_once 'common/connect.php';

$categories = getCategories();

$postId = $_GET['post_id'] ?? null;

if($postId)
    $post = getOnePost($postId);

// Проверка на то, что пост принадлежит текущему пользователю
if($post['user_id'] != $user['id']){
    header("Location: index.php"); // with session message
    exit; // Кодтың орындалуын тоқтату
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Homepage</title>
    <?php require_once 'common/inhead.php'; ?>  
</head>
<body>
    <?php require_once 'common/nav.php' ?>
    
    
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8">
                <form action="editPost.php" method="post">
                    <input type="hidden" id="user_id" name="user_id" value="<?= $user['id'] ?>"> <!-- Жаңартылған -->

                    <input name="id" value="<?= $post['id'] ?>" type="hidden">

                    <div class="form-group">
                        <label for="titleInput">Post title</label>
                        <input name="title" value="<?= htmlspecialchars($post['title']) ?>" type="text" class="form-control" id="titleInput" required>
                    </div>
                    <div class="form-group">
                        <label for="contentInput">Post content</label>
                        <textarea name="content" class="form-control" id="contentInput" rows="5" required><?= htmlspecialchars($post['content']) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categoryInput">Example select</label>
                        <select name="category_id" class="form-control" id="categoryInput">
                            <?php foreach($categories as $cat): ?>
                                <option <?php if($cat['id'] == $post['category_id']) echo 'selected' ?> value="<?= $cat['id'] ?>"> <?= htmlspecialchars($cat['namekz']) ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group py-3">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
            
            <?php require_once 'common/aside.php' ?>
        </div>
    </div>
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
