<?php include('header.php');?>
<?php
if(isset($_POST['btn_save']))
	{
		$tmp_name = $_FILES["photo"]["tmp_name"];
		$photo = rand(1,1000).$_FILES["photo"]["name"];
		$folder_destination = 'photos/'.$photo;
			
		move_uploaded_file($tmp_name, $folder_destination);
		
		$name = $_POST["name"];
		$father_name = $_POST["father_name"];
		$email = $_POST["email"];
		$gendar = $_POST["gendar"];
		$hobby = implode(",", $_POST['hobby']);
		$address = $_POST['address'];
		$photo = $_POST['photo'];
		$password = md5($_POST['password']);
		$insert = "INSERT INTO registration SET
							name = '$name',
							father_name = '$father_name',
							gendar = '$gendar',
							address = '$address',
							hobby = '$hobby',
							email = '$email',
							photo = '$folder_destination',
							password = '$password'
									
						";
						mysql_query($insert) or die(mysql_error());		
		
	}
	
?>	
<body>

<div class="container">
<div class="row col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
      <h3 class="panel-title">
         Registration Form
      </h3>
   </div>
<div class="panel-body">
<form class="form-horizontal" method="post" enctype="multipart/form-data">
	<div class="form-group">
    <label for="inputName3" class="col-sm-2 control-label">Name</label>
	<div class="col-sm-10">
  		<input type="text" name="name"  class="form-control"  pattern="[^0-9]{2,80}" required />
  	</div>
	</div>
	
	<div class="form-group">
    <label for="inputFathersname3" class="col-sm-2 control-label">Fathers Name</label>
	<div class="col-sm-10">
  		<input type="text"  name="father_name" class="form-control" id="inputFathersname3" >
  	</div>
	</div>
	
	<div class="form-group">
    <label for="inputGender3" class="col-sm-2 control-label">Gendar:</label>
	<div class="col-sm-10">
  		<input type="radio" name="gendar" id="optionsRadios1" value="male" >
		Male
		<input type="radio" name="gendar" id="optionsRadios2" value="female">
		Female
  	</div>
	</div>
	
  
    <div class="form-group">
    <label for="inputHobby3" class="col-sm-2 control-label">Hobby</label>
    <div class="col-sm-10">
      <input type="checkbox" name="hobby[]" id="inputHobby3" value="Cricket">Cricket
	  <input type="checkbox" name="hobby[]" id="inputHobby3" value="Football">Football
	  <input type="checkbox" name="hobby[]" id="inputHobby3" value="Cycle">Cycle
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputAddress3" class="col-sm-2 control-label">Address</label>
	<div class="col-sm-10">
  		<textarea name="address" class="form-control" rows="3"></textarea>
  	</div>
	</div>
	
	<div class="form-group">
    <label for="inputPhoto3" class="col-sm-2 control-label">Photo</label>
	<div class="col-sm-10">
  		<input type="file"  name="photo"  id="inputPhoto3">
  	</div>
	</div>
	<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email"  name="email" class="form-control" id="inputEmail3" required >
    </div>
  </div>
	
	<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword3" pattern="(?=^.{8,14}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required >
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputConfirmPassword3" class="col-sm-2 control-label">Confirm Password</label>
    <div class="col-sm-10">
       <input type="password" name="password_confirm" class="form-control" id="password_confirm3" pattern="(?=^.{8,14}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required >
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="btn_save" value="Sign Up" class="btn btn-default" />
    </div>
  </div>
</form>
</div>
</div>
</div>
</div>
</body>
</html>
