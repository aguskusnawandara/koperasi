<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Sistem Koperasi</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="asset/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Login Koperasi</b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form method="post" action="cek_login.php?modul=login">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username" />
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" />
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <input type="submit" class="btn btn-primary btn-block btn-flat pull-right" value="Login" name="login"/>
          </div><!-- /.col -->
        </div>
      </form>
      <p>Default Username & Password = admin</p>
    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->
  <script src="asset/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="asset//bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
