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
<script type="text/javascript" src="recorder.js"></script>

<link rel="stylesheet" type="text/css" href="../css/studentRead.css">
<link rel="stylesheet" type="text/css" href="../css/notebook.css">
<link rel="stylesheet" type="text/css" href="../css/myButton.css">  
  
<?php
  include("../includes/db.php");
?>

</head>

<body onload="javascript:systemCheck();">

<div id="submitConfirm" class="modal"  data-keyboard="false" data-backdrop="static" > 

  <div class="modal-header">
    <h3>Congratulations!</h3>
  </div>
  <div class="modal-body">
    The recording has been sent to your teacher!
  </div>
  <div class="modal-footer">
    <input name="button4"
	id="button5"
	value="OK"
	onclick="javascript:window.location='../index.html';"
	type="button">
  </div>
</div>

<div id="allowHint" class="modal" data-keyboard="false" data-backdrop="static" > 

  <div class="modal-header">
    <h3>Microphone Set</h3>
  </div>
  <div class="modal-body">
    Please allow our system to use your microphone. <br>
    See the top-right corner of this page. <br>
    Then click the "Allow" button.
  </div>
  <div class="modal-footer">
  </div>
</div>

<div id="systemCheckModal" class="modal"  data-keyboard="false" data-backdrop="static" > 

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
	onClick="javascript:window.location='../index.html'"
	type="button">
  </div>
</div>
  
<div id="confirmModal" class="modal"  data-keyboard="false" data-backdrop="static" > 

  <div class="modal-header">
    <h3>Select recoded audio:</h3>
  </div>
  <div class="modal-body">
<table align="center" border="0" width="72%">
      <tbody>
        <tr>
          <td style="text-align: center; width: 212.45px;" 
            height="34"><input
              checked="checked"
              value="Record 1"
              name="Record"
              type="radio">#
            1: <input name="button" id="button" value="Play" type="button"></td>
          <td style="text-align: center; width: 240.517px;" colspan="1" ><input
              value="Record 2"
              name="Record"
              type="radio">#
            2: <input name="button" id="button" value="Play" type="button"> </td>
          <td style="text-align: center; width: 206.567px;" colspan="1" ><input
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
    <td width="20%"  style="text-align: center"><a class="myButton" href="Guidance.php">Help</a></td>
    <td width="60%" colspan="4" style="text-align: center">Read &amp; Record</td>
    <td width="20%"  style="text-align: center"><a class="myButton" href="../index.html">Log out</a></td>
  </tr>
  <tr>
    <td colspan="6">
    <div id="instructions" class="paper">
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
    echo("<span style='text-align:center'>".$title . "</span> <br> <br>");
    //print_r($row);
    echo($content);
?>
    </div>
    </td>
  </tr>
    <tr>
    <td id="functionCell" width="40%" height="40" colspan="6" style="text-align: center">
    <div id="recordDiv" align="center">
      <a id="recordButton" class="myButton" href="javascript:toggleRecordButton()">Record</a>
      <!--<input type="button" name="recordButton" id="recordButton" value="Record"  onclick="javascript:toggleRecordButton()">-->
    </div>
    <div id="submitDiv" style="display: none">  
    <audio controls autoplay ></audio>
    <a id="cancelButton" class="myButton" href="javascript:tryaginButton()">Try Again</a>
    <a id="submitButton" class="myButton" href="javascript:submit()">Submit</a>
    <!--<input type="button" name="cancelButton" id="cancelButton" value="Try Again" onclick="javascript:tryaginButton()">
    <input type="button" name="submitButton" id="submitButton" value="Submit" onclick="javascript:submit()">-->    
    </div>
    <script language="javascript">
  var onFail = function(e) {
    $('#systemCheckModal').modal('show');
    console.log('Rejected!', e);
  };

  var onSuccess = function(s) {
	  var context = new webkitAudioContext();
	  var mediaStreamSource = context.createMediaStreamSource(s);
	  recorder = new Recorder(mediaStreamSource);
	  $('#allowHint').modal('hide');
	  toggleMainContainer();

	  // audio loopback
	  // mediaStreamSource.connect(context.destination);
  }

  window.URL = window.URL || window.webkitURL;
  navigator.getUserMedia  = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

  var recorder;
  var audio = document.querySelector('audio');
  
  var intervalId=0;
  
  function systemCheck(){
    if (navigator.getUserMedia) {
      navigator.getUserMedia({audio: true}, onSuccess, onFail);
      $('#allowHint').modal('show');
      //console.log("onload success!");
    } else {
      //toggleMainContainer();
      $('#systemCheckModal').modal('show');
    }    
  }


  function startRecording() {
    recorder.record();
  }

  function stopRecording() {
          //alert("stop");
	  recorder.stop();
	  recorder.exportWAV(function(s) {
	          //console.log(s);
		  audio.src = window.URL.createObjectURL(s);
		  audio.pause();
	  });
  }

    function sendAudio(){

    } 
  
  
function toggleRecordButton() {
	var ele = document.getElementById("recordButton");
	var sub = document.getElementById("submitDiv");
	var rec = document.getElementById("recordDiv");
	var time = 0;
	//var sub = document.getElementById("addToSubmitButton");
	if(ele.firstChild.data == "Record") {
	  const TimeOut=90;
	  startRecording();
	  ele.firstChild.data = "Stop ( "+TimeOut+" Seconds )";
	  intervalId = window.setInterval(function()
	  {
	      time += 1;
	      if (time>TimeOut) {
		stopRecording();	
		ele.firstChild.data = "Record";
		rec.style.display="none";
		sub.style.display="block";//code
		window.clearInterval(intervalId);
	      }else{ 
	        ele.firstChild.data = "Stop ( " + (TimeOut-time) +" Seconds )";
	      }
	  }, 1000);
	  
  	}
	/*else if(ele.value == "Stop"){
		ele.value = "Cancel";
		sub.style.display = "block";
	}*/
	else{
		window.clearInterval(intervalId);
	        stopRecording();
		ele.firstChild.data = "Record";
		rec.style.display="none";
		sub.style.display="block";
		//sub.style.display = "none";
	}
}
function tryaginButton() {
  var ele = document.getElementById("recordButton");
  var sub = document.getElementById("submitDiv");
  var rec = document.getElementById("recordDiv");
  sub.style.display="none";
  rec.style.display="block";
  recorder.clear();
  
}

function submit(){
  sendAudio();
  bootstrap_alert = function() {}
  bootstrap_alert.warning = function(message) {
	      $('#alert_placeholder').html('<div class="alert"><a class="close" data-dismiss="alert">?</a><span>'+message+'</span></div>')
	  }
  toggleMainContainer();
  $('#submitConfirm').modal('show');
  
  //bootstrap_alert.warning('The recording has been sent to your teacher!');
  //alert("The recording has been sent to your teacher!");
  //window.location="../index.html";
}



</script> 

    </td>
    </tr> 
</table>
</div>

</body>
</html>
