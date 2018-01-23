<?php
   include_once('model/config.php');

$result1=dbQuery('SELECT name , count , price  FROM customer_order_has_product INNER JOIN product on   customer_order_has_product.product = product .id
     
             where customer_order_has_product.id='. $_GET['id']);
$result=dbQuery('SELECT amount  FROM customer_order where id ='. $_GET['id']);

?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Sample Invoice</title>
    <link rel="stylesheet" href="css/bill.css">
    <link rel="stylesheet" href="css/button.css">
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
           if(!empty($result1))
           {
      
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
           <?php }}  ?>
  </tbody>
  <tfoot>
    
       <?php   
      
              if(!empty($result))
           {
          while($row = mysqli_fetch_assoc($result))
                {	          
       
                  
              
              ?>   
      <tr class="sub">
      <td class="title" colspan="3">Subtotal</td>
      <td class="price"><?php 
                   echo $row['amount'];
                  ?></td>
    </tr>
           <?php  }}  ?>
     
    <tr class="tax">
      <td class="title" colspan="3">Tax</td>
      <td class="price">$10.71</td>
    </tr>
    <tr class="total">
      <td class="title" colspan="3">Total</td>
      <td class="price"></td>
    </tr>
  
   <form action="order2.php" method="get">
                   <input type="hidden" name="id" value=" <?php  echo  $_GET['id']; ?> " />
                   
                   <button class="action-button shadow animate blue">Print</button>
                </form> 
   
    </tfoot>
   
    
    
    </table>
  </body>
</html>

