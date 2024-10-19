<?php session_start();

require_once 'common/checkAuth.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$id = $_POST['id'] ?? '';
		$name = $_POST['name'] ?? '';
		$phone = $_POST['phone'] ?? '';
		$age = $_POST['age'] ?? '';
		$adres = $_POST['adres'] ?? '';

		$errors = [];

		if(empty($name)){
			$errors['name'] = "Name is empty";
		}

		if(empty($phone)){
			$errors['phone'] = 'Phone is empty';
		} elseif(strlen($phone) < 11 || strlen($phone) > 12){
			$errors['phone'] = 'Invalid phone format';
		}

		

		if(empty($adres)){
			$errors['adres'] = 'Adres is empty';
		}

		if($errors){
			$_SESSION['status'] = 'error';
			$_SESSION['errors'] = $errors;
			header('Location:editProfile.php');
		}
		else {
			require_once 'common/connect.php';
			$result = editProfile($id, $name, $phone, $age, $adres);

			if($result){

    			$updatedUser = getUserById($id);

    
    			$_SESSION['user'] = $updatedUser;

				$_SESSION['status'] = 'successEditProfile';
				$_SESSION['message'] = 'Successfully edit profile ';
				header("Location: profile.php");
				exit();
			}
			else {
				$_SESSION['status'] = 'error';
				$_SESSION['errors'] = 'Failed to edit profile';
				header('Location: editProfile.php');
			}
		}
	}
?>