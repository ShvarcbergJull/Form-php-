<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	if(empty($_POST['f'])){ 
		echo ("вы ничего не выбрали"); 
	} 
	else{ 
		$af=$_POST['f']; 
		$j=count($af); 
		echo "<p>Файлы: </p>";
		for ($i=0;$i<$j;$i++){ 
			if(!empty($af[$i])) 
			{
				echo ($af[$i]." "); 
				unlink($af[$i]);
			}
		} 
	 	echo "<p>успешно удалены!</p>";
	 }
?>

<form action="admin.php">
	<p><input type="submit" value="Вернуться к файлам"></p>
</form>
</body>
</html>
