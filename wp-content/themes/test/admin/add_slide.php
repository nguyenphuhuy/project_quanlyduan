<?php require 'header.php'; ?>
<?php require '../sql/connect.php'; ?>
<?php
	
	if (isset($_POST['submit'])) {
		if ($_POST['order']=='') {
			array_push($errors, 'Bạn chưa nhập thứ tự');
		}else{
			if (!is_numeric($_POST['order'])) {
				array_push($errors, 'Thứ tự nhập vào phải là số');
			}
		}
		if ($_FILES['img']['size']==''){
            $link_img="";
            array_push($errors, "Bạn chưa chọn ảnh cho Slide");
        }else{
                //kt image
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
			$img=$_FILES['img']['name'];
            $link_img='upload_image/'.$img;
            move_uploaded_file($_FILES['img']['tmp_name'], "../upload_image/".$img);

			$order = $_POST['order'];

			$sql2 = "INSERT into slide(order_id,image) values('$order','$link_img')";
			$query2 = mysqli_query($con,$sql2) or die(mysqli_error($con));
			$_SESSION['success'] = 'Thêm thành công Slide';
			header('location:list_slide.php');
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
                    <h2 style="color: #222222; ">Thêm mới slide</h2>
                </div>
                <form method="post" enctype="multipart/form-data">
	                 <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Thứ tự</b></p>
	                	<input type="text" class="form-control" name="order" value="<?php if(isset($_POST['order'])){echo $_POST['order']; }?>">
	                </div>
	                <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Thêm Slide</b></p>
	                	<input type="file" name="img">
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


?>
