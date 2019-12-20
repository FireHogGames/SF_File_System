<?php
include ('classes/ReadFile.php');
include ('classes/GetUserFiles.php');
include ('classes/GetDiskInfo.php');

$user_id = "1";

$standardfiledir = ".";

$total_space = DiskInfo::GetSpaceCompare($standardfiledir);
echo $total_space;

getfiles::get($standardfiledir, $user_id);

?>