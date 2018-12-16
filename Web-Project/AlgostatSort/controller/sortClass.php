<?php

function swap(&$a, $x, $y)
{
    $tmp = $a[$x] ;
    $a[$x] = $a[$y] ;
    $a[$y] = $tmp ;
}
function fuse($l, $r, $k)
{
    $size = count($l) + count($r) ;
    $res = array() ;
    $l[count($l)] = 1000000 ;
    $r[count($r)] = 1000000 ;
    $i = 0 ;
    $j = 0 ;
    for ($c = 0 ; $c < $size ; ++$c)
    {
        ++$k ;
        if ($l[$i] <= $r[$j])
        {
            $res[$c] = $l[$i] ;
            ++$i ;
        }
        else
        {
            $res[$c] = $r[$j] ;
            ++$j ;
        }
    }
    return array($res, $k) ;
}

function fuseSort($a, $size, $k)
{
    if ($size == 1)
    {
        return array($a, $k) ;
    }
    else
    {
        $m = (int)($size / 2) ;
        $l = array_slice($a, 0, $m) ;
        $r = array_slice($a, $m) ;
        $l = fuseSort($l, count($l), $k) ;
        $r = fuseSort($r, count($r), 0) ;
        $res = fuse($l[0], $r[0], $l[1] + $r[1]) ;
        return array($res[0], $res[1]) ;
    }
}
function partition(&$a, $p, $size, $k)
{
    $x = $a[$size-1] ;
    $i = $p - 1 ;
    for ($j = $p ; $j < $size - 1 ; ++$j)
    {
        ++$k ;
        if ($a[$j] <= $x)
        {
            ++$i ;
            swap($a, $i, $j) ;
        }
    }
    swap($a, $i+1, $size-1) ;
    return array(++$i, $k) ;
}

function quickSort(&$a, $p, $size, $k)
{
    if ($p < $size)
    {
        $tmp = partition($a, $p, $size, $k) ;
        $q = $tmp[0] ;
        $k = $tmp[1] ;
        $t = quickSort($a, $p, $q, $k) ;
        $tb =quickSort($a, $q + 1, $size, $t[1]) ;
        $k = $tb[1] ;
    }
    return array($a, $k) ;
}

function randPartition(&$a, $p, $size, $k)
{
    $i = rand($p, $size-1) ;
    swap($a, $size-1, $i) ;
    return partition($a, $p, $size, $k) ;
}

function randQuickSort(&$a, $p, $size, $k)
{
    if ($p < $size)
    {
        $tmp = randPartition($a, $p, $size, $k) ;
        $q = $tmp[0] ;
        $k = $tmp[1] ;
        $t = randQuickSort($a, $p, $q, $k) ;
        $tb = randQuickSort($a, $q + 1, $size, $t[1]) ;
        $k = $tb[1] ;
    }
    return array($a, $k) ;
}
function insertSort($a, $size)
{
    $k = 0 ;
    for ($j = 1 ; $j < $size ; ++$j)
    {
        $key = $a[$j] ;
        $i = $j - 1 ;
        while ($i >= 0 && $a[$i] > $key)
        {
            ++$k ;
            $a[$i+1] = $a[$i] ;
            --$i ;
        }
        $a[$i+1] = $key ;
    }
    return $k ;
}

function selectSort($a, $size)
{
    $k = 0 ;
    for ($i = 0 ; $i < $size-1 ; ++$i)
    {
        $imin = $i ;
        for($j = $i+1 ; $j < $size ; ++$j)
        {
            ++$k ;
            if ($a[$imin] > $a[$j])
                $imin = $j ;
        }
        if ($imin != $i)
            swap($a, $imin, $i) ;
    }
    return $k ;
}

function bubbleSort($a, $size)
{
    $k = 0 ;
    $per = TRUE ;
    for ($i = 0 ; $i < $size ; ++$i)
    {
        if ($per == FALSE)
            break ;
        $per = FALSE ;
        for ($j = $size-1 ; $j > $i ; --$j)
        {
            ++$k ;
            if ($a[$j] < $a[$j-1])
            {
                swap($a, $j, $j-1) ;
                $per = TRUE ;
            }
        }
    }
    return  $k ;
}

