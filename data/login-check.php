<?php
/**
 *	This is sample login form checker, it works only with one user&pass
 *	
 *	Laborator.co
 *	www.laborator.co 
 */


	$user = 'demo';
	$pass = 'demo';
	
	
	$resp = array('accessGranted' => false, 'errors' => ''); // For ajax response
	
	if(isset($_POST['do_login']))
	{
		$given_userid = $_POST['userid'];
		$given_password = $_POST['passwd'];
		
		if($user == strtolower($given_userid) && $pass == $given_password)
		{
			$resp['accessGranted'] = true;
			setcookie('failed-attempts', 0);
		}
		else
		{
			// Failed Attempts
			$fa = isset($_COOKIE['failed-attempts']) ? $_COOKIE['failed-attempts'] : 0;
			$fa++;
			
			setcookie('failed-attempts', $fa);
			
			// Error message
			$resp['errors'] = '<strong>Invalid login!</strong><br />Please enter valid userid and password (demo/demo).<br />Failed attempts: ' . $fa;
		}
	}
	
	echo json_encode($resp);