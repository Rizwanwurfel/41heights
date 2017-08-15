
 <footer class="main-footer">
    <div class="pull-right hidden-xs">
     
    </div>
    <strong>Copyright &copy; 2017 <a href="javascript:">41Heights</a>.</strong> All rights
    reserved.
  </footer>
  <script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
	var baseURL = "<?php echo site_url(); ?>";
</script>
<script src="<?php echo base_url()?>public/theme/dist/js/notification.js"></script>
  <script type="text/javascript">
  
  	$('document').ready(function() {  
						//var baseURL = "<?php echo site_url(); ?>";
						//alert();
					setInterval(function() {
						//alert();
						 check_noti();
						 check_label();
						 check_waitercall();///checking waiter call
						}, 1000*4);
					
		   
		});
       
      </script>