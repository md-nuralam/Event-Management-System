<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    if(!isset($_COOKIE['loggedinuser']))
    {
        header("Location:login.php");
    }
    
    $c_uname           = $_COOKIE['loggedinuser'];
    $_SESSION['uname'] = $c_uname;
    $uname             = $_SESSION['uname'];

    
    
?>