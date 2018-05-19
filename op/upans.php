<?php
$jawaban = $_POST['jawaban'];
$kode = $_POST['kode'];

if($jawaban){
    include'../config/func.php';
    $q = roco('update answer set jawab = ? where kd = ?',
              array($jawaban, $kode));
}

if($q){ ?>
<p>Jawaban berhasil diperbarui.</p>
Jawaban Sekarang
<p><?php echo $jawaban;?></p>

<?php } ?>