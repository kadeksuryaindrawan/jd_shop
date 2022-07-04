<?php  
	date_default_timezone_set('Asia/Makassar');
	
	$HOST 		= 'localhost';
	$USERNAME	= 'root';
	$PASSWORD	= '';
	$DATABASE	= 'jd_shop';

	@$connection = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DATABASE);
	if($connection){
		
	}
?>