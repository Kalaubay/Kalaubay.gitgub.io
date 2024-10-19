<?php

	session_start();

	require_once 'common/checkAdmin.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$title = $_POST['title'] ?? '';
		$content = $_POST['content'] ?? '';
		$category_id = $_POST['category_id'] ?? '';

		$user_id = $user['id'];

		// if(empty($title)){
		// 	$errors['title'] = "Title is empty";
		// }
		// if(empty($content)){
		// 	$errors['content'] = "Content is empty";
		// }

		// echo "<pre>";
		// print_r($_FILES);
		// echo "<pre>";

		$video = $_FILES['video']; // $avatar is an array

		$time = time(); // $time = 1231232134
        $video_name = $time . $video['name']; // $avatar_name = 1231232134girl.png
        $video_tmp_name = $video['tmp_name']; // $avatar_tmp_name = C:\xampp\tmp\phpAE3C.tmp
        $video_destination_path = 'images/posts/' . $video_name;

        $allowed_files = ['mp4'];
        $extention = explode('.', $video_name); // [1231232134girl, png]
        $extention = end($extention); // $extention = 'png'

        if(in_array($extention, $allowed_files)){
            if($video){
                move_uploaded_file($video_tmp_name, $video_destination_path);
            }
        }else{
            $errors['video'] = "AAA File Should Be PNG, JPG, JPEG or WEBP";
        }



        $test = $_FILES['test']; // $avatar is an array

		$time = time(); // $time = 1231232134
        $test_name = $time . $test['name']; // $avatar_name = 1231232134girl.png
        $test_tmp_name = $test['tmp_name']; // $avatar_tmp_name = C:\xampp\tmp\phpAE3C.tmp
        $test_destination_path = 'test/' . $test_name;

        $allowed_files = ['pdf', 'dosx'];
        $extention = explode('.', $test_name); // [1231232134girl, png]
        $extention = end($extention); // $extention = 'png'

        if(in_array($extention, $allowed_files)){
            if($test){
                move_uploaded_file($test_tmp_name, $test_destination_path);
            }
        }else{
            $errors['test'] = "File , JPG or DOSX";
        }

        $c_work = $_FILES['test']; // $avatar is an array

        $time = time(); // $time = 1231232134
        $c_work_name = $time . $c_work['name']; // $avatar_name = 1231232134girl.png
        $c_work_tmp_name = $c_work['tmp_name']; // $avatar_tmp_name = C:\xampp\tmp\phpAE3C.tmp
        $c_work_destination_path = 'test/' . $c_work_name;

        $allowed_files = ['pdf', 'dosx'];
        $extention = explode('.', $c_work_name); // [1231232134girl, png]
        $extention = end($extention); // $extention = 'png'

        if(in_array($extention, $allowed_files)){
            if($c_work){
                move_uploaded_file($c_work_tmp_name, $c_work_destination_path);
            }
        }else{
            $errors['test'] = "File , JPG or DOSX";
        }



        require_once 'common/connect.php';
		$result = createPost($title, $content, $category_id, $user_id, $video_name, $test_name, $c_work_name);

		if($result)
			header("Location: indexAdmin.php");

	}

?>