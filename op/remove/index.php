<?php
$page = $_GET['page'] ;
$data = $_GET['data'] ;

$table_name = ( $page == 'knowledge') ?
    'guide' : 'unknown';

include'../../config/func.php';

$q = roco('delete from '. $table_name. ' where kd=?',
          array($data)
         );

if( $q) {
    $link =($page == 'knowledge') ? '':'unanswered';
    header ('Location:/UNAchat/?url='. $link );

}
?>
