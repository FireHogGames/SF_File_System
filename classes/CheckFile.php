<?php

class check{
	public static function checkfile($file){

		$status = "";

		if(file_exists($file)){
    		$status = "1";
    	}else{
    		$status = "0";
    	}

    	return $status;
	}
}

?>