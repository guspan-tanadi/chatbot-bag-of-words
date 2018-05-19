<?php
function op($a, $b = 0, $d = 0){
include'db.php';
    if($b){
$q = $hub->prepare($a);
$q->execute( $b);
    } else {
$q = $hub->query($a);
    }

$v = ($d) ? $q->fetch() : $q;
return $v;
}

function everydata($qS, $v){
    $d = ($v)? $v : 0;
    $q = op($qS, $d);
    return $q->fetchAll();
}

function roco($qS, $v){
    $q = op($qS, $v);
    return $q->rowCount();
}

function byspace($input, $col, $clan, $qS){
    $parse = explode(" ", $input);
    $sum = count($parse);

    for($len = 0; $len < $sum; $len++) {
        $clause .= $col. " " .$clan. " :" . $len;
        
        if($len != $sum - 1) {
            $clause .= " or ";
        }
        
        $value[ $len ] = "%" .$parse[ $len ]. "%";
    }
    
    return everydata($qS . ' where ' . $clause,
                 $value);
}

function sounds_like($input, $col, $q){
    return byspace($input, $col, 'sounds like', $q);
}

function likeword($input, $col, $q){
    return byspace($input, $col, 'like', $q);
}

function DaLe($a, $b, $alphabetLength){
    $INFINITY = strlen($a)+strlen($b);
    $H[0][0] = $INFINITY;
    for($i=0; $i<=strlen($a); $i++){
        $H[$i+1][1]=$i;
        $H[$i+1][0]=$INFINITY;
    }
    
    for($j=0; $j<=strlen($b); $j++){
        $H[1][$j+1]=$j;
        $H[0][$j+1]=$INFINITY;
    }

    $DA = array($alphabetLength);
    array_fill(0, 9, $DA);
    
    for($i=1; $i<=strlen($a); $i++){
        $db = 0;
        
        for($j=1; $j<=strlen($b); $j++){
            $i1 = $DA[$b[$j-1]];
            $j1 = $db;
            $d = ($a[$i-1]==$b[$j-1])?0:1;
            
            if($d==0)
                $db = $j;

            $H[$i+1][$j+1] = min($H[$i][$j]+$d,
                                 $H[$i+1][$j]+1,
                                 $H[$i][$j+1]+1,
                                 $H[$i1][$j1]+($i-$i1-1)+ 1 +($j-$j1-1));
        }
        $DA[$a[$i-1]] = $i;
    }

    return $H[strlen($a)+1][strlen($b)+1];
}
?>