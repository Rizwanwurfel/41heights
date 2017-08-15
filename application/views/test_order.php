<?php  
	$data_json='[{"item_type":"pizza","item_id":"14","item_name":"7\" ,chicken pepperoni","item_image":"public\/products\/products\/28\/170317102831carrot.png","item_ind_price":350,"item_total_price":350,"item_qty":1,"item_att":"{\"pizza\":[],\"drink\":[]}"},{"item_type":"drinks","item_id":"16","item_name":"1.5","item_image":"public\/products\/products\/32\/170331013449asp.jpg","item_ind_price":100,"item_total_price":300,"item_qty":3,"item_att":"{\"pizza\":[],\"drink\":[{\"flavour\":\"fanta\"}]}"}]';
	$data = json_decode($data_json, true);
			foreach($data as $main=>$val)
			{
				var_dump($val);
				echo $val['item_att']."<br/>";

				
			}
																
?>