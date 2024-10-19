<?php session_start();
	
	require_once 'common/checkAdmin.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$phone = $_POST['phone'] ?? '';
		$content = $_POST['content'] ?? '';
		$imageC = $_POST['content'] ?? '';

		if(empty($phone)){
			$errors['errors'] = 'Phone is empty';
		}
		if(empty($content)){
			$errors['content'] = 'Content is empty';
		}
		if(empty($imageC)){
			$errors['imageC'] = 'Image is empty';
		}

		$imageC = $_FILES['imageC']; // $avatar is an array

		$imageC = time(); // $time = 1231232134
        $imageC_name = $time . $imageC['name']; // $avatar_name = 1231232134girl.png
        $imageC_tmp_name = $imageC['tmp_name']; // $avatar_tmp_name = C:\xampp\tmp\phpAE3C.tmp
        $imageC_destination_path = 'images/contact/' . $imageC_name;

        $allowed_files = ['png', 'jpg', 'jpeg', 'webp'];
        $extention = explode('.', $imageC_name); // [1231232134girl, png]
        $extention = end($extention); // $extention = 'png'

        if(in_array($extention, $allowed_files)){
            if($avatar['size'] < 1000000){
                move_uploaded_file($imageC_tmp_name, $imageC_destination_path);
            }else{
            	$errors['imageC'] = "File Size Too Big. Chose Less Than 1mb File..!";
            }
        }else{
            $errors['imageC'] = "File Should Be PNG, JPG, JPEG or WEBP";
        }


        if($errors){
			$_SESSION['status'] = 'error';
        	$_SESSION['errors'] = $errors;
        	header('Location:contactAdminForm.php');
		}
		else {
			require_once 'common/connect.php';
			$result = creat_contact($phone, $content, $imageC_name);

			if($result){
				$_SESSION['status'] = 'success';
	        	$_SESSION['message'] = 'Good';
	        	header('Location:indexAdmin.php');
			}
		}
	}




 ?>