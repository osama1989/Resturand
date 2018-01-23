
<?php 

include_once('model/config.php');
if(!empty($_GET['id']))
dbUpdate('customer_order',array('is_print'),array(1),'id='.$_GET['id']);

redirect('print_order.php');
   
?>