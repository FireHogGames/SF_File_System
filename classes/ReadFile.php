<?php

class read{
	public static function readfile($file){

		$status = "";

		if(file_exists($file)){
    		$status = readfile($file);
    	}else{
    		$status = "File is not found or does not exist!";
    	}

    	return $status;
	}

	public static function openfile(){
		
	}
}

?>