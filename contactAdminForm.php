<?php session_start(); 


 	require_once 'common/checkAdmin.php';
    require_once 'common/connect.php';	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php require_once 'common/inhead.php'; ?>
	<style>
	</style>
</head>
<body>
	<?php require_once 'common/navAdmin.php' ?>
	<form action="contactAdmin.php" method="POST" enctype="multipart/form-data" class="container">

		<div class="form-group mt-5 mb-3">
	        <label for="phone">Phone nomber</label>
	        <input name="phone" type="text" class="phone" id="phone">
	    </div>
	    <div class="form-group ">
	            <label for="contentInput">Content</label>
	            <textarea name="content" class="form-control" id="contentInput" width="400px" rows="5"></textarea>
	    </div>
	    <div class="field-group my-3">
                <label for="imageC">Image</label>
                <input type="file" id="imageC" name="imageC" />
        </div>
        <button type="submit" class="btn btn-primary">GOOOOO</button>
	</form>

</body>
</html>