<?php
	@session_start();
	$server_conn = mysql_connect('localhost', 'root', '');
	mysql_select_db('test', $server_conn);
	if(isset($_POST['btn_save']))
	{

			$user_name = $_POST['user_name'];
			$password = md5($_POST['password']);
			$sqlValidate = "SELECT user_name FROM student_info WHERE user_name = '$user_name' AND password ='$password' ";
			$result = mysql_query($sqlValidate);
			$show = mysql_fetch_array($result);
			
			if(!empty ($show['user_name']) )
			{
					$_SESSION['user_name'] = $show['user_name'];
					header('location:index.php');
			}
			else
			{
				echo"Not Found";
			}
	}		
	
	else if ($_REQUEST['logout']=='ok')
	{
			unset($_SESSION['user_name']);
	}



?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<?php include('header.php');?>
<div class="container">
<div class="row col-md-6">
<div class="panel panel-default">
<div class="panel-heading">
      <h3 class="panel-title">
         User LogIn Form
      </h3>
   </div>
<div class="panel-body">
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="1">
    <tr>
      <td width="20%"><div align="right">User Name </div></td>
      <td width="4%"><div align="center"><strong>:</strong></div></td>
      <td width="20%"><label>
        <input type="text" name="user_name" />
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Password</div></td>
      <td><div align="center"><strong>:</strong></div></td>
      <td><label>
        <input type="password" name="password" />
      </label></td>
    </tr>
	<tr>
		<td><label>
          <input type="checkbox"> Remember me
        </label></td>
	</tr>	
    <tr>
      <td>&nbsp;</td>
      <td><div align="center"></div></td>
      <td><label>
        <input type="submit" name="btn_save" value="login" />
      </label></td>
    </tr>
  </table>
</form>
</div>
</div>
</div>
</div>
</body>
</html>
