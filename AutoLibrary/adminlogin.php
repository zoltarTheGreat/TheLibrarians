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

  <title>Admin Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */

    .navbar-brand {
      height: 80px;
      padding: 0px;
    }

    .nav>li>a {
      padding-top: 30px;
      padding-bottom: 30px;
    }

    .navbar-toggle {
      padding: 10px;
      margin: 25px 15px 25px 0;
    }

    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    .navbar-brand>img {
      height: 100%;
      padding: 0px;
      width: auto;
    }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */

    .row.content {
      height: 450px
    }
    /* Set gray background color and 100% height */

    .sidenav {
      padding-top: 20px;
      background-color: ivory;
      height: 100%;
    }

    .center {
      background: url('books.jpg') no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
    /* Set black background color, white text and some padding */

    footer {
      background-color: #8C001A;
      color: ivory;
      padding: 15px;
    }
    /* On small screens, set height to 'auto' for sidenav and grid */

    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {
        height: auto;
      }
    }

    div>p{
      color: black;
    }
  </style>
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
        <a class="navbar-brand " href="indox.html "><img src="logo.png " alt="Logo "></a>
      </div>
      <div class="collapse navbar-collapse " id="myNavbar ">
        <ul class="nav navbar-nav ">
          <li><a href="indox.html">Home</a></li>
          <li><a href="searchBook/index.html ">Search</a></li>
          <li><a href="payment/index.html ">Payments</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right ">
          <li class="active"><a href="login/index.html "><span class="glyphicon glyphicon-log-in "></span> Login</a></li>
          <li><a href="register/index.html">Register</a></li>
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
         
     </div>
      <div class="col-sm-2 sidenav ">
      </div>
    </div>
  </div>
  </div>

  <footer class="container-fluid text-center ">
    <p>Welcome Fellow Librarian</p>
  </footer>

</body>
_HTML_;
 
  require ('dbConfig.php');
  $querystring = "SELECT * FROM `admin`  WHERE userid ='$inpuserid' and pass='$inppass'";
  $result = mysqli_query($con, $querystring);
  if (!$result){
    $count = mysqli_num_rows($result);
  }
  
  
  if($count == 1) {
         
         $_SESSION['userid'] = $inpuserid ;
         
         
         header("location: menuadmin.php");
         exit();
      }else {
         
         print ("");
          
      }
   

   
 
  mysqli_close($con);
  
  


?>
