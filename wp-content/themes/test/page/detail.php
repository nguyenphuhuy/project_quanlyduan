 <?php require '../sql/connect.php'; ?>
<?php 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql_baiviet = "SELECT * from baiviet where id = $id";
        $query_baiviet = mysqli_query($con,$sql_baiviet);
        if (mysqli_num_rows($query_baiviet) > 0) {
            $result_baiviet = mysqli_fetch_assoc($query_baiviet);
        }else{
            header('location:../index.php');
        }
        
    }   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Trường Đại Học Nguyễn Tất Thành</title>
    <!-- <link rel="stylesheet" type="text/css" href="../bootstrap/css/sinhvien.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style type="text/css">
        .page .home{
            overflow: visible;
        }
        .page .home .collapse-handmade{
            z-index: 1 !important;
        }
        .home .slide .collapse-handmade ul{
          padding-left: 15px;
        }
        .fix-a{
            color: black;
            font-size: 14px;
        }
        .fix-a:hover{
            color: #aa914d;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="home">
        <div class="head head-desktop">
            <div class="wrapper row top_head">
                <div class="col-md-3 hotline">
                    HOTLINE: <span id="hotline-1">0902.298.300 - 0906.298.300</span>
                    
                </div>
                <div class="col-md-5 ">
                    <a class="col" href="sinhvien.html">SINH VIÊN</a>
                    <a class="col" href="sinhvien.html">GIẢNG VIÊN</a>
                    <a class="col" href="sinhvien.html">ĐÀO TẠO QUỐC TẾ</a>
                </div>
                <div class="col-md-4 input d-flex justify-content-end">
                    <?php 
                            if (isset($_GET['submit_search'])) {
                                if ($_GET['key']!='') {
                                    $_SESSION['key'] = $_GET['key'];
                                    header('location:page/search.php');
                                }
                            }
                            ?>
                            <form method="get" action="search.php">
                                <input style="color: white;" type="text" name="key" placeholder="Tìm kiếm thông tin ">
                                <button style="background: unset;border: none;color: white;" type="submit" name="submit_search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                                
                            </form>
                    
                    <a href=""><img src="http://ntt.edu.vn/web/frontend/images/ico-flagen.jpg"></a>
                </div>
            </div>
        </div>
        <div class="head-responsive">
                    <div class="row">
                        <div class="col left">
                            <i style="color: white;" id="showMenuRes" class="fa fa-bars c-blue-a5"></i>
                        </div>
                        <div class="col-10 input">
                            <?php 
                            if (isset($_GET['submit_search'])) {
                                if ($_GET['key']!='') {
                                    $_SESSION['key'] = $_GET['key'];
                                    header('location:page/search.php');
                                }
                            }
                            ?>
                            <form method="get" action="search.php">
                                <input style="color: white;" type="text" name="key" placeholder="Tìm kiếm thông tin ">
                                <button style="background: unset;border: none;color: white;" type="submit" name="submit_search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                                
                            </form>   
                        </div>
                        <div class="col right">
                            <img src="http://ntt.edu.vn/web/frontend/images/ico-flagen.jpg">
                        </div>
                    </div>
                    
                    
                </div>
        
        
        
            <div class="menu">
                <!-- start responsive -->
                <div class="content-responsive">
                            <ul>
                                <li><a href="#">HOTLINE: 0902.298.300 - 0906.298.300</a></li>
                                <li><a href="sinhvien.html">SINH VIÊN</a></li>
                                <li><a href="#">GIẢNG VIÊN</a></li>
                                <li><a href="#">ĐÀO TẠO QUỐC TẾ</a></li>
                            </ul>
                    </div>
                <!-- end head-responsive -->
                <div class="wrapper">
                    <nav class="navbar navbar-expand-lg">
                        <a href="../index.php"><img src="../image/logo_ntt.png"></a>
                      <button style="outline: none;" class="navbar-toggler" type="button" >
                        <i id="showCollapse2" style="border: 1px solid #d0d0d0;padding: 10px;" class="fa fa-bars c-blue-a5"></i>
                      </button>
                      <div class="collapse navbar-collapse row" id="navbarNav">
                        <ul class="navbar-nav ">
                          <li class="nav-item col">
                            <i class="fa fa-info-circle"></i>
                            <a class="nav-link" href="index.php?id=1">Giới thiệu </a>
                          </li>
                          <li class="nav-item col">
                            <i class="fa fa-graduation-cap"></i>
                            <a class="nav-link" href="index.php?id=3">Tuyển sinh </a>
                          </li>
                          <li class="nav-item col">
                            <i class="fa fa-book"></i>
                            <a class="nav-link" href="index.php?id=4">Đào tạo </a>
                          </li>
                          <li class="nav-item col">
                            <i class="fa fa-bookmark"></i>
                            <a class="nav-link" href="index.php?id=19">Nghiên cứu </a>
                          </li>
                          <li class="nav-item col-3">
                            <i class="fas fa-handshake"></i>
                            <a class="nav-link" href="index.php?id=25">Hợp tác doanh nghiệp</a>
                          </li>
                        </ul>
                      </div>
                    </nav>
                </div>
            </div>
            
            

        </div>
        <!-- end header -->
    
    <!-- content -->

            <div class="content">
                <div class="home">
                    
                    <hr style="margin-bottom: 0;border-top: 2px solid rgba(0,0,0,.1);">
                    <div class="wrapper">
                        <div class="row" style="padding-left: 80px;padding-right: 80px;">
                            
                            <div class="col-12 p-0" style="    display: flex;position: relative;justify-content: center;">
                                <div class="slide" style="position: absolute;z-index: 2;width: 100%;">
                    
                                    <div class=" slide-wrapper">
                                        
                                        <!-- slide -->
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="triangle-wrapper">
                                                <div class="triangle">

                                                    <a id="showCollapse"><i class="fa fa-bars c-blue-a5"></i></a>
                                                    
                                                </div>
                                                <!-- <div class="collapse" id="collapseExample">
                                                  <div class="card card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                                  </div>
                                                </div> -->
                                            </div>
                                         
                                          
                                             <div class="collapse-handmade" id="collapse-handmade">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-9 row">
                                                        <?php 
                                                            $sql_catecha = "SELECT * from cate where parent_id = 0 order by order_id";
                                                            $query_catecha = mysqli_query($con,$sql_catecha);
                                                            while ( $result_catecha = mysqli_fetch_assoc($query_catecha)) :
                                                        ?>
                                                        <div class="col-12 col-md-6 col-lg-4 item">
                                                        
                                                            <ul>
                                                                <li><h5><a style="font-size: 18px;" href="index.php?id=<?php echo $result_catecha['id']; ?>"><?php echo $result_catecha['name']; ?> </a></h5></li>
                                                                <?php
                                                                $id_con = $result_catecha['id'];
                                                                $sql_catecon = "SELECT * from cate where parent_id = $id_con ";
                                                                $query_catecon = mysqli_query($con,$sql_catecon);
                                                                while($result_catecon = mysqli_fetch_assoc($query_catecon)) :
                                                                ?>
                                                                    <li>
                                                                        <i class="fa fa-angle-double-right"></i>
                                                                        <a href="index.php?id=<?php echo $result_catecon['id']; ?> "><?php echo $result_catecon['name']; ?></a>    
                                                                    </li>
                                                                <?php endwhile; ?>
                                                                
                                                            </ul>
                                                        </div>
                                                        
                                                        <?php endwhile; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-lg-3 sociaty">
                                                        <ul>
                                                            <li><a href=""><i class="fab fa-facebook-square"></i>Facebook</a></li>
                                                            <li><a href=""><i class="fab fa-google-plus-g"></i>Google Plus</a></li>
                                                            <li><a href=""><i class="fab fa-youtube"></i>Youtube</a></li>
                                                            <li><a href=""><i class="fas fa-envelope"></i>E-mail</a></li>
                                                            <li><a href=""><i class="fab fa-youtube"></i>Youtube</a></li>
                                                            <li><a href=""><i class="fa fa-wechat"></i>Zalo</a></li>
                                                            <li><a href=""><i class="fa fa-mortar-board"></i>E-office</a></li>
                                                            <li><a href=""><i class="fa fa-users"></i>Tuyển dụng</a></li>
                                                        </ul>
                                                    </div>

                                                    

                                                </div>
                                            </div>


                                        </div>
                                        <!-- end slide -->

                                        
                                    </div>
                                    
                                </div>
                                <img style="width: 100%;max-height: 500px;" src="../<?php echo $result_baiviet['image']; ?>">
                            </div>
                            
                            <h3 style="font-size: 22px;color: #024282 !important;margin-top: 30px;"><?php echo $result_baiviet['name']; ?></h3>
                            <hr>
                            <div><?php echo $result_baiviet['noidung']; ?></div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- end content -->

    <!-- footer -->
   <div class="home" style="margin-top: 30px;">
       <div class="contact">
                    <div class="wrapper">
                        <div class="row ">
                            <div class="col-md-6 col-lg-3">
                                <h4><a href="">ĐH NGUYỄN TẤT THÀNH</a></h4>
                                <ul>
                                    <li><a href="">Thư ngỏ</a></li>
                                    <li><a href="">Tầm nhìn - Sứ mạng</a></li>
                                    <li><a href="">Văn hóa ĐH Nguyễn Tất Thành</a></li>
                                    <li><a href="">Thông tin 3 công khai</a></li>
                                    <li><a href="">Đảm bảo chất lượng</a></li>
                                    <li><a href="">Phát triển bền vững</a></li>
                                    <li><a href="">Trường Trung cấp Nguyễn Tất Thành</a></li>
                                    <li><a href="">Trường Tiểu học Anh Việt Mỹ</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-3 cot-2">
                                <h4><a href="">PHÒNG - BAN</a></h4>
                                <h4><a href="">THƯ VIỆN ẢNH</a></h4>
                                <h4><a href="">E-LEARNING</a></h4>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <h4><a href="">TRUNG TÂM - VIỆN</a></h4>
                                <ul>
                                    <li><a href="">Viện Đào Tạo Quốc Tế</a></li>
                                    <li><a href="">Viện Công Nghệ Cao</a></li>
                                    <li><a href="">Viện Đào tạo Sau đại học</a></li>
                                    <li><a href="">Trung tâm Thông tin Thư viện</a></li>
                                    <li><a href="">TT Ngoại Ngữ</a></li>
                                    <li><a href="">TT Tin Học NTT</a></li>
                                    <li><a href="">TT QH Doanh Nghiệp & Khởi nghiệp</a></li>
                                    <li><a href="">TT Đào tạo theo nhu cầu XH</a></li>
                                    <li><a href="">TT Xuất khẩu lao động Texgamex</a></li>
                                    <li><a href="">Công đoàn Trường ĐH Nguyễn Tất Thành</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-3 sociaty">
                                <ul>
                                    <li><a href=""><i class="fab fa-facebook-square"></i>Facebook</a></li>
                                    <li><a href=""><i class="fab fa-google-plus-g"></i>Google Plus</a></li>
                                    <li><a href=""><i class="fab fa-youtube"></i>Youtube</a></li>
                                    <li><a href=""><i class="fas fa-envelope"></i>E-mail</a></li>
                                    <li><a href=""><i class="fab fa-youtube"></i>Youtube</a></li>
                                    <li><a href=""><i class="fa fa-wechat"></i>Zalo</a></li>
                                    <li><a href=""><i class="fa fa-mortar-board"></i>E-office</a></li>
                                    <li><a href=""><i class="fa fa-users"></i>Tuyển dụng</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="footer">
                    <div class="wrapper">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>THÔNG TIN LIÊN HỆ</h4>
                                <p>Trụ sở chính:<b>300A – Nguyễn Tất Thành, Phường 13, Quận 4, TP. Hồ Chí Minh, Việt Nam</b></p>
                                <p>Điện thoại:<b>1900 2039</b>Fax:<b>028 39 404 759</b></p>
                                <p>Hotline:<b>0902 298 300 – 0906 298 300 – 0912 298 300 – 0914 298 300</b></p>
                                <p>Email:<b>tttvtsinh@ntt.edu.vn – bangiamhieu@ntt.edu.vn</b></p>
                                
                            </div>
                            <div class="col-md-6">
                                <p>©2017. Bản quyền thuộc về trường <b>Đại học Nguyễn Tất Thành</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="wrapper_chatbox">
                <div class="chatbox" >
                    <button href="#">Hãy để lại lời nhắn</button>

                </div>
                <?php if(isset($show)) : ?>
                    <div class="content_chatbox" style="display: block;">
                <?php else: ?>
                    <div class="content_chatbox" style="display: none;">
                <?php endif; ?>         
                    <div class="top">
                        <div class="d-flex row">
                            <div class="col-8 d-flex justify-content-start">
                                <p>Hãy để lại lời nhắn</p>
                            </div>
                            <div class="col-4 d-flex justify-content-end">
                                <i id="close" class="fas fa-times-circle"></i>
                            </div>
                            
                        </div>
                        
                        <div>Bạn vui lòng điền vào biểu mẫu dưới đây và chúng tôi sẽ liên hệ lại với bạn ngay khi có thể.</div>
                    </div>
                    <div class="main">
                        <?php
                            
                            $success = 0;
                             $all_error = array();
                            if (isset($_POST['submit'])) {
                                $show = 1;
                                if ($_POST['name']=='') {
                                    $error_name = 1;
                                    $message1 = 'Bạn chưa nhập tên';
                                    array_push($all_error,'false');
                                }else{
                                    $name = $_POST['name'];
                                    $error_name = 0;
                                }

                                if ($_POST['email']=='') {
                                    $error_email = 1;
                                    $message2 = 'Bạn chưa nhập Email';
                                    array_push($all_error,'false');
                                }else{
                                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                        $error_email = 1;
                                        $message2 = 'Email không đúng định dạng ';
                                        array_push($all_error,'false');
                                    }else{
                                        $email = $_POST['email'];
                                        $error_email = 0;
                                    }
                                    
                                }

                                if ($_POST['phone']=='') {
                                    $error_phone = 1;
                                    $message3  = 'Bạn chưa nhập Số điện thoại';
                                    array_push($all_error,'false');
                                }else{
                                    if (!is_numeric($_POST['phone'])) {
                                        $error_phone = 1;
                                        $message3  = 'Số điện thoại phải là số';
                                        array_push($all_error,'false');
                                    }else{
                                        if (strlen($_POST['phone'])<8) {
                                            $error_phone = 1;
                                            $message3  = 'Số điện thoại không đúng định dạng ';
                                            array_push($all_error,'false');
                                        }else{
                                            $phone = $_POST['phone'];
                                            $error_phone = 0;
                                        }
                                    }
                                    
                                }

                                if ($_POST['date']=='') {
                                    $error_date = 1;
                                    $message4 = 'Bạn chưa nhập ngày sinh';
                                    array_push($all_error,'false');
                                }else{
                                    $date = $_POST['date'];
                                    $error_date = 0;
                                }

                                if ($_POST['content']=='') {
                                    $error_content = 1;
                                    $message5 = 'Bạn chưa nhập nội dung';
                                    array_push($all_error,'false');
                                }else{
                                    $content = $_POST['content'];
                                    $error_content = 0;
                                }

                                if(count($all_error)==0){
                                    $sql = "INSERT into contact(name,email,phone,date_time,content) values('$name','$email',$phone,'$date','$content')";
                                    $query = mysqli_query($con,$sql);
                                    $success = 1;
                                }
                            }
                        ?>
                        <?php if ($success == 1) : ?>
                            <h5 class="alert alert-success">Gửi lời nhắn thành công</h5>
                        <?php else: ?>
                            <form method="post">
                            <!-- name -->
                                <?php if(isset($error_name)) :
                                            if ($error_name == 1) : ?>
                                            <input type="text" style="border: 2px solid red;" placeholder="*Name " id="name" name="name" >
                                            <span style="font-size: 13px;color: red;"><?php if(isset($message1)) echo $message1; ?></span>
                                        <?php else: ?>  
                                            <input type="text" placeholder="*Name " id="name" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name']; }?>">
                                        <?php endif; ?>
                                <?php else: ?>
                                    <input type="text" placeholder="*Name " id="name" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name']; }?>">
                                <?php endif; ?>
                                <!-- end name -->
                                <!-- email -->
                                <?php if(isset($error_email)) :
                                            if ($error_email == 1) : ?>
                                            <input type="text" style="border: 2px solid red;" placeholder="*Email " id="email" name="email" >
                                            <span style="font-size: 13px;color: red;"><?php if(isset($message2)) echo $message2; ?></span>
                                        <?php else: ?>  
                                            <input type="text" placeholder="*Email " id="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email']; }?>">
                                        <?php endif; ?>
                                <?php else: ?>
                                    <input type="text" placeholder="*Email " id="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email']; }?>">
                                <?php endif; ?>
                                <!-- end email -->
                                <!-- phone -->
                                <?php if(isset($error_phone)) :
                                            if ($error_phone == 1) : ?>
                                            <input type="text" style="border: 2px solid red;" placeholder="*Phone " id="phone" name="phone" >
                                            <span style="font-size: 13px;color: red;"><?php if(isset($message3)) echo $message3; ?></span>
                                        <?php else: ?>  
                                            <input type="text" placeholder="*Phone " id="phone" name="phone" value="<?php if(isset($_POST['phone'])){echo $_POST['phone']; }?>">
                                        <?php endif; ?>
                                <?php else: ?>
                                    <input type="text" placeholder="*Phone " id="phone" name="phone" value="<?php if(isset($_POST['phone'])){echo $_POST['phone']; }?>">
                                <?php endif; ?>
                                <!-- end phone -->
                                <!-- date -->
                                <?php if(isset($error_date)) :
                                            if ($error_date == 1) : ?>
                                            <input type="text" style="border: 2px solid red;" placeholder="*Date " id="date" name="date" >
                                            <span style="font-size: 13px;color: red;"><?php if(isset($message4)) echo $message4; ?></span>
                                        <?php else: ?>  
                                            <input type="text" placeholder="*Date " id="date" name="date" value="<?php if(isset($_POST['date'])){echo $_POST['date']; }?>">
                                        <?php endif; ?>
                                <?php else: ?>
                                    <input type="text" placeholder="*Date " id="date" name="date" value="<?php if(isset($_POST['date'])){echo $_POST['date']; }?>">
                                <?php endif; ?>
                                <!-- end date -->
                                <!-- content -->
                                <?php if(isset($error_content)) :
                                            if ($error_content == 1) : ?>
                                                <textarea style="border: 2px solid red;" placeholder="*Content " id="content" name="content"></textarea>
                                            <span style="font-size: 13px;color: red;"><?php if(isset($message5)) echo $message5; ?></span>
                                        <?php else: ?>
                                            <textarea placeholder="*Content " id="content" name="content"><?php if(isset($_POST['content'])){echo $_POST['content']; }?></textarea>
                                            
                                        <?php endif; ?>
                                <?php else: ?>
                                    <textarea  placeholder="*Content " id="content" name="content"><?php if(isset($_POST['content'])){echo $_POST['content']; }?></textarea>
                                <?php endif; ?>
                                <!-- end content -->
                                <input type="submit" value="Hoàn tất" id="submit" name="submit">
                            </form>
                        <?php endif; ?>
                        
                        
                        <div class="tiny">
                            We're <img src="https://cdn.jsdelivr.net/emojione/assets/png/26a1.png?v=2.2.7">  by tawk.to 
                        </div>
                    </div>
                </div>
            </div>
   </div>
   <!-- end footer -->
</body>
<!-- script -->
<script type="text/javascript" src="../jquery/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/main.js"></script>
</html>