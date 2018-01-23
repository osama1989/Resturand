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
     <link href="css/cal.css" media="all" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.1/modernizr.min.js"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    
    
  
  </head>
  
  <body>
    
      
      
     <div class="container">
     <div align="center" style="font-size:150%" >
        <a href="Print_order.php">Print</a>
    </div>
        <div align="right" style="font-size:150%" top=-30px >
        <a href="../bill">Bills</a>
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
       
                  if($row['seen']==0 )
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
                  <button class="btn btn-sm btn-danger" id="<?php echo  $row['id'];?>" >Kitshen</button>
                </td>
              </tr>
              
            <?php }}} ?>   
                  
                 
            </tbody>
          </table>
        </div>
      </div>
   
    </div>
    
    <div id="calculator">
	<div class="top">
		<span class="clear">C</span>
		<div class="screen"></div>
	</div>
	
	<div class="keys">
		<span>7</span>
		<span>8</span>
		<span>9</span>
		<span class="operator">+</span>
		<span>4</span>
		<span>5</span>
		<span>6</span>
		<span class="operator">-</span>
		<span>1</span>
		<span>2</span>
		<span>3</span>
		<span class="operator">÷</span>
		<span>0</span>
		<span>.</span>
		<span class="eval">=</span>
		<span class="operator">x</span>
	</div>
</div>
  
      
      
    <link href="//cdn.datatables.net/plug-ins/e9421181788/integration/bootstrap/3/dataTables.bootstrap.css" media="all" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/e9421181788/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="scripts/main.js"></script>
  <script type="text/javascript">
 
     
     $(document).ready(function(){
     
    $("button").click(function(){
    var id= $(this).attr('id');
     
     
     alert(id);
      $.get( "kasher/update_bill.php", { id:id });
    
    $(this).prop('disabled', true)
    });
    
    
    });
  
  
  var keys = document.querySelectorAll('#calculator span');
var operators = ['+', '-', 'x', '÷'];
var decimalAdded = false;


for(var i = 0; i < keys.length; i++) {
	keys[i].onclick = function(e) {
		
		var input = document.querySelector('.screen');
		var inputVal = input.innerHTML;
		var btnVal = this.innerHTML;
		var total;
		if(btnVal == 'C') {
			input.innerHTML = '';
			decimalAdded = false;
		}
		
		else if(btnVal == '=') {
			var equation = inputVal;
			var lastChar = equation[equation.length - 1];
			
			equation = equation.replace(/x/g, '*').replace(/÷/g, '/');
			
			if(operators.indexOf(lastChar) > -1 || lastChar == '.')
				equation = equation.replace(/.$/, '');
			
			if(equation)
				{
             total = eval(equation);
              if(total.toString().indexOf('.') != -1)
                total= total.toFixed(2);
          
          input.innerHTML = total;
        }
				
			decimalAdded = false;
		}
		
		
		else if(operators.indexOf(btnVal) > -1) {
			
			var lastChar = inputVal[inputVal.length - 1];
			
			if(inputVal != '' && operators.indexOf(lastChar) == -1) 
				input.innerHTML += btnVal;
			
			else if(inputVal == '' && btnVal == '-') 
				input.innerHTML += btnVal;
			
			if(operators.indexOf(lastChar) > -1 && inputVal.length > 1) {
				input.innerHTML = inputVal.replace(/.$/, btnVal);
			}
			
			decimalAdded =false;
		}
		
		else if(btnVal == '.') {
			if(!decimalAdded) {
				input.innerHTML += btnVal;
				decimalAdded = true;
			}
		}
		
		else {
			input.innerHTML += btnVal;
		}
		
		e.preventDefault();
	} 
}
  
  
  </script> 
 
  
  
  
  
  
  
  
  
  
  
  
  </body>
</html>