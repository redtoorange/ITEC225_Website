<?php
/**
 * Andrew McGuiness
 * Project 3
 * 9AM Class
 * 4/23/2017
 */

//Store either the failures or true if everything was fine.
$result = validateAllData();

if ($result === true) {
    //Everything went fine.
    echo "Operation complete, data stored locally.";
} else {
    //Something bad happened, let the user know.
    echo $result;
}

/**
 * Attempt to parse through the input and store it all as a json file.
 * @return bool Was the operation successful?
 */
function validateAllData()
{
    //any failures will be stored here for printing
    $failures = "";

    list($department, $success, $failures) = verifyDepartment($failures);

    //  Daisy chain these so that if one fails, then the rest will fail, will allow the script to fail
    //      quickly and return feedback.
    if($success)
        list($student, $success, $failures) = verifyStudent($failures);

    if($success)
        list($idNumber, $success, $failures) = verifyID($failures);

    if($success)
        list($phone, $success, $failures) = verifyPhone($failures);

    if($success)
        list($GPA, $success, $failures) = verifyGPA($failures);

    if($success)
        list($credits, $success, $failures) = verifyCredits($failures);

    if($success)
        list($major, $success, $failures) = verifyMajor($failures);

    if($success)
        list($email, $success, $failures) = verifyEmail($failures);

    if ($success)
        list($semester, $summerSemester) = verifySemester();

    if($success){
        //There is not real regex to do on these, any value is accepted.
        $studyTitle = htmlspecialchars($_POST["studyTitle"]);
        $transcript = htmlspecialchars($_POST["transcript"]);

        //These are sufficiently validated on client side
        $subject = htmlspecialchars($_POST["subject"]);
        $courseNumber = htmlspecialchars($_POST["courseNumber"]);
    }




    if (!$success) {
        return $failures;
    } else {
        $data = array();
        $data["student"] = $student;
        $data["department"] = $department;
        $data["idNumber"] = $idNumber;
        $data["phone"] = $phone;
        $data["GPA"] = $GPA;
        $data["credits"] = $credits;
        $data["major"] = $major;
        $data["email"] = $email;
        $data["studyTitle"] = $studyTitle;
        $data["transcript"] = $transcript;
        $data["subject"] = $subject;
        $data["courseNumber"] = $courseNumber;
        $data["semester"] = $semester;

        if ($summerSemester !== null)
            $data["summerSemester"] = $summerSemester;

        $data = validateSignatures($idNumber, $data );

        $fileName = $idNumber . ".JSON";
        createFile($fileName, json_encode($data, JSON_FORCE_OBJECT));

        return $success;
    }
}

/**
 * Verify the semester year and attach a label to it.
 * @return array
 */
function verifySemester(): array
{
    $semester = "VALUE NOT SET";
    $summerSemester = null;

    $year_reg = '/\d/';

    if (isset($_POST["fallSem"]) && preg_match($year_reg, $_POST["fallSem"])) {
        $semester = "Fall " . htmlspecialchars($_POST["fallSem"]);
    } else if (isset($_POST["springSem"]) && preg_match($year_reg, $_POST["springSem"])) {
        $semester = "Spring " . htmlspecialchars($_POST["springSem"]);
    } else if (isset($_POST["winterSem"]) && preg_match($year_reg, $_POST["winterSem"])) {
        $semester = "Winter " . htmlspecialchars($_POST["winterSem"]);
    } else if (isset($_POST["summerSem"]) && preg_match($year_reg, $_POST["summerSem"])) {
        $semester = "Summer " . htmlspecialchars($_POST["summerSem"]);
        $summerSemester = htmlspecialchars($_POST["summerBlock"]);
    }
    return array($semester, $summerSemester);
}

/**
 * Try to regex the email AFTER illegal characters have been removed.
 * @param $failures
 * @return array
 */
function verifyEmail($failures): array
{
    $email = htmlspecialchars($_POST["email"]);
    $email_reg = '/^(([^<>()[\]\\.,;:\s@\\"]+(\.[^<>()[\]\\ .,;:\s@\\"]+)*)|(\\" . +\\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
    if (!preg_match($email_reg, $email)) {
        $success = false;
        $failures .= "Email failed validation<br>";
    }
    return array($email, $success, $failures);
}

/**
 * Try to regex the major AFTER illegal characters have been removed.
 * @param $failures
 * @return array
 */
function verifyMajor($failures): array
{
    $major = htmlspecialchars($_POST["major"]);
    $major_reg = '/^[a-zA-Z]+/';
    if (!preg_match($major_reg, $major)) {
        $success = false;
        $failures .= "Major failed validation<br>";
    }
    return array($major, $success, $failures);
}

/**
 * Try to regex the credits AFTER illegal characters have been removed.
 * @param $failures
 * @return array
 */
function verifyCredits($failures): array
{
    $credits = htmlspecialchars($_POST["credits"]);
    $credits_reg = '/\d/';
    if (!preg_match($credits_reg, $credits)) {
        $success = false;
        $failures .= "Credits failed validation<br>";
    }
    return array($credits, $success, $failures);
}

/**
 * Try to regex the GPA AFTER illegal characters have been removed.
 * @param $failures
 * @return array
 */
function verifyGPA($failures): array
{
    $GPA = htmlspecialchars($_POST["GPA"]);
    $GPA_reg = '/[0-4][\.]+[\d]/';
    if (!preg_match($GPA_reg, $GPA)) {
        $success = false;
        $failures .= "GPA failed validation<br>";
    }
    return array($GPA, $success, $failures);
}

