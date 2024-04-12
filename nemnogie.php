<!DOCTYPE html>
<html>
<head>
<title>yasamsdelal.com</title>
<meta charset="utf-8" />
</head>
<body>

<?php
    session_start();
    function print_arr( $arr )
    {
        echo '<pre>' . print_r( $arr , true ) . '</pre>' ;
    }

    $link = mysqli_connect('***', '***', '***', 'cybermentor');
    $ses = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username='$ses'";
    $res = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($res);
    if (isset($_SESSION['username']) && $user ['Is_Admin'] == 1) 
    {
        echo "<h2>Welcome to the echkep from crekov admin pannel</h2>
        <p>Hello, " . $_SESSION['username'] . "!</p>";
        echo '<a href="logout.php">Logout</a><p></p>';
        echo '<a href="https://metrika.yandex.ru/dashboard?id=95921639">Metrik</a><p></p>';
        
        $query = "SELECT * FROM users";
        $res = mysqli_query($link, $query);
       
        $array = [];
        while ( $user = mysqli_fetch_assoc($res))
        {
            $array[$user['username']] = $user;
        }
        #print_arr($array);
        echo "<h2>Owz slawz: </h2>";
        foreach ($array as $item)
        {
            echo "<p>Name: {$item ['username']} <br></p>";
        }
    } 
    else 
    {
        echo '<a href="login.php">Login</a>';
        echo '<hr>';
    }
?>
</body>
</html>




