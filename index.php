<?php session_start();

    require_once 'common/checkAuth.php';
    require_once 'common/connect.php';

    $categories = getCategories();

    $search = $_POST['search'] ?? '';

    if($search){
        $posts = searchPosts($search);
    }
    else {
        $catId = $_GET['cat_id'] ?? null;

        if($catId)
            $posts = getPosts($catId);
        else
            $posts = getPosts();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Homepage</title>

        <?php require_once 'common/inhead.php'; ?>

        <style>
            .card-body form {
                display: inline;

            }
            .first{
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .read {
                border: 1px solid #0449fb;
                background-color: #0449fb;
                color: #fff;
                width: 90px;
                height: 40px;
                border-radius: 5px;
                margin: 0 auto;
                padding: 6px 12px;
                display: flex;
                justify-content: center;
                margin: 0;
                text-decoration: none;
            }
            .read:hover {
                border: 1px solid blue;
                background-color: blue;
            }
            .oneType {
                justify-content: start;
                border: 1px solid #fff;
                padding: 7px 30px;
            }
            .oneType:hover{
                border: 1px solid rgba(0, 28, 61, 0.08);
                width: 100%;
                border-radius: 7px;
                background-color: rgba(0, 28, 61, 0.08);
            }
        </style> 
    </head>
    <body>
        <?php require_once 'common/nav.php' ?>
        
        <!-- Page content-->
        <div class="container py-3">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <?php foreach($posts as $post): ?>
                            <div class="oneType mb-4">
                                <div class="card-body my-3">
                                    <!-- <div class="small text-muted">author: <?=$post['name']?></div> -->
                                    <div class="first">
                                        <h2 class="card-title h4">
                                            <?= $post['title'] ?>
                                        </h2>
                                        <div>
                                            <a class=" read" href="onePost.php?post_id=<?= $post['id'] ?>">
                                            Read →
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php require_once 'common/aside.php' ?>
            </div>
        </div>
        <!-- Footer-->
        <footer class="my-5 bg-dark">
            <!-- <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div> -->
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
