<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
  
<script language="javascript"> 
function toggle() {
	var ele = document.getElementById("toggleText");
	var text = document.getElementById("displayText");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "show";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "hide";
	}
} 
</script>

<div id="main-container">  
<table width="50%" border="0" align="center">
  <tr>
    <td colspan="3" bgcolor="#FBD8C9" style="text-align: center">Checking your system...</td>
  </tr>
  <tr>
    <td width="23%" bgcolor="#A3D4FA">Browser</td>
    <td width="67%" bgcolor="#A3D4FA"><img src="images/Html5Browsers.png" width="264" height="46" alt=""/></td>
    <td width="10%" bgcolor="#A3D4FA">✔</td>
  </tr>
  <tr>
    <td bgcolor="#A3D4FA">Microphone</td>
    <td bgcolor="#A3D4FA">Checking your Microphone <br>
    &gt; Connected</td>
    <td bgcolor="#A3D4FA">✔</td>
  </tr>
  <tr>
    <td bgcolor="#A3D4FA">Bandwidth</td>
    <td bgcolor="#A3D4FA"><p>Clocking your bandwidth speed<br>
      &gt; 1Mbps required
    </p></td>
    <td bgcolor="#A3D4FA">✔</td>
  </tr>
  <tr>
    <td bgcolor="#A3D4FA">Screen size</td>
    <td bgcolor="#A3D4FA"><p>Measuring your screen pixels<br>
      &gt;1024 * 768 pixels required
    </p></td>
    <td bgcolor="#A3D4FA">✔</td>
  </tr>
    <tr>
    <td colspan="3" bgcolor="#FBD8C9" style="text-align: center; color: #000000;"><input type="button" name="button" id="button" value="OK" onClick="javascript:window.location='Read.php'" ></td>
  </tr>
</table>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
