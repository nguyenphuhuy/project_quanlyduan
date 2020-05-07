<?php
	session_start();
	require '../sql/connect.php';
	
	$errors=array();
	if (isset($_POST['submit'])) {
			if (isset($_POST['username'])) {
			    $username=mysqli_real_escape_string($con,$_POST['username']);
			}
			if (isset($_POST['password'])) {
				$password=mysqli_real_escape_string($con,password_hash($_POST['password'], PASSWORD_BCRYPT) );
			}
			if (isset($_POST['email'])) {
				$email=mysqli_real_escape_string($con,$_POST['email']);
			}
			// check email
			$sql_check = "SELECT email from user where email = '$email' ";
			$query_check = mysqli_query($con,$sql_check) or die(mysqli_error($con));

			//check user
			$sql_check2 = "SELECT username from user where username = '$username' ";
			$query_check2 = mysqli_query($con,$sql_check2) or die(mysqli_error($con));

			if (empty($_POST['username'])) {
				array_push($errors, 'Tài khoản không được trống');
			}else{
				if (mysqli_num_rows($query_check2)==1) {
						array_push($errors, 'Tên đã tồn tại ');
				}
			}
			if (empty($_POST['password'])) {
				array_push($errors, 'Mật khẩu không được trống');
			}else{
				if (strlen($_POST['password'])<6) {
					array_push($errors, 'Mật khẩu phải có ít nhất 6 kí tự');
				}
			}
			if ($_POST['cfpassword']=='') {
				array_push($errors, 'Bạn chưa nhập lại mật khẩu');
			}else{
				if ($_POST['cfpassword'] != $_POST['password']) {
					array_push($errors, 'Mật khẩu nhập lại không chính xác');
				}
			}
			
			if (empty($_POST['email'])) {
				array_push($errors, 'Email không được trống');
			}else{
				if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
					array_push($errors, 'Email không đúng định dạng');
				}else{
					if (mysqli_num_rows($query_check)==1) {
						array_push($errors, 'Email đã tồn tại');
					}
				}
			}
			if (count($errors)==0) {
				$sql="INSERT into user(username,password,email,level,active) values ('$username','$password','$email',2,0)";

				$query=mysqli_query($con,$sql) or die('errors:'.mysqli_error($con));
				$result = mysqli_fetch_assoc($query);
				echo "<script type='text/javascript'>
					alert('Bạn đã đăng ký thành công vui lòng đợi cho đến khi admin kích hoạt tài khoản');
					window.location='login.php';
				</script>";
			
			}
		}else{
			$_POST['username']='';
		}

		if (isset($_SESSION['username'])) {
			header('location:index.php');
		}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<title>Register</title>
	
	</style>
</head>
<body>
	<div class="header" >
		<h2>REGISTER</h2>
	</div>
	<form method="post" >
		<!-- display validation errors here-->

		<?php include('errors.php');?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $_POST['username']; ?>">
		</div>		
		<div class="input-group">
			<label>Password</label>
			<input type="Password" name="password" value="<?php if(isset($_POST['password'])){echo $_POST['password']; }?>">
		</div>	
		<div class="input-group">
			<label>Confirm password</label>
			<input type="Password" name="cfpassword" value="<?php if(isset($_POST['cfpassword'])){echo $_POST['cfpassword']; }?>">
		</div>	
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email']; }?>">
		</div>
		<div class="input-group">			
			<button type="submit" name="submit" class="btn">Register</button>
			<a style="padding-left: 20px;" href="login.php">Back to Login</a>
		</div>
		
	</form>
</body>


</html>