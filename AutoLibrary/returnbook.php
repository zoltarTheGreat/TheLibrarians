<?php

print ("<br>");
$impisbn = isset($_POST['impisbn']) ? $_POST['impisbn'] : '';
$visited = isset($_POST['visited']) ? $_POST['visited'] : '';
$impisbn2=$impisbn;
$deptnamemsg = '';

if (!($impisbn)) {
  if ($visited) {	  
     $deptnamemsg = 'Please enter Book ISBN';
  }

 // printing the form to enter the user input
 print <<<_HTML_
 <FORM method="POST" action="{$_SERVER['PHP_SELF']}">
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
 <font color= 'red'>$deptnamemsg</font><br>
  Book ISBN: <input type="text" name="impisbn" size="30" value="$impisbn">
 <br/>
 <br>
 <INPUT type="submit" value=" Submit ">
 <INPUT type="hidden" name="visited" value="true">
 </FORM>
_HTML_;
 
}
else {
  require ('./dbConfig.php');
  $querystring = "SELECT checkout.isbn,checkout.title,checkout.checkoutbook,checkout.flname from checkout where checkout.isbn= '$impisbn'";
  
  
  
    $result = mysqli_query($con, $querystring);
  if (!$result) {
    print ( "Could not successfully run query ($querystring) from DB: " . mysqli_error($con) . "<br>");
    exit;
  }

  if (mysqli_num_rows($result) == 0) {
    print ("No rows found, nothing to print so am exiting<br>");
    exit;
  }
 

  print("<b> ISBN, Genre, Title, Year Published  : <br> <br> </b>");

  while ($rows = mysqli_fetch_assoc($result)) {
      
    foreach ($rows as $row) {
	  print $row." ";
          
	}
	print "<br>";
        print "<br>";
        
  }
  
   print <<<_HTML_

<FORM method="POST" action="{$_SERVER['PHP_SELF']}">
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
 <br/>
 <br>
 <INPUT type="submit" value=" Return ">

 </FORM>     
     
_HTML_;

 require ('./dbConfig.php');
 $querystring2 = "DELETE from checkout where isbn = '$impisbn2'" ;
 
 
 if (!mysqli_query($con, $querystring2))
   {
       print ( "");
       
   }else
    {
      
       print ( " ");
  }
  
  mysqli_close($con);
}
?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

