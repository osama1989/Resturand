<?php 
   session_start();

	
	include_once('basketlib.php');
	include_once('Utils.php');
	include_once('master_page.php');
	include_once('myRegularExpressions.php');
	include_once('basketlib.php');
	$dbUserName = 'root';
	$dbPassword='';
	$dbName = 'restaurand';
	
	$connection = mysqli_connect('localhost', $dbUserName, $dbPassword, $dbName);

	       mysqli_query($connection , "SET NAMES 'utf8'");
            mysqli_query($connection , 'SET CHARACTER SET utf8');




	
	
	?>