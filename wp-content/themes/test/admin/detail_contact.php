<?php
session_start();
if ($_SESSION['level']==1) {
  require 'header.php';
}else{
  require 'header_user.php';
}
?>
<?php require '../sql/connect.php'; ?>
<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "SELECT * from contact where id = $id";
		$query = mysqli_query($con,$sql);
		$result = mysqli_fetch_assoc($query);
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
                	<?php if(isset($_SESSION['success'])) :?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION['success'];
						        unset($_SESSION['success']);
                            ?>
                        </div>
                    <?php endif ?>
                    <h2 style="color: #222222; ">Chi tiết lời nhắn</h2>
                </div>
               	<div class="row">
               		<h4><b>Id</b></h4>
               		<p><?php echo $result['id']; ?></p>

               		<h4><b>Tên</b></h4>
               		<p><?php echo $result['name']; ?></p>

               		<h4><b>Email</b></h4>
               		<p><?php echo $result['email']; ?></p>

               		<h4><b>Số điện thoại</b></h4>
               		<p><?php echo $result['phone']; ?></p>

               		<h4><b>Ngày sinh</b></h4>
               		<p><?php echo $result['date_time']; ?></p>

               		<h4><b>Nội dung</b></h4>
               		<p><?php echo $result['content']; ?></p>

               		<h4><b>Ngày đăng</b></h4>
               		<p><?php echo $result['time_upload']; ?></p>
               		<button type="button" class="btn btn-outline-primary"><a style="text-decoration: none;" href="list_contact.php" >Trở về danh sách lời nhắn</a></button>
               		
               	</div>
                
                <!-- /content -->
                <!-- /.row -->

               
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
 <?php require 'footer.php'; ?> 

