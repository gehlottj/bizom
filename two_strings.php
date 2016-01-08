<?php

define('STDIN',fopen("input/two_strings.txt","r"));
fscanf(STDIN,"%d",$t);

for($i=0;$i<$t;$i++)
{
	$abcd = array(
			'a'=>0,
			'b'=>0,
			'c'=>0,
			'd'=>0,
			'e'=>0,
			'f'=>0,
			'g'=>0,
			'h'=>0,
			'i'=>0,
			'j'=>0,
			'k'=>0,
			'l'=>0,
			'm'=>0,
			'n'=>0,
			'o'=>0,
			'p'=>0,
			'q'=>0,
			'r'=>0,
			's'=>0,
			't'=>0,
			'u'=>0,
			'v'=>0,
			'w'=>0,
			'x'=>0,
			'y'=>0,
			'z'=>0
	
		);
	$msg='NO';
	$str1=trim(fgets(STDIN));
	$str2=trim(fgets(STDIN));
	$l_str1 = strlen($str1);
	$str1_split = str_split($str1);
	$str2_split = str_split($str2);
	foreach($str1_split as $str_one)
	{
		$abcd[$str_one] = 1; 
	}
	
	
	foreach($str2_split as $str_two)
	{
		if($abcd[$str_two] == 1)
		{
			//echo $str_two;
			//echo '<pre>' ;print_r($abcd);
			$msg = 'YES';
			break;
		}
	}
	echo $msg.'<br>';
}
?>
