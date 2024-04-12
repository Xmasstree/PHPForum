<!DOCTYPE html>
<html>
<head>
<title>yasamsdelal.com</title>
<meta charset="utf-8" />
</head>
<body>
<?php
$link = mysqli_connect('***', '***', '***%', 'cybermentor');

if (!empty($_POST['password']) and !empty($_POST['username']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$query = "INSERT INTO users SET username='$username', password='$password', Is_Admin=0";
$res = mysqli_query($link, $query);


}
#else
#{
#echo "<script>alert('pusto')</script>";
#}

?>
<h3>Registration</h3>
<form method="POST">
    <p>Login: <input type="text" name="username" /></p>
    <p>Password: <input type="password" name="password" /></p>
    <input type="submit" value="подтвердить">
    <a href="login.php">login</a>
</form>
</body>
</html>
