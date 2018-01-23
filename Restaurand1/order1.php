<?php 

include_once('model/config.php');
 
 $result1=dbQuery('SELECT name , count  FROM customer_order_has_product INNER JOIN product on   customer_order_has_product.product = product .id
     
where customer_order_has_product.id='.$_GET['id']);

   
?>



<html lang="en">
<head>
  <link href="css/css2.css" media="all" rel="stylesheet">	
    <meta charset="utf-8" />
	<title>Order</title>	
</head>

<body>
<div class="table-title">
<h3> Order Id: <?php echo $_GET['id'];?> </h3>
<h3> Table Id: <?php echo $_GET['table'];?> </h3>
</div>
<table class="table-fill">
<thead>
<tr>
<th class="text-left">Product</th>
<th class="text-left">Count</th>
</tr>
</thead>
<tbody class="table-hover">

  <?php   
      
          if(!empty($result1))
         {
          while($row =mysqli_fetch_assoc($result1))
                {	          
       
                  
              
                ?>       
<tr>
<td class="text-left"><?php 
                   echo $row['name'];
                  ?></td>
<td class="text-left"><?php 
                   echo $row['count'];
                  ?></td>
</tr>
         <?php }} ?>
 


</tbody>
                <form action="order.php" method="get">
                   <input type="hidden" name="id" value=" <?php  echo  $_GET['id']; ?> " />
                   
                   <button >more</button>
                </form>  
              

</table>
     
  

  </body>