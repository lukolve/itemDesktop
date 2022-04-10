<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.colorbox.js"></script>	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/slides.min.jquery.js"></script>
<script type="text/javascript" src="notes.js"></script>
<body>
<hr>
<form  NAME="formular" action="{$_SERVER['PHP_SELF']}" method="post" onsubmit="bbstyle(-1,0)">
					<button type="button" class="fbutton" accesskey="b" id="addbbcode0_0" style="width: 30px" onclick="bbstyle(0, 0); return false"><span style="font-weight: bold"> B </span></button>
					<button type="button" class="fbutton" accesskey="i" id="addbbcode2_0" style="width: 30px" onclick="bbstyle(2, 0); return false"><span style="font-style:italic"> i </span></button>
					<button type="button" class="fbutton" accesskey="u" id="addbbcode4_0" style="width: 30px" onclick="bbstyle(4, 0); return false"><span style="text-decoration: underline"> U </span></button>
					<button type="button" class="fbutton" accesskey="s" id="addbbcode8_0" style="width: 30px" onclick="bbstyle(8, 0); return false"><span style="text-decoration: line-through"> S </span></button>
					<button type="button" class="fbutton" style="width: 50px" onclick="inputimg_url(0); return false"><span> IMAGE </span></button>
					<button type="button" class="fbutton" style="width: 50px" onclick="input_url(0); return false"><span> URL </span></button>
					<button type="button" class="fbutton" id="addbbcode6_0" style="width: 60px" onclick="bbstyle(6, 0); return false"><span> BREAK </span></button>
					<button type="button" class="fbutton" id="" style="width: 80px" onclick="input_youtube(0); return false"><span> YOUTUBE </span></button>
				</div>
				<br />
 <label style="font-size: 18px;"></label><br />
				<textarea class="ckeditor" name="textak" id="text0" style="width: 550px; height: 128px;">{$mypage}</textarea>
				<div class="clear"></div>
				<div style="font-size: 12px;"><i>[url=HTTP://]URL_NAME[/url] [img]URL_TO_IMAGE[/img] [b][/b] [i][/i] [u][/u] [br][/br]</i></div>
<br>
<button type="input" name="color" value="" onclick="">Save Message</button>
</form>
</body>
</html>	