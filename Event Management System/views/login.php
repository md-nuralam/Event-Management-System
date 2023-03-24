<?php 
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }

		$uname="";
		$err_uname="";

		$password="";
		$err_password="";

		$err_msg="";
		$has_error=false;

		if(isset($_POST['submit'])) 
		{

			if(empty($_POST['uname']))
			{
				$err_uname="*Username Required";
				$has_error=true;
			}
			else
			{
				$uname=$_POST['uname'];
			}

			if(empty($_POST['password']))
			{
				$err_password="*Password Required";
				$has_error=true;
			}
			else 
			{
				$password=$_POST['password'];
			}

			if(!$has_error)
			{
				require_once '../controllers/login_Controller.php';

				$users = getAllUser();

                foreach($users as $user)
                {
                	$password = sha1($_POST['password']);

                	if ( $_POST['uname'] == $user["uname"] && $password == $user["password"] ) 
                	{
                		$user_type = $user["user_type"];
                		$status    = $user["status"];
                		if ( $user_type == 'admin' )
                		{
                			$_SESSION['user_type'] = $user_type;
                			$uname                 = $user["uname"];
							setcookie("loggedinuser",$uname,time()+18000);
                			header("location:admin.php");
                		}

						else
						{
							$err_msg = "* User Not Exits";
						}
                	} 
                	else
					{
						$err_msg="*Username or Password Incorrect";
					}
                    
                }  
			}

		}
	 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<?php include_once('bootstrap.php'); ?>
	</head>
	<body>

		<?php include_once('index_header.php'); ?>

		<main>
			
			<div class="container d-flex justify-content-center card w-50">
				<div class="card-header">
					<h4 class="text-center">Login</h4>
				</div>

				<form action="" method="POST" class="row">

				<div class="card-body">
					

					  <div class="col-12 pb-1">
					    <label for="uname" class="form-label">Username</label>
					    <input type="text" name="uname" class="form-control" id="uname" value="<?php echo $uname;?>" onkeyup="checkUsername()" onblur="checkUsername()">
					    <span style="color:red" id="err_uname"><?php echo $err_uname;?></span>
					  </div>

					   <div class="col-12 pb-2">
					    <label for="password" class="form-label">Password</label>
					    <input type="password" name="password" class="form-control" id="password" onkeyup="checkPassword()" onblur="checkPassword()">
					    <span style="color:red" id="err_password"><?php echo $err_password;?></span>
					  </div>
					  <div class="col-12 pb-1">
					  	<input type="checkbox" onclick="passwordShow()"> Show Password
					  </div>

				</div>

				<div class="card-footer">
					<div class="col-12 d-flex justify-content-end">
					    <input type="submit" name="submit" class="btn btn-primary" value="Sign In">
					</div>
					<span style="color:red"><?php echo $err_msg;?></span>
				</div>

				</form>
			</div>

		</main>

		<?php include_once('index_footer.php'); ?>
		<?php include_once('javascript.php'); ?>

		<script type="text/javascript">

			function checkUsername()
            {
                if (document.getElementById("uname").value == "")
                {
                    document.getElementById("err_uname").innerHTML = "*Username Required";
                }
                else
                {
                    document.getElementById("err_uname").innerHTML = "";
                } 
            }

            function checkPassword()
            {
                if (document.getElementById("password").value == "")
                {
                    document.getElementById("err_password").innerHTML = "*Password Required";
                }
                else
                {
                    document.getElementById("err_password").innerHTML = "";
                } 
            }

            function passwordShow()
	        {
	        	var value = document.getElementById("password");

				if (value.type === "password")
				{
					value.type = "text";
				} 
				else 
				{
					value.type = "password";
				}
	        }
		</script>

	</body>
</html>