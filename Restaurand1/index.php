<?php

include_once('model/config.php');
$result=dbQuery('SELECT * FROM tabl'); 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<html lang="en">
<head>
 <link href="css/drop.css" media="all" rel="stylesheet">

  <script type="text/javascript" src="scripts/jss.js"></script>
 <meta charset="utf-8" />
	<title>Welcome</title>	
</head>
<body>

<div id="dd" class="wrapper-dropdown-3" tabindex="1">
    <span>Table</span>
    <ul class="dropdown">
       <?php 
            
            if(!empty($result))
           {

        
        while($row =mysqli_fetch_assoc($result))
         {
            ?>  
        <li><a href="table.php?id= <?php echo $row['number']; ?>"><i class="icon-envelope icon-large"></i><?php 
                   echo $row['number'];
                  ?></a></li>
        
        <?php }} ?>
    </ul>
</div>
<script type="text/javascript">
  		
                     
                 
  		function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		


</script>

</body>
</html>