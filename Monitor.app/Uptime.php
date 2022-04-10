<?php
// Collect the Data first
# Get uptime info from system call to uptime
$uptime = exec("/usr/bin/uptime");

// Okay got all the data... lets display it
echo "<ul>";
echo "<li>Uptime:" . $uptime . "</li>";
echo "</ul>";

?>