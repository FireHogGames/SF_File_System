<title>File system tester</title>

<?php
include ('classes/FileSystem.php'); //load the filesystem class

/*
user_id and standardfiledir is required for getting and setting the user files. user_id can be set to get a logged in user from a database but is set to a fixed number for debugging reasons.
In order for the code to work there must be a "users" folder inside the same folder as this index.php
*/
$user_id = 1;
$standardfiledir = ".";

echo "<h1>Disk space</h1>";
echo "Comparison: ".FileSystem::GetSpaceCompare($standardfiledir);
echo "Free space: ".FileSystem::GetFreeSpace($standardfiledir);
echo "Total space: ".FileSystem::GetTotalSpace($standardfiledir);
echo '<hr>';

echo "<h1>User ".$user_id." files</h1>";
FileSystem::GetUserFiles($standardfiledir, $user_id);
echo '<hr>';
echo "<h1>Adding/Removing directories</h1>";
?>

<form method="POST">
	<p>Add directory</p>
	<input type="text" name="mkdirname" placeholder="Enter name"><br>
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
	<input type="text" name="rmdirname" placeholder="Enter name"><br>
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
	<input type="text" name="mkfilename" placeholder="Enter name"><br>
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
	<input type="text" name="rmfilename" placeholder="Enter name"><br>
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
	<input type="text" name="rdfilename" placeholder="Enter name"><br>
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

echo '<hr>';
echo "<h1>Moving files/directories</h1>";
?>

<form method="POST">
	<p>Move file/directories</p>
	<input type="text" name="mvfilename" placeholder="Enter file name"><br>
	<input type="text" name="mvdirname" placeholder="Enter dir name" value="./foldername"><br>
	<input type="submit" name="movefile" value="Move file/directory">
</form>

<?php

if(isset($_POST['movefile'])){
	$name = $_POST['mvfilename'];
	$dirname = $_POST['mvdirname'];
	if(isset($name)){
		FileSystem::MoveFile($name, $dirname);
	}else{
		echo "No file name set! Please enter a valid file name!";
	}
}

echo '<hr>';
echo "<h1>Copying files/directories</h1>";
?>

<form method="POST">
	<p>Copy file/directories</p>
	<input type="text" name="cpfilename" placeholder="Enter file name"><br>
	<input type="submit" name="copyfile" value="Copy file/directory">
</form>

<?php

if(isset($_POST['copyfile'])){
	$name = $_POST['cpfilename'];
	if(isset($name)){
		FileSystem::CopyFile($name);
	}else{
		echo "No file name set! Please enter a valid file name!";
	}
}

echo '<hr>';
echo "<h1>Renaming files/directories</h1>";
?>

<form method="POST">
	<p>Copy file/directories</p>
	<input type="text" name="rnfilename" placeholder="Enter file name"><br>
	<input type="text" name="nfilename" placeholder="Enter file name"><br>
	<input type="submit" name="renamefile" value="Rename file/directory">
</form>

<?php

if(isset($_POST['renamefile'])){
	$name = $_POST['rnfilename'];
	$newname = $_POST['nfilename'];
	if(isset($name)){
		FileSystem::RenameFile($name, $newname);
	}else{
		echo "No file name set! Please enter a valid file name!";
	}
}
?>