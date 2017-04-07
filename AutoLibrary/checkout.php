<?php
# Illustrates a query with a browser input value
#  and returns several rows of values using MySQL
print ("<br>");
$inpisbn = isset($_POST['inpisbn']) ? $_POST['inpisbn'] : '';
$inptitle = isset($_POST['inptitle']) ? $_POST['inptitle'] : '';
$inpcheckoutbook = isset($_POST['inpcheckoutbook']) ? $_POST['inpcheckoutbook'] : '';
$inpstudentid = isset($_POST['inpstudentid']) ? $_POST['inpstudentid'] : '';
$inpflname = isset($_POST['inpflname']) ? $_POST['inpflname'] : '';
$inpdnomsg = '';


 // printing the form to enter the user input
 print <<<_HTML_
 <FORM method="POST" action="{$_SERVER['PHP_SELF']}">
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
 <br> check out book page 
 <br/>
 <br>
 ISBN: <input type="number   " name="inpisbn" size="30" value="$inpisbn">
 <br/>
 <br>
 Title : <input type="text" name="inptitle" size="30" value="$inptitle">
 <br/>
 <br>
 Check out book YYYY-MM-DD: <input type="date" name="inpcheckoutbook" size="30" value="$inpcheckoutbook">
 <br/>
 <br>
 Studentid  # : <input type="text" name="inpstudentid" size="30" value="$inpstudentid">
 <br/>
 <br>
 Name (First name, Last Name) : <input type="text" name="inpflname" size="30" value="$inpflname">
 <br/>
 <br>    
         
 <INPUT type="submit" value=" Submit ">
 <INPUT type="hidden" name="visited" value="true" >

 </FORM>
         
   <a href="menustudent.php"> Main Menu </a> <br> <br>         
_HTML_;
  require ('./dbConfig.php');
  
 
  #$inpreturnbook = date('Y-m-d',strtotime($_POST['inpreturnbook']));
  
  $querystring = "INSERT INTO checkout (isbn, title, checkoutbook,studentid, flname) VALUES ('$inpisbn', '$inptitle','$inpcheckoutbook' ,'$inpstudentid','$inpflname')";
  

   

  if (!mysqli_query($con, $querystring))
   {
       print ( "");
     
   }else
    {
       
       header("Location: checkout.php");
       print ( "Could not successfully run query ($querystring) from DB: " . mysqli_error($con) . "<br>");
  }
 
   
 
  mysqli_close($con);
  
  


?>
