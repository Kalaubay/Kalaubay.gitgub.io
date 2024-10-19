
<?php

    session_start();

    require_once 'common/checkAuth.php';
    require_once 'common/connect.php';

    $categories = getCategories();


?>
<?php
    $hasErrors = false; 
    if(isset($_SESSION['status']) && $_SESSION['status'] == 'error')
        $hasErrors = true;
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Homepage</title>
        <?php require_once 'common/inhead.php'; ?>  
        <style>
            body{
                justify-content: center;
            }
            .task-div {
                display: flex;
            }
        </style>    
    </head>
    <body>
        <?php require_once 'common/navAdmin.php'; ?>
        
        <!-- Page content-->
        <div class="container py-4">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    
    <form action="createPost.php" method="POST" enctype="multipart/form-data" class="col-md-10">

        <div class="field-group">
                <label for="video">Post Video</label>
                <input type="file" id="video" name="video" />
        </div>

        <div class="form-group">
            <label for="titleInput">Post title</label>
            <input name="title" type="text" class="form-control" id="titleInput">
        </div>
        <div class="form-group">
            <label for="contentInput">Post content</label>
            <textarea name="content" class="form-control" id="contentInput" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="categoryInput">Example select</label>
            <select name="category_id" class="form-control" id="categoryInput">
                <?php foreach($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>"> <?= $cat['namekz'] ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
        </div>
        <div class="task-div my-3">
            <div class="field-group">
                <label for="c_work">Class task</label>
                <input type="file" id="c_work" name="c_work" />
            </div>
            <div class="field-group">
                <label for="test">Test task</label>
                <input type="file" id="test" name="test" />
            </div>
        </div>

        <div class="">
            <a href="common/test2/admin.php" class="btn btn-success">Тест құру</a>
        </div>

        <div class="form-group py-3">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>

                    <!-- Pagination-->
                    <!-- <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="#!">15</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                        </ul>
                    </nav> -->
                </div>
                
                
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
