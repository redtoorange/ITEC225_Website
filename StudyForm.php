<html>
<head>
    <title>
        Independent Study Form
    </title>
    <link href="styles/StudyForm.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<div id="page">
    <div id="header">
        PROPOSAL FOR UNDERGRADUATE INDEPENDENT STUDY
    </div>

    <form action="scripts/processForm.php" method="get">


    <div id="school">
        School/Department: <input class="underlinedInput" name="department" type="text" style="width: 26.25%;" placeholder="Information and Technology" required>
    </div>

    <div id="blockOne" class="block">
        <span class="gapRight25">
            Student: <input type="text" class="underlinedInput" name="student" style="width: 29.54%; margin-right: 1%" placeholder="First M. Last" required>
        </span>

        <span class="gapRight25">
            ID Number: <input type="text" class="underlinedInput" name="idNumber" style="width: 12.5%; margin-right:1.66%" placeholder="123456789" pattern="[0-9]{6,9}" required>
        </span>


        <span>
            Phone Number: <input type="text" class="underlinedInput" name="phone" style="width: 15.63%" placeholder="(123) 456-789" required>
        </span>

        <div class="superText" id="studentPrint">
            (Please Print)
        </div>
    </div>


    <div id="blockTwo" class="block">
        Student Cumulative GPA: <input type="text" class="underlinedInput" name="GPA" style="width: 14.38%; margin-right: 4.13%" placeholder="3.5" required>
        Total Credit Hours Completed: <input type="text" class="underlinedInput" name="credits" style="width: 16.88%" placeholder="3" required>
    </div>

    <div id="blockThree" class="block">
        Major and Concentration (if any): <input type="text" class="underlinedInput" name="major"
                                                 style="width: 29.38%; margin-right: 1.13%" placeholder="Computer Science" required>
        Email: <input type="email" class="underlinedInput" name="email" style="width: 28.25%" placeholder="name@email.radford.edu" required>
    </div>


    <div id="blockFour" class="italicText block">
        An Independent Study may be taken on a Pass-Fail basis or for a letter grade. &nbsp;Students may not apply more
        than six hours of credit for Independent Study toward graduation requirements.
    </div>

    <br>

    <div id="blockFive" class="block">
        The student must attach a 150-500 word typed proposal for the study/project. &nbsp;The proposal should
        thoroughly address:
        <ol id="requirements">
            <li>
                <b>Course Goals and Objectives:</b>
                <span class="normal">
                    What specific knowledge do you hope to gain or skills do you hope to learn?
                </span>
            </li>
            <li>
                <b>Content of Proposed Course:</b>
                <span class="normal">
                    What topics will be addressed? From which sources will knowledge be gained? &nbsp;Attach a copy of your preliminary reading list, if applicable.
                </span>
            </li>
            <li>
                <b>Conduct of Proposed Course:</b>
                <span class="normal">
                    How often will you meet with the supervising professor? &nbsp;What type of work will you produce? If the course includes written assignments, describe them in detail.
                </span>
            </li>
            <li>
                <b>Course Evaluation:</b>
                <span class="normal">
                    How will your performance in the course be evaluated? &nbsp;How will you and the supervising professor determine if the course goals and objectives have been met?
                </span>
            </li>
        </ol>
    </div>


    <div class="block" id="blockSix">
        Title of Independent Study: <input type="text" class="underlinedInput" style="width: 67.63%">
    </div>


    <div class="block" id="blockSeven">
        Brief Title (for Transcript):
        <input type="text" id="transcriptInput" maxlength="24">

        <div class="superText" id="transcriptPrint">
            (Please print; observe 24-character limit)
        </div>
    </div>

    <div class="block" id="blockEight">
        Subject Prefix <input type="text" class="underlinedInput" style="width: 10.63%; margin-right: 2.13%; ">
        Course Number <input type="text" class="underlinedInput" style="width: 9.5%;">
    </div>

    <div class="block" id="blockNine">
        Semester Taking Independent Study:
        Fall 20<input type="text" class="underlinedInput year" maxlength="2">
        Spring 20<input type="text" class="underlinedInput year" maxlength="2">
        Wintermester 20<input type="text" class="underlinedInput year" maxlength="2">
    </div>

    <div class="block" id="blockTen">
        Summer 20<input type="text" class="underlinedInput summerYear" maxlength="2">:
        <span id="summer">
            Maymester<input type="text" class="underlinedInput summerPeriod" maxlength="1">

            Sum I<input type="text" class="underlinedInput summerPeriod" maxlength="1">

            Sum II<input type="text" class="underlinedInput summerPeriod" maxlength="1">

            Sum III<input type="text" class="underlinedInput summerPeriod" maxlength="1">

            Augustmester<input type="text" class="underlinedInput summerPeriod" maxlength="1">

        </span>
    </div>

    <div class="block" id="blockEleven">
        Credit Hours: <input type="text" class="underlinedInput" style="width: 10.63%; margin-right: 1.5%; ">
        A-F or Pass/Fail Grade? <input type="text" class="underlinedInput" style="width: 14.63%;">
    </div>


    <div class="block" id="blockTwelve">
        By signing below, I attest that I have attached all required materials and understand the evaluation procedures
        for this Independent Study course.
    </div>

    <div class="block" id="blockThirteen">
        <input type="text" class="underlinedInput" id="studentSigIn" required>
        <input type="date" class="underlinedInput" id="studentDateIn" required>

        <div class="subText">
            <span id="studentSigSub">
                Student Signature
            </span>
            <span id="studentDateSub">
                Date
            </span>
        </div>

    </div>

    <div class="block" id="block14">
        APPROVALS:
    </div>


    <div class="block" id="block15">
        Supervising Professor:
        <input type="text" class="underlinedInput" id="prSigIn" required>
        <input type="text" class="underlinedInput" id="prNameIn" required>
        <input type="date" class="underlinedInput" id="prDateIn" required>
        <div class="subText">
            <span class="sigSub">
                Signature
            </span>
            <span class="nameSub">
                Print Name
            </span>
            <span class="dateSub">
                Date
            </span>
        </div>
    </div>


    <div class="block" id="block16">
        Student's Academic Adviser:
        <input type="text" class="underlinedInput" id="adSigIn" required>
        <input type="text" class="underlinedInput" id="adNameIn" required>
        <input type="date" class="underlinedInput" id="adDateIn" required>
        <div class="subText">
            <span class="sigSub">
                Signature
            </span>
            <span class="nameSub">
                Print Name
            </span>
            <span class="dateSub">
                Date
            </span>
        </div>
    </div>


    <div class="block" id="block17">
        Department/School Curriculum Committee Chair (if required by Department/School):

        <div style="margin-top: 2.13%">
            <input type="text" class="underlinedInput" id="depSigIn">
            <input type="text" class="underlinedInput" id="depNameIn">
            <input type="date" class="underlinedInput" id="depDateIn">
        </div>
        <div class="subText">
            <span class="sigSub">
                Signature
            </span>
            <span class="nameSub">
                Print Name
            </span>
            <span class="dateSub">
                Date
            </span>
        </div>
    </div>

    <div class="block" id="block18">
        Chair/School Director:
        <input type="text" class="underlinedInput" id="chairSigIn" required>
        <input type="text" class="underlinedInput" id="chairNameIn" required>
        <input type="date" class="underlinedInput" id="chairDateIn" required>

        <br>
        <div class="subText">
            <span class="sigSub">
                Signature
            </span>
            <span class="nameSub">
                Print Name
            </span>
            <span class="dateSub">
                Date
            </span>
        </div>
    </div>


    <div class="block" id="block19">
        This form and the typed proposal are minimal requirements. &nbsp;Departments/schools may have additional forms.
        &nbsp;Completed independent study proposal forms (including all signatures) must be submitted to the Registrar's
        Office prior to the deadline for adding courses in the term in which the study is to be undertaken. &nbsp;<b>
        Staff in the Registrar's Office will enroll the student in the Independent Study course; <i>i.e.</i>, the
        student need not take additional action to register for the course.
    </b>
    </div>

    <div class="block" id="block20">
        <span class="footerSpan">
            White&mdash;Registrar's Office
        </span>
        <span class="footerSpan">
            Yellow&mdash;Student
        </span>
        <span class="footerSpan">
            Green&mdash;Chair/School Director
        </span>
        <span class="footerSpan">
            Blue&mdash;Supervising Professor
        </span>
    </div>
        <br>
        <br>

        <div id="buttons">
            <button type="submit">Submit Form</button>
            <button type="reset">Reset Form</button>
        </div>
    </form>

</div>
</body>
</html>