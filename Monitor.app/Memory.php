<?php
// Collect the Data first
# Read the current memory output of free -mt
$raw = array();
$handle = popen('free -mt 2>&1', 'r');
#echo "'$handle'; " . gettype($handle) . "\n";
while (!feof($handle)) {
    $raw[] = fgets($handle);
}
pclose($handle);
foreach($raw as $key => $val) {
  if (strpos($val,"Mem:") !== FALSE) {
    list($junk,$trmem,$tumem, $tfmem) = preg_split('/ +/',$val);
  }
  if (strpos($val,"Swap:") !== FALSE) {
    list($junk,$trswap,$tuswap, $tfswap) = preg_split('/ +/',$val);
  }
  if (strpos($val,"Total:") !== FALSE) {
    list($junk,$tmem,$umem, $fmem) = preg_split('/ +/',$val);
  }
}

// Okay got all the data... lets display it
echo "<ul>";
echo "<li>Memory Split: 240/16</li>";
echo "</ul>";
echo '<table class="status" style="width: 60%;">
<tr><th>Type</th><th>Total</th><th>Used</th><th>Free</th></tr>
<tr><td>Real</td><td>' . $trmem . 'mb</td><td>' . $tumem . 'mb</td><td>' . $tfmem . 'mb</td></tr>
<tr><td>Swap</td><td>' . $trswap . 'mb</td><td>' . $tuswap . 'mb</td><td>' . $tfswap . 'mb</td></tr>
<tr><td>Total</td><td>' . $tmem . 'mb</td><td>' . $umem . 'mb</td><td>' . $fmem . 'mb</td></tr>
</table>';
