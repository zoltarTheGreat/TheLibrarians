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
  
  <head>
  <title>Welcome Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="library.css">
</head>

<body>

  <nav class="navbar navbar-inverse navbar-static-top" ">
    <div class="container-fluid ">
      <div class="navbar-header ">
        <button type="button " class="navbar-toggle " data-toggle="collapse " data-target="#myNavbar ">
        <span class="icon-bar "></span>
        <span class="icon-bar "></span>
        <span class="icon-bar "></span>                        
      </button>
        <a class="navbar-brand " href="index.html "><img src="logo.png " alt="Logo "></a>
      </div>
      <div class="collapse navbar-collapse " id="myNavbar ">
        <ul class="nav navbar-nav ">
          <li class="active "><a href="index.html">Home</a></li>
          <li><a href="searchbook.php">Search</a></li>
          <li><a href="applylatefee.php">Payments</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right ">
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in "></span> Login</a></li>
          <li><a href="addstudent.php">Register</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="center ">
    <div class="row content ">
      <div class="col-sm-2 sidenav ">
      </div>
      <div class="col-sm-8 text-left ">


  
 <FORM method="POST" action="{$_SERVER['PHP_SELF']}">
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
 <font color= 'red'>$deptnamemsg</font><br>
  Book ISBN: <input type="text" name="impisbn" size="30" value="$impisbn">
 <br/>
 <br>
 <INPUT type="submit" value=" Submit ">
 <INPUT type="hidden" name="visited" value="true">
 </FORM>
 

 </div>
      <div class="col-sm-2 sidenav ">
      </div>
    </div>
  </div>
  </div>

  <footer class="container-fluid text-center ">
    <p>The Librarians welcome you to the Library</p>
  </footer>

</body>

</html>
_HTML_;
 
}
else {
  require ('./dbConfig.php');
  $querystring = "SELECT checkout.isbn,checkout.title,checkout.returnbook,checkout.flname from checkout where checkout.isbn= '$impisbn'";
  
  
  
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
  <a href="applylatefee.php"> Applylatefee </a> <br> <br>   
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

