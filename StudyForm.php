<?php
/**
 * Andrew McGuiness
 * Project 3
 * 9AM Class
 * 4/23/2017
 */
?>
<html>
<head>
    <title>
        Independent Study Form
    </title>
    <link href="styles/StudyForm.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="scripts/StudyForm.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $(".date").datepicker();
        });

        var name_regex = /^[a-zA-Z]+ [-'a-zA-Z]+$/;
    </script>

</head>
<body>
<div id="page">
    <div id="header">
        PROPOSAL FOR UNDERGRADUATE INDEPENDENT STUDY
    </div>

    <form enctype="multipart/form-data" action="scripts/processForm.php" method="post" id="school_form">


        <div id="school">
            School/Department: <input class="underlinedInput" name="department" type="text" style="width: 26.25%;"
                                      id="department"
                                      placeholder="Information and Technology"
                                      onkeyup="validate( '#department', '#departmentError', /^[a-zA-Z ]+$/)"
                                      required>
        </div>

        <span id="departmentError" class="invalidInput hidden">
                Please enter a valid department.
        </span>

        <div id="blockOne" class="block">
            <span class="gapRight25">
                Student: <input type="text" class="underlinedInput" name="studentName" id="studentname"
                                onkeyup="validate( '#studentname', '#studentNameError', name_regex)"
                                style="width: 29.54%; margin-right: 1%" placeholder="First M. Last"
                                required>
            </span>
            <span id="studentNameError" class="invalidInput hidden">
                Please enter a valid name (First Last).
            </span>


            <span class="gapRight25">
            ID Number: <input type="text" class="underlinedInput" name="idNumber" id="studentID"
                              style="width: 12.5%; margin-right:1.66%" placeholder="123456789"
                              onkeyup="validate( '#studentID', '#idError', /(^\d{6,9}$)/)"
                              required>
            </span>
            <span id="idError" class="invalidInput hidden">
                Please enter a valid Student Number (6 or 9 digits).
            </span>


            <span>
            Phone Number: <input type="text" class="underlinedInput" name="phone" style="width: 15.63%" id="phonenumber"
                                 placeholder="(123) 456-789"
                                 onkeyup="validate( '#phonenumber', '#phoneError', /^(\(?)([0-9]{3})(\)?)[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)"
                                 required>
            </span>
            <span id="phoneError" class="invalidInput hidden">
                Please enter a valid Phone Number.
            </span>

            <div class="superText" id="studentPrint">
                (Please Print)
            </div>
        </div>


        <div id="blockTwo" class="block">
            Student Cumulative GPA: <input type="text" class="underlinedInput" name="GPA" id="GPA"
                                           style="width: 14.38%; margin-right: 4.13%" placeholder="3.5"
                                           onkeyup="validate( '#GPA', '#GPAerror', /[0-4][\.]+[\d]/)"
                                           required>
            <span id="GPAerror" class="invalidInput hidden">
                Please enter a valid GPA (0.0-4.0.
            </span>


            Total Credit Hours Completed: <input type="text" class="underlinedInput" name="credits" id="credits"
                                                 style="width: 16.88%" placeholder="3"
                                                 onkeyup="validate( '#credits', '#creditsError', /\d/)"
                                                 required>
            <span id="creditsError" class="invalidInput hidden">
                Please enter a valid number of credit hours (0+).
            </span>
        </div>

        <div id="blockThree" class="block">
            Major and Concentration (if any): <input type="text" class="underlinedInput" name="major" id="major"
                                                     style="width: 29.38%; margin-right: 1.13%"
                                                     placeholder="Computer Science"
                                                     onkeyup="validate( '#major', '#majorError', /^[a-zA-Z ]+$/)"
                                                     required>
            <span id="majorError" class="invalidInput hidden">
                Please enter a valid Major.
            </span>

            Email: <input type="email" class="underlinedInput" name="email" id="email" style="width: 28.25%"
                          placeholder="name@email.radford.edu"
                          onkeyup='validate( "#email", "#emailError", /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)'
                          required>
            <span id="emailError" class="invalidInput hidden">
                Please enter a valid Email Address.
            </span>

        </div>


        <div id="blockFour" class="italicText block">
            An Independent Study may be taken on a Pass-Fail basis or for a letter grade. &nbsp;Students may not apply
            more
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
            Title of Independent Study:

            <input type="text" class="underlinedInput" style="width: 67.63%" name="studyTitle" required>
        </div>


        <div class="block" id="blockSeven">
            Brief Title (for Transcript):

            <input type="text" id="transcriptInput" maxlength="24" name="transcript" required>

            <div class="superText" id="transcriptPrint">
                (Please print; observe 24-character limit)
            </div>
        </div>

        <div class="block" id="blockEight">
            Subject Prefix <input type="text" class="underlinedInput" style="width: 10.63%; margin-right: 2.13%; "
                                  id="subject" name="subject"
                                  onkeyup='validate( "#subject", "#subjectError", /^[A-Z]{4}/)' required>
            <span id="subjectError" class="invalidInput hidden">
                Please enter a Subject Prefix.  Must be 4 Capital Letters.
            </span>

            Course Number <input type="text" class="underlinedInput" style="width: 9.5%;"
                                 id="courseNumber" name="courseNumber"
                                 onkeyup='validate( "#courseNumber", "#courseNumberError", /^[0-9]{3}/)' required>
            <span id="courseNumberError" class="invalidInput hidden">
                Please enter a Course Number.  Must be 3 Numbers.
            </span>
        </div>

        <div class="block" id="blockNine">
            Semester Taking Independent Study:
            Fall 20<input type="text" class="underlinedInput year semester" name="fallSem" maxlength="2"
                        onkeyup='validate( "#fall", "#yearError", /\d/)' id="fall">
            Spring 20<input type="text" class="underlinedInput year semester" name="springSem" maxlength="2"
                        onkeyup='validate( "#spring", "#yearError", /\d/)' id="spring">
            Wintermester 20<input type="text" class="underlinedInput year semester" name="winterSem" maxlength="2"
                        onkeyup='validate( "#winter", "#yearError", /\d/)' id="winter">
<!--            <span id="yearError" class="invalidInput hidden">-->
<!--                Please enter valid number year.-->
<!--            </span>-->
        </div>

        <div class="block" id="blockTen">
            Summer 20<input type="text" class="underlinedInput summerYear semester" name="summerSem" maxlength="2">:
            <span id="summer">
                Maymester<input type="checkbox" class="underlinedInput summerPeriod checker" name="summerBlock" value="Maymester">

                Sum I<input type="checkbox" class="underlinedInput summerPeriod checker"  name="summerBlock" value="Summer I">

                Sum II<input type="checkbox" class="underlinedInput summerPeriod checker" name="summerBlock" value="Summer II">

                Sum III<input type="checkbox" class="underlinedInput summerPeriod checker" name="summerBlock" value="Summer III">

                Augustmester<input type="checkbox" class="underlinedInput summerPeriod checker" name="summerBlock" value="Auguestmester">
            </span>

        </div>


        <div class="block" id="blockEleven">
            Credit Hours: <input type="text" class="underlinedInput" id="creditHours"
                                 style="width: 10.63%; margin-right: 1.5%; "
                                 onkeyup='validate( "#creditHours", "#creditHoursError", /^[1-9]/)' required>
            <span id="creditHoursError" class="invalidInput hidden">
                Please enter valid number of course hours (1-9).
            </span>

            A-F or Pass/Fail Grade?
            <select name="passfail" class="underlinedInput" style="width: 14.63%" required>
                <option value="a-f" style="text-align-last: center">A-F</option>
                <option value="passfail">Pass/Fail</option>
            </select>
        </div>


        <div class="block" id="blockTwelve">
            By signing below, I attest that I have attached all required materials and understand the evaluation
            procedures
            for this Independent Study course.
        </div>

        <div class="block" id="blockThirteen">
            <input type="text" class="underlinedInput" id="studentSigIn"
                   onkeyup='validate( "#studentSigIn", "#studentSigInError", name_regex)' required>
            <span id="studentSigInError" class="invalidInput hidden">
                A signature is required from the Student.
            </span>

            <input type="text" class="underlinedInput date" id="studentDateIn" required>

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

<!-- Supervising Professor -->
        <div class="block" id="block15">
            Supervising Professor:
            <input type="text" class="underlinedInput" id="prSigIn"
                   onkeyup='validate( "#prSigIn", "#prSigInError", name_regex)' required>
            <span id="prSigInError" class="invalidInput hidden">
                A signature is required from the Supervising Professor.
            </span>
            <input type="text" class="underlinedInput" id="prNameIn"
                   onkeyup='validate( "#prNameIn", "#prNameInError", name_regex)' required>
            <span id="prNameInError" class="invalidInput hidden">
                A printed name is required from the Supervising Professor.
            </span>


            <input type="text" class="underlinedInput date" id="prDateIn" required>
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

<!-- Academic Adviser Area -->
        <div class="block" id="block16">
            Student's Academic Adviser:
            <input type="text" class="underlinedInput" id="adSigIn"
                   onkeyup='validate( "#adSigIn", "#adSigInError", name_regex)' required>
            <span id="adSigInError" class="invalidInput hidden">
                A signature is required from the Student.
            </span>
            <input type="text" class="underlinedInput" id="adNameIn"
                   onkeyup='validate( "#adNameIn", "#adNameInError", name_regex)' required>
            <span id="adNameInError" class="invalidInput hidden">
                A printed name is required from the Student.
            </span>


            <input type="text" class="underlinedInput date" id="adDateIn" required>
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

<!-- Department/School Curriculum Committee Chair Area -->
        <div class="block" id="block17">
            Department/School Curriculum Committee Chair (if required by Department/School):

            <div style="margin-top: 2.13%">
                <input type="text" class="underlinedInput notrequired" id="depSigIn"
                       onkeyup='validate( "#depSigIn", "#depSigInError", name_regex)'>

                <span id="depSigInError" class="invalidInput hidden">
                    A signature is required from the Department/School Curriculum Committee Chair.
                </span>

                <input type="text" class="underlinedInput notrequired" id="depNameIn"
                       onkeyup='validate( "#depNameIn", "#depNameInError", name_regex)'>

                <span id="depNameInError" class="invalidInput hidden">
                    A printed name is required from the Department/School Curriculum Committee Chair.
                </span>

                <script>
                    $(".notrequired").keyup(function () {
                            var empty = true;
                            $(".notrequired").each(function () {
                                if ($(this).val() !== "")
                                    empty = false;
                            });
                            if( empty )
                                $(".notrequired").each(function () {
                                    $(".notrequired").prop("required", false);
                                });
                            else
                                $(".notrequired").each(function () {
                                    $(".notrequired").prop("required", true);
                                });
                        }
                    );
                </script>


                <input type="text" class="underlinedInput date" id="depDateIn">

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

<!-- Chair/School Director Area -->
        <div class="block" id="block18">
            Chair/School Director:

            <input type="file" class="underlinedInput signature" id="chairSigIn" name="chairSignature" required>
            <img id="image" />

            <script>
                $(".signature").change(function () {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            // get loaded data and render thumbnail.
                            document.getElementById("image").src = e.target.result;
                        };

                        // read the image file as a data URL.
                        reader.readAsDataURL(this.files[0]);
                    }

                );
            </script>


            <input type="text" class="underlinedInput" id="chairNameIn"
                   onkeyup='validate( "#chairNameIn", "#chairNameInError", name_regex)' required>

            <span id="chairNameInError" class="invalidInput hidden">
                    A printed name is required from the Chair/School Director.
            </span>

            <input type="text" class="underlinedInput date" id="chairDateIn" required>

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
            This form and the typed proposal are minimal requirements. &nbsp;Departments/schools may have additional
            forms.
            &nbsp;Completed independent study proposal forms (including all signatures) must be submitted to the
            Registrar's
            Office prior to the deadline for adding courses in the term in which the study is to be undertaken.
            &nbsp;<b>
                Staff in the Registrar's Office will enroll the student in the Independent Study course; <i>i.e.</i>,
                the
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
            <button id="submit" type="submit">Submit Form</button>
            <button type="reset">Reset Form</button>
        </div>

        <input type="file" name="signature">
    </form>


</div>

<script>

    $(".semester").keyup(validateYears);
    $(".checker").change(validateCheckboxes);
    $(document).ready(function () {
            $(".invalidInput").hide();
            $(".hidden").removeClass(".hidden");
            $("input").attr('autocomplete', 'off');
        }
    );

</script>
</body>
</html>