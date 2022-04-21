<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<style>
.list-group-item:hover{
background-color: #eee;
}
</style>
<div class="container">
<?php
$dir = "../bindata/files/lukas/";
?>
  <h2><?php echo $dir; ?></h2>
  <ul class="list-group list-group-addons">
<?php

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
      if($file != "." && $file != ".." && $file != "Thumbs.db"/*pesky windows, images..*/)
		echo "<li class=\"list-group-item\"><a href=\"" . $dir. "/" .$file . "\"\>". $file . "</a><span class=\"badge\">file</span></li>";
    }
    closedir($dh);
  }
}
?> 
  </ul>
</div>

</body>
</html>
