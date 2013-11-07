<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<script src="../js/jquery-1.7.1.min.js"></script>
<script src="../js/jquery-latest.js"></script>
<script src="../js/jquery.cycle.all.latest.js" type="text/javascript"></script>
<script src="../js/bootstrap-modal.js"></script>
<script src="../js/bootstrap-transition.js"></script>
<script src="../js/bootstrap-alert.js"></script>

<link rel="stylesheet" type="text/css" href="../css/studentRead.css">
  
<?php
  include("../includes/db.php");
?>

</head>

<body onload="$('#systemCheckModal').modal('show');">

<div id="systemCheckModal" class="modal"> 

  <div class="modal-header">
    <h3>Checking your system:</h3>
  </div>
  <div class="modal-body">
    <img src="images/systemCheck.png">
  </div>
  <div class="modal-footer">
    <input name="button4"
	id="button5"
	value="OK"
	onclick="javascript:$('#systemCheckModal').modal('hide');toggleMainContainer();"
	type="button">
  </div>
</div>
  
<div id="confirmModal" class="modal"> 

  <div class="modal-header">
    <h3>Select recoded audio:</h3>
  </div>
  <div class="modal-body">
<table align="center" border="0" width="72%">
      <tbody>
        <tr>
          <td style="text-align: center; width: 212.45px;" bgcolor="#E7E7E7"
            height="34"><input
              checked="checked"
              value="Record 1"
              name="Record"
              type="radio">#
            1: <input name="button" id="button" value="Play" type="button"></td>
          <td style="text-align: center; width: 240.517px;" colspan="1" bgcolor="#E7E7E7"><input
              value="Record 2"
              name="Record"
              type="radio">#
            2: <input name="button" id="button" value="Play" type="button"> </td>
          <td style="text-align: center; width: 206.567px;" colspan="1" bgcolor="#E7E7E7"><input
              value="Record 3"
              name="Record"
              type="radio">#
            3: <input name="button" id="button" value="Play" type="button"> </td>
        </tr>
      </tbody>
    </table>
  
  </div>
  <div class="modal-footer">
	  <input name="button2"
              id="button2"
              value="Submit"
              onclick="javascript:alert('The sound recording you selected  has been sent to your teacher!');window.location='../index.html'"
              type="button">
          <input name="button3"
              id="button3"
              value="Try Again"
              onclick="javascript:$('#confirmModal').modal('hide');"
              type="button">
  </div>
  
</div>
 
 <script language="javascript"> 
function toggleMainContainer() {
	var ele = document.getElementById("main-container");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
  	}
	else {
		ele.style.display = "block";
	}
} 
</script> 
  
<div id="main-container" style="display: none">
<table width="72%" border="0" align="center">
  <tr>
    <td colspan="6" bgcolor="#FBD8C9" style="text-align: center">Read &amp; Record</td>
  </tr>
  <tr>
    <td colspan="6" bgcolor="#A3D4FA" style="text-align: center"> <span style="text-align: center">
        <?php
    $query = sprintf("SELECT * FROM tRTR_Starters order by Rand() limit 1");

    // Perform Query
    $result = mysql_query($query); 
    
    if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
    }

    $row = mysql_fetch_assoc($result);
    $title = $row['title'];
    $content = nl2br($row['storyStarter']);      
    mysql_free_result($result);
    echo($title);
    //print_r($row);
    ?>
    </span>
    </td>
  </tr>
  <tr>
    <td height="204" colspan="6" bgcolor="#E7E7E7" style="text-align: justify">
<?php
echo($content);
?>
    </td>
  </tr>
  <tr>
    <td width="10%" bgcolor="#FBD8C9">Audio: #1</td>
    <td width="34%" bgcolor="#FBD8C9">Recorded Time: 01:32</td>
    <td width="30%" bgcolor="#FBD8C9" style="text-align: center"><input type="button" name="recordButton" id="recordButton" value="Record" onclick="javascript:toggleRecordButton()"></td>
    
<script language="javascript"> 
function toggleRecordButton() {
	var ele = document.getElementById("recordButton");
	var sub = document.getElementById("addToSubmitButton");
	if(ele.value == "Record") {
    		ele.value = "Stop";
  	}
	else if(ele.value == "Stop"){
		ele.value = "Cancel";
		sub.style.display = "block";
	}
	else{
		ele.value = "Record";
		sub.style.display = "none";
	}
} 
</script> 
    
    <td width="20%" bgcolor="#FBD8C9" style="text-align: center;">
      <input type="button" name="addToSubmitButton" id="addToSubmitButton" style=" display: none" value="Add to Submit List" onClick="javascript:$('#confirmModal').modal('show');">
    </td>
    <td width="20%" bgcolor="#FBD8C9" style="text-align: center">
      <input type="button" name="button3" id="button3" value="Help" onClick="javascript:window.location='Guidance.php';">
    </td>
    <td width="16%" bgcolor="#FBD8C9" style="text-align: center"><input type="button" name="button3" id="button3" value="Log out" onClick="javascript:window.location='../index.html'"></td>
  </tr>
</table>
</div>

</body>
</html>
