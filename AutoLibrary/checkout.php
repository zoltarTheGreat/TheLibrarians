<?php
# Illustrates a query with a browser input value
#  and returns several rows of values using MySQL
print ("<br>");
$inpisbn = isset($_POST['inpisbn']) ? $_POST['inpisbn'] : '';
$inptitle = isset($_POST['inptitle']) ? $_POST['inptitle'] : '';
$inpreturnbook = isset($_POST['inpreturnbook']) ? $_POST['inpreturnbook'] : '';
$inpstudentid = isset($_POST['inpstudentid']) ? $_POST['inpstudentid'] : '';
$inpflname = isset($_POST['inpflname']) ? $_POST['inpflname'] : '';
$inpdnomsg = '';


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
 <br> check out book page 
 <br/>
 <br>
 ISBN: <input type="number   " name="inpisbn" size="30" value="$inpisbn">
 <br/>
 <br>
 Title : <input type="text" name="inptitle" size="30" value="$inptitle">
 <br/>
 <br>
 Returnbook YYYY-MM-DD: <input type="date" name="inpreturnbook" size="30" value="$inpreturnbook">
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
         
  
<a href=" listreservebooks.php" style="text-decoration:none">
      <button  label="Remove Book" name="so_link" > List Books Reserved  </button> <br> <br>        
         
   <a href=" menuadmin.php"> Main Menu </a> <br> <br>   
 

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
  require ('./dbConfig.php');
  
 
  #$inpreturnbook = date('Y-m-d',strtotime($_POST['inpreturnbook']));
  
  $querystring = "INSERT INTO checkout (isbn, title, returnbook,studentid, flname) VALUES ('$inpisbn', '$inptitle','$inpreturnbook' ,'$inpstudentid','$inpflname')";
  

   

  if (!mysqli_query($con, $querystring))
   {
       print ( "");
     
   }else
    {
       
       header("Location:  checkout.php");
       print ( "Could not successfully run query ($querystring) from DB: " . mysqli_error($con) . "<br>");
  }
 
   
 
  mysqli_close($con);
  
  


?>
