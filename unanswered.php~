<?php
$q = everydata('select*from unknown order by waktu limit 6', 0);

if( $q ){ ?>
<div class="list">Daftar Kalimat Tidak Terjawab</div>

<?php
    foreach($q as $r){ ?>

<p class="list">
    
    <sup>
        <a href="op/remove/?page=unanswered&data=<?php echo $r['kd'];?>">X</a>
    </sup>

    <a href="?page=unknown&data=<?php echo $r['kd'];?>"
       class='<?php if( $r['sah']==0 ) echo 'was'?>'>
        <?php echo $r['kalimat'];?>
    </a>

    <sub><?php echo $r['waktu'];?></sub>
</p>    

<?php
    }

}
?>
