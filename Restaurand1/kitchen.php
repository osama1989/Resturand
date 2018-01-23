<?php 

include_once('model/config.php');
include_once('model/bill.php');
 $result1=dbQuery('SELECT name , count ,customer_order_has_product.id  FROM customer_order_has_product INNER JOIN product on   customer_order_has_product.product = product .id
 '); 
$result=dbQuery('SELECT  id , seen , is_order,table_number  from customer_order');    

$ob[]= array() ;
$i=0;
   
 while($row1 = mysqli_fetch_assoc($result1))
 
 {   
     
     $ob[$i]= new order;
     $ob[$i]->setName($row1['name']);
     $ob[$i]->setCount($row1['count']);
     $ob[$i]->setId($row1['id']);
   
     $i++;
     
     
 }    
           
?>



<html lang="en">
<head>
  <link href="css/css2.css" media="all" rel="stylesheet">	
  <link href="css/image.css" media="all" rel="stylesheet"> 
  <script type="text/javascript" src="scripts/jquery-1.3.2.js"></script>
  <meta charset="utf-8" />
	<title>Order</title>	
</head>

<body>
<div class="table-title">

</div>
<div id="quad">
<?php   
          
         while($row = mysqli_fetch_assoc($result))
         
              {
         
             if($row['seen']==1 && $row['is_order']==0 )
                  {
             
             ?>
 <figure>
<table class="table-fill">
<thead>
<tr>
<th class="text-left">Product</th>
<th class="text-left">Count</th>

</tr>
</thead>


<tbody class="table-hover">
<?php
  
         foreach ($ob as $key => $value) {
             
         
                	          
                    if($row['id']==$value->getId()) 
                    {
              
                ?>         
<tr>
<td class="text-left"><?php 
                   echo $value->getName();
                  ?></td>
<td class="text-left"><?php 
                   echo $value->getCount();
                  ?></td>
</tr>
               
                  <?php } }?>


</tbody>
              
                   
                   
                
              
<figcaption></figcaption>
<button class=" <?php  echo  $row['id']; ?>"  >Serve <?php  echo  $row['table_number']; ?> </button>
</table>
     
         </figure>
                
  <?php } } ?>
  </div>

    
    
    
    
    <script type="text/javascript">
    
   jQuery(document).ready(function ($) {
    
    $("button").click(function(){
    var id= $(this).attr('class');
     
    
     
      $.get( "order.php", { id:id });
    
    $(this).css("background-color", "green");
    });
    
    
    });
    </script> 



    
    
    
    
    
    
    
    
    <script type="text/javascript">
 
     
     
     
    var quadimages = document.querySelectorAll("#quad figure");
       for(i=0; i<quadimages.length; i++) {
  quadimages[i].addEventListener('click', function(){ this.classList.toggle("expanded"); quad.classList.toggle("full") }); 
}
    
    
    
    </script> 
  
 











</body>
  </html>
  