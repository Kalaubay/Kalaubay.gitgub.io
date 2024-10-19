	<?php  session_start(); ?>
	<?php require_once 'common/checkAuth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php require_once 'common/inhead.php'; ?>
	<style>
		.title{
			text-align: center;
			color: red;
			margin-top: 50px;
		}
		.title > a {
			color: red;
		}
		.avatar > li > img {
		    width: 100%;
		    border-radius: 50%;
		}
	</style>
</head>
<body>
<!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">My Page</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <form class="ms-3" action="logout.php" method="post">
                    <button class="btn btn-info" type="submit">Logout</button>
                </form>
            </div>
        </nav>
	<div class="title">
		<p>Сізде курсқа доступ жоқ.</p>
		<a href="https://wa.me/77077679751?text=%D0%9C%D0%B5%D0%BD%20%D0%BA%D1%83%D1%80%D1%81%D2%9B%D0%B0%20%D0%B4%D0%BE%D1%81%D1%82%D1%83%D0%BF%20%D0%B0%D0%BB%D2%93%D1%8B%D0%BC%20%D0%BA%D0%B5%D0%BB%D0%B5%D0%B4%D1%96">Доступ алу үшін админге жазыңыз</a>
	</div>
	

</body>
</html>