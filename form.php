<!DOCTYPE html>
<html>
<head>
<title>yasamsdelal.com</title>
<meta charset="utf-8" />
</head>
<body>
<?php
session_start();
    $link = mysqli_connect('***', '***', '****', 'cybermentor');
    $ses = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username='$ses'";
    $res = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($res);
    if (isset($_SESSION['username']) && $user ['Is_Admin'] == 0) 
    {
        echo "<h2>Welcome to the echkep from crekov forum</h2>
        <p>Hello, " . $_SESSION['username'] . "!</p>";
        echo '<a href="logout.php">Logout</a>';
        $query = "SELECT * FROM forum";
        $res = mysqli_query($link, $query);

        $array = [];
        while ( $user = mysqli_fetch_assoc($res))
        {
            $array[$user['id']] = $user;
        }

        foreach ($array as $item)
        {
            echo "<p>------------------</p>
            <p>Name: {$item ['username']}</p>
            <p>{$item ['text']}</p>";
        }

        if (!empty($_POST['textik']))
        {
            $textik = $_POST['textik'];
            $query = "INSERT INTO forum SET username='$ses', text='$textik'";
            $res = mysqli_query($link, $query);
            header("Location: form.php"); #перезагрузка страницы
        }

        
    }

    else if (isset($_SESSION['username']) && $user ['Is_Admin'] == 2)
    {
        echo "<h2>Welcome to the echkep from crekov forum</h2>
        <p>Hello, " . $_SESSION['username'] . "!</p>";
        echo '<a href="logout.php">Logout</a>';
        $query = "SELECT * FROM forum";
        $res = mysqli_query($link, $query);

        $array = [];
        while ( $user = mysqli_fetch_assoc($res))
        {
            $array[$user['id']] = $user;
        }

        foreach ($array as $item)
        {
            echo "<p>------------------</p>
            <p>id: {$item ['id']}</p>
            <p>Name: {$item ['username']}</p>
            <p>{$item ['text']}</p>";
        }

        if (!empty($_POST['textik']))
        {
            $textik = $_POST['textik'];
            $query = "INSERT INTO forum SET username='$ses', text='$textik'";
            $res = mysqli_query($link, $query);
            header("Location: form.php"); #перезагрузка страницы
        }

        echo'<form method="POST">
        <p><input type="text" name="id" /></p>
        <p><textarea name="red"></textarea></p>
        <input type="radio" name="fade" value="red" />редактировать<br>
        <input type="radio" name="fade" value="del" />удалить<br>
        <input type="submit" value="отправить">
        </form>';

        if ($_POST['fade'] == "red" && !empty($_POST['id']) && !empty($_POST['red']))
        {
            $red = $_POST['red'];
            $id = $_POST['id'];
            $query = "UPDATE forum SET text='$red' WHERE id=$id";
            $res = mysqli_query($link, $query);
            header("Location: form.php"); #перезагрузка страницы
        }
        if ($_POST['fade'] == "del" && !empty($_POST['id']))
        {
            $id = $_POST['id'];
            $query = "DELETE FROM forum WHERE id=$id";
            $res = mysqli_query($link, $query);
            header("Location: form.php"); #перезагрузка страницы
        }
    }
    else 
    {
    
        echo '<a href="login.php">Login</a>';
        echo '<hr>';
    }
?>
<form method="POST">
<p><textarea name="textik"></textarea></p>
<!--<p><input type="text" name="textik" /></p>-->
<input type="submit" value="отправить">
</form>
</body>
</html>