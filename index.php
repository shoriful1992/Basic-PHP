
<?php include('header.php');?>

<table width="100%"  class="table table-striped">
<thead>
	<tr>
		<th>Ser</th>
		<th>Photo</th>
		<th>Name</th>
		<th>Email</th>
		<th>Address</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
<?php
	$d_member_id = $_REQUEST['d_member_id'];
	$photo = $_REQUEST['photo'];
	
	if(!empty ($d_member_id) )
	{
			$select = "DELETE FROM registration WHERE member_id=$d_member_id ";
			$array = mysql_query($select);
			is_file($photo) ? unlink($photo) : '';
				
	}
	
			$select = "SELECT * FROM registration ";
			$array = mysql_query($select);				
			$ser = 1;
			while($show = mysql_fetch_array($array) )
		{
	
?>
	<tr>
		<td><?php echo $ser++; ?> </td>
		<td>
		<?php
			$photo = is_file($show['photo']) ? $show['photo'] : 'images/no-image.png';
		?>
		<img src="<?php echo $photo;?>" width="55" height="55" class="img-circle" /></td>
		<td><?php echo $show['name']; ?></td>
		<td><?php echo $show['email']; ?></td>
		<td><?php echo $show['address']; ?></td>
		<td>
		<a class="btn btn-default" href="view.php?member_id=<?php echo $show['member_id']; ?>">View</a>
		<a class="btn btn-default" href="edit.php?member_id=<?php echo $show['member_id']; ?>">Edit</a> 
		<a class="btn btn-danger" href="index.php?d_member_id=<?php echo $show['member_id']; ?>&photo=<?php echo $show['photo'];?>" onClick="return confirm('Are you sure you want to delete')">Delete</a>
		</td>
	</tr>
	<?php } ?>
	</tbody>
</table>
		
</body>
</html>
