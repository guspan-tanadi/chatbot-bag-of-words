<?php
$teks = $_GET['teks'];
$mode = $_GET['mode'];

include 'config/func.php';
if($teks && $mode){
    $col = ($mode == 1) ? 'pola':'jawab';

    $qStr = 'select kalimat, pola, jawab, g.kd, kd_ans
    from guide g left join answer a on kd_ans=a.kd';

    $q = array(likeword($teks, $col, $qStr),
               'Hasil Pencarian:',
               "Teks '".$teks."' tidak ditemukan."
              );

} else {

    $q = array(everydata(
        'select kalimat, pola, jawab, g.kd, kd_ans
        from guide g, answer a
        where kd_ans=a.kd order by g.kd desc limit 3', 0),

               '3 Data Pengetahuan Terbaru',
               'Tak ada Pengetahuan.'
              );
}

if( $q[0] ){
?>

<form>Pencarian:
    <select name='mode'>
        <option value='0' disabled>Berdasarkan</option>

        <option value='1'>pola</option>
        <option value='2'>jawaban</option>
    </select>

    <input id="tese" name='teks'
           placeholder="Input Teks.."
           value='<?php echo $teks;?>'>

    <input id="btnsea" type="submit" value='Cari'>
</form>

<aside id='knowledge-data'>
    <p><?php echo $q[1];?></p>
<?php

foreach($q[0] as $r){
$kd = $r['kd'];
?>

    <dl class="each-data">
<dt>
<a href="op/remove/?page=knowledge&data=<?php echo $kd;?>">x</a></dt>

<dd>
<a href="?page=up&data=<?php echo $kd;?>" title="Ubah data">
    <?php echo $r['kalimat'];?>
</a></dd>

<dd>pola: <?php echo $r['pola'];?></dd>

<dd>
<a href="?page=answer&data=<?php echo $r['kd_ans'];?>" title="Ubah jawaban">
    <?php echo $r['jawab'];?></a>

</dd>
    </dl>
<?php } ?>

</aside>
<?php } else echo $q[2]; ?>
