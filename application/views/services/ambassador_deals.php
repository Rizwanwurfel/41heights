<?php 
	//var_dump($pr_detail);
	$deals=array();
		if($pr_detail!=false && !empty($pr_detail) )
		{
			$deals=array(
					'deals'=>$pr_detail
						);
									
		}
		else
		{
			$deals=array(
					'deals'=>"no data"
						);
			
		}
								header('Content-type: application/json');
									$data= json_encode($deals);
									echo $data;
		
					
?>