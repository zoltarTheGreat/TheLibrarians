<?php
# Illustrates a query with a browser input value
#  and returns several rows of values using MySQL
print ("<br>");
$inpadid = isset($_POST['inpadid']) ? $_POST['inpadid'] : '';
$inpfirstn = isset($_POST['inpfirstn']) ? $_POST['inpfirstn'] : '';
$inplastn = isset($_POST['inplastn']) ? $_POST['inplastn'] : '';
$inpuserid = isset($_POST['inpuserid']) ? $_POST['inpuserid'] : '';
$inppass = isset($_POST['inppass']) ? $_POST['inppass'] : '';
$inpdnomsg = '';


 // printing the form to enter the user input
 print <<<_HTML_

<head>
  <title>Register Page</title>
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
          <li><a href="index.html">Home</a></li>
          <li><a href="searchbook.php">Search</a></li>
          <li><a href="applylatefee.php">Payments</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right ">
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in "></span> Login</a></li>
          <li class="active"><a href="addstudent.php">Register</a></li>
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
 <br> Adding Administrator 
 <br/>
 <br>
 Admin ID: <input type="number   " name="inpadid" size="30" value="$inpadid">
 <br/>
 <br>
 First Name : <input type="text" name="inpfirstn" size="30" value="$inpfirstn">
 <br/>
 <br>
 Last Name: <input type="text" name="inplastn" size="30" value="$inplastn">
 <br/>
 <br>
 User ID  # : <input type="text" name="inpuserid" size="30" value="$inpuserid">
 <br/>
 <br>
 Password # : <input type="text" name="inppass" size="30" value="$inppass">
 <br/>
 <br>    
         
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

 if($inpadid == "" or $inpfirstn == "" or $inplastn == "" or $inpuserid == "" or $inppass == ""){

  }else{

  require ('./dbConfig.php');
  $querystring = "INSERT INTO student (studentid, firstname,lastname,userid, pass ) VALUES ('$inpadid', '$inpfirstn', '$inplastn' ,'$inpuserid','$inppass')";

  

  if (!mysqli_query($con, $querystring))
   {
       print ("");
     
   }else
    {
       
       print ( "Could not successfully run query ($querystring) from DB: " . mysqli_error($con) . "<br>");
    }
 
   
 
  mysqli_close($con);
  
  }


?>
