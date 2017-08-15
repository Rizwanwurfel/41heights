		function play_waiter_sound() {
				
		document.getElementById('audiowaiter').play();
	}
	////////////////////function for checking waiter call if any is there ///////////////////////
	function check_waitercall()
	{
			$.ajax({
					
                     url:baseURL+"/Notification/check_waitercall",
                     type:'POST',
                     dataType : 'html',
                     
					  //////////////////mycheck for before send//////////////
					   beforeSend: function() {
						
						
					  },
					  //////////////////////////////////////
                    success: function (drop) {
					
                 // alert(drop); //makeTable(drop)
				  if(drop=="ring")
				  {
					//alert();
					play_waiter_sound();
					$('#waiter_notify').css("display","block");
				  }
				  else
				  {
						$('#waiter_notify').css("display","none");
				  }
					
				  
					
                     },
                    
                });
	}		
		/////////////////////////////////////////////////////////////////////
			function play_single_sound() {
				
		document.getElementById('audiotag1').play();
	}
			function play_beep_reminder() {
				
		document.getElementById('audiotag2').play();
	}
	/////////////////////////function notification rung//////////////////
			function rung_alert(id)
			{
				 var cit=id;
				
				//alert(cit);
				$.ajax({
					
                     url:baseURL+"notification/alerted_already",
                     type:'POST',
                     dataType : 'html',
					    data: { 
                      cit,
					  
					  },
                     
					  //////////////////mycheck for before send//////////////
					   beforeSend: function() {
						//$('#label_not').html("done");
						
					  },
					  //////////////////////////////////////
                    success: function (drop) {
					//alert(drop);
                     },
                    
                });
			}
////////////////////////////////////////////////////////////////////////////////////			

			function check_noti()
			{
				//alert();
				$.ajax({
					
                     url:baseURL+"/Notification/check_new",
                     type:'POST',
                     dataType : 'html',
                     
					  //////////////////mycheck for before send//////////////
					   beforeSend: function() {
						
						
					  },
					  //////////////////////////////////////
                    success: function (drop) {
					
                 // alert(drop); //makeTable(drop)
				  if(drop=="nil")
				  {
					//alert();
				  }
				  else
				  {
										if($("#noti" + drop).length == 0) {
										  
											//$("#span_not").prepend(" <li id='noti"+drop+"' style='background:pink'> <a href='<?php echo base_url('page_controller/load_notification_order');?>/"+drop+"'><i class='fa fa-cart-plus text-aqua'></i> Fresh Order Placed </a></li>");
											$("#span_not").prepend(" <li id='noti"+drop+"' style='background:pink'> <a href='"+baseURL+"Notification/load_notification_order/"+drop+"'><i class='fa fa-cart-plus text-aqua'></i> Fresh Order Placed </a></li>");
											$('#label_not').html("new");
												play_single_sound();
												//alert("New order place");
												//$('#alert_order').modal('show');
												rung_alert(drop);
										}
										else
										{
												$('#label_not').html("new");
												play_single_sound();
												//alert("New order placed");
												//$('#assign_link').append("<a class='btn btn-lg btn-info' href='"+baseURL+"Notification/load_notification_order/"+drop+"'><i class='fa fa-cart-plus text-aqua'></i> View Detail </a><br/>");
												//$('#alert_order').modal('show');
												rung_alert(drop);
										}
				  }
					
				  
					
                     },
                    
                });
			}
				//////////////////////////////function for checking if need of (new) label at notification bell///////////////
	function check_label()
	{
		//alert("lb_start");
			$.ajax({
					
                     url:baseURL+"Notification/check_label",
                     type:'POST',
                     dataType : 'html',
					 
					  //////////////////////////////////////
                    success: function (drop) {
					//alert(drop);
												if(drop=="noneed")
												{
													$('#label_not').html("");
													$("#span_not").children().css( "background", "lightgray" );
													
												}
												else
												{
													if($("#noti" + drop).length == 0) 
													{
															$("#span_not").prepend(" <li id='noti"+drop+"' style='background:pink'> <a href='"+baseURL+"Notification/load_notification_order/"+drop+"'><i class='fa fa-cart-plus text-aqua'></i> Fresh Order Placed </a></li>");
															$('#label_not').html("new");
															play_beep_reminder();
															//alert("beep");
													}
													else
													{
														$('#label_not').html("new");
															play_beep_reminder();
															//alert("beep");
													}
												}
                     },
                    
                });
	}