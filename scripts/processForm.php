<?php
/**
 * Created by IntelliJ IDEA.
 * User: redto
 * Date: 4/22/2017
 * Time: 8:48 AM
 */
$student = $_GET["student"];
$department = $_GET["department"];
$idNumber = $_GET["idNumber"];
$phone = $_GET["phone"];
$GPA = $_GET["GPA"];
$credits = $_GET["credits"];
$major = $_GET["major"];
$email = $_GET["email"];


$contents =
    '{
    "student" : "' . $student . '",
    "department" : "' . $department . '",
    "idNumber" : "' . $idNumber . '",
    "phone" : "' . $phone . '",
    "GPA" : "' . $GPA . '",
    "credits" : "' . $credits . '",
    "major" : "' . $major . '",
    "email" : "' . $email . '"
}';
$fileName = $department . "_" . $student . ".JSON";

file_put_contents($fileName, $contents);
?>