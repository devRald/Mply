<?php
function load_assets($src,$type){
	if($type == "css"){
		if(is_array($src)){
			foreach ($src as $value) {
				echo parse_assets($value,"css");
			}
		}
		else{
			echo parse_assets($src,"css");
		}
	}else if($type=="js"){
		if(is_array($src)){
			foreach ($src as $value) {
				echo parse_assets($value,"js");
			}
		}
		else{
			echo parse_assets($src,"js");
		}
	}
}

function parse_assets($name,$type){
	if($type == "css"){
		return '<link rel="stylesheet" href="'.base_url().'assets/css/'.$name.'">';
	}else{
		return '<script src="'.base_url().'assets/js/'.$name.'"></script>';
	}
}

function get_image_url($name){
	return base_url().'assets/img/'.$name;
}