<?php
# Illustrates a query with a browser input value
#  and returns several rows of values using MySQL
print ("<br>");
$inpisbn = isset($_POST['inpisbn']) ? $_POST['inpisbn'] : '';
$inptitle = isset($_POST['inptitle']) ? $_POST['inptitle'] : '';
$inpgenre = isset($_POST['inpgenre']) ? $_POST['inpgenre'] : '';
$inpyearp = isset($_POST['inpyearp']) ? $_POST['inpyearp'] : '';
$inpdnomsg = '';


 // printing the form to enter the user input
 print <<<_HTML_
 <FORM method="POST" action="{$_SERVER['PHP_SELF']}">
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
 <br> Adding Book 
 <br/>
 <br>
 ISBN: <input type="number   " name="inpisbn" size="30" value="$inpisbn">
 <br/>
 <br>
 Book Title: <input type="text" name="inptitle" size="30" value="$inptitle">
 <br/>
 <br>
 Book Genre: <input type="text" name="inpgenre" size="30" value="$inpgenre">
 <br/>
 <br>
 Year Published : <input type="text" name="inpyearp" size="30" value="$inpyearp">
 <br/>
 <br>
 <INPUT type="submit" value=" Submit ">
 <INPUT type="hidden" name="visited" value="true" >

 </FORM>
_HTML_;
  require ('./dbConfig.php');
  $querystring = "INSERT INTO book (isbn, title , genre, yearpublished ) VALUES ('$inpisbn', '$inptitle', '$inpgenre' , '$inpyearp')";

   
  
  
  
  if (!mysqli_query($con, $querystring))
   {
       print ( "");
     
   }else
    {
       header("Location: http://localhost:8080/AutoLibrary/addbook.php");
       print ( "Could not successfully run query ($querystring) from DB: " . mysqli_error($con) . "<br>");
  }
 
   
 
  mysqli_close($con);
  
  


?>
