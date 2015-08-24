<?php
@session_start();

if(empty($_SESSION['auth_id']))
{
	header("location:login.php?msg=Unauthorized Access");
}
