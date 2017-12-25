<?php

$_POST=array_chunk($_POST,2,true);
foreach($_POST as $k8=>$v8){
foreach($v8 as $k=>$v){	
	if(is_array($v)){
		$value="";
		foreach($v as $k1=>$v1){
			if($k1 != 0){
				$value.=' || ';
			}
		$value.=$v1;	
		}
		$updtd_id=$v8[$k.'_hidden'];
		$field=array('gcef_id'=>$updtd_id,"field_name"=>$k,"value"=>$value);
	
		print_r($field);
	}else{
		$updtd_id=$v8[$k.'_hidden'];
		$field=array('gcef_id'=>$updtd_id,"field_name"=>$k,"value"=>$v);
		print_r($field);

	}
	break;
}
}

?>