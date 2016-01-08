<?php
define('STDIN',fopen("input/flowers.txt","r"));
fscanf(STDIN,"%d %d",$n,$k);
//$t=floor($N/$K);
//$r=$N%$K;
//$val=array( );
$string=fgets(STDIN);

//$val=explode(" ",$temp);

//$n = 7;
//$k = 4;
$string=explode(" ",$string);
//$string = array(7,6,5,4,2,3,1);
//print_r($string);
rsort($string);

$total_cost=0;
$i=0;
$friend=0;

foreach($string as $value){

    $total_cost+=$value*($i+1);
    
    $friend++;
    if($friend == $k){
        $i++;
        $friend=0;
    }
}

echo $total_cost;
?>