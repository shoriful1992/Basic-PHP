<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php include('header.php');?>
<table width="100%" border="1">
	<tr>
		<td width="9%"><div align="center">Ser</div></td>
		<td width="18%"><div align="center">Name</div></td>
		<td width="16%"><div align="center">Address</div></td>
		<td width="15%"><div align="center">Email</div></td>
		<td width="15%"><div align="center">Password</div></td>
	</tr>
<?php
	$d_member_id = $_REQUEST['d_member_id'];
	
	if(!empty ($d_member_id) )
	{
			$select = "SELECT * FROM registration WHERE member_id = $d_member_id";
			$array = mysql_query($select);
				
	}
	
			$select = "SELECT * FROM registration ";
			$array = mysql_query($select);				
			$ser = 1;
			while($show = mysql_fetch_array($array) )
		{
	
?>
	<tr>
		<td><div align="center"><?php echo $ser++; ?> </div></td>
		<td><div align="center"><?php echo $show['name']; ?></div></td>
		<td><div align="center"><?php echo $show['address']; ?></div></td>
		<td><div align="center"><?php echo $show['email']; ?></div></td>
		<td><div align="center"><?php echo $show['Password']; ?></div></td>
		<td><div align="center">
		<a href="view.php?member_id=<?php echo $show['member_id']; ?>">View</a> -
		<a href="edit.php?member_id=<?php echo $show['member_id']; ?>">Edit</a> -
		<a href="index.php?d_member_id=<?php echo $show['member_id']; ?>">Delete</a></div>
		</td>
		
	</tr>
	<?php } ?>
</table>
<p> &nbsp;</p>		
</body>
</html>
