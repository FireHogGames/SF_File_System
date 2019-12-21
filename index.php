<title>File system tester</title>
<style>
	button{
		border: none;
		background-color: white;
		text-decoration: underline;
		color: blue;
		cursor: pointer;
	}
</style>

<?php
include ('classes/FileSystem.php');

$user_id = "1";

$standardfiledir = ".";

echo "<h1>Disk space</h1>";
$total_space = FileSystem::GetSpaceCompare($standardfiledir);
echo $total_space;
echo '<hr>';

echo "<h1>User ".$user_id." files</h1>";
FileSystem::GetUserFiles($standardfiledir, $user_id);
echo '<hr>';
echo "<h1>Adding/Removing directories</h1>";
?>

<form method="POST">
	<p>Add directory</p>
	<input type="text" name="mkdirname" placeholder="Enter name">
	<input type="submit" name="adddir" value="Add dir">
</form>

<?php

if(isset($_POST['adddir'])){
	$name = $_POST['mkdirname'];
	if(isset($name)){
		FileSystem::AddDir($name);
		header('location:index.php');
	}else{
		echo "No directory name set! Please enter a valid directory name!";
	}
}

?>

<form method="POST">
	<p>Remove directory</p>
	<input type="text" name="rmdirname" placeholder="Enter name">
	<input type="submit" name="removedir" value="Remove dir">
</form>

<?php

if(isset($_POST['removedir'])){
	$name = $_POST['rmdirname'];
	if(isset($name)){
		FileSystem::RemoveDir($name);
		header('location:index.php');
	}else{
		echo "No directory name set! Please enter a valid directory name!";
	}
}
echo '<hr>';
echo "<h1>Adding/Removing files</h1>";
?>

<form method="POST">
	<p>Add file</p>
	<input type="text" name="mkfilename" placeholder="Enter name">
	<input type="submit" name="addfile" value="Add file">
</form>

<?php

if(isset($_POST['addfile'])){
	$name = $_POST['mkfilename'];
	if(isset($name)){
		FileSystem::AddFile($name);
		header('location:index.php');
	}else{
		echo "No file name set! Please enter a valid file name!";
	}
}

?>

<form method="POST">
	<p>Remove file</p>
	<input type="text" name="rmfilename" placeholder="Enter name">
	<input type="submit" name="removefile" value="Remove file">
</form>

<?php

if(isset($_POST['removefile'])){
	$name = $_POST['rmfilename'];
	if(isset($name)){
		FileSystem::RemoveFile($name);
		header('location:index.php');
	}else{
		echo "No file name set! Please enter a valid file name!";
	}
}

echo '<hr>';
echo "<h1>Reading files</h1>";
?>

<form method="POST">
	<p>Remove file</p>
	<input type="text" name="rdfilename" placeholder="Enter name">
	<input type="submit" name="readfile" value="Read file">
</form>

<?php

if(isset($_POST['readfile'])){
	$name = $_POST['rdfilename'];
	if(isset($name)){
		FileSystem::ReadFile($name);
	}else{
		echo "No file name set! Please enter a valid file name!";
	}
}
?>