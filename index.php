<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (strnatcmp(phpversion(),'5.4.11') >= 0) 
{ 
	// equal or newer
} 
else 
{ 
	// not sufficiant 
}

//for PHP < 5.3.0
if ( !defined('__DIR__') ) define('__DIR__', dirname(__FILE__));

// Turn off all error reporting
error_reporting(0);

require('config.php');

if ($_SESSION['loginuser']!=null) {
}
	else {
		include('login.php');
		exit;
	}
?>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>~itemDesktop</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="reset.css">
	<!--<link rel="stylesheet" href="w3.css">
	https://www.w3schools.com/w3css/4/w3.css!-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="w3custom.css">

<script>
function startTime() {
  const today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('clock').innerHTML =  h + ":" + m + ":" + s;
  setTimeout(startTime, 1000);
}

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
  <script src="settings.js"></script>
  <script src="js/jquery.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="js/libs/monochrome.js"></script>
  <script src="js/script.js?v=1"></script>
</head>
<body onload="myNotify('Welcome to itemDesktop..'); startTime()">

  <div id="container">

  <header></header>

  <!-- Modal content -->
  <!-- The Modal -->
  <div id="myModalAbout" class="modalabout">
  <div class="modal-content">
    <span class="close">&times;</span> 
	<p><img src="img/snoopy-have-a-nice-day.gif"></p>
	<p></p>
	<p><br></p>
	<p>The itemDesktop software is licensed under the open source (revised) BSD license, one of the most flexible and liberal licenses available. 
	Third-party open source libraries we include in our download are released under their own licenses.</p>
	<p></p>
	<p>
	<form method="post" action="/index.php">
	<br><input type="submit" name="submit_btn" value="Logout" class="w3-bar-item w3-button w3-padding-16 w3-right" onclick="myNotify('Send Formular');">
	</form>
	</p>
	<p></p>
  </div>
  </div>
  
  <div id="myModalSettings" class="modalsettings">
  <div class="modal-content">
    <span class="close">&times;</span>
	<p>
	<iframe style="width:100%;height:90%;border:0;" src="Settings.html" name="iframe_a">
		<p>Your browser does not support iframes.</p>
	</iframe>
		<a href="Settings.html" target="iframe_a"></a>
	</p>
  </div>
  </div>
  
  <!-- The Modal -->
  <div id="myModal" class="modal">
  <div class="modal-content" style="">
	<span class="close">&times;</span> 
	<p>
	<iframe style="width:100%;height:90%;border:0;" src="Monitor.php" name="iframe_a">
		<p>Your browser does not support iframes.</p>
	</iframe>
		<a href="Monitor.php" target="iframe_a"></a>
	</p>
	<p>
	 <div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
  </div>Wait
</div> 
	</p>
  </div>
  </div>

  <!-- Main content -->
  <div id="main">
  
	<div id="context-menu">
      <div class="item" id="myBtnSettings">Change Background..</div>
      <div class="item" id="go-button">Enable Full Screen</div>
    </div>
  
	<!-- desktop content -->
	<div id="desktop">
		<!--div class="file" id="file-0"><a href="login.html"><img src="img/icon-doc.png"><p><span class="name">LOGIN SCREEN</span></p></a></div>
		<div class="file" id="file-1"><a href="login.html"><img src="img/icon-doc.png"><p><span class="name">ANOTHER LOGIN</span></p></a></div!-->
	</div>
  
	<!-- top content -->
    <div id="menubar">
      <div class="menu">
        <p>~</p>
       
		<div class="menubox">
				<button id="myBtn">Resource Monitor</button>
			</div>
      </div>
	
	<div id="tasks"></div>

	<div class="menu">
    	<p id="clock" onload="currentTime()"></p>
	</div>
 
	</div>
	
  </div>
  
  <div id="snackbar"></div>
  
  <div style='position:absolute; right:10px; bottom:10px; background:white; padding:0px 2px; cursor:pointer;' id="myBtnAbout">itemDesktop 2022</div>
  
  <footer></footer>
  
  </div>
  </div>
  </div>
 
  <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the modal
var modalabout = document.getElementById("myModalAbout");

// Get the modal
var modalsettings = document.getElementById("myModalSettings");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the button that opens the modal
var btnsettings = document.getElementById("myBtnSettings");

// Get the button that opens the modal
var btnabout = document.getElementById("myBtnAbout");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
  myNotify('open Software dialog..');
}

// When the user clicks the button, open the modal 
btnsettings.onclick = function() {
  modalsettings.style.display = "block";
  myNotify('open Settings dialog..');
}

// When the user clicks the button, open the modal 
btnabout.onclick = function() {
  modalabout.style.display = "block";
  myNotify('open About dialog..');
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  modalsettings.style.display = "none";
  modalabout.style.display = "none";
  myNotify('close dialog..');
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    //modal.style.display = "none";
  }
  if (event.target == modalsettings) {
    //modalsettings.style.display = "none";
  }
  if (event.target == modalabout) {
    //modalabout.style.display = "none";
  }
}
</script>


