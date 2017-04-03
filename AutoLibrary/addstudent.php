<?php
# Illustrates a query with a browser input value
#  and returns several rows of values using MySQL
print ("<br>");
$inpstid = isset($_POST['inpstid']) ? $_POST['inpstid'] : '';
$inpfirstn = isset($_POST['inpfirstn']) ? $_POST['inpfirstn'] : '';
$inplastn = isset($_POST['inplastn']) ? $_POST['inplastn'] : '';
$inpuserid = isset($_POST['inpuserid']) ? $_POST['inpuserid'] : '';
$inppass = isset($_POST['inppass']) ? $_POST['inppass'] : '';
$inpdnomsg = '';


 // printing the form to enter the user input
 print <<<_HTML_
 <FORM method="POST" action="{$_SERVER['PHP_SELF']}">
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
 <br> Adding Student 
 <br/>
 <br>
 Student ID: <input type="number   " name="inpstid" size="30" value="$inpstid">
 <br/>
 <br>
 First Name : <input type="text" name="inpfirstn" size="30" value="$inpfirstn">
 <br/>
 <br>
 Last Name: <input type="text" name="inplastn" size="30" value="$inplastn">
 <br/>
 <br>
 User ID  # : <input type="text" name="inpuserid" size="30" value="$inpuserid">
 <br/>
 <br>
 Password # : <input type="text" name="inppass" size="30" value="$inppass">
 <br/>
 <br>    
         
 <INPUT type="submit" value=" Submit ">
 <INPUT type="hidden" name="visited" value="true" >

 </FORM>
_HTML_;
  require ('./dbConfig.php');
  $querystring = "INSERT INTO student (studentid, firstname,lastname,userid, pass ) VALUES ('$inpstid', '$inpfirstn', '$inplastn' ,'$inpuserid','$inppass')";

   

  if (!mysqli_query($con, $querystring))
   {
       print ( "");
     
   }else
    {
       
       print ( "Could not successfully run query ($querystring) from DB: " . mysqli_error($con) . "<br>");
  }
 
   
 
  mysqli_close($con);
  
  


?>
