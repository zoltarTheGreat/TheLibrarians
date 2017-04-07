<?php



 // printing the form to enter the user input
 print <<<_HTML_

<form>
    US Amount : <input type="text" name="num1"/> <br>
    NUmber of Days : <input type="text" name="num2"/> <br>
    <input type="submit"/>
</form>
     
_HTML_;
 
 if (isset($_GET['num1']) && isset($_GET['num2'])) {
    $num1 = intval($_GET['num1']);
    $num2 = intval($_GET['num2']);
 
    echo $num1 * $num2;
}
 
print <<<_HTML_


<a href="listoverduebooks.php">List Over Due Books  </a> <br> <br>    
     
_HTML_;



?>
<?php

