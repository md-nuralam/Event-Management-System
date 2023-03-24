<?php

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	require_once '../model/database.php';


	if(isset($_POST['update']))
	{
		editAdmin();
	}

	elseif(isset($_GET['req']) && $_GET['req'] == 'change_pass')
	{
		changePassword();
	}

	elseif(isset($_POST['change_picture']))
	{
		changePicture();
	}

	function getAllAdmin()
	{
		$query  = "SELECT * FROM `admin`";
		$admins = get($query);
		return $admins;
	}

	function editAdmin()
	{
		$id          = $_POST['id'];
		$name        = $_POST['name'];
		$email       = $_POST['email'];
		$gender      = $_POST['gender'];
		$b_date      = $_POST['b_date'];
		$address     = $_POST['address'];	
		$img         = $_SESSION['img'];

		$u_id        = $_POST['u_id'];
		$uname       = $_POST['uname'];
		$password    = $_POST['password'];	
		$user_type   = 'admin';
		$status      = $_POST['status'];

		$query  = "UPDATE admin SET name='$name', email='$email', uname='$uname', address='$address', b_date='$b_date', gender='$gender', img='$img' WHERE id=$id";
		$query2 = "UPDATE login SET name='$name', uname='$uname', password='$password', user_type='$user_type', status='$status' WHERE id=$u_id ";

		execute($query);
		execute($query2);

		header("Location:../views/admin_profile.php");
	}

	function changePassword()
	{
		$id          = $_SESSION['id'];
		$name        = $_SESSION['name'];
		$uname       = $_SESSION['uname'];
		$password    = $_SESSION['password'];	
		$user_type   = 'admin';
		$status      = $_SESSION['status'];

		$query = "UPDATE login SET name='$name', uname='$uname', password='$password', user_type='$user_type', status='$status' WHERE id=$id ";
		execute($query);

		header("Location:../views/change_password.php");
	}

	function changePicture()
	{
		$img         = $_POST["prev_image"];
		$id          = $_POST['id'];
		$name        = $_POST['name'];
		$email       = $_POST['email'];
		$uname       = $_POST['uname'];
		$gender      = $_POST['gender'];
		$b_date      = $_POST['b_date'];
		$address     = $_POST['address'];	

		if(file_exists($_FILES['img']['tmp_name']) || is_uploaded_file($_FILES['img']['tmp_name'])) 
		{
			$target_dir  = "../storage/admin_image/";
			$target_file = $target_dir . basename($_FILES["img"]["name"]);
			move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
			$img = $target_file;
		}

		$query  = "UPDATE admin SET name='$name', email='$email', uname='$uname', address='$address', b_date='$b_date', gender='$gender', img='$img' WHERE id=$id";

		execute($query);

		header("Location:../views/change_picture.php");
	}
	
 ?>