/**
 * Try to regex the phone AFTER illegal characters have been removed.
 * @param $failures
 * @return array
 */
function verifyPhone($failures): array
{
    $phone = htmlspecialchars($_POST["phone"]);
    $phone_reg = '/^(\(?)([0-9]{3})(\)?)[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/';
    if (!preg_match($phone_reg, $phone)) {
        $success = false;
        $failures .= "Phone failed validation<br>";
    }
    return array($phone, $success, $failures);
}

/**
 * Try to regex the ID AFTER illegal characters have been removed.
 * @param $failures
 * @return array
 */
function verifyID($failures): array
{
    $idNumber = htmlspecialchars($_POST["idNumber"]);
    $idNumber_reg = '/(^\d{6,9}$)/';
    if (!preg_match($idNumber_reg, $idNumber)) {
        $success = false;
        $failures .= "ID failed validation<br>";
    }
    return array($idNumber, $success, $failures);
}

/**
 * Try to regex the student name AFTER illegal characters have been removed.
 * @param $failures
 * @return array
 */
function verifyStudent($failures): array
{
    $student = htmlspecialchars($_POST["studentName"]);
    $student_reg = '/^[a-zA-Z]+ [-\'a-zA-Z]+$/';
    if (!preg_match($student_reg, $student)) {
        $success = false;
        $failures .= "Name failed validation<br>";
    }
    return array($student, $success, $failures);
}

/**
 * Try to regex the department AFTER illegal characters have been removed.
 * @param $failures
 * @return array
 */
function verifyDepartment($failures): array
{
    $department = $_POST["department"];
    $department_reg = '/^[a-zA-Z]+/';
    if (!preg_match($department_reg, $department)) {
        $success = false;
        $failures .= "Department failed validation<br>";
    }
    return array($department, $success, $failures);
}


/**
 * Validate and encase the signatures into the hash map.  All illegals are removed and the data is ready for storage.
 *
 * @param $idNumber String student's ID number, used when saving the image files.
 * @param $data     array data map to encase the signatures into.
 * @return mixed    data map after the encasing.
 */
function validateSignatures($idNumber, $data )
{
    $name_reg = '/^[a-zA-Z]+ [-\'a-zA-Z]+$/';

    //  Student signature section
    if( isset($_POST["studentSignature"]))
        $data["studentSignature"] = decodeSignature($idNumber, "studentSignature");
    if( isset($_POST["studentDateIn"]))
        $data["studentSignatureDate"] = htmlspecialchars($_POST["studentDateIn"]);

    //  Supervisor signature section
    if( isset($_POST["supervisorSignature"]))
        $data["supervisorSignature"] = decodeSignature($idNumber, "supervisorSignature");
    if( isset($_POST["prNameIn"]) && preg_match($name_reg, htmlspecialchars($_POST["prNameIn"])) )
        $data["supervisorPrint"] = htmlspecialchars($_POST["prNameIn"]);
    if( isset($_POST["prDateIn"]))
        $data["supervisorDate"] = htmlspecialchars($_POST["prDateIn"]);

    //  Advisor signature section
    if( isset($_POST["advisorSignature"]))
        $data["advisorSignature"] = decodeSignature($idNumber, "advisorSignature");
    if( isset($_POST["adNameIn"]) && preg_match($name_reg, htmlspecialchars($_POST["adNameIn"])) )
        $data["advisorPrint"] = htmlspecialchars($_POST["adNameIn"]);
    if( isset($_POST["adDateIn"]))
        $data["advisorDate"] = htmlspecialchars($_POST["adDateIn"]);

    //  Department signature section
    if (isset($_POST["depNameIn"])) {
        if( isset($_POST["departmentSignature"]))
            $data["departmentSignature"] = decodeSignature($idNumber, "departmentSignature");
        if( isset($_POST["depNameIn"]) && preg_match($name_reg, htmlspecialchars($_POST["depNameIn"])) )
            $data["departmentPrint"] = htmlspecialchars($_POST["depNameIn"]);
        if( isset($_POST["depDateIn"]))
            $data["departmentDate"] = htmlspecialchars($_POST["depDateIn"]);
    }

    //  Chair signature section
    if( isset($_POST["chairSignature"]))
        $data["chairSignature"] = decodeSignature($idNumber, "chairSignature");
    if( isset($_POST["chairNameIn"]) && preg_match($name_reg, htmlspecialchars($_POST["chairNameIn"])) )
        $data["chairPrint"] = htmlspecialchars($_POST["chairNameIn"]);
    if( isset($_POST["chairDateIn"]))
        $data["chairDate"] = htmlspecialchars($_POST["chairDateIn"]);

    return $data;
}

/**
 * Save the contents of a data map into a file.
 * @param $fileName String name of the file
 * @param $contents String contents to store.
 */
function createFile($fileName, $contents)
{
    file_put_contents("users/" . $fileName, $contents);
}

/**
 * Code based on: http://w3dproblems.dcense.com/2014/01/save-jsign-image-to-file-using-php.html
 *
 * Decode the base64 from the signature pads into a png and store it to the users folder.
 * @param $prefix   String prefix to attach to the file.
 * @param $key      String key where the imageData is stored
 * @return string   The name of the file after it was saved to the users folder.
 */
function decodeSignature($prefix, $key ){
    $savePath = '';
    if(isset($_POST[$key]))
    {
        $imageData = $_POST[$key];
        $folder = "users/";
        $savePath = $prefix . "_" . $key . ".png";
        $imageData = base64_decode($imageData);

        file_put_contents($folder . $savePath, $imageData);
    }
    return $savePath;
}

