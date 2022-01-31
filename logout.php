<?php 


    // END THE SESSION AND DELETE The DATA AND Destroy This 

	session_start();   // start The Session 

	session_unset();   // UnSet The data from This Session

	session_destroy(); // To destroy This Session 

	header('Location: index.php');

	exit();
	

?>