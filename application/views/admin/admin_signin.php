<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>41Heights| Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>/public/theme/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>/public/theme/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>/public/theme/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 <!-- <style>
	background-color:red;
	background-repeat:none;background-attachment:scroll;
	background-position:center center;
	-webkit-background-size:cover;-moz-background-size:cover;
	background-size:cover;-o-background-size:cover;text-align:center;
	color:#fff;
  </style>-->
</head>
<body class="hold-transition login-page" style="background-image:url(<?php echo base_url();?>public/images/bg_main.jpg);background-repeat:none;background-attachment:scroll;background-position:center center;-webkit-background-size:cover;-moz-background-size:cover;background-size:cover;-o-background-size:cover;text-align:center;color:#fff">
<div class="login-box" >
  <div class="login-logo">
    <a href="<?php echo site_url()?>" style="color:white"><b>41</b>Heights</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="box-shadow: 10px 10px 5px #888888;border:2px solid gray;border-top:5px solid #367FA9;border-bottom:5px solid #367FA9">
   <!-- <p class="login-box-msg">Sign in to start your session</p>-->
		
							<p style="color:red;">


                                            <?php
                                            if($this->session->userdata('failure'))
                                            { 

                                                echo $this->session->userdata('failure'); 
                                               $this->session->unset_userdata('failure');

                                            }
											else 
											{ ?>
												
												<p class="login-box-msg">Sign in to start your session</p>
										<?php	}

                                            ?>
                           </p>
                                      
	

    <form action="<?php echo site_url('Admin/user_login');?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="user_email" required placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="user_password" required  placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <div class="checkbox icheck pull-left">
            <label>
              <a href="<?php echo site_url("Admin/user_forgot_password")?>" class="">forgot password</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat " >Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>-->
    <!-- /.social-auth-links -->
		<div class="col-xs-8">
			
		</div>
		<div class="col-xs-4" >
			
		</div>
		<br/>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
	<!--------------------------copyright------------------------------->
	<div class="lockscreen-footer text-center">
    Copyright &copy; 2017 <b><a href="javascript:" class="text-white" style="color:white">41Heights</a></b><br>
    All rights reserved
  </div>

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url()?>/public/theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()?>/public/theme/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>/public/theme/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
