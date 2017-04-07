

<?php
print ("<br>");

  $host = "localhost";
  $user = "root";
  $password = "";
  $dbname = "autolibrary";
  $con=mysqli_connect($host, $user, $password, $dbname);
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MariaDB: " . mysqli_connect_error();
    exit;
  }

  $querystring = "SELECT checkout.isbn,checkout.title,checkout.returnbook,checkout.flname from checkout where checkout.returnbook < now() ";;
  $result = mysqli_query($con, $querystring);
  if (!$result) {
    print ( "Could not successfully run query ($querystring) from DB: " . mysqli_error($con));
    exit;
  }

  if (mysqli_num_rows($result) == 0) {
    print ("No rows found, nothing to print so am exiting<br>");
    exit;
  }

  print("Books Overdue: <br>");
  print("<b> ISBN, Genre, Title, Year Published  : <br> <br> </b>");
  
  while ($rows = mysqli_fetch_assoc($result)) {
    foreach ($rows as $row) {
	  print $row." ";
	}
	print "<br>";
  }
  print <<<_HTML_
<br>
<a href="http://localhost:8080/AutoLibrary/addbook.php">Apply Late Fee  </a> <br> <br>   
     
_HTML_;
  
  
  
  mysqli_close($con);

?>

