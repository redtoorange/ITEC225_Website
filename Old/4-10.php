<html>
<head>
    <title>
        4-10 class
    </title>
</head>
<body>
<?php
    $myArray = array("hello", "world", 3.14, true);

    //vardum will show us the datatypes and positions of variables in an array
    var_dump($myArray);

    echo "<br>";

    foreach ( $myArray as $var){
        echo $var . "<br>";
    }

    $a = 5;
    $b = 6;

    //myFunction();

    //this is how we reference globals from inside of a function
//    function myFunction(){
//        print $GLOBALS['a'] . $GLOBALS['b'];
//    }
//    echo "<hr>";
//
//foreach ( $GLOBALS as $var){
//    echo var_dump($var) . "<br>";
//}

?>

<?php
//$myArray[0] = "something";
//var_dump($myArray);
//
//echo "<br>";
//
//foreach ( $myArray as $var){
//    echo $var . "<br>";
//}

class Car{
    public static $CARS = 0;
    public $make;
    public $model;

//    function Car(){
//        $this->make = "Tesla";
//        $this->model = "Model S P100D";
//    }

    function Car($make, $model){
        $this->make = $make;
        $this->model = $model;
    }
}

$car = new Car("Tesla", "Model S P100D");
var_dump($car);

//Define a constant that will be replaced by the quoted text when used
define("A", "This is a contant");
print A;

$c = 7;
$d = 8;
$t = date("H");
print "<h1><marquee>";
if($t < 10){
    echo "Good morning";
}
elseif($t > 20){
    echo "Good Evening";
}
else{
    echo "What time is it?" . $t;
}
print "</h1></marquee>";




$x = 1;
while($x < 100){
    $x++;
    echo "<button>".$x."</button><br>";
}
?>

</body>
</html>

