<?php
session_start();
$link = mysqli_connect('localhost', '***', '***', 'cybermentor');

if (!empty($_POST['password']) and !empty($_POST['username']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$res = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($res);

if (!empty($user)) 
	{
		if ($user ['Is_Admin'] == 1)
		{
		$_SESSION['username'] = $username;
			header("Location: nemnogie.php");
			exit();

		}
		if ($user ['Is_Admin'] == 0 ||  $user ['Is_Admin'] == 2)
		{
			$_SESSION['username'] = $username;
			header("Location: form.php");
			exit();
		}
	}	
	 else
		{
			echo "<script>alert('Incorrect username or password')</script>";
		}
}
#else
#{
#echo "<script>alert('pusto')</script>";
#}

?>

<!DOCTYPE html>
<html>
<head>
<title>yasamsdelal.com</title>
<meta charset="utf-8" />
</head>
<body>

<h3>Enterense</h3>
<form method="POST">
    <p>Login: <input type="text" name="username" /></p>
    <p>Password: <input type="text" name="password" /></p>
    <input type="submit" value="войти">
</form>
</body>
</html>


