<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <script language="VBScript">
      Sub myAlert(title, content)
      MsgBox content, 0, title 
      End Sub 
    </script>
    <title>Untitled Document</title>
  </head>
  <body>
    <table align="center" border="0" width="72%">
      <tbody>
        <tr>
          <td colspan="3" style="text-align: center;" bgcolor="#FBD8C9">Submit
            Confirm</td>
        </tr>
        <tr>
          <td colspan="3" style="text-align: center;" bgcolor="#A3D4FA">Reading
            <span style="text-align: center"></span>Title</td>
        </tr>
        <tr>
          <td colspan="3" style="text-align: center;" bgcolor="#E7E7E7" height="204">Reading
            Content</td>
        </tr>
        <tr>
          <td colspan="3" style="text-align: center;" bgcolor="#A3D4FA" height="34">Please
            select the recorded audio you want to submit.</td>
        </tr>
        <tr>
          <td colspan="1" style="text-align: center; width: 212.45px;" bgcolor="#E7E7E7"
            height="34"><input
              checked="checked"
              value="Record 1"
              name="Record"
              type="radio">Record
            1: <input name="button" id="button" value="Play" type="button"></td>
          <td style="text-align: center; width: 240.517px;" colspan="1" bgcolor="#E7E7E7"><input
              value="Record 2"
              name="Record"
              type="radio">Record
            2: <input name="button" id="button" value="Play" type="button"> </td>
          <td style="text-align: center; width: 206.567px;" colspan="1" bgcolor="#E7E7E7"><input
              value="Record 3"
              name="Record"
              type="radio">Record
            3: <input name="button" id="button" value="Play" type="button"> </td>
        </tr>
        <tr>
          <td bgcolor="#FBD8C9">Recorded Time: 01:32</td>
          <td style="text-align: center;" bgcolor="#FBD8C9"><input name="button2"
              id="button2"
              value="Submit"
              onclick="javascript:alert('The sound recording you selected  has been sent to your teacher!');window.location='Read.php'"
              type="button"></td>
          <td style="text-align: center;" bgcolor="#FBD8C9"><input name="button3"
              id="button3"
              value="Cancel"
              onclick="javascript:window.location='Read.php'"
              type="button"></td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
