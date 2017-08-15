<?php
	if(isset($timing)){
					$time=array();
					foreach($timing->result_array() as $res){
					
					$time=array("opening_time"=>$res['opening_time'],"closing_time"=>$res['closing_time'],"status"=>$res['emergency_status']);
					
					}
					
						$rest_timing=$time;
					
					header('Content-type: application/json');
					$data= json_encode($time);
					echo $data;
		}
		

?>