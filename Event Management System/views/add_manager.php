<?php 
        include_once('session_user.php');

		$name="";
		$err_name="";

		$id="";
		$err_id="";
		

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

			
			
			}

			

			
			

			
		

		if(isset($_POST['reset'])) 
		{
			$name="";
			$err_name="";

			$e="";
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
			$err_status="";

			$img="";
			$err_img="";
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Manager</title>
	<?php include_once('bootstrap.php'); ?>
</head>
<body>
	<?php include_once('header.php'); ?>
	

	<section class="col-md-8 pt-5 pb-5">
		<div class="pb-5">
            <div class="container d-flex justify-content-center card">
            	<div class="card-header">
            		<h2 class="text-center">A D D &nbsp; &nbsp; M A N A G E R</h2>
            	</div>
				<div class="card-body">
					<form method="POST" class="row" action="" enctype="multipart/form-data">

					  <div class="col-md-6 pb-1">
					    <label for="name" class="form-label">Name</label>
					    <input type="text" name="name" class="form-control" id="name" value="<?php echo $name;?>">
					    <span style="color:red"><?php echo $err_name;?></span>
					  </div>

					  <div class="col-md-6 pb-1">
					    <label for="email" class="form-label">Email</label>
					    <input type="text" name="email" class="form-control" id="email" value="<?php echo $email;?>">
					    <span style="color:red"><?php echo $err_email;?></span>
					  </div>

					  <div class="col-md-6 pb-1">
					    <label for="uname" class="form-label">Username</label>
					    <input type="text" name="uname" class="form-control" id="uname" value="<?php echo $uname;?>">
					    <span style="color:red"><?php echo $err_uname;?></span>
					  </div>

					  <div class="col-md-6 pb-1">
					    <label for="address" class="form-label">Address</label>
					    <textarea name="address" class="form-control h-25" id="address"><?php echo $address;?></textarea>
					    <span style="color:red"><?php echo $err_address;?></span>
					  </div>

					   <div class="col-md-6 pb-1">
					    <label for="password" class="form-label">Password</label>
					    <input type="password" name="password" class="form-control" id="password" value="<?php echo $password;?>">
					    <span style="color:red"><?php echo $err_password;?></span>
					  </div>

					  <div class="col-md-6 pb-1">
					    <label for="c_password" class="form-label">Confirm Password</label>
					    <input type="password" name="c_password" class="form-control" id="c_password" value="<?php echo $c_password;?>">
					    <span style="color:red"><?php echo $err_c_password;?></span>
					  </div>
					  
					  <div class="col-md-6 pb-1">
					    <label for="gender" class="form-label">Gender</label>
					    <select id="gender" name="gender" class="form-select">
						    <option selected disabled value="NULL">Select Gender</option>
		                    <option <?php if($gender == 'Male') echo 'selected'; ?> value="Male">Male</option>
		                    <option <?php if($gender == 'Female') echo 'selected'; ?> value="Female">Female</option>
		                    <option <?php if($gender == 'Other') echo 'selected'; ?> value="Other">Other</option>
					    </select>
						<span style="color:red"><?php echo $err_gender;?></span>
					  </div>

					  <div class="col-md-6 pb-1">
					    <label for="status" class="form-label">Status</label>
					    <select id="status" name="status" class="form-select">
						<option selected disabled value="NULL">Select Status</option>
		                    <option <?php if($status == 1 ) echo 'selected'; ?> value="1">Active</option>
		                    <option <?php if($status == 2 ) echo 'selected'; ?> value="2">In-Active</option>
					    </select>
						<span style="color:red"><?php echo $err_status;?></span>
					  </div>

					  <div class="col-md-6 pb-1">
					    <label for="b_date" class="form-label">Birth Date</label>
					    <input type="date" name="b_date" class="form-control" id="b_date" value="<?php echo $b_date;?>">
					    <span style="color:red"><?php echo $err_b_date; ?></span>
					  </div>

					  <div class="col-6 pb-1">
					  	<label for="img" class="form-label">Profile Picture</label>
					  	<input type="file" name="img" class="form-control" id="img">
					    <span style="color:red"><?php echo $err_img; ?></span>
					  </div>
					  
					  <div class="col-12 pt-2 pb-1">
					    <input type="submit" name="submit" class="btn btn-primary" value="Submit"> &nbsp;&nbsp; <input type="submit" name="reset" class="btn btn-primary" value="Reset">
					  </div>

					</form>
				</div>
			</div>
		</div>
    </section>
</main>

        <?php include_once('javascript.php'); ?>
        <?php include_once('index_footer.php'); ?>
	
</body>
</html>