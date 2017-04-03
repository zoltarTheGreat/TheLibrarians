<?php

print ("<br>");
$deptname = isset($_POST['deptname']) ? $_POST['deptname'] : '';
$visited = isset($_POST['visited']) ? $_POST['visited'] : '';
$deptnamemsg = '';

if (!($deptname )) {
  if ($visited) {	  
     $deptnamemsg = 'Please enter Book Title';
  }

 // printing the form to enter the user input
 print <<<_HTML_
 <FORM method="POST" action="{$_SERVER['PHP_SELF']}">
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
 <font color= 'red'>$deptnamemsg</font><br>
  Book Title: <input type="text" name="deptname" size="9" value="$deptname">
 <br/>
 <br>
 <INPUT type="submit" value=" Submit ">
 <INPUT type="hidden" name="visited" value="true">
 </FORM>
_HTML_;
 
}
else {
  require ('./dbConfig.php');
  $querystring = "SELECT book.isbn,book.genre,book.title,book.yearpublished from book where book.title= '$deptname'";
  
  
  
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

