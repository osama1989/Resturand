<?php

	// Here We Put The Function That Views The Total Design
	function view()
	{
		global $dots, $content, $topTitle;
	?>
		<html>
			<head>
				<title>Some Title</title>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
				<?php
					global $siteJavaScripts, $siteCSSScripts;
					foreach($siteJavaScripts as $script)
					{
						echo "<script src='".$dots."scripts/".$script.".js'></script>";
					}
					foreach($siteCSSScripts as $script)
					{
						echo "<link href='".$dots."styles/".$script.".css' rel='stylesheet' type='text/css' />";
					}
				?>
			      <script type="text/javascript">
                 $(document).ready(function(){
                    //Your code goes here.
                 $(function(){
                 				 
                 $("#datefield").date_input();
                });					

					});
              
			     </script>     
			<link rel="alternate" type="application/rss+xml" href="http://localhost/homework/rss1.php"  title="ddddddd"/>
		   	</head>
			<body>
				<div id='wrapper'>
					<div id='topSide'>
						<div id='topSideLeft'>
							<div id='topSideLeftInner'>
							<img src='<?php echo $dots?>images/logo.jpg' />
							</div>
						</div>
						<div id='topSideRight'>
								<div class='topSideRight_elem'>
									<a href='<?php echo $dots?>index.php'>Home</a>
								</div>
								
								<div class='topSideRight_elem'>
									Services
								</div>
								<?php
									
									if(!isset($_SESSION['user']['id']))

									{
								?>
								<div class='topSideRight_elem'>
									<a href='<?php echo $dots?>user/signIn.php'>Sign In</a>
								</div>
								<div class='topSideRight_elem'>
									<a href='<?php echo $dots?>user/signUp.php'>Sign Up</a>
								</div>
								<?php
								}
								else
								{
								?>
								<div class='topSideRight_elem'>
									<?php echo $_SESSION['user']['name']?>
								</div>
								<div class='topSideRight_elem'>
									<a href='<?php echo $dots?>user/cpanel.php'>Control</a>
								</div>
								<div class='topSideRight_elem'>
									<a href='<?php echo $dots?>index.php?signOut=1'>Sign Out</a>
								</div>
								
								<?php
								}
								?>
						</div>
						<div class='clear'>
						</div>
					</div>
					<br />
					<br />
					<div id='mainSide'>
						<?php echo printMessages()?>
						<div class='block'>
							<div class='blockTitle'>
								<?php echo $topTitle?>
							</div>
							<div class='blockBody'>
								<?php
									echo $content;
								?>
							</div>
						</div>
					
					</div>
						<div class='clear'>
						</div>
					<div id='footer'>
						Copyright © Your Company Name. Designed by FreeCSSTemplates.com
					</div>
				
				</div>
				
			</body>
			
		</html>
	<?php

	}

?>