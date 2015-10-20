<?php
	if ( $_SERVER['HTTP_HOST'] == 'www.cpam1410.com' ) {
		header('location: http://www.cpam1410.com/accueil');
	} else if ( $_SERVER['HTTP_HOST'] == 'www.staging.cpam1410.com' ) {
		header('location: http://staging.cpam1410.com/accueil');
	}
?>