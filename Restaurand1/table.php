<?php

include_once('model/config.php');

 $_SESSION['table']=$_GET['id'];
 echo $_GET['id'];
 redirect('index.html');
?>
