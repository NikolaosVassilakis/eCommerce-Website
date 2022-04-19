<?php

include 'header.php';


if(isset($_SESSION["userid"])) {

header("Location: index.php");
  
} else {

 include 'fill/login.fill.php';

}


include 'footer.php';

?>