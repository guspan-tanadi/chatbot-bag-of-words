<?php
if ( $_POST['signIn'] ) {

$admin = $_POST['admin'];
$sandi = $_POST['sandi'];
    
    if ($admin == 'guspan' && $sandi == 9696) {
	session_start();
	$_SESSION['admin'] = $admin;

	header('Location:/UNAchat/');
	} else {
        header('Location:/UNAchat/signIn/');
    }
}
?>