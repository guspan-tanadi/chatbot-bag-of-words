<?php
$url = $_GET['url'];

if ($url){
    include 'config/func.php';
    $q = op('select * from cms where link=?', array($url), 1);
}

if ( $q || empty($url) ){

session_start();
$session = $_SESSION['admin'];

if ($q){
	if ( $q['legal'] =='adm' && empty($session)
       || $session && $q['legal'] == 'cli'){
		header('Location:/UNAchat/');
	}
}

$page = $_GET['page'];
$data = $_GET['data'];

if( $page && $data && empty($session) )
	header('Location:/UNAchat/');

$projname ='Chatbot Universitas Asahan (UNA)';
$index =($page && $data)?
    array('Masukan Pengetahuan', 'keyword'):
		
    ( ($q)?
     array($q['page_name'], $q['link']) :

     ( (empty($url) && $session)? array('Bot Master', 'knowledge') :
		array('Calon Mahasiswa', 'chat')
		) );

$page_title = 'Halaman ' . $index[0];

$cssfn = $index[1] ;
$content = $index[1];
$jsfn = $index[1];
?>

<title><?php echo $page_title;?> &lt; <?php echo $projname;?></title>

<base href="/UNAchat/">

<link rel='stylesheet' href='0css/template.css' type='text/css'/>
<link href='0css/<?php echo $cssfn;?>.css' rel='stylesheet' type='text/css'>

<div id="pnm">
    <h3><?php echo $projname;?></h3>
<div><small>Untuk Calon Mahasiswa</small></div></div>

<?php $selo=($session)?'user':'master';?>
<a class='semo' href='op/status/?as=<?php echo $selo;?>'>Mode Here</a>

<?php
$adm_menu =array('Belum Terjawab', 'Uji Pertanyaan', 'Masukan Pengetahuan', 'Beranda');
$adm_path =array('unanswered', 'chat', 'keyword', '') ;

$cli_menu =array('Tentang', 'Panduan', 'Beranda') ;
$cli_path =array('tentang', 'panduan', '') ;

$menu = ($session)? array($adm_path, $adm_menu) :
					array($cli_path, $cli_menu);
$len = count($menu[1]);?>

<header>
<?php while($len--){ ?>
<a href='?url=<?php echo $menu[0][$len];?>'><?php echo $menu[1][$len];?></a>

<?php } ?>
</header>
<h4><span><?php echo $page_title;?></span></h4>

<?php
include $content.'.php';?>
<script src='0js/jquery.min.js'></script>
<script src='0js/<?php echo $jsfn;?>.js'></script>

<?php
include'footer.html';
} else {

echo'Halaman tidak tersedia.';
}
?>
