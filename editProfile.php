<?php session_start();

 	require_once 'common/checkAuth.php';





?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Profile</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
	<style>
		body {
			background-color: #;
			margin-bottom: 50px;

		}
		.big-block > .block {
			margin: 0 auto;
		}
		.big-block > .title {
			margin: 0 auto;
		}
		.title {
			width: 600px;
			border: 1px solid #D3D3D3;
			box-shadow: 10px 10px 10px 10px #aaaaaa;
			border-radius: 10px 10px 0 0;
			background-color: #fff;
			text-align: center;
		}
		.big-block > .block {
			margin: 0 auto;
		}
		.block {
			width: 600px;
			border: 1px solid #D3D3D3;
			box-shadow: 10px 10px 10px 10px #aaaaaa;
			border-radius: 0 0 10px 10px;
			background-color: #fff;
		}
		.kyrs {
			color: #808080	;
			text-align: center;
			margin: 0;
			padding: 0;
		}
		.inf{
			margin-top: 10px;
		}

	</style>
	<?php require_once 'common/inhead.php'; ?>
</head>
<body>
	  <?php
	    $userRole = $_SESSION['user']['role'];

	    if ($userRole == 'admin') {
	        require_once 'common/navAdmin.php';
	    } else {
	        require_once 'common/nav.php'; 
	    }
	?>

	 <?php
		$hasErrors = false; 
			if(isset($_SESSION['status']) && $_SESSION['status'] == 'error')
				$hasErrors = true;
	?>

	<form action="editProFile-db.php" method="post">
		<input name="id" value="<?= $user['id'] ?>" type="hidden">
		<div class="container big-block">
			<div class="title mt-5">
				<h3 class="mt-3">
					Edit profile
				</h3>
			</div>
			<div class="block ">
				<div class="info-user mb-5" style="width: 400px; margin: 0 auto;">
					<h5 class="name mt-5">
						<label for="name"class="form-label">Имя профиля:</label> <br>
						<input 	type="text"
								class="form-control" 
								id="name" name="name" 
								value="<?= $user['name']?>" />
								<?php if($hasErrors && isset($_SESSION['errors']['name'])): ?>
						<p class="inputError"><?= $_SESSION['errors']['name'] ?></p>
					<?php endif; ?>
					</h5>
					<hr>
					<div class="inf">
						<label for="phone"class="form-label">Phone</label> <br>
						<input 	type="text" 
								class="form-control" 
								id="phone" 
								name="phone" 
								value="<?= $user['phone']?>" />
								<?php if($hasErrors && isset($_SESSION['errors']['phone'])): ?>
						<p class="inputError"><?= $_SESSION['errors']['phone'] ?></p>
					<?php endif; ?>
					</div>
					<div class="inf">
						<label for="age"class="form-label">Age</label> <br>
						<input 	type="number" 
								class="form-control" 
								id="age" 
								name="age" 
								value="<?= $user['age']?>" />
								<?php if($hasErrors && isset($_SESSION['errors']['age'])): ?>
						<p class="inputError"><?= $_SESSION['age']['remove_id_user'] ?></p>
					<?php endif; ?>
					</div>
					<div class="inf">
						<label for="adres"class="form-label">Adres</label> <br>
						<input 	type="text" 
								class="form-control" 
								id="adres" 
								name="adres" 
								value="<?= $user['adres']?>" />
								<?php if($hasErrors && isset($_SESSION['errors']['adres'])): ?>
						<p class="inputError"><?= $_SESSION['errors']['adres'] ?></p>
					<?php endif; ?>
					</div>			
					<button type="submit" class="btn btn-secondary my-5" style="margin: 0 auto; text-align: center; align-items: center;">
						Сохронить
					</button>
				</div>
			</div>
		</div>
	</form>

<?php

	unset($_SESSION['status']);
	unset($_SESSION['errors']);
	unset($_SESSION['message']);

	?>

	
</body>
</html>