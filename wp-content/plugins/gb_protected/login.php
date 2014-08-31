<?php
$options = get_option_pt();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--Spiders-design.co.uk password protection ver 2.8 <?=$options['hideLink']?> -->
<title>Login</title>
<script type="text/javascript"
 src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" language="javascript">
function dologin()	{
	var password = $('#password').val();
	if(password == "")
	{
		$('#status').html('No password entered');
	}
	else
	{
	var url = location.href
	url = url.split("?", 1);
	//alert(url);
	url = url + "?sd_password=";
	url = url + password;
	showdiv('loading');
	$.getScript(url, function() {
		hidediv('loading');
	}
	);
	}
}
function hidediv(id) {
	//safe function to hide an element with a specified id
	if (document.getElementById) { // DOM3 = IE5, NS6
		document.getElementById(id).style.display = 'none';
	}
	else {
		if (document.layers) { // Netscape 4
			document.id.display = 'none';
		}
		else { // IE 4
			document.all.id.style.display = 'none';
		}
	}
}

function showdiv(id) {
	//safe function to show an element with a specified id
		  
	if (document.getElementById) { // DOM3 = IE5, NS6
		document.getElementById(id).style.display = 'block';
	}
	else {
		if (document.layers) { // Netscape 4
			document.id.display = 'block';
		}
		else { // IE 4
			document.all.id.style.display = 'block';
		}
	}
}
</script>
<style>
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,300,700);
body, html
{
	background-color:#F9F9F9 !important !important;
	font-family: 'Open Sans', Arial, sans-serif;
	font-weight:300;
}
.logo-greenbox
{
	position:relative;
	width:auto;
	min-width:375px;
	padding:10px;
	height:100px;
	margin-left:auto;
	margin-right:auto;
	margin-bottom:15px;
	margin-top:10%;
}

#login-form
{
	background-color:#FFFFFF;
	-webkit-box-shadow: 0px 4px 18px #c8c8c8;
	-moz-box-shadow: 0px 4px 18px #c8c8c8;
	box-shadow: 0px 4px 18px #c8c8c8;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	width:375px;
	min-height:10px;
	margin-bottom:10px;
	padding:20px;
	margin-left:auto;
	margin-right:auto;
	border: 1px solid #E5E5E5;
}
.formtext
{
	margin-top:30px;
	font-family:'Open Sans', Arial, sans-serif;
	color:#777;
	font-size:16px;
	cursor: default;
	margin-bottom:10px;
}
#password
{
	position:relative;
	top:10px;
	width:370px;
	height:20px;
	border: 1px solid #E5E5E5;
	background-color:#F9F9F9;
	font-size: 15px;
	padding:3px;
	color: #555;
	margin-bottom:15px;
}
#submit
{
	border-color: #13455B;
	background-image: url(<?php echo(WP_PLUGIN_URL);?>/gb_protected/images/button-grad.png);
	background-repeat-x: repeat;
	background-repeat-y: no-repeat;
	background-color: #21759B;
	color: #EAF2FA;
	font-weight: bold;
	-webkit-border-radius: 11px;
	-moz-border-radius: 11px;
	border-radius: 11px;
	border-style: solid;
	border-width: 1px;
	cursor: pointer;
	font-family:'Open Sans', Arial, sans-serif;
	font-size: 12px;
	width:100px;
	height:20px;
	margin:10px;
	text-align:center;
	padding-top:3px;
	margin-left:auto;
	margin-right:auto;
}
#submit:active
{
	background-image:url(<?php echo(WP_PLUGIN_URL);?>/gb_protected/images/button-grad-active.png);
}
#status
{
	color:#F00;
	font-family:'Open Sans', Arial, sans-serif;
	font-size:16px;
}
#loading
{
	background-image:url(<?php echo(WP_PLUGIN_URL);?>/gb_protected/images/ajax-loader.gif);
	height:16px;
	width:16px;
	float:right;
	margin-right:10px;
}
#caption
{
	font-family:'Open Sans', Arial, sans-serif;
	float:right;
	font-size:12px;
	color:#666;
	font-style:italic;
}
#caption:visited
{
	color:#666;
}
</style>
</head>

<body>
	<div class="logo-greenbox" align="center">
	<a href="http://www.greenbox.web.id" target="_blank">
	<img src="<?php echo(WP_PLUGIN_URL);?>/gb_protected/images/logo.png" alt="logo-greenbox.png"/>
	</a>
	<div class="description">
	Mohon maaf masih proses development!<br />
	<a style="text-decoration:none;font-size:13px;" href="http://www.facebook.com/greenboxindonesia" target="_blank">Temukan kami di facebook</a>
	</div>
	</div>
        <div id="login-form">
    	<label class="formtext">
        Kata Sandi Anda:
        </label>
        <br />
        <input id="password" type="password" onkeypress="if (event.keyCode == 13){dologin()}" tabindex="1" />
        <div id="submit" onClick="dologin()">
        Masuk
        <div id="loading" style="display:none">
        </div>
      </div>
      <div id="status">
      <?php echo($status); ?>
      </div>
      <a href="http://www.greenbox.web.id/" id="caption">
       <?php echo($display_text); ?>
      </a>
      <script type="text/javascript" language="JavaScript">
    document.getElementById("password").focus();
	</script>
    </div>
</body>
</html>
