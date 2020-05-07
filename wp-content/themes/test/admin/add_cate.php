<?php require 'header.php'; ?>
<?php require '../sql/connect.php'; ?>
<?php
	$sql = "SELECT * from cate where parent_id = 0";
	$query = mysqli_query($con,$sql);
	// $result = mysqli_fetch_all($query,MYSQLI_ASSOC);

	if (isset($_POST['submit'])) {
		if ($_POST['parent_id']=='') {
				array_push($errors, 'Bạn chưa chọn danh mục');
		}
		if (empty($_POST['name_cate'])) {
			array_push($errors, 'Bạn chưa nhập tên danh mục');
		}
		if (empty($_POST['sapo'])) {
			array_push($errors, 'Bạn chưa nhập tóm tắt');
		}
		if ($_POST['order']=='') {
			array_push($errors, 'Bạn chưa nhập thứ tự');
		}else{
			if (!is_numeric($_POST['order'])) {
				array_push($errors, 'Thứ tự nhập vào phải là số');
			}
		}
		if ($_FILES['img']['size']==''){
            $link_img="";
            array_push($errors, "Bạn chưa chọn ảnh cho danh mục");
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
            $link_img='upload_image/cate_'.$img;
            move_uploaded_file($_FILES['img']['tmp_name'], "../upload_image/cate_".$img);


			$parent_id = $_POST['parent_id'];
			$name_cate = $_POST['name_cate'];
			$sapo = $_POST['sapo'];
			$order = $_POST['order'];

			$sql2 = "INSERT into cate(name,order_id,parent_id,sapo,image) values('$name_cate',$order,$parent_id,'$sapo','$link_img')";
			$query2 = mysqli_query($con,$sql2) or die(mysqli_error($con));
			$_SESSION['success'] = 'Thêm thành công danh mục bài viết';
			header('location:list_danhmucbaiviet.php');
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
                    <h2 style="color: #222222; ">Thêm danh mục bài viết</h2>
                </div>
                <form method="post" enctype="multipart/form-data">
                	<div class="row" style="margin-bottom: 10px;">
	                	<p><b>Chọn danh mục</b></p>
	                	<!-- <?php echo $_POST['parent_id']; ?> -->
	                	<!-- <select class="form-control" name="parent_id">
	                		<option value="">Chọn</option>
                			 <?php if ($_POST['parent_id']!='') :
                				if ($_POST['parent_id']==0) : ?>
        						<option selected='' value="0">Danh mục cha</option>
                			<?php	
                				else: ?>
                				<option value="0">Danh mục cha</option>
                			<?php endif; else: ?> 
                				<option value="0">Danh mục cha</option>
                			<?php endif; ?>
                			<?php
                			if (isset($_POST['parent_id'])) {
                				cate_parent($result,0,'--',$_POST['parent_id']);
                			}else{
                				cate_parent($result);
                			}
                			 ?> 
	                	</select> -->

	                	<select class="form-control" name="parent_id">
	                		<option value="">Chọn</option>
	                		<!-- if select danh muc -->
	                		<?php if($_POST['parent_id']!=''):
	                			 		if($_POST['parent_id']==0): ?>
                							<option value="0" selected="">Danh mục cha </option>
	        						<?php else: ?>
                							<option value="0">Danh mục cha </option>
                				<?php 	endif;
            					  else: ?>
            						<option value="0">Danh mục cha </option>
            				<?php endif; ?>

                			<?php while ($result = mysqli_fetch_assoc($query)) : ?>
                				<?php if($result['id']==$_POST['parent_id']) : ?>
                				<option selected="" style="text-transform: capitalize; " value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
	                			<?php else: ?>
	                				<option style="text-transform: capitalize; " value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
	                			<?php endif; ?>
                			<?php endwhile; ?>
	                	</select>
	                </div>
                	<div class="row " style="margin-bottom: 10px;">
                		<p><b>Tên danh mục</b></p>
                		<input type="text" class="form-control" name="name_cate" value="<?php if(isset($_POST['name_cate'])){echo $_POST['name_cate']; }?>">
	                </div>
	                 <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Thứ tự</b></p>
	                	<input type="text" class="form-control" name="order" value="<?php if(isset($_POST['order'])){echo $_POST['order']; }?>">
	                </div>
	                 <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Tóm tắt</b></p>
	                	<textarea style="height: 150px" class="form-control" name="sapo"><?php if(isset($_POST['sapo'])){echo $_POST['sapo']; }?></textarea>
	                </div>
	                <div class="row" style="margin-bottom: 10px;">
	                	<p><b>Ảnh</b></p>
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
<?php 
    function cate_parent($data,$parent=0,$str="--",$select=0){
    foreach($data as $value){
        $id=$value['id'];
        $name=$value['name'];
        if ($value['parent_id']==$parent) {
            // sẽ chọn dc cái selected theo id minh muốn
            if ($select!=0 && $id==$select) {
                echo "<option value='$id' selected=''>$str $name</option>";
            }else{
                echo "<option value='$id'>$str $name</option>";
            }
            // đệ quy đến các tk con 
            cate_parent($data,$id,$str."--",$select);
        }
        // nếu như không còn $value['parent_id']==$parent nữa thì nó sẽ nhảy ra thằng cha tiếp theo 
    }
}

?>
