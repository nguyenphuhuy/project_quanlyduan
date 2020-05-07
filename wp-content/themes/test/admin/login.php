<?php
session_start();
require '../sql/connect.php';

	$errors=array();
	if (isset($_POST['submit'])) {
			
			$username=mysqli_real_escape_string($con,$_POST['username']);
			$matkhau=mysqli_real_escape_string($con,$_POST['password']);
			if (empty($_POST['username'])) {
				array_push($errors, 'Tài khoản không được trống');
			}
			if (empty($_POST['password'])) {
				array_push($errors, 'Mật khẩu không được trống');
			}

			if (count($errors)==0) {
				$sql="SELECT * FROM user WHERE username='{$username}' ";

				$query=mysqli_query($con,$sql) or die('errors:'.mysqli_error($con));
				$result = mysqli_fetch_assoc($query);
				if (password_verify($matkhau, $result['password'])) {
					if ($result['active']==0) {
						$mess='Tài khoản của bạn chưa được kích hoạt';
					}else{
						$_SESSION['level']=$result['level'];
						$_SESSION['id']=$result['id'];
						$_SESSION['username']=$result['username'];
						if ($result['level']==1) {
							header('location:index.php');
							exit();
						}else{
							header('location:index_user.php');
							exit();
						}
						
						
					}

					
				}
				else{
					$mess='Tài khoản hoặc mật khẩu không đúng';
				}
			}
		}else{
			$_POST['username']='';
		}

		if (isset($_SESSION['username'])) {
			header('location:index.php');
			exit();
		}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<title>Login and Logout</title>
	
	</style>
</head>
<body>
	<div class="header" >
		<h2>LOGIN</h2>
	</div>
	<form method="post" >
		<!-- display validation errors here-->

		<?php include('errors.php');?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php if(isset($_POST['username'])){echo $_POST['username']; }?>">
		</div>		
		<div class="input-group">
			<label>Password</label>
			<input type="Password" name="password">
		</div>		
		<div class="input-group">			
			<button type="submit" name="submit" class="btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
</body>
</html>

