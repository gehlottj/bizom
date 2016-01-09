<?php
if(isset($_POST['submit']) && !empty($_FILES["flowers"]))
{
	//echo '<pre>';print_r($_FILES["flowers"]);exit;
	$target_dir = "input/";
	$target_file = $target_dir . basename($_FILES["flowers"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	// Allow certain file formats
	if($imageFileType != "txt") {
		echo "Sorry, only Text file is allowed. <br>";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded. <br>";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["flowers"]["tmp_name"], $target_file)) {
			//echo "The file ". basename( $_FILES["flowers"]["name"]). " has been uploaded. <br>";
		} else {
			echo "Sorry, there was an error uploading your file. <br>";
		}
	}
	
	$filename = $_FILES["flowers"]["name"];
	
	define('STDIN',fopen("input/".$filename,"r"));
	fscanf(STDIN,"%d",$t);
	
	if(is_numeric($t) && $t>0)
	{
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
			echo '<br> Match Found => '.$msg.'<br>';
		}	
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
