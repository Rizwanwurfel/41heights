<?php
	if(isset($dis) && $dis!=false){
				
					
					/*$locs=array("discount"=>$dis->discount, /// overall normal discount
					"ref_discount"=>$dis->ref_discount, // discount to customer by ambassador refference
					"ref_deal_discount"=>"0", // discount to customer by ambassador refference on deals 
					"amb_product_points"=>$dis->ref_points_products, //points to ambassador on products if customer orders through amb refference
					"amb_deal_points"=>$dis->ref_points_deals); //points to ambassador on deals if customer orders through amb refference
					*/
					
					header('Content-type: application/json');
					$data= json_encode($dis);
					echo $data;
		}
		

?>