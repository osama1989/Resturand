<?php 

   include_once('model/config.php');

  $result1=dbQuery('SELECT * FROM customer_order');

   
?>


<!DOCTYPE html>
<html>
  <head>
    <title>show_bill</title>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" media="all" rel="stylesheet">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" media="all" rel="stylesheet">
    <link href="css/styles.css" media="all" rel="stylesheet">
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.1/modernizr.min.js"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    
    
  
  </head>
  
  <body>
    <div class="container">
     <div align="center" style="font-size:150%" >
        <a href="show_order.php">Kasher</a>
    </div>
        <div class="row">
        <div class="col-lg-12">
          <table class="table table-striped" id="dataTable1">
            <thead>
              <th align="center" class="check-header hidden-xs" width="30">
                <input id="checkAll" name="checkAll" type="checkbox">
              </th>
              <th>
               table id
              </th>
              <th>
                bill id
              </th>
              <th class="hidden-xs">
                total
              </th>
              <th class="hidden-xs">
                Date Added
              </th>
              <th class="hidden-xs">
                Status
              </th>
              <th></th>
            </thead>
            <tbody>
                
                  <?php   
      
                if(!empty($result1))
           {
          while($row = mysqli_fetch_assoc($result1))
                {	          
       
                  if($row['is_print']==0 )
                  {
              
                ?>   
               
                <tr >
                <td align="center" class="check hidden-xs">
                  <input name="optionsRadios1" type="checkbox" value="option1">
                </td>
                <td>
                  <?php 
                   echo $row['table_number'];
                  ?>
                </td>
                <td>
                  <?php 
                  echo  $row['id'];
                  ?>
                </td>
                <td class="hidden-xs">
                  <?php 
                  echo  $row['amount'];
                  ?>
                </td>
                <td class="hidden-xs">
                  <?php 
                  echo   $row['date_created'];
                  ?>
                </td>
                <td class="hidden-xs">
                  <span class="label label-success">Approved</span>
                </td>
                <td align="right">  
              <form action="bill2.php" method="get">
                   <input type="hidden" name="id" value=" <?php  echo  $row['id']; ?> " />
                   <input type="hidden" name="table" value=" <?php  echo  $row['table_number']; ?> " />
                   <button class="btn btn-sm btn-danger" id="<?php echo  $row['id'];?>" >Print</button>
                </form>
               </td>
                </tr>
              
           <?php }}} ?>   
                  
                 
            </tbody>
          </table>
        </div>
      </div>
    
     
    </div>
   
      
      
    <link href="//cdn.datatables.net/plug-ins/e9421181788/integration/bootstrap/3/dataTables.bootstrap.css" media="all" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/e9421181788/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="scripts/main.js"></script>
 
    
    
    
 
  </body>
</html>