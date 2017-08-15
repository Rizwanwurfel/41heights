<?php
	if(isset($slider)){
					$slides=array();
					foreach($slider->result_array() as $res){
					
					$slides[]=array("slider_id"=>$res['slider_id'],"slider_image"=>$res['slider_image'],"slider_name"=>$res['slider_text']);
					
					}
					$sliders=array(
						'slider'=>$slides
					);
					header('Content-type: application/json');
					$data= json_encode($sliders);
					echo $data;
		}
		

?>