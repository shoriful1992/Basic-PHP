<?php
	require_once('connection.php');
	if(isset($_POST['btnLogin']))
	{
		
				$email       = $_POST['email'];
				$password    = md5($_POST['password']);
				$sqlValidate = "SELECT * FROM registration WHERE email='$email' AND password='$password' ";
				$result      = mysql_query($sqlValidate) or die(mysql_error());
				$numRow      = mysql_num_rows($result);
				if( $numRow > 0 )
				{
					$show = mysql_fetch_array($result);
					@session_start();
					$_SESSION['auth_id']    = $show['member_id'];
					$_SESSION['auth_name']  = $show['name'];
					$_SESSION['auth_email'] = $show['email'];
					header('location:home.php');
				}
				else
				{
					header("location:login.php?msg=Unauthorized Log In");
				}
		}
		

?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<div class="container">
<div class="row col-md-6">
<div class="panel panel-default">
<div class="panel-heading">
      <h3 class="panel-title">
         User LogIn Form
      </h3>
   </div>
<div class="panel-body">
 <form class="form-horizontal" method="post" action="">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
	  <a href="#">Forgot your password?</a>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="remember_me"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="btnLogin">Sign in</button>  
    </div>
  </div>
 <div class="form-group">
   <div class="col-md-12 control">
      <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
       Don't have an account! 
    	<a href="registration.php" onClick="$('#loginbox').hide(); $('#signupbox').show()">
         Sign Up Here
     	</a>
	</div>
  </div>
   </div>    
</form>
</div>
</div>
</div>
</div>
</body>
</html>
