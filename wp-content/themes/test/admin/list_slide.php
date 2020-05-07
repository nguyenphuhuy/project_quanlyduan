<?php require 'header.php'; ?>
<?php require '../sql/connect.php'; ?>
<?php
	$sql = "SELECT * from slide";
	$query = mysqli_query($con,$sql);
    //php of pagination
    $limit_item = 2;
    if (isset($_GET['trang'])) {
        $current_page = $_GET['trang'];
    }else{
        $current_page = 1;
    }
    $start = ($current_page-1)*$limit_item;
    $sql_pg = "SELECT * from slide limit $start,$limit_item";
    $query_pg = mysqli_query($con,$sql_pg) or die(mysqli_error($con));
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
                    <h2 style="color: #222222; ">Danh sách Slide</h2>
                </div>
               	<div class="row">

	                <table class="table table-dark">
					  <thead>
					    <tr>
					      <th scope="col">id</th>
					      <th scope="col">Thứ tự</th>
					      <th scope="col">Slide</th>
					      <th scope="col">Xóa</th>
					      <th scope="col">Sửa</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php while ($result = mysqli_fetch_assoc($query_pg)) : ?>
						    <tr>
						    	<th scope="row"><?php echo $result['id'];?></th>
						      <td><?php echo $result['order_id'];?></td>
						     	<td><img style="width: 700px;height: 300px;" src="../<?php echo $result['image'];?>"></td>
						      <td><a onclick="return confirm('Bạn có thực sự muốn xóa ?');" href="delete_slide.php?id=<?php echo $result['id'];?>"><img style="width: 20px;"  src="../image/icon_delete.png"></a></td>
						      <td><a href="edit_slide.php?id=<?php echo $result['id'];?>"><img style="width: 20px;" src="../image/icon_edit.png"></a></td>
						    </tr>
					    <?php endwhile; ?>
					  </tbody>
					</table>

					<!-- pagination -->
					<nav style="display: flex;justify-content: center;" aria-label="Page navigation example ">
					  <ul class="pagination">
						<?php 
					       $total = mysqli_num_rows($query); 
					       $page  = ceil($total/$limit_item);
					       if ($current_page == 1) {
					       	echo " <li class='page-item'><a class='page-link' href='list_slide.php?trang=$current_page'>Previous</a></li>";
					          
					       }else{
					        $prev = $current_page-1;
					        echo " <li class='page-item'><a class='page-link' href='list_slide.php?trang=$prev'>Previous</a></li>";
					       }
					       
					       for ($i=1; $i <= $page ; $i++) { 
					       	   echo "<li class='page-item'><a class='page-link' href='list_slide.php?trang=$i'>$i</a></li>";
					       }

					       if ($current_page == $page) {
					       	echo "<li class='page-item'><a class='page-link' href='list_slide.php?trang=$current_page'>Next</a></li>";
					       }else{
					        $next = $current_page+1;
					        echo "<li class='page-item'><a class='page-link' href='list_slide.php?trang=$next'>Next</a></li>";
					       }

					       ?>
					  </ul>
					</nav>
					<!-- end pagination -->
               	</div>
                
                <!-- /content -->
                <!-- /.row -->

               
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
 <?php require 'footer.php'; ?> 

