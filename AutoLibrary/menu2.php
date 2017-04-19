

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

  print("Books Due Today: <br>");
  print("<b> ISBN, Genre, Title, Year Published  : <br> <br> </b>");
  
  while ($rows = mysqli_fetch_assoc($result)) {
    foreach ($rows as $row) {
	  print $row." ";
	}
	print "<br>";
  }
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

<br>
<a href=" addbook.php">Apply Late Fee  </a> <br> <br>    
  
<a href=" addbook.php">Add Book </a> <br> <br>         


<a href=" addstudent.php">Add Student </a> <br> <br>    

<a href=" addadmin.php">Add Administrator </a> <br> <br>  
 
<a href=" removebook.php" style="text-decoration:none">
      <button  label="Remove Book" name="so_link" > Remove Books </button>
       
</a>  

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
  
  
  
  mysqli_close($con);

?>

