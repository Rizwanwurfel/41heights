<script src="<?php echo base_url()?>/public/web_template/assets/js/jquery-migrate-1.2.1.js"></script>
<script src="<?php echo base_url()?>/public/web_template/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>/public/web_template/assets/js/waypoints.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo base_url()?>/public/web_template/assets/js/modernizr.custom.js"></script>
<script src="<?php echo base_url()?>/public/web_template/assets/js/cssua.min.js"></script>
<!--SCRIPTS THEME-->

		<!-- Sidebar -->
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/slidebars/dist/slidebars.js"></script>
		<!-- Home slider -->
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/slider-pro/dist/js/jquery.sliderPro.js"></script>
		<!-- Sliders -->
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/owl-carousel/owl.carousel.min.js"></script>
		<!-- Isotope -->
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/isotope/isotope.pkgd.min.js"></script>
		<!-- Modal -->
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
		<!-- Date select -->
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
		<!-- Select customization -->
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		<!-- Price slider -->
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/nouislider/jquery.nouislider.all.min.js"></script>
		<!-- Chart -->
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
		<!-- Animation -->
		<script src="<?php echo base_url()?>/public/web_template/assets/js/wow.min.js"></script>
		<!-- Scrollspy -->
		<script src="<?php echo base_url()?>/public/web_template/assets/js/scrollspy.min.js"></script>

		<!-- Custom -->
		<script src="<?php echo base_url()?>/public/web_template/assets/js/custom.js"></script>
		
				<script>
		/////////////////////////////////////
		$('#subform').submit(function(e)
		{
			$('#img').show();
			e.preventDefault();
			$.ajax
			({
				url: '<?php echo site_url('Contact/subscribe')?>',
				type:'post',
				data:$(this).serialize(),
				dataType:'html'
			})
			.success(function(data)
			{
				$('#img').hide();
				$('#subform')[0].reset();
				$('#rowform').fadeOut('slow',function()
				{
					$('#rowform').fadeIn('slow').html(data);
				});
			})
			.fail(function()
			{
				$('#subform')[0].reset();

			});
		});
		$("form.cart_form").submit(function(e){
			e.preventDefault();
			$(".cart-close ").click()
			$('#product_added').modal('show');
			  $('#cart_load').show();
			  $('#cart_su').hide();
        $.ajax({
		 type: "POST",
			url: "<?php echo site_url('Cart/add_cart_product');?>",
		 data: $(this).serialize(),
				 success: function(msg){
					// alert(msg); 
					if(msg=="done")
					{
						$('#product_added').modal('show');
						$('#cart_load').hide();
						$('#cart_su').show();
						//$('#custom_order').hide();
						$('#custom_order').modal('hide');
						//$('#cart-close').hide();
						
						
					}
					else if(msg=="failed")
					{
						$('#cart_load').hide();
						$('#failed_add').html("<center><h2>Failed to add</h2>Contact support! Or try again<br/>0311 - 8530433 || 051 - 5731971</center>");
					}
				 },
		 error: function(XMLHttpRequest, textStatus, errorThrown) { 
																	   alert("Status: " + textStatus); alert("Error: " + errorThrown);
														$('#cart_load').hide();
														$('#failed_add').html("<center><h2>Some thing is wrong</h2>Contact support! Or try again<br/>0311 - 8530433 || 051 - 5731971</center>");																	   
																	} 
			   });
		 });
	</script>
	<script>
	function check_top_cart()
{
	var url = "<?php echo site_url('Cart/check_cart_update');?>";
	$.ajax({
           type: "POST",
           url: url,
          // data: $("#news_form").serialize(), // serializes the form's elements.
           success: function(data)
           {
		   //alert(data);
			$(".header-basket__number").html(data);
			if(data==0)
			{
				$("#submit_button").replaceWith( "<br/><br/><b>Cart is empty!</b><br/><a href='<?php echo site_url('Menu');?>'>Shop Now</a>" );
			}
			//$("#text_for_news").val("");
             //  alert(data); // show response from the php script.
           }
         });
}
////////////////////function for update_replace_cart//////
function cart_update()
{
	var url = "<?php echo site_url('Cart/cart_update');?>";
	$.ajax({
           type: "POST",
           url: url,
          // data: $("#news_form").serialize(), // serializes the form's elements.
           success: function(data)
           {
			$("#cart_update").html(data);
			//$("#text_for_news").val("");
               //alert(data); // show response from the php script.
           }
         });
}
///////////function for check bill summary on checkout page////////////
function checkout_bill_summary()
{
	var url = "<?php echo site_url('Cart/checkout_bill_summary');?>";
	$.ajax({
           type: "POST",
           url: url,
          // data: $("#news_form").serialize(), // serializes the form's elements.
           success: function(data)
           {
			$("#checkout_bill_summary").html(data);
			//$("#text_for_news").val("");
               //alert(data); // show response from the php script.
           }
         });
}

/////////////////////////////////////////
function del_cart_item(id) {
		//alert(id);
		
						////////////////////////////////////
													$.ajax({
															type: "post",
															url: "<?php echo site_url(); ?>/Cart/remove_item",
															data:'keyword='+id,
															
															
															beforeSend: function(){
																 // Handle the beforeSend event
																 $("#it_"+id).css('opacity','0.2');
																// $("#it_"+id).css('background','pink');
																 $("#it_"+id).html('<center><b style="color:white">Removing</b></center>');
																
															  },
   
															success: function(data){
																
																	
															$("#cart_update").css('opacity','1');
															checkout_bill_summary();
															//update_below_portion();
																
															},
															 error: function(XMLHttpRequest, textStatus, errorThrown) { 
																	   $("#it_"+id).html("Status: " + textStatus);
																	   $("#it_"+id).html("Error: " + errorThrown); 
																	} 

															});
													//////////////////////////////////////
		}
////////////////////////////////////////

function hide_cart_popup(){
$('#product_added').modal('hide');


}
////////////function for checking rest timing/////////////
function check_rest_timing()
{
	
	var url = "<?php echo site_url('Rest_timing/check_rest_timing');?>";
	$.ajax({
           type: "POST",
           url: url,
          // data: $("#news_form").serialize(), // serializes the form's elements.
           success: function(data)
           {
				if(data=="rest_close")
				{
					$('#timing_popup').modal('show');
				}
				else if(data=="exit")
				{
					$('#emergency_close_popup').modal('show');
				}
           }
         });
}
/////////////////////////////////////
		$('document').ready(function() {  
						
						check_top_cart();
						cart_update();
						check_rest_timing();
						var d=$("#pizz_deal_added").val();
						
						if(d=="yes")
						{
							$('#product_added').modal('show');
							$('#cart_load').hide();
							$('#cart_su').show();
						}
						
					setInterval(function() {
							check_top_cart();
							cart_update();
						}, 1000*3);	
		   
		});
	</script>