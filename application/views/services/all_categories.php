<?php
	//var_dump($cat_detail);
	if(isset($cat_detail)){
					$category=array();
					$f=0;
					foreach($cat_detail->result_array() as $res){
					
					$category[$f]=array("cat_id"=>$res['cat_id'],"cat_name"=>$res['cat_name'],"cat_image"=>$res['cat_image'],"cat_icon"=>$res['cat_icon']);
					$f++;
					}
					$category[]=array("cat_id"=>-1,"cat_name"=>"Deals","cat_image"=>"public/images/deals.png","cat_icon"=>"public/images/deal_icon.png");
					$cat=array(
							'categories'=>$category
					);
					header('Content-type: application/json');
					$data= json_encode($cat);
					echo $data;
		}
		

?>