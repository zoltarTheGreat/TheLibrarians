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

<head>

  <title>Login Page</title>
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
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="searchbook.php ">Search</a></li>
          <li><a href="applylatefee.php">Payments</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right ">
          <li><a href="menuadmin.php">Welcome Back Librarian</a></li>
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

<INPUT type="submit" value=" Submit ">
 <INPUT type="hidden" name="visited" value="true" >

 </FORM>

 </FORM>

  </div>
      <div class="col-sm-2 sidenav ">
      </div>
    </div>
  </div>
  </div>

  <footer class="container-fluid text-center ">
    <p>We are glad you are joining the Library</p>
  </footer>

</body>

_HTML_;
  if($inpisbn == "" or $inptitle == "" or $inpgenre == "" or $inpyearp == ""){
    print("Please input something");
  }else{
   
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
  }  


?>
