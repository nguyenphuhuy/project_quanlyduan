<?php require 'header_user.php'; ?>
<?php require '../sql/connect.php'; ?>
        <div id="page-wrapper">

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
                    <h3 style="color: #222222; ">Welcome to Web Admin</h3>
                </div>
                <!-- /content -->
                <!-- /.row -->

                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
 <?php require 'footer.php'; ?>       
   