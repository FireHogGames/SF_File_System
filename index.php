<?php
include ('classes/ReadFile.php');
include ('classes/GetUserFiles.php');
include ('classes/GetDiskInfo.php');

$user_id = "1";

$standardfiledir = ".";

echo "<h1>Disk space</h1>";
$total_space = DiskInfo::GetSpaceCompare($standardfiledir);
echo $total_space;

echo "<h1>User ".$user_id." files</h1>";
getfiles::get($standardfiledir, $user_id);

?>