<?php
# Illustrates a query with a browser input value
#  and returns several rows of values using MySQL
print ("<br>");
$inpuserid = isset($_POST['inpuserid']) ? $_POST['inpuserid'] : '';
$inppass = isset($_POST['inppass']) ? $_POST['inppass'] : '';

$inpdnomsg = '';


 // printing the form to enter the user input
 print <<<_HTML_
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
         
     
_HTML_;
 
  require ('./dbConfig.php');
  $querystring = "SELECT * FROM `admin`  WHERE userid ='$inpuserid' and pass='$inppass'";
  $result = mysqli_query($con, $querystring);
  $count = mysqli_num_rows($result);
  
  
  if($count == 1) {
         
         $_SESSION['userid'] = $inpuserid ;
         
         
         header("location: menuadmin.php");
         exit();
      }else {
         
         print ("");
          
      }
   

   
 
  mysqli_close($con);
  
  


?>
