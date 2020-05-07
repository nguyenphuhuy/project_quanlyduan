<?php session_start(); require '../sql/connect.php'; ?>
<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
		$id = $_GET['id'];
		$sql= "DELETE  FROM contact WHERE id={$id}";
		$query = mysqli_query($con,$sql) or die('sql error'.mysqli_error($con));
		$_SESSION['success'] = 'Xóa thành công lời nhắn';
		header('location:list_contact.php');
	
?>