<?php
    ob_start();
    session_start();
    if (!$_SESSION['username']) {
        header('location:login.php');
        // echo 'ko co session';
    }
    $errors=array();

    
?>
<!DOCTYPE html>
<html lang="en">    
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản trị hệ thống</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/admin/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/admin/sb-admin.css" rel="stylesheet">
  
    <!-- Custom Fonts -->
    <link href="../css/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Morris Charts CSS -->
    <link href="../css/admin/plugins/morris.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">QUẢN TRỊ HỆ THỐNG</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Xin chào:&nbsp; <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>    -->                     
                        <li>
                            <a href="changepw.php"><i class="fa fa-fw fa-gear"></i>Đổi mật khẩu</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>


<!-- left -->
 <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li style="background:#1b926c;color:#fff;">
                        <a href="index.php" style="color:#fff;"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li> 
                   
                      <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo_bv"><i class="fa fa-fw fa-file"></i> Bài viết  <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo_bv" class="collapse">
                                <li>
                                    <a href="add_baiviet.php">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="list_baiviet.php">Danh sách</a>
                                </li>
                            </ul>
                        </li> 
                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo_ct"><i class="fa fa-fw fa-file"></i> Contact <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo_ct" class="collapse">
                            <li>
                                <a href="list_contact.php">Danh sách</a>
                            </li>
                        </ul>
                    </li> 
                    
                    
                    
                     

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
