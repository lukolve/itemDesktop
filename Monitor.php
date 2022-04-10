<!DOCTYPE html>
<html>
<title>Resource Monitor</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<!--https://www.w3schools.com/w3css/4/w3.css!-->
<body>

<div class="w3-container">
  <p>Resource Monitor of your NAS.</p>
</div>

<div class="w3-bar w3-black">
  <button class="w3-bar-item w3-button" onclick="openCity('CPU')">CPU</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Memory')">Memory</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Network')">Network</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Disk')">Disk and Volume</button>
</div>

<div id="CPU" class="w3-container city">
  <h2>CPU</h2>
  <p>Your NAS htop.</p>
  <p><?php include_once("Monitor.app/Uptime.php"); ?></p>
  <p><?php include_once("Monitor.app/Temp.php"); ?></p>
</div>

<div id="Memory" class="w3-container city" style="display:none">
  <h2>Memory</h2>
  <p>Memory, swap and so..</p>
  <p><?php include_once("Monitor.app/Memory.php"); ?></p>
</div>

<div id="Network" class="w3-container city" style="display:none">
  <h2>Network</h2>
  <p>Wired and WiFi network.</p>
  <p><?php include_once("Monitor.app/Net.php"); ?></p>
</div>

<div id="Disk" class="w3-container city" style="display:none">
  <h2>Disk</h2>
  <p>Disk and Volume management.</p>
</div>

<script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script>

</body>
</html>
