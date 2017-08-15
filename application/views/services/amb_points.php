<?php 
	//var_dump($amb_points);
	//exit;
	$amb_data=array();
		if($amb_points!=false && !empty($amb_points) )
		{
			$amb_data=array(
					'amb_points'=>$amb_points->amb_ref_points,
					'amb_image'=>$amb_points->amb_image,
					'amb_name'=>$amb_points->amb_name,
					'amb_phone'=>$amb_points->amb_phone,
					'amb_hostelite'=>$amb_points->hostelite,
					'amb_address'=>$amb_points->amb_address,
					'amb_office'=>$amb_points->	amb_office,
					'amb_approved'=>$amb_points->amb_approved
						);
									
		}
		else
		{
			$amb_data=array(
					'amb_points'=>"nill",
					'amb_image'=>"nill"
						);
			
		}
								header('Content-type: application/json');
									$data= json_encode($amb_data);
									echo $data;
		
					
?>