<?php
# Illustrates a query with a browser input value
#  and returns several rows of values using MySQL
print ("<br>");
$inpbookid = isset($_POST['inpbookid']) ? $_POST['inpbookid'] : '';
$inptitle = isset($_POST['inptitle']) ? $_POST['inptitle'] : '';

$inpdnomsg = '';


 // printing the form to enter the user input
 print <<<_HTML_
 <FORM method="POST" action="{$_SERVER['PHP_SELF']}">
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
 <br> Delete Book 
 <br/>
 <br>
 Book Title: <input type="text" name="inptitle" size="30" value="$inptitle">
 <br/>
 <br>
 <INPUT type="submit" value=" Submit ">
 <INPUT type="hidden" name="visited" value="true" >

 </FORM>
 <a href="http://localhost:8080/AutoLibrary/addbook.php">Main Menu </a>
        
_HTML_;
  require ('./dbConfig.php');
  $querystring = "DELETE from book where title = '$inptitle'  " ;

   
  
  
  
  if (!mysqli_query($con, $querystring))
   {
       print ( "");
       
   }else
    {
      
       print ( " ");
  }
 
 
 
  mysqli_close($con);
  
    
  
  


?>