<script>
function myNotify(str) {
  var x = document.getElementById("snackbar");
  x.className = "show";
  x.innerHTML = str;
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
<script>
function openFullscreen() {
var elem = document.getElementById("container");
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
	myNotify('Goes Fullscreen..');
  } else if (elem.webkitRequestFullscreen) { /* Safari */
    elem.webkitRequestFullscreen();
	myNotify('Goes Fullscreen..');
  } else if (elem.msRequestFullscreen) { /* IE11 */
    elem.msRequestFullscreen();
	myNotify('Goes Fullscreen..');
  }
}
/* Get into full screen */
function GoInFullscreen(element) {
	if(element.requestFullscreen)
		element.requestFullscreen();
	else if(element.mozRequestFullScreen)
		element.mozRequestFullScreen();
	else if(element.webkitRequestFullscreen)
		element.webkitRequestFullscreen();
	else if(element.msRequestFullscreen)
		element.msRequestFullscreen();
}

/* Get out of full screen */
function GoOutFullscreen() {
	if(document.exitFullscreen)
		document.exitFullscreen();
	else if(document.mozCancelFullScreen)
		document.mozCancelFullScreen();
	else if(document.webkitExitFullscreen)
		document.webkitExitFullscreen();
	else if(document.msExitFullscreen)
		document.msExitFullscreen();
}

/* Is currently in full screen or not */
function IsFullScreenCurrently() {
	var full_screen_element = document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement || null;
	
	// If no element is in full-screen
	if(full_screen_element === null)
		return false;
	else
		return true;
}

$("#go-button").on('click', function() {
	if(IsFullScreenCurrently())
		GoOutFullscreen();
	else
		GoInFullscreen($("#container").get(0));
});

$(document).on('fullscreenchange webkitfullscreenchange mozfullscreenchange MSFullscreenChange', function() {
	if(IsFullScreenCurrently()) {
		//$("#container span").text('Full Screen Mode Enabled');
		myNotify('Full Screen Mode Enabled..');
		$("#go-button").text('Disable Full Screen');
	}
	else {
		//$("#container span").text('Full Screen Mode Disabled');
		myNotify('Full Screen Mode Disabled..');
		$("#go-button").text('Enable Full Screen');
	}
});
</script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
<script>
//const text = '{"background-image":"url(img/1bithalftone.png)","background-color":"yellow"}';
$.getJSON("settings.json", function(json) {
	$.each(json, function (key, value) {
		switch (key) {
		case 'background-color':
				document.body.style.background-color = value;
				document.getElementById("container").style.backgroundColor = value;
				myNotify('Change Background-Color..');
		break;
		case 'background-image':
				document.body.style.background-image = value;
				document.getElementById("container").style.backgroundImage = value;
				myNotify('Change Background-Image..');
		break;
		}
	});
});
</script>
<script>
      const contextMenu = document.getElementById("context-menu");
      const scope = document.querySelector("body");

      const normalizePozition = (mouseX, mouseY) => {
        // ? compute what is the mouse position relative to the container element (scope)
        let {
          left: scopeOffsetX,
          top: scopeOffsetY,
        } = scope.getBoundingClientRect();
        
        scopeOffsetX = scopeOffsetX < 0 ? 0 : scopeOffsetX;
        scopeOffsetY = scopeOffsetY < 0 ? 0 : scopeOffsetY;
       
        const scopeX = mouseX - scopeOffsetX;
        const scopeY = mouseY - scopeOffsetY;

        // ? check if the element will go out of bounds
        const outOfBoundsOnX =
          scopeX + contextMenu.clientWidth > scope.clientWidth;

        const outOfBoundsOnY =
          scopeY + contextMenu.clientHeight > scope.clientHeight;

        let normalizedX = mouseX;
        let normalizedY = mouseY;

        // ? normalize on X
        if (outOfBoundsOnX) {
          normalizedX =
            scopeOffsetX + scope.clientWidth - contextMenu.clientWidth;
        }

        // ? normalize on Y
        if (outOfBoundsOnY) {
          normalizedY =
            scopeOffsetY + scope.clientHeight - contextMenu.clientHeight;
        }

        return { normalizedX, normalizedY };
      };

      scope.addEventListener("contextmenu", (event) => {
        event.preventDefault();

        const { clientX: mouseX, clientY: mouseY } = event;

        const { normalizedX, normalizedY } = normalizePozition(mouseX, mouseY);

        contextMenu.classList.remove("visible");

        contextMenu.style.top = `${normalizedY}px`;
        contextMenu.style.left = `${normalizedX}px`;

        setTimeout(() => {
          contextMenu.classList.add("visible");
        });
      });

      scope.addEventListener("click", (e) => {
        // ? close the menu if the user clicks outside of it
        if (e.target.offsetParent != contextMenu) {
          contextMenu.classList.remove("visible");
        }
      });
</script>
</body>
</html>
