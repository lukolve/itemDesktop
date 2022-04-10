<?php
// Collect the Data first
# Get current temp from cron updated file
$temp = file("/www/vhosts/webrpi/currenttemp");
$tmp = substr($temp[0],7);
$temp = preg_replace("/'/",'&deg;',$tmp);
// Okay got all the data... lets display it
echo "<ul>";
echo "<li>Internal Temp: " . $temp . "</li>";
echo "</ul>";
?>
