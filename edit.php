
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php include('header.php');
	$member_id = $_REQUEST['member_id'];
	$select = "SELECT * FROM registration WHERE member_id = $member_id ";
	$array = mysql_query($select);
	$show = mysql_fetch_array($array);
	$hobbies = explode (",", $show['hobby'] );
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
    <label for="inputName3" class="col-sm-2 control-label">Name</label>
	<div class="col-sm-10">
  		<input type="text" name="name"  class="form-control"  pattern="[^0-9]{2,80}" value="<?php echo $show['name'];?>" required />
  	</div>
	</div>
	
	<div class="form-group">
    <label for="inputFathersname3" class="col-sm-2 control-label">Fathers Name</label>
	<div class="col-sm-10">
  		<input type="text"  name="father_name" class="form-control" id="inputFathersname3" value="<?php echo $show['father_name'];?>" >
  	</div>
	</div>
	
	<div class="form-group">
    <label for="inputGender3" class="col-sm-2 control-label">Gendar:</label>
	<div class="col-sm-10">
  		<input type="radio" name="gendar" id="optionsRadios1" value="Male" <?php if (strtolower($show['gendar'])=='male'){echo 'checked';} ?> >
		Male
		<input type="radio" name="gendar" id="optionsRadios2" value="Female" <?php if (strtolower($show['gendar'])=='female'){echo 'checked';} ?> >
		Female
  	</div>
	</div>
	
  
    <div class="form-group">
    <label for="inputHobby3" class="col-sm-2 control-label">Hobby</label>
    <div class="col-sm-10">
      <input type="checkbox" name="hobby[]" id="optionsCheckbox1" value="Cricket" <?php if(in_array('Cricket', $hobbies) ) {echo 'checked';}?> >
	  Cricket
	  <input type="checkbox" name="hobby[]" id="optionsCheckbox2" value="Football" <?php if(in_array('Football', $hobbies) ) {echo 'checked';}?> >
	  Football
	  <input type="checkbox" name="hobby[]" id="optionsCheckbox3" value="Cycle" <?php if(in_array('Cycle', $hobbies) ) {echo 'checked';}?> >
	  Cycle
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputAddress3" class="col-sm-2 control-label">Address</label>
	<div class="col-sm-10">
  		<textarea name="address" class="form-control" rows="3"> <?php echo $show['address'];?>  </textarea>
  	</div>
	</div>
	<div class="form-group">
    <label for="inputPhoto3" class="col-sm-2 control-label">Photo</label>
	<div class="col-sm-10">
  		<?php
	  		$photo = is_file($show['photo']) ? $show['photo'] : 'images/no_photo.jpg'; 
	  ?>
	  <img src="<?php echo $photo; ?>" width="55" height="65" />
        <input type="file" name="photo" />
		<input type="hidden" name="old_photo" value="<?php echo $show['photo'];?>" />
  	</div>
	</div>
	
	<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email"  name="email" class="form-control" id="inputEmail3" value="<?php echo $show['email'];?>" required >
    </div>
  </div>
	
</form>
</div>
</div>
</div>
</div>
</body>
</html>
<?php
	$member_id = $_REQUEST['member_id'];
	if(isset($_POST['btn_save']))
	{

		$name = $_POST['name'];
		$father_name = $_POST['father_name'];
		$email = $_POST['email'];
		$gendar = $_POST['gendar'];
		$hobby = implode(",", $_POST['hobby']);
		$address = $_POST['address'];
		
		
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

