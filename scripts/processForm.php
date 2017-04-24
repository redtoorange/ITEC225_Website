<?php
/**
 * Andrew McGuiness
 * Project 3
 * 9AM Class
 * 4/23/2017
 */

//htmlspecialchars( STR )

$result = validateAllData();
if ($result === true) {
    echo "Good thing";
} else {
    echo $result;
}


function validateAllData()
{
    $success = true;
    $failures = "";


    $department = htmlspecialchars($_GET["department"]);
    $department_reg = '/^[a-zA-Z]+/';

    if (!preg_match($department_reg, $department)) {
        $success = false;
        $failures .= "Department failed validation<br>";
    }

    $student = htmlspecialchars($_GET["studentName"]);
    $student_reg = '/^[a-zA-Z]+ [-\'a-zA-Z]+$/';

    if (!preg_match($student_reg, $student)) {
        $success = false;
        $failures .= "Name failed validation<br>";
    }


    $idNumber = htmlspecialchars($_GET["idNumber"]);
    $idNumber_reg = '/(^\d{6,9}$)/';

    if (!preg_match($idNumber_reg, $idNumber)) {
        $success = false;
        $failures .= "ID failed validation<br>";
    }

    $phone = htmlspecialchars($_GET["phone"]);
    $phone_reg = '/^(\(?)([0-9]{3})(\)?)[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/';

    if (!preg_match($phone_reg, $phone)) {
        $success = false;
        $failures .= "Phone failed validation<br>";
    }

    $GPA = htmlspecialchars($_GET["GPA"]);
    $GPA_reg = '/[0-4][\.]+[\d]/';

    if (!preg_match($GPA_reg, $GPA)) {
        $success = false;
        $failures .= "GPA failed validation<br>";
    }

    $credits = htmlspecialchars($_GET["credits"]);
    $credits_reg = '/\d/';

    if (!preg_match($credits_reg, $credits)) {
        $success = false;
        $failures .= "Credits failed validation<br>";
    }

    $major = htmlspecialchars($_GET["major"]);
    $major_reg = '/^[a-zA-Z]+/';

    if (!preg_match($major_reg, $major)) {
        $success = false;
        $failures .= "Major failed validation<br>";
    }

    $email = htmlspecialchars($_GET["email"]);
    $email_reg = '/^(([^<>()[\]\\.,;:\s@\\"]+(\.[^<>()[\]\\ .,;:\s@\\"]+)*)|(\\" . +\\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';

    if (!preg_match($email_reg, $email)) {
        $success = false;
        $failures .= "Email failed validation<br>";
    }

    $studyTitle = htmlspecialchars($_GET["studyTitle"]);
    $transcript = htmlspecialchars($_GET["transcript"]);
    $subject = htmlspecialchars($_GET["subject"]);
    $courseNumber = htmlspecialchars($_GET["courseNumber"]);

    $semester = "VALUE NOT SET";
    $year = "9999";
    $summerSemester = null;

    $year_reg = '/\d/';

    if (isset($_GET["fallSem"]) && preg_match($year_reg, $_GET["fallSem"]))
        $semester = "Fall " . htmlspecialchars($_GET["fallSem"]);
    else if (isset($_GET["springSem"]) && preg_match($year_reg, $_GET["springSem"]))
        $semester = "Spring " . htmlspecialchars($_GET["springSem"]);
    else if (isset($_GET["winterSem"]) && preg_match($year_reg, $_GET["winterSem"]))
        $semester = "Winter " . htmlspecialchars($_GET["winterSem"]);
    else if (isset($_GET["summerSem"]) && preg_match($year_reg, $_GET["summerSem"])){
        $semester = "Summer";
        $year = htmlspecialchars($_GET["summerSem"]);
        $summerSemester = htmlspecialchars($_GET["summerBlock"]);
    }



    if (!$success) {
        return $failures;
    } else {
        $contents =
            '{
    "student" : "' . $student . '",
    "department" : "' . $department . '",
    "idNumber" : "' . $idNumber . '",
    "phone" : "' . $phone . '",
    "GPA" : "' . $GPA . '",
    "credits" : "' . $credits . '",
    "major" : "' . $major . '",
    "email" : "' . $email . '",
    "studyTitle" : "' . $studyTitle . '",
    "transcript" : "' . $transcript . '",
    "subject" : "' . $subject . '",
    "courseNumber" : "' . $courseNumber . '",
    "semester" : "' . $semester . '",
    "year" : "' . $year . '",';

        if($summerSemester !== null){
            $contents .= '
    "summerSemester" : "' . $summerSemester . '"';
        }
        $contents .= '
    
}';
        $fileName = $department . "_" . $student . ".JSON";

        createFile($fileName, $contents);

        return $success;
    }

}


function createFile($fileName, $contents)
{
    file_put_contents($fileName, $contents);
}