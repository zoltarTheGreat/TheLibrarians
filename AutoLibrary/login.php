<?php
# Illustrates a query with a browser input value
#  and returns several rows of values using MySQL
print ("<br>");
$inpuserid = isset($_POST['inpuserid']) ? $_POST['inpuserid'] : '';
$inppass = isset($_POST['inppass']) ? $_POST['inppass'] : '';

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
          <li><a href="index.html">Home</a></li>
          <li><a href="searchbook.php ">Search</a></li>
          <li><a href="payment/index.html ">Payments</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right ">
          <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in "></span> Login</a></li>
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
 <br> Login
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
  <a href="adminlogin.php"> Admin Mode </a> <br> <br>          


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

_HTML_;
 
  require ('dbConfig.php');
  $querystring = "SELECT * FROM `student`  WHERE userid ='$inpuserid' and pass='$inppass'";
  $result = mysqli_query($con, $querystring);
  $count = mysqli_num_rows($result);
  
  
  if($count == 1) {
         
         $_SESSION['userid'] = $inpuserid ;
         
         
         header("location: menustudent.php");
         exit();
      }else {
         
         print ("");
          
      }
   

   
 
  mysqli_close($con);
  
  


?>
