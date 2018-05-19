<?php
$tanya = $_POST['tanya'];
include '../config/func.php' ;
// $q = likeword($tanya, 'pola', $queryString);

$remQ = str_replace('?', '', $tanya);
$ready= trim($remQ) ;

$parse = explode(" ", $ready) ; // $word
$sum = count($parse) ;
$column = 'jawab' ;

for($f=1; $f < $sum; $f++)
$orlike[] =" or ".$column." like";

for($s=0; $s < $sum; $s++)
$placeholder[] =":" .$s. $orlike[$s];

while($f--)
$value[$f] ="%" .$parse[$f]. "%";

$clause=str_replace($parse, $placeholder, $ready);
/*
$queryString="select a.kd, jawab
from guide g left join answer a on kd_ans = a.kd
where ".$column." like ".$clause. ' group by a.kd';*/

$queryString="select * from answer";

$q = everydata($queryString, 0);

if ($q){
?>
<option value=0 disabled>pilih jawaban...</option>

	<?php
	foreach($q as $r){
	?>
<option value=<?php echo$r['kd'];?>><?php echo$r['jawab'];?></option>
	<?php
	}
} else {
?>
<option disabled>Tidak ada kandidat</option>
<?php
}
?>