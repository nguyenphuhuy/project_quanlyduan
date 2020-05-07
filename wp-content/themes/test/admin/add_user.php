<?php require 'header.php'; ?>
<?php require '../sql/connect.php'; ?>
<?php

	if (isset($_POST['submit'])) {
		$name=mysqli_real_escape_string($con,$_POST['name']);
		$password=mysqli_real_escape_string($con,password_hash($_POST['password'], PASSWORD_BCRYPT) );
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$status = $_POST['status'];
		// check name
		$sql_name = "SELECT username from user where username = '$name' ";
		$query_name = mysqli_query($con,$sql_name) or die(mysqli_error($con));
		if ($_POST['name']=='') {
			array_push($errors, 'Bạn nhập tên người dùng');
		}else{
			if (mysqli_num_rows($query_name)==1) {
					array_push($errors, 'Tên người dùng đã tồn tại ');
			}
		}

		// check email
			$sql_check = "SELECT email from user where email = '$email'";
			$query_check = mysqli_query($con,$sql_check) or die(mysqli_error($con));

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

		if (empty($_POST['password'])) {
			array_push($errors, 'Bạn chưa nhập mật khẩu');
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
		
		if (count($errors)==0) {

			$sql="INSERT into user(username,password,email,level,active) values ('$name','$password','$email',2,$status)";
			$query = mysqli_query($con,$sql) or die(mysqli_error($con));
			$_SESSION['success'] = 'Thêm thành công người dùng';
			header('location:list_user.php');
		}
		
	}
?>
<div id="page-wrapper">
	<?php if (count($errors)>0):?>
		<div class="alert alert-danger">
			<?php foreach ($errors as $value): ?>
                    <p><?php echo $value; ?></p>
                <?php endforeach; ?>
		</div>
	<?php endif ?>

	
            <div class="container-fluid">
                
                 <!-- content -->
                <div class="row">
                    <h2 style="color: #222222; ">Thêm mới user</h2>
                </div>
                <form method="post" enctype="multipart/form-data">
                	<div class="row " style="margin-bottom: 10px;">
                		<p><b>Tên người dùng</b></p>
                		<input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name']; }?>">
	                </div>
	                 <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Email</b></p>
	                	<input type="text" class="form-control" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email']; }?>">
	                </div>
	                <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Mật khẩu</b></p>
	                	<input type="password" class="form-control" name="password" value="<?php if(isset($_POST['password'])){echo $_POST['password']; }?>">
	                </div>
	                <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Nhập lại mật khẩu</b></p>
	                	<input type="password" class="form-control" name="cfpassword" value="<?php if(isset($_POST['cfpassword'])){echo $_POST['cfpassword']; }?>">
	                </div>  
	                 <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Trạng thái</b></p>
	                	<span>kích hoạt </span>
	                	<input type="radio" value="1" name="status">
	                	<span>Không kích hoạt </span>
	                	<input checked="" type="radio" value="0" name="status">
	                </div> 
	                <div class="row" style="margin-bottom: 10px;">
	                	<input type="submit" class="btn btn-light" name="submit" value="Thêm mới">
	                </div>
	                	
                </form>
                
                <!-- /content -->
                <!-- /.row -->

                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
 <?php require 'footer.php'; ?> 

