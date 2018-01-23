<?php

include_once('../model/config.php');
dbUpdate('customer_order',array('seen'),array(1),'id='.$_GET['id']);

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
