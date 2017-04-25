<?php
/**
 * Andrew McGuiness
 * Project 3
 * 9AM Class
 * 4/23/2017
 */

/**
 * Class RequestForm - Designed to do the processing for all the data from the form and store it for latter use.  This
 * is nice because you can easily serialize and deserialize to JSON objects to store in a database.
 */
class RequestForm
{
    private $errors;

    // The MUST be public to allow JSON to serialize them
    public $department;
    public $studentName;
    public $idNumber;
    public $phone;
    public $GPA;
    public $credits;
    public $major;
    public $email;
    public $studyTitle;
    public $transcript;
    public $subject;
    public $courseNumber;
    public $semester;

    //Signatures
    public $chairDate;
    public $chairPrint;
    public $chairSignature;

    public $departmentDate;
    public $departmentPrint;
    public $departmentSignature;

    public $advisorDate;
    public $advisorPrint;
    public $advisorSignature;

    public $supervisorDate;
    public $supervisorPrint;
    public $supervisorSignature;

    public $studentSignature;
    public $studentSignatureDate;

    /**
     * RequestForm constructor.  Build a new Request form Object.  All fields will be stripped of any special characters.
     * @param $data array of data passed in from the Form.
     */
    public function __construct($data)
    {
        $this->setDepartment(htmlspecialchars($data["department"]));
        $this->setStudentName(htmlspecialchars($data["studentName"]));
        $this->setIdNumber(htmlspecialchars($data["idNumber"]));
        $this->setPhone(htmlspecialchars($data["phone"]));
        $this->setGPA(htmlspecialchars($data["GPA"]));
        $this->setCredits(htmlspecialchars($data["credits"]));
        $this->setMajor(htmlspecialchars($data["major"]));
        $this->setEmail(htmlspecialchars($data["email"]));
        $this->setStudyTitle(htmlspecialchars($data["studyTitle"]));
        $this->setTranscript(htmlspecialchars($data["transcript"]));
        $this->setSubject(htmlspecialchars($data["subject"]));
        $this->setCourseNumber(htmlspecialchars($data["courseNumber"]));

        $this->setSemester($data);
        $this->validateSignatures($data);
    }


    /** @return string formatted list of errors that were encountered during parsing. */
    public function getErrors()
    {
        return $this->errors;
    }

    /** @return bool were there any errors? */
    public function hasErrors()
    {
        return (sizeof($this->errors) > 0);
    }

    /**
     * Parse and store the student's department.
     * @param $department string student's department.
     */
    public function setDepartment($department)
    {
        $department_reg = '/^[a-zA-Z]+/';

        if (preg_match($department_reg, $department))
            $this->department = $department;
        else
            $this->errors .= "Department failed validation<br>";
    }

    /**
     * Parse and store the student's name.
     * @param $studentName string student's name.
     */
    public function setStudentName($studentName)
    {
        $student_reg = '/^[a-zA-Z]+ [-\'a-zA-Z]+$/';

        if (preg_match($student_reg, $studentName))
            $this->studentName = $studentName;
        else
            $this->errors .= "Name failed validation<br>";
    }

    /**
     * Parse and store the student's ID number.
     * @param $idNumber string student's ID number.
     */
    public function setIdNumber($idNumber)
    {
        $idNumber_reg = '/(^\d{6,9}$)/';

        if (preg_match($idNumber_reg, $idNumber))
            $this->idNumber = $idNumber;
        else
            $this->errors .= "ID failed validation<br>";
    }

    /**
     * Parse and store the student's phone number.
     * @param $phone string student's phone number.
     */
    public function setPhone($phone)
    {
        $phone_reg = '/^(\(?)([0-9]{3})(\)?)[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/';

        if (preg_match($phone_reg, $phone))
            $this->phone = $phone;
        else
            $this->errors .= "Phone failed validation<br>";
    }

    /**
     * Parse and store the student's GPA.
     * @param $GPA string the student's GPA
     */
    public function setGPA($GPA)
    {
        $GPA_reg = '/^([0-4]+[.]?[\d]?)$/';

        if (preg_match($GPA_reg, $GPA))
            $this->GPA = $GPA;
        else
            $this->errors .= "GPA failed validation<br>";
    }

    /**
     * Parse and store the student's credits.
     * @param $credits string the student's credits
     */
    public function setCredits($credits)
    {
        $credits_reg = '/\d/';

        if (preg_match($credits_reg, $credits))
            $this->credits = $credits;
        else
            $this->errors .= "Credits failed validation<br>";
    }

    /**
     * Parse and store the student's major.
     * @param $major string student's major
     */
    public function setMajor($major)
    {
        $major_reg = '/^[a-zA-Z]+/';

        if (preg_match($major_reg, $major))
            $this->major = $major;
        else
            $this->errors .= "Major failed validation<br>";
    }

