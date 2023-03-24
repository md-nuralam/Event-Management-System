<?php 
        include_once('session_user.php');

		$title="";
		$err_title="";

		$description="";
		$err_description="";

		$status="";
		$err_status="";

		$img="";
		$err_img="";

		$has_error=false;

		if(isset($_POST['submit'])) 
		{

			if(empty($_POST['title']))
			{
				$err_title="*Title Required";
				$has_error=true;

			}
			else
			{
				if(! preg_match("/^[a-zA-Z\s]+$/", $_POST['title']))
				{
					$err_title="You Cannot Input Numeric Value";
					$has_error=true;
					$title=htmlspecialchars($_POST['title']);
				}
				else
				{
					$title=htmlspecialchars($_POST['title']);
					$_SESSION['title'] = $title;
				}
			}

			
			if(empty($_POST['description']))
			{
				$err_description="*Description Required";
				$has_error=true;
			}
			else
			{
				$description=htmlspecialchars($_POST['description']);
				$_SESSION['description'] = $description;
			}

			if(empty($_POST['status']))
			{
				$err_status="*Status Required";
				$has_error=true;
			}
			else
			{
				$status=htmlspecialchars($_POST['status']);
				$_SESSION['status'] = $status;
			}

			if(empty(basename($_FILES["img"]["name"])))
			{
				$err_img="*Image Required";
				$has_error=true;
			}
			else
			{
				$target_dir    = "../storage/event_image/";
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
				// 	if ($_FILES["img"]["size"] < 4000000)
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
			
	            header("Location:../controllers/event_Controller.php?req=add_event");
	        }
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Event</title>
	<?php include_once('bootstrap.php'); ?>
</head>
<body>
	<?php include_once('header.php'); ?>
	

	<section class="col-md-8 pt-5">
        <div class="container d-flex justify-content-center card pb-5">
        	<div class="card-header">
        		<h2 class="text-center">A D D &nbsp; E V E N T</h2>
        	</div>
			<div class="card-body">
				<form method="POST" class="row" action="" enctype="multipart/form-data">

				  <div class="col-12 pb-1">
				    <label for="title" class="form-label">Event Title</label>
				    <input type="text" name="title" class="form-control" id="title" value="<?php echo $title;?>">
				    <span style="color:red"><?php echo $err_title;?></span>
				  </div>

				  <div class="col-12 pb-1">
				    <label for="description" class="form-label">Description</label>
				    <textarea name="description" class="form-control" rows="8" id="description"><?php echo $description;?></textarea>
				    <span style="color:red"><?php echo $err_description;?></span>
				  </div>

				  <div class="col-12 pb-1">
				    <label for="status" class="form-label">Status</label>
				    <select id="status" name="status" class="form-select">
					<option selected disabled value="NULL">Select Status</option>
	                    <option <?php if($status == 1 ) echo 'selected'; ?> value="1">Active</option>
	                    <option <?php if($status == 2 ) echo 'selected'; ?> value="2">In-Active</option>
				    </select>
					<span style="color:red"><?php echo $err_status;?></span>
				  </div>

				  <div class="col-6 pb-1">
				  	<label for="img" class="form-label">Event Picture</label>
				  	<input type="file" name="img" class="form-control" id="img">
				    <span style="color:red"><?php echo $err_img; ?></span>
				  </div>
				  
				  <div class="col-12 pt-2 pb-1">
				    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
				  </div>

				</form>
			</div>
		</div>
    </section>
</main>

	<?php include_once('javascript.php'); ?>
	<?php include_once('index_footer.php'); ?>
	
</body>
</html>