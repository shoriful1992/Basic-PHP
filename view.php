
<?php
	$member_id = $_REQUEST['member_id'];
	if(isset($_POST['btn_save']))
	{

		$name = $_POST["name"];
		$father_name = $_POST["father_name"];
		$email = $_POST["email"];
		$gendar = $_POST["gendar"];
		$hobby = implode(",", $_POST['hobby']);
		$address = $_POST['address'];
		$password = md5($_POST['password']);
		if($_FILES['photo']['tmp_name']!='')
		{
			$old_photo = $_POST['old_photo'];
			unlink($old_photo);
			
			$tmp_name = $_FILES["photo"]["tmp_name"];
			$photo = rand(1,1000).$_FILES["photo"]["name"];
			$folder_destination = 'photos/'.$photo;
			
			move_uploaded_file($tmp_name, $new_photo);
		}
		else
		{
			$new_photo = $_POST["old_photo"];
		}
		$insert = "UPDATE registration SET
							name = '$name',
							father_name = '$father_name',
							gendar = '$gendar',
							address = '$address',
							hobby = '$hobby',
							email = '$email',
							photo = '$new_photo',
							password = '$password'
							
							WHERE member_id = $member_id
									
						";
						mysql_query($insert) or die(mysql_error());		
		
	}
	
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

</head>

<body>
<?php include('header.php');
	$member_id = $_REQUEST['member_id'];
	$select = "SELECT * FROM registration WHERE member_id=$member_id ";
	$array = mysql_query($select);
	$show = mysql_fetch_array($array);
	//$hobbies = explode(",", $show['hobby']);	
?>

<div class="container">
<div class="row col-md-6">
<div class="panel panel-default">
<div class="panel-heading">
      <h3 class="panel-title">
         Registration Form
      </h3>
   </div>
<div class="panel-body">
<form class="form-horizontal" method="post">
	<div class="form-group">
    <label for="inputPhoto3" class="col-sm-2 control-label">Photo</label>
	<div class="col-sm-10">
  		<?php
	  		$photo = is_file($show['photo']) ? $show['photo'] : 'images/no_photo.jpg'; 
	  ?>
	  <img src="<?php echo $photo; ?>" width="55" height="65" />
  	</div>
	</div>
	
	<div class="form-group">
    <label for="inputName3" class="col-sm-2 control-label">Name</label>
	<div class="col-sm-10">
  		<?php echo $show['name'];?>
  	</div>
	</div>
	
	<div class="form-group">
    <label for="inputFathersname3" class="col-sm-2 control-label">Fathers Name</label>
	<div class="col-sm-10">
  		<?php echo $show['father_name'];?>
  	</div>
	</div>
	
	<div class="form-group">
    <label for="inputGender3" class="col-sm-2 control-label">Gendar:</label>
	<div class="col-sm-10">
  		<?php echo $show['gendar'];?>
  	</div>
	</div>
	
  
    <div class="form-group">
    <label for="inputHobby3" class="col-sm-2 control-label">Hobby</label>
    <div class="col-sm-10"><?php echo $show['hobby'];?>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputAddress3" class="col-sm-2 control-label">Address</label>
	<div class="col-sm-10"><?php echo $show['address'];?>
  	</div>
	</div>
	<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <?php echo $show['email'];?>"
    </div>
  </div>

</form>
</div>
</div>
</div>
</div>
</body>
</html>