function oldBubbleSort($a, $size)
{
    $k = 0 ;
    for ($i = 0 ; $i < $size ; ++$i)
    {
        for ($j = $size-1 ; $j > $i ; --$j)
        {
            ++$k ;
            if ($a[$j] < $a[$j-1])
                swap($a, $j, $j-1) ;
        }
    }
    return $k ;
}





function shellSort($a, $size)
{
    $k = 0 ;
    $n = 0 ;
    while ($n < $size)
    {
        $n = 3 * $n + 1 ;
    }
    while ($n != 0)
    {
        $n = round($n / 3) ;
        for ($i = $n ; $i < $size ; ++$i)
        {
            $val = $a[$i] ;
            $j = $i ;
            while ($j > $n - 1 && $a[$j-$n] > $val)
            {
                ++$k ;
                $a[$j] = $a[$j-$n] ;
                $j = $j - $n ;
            }
            $a[$j] = $val ;
        }
    }
    //var_dump(array($a, $k));echo "----";
    return $k ;
}


function wFuseSort($a, $size)
{
    return fuseSort($a, $size, 0)[1] ;
}

function wQuickSort(&$a, $size)
{
    return quickSort($a, 0, $size, 0)[1] ;
}

function wRandQuickSort(&$a, $size)
{
    return randQuickSort($a, 0, $size, 0)[1] ;
}

function combSort($a, $size)
{
    $k = 0 ;
    $gap = $size-2 ;
    $permutation = TRUE ;
    while ($permutation || $gap > 1)
    {
        $permutation = FALSE ;
        $gap = round($gap / 1.3, PHP_ROUND_HALF_DOWN) ;
        if ($gap < 1)
        {
            $gap = 1 ;
        }
        for ($current = 0 ; $current < $size - $gap ; ++$current)
        {
            ++$k ;
            if ($a[$current] > $a[$current+$gap])
            {
                $permutation = TRUE ;
                swap($a, $current, $current + $gap) ;
            }
        }
    }
    return $k ;
}










function genOrdList($n)
{
    return range(0, $n-1) ;
}

function genDecList($n)
{
    return range($n-1, 0, -1) ;
}

function genSmallDisList($n)
{
    $ndis = round((3 / 100) * $n, PHP_ROUND_HALF_UP) ;
    $a = genOrdList($n) ;
    while ($ndis >= 0)
    {
        $tmp = rand(0, $n-1) ;
        $swp = rand(0, $n-1) ;
        swap($a, $tmp, $swp) ;
        --$ndis;
    }
    return $a ;
}

function genUniRandList($n)
{
    $a = genOrdList($n) ;
    shuffle($a) ;
    return $a ;
}

function genDupList($n)
{
    $nsing = round((3 / 100) * $n, PHP_ROUND_HALF_UP) ;
    $a = array();
    for ($i = 0 ; $i <= $nsing ; ++$i)
    {
        $a[$i] = $i ;
    }
    while ($i < $n-1)
    {
        $a[$i] = $a[$i+1] = $i ;
        $i += 2 ; 
    }
    $a[$n-1] = $a[$n-2] = $i ;
    shuffle($a) ;
    return $a ;
}

function genListArray($n)
{
    return array(genOrdList($n), genDecList($n), genSmallDisList($n), genUniRandList($n), genDupList($n)) ;
}

function chrono($f, $a, $size)
{
    $return =[];
    $start = microtime(TRUE) ;
    $nbTour=$f($a, $size) ;
    $stop = microtime(TRUE) ;
    $chrono = $stop - $start;
    $return[0] = $chrono; 
    $return[1] = $nbTour; 
    /*var_dump($return);*/
    return  $return;
}

