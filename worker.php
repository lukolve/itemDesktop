<html>
  <head>
    <title>Apply Settings</title>
  </head>
  <body>
  <?php
if ($_POST['work']) {
$work = $_POST['work'];
$color = $_POST['color'];
$myFile = "settings.json";
$fh = fopen($myFile, 'w') or die("can't open file");
fwrite($fh, "{\"");
fwrite($fh, $work);
fwrite($fh, "\":\"");
fwrite($fh, $color);
fwrite($fh, "\"}");
fclose($fh);
}

//
//write json to file
//if (file_put_contents("settings.json", $_POST["x"]))
//    echo "JSON file created successfully...";
//else 
//    echo "Oops! Error creating json file...";
?>
  </body>
</html>