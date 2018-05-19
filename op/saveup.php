<?php
$pertanyaan = $_POST['pertanyaan'];
$kata_kunci = $_POST['kata_kunci'];
$lowkey = trim( strtolower($kata_kunci) );

$deci_kd = $_POST['deci_kd'];
$kode = $_POST['kode'];
$penentu = $_POST['penentu'];

$jawaban = $_POST['jawaban'];
include'../config/db.php';

if($penentu == 'new'){
	$fq = $hub->prepare('insert into answer(jawab) values(?)');
	$fq->execute( array($jawaban) );
}

$oldornew = ( $fq ) ? $hub->lastInsertId() : $jawaban;

$queva = ($deci_kd == 'up' && $oldornew)?
    array('update guide set kalimat=?, pola=?, kd_ans=? where kd=?',
    array($pertanyaan, $lowkey, $oldornew, $kode), 'perbarui') :

    ( ($deci_kd == 'up')?
    array('update guide set kalimat=?, pola=? where kd=?',
    array($pertanyaan, $lowkey, $kode), 'perbarui') :

    array('insert into guide(kalimat, pola, kd_ans) values(?,?,?)',
    array($pertanyaan, $lowkey, $oldornew), 'simpan')
    );

include'../config/func.php';
$sq = roco($queva[0], $queva[1]);
if($sq){ ?>

<h6>Pengetahuan berhasil di<?php echo $queva[2];?></h6>

<?php if( $queva[2] == 'perbarui' ){ ?>
    <p>Data Terkini</p>
<?php }

        if( $penentu == 'old' ){
            $thean = op('select jawab from answer where kd=?',
                    array($jawaban), 1);

        }
        $real_answer = ( $thean ) ? $thean['jawab'] : $jawaban;
?>

    <div>Bentuk pertanyaan: <?php echo $pertanyaan;?></div>
    <p>Pola: <?php echo $lowkey;?></p>
    <p>Jawaban: <?php echo $real_answer;?></p>

<?php }
if($deci_kd == 'del'){
    $q = roco('update unknown set sah=0 where kd = ?',
              array( $kode )
             );
}
?>