<?php 
header("Content-Type: application/json");
$filesType = ['image/jpeg' , 'image/png' , 'image/gif'];
$succeeded=[];
$failed = [];
//echo "<pre>".var_dump()."</pre>";

if(isset($_FILES) && !empty($_FILES)){
	$filesNum = count($_FILES['file']['name']);
	for($counter = 0 ; $counter < $filesNum ; ++$counter){
		$fileName = $_FILES['file']['name'][$counter];
		$fileType = $_FILES['file']['type'][$counter];
		$fileTmpName = $_FILES['file']['tmp_name'][$counter];
		$fileError = $_FILES['file']['error'][$counter];
		if(in_array($fileType,$filesType) && $fileError == 0){
			$fileExtention = explode('.' , $fileName);
			$fileExtention = strtolower(end($fileExtention));
			$fileNewName = md5($fileName).rand().time().'.'.$fileExtention;
			$succeeded[] = array(
			                     'fileName' => $fileName,
			                     'fileNewName' => $fileNewName
			               );
			move_uploaded_file($fileTmpName , "uploads/".$fileNewName);
		}else{
			$failed[] = $fileName;
		}
	}


	$output = json_encode(['status'=>'good' ,'succeeded'=>$succeeded, 'failed' =>$failed]);
}
else{
	$output = json_encode(['status'=>'bad']);
}
echo $output;
