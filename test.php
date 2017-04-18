<html>
<head>
    <title>9am php</title>

    <style>
        body{
            background-color: antiquewhite;
            font-family: sans-serif;
            color: black;
        }

        #content{
            width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

    </style>
</head>
<body>
    <?php
    echo "<div id='content'>";
    //prints a bunch of php information about the server
    //phpinfo();

    //declare a variable
    $something = 15;

    //print something to the document
    // . is the concat operator
    echo '<h1>' . $something . "</h1>";
    //print and echo are functionally the same, but print returns 1 if it printed
    print "some shit";


    echo "<p id='mypara'></p>";

    //you can embed javascript just using the same printing as html
    echo "<script>document.getElementById('mypara').innerHTML = 'Hello World';</script>";

    $myStringVar = "";
    $myIntVar = 5;
    $myDecVar = 3.14;
    $myHTMLVar = "<button>Click Me</button>";


    /*
     * Comment
     */

    //comment

    #comment

    printButtons("new button!", 100);
    echo "</div>";

    function printButtons( $label, $count ){
        for ($i = 0; $i < $count; $i++){
            echo "<button>" . $label . "</button>";
        }
    }

    ?>
</body>
</html>