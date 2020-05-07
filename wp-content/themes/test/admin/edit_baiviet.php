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
	$sql = "SELECT * from cate";
	$query = mysqli_query($con,$sql);
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql_baiviet = "SELECT * from baiviet where id = $id";
		$query_baiviet = mysqli_query($con,$sql_baiviet);
		$result_baiviet = mysqli_fetch_assoc($query_baiviet);
	}
	
	if (isset($_POST['submit'])) {
		if ($_POST['cate_id']=='') {
				array_push($errors, 'Bạn chưa chọn danh mục');
		}
		if (empty($_POST['name'])) {
			array_push($errors, 'Bạn chưa nhập tên bài viết ');
		}
		if ($_POST['noidung']=='') {
			array_push($errors, 'Bạn chưa nhập nội dung bài viết');
		}
		if ($_POST['tomtat']=='') {
			array_push($errors, 'Bạn chưa nhập tóm tắt bài viết');
		}
		if ($_FILES['img']['size']!=''){
            $link_img="";
            if (($_FILES['img']['type']!='image/gif')&&($_FILES['img']['type']!='image/jpg')&&($_FILES['img']['type']!='image/png')&&($_FILES['img']['type']!='image/jpeg')) 
             {
                array_push($errors, "Ảnh không đúng định dạng");
                     
              }
            elseif($_FILES['img']['size']>1000000)
            {
                array_push($errors, "kích thước của ảnh nhỏ hơn 1MB");
                
            }
        }
		
		if (count($errors)==0) {
			if ($_FILES['img']['size']!=''){
				$img=$_FILES['img']['name'];
	            $link_img='upload_image/'.$img;
	            move_uploaded_file($_FILES['img']['tmp_name'], "../upload_image/".$img);
	        }else{
	        	$link_img=$_POST['img_old'];
	        }

			$cate_id = $_POST['cate_id'];
			$name = $_POST['name'];
			$noidung = $_POST['noidung'];
			$tomtat = $_POST['tomtat'];

			$sql2 = "UPDATE baiviet SET name = '$name',noidung = '$noidung',tomtat = '$tomtat' ,cate_id = $cate_id, image = '$link_img' where id = $id";
			$query2 = mysqli_query($con,$sql2) or die(mysqli_error($con));
			$_SESSION['success'] = 'Sửa thành công bài viết';
			header('location:list_baiviet.php');
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
                    <h2 style="color: #222222; ">Thêm bài viết</h2>
                </div>
                <form method="post" enctype="multipart/form-data">
                	<div class="row" style="margin-bottom: 10px;">
	                	<p><b>Chọn danh mục bài viết</b></p>
	                	
	                	<select class="form-control" name="cate_id">
	                		<option value="">Chọn</option>
                			<?php while ($result = mysqli_fetch_assoc($query)) : ?>
                				<?php if($result['id']==$result_baiviet['cate_id']) : ?>
                				<option selected="" style="text-transform: capitalize; " value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
	                			<?php else: ?>
	                				<option style="text-transform: capitalize; " value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
	                			<?php endif; ?>
                			<?php endwhile; ?> 
	                	</select>
	                </div>
                	<div class="row " style="margin-bottom: 10px;">
                		<p><b>Tên bài viết</b></p>
                		<input type="text" class="form-control" name="name" value="<?php if(isset($result_baiviet['name'])){echo $result_baiviet['name']; }?>">
	                </div>
	                 <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Nội dung</b></p>
	                	<textarea class="form-control" style="height: 130px;" name="noidung"><?php if(isset($result_baiviet['noidung'])){echo $result_baiviet['noidung']; }?></textarea>
	                </div>
	                  <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Tóm tắt</b></p>
	                	<textarea class="form-control" style="height: 130px;" name="tomtat"><?php if(isset($result_baiviet['tomtat'])){echo $result_baiviet['tomtat']; }?></textarea>
	                </div>
	                 <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Ảnh</b></p>
	                	<img style="width: 150px;padding-bottom: 10px;min-height: 40px;" src="../<?php echo $result_baiviet['image']; ?>">
	                	<p>(Chọn ảnh nếu như bạn muốn thay đổi)</p>
	                	<input type="hidden" name="img_old" value="<?php echo $result_baiviet['image']; ?>">
	                	<input type="file" name="img">
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

