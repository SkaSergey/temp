<?php 
// проверка на аутентификацию
// session_start();
// if (!isset($_SESSION['username'])) {
// 	http_response_code(403);
// 	exit;
// }
if (isset($_POST['login'])) {
	
	$json = file_get_contents(__DIR__ . './baza.json');
	$baza = json_decode($json, true);
	
	$login = $_POST['login'];
	$password = $_POST['password'];

		foreach ($baza as $key => $line) {
			
			if ($login == $key) {

				foreach ($line as $correct_password => $value) {
					if ($password !== $value) {
						echo "Неверный пароль"; 
						 exit;
					}
					$_SESSION['user'] = $login;
					echo "Добро пожаловать, " . $_SESSION['user'];

				}
			}
			else echo "Нет такого пользователя"; exit;

		}

	

}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>


<form action="" method="POST">
	<input type="text" name="login" placeholder="Введите логин">
	<input type="password" name="password" placeholder="Введите пароль">
	<input type="submit">
</form>
<?php echo $_SESSION['user'] ?>
</body>
</html>