<?php 
session_start();
if($_SESSION['pseudo'])
{
	$_SESSION['pseudo'];
	session_destroy();
	header('location:index.php');
}
else
{
	header('location:index.php');
}

 ?>