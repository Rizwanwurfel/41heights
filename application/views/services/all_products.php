<?php
		
		$sd=array();
		$att_id=0;
		$product=array();
		if($pr_detail!=false) 
		{ //if 01
									$sh_c=0;
											foreach($pr_detail->result_array() as $res)
											{
												
													if(strtolower($res['cat_name'])=="pizza")
													{
														$sd[$sh_c]=array(
																					"product_id"=>$res['pr_id'],
																					"product_name"=>$res['pr_name'],
																					"product_image"=>$res['pr_image'],
																					"product_price"=>$res['pr_price'],
																					"cat_id"=>$res['cat_id'],
																					"cat_name"=>$res['cat_name'],
																					"att_cat_id"=>$res['att_cat_id'],
																					
																		
																	);
																	$sh_c++;
													}
													else{
													
																$sd[$sh_c]=array(
																					"product_id"=>$res['pr_id'],
																					"product_name"=>$res['pr_name'],
																					"product_image"=>$res['pr_image'],
																					"product_price"=>$res['pr_price'],
																					"cat_id"=>$res['cat_id'],
																					"cat_name"=>$res['cat_name'],
																					"att_cat_id"=>$res['att_cat_id'],
																					
																		
																	);
																	$sh_c++;
													}
																	$att_id=$res['att_cat_id'];
											
											}
							////////////////if there is attribute associated///////////
							$att=array();
							$attributes=array();
							$query_att=$this->db->query("select att_name.att_name_id,att_name.att_name,att_name.att_selection,att_values.* from att_name right join att_values on att_name.att_name_id=att_values.att_name_id where att_name.att_cat_id='".$att_id."'");
							if($query_att->num_rows()>0)
							{
								foreach($query_att->result_array() as $atts)
								{
									
									$att['att_name'][]=$atts['att_name'];	
									$att['att_selection'][]=$atts['att_selection'];
									$att['att_value'][]=$atts['att_value'];
									$att['att_price'][]=$atts['att_value_price'];
									$att['att_image'][]=$atts['att_value_image'];
									$att['att_afimage'][]=$atts['att_value_afimage'];
									$att['att_desc'][]=$atts['att_value_desc'];
								}
								//$attributes=array();
								
								for($a=0;$a<count($att['att_name']); $a++)
								{
									 //$g=$att['att_name'][$a];
									$attributes[$att['att_name'][$a]][]=array(
									
										"value"=>$att['att_value'][$a],
										"selection"=>$att['att_selection'][$a],
										"price"=>$att['att_price'][$a],
										"image"=>$att['att_image'][$a],
										"image_after"=>$att['att_afimage'][$a],
										"desc"=>$att['att_desc'][$a],
									);
								
								}
								
							}
							
							/*var_dump($attributes);
							echo "///////////////////////////////////////";
							var_dump($att);
							exit;*/
							$product=array(
								"products"=>$sd,
								"attributes"=>$attributes
							);
		} //if 01 ends
		else
		{
			$product['product_data']=array(
								"products"=>"no data",
								
							);
		}
		
		
		header('Content-type: application/json');
		$data= json_encode($product);
		echo $data;

?>