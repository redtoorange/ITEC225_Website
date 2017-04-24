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

    $department = $_POST["department"];
    $department_reg = '/^[a-zA-Z]+/';

    if( isset($_POST["department"]) ){
        $department = $_POST["department"];
        if (!preg_match($department_reg, $department)) {
            $success = false;
            $failures .= "Department failed validation<br>";
        }
    }
    else{
        $success = false;
        $failures .= "Department is not set<br>";
    }

    $student = htmlspecialchars($_POST["studentName"]);
    $student_reg = '/^[a-zA-Z]+ [-\'a-zA-Z]+$/';

    if (!preg_match($student_reg, $student)) {
        $success = false;
        $failures .= "Name failed validation<br>";
    }


    $idNumber = htmlspecialchars($_POST["idNumber"]);
    $idNumber_reg = '/(^\d{6,9}$)/';

    if (!preg_match($idNumber_reg, $idNumber)) {
        $success = false;
        $failures .= "ID failed validation<br>";
    }

    $phone = htmlspecialchars($_POST["phone"]);
    $phone_reg = '/^(\(?)([0-9]{3})(\)?)[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/';

    if (!preg_match($phone_reg, $phone)) {
        $success = false;
        $failures .= "Phone failed validation<br>";
    }

    $GPA = htmlspecialchars($_POST["GPA"]);
    $GPA_reg = '/[0-4][\.]+[\d]/';

    if (!preg_match($GPA_reg, $GPA)) {
        $success = false;
        $failures .= "GPA failed validation<br>";
    }

    $credits = htmlspecialchars($_POST["credits"]);
    $credits_reg = '/\d/';

    if (!preg_match($credits_reg, $credits)) {
        $success = false;
        $failures .= "Credits failed validation<br>";
    }

    $major = htmlspecialchars($_POST["major"]);
    $major_reg = '/^[a-zA-Z]+/';

    if (!preg_match($major_reg, $major)) {
        $success = false;
        $failures .= "Major failed validation<br>";
    }

    $email = htmlspecialchars($_POST["email"]);
    $email_reg = '/^(([^<>()[\]\\.,;:\s@\\"]+(\.[^<>()[\]\\ .,;:\s@\\"]+)*)|(\\" . +\\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';

    if (!preg_match($email_reg, $email)) {
        $success = false;
        $failures .= "Email failed validation<br>";
    }

    $studyTitle = htmlspecialchars($_POST["studyTitle"]);
    $transcript = htmlspecialchars($_POST["transcript"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $courseNumber = htmlspecialchars($_POST["courseNumber"]);

    $semester = "VALUE NOT SET";
    $year = "9999";
    $summerSemester = null;

    $year_reg = '/\d/';

    if (isset($_POST["fallSem"]) && preg_match($year_reg, $_POST["fallSem"]))
        $semester = "Fall " . htmlspecialchars($_POST["fallSem"]);
    else if (isset($_POST["springSem"]) && preg_match($year_reg, $_POST["springSem"]))
        $semester = "Spring " . htmlspecialchars($_POST["springSem"]);
    else if (isset($_POST["winterSem"]) && preg_match($year_reg, $_POST["winterSem"]))
        $semester = "Winter " . htmlspecialchars($_POST["winterSem"]);
    else if (isset($_POST["summerSem"]) && preg_match($year_reg, $_POST["summerSem"])) {
        $semester = "Summer";
        $year = htmlspecialchars($_POST["summerSem"]);
        $summerSemester = htmlspecialchars($_POST["summerBlock"]);
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

        if ($summerSemester !== null) {
            $contents .= '
    "summerSemester" : "' . $summerSemester . '"';
        }
        $contents .= '
    
}';
        $fileName = $department . "_" . $student . ".JSON";

        createFile($fileName, $contents);

        //do this for each signature
        writeImage( "signature" );

        return $success;
    }


}


function createFile($fileName, $contents)
{
    file_put_contents($fileName, $contents);
}

function writeImage( $name )
{
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES[$name]["name"]);

    move_uploaded_file($_FILES[$name]["tmp_name"], $target_file);
}