
<?php

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	require_once '../model/database.php';

	function getAllUser()
	{
		$query="SELECT * FROM `user_info`";
		$users=get($query);
		return $users;
	}

	
 ?>