<?php

class DiskInfo{
	public static function GetTotalSpace($disk){
		$bytes = disk_total_space($disk);
    	$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    	$base = 1024;
    	$class = min((int)log($bytes , $base) , count($si_prefix) - 1);
    	$total = sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class] . '<br />';
    	return $total;
	}

	public static function GetFreeSpace($disk){
		$bytes = disk_free_space($disk);
    	$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    	$base = 1024;
    	$class = min((int)log($bytes , $base) , count($si_prefix) - 1);
    	$total = sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class] . '<br />';
    	return $total;
	}

	public static function GetSpaceCompare($disk){
		$freebytes = disk_free_space($disk);
		$totalbytes = disk_total_space($disk);

    	$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    	$base = 1024;
    	$class = min((int)log($freebytes , $base) , count($si_prefix) - 1);
    	$total = sprintf('%1.2f' , $freebytes / pow($base,$class)) . ' ' . $si_prefix[$class] . ' / ' . sprintf('%1.2f' , $totalbytes / pow($base,$class)) . ' ' . $si_prefix[$class] . '<br>';
    	return $total;
	}
}

?>