    /**
     * Parse and store the student's email address.
     * @param $email string student's email address.
     */
    public function setEmail($email)
    {
        $email_reg = '/^(([^<>()[\]\\.,;:\s@\\"]+(\.[^<>()[\]\\ .,;:\s@\\"]+)*)|(\\" . +\\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';

        if (preg_match($email_reg, $email))
            $this->email = $email;
        else
            $this->errors .= "Email failed validation<br>";
    }

    /**@param $studyTitle string the title of the study. */
    public function setStudyTitle($studyTitle)
    {
        $this->studyTitle = $studyTitle;
    }

    /**@param $transcript string brief transcript description. */
    public function setTranscript($transcript)
    {
        $this->transcript = $transcript;
    }

    /**@param $subject string course subject to store. */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**@param $courseNumber string course number to store. */
    public function setCourseNumber($courseNumber)
    {
        $this->courseNumber = $courseNumber;
    }

    /**
     * Parse and validate whichever semester field was filled.
     * @param $data array $_POST data passed to the class
     */
    public function setSemester($data)
    {
        $semester = "";
        $year_reg = '/\d/';

        if (isset($_POST["fallSem"]) && preg_match($year_reg, $data["fallSem"])) {
            $semester = "Fall " . htmlspecialchars($data["fallSem"]);
        } else if (isset($_POST["springSem"]) && preg_match($year_reg, $data["springSem"])) {
            $semester = "Spring " . htmlspecialchars($data["springSem"]);
        } else if (isset($_POST["winterSem"]) && preg_match($year_reg, $data["winterSem"])) {
            $semester = "Winter " . htmlspecialchars($data["winterSem"]);
        } else if (isset($_POST["summerSem"]) && preg_match($year_reg, $data["summerSem"])) {
            $semester = "Summer " . htmlspecialchars($data["summerSem"]) . " " . htmlspecialchars($data["summerBlock"]);
        }

        $this->semester = $semester;
    }

    /**
     * Decode a signature from a base64 string into a png file.
     * @param $key  string used to locate the signature.
     * @param $data array $_POST data passed to the class
     * @return string the name of the file the signature is stored in.
     */
    public function decodeSignature($key, $data)
    {
        $savePath = '';
        if (isset($data[$key])) {
            $imageData = $data[$key];
            $folder = "users/";
            $savePath = $this->idNumber . "_" . $key . ".png";
            $imageData = base64_decode($imageData);

            file_put_contents($folder . $savePath, $imageData);
        }
        return $savePath;
    }

    /**
     * Parse and store all of the signatures and the signature related data.  The date, printed name, and location of the
     * signature image are all stored as strings.  The name is checked for regex.  The date is assumed valid.
     *
     * @param $data array $_POST data passed to the class
     */
    private function validateSignatures($data)
    {
        $name_reg = '/^[a-zA-Z]+ [-\'a-zA-Z]+$/';

        //  Student signature section
        if (isset($data["studentSignature"]))
            $this->studentSignature = $this->decodeSignature("studentSignature", $data);

        if (isset($data["studentDateIn"]))
            $this->studentSignatureDate = htmlspecialchars($data["studentDateIn"]);

        //  Supervisor signature section
        if (isset($data["supervisorSignature"]))
            $this->supervisorSignature = $this->decodeSignature("supervisorSignature", $data);

        if (isset($data["prNameIn"]) && preg_match($name_reg, htmlspecialchars($data["prNameIn"])))
            $this->supervisorPrint = htmlspecialchars($data["prNameIn"]);

        if (isset($data["prDateIn"]))
            $this->supervisorDate = htmlspecialchars($data["prDateIn"]);

        //  Advisor signature section
        if (isset($data["advisorSignature"]))
            $this->advisorSignature = $this->decodeSignature("advisorSignature", $data);

        if (isset($data["adNameIn"]) && preg_match($name_reg, htmlspecialchars($data["adNameIn"])))
            $this->advisorPrint = htmlspecialchars($data["adNameIn"]);

        if (isset($data["adDateIn"]))
            $this->advisorDate = htmlspecialchars($data["adDateIn"]);

        //  Department signature section
        if (isset($data["depNameIn"]) && $data["depNameIn"] != null) {
            if (isset($data["departmentSignature"]))
                $this->departmentSignature = $this->decodeSignature("departmentSignature", $data);

            if (isset($data["depNameIn"]) && preg_match($name_reg, htmlspecialchars($data["depNameIn"])))
                $this->departmentPrint = htmlspecialchars($data["depNameIn"]);

            if (isset($data["depDateIn"]))
                $this->departmentDate = htmlspecialchars($data["depDateIn"]);
        }

        //  Chair signature section
        if (isset($data["chairSignature"]))
            $this->chairSignature = $this->decodeSignature("chairSignature", $data);

        if (isset($data["chairNameIn"]) && preg_match($name_reg, htmlspecialchars($data["chairNameIn"])))
            $this->chairPrint = htmlspecialchars($data["chairNameIn"]);

        if (isset($data["chairDateIn"]))
            $this->chairDate = htmlspecialchars($data["chairDateIn"]);
    }

    /** @return String the student's ID number. */
    public function getIdNumber()
    {
        return $this->idNumber;
    }
}

?>