<?php

session_start();
if ($_GET['as'] == 'master') {
    $_SESSION['admin'] = 9;

} else {
	session_destroy();
}

header('Location:/UNAchat/');
?>