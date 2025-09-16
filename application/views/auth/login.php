<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin Lite| Login</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/favicon.ico">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    #loginMsg { 
      margin-bottom: 10px; 
      padding: 10px; 
      display: none; 
      border-radius: 4px;
      transition: all 0.3s ease;
    }
    #loginMsg.success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    #loginMsg.error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }

    .shake { animation: shake 0.4s; }
    @keyframes shake {
      0% { transform: translateX(0); }
      25% { transform: translateX(-5px); }
      50% { transform: translateX(5px); }
      75% { transform: translateX(-5px); }
      100% { transform: translateX(0); }
    }
  </style>
  </head>
  <body class="login-page">
        
    <div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <div id="loginMsg"></div>

        <form id="loginForm" autocomplete="off" data-url="<?= base_url('auth/login_ajax'); ?>" >
        <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" required minlength="6">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
            </div>
            <div class="col-xs-4">
            <button type="submit" id="loginBtn" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
        </div>
        </form>
    </div>
    </div>

  <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/login.js" type="text/javascript"></script>

  </body>
</html>
