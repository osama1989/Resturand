<?php 

include_once('model/config.php');

 
 

  $result1=dbQuery('SELECT product.name,product.id,product.arab_name,product.image,product.despcription,product.price FROM product inner join categor on product.category_id=categor.id  
  where categor.name = '."'".$_GET['x']."'" );

    $result=dbQuery('SELECT image1 from categor where name='."'".$_GET['x']."'");

     $row1 = mysqli_fetch_assoc($result);
 // $result1=dbQuery('SELECT * FROM product');

   
?>


<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.2.232.244"/>
  <title>Cold Drinks</title>
  <meta name="viewport" content="width=768"/>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="css/cold-drinks.css?190575612" id="pagesheet"/>
  <link href="css/css.css" rel="stylesheet" />
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
   </head>
 <body>
   <audio id="horn">
  <source src="1181.mp3" preload type="audio/mp3" />
</audio>

     <div align="left">
   
       <div id="wrap" align="left">
  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu891"><!-- group -->
     <div class="clip_frame grpelem" id="u891"><!-- image -->
        
         <img class="block" id="u891_img" src="<?php     echo $row1['image1']     ?>"   alt="" width="233" height="234"/>
     </div>
     <div class="clearfix grpelem" id="ppu1053"><!-- column -->
      <a class="nonblock nontext colelem" id="u1053" href="index.html"><!-- state-based BG images --></a>
      <div class="clearfix colelem" id="u1055-4"><!-- content -->
       <p><?php  echo $_GET['x'];    ?></p>
      </div>
     </div>
    </div>
    <div class="colelem" id="accordionu898wrapper"><!-- vertical box -->
     <ul class="AccordionWidget clearfix" id="accordionu898"><!-- column -->
      
      <?php   
           if(!empty($result1))
           {
      
          while($row = mysqli_fetch_assoc($result1))
     {	          
      
       ?>   
         
         
       <li class="AccordionPanel clearfix colelem" id="<?php     echo $row['id']     ?>"><!-- vertical box -->
       <div class="AccordionPanelTab clearfix colelem" id="u900-4"><!-- content -->
        <p> <span class="name"> <?php     echo $row['name'] ;    ?> </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="price"> <?php     echo $row['price']; ?></span> SP  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><?php     echo $row['arab_name']; ?> </span> </p>
       </div>
       <div class="AccordionPanelContent disn clearfix colelem" id="u901"><!-- group -->
        <div class="clip_frame grpelem" id="u903"><!-- image -->
         <img class="block" id="u903_img" src="<?php     echo $row['image']     ?>" alt="" width="218" height="176"/>
        </div>
        <div class="clearfix grpelem" id="u902-6"><!-- content -->
         <p>&nbsp; <?php     echo $row['despcription']     ?></p>
         <div id="s">
         <button type="submit" class="Sub">طلب</button>
        </div>
         </div>
       </div>
      </li>
           <?php }} ?>
      
    </ul>
    </div>
    <div class="verticalspacer"></div>
    <a class="nonblock nontext colelem" id="u865" href="index.html"><!-- state-based BG images --></a>
   </div>
  </div>
 </div>
         <div id="bottomBar" align="left"><img src="carts.png" id="cart" /></div>
         
       <div id="left_bar"> 
		
		<form action="#" id="cart_form" name="cart_form">
		
		<div class="cart-info"></div>
		
		<div class="cart-total">
		
			<b>Total Charges:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> $<span>0</span>
			
			<input type="hidden" name="total-hidden-charges" id="total-hidden-charges" value="0" />
		</div>
		
		<button type="submit" id="Submit">ارسال الطلب</button>
		
		</form>
		
	</div>    
           
           
   <div class="preload_images">
   <img class="preload" src="images/u381-r.png" alt=""/>
   <img class="preload" src="images/u865-r.png" alt=""/>
  </div>
  </div>
   <!-- JS includes -->
  <script type="text/javascript">
   if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script type="text/javascript">
   window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script src="scripts/museutils.js?3865766194" type="text/javascript"></script>
  <script src="scripts/webpro.js?3903299128" type="text/javascript"></script>
  <script src="scripts/musewpdisclosure.js?4285748861" type="text/javascript"></script>
  <script src="scripts/jquery.watch.js?4068933136" type="text/javascript"></script>
  
  <script type="text/javascript" src="scripts/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="scripts/jquery.livequery.js"></script>
<script type="text/javascript" src="scripts/jquery.total-storage.min.js"></script>
  
  <!-- Other scripts -->
 
    <script type="text/javascript">
 jQuery.noConflict();
 jQuery(document).ready(function($){
	var Arrays=new Array();
         //show bill reuslt in another page 
         //localStorage.clear();
         var myArray = new Array();
          
        var thisIDD = $('#wrap li').attr('id');  
     if  ( $.totalStorage('items') !== null)
        {
            if( $.totalStorage('items').length>0)
            myArray = $.totalStorage('items');
        }
                                     

             // alert( myArray[0]['id']);
    
        
        //alert (x[0]['name']);
        if  ( myArray !== null)
          {
         
          for(var i=0 ;i<myArray.length;i++)
        {
         $('#left_bar .cart-info').append('<div class="shopp" id="each-'+myArray[i]['id']+'"><div class="label">'+myArray[i]['name']+'</div><div class="shopp-price"> $<em>'+(myArray[i]['price'])*(myArray[i]['zip'])+'</em></div><span class="shopp-quantity">'+myArray[i]['zip']+'</span><img src="remove.png" class="remove" /><img src="remove.png" class="remove1" /> <br class="all" /></div>');
	
        $('#cart').css({'-webkit-transform' : 'rotate(20deg)','-moz-transform' : 'rotate(20deg)' });  
                      
                    /*  if(include(Arrays,myArray[i]['id']))
                      {
                       var price= $(myArray[i]['id']).children(".shopp-price").find('em').html();
			var quantity = $(myArray[i]['id']).children(".shopp-quantity").html();
			quantity = parseInt(quantity);
			
			var total = parseInt(myArray[i]['price'])*quantity;
			
			$(myArray[i]['id']).children(".shopp-price").find('em').html(total);
			$(myArray[i]['id']).children(".shopp-quantity").html(quantity);
			
			var prev_charges = $('.cart-total span').html();
			prev_charges = parseInt(prev_charges)-parseInt(price);
			
			prev_charges = parseInt(prev_charges)+parseInt(total);
			$('.cart-total span').html(prev_charges);
			
			$('#total-hidden-charges').val(prev_charges);
            
                      }
                      else {
                      */    
                          Arrays.push(myArray[i]['id']);
                       var prev_charges = $('.cart-total span').html();
			prev_charges = parseInt(prev_charges)+(parseInt(myArray[i]['price'])*myArray[i]['zip']) ;
		        // $.totalStorage('total', prev_charges);	
			$('.cart-total span').html(prev_charges);   
                        $('#total-hidden-charges').val(prev_charges);
                          
                          
                          
                     
                
                
                }   
          }
        
        
	
	$('#wrap li').mousemove(function(){
		
		var position = $(this).position();
		
		$('#cart').stop().animate({
																									
				left   : position.left+'px',
				
			},250,function(){
			
		});			
	}).mouseout(function(){
		
	});	
	
	$('.Sub').click(function(){
		
                var audioHorn = document.getElementById("horn");
                    audioHorn.currentTime = 0;
                    audioHorn.play();
                var x;
		var thisID = $(this).parents("li").attr('id');
	
		var itemname  = $(this).parents("li").find('div .name').html();
		var itemprice = $(this).parents("li").find('div .price').html();
		
                    
                 myArray.push({name:itemname, price:itemprice, zip:1,id:thisID});
                    
 		//$.totalStorage('items', myArray);
               //store array in local Browser
              if ( $.totalStorage('items') !== null &&  $.totalStorage('items').length>0) 
               {   
                     
                      x= $.totalStorage('items');
                       
                 
                       for(var i=0 ;i<x.length;i++)
                  
		       if( x[i]['name']== itemname)
                        {
                                      
                          
                           x[i]['zip']=x[i]['zip']+1;
                           localStorage.clear();    
                           $.totalStorage('items', x);
                           myArray= $.totalStorage('items');

                        }
                        
                       
                       else
                         {
                           $.totalStorage('items', myArray);
                            myArray= $.totalStorage('items');

                         }
                        	
               }
               
                
               
                else 
                    {
                        
                         $.totalStorage('items', myArray);
                          myArray= $.totalStorage('items');  
                    }
        
               
               
             if(include(Arrays,thisID))
		{
			
			var price 	 = $('#each-'+thisID).children(".shopp-price").find('em').html();
			var quantity = $('#each-'+thisID).children(".shopp-quantity").html();
			quantity = parseInt(quantity)+parseInt(1);
			
			var total = parseInt(itemprice)*parseInt(quantity);
			
			$('#each-'+thisID).children(".shopp-price").find('em').html(total);
			$('#each-'+thisID).children(".shopp-quantity").html(quantity);
			
			var prev_charges = $('.cart-total span').html();
			prev_charges = parseInt(prev_charges)-parseInt(price);
			
			prev_charges = parseInt(prev_charges)+parseInt(total);
			$('.cart-total span').html(prev_charges);
			
			$('#total-hidden-charges').val(prev_charges);
                   }
		else
		{
			Arrays.push(thisID);
			
			var prev_charges = $('.cart-total span').html();
			prev_charges = parseInt(prev_charges)+parseInt(itemprice) ;
		        // $.totalStorage('total', prev_charges);	
			$('.cart-total span').html(prev_charges);
			$('#total-hidden-charges').val(prev_charges);
			
			$('#left_bar .cart-info').append('<div class="shopp" id="each-'+thisID+'"><div class="label">'+itemname+'</div><div class="shopp-price"> $<em>'+itemprice+'</em></div><span class="shopp-quantity">1</span><img src="remove.png" class="remove" /><img src="remove.png" class="remove1" /> <br class="all" /></div>');
			
			$('#cart').css({'-webkit-transform' : 'rotate(20deg)','-moz-transform' : 'rotate(20deg)' });
		
                 }
		
		setTimeout('angle()',200);
	});	
	$('.remove1').livequery('click', function() {
	 	 
           var deduct1 = $(this).parent().children(".shopp-quantity").html();
          var deduct = $(this).parent().children(".shopp-price").find('em').html();
          var prev_charges = $('.cart-total span').html();
         if(parseInt(deduct1) > 1)
                {
                  var x1= deduct-(deduct/deduct1);
                  var x=deduct1-1;
                   prev_charges=prev_charges-(deduct/deduct1);
                   $(this).parent().children(".shopp-quantity").html(x);
                    $(this).parent().children(".shopp-price").find('em').html(x1);
                   $('.cart-total span').html(prev_charges);
		   $('#total-hidden-charges').val(prev_charges); 
              
               var nam =$(this).parent().children(".label").html(); 
		  
                 for(var i=0 ;i<myArray.length;i++)
                  {
		       if( myArray[i]['name']== nam)
                        {
                         myArray[i]['zip']=myArray[i]['zip']-1;
                           
                      
                        }
                  }  
               $.totalStorage('items', myArray);
             }
        
        
               else
                   
	   {	
		
		var thisID = $(this).parent().attr('id').replace('each-','');
		var nam =$(this).parent().children(".label").html(); 
		  
                 for(var i=0 ;i<myArray.length;i++)
                  {
		       if( myArray[i]['name']== nam)
                        {
                         
                           myArray.splice(i, 1);
                      
                        }
                  }
                
               
                var pos = getpos(Arrays,thisID);
		Arrays.splice(pos,1,"0")
		
		prev_charges = parseInt(prev_charges)-parseInt(deduct);
		$('.cart-total span').html(prev_charges);
		$('#total-hidden-charges').val(prev_charges);
		$(this).parent().remove();
	        $.totalStorage('items', myArray);
           }     //$.totalStorage('total', parseInt(prev_charges));
	});
	
	$('.remove').livequery('click', function() {
		
		var deduct = $(this).parent().children(".shopp-price").find('em').html();
		var prev_charges = $('.cart-total span').html();
		
		var thisID = $(this).parent().attr('id').replace('each-','');
		var nam =$(this).parent().children(".label").html(); 
		  
                 for(var i=0 ;i<myArray.length;i++)
                  {
		       if( myArray[i]['name']== nam)
                        {
                         
                           myArray.splice(i, 1);
                      
                        }
                  }
                
               
                var pos = getpos(Arrays,thisID);
		Arrays.splice(pos,1,"0")
		
		prev_charges = parseInt(prev_charges)-parseInt(deduct);
		$('.cart-total span').html(prev_charges);
		$('#total-hidden-charges').val(prev_charges);
		$(this).parent().remove();
	        $.totalStorage('items', myArray);
                 //$.totalStorage('total', parseInt(prev_charges));
	});	
	
	$('#Submit').livequery('click', function() {
		
		var totalCharge = $('#total-hidden-charges').val();
		var num;  
                 if(totalCharge != 0)
        {
             $.get( "kasher/creat_bill.php",{total: totalCharge},function(data){ 
                     
                   
              for(var i=0 ;i<myArray.length;i++)
                 {
        
                 $.get( "kasher/store_bill.php", { id:myArray[i]['id'] , count:myArray[i]['zip'],number:data });
		 
                 }
                                 
                  
                   localStorage.clear();
                  // $.get( "show_bill.php",{ number:data   });
                  window.location.replace("show_bill.php?x="+data);
                   });
		 
                 $('#left_bar').html('Total Charges: $'+totalCharge);
		 
        }      
              
    
                    return false;
	  	
	});	
	
});

function include(arr, obj) {
  for(var i=0; i<arr.length; i++) {
    if (arr[i] == obj) return true;
  }
}
function getpos(arr, obj) {
  for(var i=0; i<arr.length; i++) {
    if (arr[i] == obj) return i;
  }
}
function angle(){$('#cart').css({'-webkit-transform' : 'rotate(0deg)','-moz-transform' : 'rotate(0deg)' });}

</script>
 
  
  <script type="text/javascript">
   $(document).ready(function() { try {
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.initWidget('#accordionu898', function(elem) { return new WebPro.Widget.Accordion(elem, {canCloseAll:true,defaultIndex:-1}); });/* #accordionu898 */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
} catch(e) { Muse.Assert.fail('Error calling selector function:' + e); }});
</script>
   </body>
</html>
