<?php
	
	class myReg
	{
		var $c;
	
		function isMail($text)
		{
			if (preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*\.(\w{2}|(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum))$/', $text))
			{
				return true;
				
			}
			else
				return false;
			
		}
		function isInteger($text)
		{
			if (preg_match('/^[0-9]+$/', $text))
				return true;
			else
				return false;
				
		}
		function isFloat($text)
		{
			if (preg_match('/^[0-9]+(\.[0-9]+)?$/', $text))
				return true;
			else
				return false;
				
		}
	
	
	}
	
?>