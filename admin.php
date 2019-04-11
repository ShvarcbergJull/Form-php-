<!DOCTYPE HTML> 
<html> 
<head> 
<meta charset="utf-8"> 
<title>Test_Form</title> 
</head> 
<body> 
<h2 align="center">Файлы: </h2>
<?php 
	//include "del.php";
	$filelist = glob("*.txt"); 
	$i=0; 
?> 
<form action="del.php" method="POST"> 
<?php 
	foreach ($filelist as $filename){ 
		$i++; 
		echo "<input type='checkbox' name='f[]' value=".$filename.">".$filename."<br>"; 
	} 
?> 
<p><input type="submit" value="Удалить данные"></p> 

</form>  
<p><a href="/SHU">Вернутся к форме</a></p>
</body> 
</html>
