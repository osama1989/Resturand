<?php
   include_once('model/config.php');

$result1=dbQuery('SELECT name , count , price  FROM customer_order_has_product INNER JOIN product on   customer_order_has_product.product = product .id
     
             where customer_order_has_product.id='. $_GET['x']);
$result=dbQuery('SELECT amount  FROM customer_order where id ='. $_GET['x']);

?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Sample Invoice</title>
    <link rel="stylesheet" href="css/bill.css">
    
  </head>
  
  <body>
    <table>
  <thead>
    <tr>
      <th class="item" colspan="2">Items</th>
      <th class="qty">Qty</th>
      <th class="price">Price</th>
    </tr>
  </thead>
  <tbody>
    <?php   
      
      
          while($row = mysqli_fetch_assoc($result1))
                {	          
       
                  
              
                ?>   
      <tr>
      <td class="item"><?php 
                   echo $row['name'];
                  ?> </td>
      <td class="stock in"></td>
      <td class="qty"><?php 
                   echo $row['count'];
                  ?></td>
      <td class="price"><?php 
                   echo $row['price'];
                  ?></td>
    </tr>
      <?php }  ?>
  </tbody>
  <tfoot>
    
       <?php   
               
         
          while($row = mysqli_fetch_assoc($result))
                {	          
       
                  
              
              ?>   
      <tr class="total">
      <td class="title" colspan="3">Total</td>
      <td class="price"><?php 
                   echo $row['amount'];
                  ?></td>
    </tr>
                <?php  }  ?>
     
   
  </tfoot>
</table>
  
      <a  href="index.php"> <img src="images/reset.png"></a> 
  
  </body
  
</html>

