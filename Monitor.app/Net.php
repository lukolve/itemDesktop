<?php
// Collect the Data first
# Get uptime info from system call to ifconfig
$ifconfig = exec("ifconfig");

// Okay got all the data... lets display it
echo "<ul>";
echo "<li>" . $ifconfig . "</li>";
echo "</ul>";

?>