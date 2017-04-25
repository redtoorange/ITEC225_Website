<?php
session_start();
?>
<html>
<head>
<title>Favorite Cookie Page</title>
</head>
<body>
<?php
//    define(A, "<br>");
//    echo "Your favorite cookie is " . $_SESSION["cookie"].".<br>";
//    var_dump($_SESSION);
//    echo A;
//
//    unset($_SESSION["cookie"]);
//    echo "Your favorite cookie is " . $_SESSION["cookie"].".<br>";
//    var_dump($_SESSION);

    echo "Hello " . $_GET["name"] . "<br>";
?>

<form action="cookie.php" method="get">
    <label>Name:</label>
    <input type="text" name="name">
    <button type="submit">Submit</button>
</form>
</body>
</html>
