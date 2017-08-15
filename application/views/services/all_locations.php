<?php
	//var_dump($loc->result_array());
	//exit;
	if(isset($loc)){
					$locs=array();
					foreach($loc->result_array() as $res){
					
					$locs[]=array("loc_name"=>$res['loc_name'],"loc_charges"=>$res['loc_charges'],"min_order"=>$res['min_order']);
					
					}
					$locations=array(
							'locations'=>$locs
					);
					header('Content-type: application/json');
					$data= json_encode($locations);
					echo $data;
		}
		

?>