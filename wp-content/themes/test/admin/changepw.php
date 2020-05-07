<?php require 'header.php'; ?>
<?php require '../sql/connect.php'; ?>
<?php
	$sql = "SELECT * from user where id = '{$_SESSION['id']}'";
	$query = mysqli_query($con,$sql);
	$result = mysqli_fetch_assoc($query);

	if (isset($_POST['submit'])) {
		if (empty($_POST['oldpass'])) {
				array_push($errors, 'Bạn chưa nhập mật khẩu cũ');
		}else{
			if (!password_verify($_POST['oldpass'], $result['password'])) {
				array_push($errors,'Mật khẩu cũ không chính xác');
			}
		}
		if (empty($_POST['newpass'])) {
			array_push($errors, 'Bạn chưa nhập mật khẩu mới');
		}else{
			if (strlen($_POST['newpass'])<6) {
				array_push($errors, 'Mật khẩu phải có ít nhất 6 kí tự');
			}else{
				if ($_POST['newpass'] == $_POST['oldpass']) {
					array_push($errors, 'Mật khẩu mới trùng với mật khẩu cũ');
				}
			}
		}
		if ($_POST['cfpass']=='') {
			array_push($errors, 'Bạn chưa nhập lại mật khẩu');
		}else{
			if ($_POST['cfpass'] != $_POST['newpass']) {
				array_push($errors, 'Mật khẩu nhập lại không chính xác');
			}
		}

		$oldpass = $_POST['oldpass'];
		$newpass = password_hash($_POST['newpass'], PASSWORD_BCRYPT);
		// check old pass is true or not
		if (count($errors)==0) {
			$sql2 = "UPDATE user SET password = '{$newpass}' where id = '{$_SESSION['id']}' ";
			$query2 = mysqli_query($con,$sql2);
			$_SESSION['success'] = 'Đổi mật khẩu thành công';
			header('location:index.php');
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
                    <h2 style="color: #222222; ">Đổi mật khẩu</h2>
                </div>
                <form method="post">
                	<div class="row " style="margin-bottom: 10px;">
                		<p><b>Mật khẩu cũ</b></p>
                		<input type="password" class="form-control" name="oldpass" value="<?php if(isset($_POST['oldpass'])){echo $_POST['oldpass']; }?>">
	                </div>
	                 <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Mật khẩu mới</b></p>
	                	<input type="password" class="form-control" name="newpass" value="<?php if(isset($_POST['newpass'])){echo $_POST['newpass']; }?>">
	                </div>
	                 <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Nhập lại mật khẩu</b></p>
	                	<input type="password" class="form-control" name="cfpass" >
	                </div>
	                <div class="row" style="margin-bottom: 10px;">
	                	<input type="submit" class="btn btn-light" name="submit">
	                </div>
                </form>
                
                <!-- /content -->
                <!-- /.row -->

                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
 <?php require 'footer.php'; ?> 