<?php
include_once('../model/config.php');


 
dbInsert('customer_order_has_product', array('product','count','id' ),array($_GET['id'],$_GET['count'],$_GET['number'])); 

//dbNumRows('customer_order_has_product', 'product = "'.$_GET['id'].'"');






/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
