<?php
	$error = array(
		'name' => '',
		'last_name' => '',
		'email' => '',
		'phone' => '',
		'c' => '',
	);

	if (!empty($_POST))
	{
		$error['name'] = empty($_POST['name']) ? 'Введите имя!' : '';
		$error['last_name'] = empty($_POST['last_name']) ? 'Введите фамилию!' : '';
		$error['email'] = empty($_POST['email']) ? 'Введите эл.почту!' : '';
		$error['phone'] = empty($_POST['phone']) ? 'Введите номер телефона!' : '';
		$error['c'] = (!empty($_POST['name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['phone'])) ? 'true' : ''; 
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Форма регистрации</title>
</head>
<body>
	<h1 align="center">Форма регистрации</h1>
	<form action="<?= $_SERVER['REQUEST_URI'];?>" method="POST">
		<p><input placeholder="Имя" name="name" value="<?= isset($_POST['name']) ? $_POST['name']:''?>" required><?php echo $error['name'] ?></p>

		<p><input placeholder="Фамилия" name="last_name" value="<?= isset($_POST['last_name']) ? $_POST['last_name']:''?>" required><?php echo $error['last_name'] ?></p>

		<p><input placeholder="Эл.адрес" name="email" value="<?= isset($_POST['email']) ? $_POST['email']:''?>" required><?php echo $error['email'] ?></p>

		<p><input placeholder="Телефон" name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone']:''?>" required><?php echo $error['phone'] ?></p>
		
		<p>Выберете тематику конференции</p>
		<p>
		<select name="Topic"> 
			<optgroup label="Тема"> 
				<option value="bus" name="bus">Бизнес</option> 
				<option value="tex" name="tex">Технологии</option>
				<option value="RM" name="RM">Реклама и Маркетинг</option>
			</optgroup> 
		</select></p>

		<p>Выберете способ оплаты</p>
		<p>
		<select name="pay"> 
			<optgroup label="Оплата"> 
				<option value="WM" name="WM">WebMoney</option> 
				<option value="ya" name="ya">Yandex.money</option>
				<option value="PP" name="PP">PayPal</option>
				<option value="cc" name="cc">Credit card</option>
			</optgroup> 
		</select>

		<p>Хотите получать рассылку?<input type="checkbox" name="jel"></p>
	<p><input type="submit" value="Отправить"></p>
	</form>

	<?php
	if ($error['c'] == 'true')
	{
		$name = $_POST['name'];
		$lastname = $_POST['last_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$topic = $_POST['Topic'];
		$pay = $_POST['pay'];
	
		$contents = '<?php' . "\n"   
		    . 'return'
		    . var_export([
		        'name' => $name,
		        'lastname' => $lastname,
		        'email' => $email,
		        'topic' => $topic, 
		        'pay' => $pay, 
		    ], true);
	
		$filename = date('Y-m-d-H-i-s') . '-' . rand(010, 99) . '.txt';
	
		//mkdir($filename, 0777, true);
	
		file_put_contents($filename, $contents);

		header('Location: form.php');
		exit;
	}
	?>

	<form action="admin.php">
		<p><input type="submit" value="Админ"></p>
	</form>

</body>
</html>
