<?php require 'header.php'; ?>
<?php require '../sql/connect.php'; ?>
<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql_user = "SELECT * from user where id = $id";
		$query_user = mysqli_query($con,$sql_user);
		$result_user = mysqli_fetch_assoc($query_user);
	}
	
	if (isset($_POST['submit'])) {
		$name=mysqli_real_escape_string($con,$_POST['name']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$status = $_POST['status'];
		// check name
		$current_name = $result_user['username'];
		$sql_name = "SELECT username from user where username = '$name' and username != '$current_name' ";
		$query_name = mysqli_query($con,$sql_name) or die(mysqli_error($con));
		if ($_POST['name']=='') {
			array_push($errors, 'Bạn nhập tên người dùng');
		}else{
			if (mysqli_num_rows($query_name)==1) {
					array_push($errors, 'Tên người dùng đã tồn tại ');
			}
		}

		// check email
			$current_email = $result_user['email'];
			$sql_check = "SELECT email from user where email = '$email' and email != '$current_email' ";
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
		if ($_POST['show']==1) {
			
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
		}else{
			if (isset($_POST['passwordOld'])) {
				
			}
		
		}
		
		
		if (count($errors)==0) {
			if ($_POST['show']==1) {
				$password=mysqli_real_escape_string($con,password_hash($_POST['password'], PASSWORD_BCRYPT) );
			}else{
				$password = $_POST['passwordOld'];
			}
			
			$sql="UPDATE user set username = '$name',email = '$email',password = '$password',active = $status where id = $id";
			$query = mysqli_query($con,$sql) or die(mysqli_error($con));
			$_SESSION['success'] = 'Sửa thành công người dùng';
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
                    <h2 style="color: #222222; ">Sửa user</h2>
                </div>
                <form method="post" enctype="multipart/form-data">
                	<div class="row " style="margin-bottom: 10px;">
                		<p><b>Tên người dùng</b></p>
                		<input type="text" class="form-control" name="name" value="<?php if(isset($result_user['username'])){echo $result_user['username']; }?>">
	                </div>
	                 <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Email</b></p>
	                	<input type="text" class="form-control" name="email" value="<?php if(isset($result_user['email'])){echo $result_user['email']; }?>">
	                </div>
	                <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Mật khẩu</b></p>
	                	<span>Đổi mật khẩu </span>
	                	<?php if(isset($_POST['show']) ) : 
	                		if ($_POST['show']==1) :
	                	?>
	                		<input checked="" type="radio" name="show" value="1" id="showChangPw">
	                		<span>Không đổi mật khẩu </span>
	                		<input  name="show" value="0" type="radio" id="showNoChangPw">
	                		<div id="NoChangPw" style="display: none;" >
	                			<input  disabled="" type="password" class="form-control"  value="<?php if(isset($result_user['password'])){echo $result_user['password']; }?>">
	                			<input   type="hidden" class="form-control" name="passwordOld" value="<?php if(isset($result_user['password'])){echo $result_user['password']; }?>">
	                		</div>
	                	</div>
	                		<div id="changPw" >
		                		<div class="row" style="margin-bottom: 10px;">
				                	<p><b>Mật khẩu</b></p>
				                	<input type="password" class="form-control" name="password" value="<?php if(isset($_POST['password'])){echo $_POST['password']; }?>">
				                </div>
				                <div class="row" style="margin-bottom: 10px;">
				                	<p><b>Nhập lại mật khẩu</b></p>
				                	<input type="password" class="form-control" name="cfpassword" value="<?php if(isset($_POST['cfpassword'])){echo $_POST['cfpassword']; }?>">
				                </div>  
		            		</div>
	                	
	                	<?php else : ?>
	                		<input  type="radio" name="show" value="1" id="showChangPw">
	                		<span>Không đổi mật khẩu </span>
	                		<input checked="" name="show" value="0" type="radio" id="showNoChangPw">
	                		<div id="NoChangPw"  >
	                			<input  disabled="" type="password" class="form-control"  value="<?php if(isset($result_user['password'])){echo $result_user['password']; }?>">
	                			<input   type="hidden" class="form-control" name="passwordOld" value="<?php if(isset($result_user['password'])){echo $result_user['password']; }?>">
	                		</div>
	                	</div>
	                		<div id="changPw" style="display: none;">
		                		<div class="row" style="margin-bottom: 10px;">
				                	<p><b>Mật khẩu</b></p>
				                	<input type="password" class="form-control" name="password" value="<?php if(isset($_POST['password'])){echo $_POST['password']; }?>">
				                </div>
				                <div class="row" style="margin-bottom: 10px;">
				                	<p><b>Nhập lại mật khẩu</b></p>
				                	<input type="password" class="form-control" name="cfpassword" value="<?php if(isset($_POST['cfpassword'])){echo $_POST['cfpassword']; }?>">
				                </div>  
		            		</div>
	                	<?php endif; else:?>
	                		<input  type="radio" name="show" value="1" id="showChangPw">
	                		<span>Không đổi mật khẩu </span>
	                		<input checked="" name="show" value="0" type="radio" id="showNoChangPw">
	                		<div id="NoChangPw"  >
	                			<input  disabled="" type="password" class="form-control"  value="<?php if(isset($result_user['password'])){echo $result_user['password']; }?>">
	                			<input   type="hidden" class="form-control" name="passwordOld" value="<?php if(isset($result_user['password'])){echo $result_user['password']; }?>">
	                		</div>
	                	</div>
	                		<div id="changPw" style="display: none;">
		                		<div class="row" style="margin-bottom: 10px;">
				                	<p><b>Mật khẩu</b></p>
				                	<input type="password" class="form-control" name="password" value="<?php if(isset($_POST['password'])){echo $_POST['password']; }?>">
				                </div>
				                <div class="row" style="margin-bottom: 10px;">
				                	<p><b>Nhập lại mật khẩu</b></p>
				                	<input type="password" class="form-control" name="cfpassword" value="<?php if(isset($_POST['cfpassword'])){echo $_POST['cfpassword']; }?>">
				                </div>  
		            		</div>
	                	<?php endif; ?>	
	                	
	                	
		            
		           
	            		
 					

	                 <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Trạng thái</b></p>
	                	<?php if($result_user['active']==1) : ?>
		                	<span>kích hoạt </span>
		                	<input checked="" type="radio" value="1" name="status">
		                	<span>Không kích hoạt </span>
		                	<input  type="radio" value="0" name="status">
		                <?php else: ?>
		                	<span>kích hoạt </span>
		                	<input  type="radio" value="1" name="status">
		                	<span>Không kích hoạt </span>
		                	<input checked="" type="radio" value="0" name="status">
		                <?php endif; ?>
	                </div> 
	                <div class="row" style="margin-bottom: 10px;">
	                	<input type="submit" class="btn btn-light" name="submit" value="Sửa">
	                </div>
	                	
                </form>
                
                <!-- /content -->
                <!-- /.row -->

                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
 <?php require 'footer.php'; ?>
 <script type="text/javascript">
 	$(document).ready(function(){

 		$("#showChangPw").click(function(){
		    $(this).data('clicked', true);
		    if($('#showChangPw').data('clicked')) {
			    $('#changPw').show();
			    $('#NoChangPw').hide();
			}
		});
 		$("#showNoChangPw").click(function(){
		    $(this).data('clicked', true);
		    if($('#showNoChangPw').data('clicked')) {
			    $('#changPw').hide();
			    $('#NoChangPw').show();
			}
		});
 	})
 </script>

