<?php 
//var_dump($pr_detail->result_array());
$data=array();
$product=array();
		if(isset($pr_detail) && $pr_detail!=false)
		{
			foreach($pr_detail->result_array() as $deal)
			{
				$att_v=$this->db->query("select att_values.att_value, att_values.att_value_price,att_values.att_value_image,att_values.att_value_afimage,att_values.att_value_desc from att_values where att_name_id='".$deal['att_name_id']."'");
				
					if($att_v->num_rows()>0)
					{
						foreach($att_v->result_array() as $att)
						{
							$data[$deal['att_name']][]=array(
							
										"value"=>$att['att_value'],
										"selection"=>$deal['att_selection'],
										"price"=>$att['att_value_price'],
										"image"=>$att['att_value_image'],
										"image_after"=>$att['att_value_afimage'],
										"desc"=>$att['att_value_desc'],
					
										);
							
						}
					}
				
					
			}
			
			$product=array(
								"deal_custom"=>$data,
								
							);
		}
		else
		{
			$product['deal_custom']=array(
								"products"=>"no data",
								
							);
		}
		header('Content-type: application/json');
		$data= json_encode($product);
		echo $data;
?>