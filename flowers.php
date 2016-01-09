<?php
if(isset($_POST['submit']) && !empty($_FILES["flowers"]))
{
	
	$target_dir = "input/";
	$target_file = $target_dir . basename($_FILES["flowers"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	// Allow certain file formats
	if($imageFileType != "txt") {
		echo "Sorry, only Text file is allowed. ";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["flowers"]["tmp_name"], $target_file)) {
			//echo "The file ". basename( $_FILES["flowers"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}

	$filename = $_FILES["flowers"]["name"];
	
	define('STDIN',fopen("input/".$filename,"r"));;
	fscanf(STDIN,"%d %d",$n,$k);
	//$t=floor($N/$K);
	//$r=$N%$K;
	//$val=array( );
	if(is_numeric($n) && is_numeric($k) && $n>0 && $k>0 && $k<= $n)
	{
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
		
		echo '<br><br> Total Cost => '.$total_cost.'<br><br>';
	}
	else
	{
		echo "Invalid File Format";	
	}
}
?>

<!DOCTYPE html>
<html>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    Select Input File to upload:
    <input type="file" name="flowers" id="flowers">
    <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>