function chronoAll($f, $v, $size) 
{
    //echo "$f";
    $temp = [];
    $return =[];
    $temp[0] = chrono($f, $v[0], $size);
    $temp[1] = chrono($f, $v[1], $size);
    $temp[2] = chrono($f, $v[2], $size);
    $temp[3] = chrono($f, $v[3], $size);
    $temp[4] = chrono($f, $v[4], $size);
    $chrono = $temp[0][0] + $temp[1][0] + $temp[2][0] + $temp[3][0] + $temp[4][0];
    $chrono = $chrono / 5; 
    $nbTour =  $temp[0][1] + $temp[1][1] + $temp[2][1] + $temp[3][1] + $temp[4][1]; 
    //var_dump($temp[0][1]);
    $nbTour = $nbTour / 5; 
    $return[0] = $chrono; 
    $return[1] = $nbTour; 
    
    return  $return;
}
function bubbleWar($n)
{
    $v = genListArray($n) ;
    chronoAll("bubbleSort", $v, $n) ;
    //echo("old\n") ;
    chronoAll("oldBubbleSort", $v, $n) ;
}

function getTimes($n)
{
    $v = genListArray($n) ;
    echo("Tri par insertion\n") ;
    chronoAll("insertSort", $v, $n) ;
    echo("Tri par sélection\n") ;
    chronoAll("selectSort", $v, $n) ;
    echo("Tri à bulles\n") ;
    chronoAll("oldBubbleSort", $v, $n) ;
}
function getChronoAllSort($nbExec,$dataType,$nbItem){
    $globalTab=[]; 
    $size=$nbItem;
    for ($i=0; $i < $nbExec; $i++) { 
        if ($dataType == "genListArray" ) {
            $bubbleSort= chronoAll("oldBubbleSort", $dataType($nbItem), $size);
            $insertSort= chronoAll("insertSort", $dataType($nbItem), $size);
            $selectSort= chronoAll("selectSort", $dataType($nbItem), $size);
            $shellSort= chronoAll("shellSort", $dataType($nbItem), $size);
            $wFuseSort= chronoAll("wFuseSort", $dataType($nbItem), $size);
            $wQuickSort= chronoAll("wQuickSort", $dataType($nbItem), $size);
            $wRandQuickSort= chronoAll("wRandQuickSort", $dataType($nbItem), $size);
            $combSort= chronoAll("combSort", $dataType($nbItem), $size);
        }else{
            $bubbleSort= chrono("oldBubbleSort", $dataType($nbItem), $size);
            $insertSort= chrono("insertSort", $dataType($nbItem), $size);
            $selectSort= chrono("selectSort", $dataType($nbItem), $size);    
            $shellSort= chrono("shellSort", $dataType($nbItem), $size);
            $wFuseSort= chrono("wFuseSort", $dataType($nbItem), $size);
            $wQuickSort= chrono("wQuickSort", $dataType($nbItem), $size);
            $wRandQuickSort= chrono("wRandQuickSort", $dataType($nbItem), $size);
            $combSort= chrono("combSort", $dataType($nbItem), $size);
        }
        $globalTab[0][$i] =$bubbleSort[0];
        $globalTab[1][$i] =$insertSort[0];
        $globalTab[2][$i] =$selectSort[0];
        $globalTab[3][$i] =$shellSort[0];
        $globalTab[4][$i] =$wFuseSort[0];
        $globalTab[5][$i] =$wQuickSort[0];
        $globalTab[6][$i] =$wRandQuickSort[0];
        $globalTab[7][$i] =$combSort[0];

        $globalTab[8][$i] =$bubbleSort[1];
        $globalTab[9][$i] =$insertSort[1];
        $globalTab[10][$i] =$selectSort[1];
        $globalTab[11][$i] =$shellSort[1];
        $globalTab[12][$i] =$wFuseSort[1];
        $globalTab[13][$i] =$wQuickSort[1];
        $globalTab[14][$i] =$wRandQuickSort[1];
        $globalTab[15][$i] =$combSort[1];
    
    }
    return $globalTab;
}