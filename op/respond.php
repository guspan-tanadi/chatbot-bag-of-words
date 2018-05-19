<?php
$pertanyaan = $_POST['pertanyaan'];
$ficom = array('?', ',');
$remo = str_replace($ficom, '', $pertanyaan);

$input = trim( strtolower( $remo ) );
$cinput = str_word_count($input, 1);
$sum_input = count($cinput);

if( $sum_input == 1 || empty($input) ){
    echo 'Kami tidak mengerti maksud anda.';
} else {
    
    session_start();/*

    $white_parse = "select t.pat sim_word from (select distinct(
    substring_index( substring_index(pola, ' ', n.n), ' ', -1))pat
    from guide, (select a.N + b.N * 3 + 1 n from
    (select 0 as N union all select 1 union all select 2)a,
    (select 0 as N union all select 1)b order by n) n
    where n.n <=1+ (length(pola)-length(replace(pola, ' ', '')))) t";
    
    include'../config/func.php';
    $aword = sounds_like($input, 't.pat', $white_parse);

    if( $aword ){
        foreach($aword as $r){
            for($len = 0; $len < $sum_input; $len++){

                $il = $cinput[ $len ];
                if ( DaLe( $il, $r['sim_word'], 1) <1 ){
                    $fword[] = $il;

                }
            }
        }

        $ardi = (count($fword))?
            array_diff($cinput,$fword) : $cinput;
        foreach($aword as $r){
            
            for($net = 0;$net<$sum_input;$net++){
                if( DaLe( $ardi[ $net ], $r['sim_word'], 1) <2 ){
                    $hit[] = $ardi[ $net ];

                    $fix[] = $r['sim_word'];
                }
            }
        
        }
    }
    $clisent = ($aword && count( $hit )) ?
        str_replace($hit, $fix, $input) : $input;*/
    $last = $_SESSION['last'];
    $wlast = $last.' '.$input;
    
    $clast = str_word_count($wlast, 1);
    $lastv = array_count_values( $clast );
    $sum_last = count($lastv);

if( $sum_input == $sum_last && $last ){
    echo 'Mohon ganti ke pertanyaan lain.';
} else {

include'../config/func.php';
$q = everydata('select pola, jawab from guide g, answer a
				where kd_ans = a.kd', 0);

foreach($q as $r){
    
    $pola = $r['pola'];
    $parse = explode(" ", $pola);
    $sum = count( $parse );

    $comb = $pola .' '. $input;
    $acv = array_count_values( explode(" ", $comb) );
    $sumacv = count( $acv );
    
    if ( $sumacv == $sum_input ){
        $mty[] = $sumacv;
        $ans[] = $r['jawab'];
    }

}

    if( count($mty) ){
        echo array_search( max( array_combine($ans, $mty) ),
                          array_combine($ans, $mty) );

    } else {
        $q = roco('insert into unknown(kalimat) values(?)',
                  array($pertanyaan) );
        if($q)
            echo '......';
    }

}
}

$_SESSION['last'] = $input;
?>