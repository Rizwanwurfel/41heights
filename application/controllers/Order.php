<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller 
{

	////////function for android service when some one orders////////////////
	public function order_receive()
	{


				$this->form_validation->set_rules('user_name','user_name','trim|required');
				$this->form_validation->set_rules('total_bill','total_bill','trim|required');
				$this->form_validation->set_rules('user_address','user_address','trim|required');
				$this->form_validation->set_rules('user_phone','order_phhone','trim|required');
				    $send_name=$this->input->post('user_name');
				    $total_bill=$this->input->post('total_bill');
					$order_shipping_address=$this->input->post('user_address');
					$order_phone=$this->input->post('user_phone');
					/////////////////////////
					$item_data="";
					if($this->input->post('item'))
					{
						$item_data=$this->input->post('item');
					}
					///////////////////////////
        if($this->form_validation->run()==FALSE)
        {
						$info="check invalid or incomplete inputs";
							header('Content-type: application/json');
							$data= json_encode($info);
							echo $data;
        }
		else
		{
							$this->load->model('admin/Order_model');
							$order_data=$this->Order_model->order_receive();
							
							
							if($order_data=="success")
							{
								/////////////////////////////////////////////////////////////
										//$info="success";
											//	header('Content-type: application/json');
											//	$data= json_encode($info);
												echo "success";
								
									     
										//////////////////////////////////////////////////////
										//////////////////////sending email to admin////////////////////////////////
													$to_admin ="sheikh.wurfel@gmail.com";
													$subjects = 'New Order Placed at 41Heights';
													$from = 'info@41heightspizza.com';
													 
													// To send HTML mail, the Content-type header must be set
													$headers  = 'MIME-Version: 1.0' . "\r\n";
													$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
													// $from="sales@yeswecan.pk";
													// Create email headers
													$headers .= 'From: '.$from."\r\n".
													'Reply-To: '.$from."\r\n" .
														'X-Mailer: PHP/' . phpversion();
													 
													// Compose a simple HTML email message
													////////////////////////////////////////////////////
														$messagen = '<html><body style="">';
															$messagen .= '<div class="row" style="background:#f6f6f6;padding:2%">';
																$messagen .='<h2 style="text-align:center">New Order Placed at 41 Heights Pizza! </h2>';
																$messagen .='<table>';
																$messagen .='<tbody>';
																		$messagen .='<tr>';
																					$messagen.='<td>';
																						$messagen.='<p style="background:#f6f6f6"><span class="glyphicon glyphicon-user"> Customer Name : </span> '.$send_name.'</p>';
																						$messagen.='<p style="background:#f6f6f6"><span class="glyphicon glyphicon-user">Customer phone# : </span> '.$order_phone.'</p>';
																						$messagen.='<p style="background:#f6f6f6"><span class="glyphicon glyphicon-user"> Customer Address : </span> '.$order_shipping_address.'</p>';
																						$messagen.='<p style="background:#f6f6f6"><span class="glyphicon glyphicon-user"> Order Date : </span> '.date('y-m-d H:i:s').'</p>';
																					$messagen.= '</td>';
																					////////
																					
																					//////////
																					/*$messagen.='<td">';
																						$messagen.='<p style="background:#f6f6f6"><span class="glyphicon glyphicon-user"> </span> '.date('y-m-d H:i:s').'</p>';	
																					$messagen.= '</td>';*/
																					//////////
																			$messagen.= '</tr>';
																$messagen .='</tbody>';
																$messagen.= '</table><hr/>';
																			////////////////////////////////
																		$messagen .='<table cellspacing="25">';
																			$messagen.= '<tbody>
																							<thead>
																						
																								  <tr>
																										   <th>No</th>
																										   
																										   <th>Item Name</th>
																										   <th>Item type</th>
																											
																											<th>Qty</th>
																											
																											<th>Total price</th>
																											
																								  </tr>';
																								$messagen.='</thead>';
																										  $cnt=0;
																										   $data = json_decode($item_data, true);
																											foreach($data as $main=>$val)
																											{
																													$messagen.='<tr>';
																														//$messagen .= '<p style="font-size:15px;">Order items= '.$item_type[$pd].'<==>'.$item_name[$pd].'<==>'.$total_items[$pd].'<==>'.$item_total_p[$pd].'</p>';
																														//$messagen .= '<td><img src="'. base_url($item_image[$pd]).'" class="img-responsive" width="30px" style="width:20%" /> </td>';
																														$messagen .= '<td> '.++$cnt.'</td>';
																														$messagen .= '<td> '.$val['item_name'].'</td>';
																														$messagen .= '<td> '.$val['item_type'].'</td>';
																														$messagen .= '<td> '.$val['item_qty'].'</td>';
																														$messagen .= '<td> '.$val['item_total_price'].'</td>';
																													$messagen.='</tr>';
																											}
																																											
																								
																								 $messagen.='<tr style="border-top:1px solid black" >
																												<td colspan="4"><b>Total bill</b></td>
																											
																												<td><b> '.$total_bill.'</b></td>
																												</tr>'; 
																						
													////////////////////////////////
																	$messagen.= '<tbody></table>';
																		$messagen.= '</div>';
														$messagen.= '</body></html>';
													////////////////////////////////////////////////////
													
													 
													// Sending email
													mail($to_admin, $subjects, $messagen, $headers);
					
								
							}
							else if($order_data=="invalid_reference")
							{
											//$info="failed";
											//	header('Content-type: application/json');
											//	$data= json_encode($info);
												echo "invalid reference";
							}
							else
							{
											//$info="failed";
											//	header('Content-type: application/json');
											//	$data= json_encode($info);
												echo "failed";
							}
		}
	}//function ending
	
	////////////////////////////////////////////////////////////////function for order receiving from android device for dine in users////////
	public function order_receive_dinein()
	{

				$this->form_validation->set_rules('total_bill','total_bill','trim|required');
				$this->form_validation->set_rules('item','items','trim|required');
				
				    $send_name="Dine in customer";
				    $total_bill=$this->input->post('total_bill');
					
					/////////////////////////
					$item_data="";
					if($this->input->post('item'))
					{
						$item_data=$this->input->post('item');
					}
					///////////////////////////
        if($this->form_validation->run()==FALSE)
        {
						$info="check invalid or incomplete inputs";
							header('Content-type: application/json');
							$data= json_encode($info);
							echo $data;
        }
		else
		{
							$this->load->model('admin/Order_model');
							$order_data=$this->Order_model->order_receive_dinein();
							
							
							if($order_data)
							{
								/////////////////////////////////////////////////////////////
										//$info="success";
											//	header('Content-type: application/json');
											//	$data= json_encode($info);
												echo "success";
								
									     
										//////////////////////////////////////////////////////
										//////////////////////sending email to admin////////////////////////////////
													$to_admin ="sheikh.wurfel@gmail.com";
													$subjects = 'New Dine in Order Placed at 41Heights';
													$from = 'info@41heightspizza.com';
													 
													// To send HTML mail, the Content-type header must be set
													$headers  = 'MIME-Version: 1.0' . "\r\n";
													$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
													// $from="sales@yeswecan.pk";
													// Create email headers
													$headers .= 'From: '.$from."\r\n".
													'Reply-To: '.$from."\r\n" .
														'X-Mailer: PHP/' . phpversion();
													 
													// Compose a simple HTML email message
													////////////////////////////////////////////////////
														$messagen = '<html><body style="">';
															$messagen .= '<div class="row" style="background:#f6f6f6;padding:2%">';
																$messagen .='<h2 style="text-align:center">New Dined in Order Placed at 41 Heights Pizza! </h2>';
																$messagen .='<table>';
																$messagen .='<tbody>';
																		$messagen .='<tr>';
																					$messagen.='<td>';
																						$messagen.='<p style="background:#f6f6f6"><span class="glyphicon glyphicon-user"> Customer Name : </span> '.$send_name.'</p>';
																						$messagen.='<p style="background:#f6f6f6"><span class="glyphicon glyphicon-user">Customer phone# : </span> NILL</p>';
																						$messagen.='<p style="background:#f6f6f6"><span class="glyphicon glyphicon-user"> Customer Address : </span> Dined in</p>';
																						$messagen.='<p style="background:#f6f6f6"><span class="glyphicon glyphicon-user"> Order Date : </span> '.date('y-m-d H:i:s').'</p>';
																					$messagen.= '</td>';
																					////////
																					
																					//////////
																					/*$messagen.='<td">';
																						$messagen.='<p style="background:#f6f6f6"><span class="glyphicon glyphicon-user"> </span> '.date('y-m-d H:i:s').'</p>';	
																					$messagen.= '</td>';*/
																					//////////
																			$messagen.= '</tr>';
																$messagen .='</tbody>';
																$messagen.= '</table><hr/>';
																			////////////////////////////////
																		$messagen .='<table cellspacing="25">';
																			$messagen.= '<tbody>
																							<thead>
																						
																								  <tr>
																										   <th>No</th>
																										   
																										   <th>Item Name</th>
																										   <th>Item type</th>
																											
																											<th>Qty</th>
																											
																											<th>Total price</th>
																											
																								  </tr>';
																								$messagen.='</thead>';
																										  $cnt=0;
																										   $data = json_decode($item_data, true);
																											foreach($data as $main=>$val)
																											{
																													$messagen.='<tr>';
																														//$messagen .= '<p style="font-size:15px;">Order items= '.$item_type[$pd].'<==>'.$item_name[$pd].'<==>'.$total_items[$pd].'<==>'.$item_total_p[$pd].'</p>';
																														//$messagen .= '<td><img src="'. base_url($item_image[$pd]).'" class="img-responsive" width="30px" style="width:20%" /> </td>';
																														$messagen .= '<td> '.++$cnt.'</td>';
																														$messagen .= '<td> '.$val['item_name'].'</td>';
																														$messagen .= '<td> '.$val['item_type'].'</td>';
																														$messagen .= '<td> '.$val['item_qty'].'</td>';
																														$messagen .= '<td> '.$val['item_total_price'].'</td>';
																													$messagen.='</tr>';
																											}
																																											
																								
																								 $messagen.='<tr style="border-top:1px solid black" >
																												<td colspan="4"><b>Total bill</b></td>
																											
																												<td><b> '.$total_bill.'</b></td>
																												</tr>'; 
																						
													////////////////////////////////
																	$messagen.= '<tbody></table>';
																		$messagen.= '</div>';
														$messagen.= '</body></html>';
													////////////////////////////////////////////////////
													
													 
													// Sending email
													mail($to_admin, $subjects, $messagen, $headers);
					
								
							}
							
							else
							{
											//$info="failed";
											//	header('Content-type: application/json');
											//	$data= json_encode($info);
												echo "failed";
							}
		}
	}//function ending
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function all_orders()
	{
		$this->load->model('admin/Order_model');
		$data['pro_details']=$this->Order_model->show_all_orders();
		$this->load->view('admin/all_orders',$data);
	}
	//////////////////////////function for loading all pending orders//////////////
	public function all_pending_orders()
	{
		$this->load->model('admin/Order_model');
		$data['pro_details']=$this->Order_model->show_all_pending_orders();
		
		$this->load->view('admin/all_pending_orders',$data);
	}
	/////////////////////////////////////////////////function for showing complete detail of order in popup///////////////////////
	public function order_complete_detail($id){
			$this->load->view('admin/include/session_check.php');
			$this->load->model('admin/Order_model');
			$data_order['order_detail']=$this->Order_model->order_complete_detail($id);
			$this->load->view('admin/order_rec_detail',$data_order);
	}
	/////////////////////////////////function for deleting the order from pending page ///////////////////////////////////////////////////////////////
	public function delete_order_pen($id){
	
		$id = strtr(
            $id,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );
		$id=$this->encrypt->decode($id);
		$this->load->view('admin/include/session_check.php');
		$this->load->model('admin/Order_model');
		$this->Order_model->delete_order($id);
		redirect(site_url('Order/all_pending_orders'));
	}
	/////////////////////////////////function for deleting the order from receive page page ///////////////////////////////////////////////////////////////
	public function delete_order_rec($id){
	
		$id = strtr(
            $id,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );
		$id=$this->encrypt->decode($id);
		$this->load->view('admin/include/session_check.php');
		$this->load->model('admin/Order_model');
		$this->Order_model->delete_order($id);
		redirect(site_url('Order/all_orders'));
	}
	///////////////////////function for updating order status for delay///////////////////
	public function update_order_status($status,$id){
			$id = strtr(
            $id,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );
		$id=$this->encrypt->decode($id);
		$this->load->view('admin/include/session_check.php');
			$this->load->model('admin/Order_model');
			$ress=$this->Order_model->update_order_status($status,$id);
			if($ress)
			{
				$this->session->set_userdata('success', 'updated successfully');
				//redirect(site_url('Order/all_pending_orders'));
				$url = 'Order/all_pending_orders';
			echo'
			<script>
			window.location.href = "'.site_url().$url.'";
			</script>
			';
			}
			else
			{
				$this->session->set_userdata('failure', 'failed to update!');
				//redirect(site_url('Order/all_pending_orders'));
					$url = 'Order/all_pending_orders';
			echo'
			<script>
			window.location.href = "'.site_url().$url.'";
			</script>
			';
			}
			//echo $this->input->post('action_take');
	}
}