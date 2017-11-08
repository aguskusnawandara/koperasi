<?php
session_start();
include'koneksi/fungsikoperasi.php';
include 'koneksi/koneksi.php';

?>
<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistem Informasi Koperasi</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="asset/font-awesome/css/font-awesome.min.css">
        <!-- Bootstrap 3.3.5 -->
         <link rel="stylesheet" href="asset/bootstrap/css/style_table.css" type="text/css"/>
          <link rel="stylesheet" type="text/css" href="asset/bootstrap/js/jquery.dataTables.min.css">
        <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="asset/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="asset/dist/css/skins/skin-blue.css">
        <!--jquery-->
        <script src="asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="asset/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="asset/bootstrap/js/jquery.dataTables.min.css">
        <link rel="stylesheet" href="asset/bootstrap/css/style_table.css" type="text/css"/>
        <!-- AdminLTE App -->
        <script src="asset/dist/js/app.min.js"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>S</b>K</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>SISTEM KOPERASI</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="glyphicon glyphicon-menu-hamburger"></span>
                    </a>
                <!-- Navbar Right Menu -->
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include'menu.php'; ?>
            <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <!-- Main content -->
                <section class="content">
            <?php include'content.php'; ?>
                    </section>
                </div> 
                <!-- /.content-wrapper -->
                <footer class="main-footer">
                    <strong>Copyright &copy; 2017<a href="#">Agus</a>.</strong> All rights reserved.
                </footer>
                <div class="control-sidebar-bg"></div>
        </div>
        
<script src="asset/bootstrap/js/jquery.dataTables.min.js"></script>
<script> $(document).ready(function() { $('#dataTables').DataTable();} );</script>

    </body>
</html>