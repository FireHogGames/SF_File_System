<?php
include ('classes/CheckFile.php');
class getfiles{
	public static function get($dir, $user_id){

		chdir("user".$user_id);

		if ($handle = opendir($dir)) {

    		while (false !== ($entry = readdir($handle))) {

       			if ($entry != "." && $entry != "..") {

            		if(filetype($entry) == 'file'){
            			echo "file: ".$entry."<br>";
            		}else if(filetype($entry) == 'dir'){
            			echo "dir: ".$entry."<br>";
            		}
        		}
    		}

    		closedir($handle);
		}
	}
}
?>