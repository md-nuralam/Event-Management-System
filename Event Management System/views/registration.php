<?php

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    require_once ('../controllers/login_Controller.php');
    $users = getAllUser();
		
	$name="";
	$err_name="";

	$email="";
	$err_email="";

	$uname="";
	$err_uname="";

	$address="";
	$err_address="";

	$password="";
	$err_password="";

	$c_password="";
	$err_c_password="";

	$b_date="";
	$err_b_date="";

	$gender="";
	$err_gender="";

	$status="";

	$img="";
	$err_img="";

	$has_error=false;

	if(isset($_POST['submit'])) 
	{

		if(empty($_POST['name']))
		{
			$err_name="*Name Required";
			$has_error=true;
		}
		else
		{
			if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['name']))
			{
				$err_name="You Cannot Input Numeric Value";
				$has_error=true;
				$name=htmlspecialchars($_POST['name']);
			}
			else
			{
				$name=htmlspecialchars($_POST['name']);
				$_SESSION['name'] = $name;
			}
		}

		if(empty($_POST['email']))
		{
			$err_email="*Email Required";
			$has_error=true;
		}
		else
		{
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			{
			    $err_email="*Email Invalid";
			    $email=htmlspecialchars($_POST['email']);
				$has_error=true;
			}
			else
			{
				$email=htmlspecialchars($_POST['email']);
				$_SESSION['email'] = $email;
			}
		}

		if(empty($_POST['uname']))
		{
			$err_uname="*Username Required";
			$has_error=true;
		}
		else
		{
			foreach($users as $user)
			{
				if($user['uname'] == $_POST['uname'])
				{
					$err_uname="*Already Use This Username";
					$has_error=true;
				}
				else
				{
					$uname=htmlspecialchars($_POST['uname']);
					$_SESSION['uname'] = $uname;
				}
			}
		}

		if(empty($_POST['address']))
		{
			$err_address="*Address Required";
			$has_error=true;
		}
		else
		{
			$address=htmlspecialchars($_POST['address']);
			$_SESSION['address'] = $address;
		}

		if(empty($_POST['password']))
		{
			$err_password="*Password Required";
			$has_error=true;
		}
		else 
		{
			if ( !preg_match('@[^\w]@', $_POST['password'] ) )
			{
				$err_password="*Password must contain at least one of the special characters";
				$has_error=true;
				$password=htmlspecialchars($_POST['password']);
			}
			else
			{
				if(strlen($_POST['password']) < 8)
				{
					$err_password="*Password not be less than 8 characters";
					$has_error=true;
					$password=htmlspecialchars($_POST['password']);
				}
				else
				{
					$password=htmlspecialchars($_POST['password']);
				}
			}
		}

		if(empty($_POST['c_password']))
		{
			$err_c_password="*Confirm Password Required";
			$has_error=true;
		}
		else 
		{
			if ( $_POST['password'] != $_POST['c_password'])
			{
				$err_c_password="*Password & Confirm Password Not Match!!";
				$has_error=true;
			}
			else
			{
				$c_password=htmlspecialchars($_POST['c_password']);
				$_SESSION['password'] = sha1($c_password);
			}
		}

		if(empty($_POST['b_date']))
		{
			$err_b_date="*Date Required";
			$has_error=true;
		}
		else
		{
			if(time() < strtotime('+18 years', strtotime($_POST['b_date'])))
			{
				$err_b_date="*You are under 18 years of age";
				$b_date=htmlspecialchars($_POST['b_date']);
				$has_error=true;
			}
			else
			{
				$b_date=htmlspecialchars($_POST['b_date']);
				$_SESSION['b_date'] = $b_date;
			}
		}

		if(empty($_POST['gender']))
		{
			$err_gender="*Gender Required";
			$has_error=true;
		}
		else
		{
			$gender=htmlspecialchars($_POST['gender']);
			$_SESSION['gender'] = $gender;
		}

		$_SESSION['status'] = $_POST['status'];
		
		if(empty(basename($_FILES["img"]["name"])))
		{
			$err_img="*Image Required";
			$has_error=true;
		}
		else
		{
			$target_dir    = "../storage/customer_image/";
			$target_file   = $target_dir . basename($_FILES["img"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
			{
			    $err_img="*Sorry, Only JPG, JPEG & PNG files are allowed";
				$has_error=true;
			    $uploadOk = 0;
			}
			// else
			// {
			// 	if ($_FILES["img"]["size"] < 40000000)
			// 	{
			// 		$err_img="*Sorry, Your image file size maximum 4 MB";
			// 		$has_error=true;
			// 	    $uploadOk = 0;
			// 	}
			// }
		}

		if(!$has_error && $uploadOk == 1)
		{
			move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
			$_SESSION['img'] = $target_file;
			
            header("Location:../controllers/customer_Controller.php?req=add_local_customer");
        }
	}

	if(isset($_POST['reset'])) 
	{
		$name="";
		$err_name="";

		$email="";
		$err_email="";

		$uname="";
		$err_uname="";

		$address="";
		$err_address="";

		$password="";
		$err_password="";

		$c_password="";
		$err_c_password="";

		$b_date="";
		$err_b_date="";

		$gender="";
		$err_gender="";

		$status="";
		
		$img="";
		$err_img="";
	}
?>

<!DOCTYPE html>
<html>
    <head>   
        <title>Registration</title>
        <?php include_once('bootstrap.php'); ?>
    </head>
    <body>

    <?php include_once('index_header.php'); ?>
    <main>
        <section class="pb-5">
			<div class="container d-flex justify-content-center card w-75">
				<div class="card-header">
            		<h2 class="text-center">R E G I S T R A T I O N</h2>
            	</div>
				<div class="card-body">
					<form action="" method="POST" class="row" enctype="multipart/form-data">

					  <div class="col-md-6 pb-1">
					    <label for="name" class="form-label">Name</label>
					    <input type="text" name="name" class="form-control" id="name" value="<?php echo $name;?>" onkeyup="checkName()" onblur="checkName()">
					    <span style="color:red" id="err_name"><?php echo $err_name;?></span>
					  </div>

					  <div class="col-md-6 pb-1">
					    <label for="email" class="form-label">Email</label>
					    <input type="text" name="email" class="form-control" id="email" value="<?php echo $email;?>" onkeyup="checkEmail()" onblur="checkEmail()">
					    <span style="color:red" id="err_email"><?php echo $err_email;?></span>
					  </div>

					  <div class="col-md-6 pb-1">
					    <label for="uname" class="form-label">Username</label>
					    <input type="text" name="uname" class="form-control" id="uname" value="<?php echo $uname;?>" onkeyup="checkUsername()" onblur="checkUsername()" >
					    <span style="color:red" id="err_uname"><?php echo $err_uname;?></span>
					  </div>

					  <div class="col-md-6 pb-1">
					    <label for="address" class="form-label">Address</label>
					    <textarea name="address" class="form-control h-25" id="address" onkeyup="checkAddress()" onblur="checkAddress()"><?php echo $address;?></textarea>
					    <span style="color:red" id="err_address"><?php echo $err_address;?></span>
					  </div>

					   <div class="col-md-6 pb-1">
					    <label for="password" class="form-label">Password</label>
					    <input type="password" name="password" class="form-control" id="password" value="<?php echo $password;?>" onkeyup="checkPassword()" onblur="checkPassword()">
					    <input type="checkbox" onclick="passwordShow()"> Show Password <br>
					    <span style="color:red" id="err_password"><?php echo $err_password;?></span>
					  </div>

					  <div class="col-md-6 pb-1">
					    <label for="c_password" class="form-label">Confirm Password</label>
					    <input type="password" name="c_password" class="form-control" id="c_password" value="<?php echo $c_password;?>" onkeyup="checkConfirmPassword()" onblur="checkConfirmPassword()">
					    <input type="checkbox" onclick="confirmPasswordShow()"> Show Password<br>
					    <span style="color:red" id="err_c_password"><?php echo $err_c_password;?></span>
					  </div>
					  
					  <div class="col-md-6 pb-1">
					    <label for="gender" class="form-label">Gender</label>
					    <select id="gender" name="gender" class="form-select" onkeyup="checkGender()" onblur="checkGender()">
						    <option selected disabled value="NULL">Select Gender</option>
		                    <option <?php if($gender == 'Male') echo 'selected'; ?> value="Male">Male</option>
		                    <option <?php if($gender == 'Female') echo 'selected'; ?> value="Female">Female</option>
		                    <option <?php if($gender == 'Other') echo 'selected'; ?> value="Other">Other</option>
					    </select>
						<span style="color:red" id="err_gender"><?php echo $err_gender;?></span>
					  </div>

					  <div class="col-md-6 pb-1">
					    <label for="b_date" class="form-label">Birth Date</label>
					    <input type="date" name="b_date" class="form-control" id="b_date" value="<?php echo $b_date;?>" onkeyup="checkBirthDate()" onblur="checkBirthDate()">
					    <span style="color:red" id="err_b_date"><?php echo $err_b_date; ?></span>
					  </div>

					  <div class="col-6 pb-1">
					  	<label for="img" class="form-label">Profile Picture</label>
					    <input type="file" name="img" class="form-control" id="img" onkeyup="checkProfilePicture()" onblur="checkProfilePicture()">
					    
					    <span style="color:red" id="err_img"><?php echo $err_img;?></span>
					  </div>
					  
					  <input type="hidden" name="status" value="2">

					  <div class="col-12 pt-2 pb-1">
					    <input type="submit" name="submit" class="btn btn-primary" value="Submit"> &nbsp;&nbsp; <input type="submit" name="reset" class="btn btn-primary" value="Reset">
					  </div>

					</form>
				</div>
			</div>
		</section>
    </main>

    <?php include_once('index_footer.php'); ?>
    <?php include_once('javascript.php'); ?>

    <script type="text/javascript">

		function checkName()
        {
            if (document.getElementById("name").value == "")
            {
                document.getElementById("err_name").innerHTML = "*Name Required";
                document.getElementById("err_name").style.color = "red";
                document.getElementById("name").style.borderColor = "red";
            }
            else if(!isNaN(document.getElementById("name").value))
            {
                
                document.getElementById("err_name").innerHTML="*The first letter Numeric Value cannot be given";
                document.getElementById("err_name").style.color = "red";
                document.getElementById("name").style.borderColor = "red";
            }
            else
            {
                document.getElementById("err_name").innerHTML = "";
                document.getElementById("name").style.borderColor = "black";
            } 
        }

        function checkEmail()
        {
            var email       = document.getElementById("email").value;
            var atposition  = email.indexOf("@");  
            var dotposition = email.lastIndexOf(".");

            if (document.getElementById("email").value == "")
            {
                document.getElementById("err_email").innerHTML = "*Email Required";
                document.getElementById("err_email").style.color = "red";
                document.getElementById("email").style.borderColor = "red";
            }
            else if( atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length )
            {
                document.getElementById("err_email").innerHTML="*Please enter a valid e-mail address";
                document.getElementById("err_email").style.color = "red";
                document.getElementById("email").style.borderColor = "red";
            }
            else
            {
                document.getElementById("err_email").innerHTML = "";
                document.getElementById("email").style.borderColor = "black";
            } 
        }

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

        function checkAddress()
        {
            if (document.getElementById("address").value == "")
            {
                document.getElementById("err_address").innerHTML = "*Address Required";
            }
            else
            {
                document.getElementById("err_address").innerHTML = "";
            } 
        }

        function checkPassword()
        {
        	var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        	var password = document.getElementById("password").value;

            if (document.getElementById("password").value == "")
            {
                document.getElementById("err_password").innerHTML = "*Password Required";
            }
            else if( !format.test(password) )
            {
            	document.getElementById("err_password").innerHTML = "*Password must contain at least one of the special characters";
            }
            else if( document.getElementById("password").value.length < 8)
            {
            	document.getElementById("err_password").innerHTML = "*Password not be less than 8 characters";
            }
            else
            {
                document.getElementById("err_password").innerHTML = "";
            } 
        }

        function checkConfirmPassword()
        {
            if (document.getElementById("c_password").value == "")
            {
                document.getElementById("err_c_password").innerHTML = "*Confirm Password Required";
            }
            else if( document.getElementById("c_password").value != document.getElementById("password").value)
            {
            	document.getElementById("err_c_password").innerHTML = "*Password & Confirm Password Not Match!!";
            }
            else
            {
                document.getElementById("err_c_password").innerHTML = "";
            } 
        }

        function checkGender()
        {
            if (document.getElementById("gender").value == "NULL")
            {
                document.getElementById("err_gender").innerHTML = "*Gender Required";
            }
            else
            {
                document.getElementById("err_gender").innerHTML = "";
            } 
        }

        function checkBirthDate()
        {
        	var birthDate = document.getElementById("b_date").value;
        	var birthYear = birthDate.slice(0, 4);

        	var today     = new Date();
        	var todayYear = today.getFullYear();

        	var age = todayYear - birthYear;

            if (document.getElementById("b_date").value == "")
            {
                document.getElementById("err_b_date").innerHTML = "*Date Required";
            }
            else if( age < 18)
            {
            	document.getElementById("err_b_date").innerHTML = "*You are under 18 years of age";
            }
            else
            {
                document.getElementById("err_b_date").innerHTML = "";
            } 
        }

        function checkProfilePicture()
        {
            if (document.getElementById("img").value == "")
            {
                document.getElementById("err_img").innerHTML = "*Image Required";
            }
            else
            {
                document.getElementById("err_img").innerHTML = "";
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

        function confirmPasswordShow()
        {
        	var value = document.getElementById("c_password");

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