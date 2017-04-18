<?php
    $cookieSet = false;
    //Sets a cookie on the user's machine
    if($_COOKIE["name"] == null){
        setcookie("name", "Andrew", time()+30, '/');
        $cookieSet = true;
    }

    //Begin a session to enable session variables
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Cookies and Session Variables</title>
</head>
<body>
<?php
    $_SESSION["cookie"] = "Sugar Cookie";
    if($cookieSet)
        echo "Set a new Cookie<br>";
    else
        echo "Used old Cookie<br>";

    //get the value of the cookie
    echo "Hello " . $_COOKIE["name"] . "!";

    echo "<br>";

    //Step through the cookie array
    foreach($_COOKIE as $x){
        //Can include the variables within double quotes, will show variable
        //  value.
        echo "$x <br>";
    }

?>
<a href="cookie.php">Cookies</a>
</body>
</html>