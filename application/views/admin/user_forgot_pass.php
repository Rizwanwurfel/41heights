<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>41Heights| Forgot Password</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
<?php
			if($this->session->userdata('info_passreset'))
			{ ?>
			<center><h3 style="color:green">	<?php echo $this->session->userdata('info_passreset'); ?></h3></center>
		<?php	
			$this->session->unset_userdata('info_passreset');
		}
?>
  <div class="lockscreen-logo">
    <a href="<?php echo site_url()?>"><b>41</b>Heights Pizza</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Password Recovery</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
     <img src="<?php echo base_url()?>/public/images/envelope.png" alt="User Image">
	 
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
     <form method="post" action="<?php echo site_url('User/admin_forgot_password');?>" class="lockscreen-credentials">
      <div class="input-group">
        <input type="email" required name="forgot_email" class="form-control" placeholder="Email">

        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!------------------------------------>
  
  <!------------------------------------>
  <!-- /.lockscreen-item -->
  <br/>
  <div class="help-block text-center">
    Enter Email , password will be send to entered email
  </div>
  <div class="text-center">
    <a href="<?php echo site_url()?>">Sign in </a><br/>
   <!-- <a href="<?php echo site_url("User/user_register")?>">Register </a><br/>-->
  </div>
  <br/><br/><br/>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2017 <b><a href="javascript:" class="text-white" >41 Heights</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url()?>/public/theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()?>/public/theme/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
