<?php

include_once('../model/config.php');
 $t=time();

 dbInsert('customer_order', array('amount','date_created','table_number'),array($_GET['total'],date("Y-m-d h:i:sa",$t),$_SESSION['table']));

 $num=mysql_insert_id(); ;
 
 echo $num;
 /*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
