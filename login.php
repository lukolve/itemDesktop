<!DOCTYPE html>
<html>
<title>LOGIN SCREEN</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('');
  min-height: 100%;
  background-position: center;
  background-size: cover;
  background-repeat: repeat;
	
	background-attachment: fixed;
	filter: alpha(opacity=90); -moz-opacity: 0.9; opacity: 0.9;
  color: #000000;
  overflow: auto;
}

body {
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;
}

img:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}

.w3-base-button {
  background-color: white;
  border: none;
  color: black;
  padding: 16px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.w3-custom-button {
  background-color: white; 
  color: black; 
  margin-left: j0px;
  border: 5px solid gray;
}

.w3-custom-button:hover {
  background-color: yellow;
  color: black;
}

#next {
  left: 129px;
  width: 43px;
  height: 43px;
  background: url('img_navsprites_hover.gif') -91px 0;
}
#next a:hover {
  background: url('img_navsprites_hover.gif') -91px -45px;
}
#element {
}

#go-button {
}

/* webkit requires explicit width, height = 100% of sceeen */
/* webkit also takes margin into account in full screen also - so margin should be removed (otherwise black areas will be seen) */
#element:-webkit-full-screen {
	background-color: pink;

}

#element:-moz-full-screen {
	background-color: pink;
}

#element:-ms-fullscreen {
	background-color: pink;
}

/* W3C proposal that will eventually come in all browsers */
#element:fullscreen { 
	background-color: pink;
}

.lds-ripple {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ripple div {
  position: absolute;
  border: 4px solid #fff;
  opacity: 1;
  border-radius: 50%;
  animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
.lds-ripple div:nth-child(2) {
  animation-delay: -0.5s;
}
@keyframes lds-ripple {
  0% {
    top: 36px;
    left: 36px;
    width: 0;
    height: 0;
    opacity: 1;
  }
  100% {
    top: 0px;
    left: 0px;
    width: 72px;
    height: 72px;
    opacity: 0;
  }
}

</style>
<body>

<div id="element" class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-topleft w3-padding-large w3-xlarge">
    
  </div>
  <div class="w3-display-middle">

    <p class="w3-large w3-center">
	<form method="post" action="/index.php">
	<input id="go-button" type="text" name="name" value="Nick..">
	<!--<span class="error">* ?php echo $nameErr;?</span>!-->
	<br><br>
	<input type="text" name="password" value="Password..">
	<!--<span class="error">* ?php echo $passwordErr;?</span>!-->
	<br><br><input type="submit" name="submit_btn" value="Sign In" class="w3-bar-item w3-button w3-padding-16 w3-right" onclick="myNotify('Send Formular');">
	</form>
	</p>
  </div>
  <div class="w3-display-bottomleft w3-padding-large">
    <!--Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>!-->
	<div class="lds-ripple"><div></div><div></div></div>
  </div>
</div>

</body>

<script>
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
	{
		//GoOutFullscreen();
	}
	else
		GoInFullscreen($("#element").get(0));
});

$(document).on('fullscreenchange webkitfullscreenchange mozfullscreenchange MSFullscreenChange', function() {
	if(IsFullScreenCurrently()) {
		$("#element span").text('Full Screen Mode Enabled');
		$("#go-button").text('Disable Full Screen');
	}
	else {
		$("#element span").text('Full Screen Mode Disabled');
		$("#go-button").text('Enable Full Screen');
	}
});

</script>
</html>
