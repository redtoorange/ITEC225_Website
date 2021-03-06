<!--
 * Andrew McGuiness
 * Project 3
 * 9AM Class
 * 4/23/2017
-->
<html lang="en">
<head>
    <title>
        Independent Study Form
    </title>
    
    
    <!-- Used by the jQuery UI date picker-->
    <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <!-- Core jQuery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
    <!-- jQuery UI -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <!-- jSignature Canvases-->
    <script type="text/javascript" src="scripts/libs/flashcanvas.js"></script>
    <script type="text/javascript" src="scripts/libs/jSignature.min.js"></script>
    
    
    <link rel="stylesheet" type="text/css" href="styles/StudyForm.css">
    <script type="text/javascript" src="scripts/StudyForm.js"></script>
</head>

<body>
<div id="page">
    <div id="header">
        PROPOSAL FOR UNDERGRADUATE INDEPENDENT STUDY
    </div>
    
    <form enctype="multipart/form-data" action="scripts/ProcessForm.php" method="post" id="school_form">
        <div id="school">
            School/Department: <input class="underlinedInput" name="department" id="department" type="text"
                                      placeholder="Information and Technology"
                                      onkeyup="validate( '#department', '#departmentError', department_regex)" required>
        </div>
        
        <span id="departmentError" class="invalidInput hidden">
            Please enter a valid department.
        </span>
        
        <div id="blockOne" class="block">
            <span>
                Student:
                <input type="text" class="underlinedInput" name="studentName" id="studentname"
                       placeholder="First Last" onkeyup="validate( '#studentname', '#studentNameError', name_regex)"
                       required>
            </span>
            
            <span id="studentNameError" class="invalidInput hidden">
                Please enter a valid name (First Last).
            </span>
            
            
            <span>
                ID Number:
                <input type="text" class="underlinedInput" name="idNumber" id="studentID"
                       placeholder="123456789" onkeyup="validate( '#studentID', '#idError', /(^\d{6,9}$)/)"
                       required>
            </span>
            
            <span id="idError" class="invalidInput hidden">
                Please enter a valid Student Number (6 or 9 digits).
            </span>
            
            
            <span>
                Phone Number:
                <input type="text" class="underlinedInput" name="phone" id="phonenumber"
                       placeholder="(123) 456-789" onkeyup="validate( '#phonenumber', '#phoneError', phone_regex)"
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
            Student Cumulative GPA:
            
            <input type="text" class="underlinedInput" name="GPA" id="GPA"
                   placeholder="3.5" onkeyup="validate( '#GPA', '#GPAerror', /^([0-4]+[.]?[\d]?)$/)" required>
            
            <span id="GPAerror" class="invalidInput hidden">
                Please enter a valid GPA (0.0-4.0.
            </span>
            
            
            Total Credit Hours Completed:
            
            <input type="text" class="underlinedInput" name="credits" id="credits"
                   placeholder="60" onkeyup="validate( '#credits', '#creditsError', /^[\d]*$/)" required>
            
            <span id="creditsError" class="invalidInput hidden">
                Please enter a valid number of credit hours (0+).
            </span>
        </div>
        
        <div id="blockThree" class="block">
            Major and Concentration (if any):
            
            <input type="text" class="underlinedInput" name="major" id="major"
                   placeholder="Computer Science" onkeyup="validate( '#major', '#majorError', /^[a-zA-Z ]+$/)" required>
            
            <span id="majorError" class="invalidInput hidden">
                Please enter a valid Major.
            </span>
            
            Email:
            
            <input type="email" class="underlinedInput" name="email" id="email"
                   placeholder="name@email.radford.edu" onkeyup='validate( "#email", "#emailError", email_regex)'
                   required>
            
            <span id="emailError" class="invalidInput hidden">
                Please enter a valid Email Address.
            </span>
        </div>
        
        
        <div id="blockFour" class="italicText block">
            An Independent Study may be taken on a Pass-Fail basis or for a letter grade. &nbsp;Students may not apply
            more than six hours of credit for Independent Study toward graduation requirements.
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
                        What topics will be addressed? From which sources will knowledge be gained? &nbsp;Attach a
                        copy of your preliminary reading list, if applicable.
                    </span>
                </li>
                <li>
                    <b>Conduct of Proposed Course:</b>
                    
                    <span class="normal">
                        How often will you meet with the supervising professor? &nbsp;What type of work will you
                        produce? If the course includes written assignments, describe them in detail.
                    </span>
                </li>
                <li>
                    <b>Course Evaluation:</b>
                    
                    <span class="normal">
                        How will your performance in the course be evaluated? &nbsp;How will you and the supervising
                        professor determine if the course goals and objectives have been met?
                    </span>
                </li>
            </ol>
        </div>
        
        
        <div class="block" id="blockSix">
            Title of Independent Study:
            
            <input type="text" class="underlinedInput" name="studyTitle" id="studyTitle" required>
        </div>
        
        
        <div class="block" id="blockSeven">
            Brief Title (for Transcript):
            
            <input type="text" id="transcriptInput" maxlength="24" name="transcript" required>
            
            
            <div class="superText" id="transcriptPrint">
                (Please print; observe 24-character limit)
            </div>
        </div>
        
        <div class="block" id="blockEight">
            Subject Prefix
            
            <input type="text" class="underlinedInput" id="subject" name="subject"
                   onkeyup='validate( "#subject", "#subjectError", /^[A-Z]{4}$/)' required>
            
            <span id="subjectError" class="invalidInput hidden">
                Please enter a Subject Prefix.  Must be 4 Capital Letters.
            </span>
            
            Course Number
            
            <input type="text" class="underlinedInput" id="courseNumber" name="courseNumber"
                   onkeyup='validate( "#courseNumber", "#courseNumberError", /^[0-9]{3}$/)' required>
            
            <span id="courseNumberError" class="invalidInput hidden">
                Please enter a Course Number.  Must be 3 Numbers.
            </span>
        </div>
        
        <div class="block" id="blockNine">
            Semester Taking Independent Study:
            
            Fall 20 <input type="text" class="underlinedInput year semester" name="fallSem" maxlength="2"
                           onkeyup='validate( "#fall", "#yearError", /^[\d]{2}$/)' id="fall">
            
            Spring 20 <input type="text" class="underlinedInput year semester" name="springSem" maxlength="2"
                             onkeyup='validate( "#spring", "#yearError", /^[\d]{2}$/)' id="spring">
            
            Wintermester 20 <input type="text" class="underlinedInput year semester" name="winterSem" maxlength="2"
                                   onkeyup='validate( "#winter", "#yearError", /^[\d]{2}$/)' id="winter">
        </div>
        
        <span id="yearError" class="invalidInput hidden">
            Please enter valid number year.
        </span>
        
        <!-- A special section just for the summer semester -->
        <div class="block" id="blockTen">
            Summer 20 <input type="text" class="underlinedInput summerYear semester" name="summerSem" maxlength="2"
                             onkeyup='validateToOther( "#summerInput", "#summerError", /^[\d]{2}$/, "#blockTen")'
                             id="summerInput"> :
            
            <span id="summer">
                Maymester
                <input type="checkbox" class="underlinedInput summerPeriod checker"
                       name="summerBlock" value="Maymester">

                Sum I
                <input type="checkbox" class="underlinedInput summerPeriod checker"
                       name="summerBlock" value="Summer I">

                Sum II
                <input type="checkbox" class="underlinedInput summerPeriod checker"
                       name="summerBlock" value="Summer II">

                Sum III
                <input type="checkbox" class="underlinedInput summerPeriod checker"
                       name="summerBlock" value="Summer III">

                Augustmester
                <input type="checkbox" class="underlinedInput summerPeriod checker"
                       name="summerBlock" value="Auguestmester">
            </span>
        </div>
        
        <span id="summerError" class="invalidInput hidden">
            Please enter valid number year.
        </span>
        
        
        <div class="block" id="blockEleven">
            Credit Hours:
            
            <input type="text" class="underlinedInput" id="creditHours"
                   onkeyup='validate( "#creditHours", "#creditHoursError", /^[1-9]$/)' required>
            
            <span id="creditHoursError" class="invalidInput hidden">
                Please enter valid number of course hours (1-9).
            </span>
            
            A-F or Pass/Fail Grade?
            
            <select name="passfail" class="underlinedInput" id="passfail" size="1" required>
                <option value="a-f">A-F</option>
                <option value="passfail">Pass/Fail</option>
            </select>
        </div>
        
        
        <div class="block" id="blockTwelve">
            By signing below, I attest that I have attached all required materials and understand the evaluation
            procedures for this Independent Study course.
        </div>
        
        <div class="block" id="blockThirteen">
            
            <!-- Code based on: http://w3dproblems.dcense.com/2014/01/save-jsign-image-to-file-using-php.html -->
            <div id="studentSigIn" class="underlinedInput signatureDiv"></div>
            <input type="hidden" id="studentSignature" name="studentSignature"/>
            
            <input type="text" class="underlinedInput date" id="studentDateIn" name="studentDateIn" required>
            
            <div class="subText">
                <span id="studentSigSub">
                    Student Signature
                </span> <span id="studentDateSub">
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
            
            <div id="prSigIn" class="underlinedInput signatureDiv"></div>
            <input type="hidden" id="supervisorSignature" name="supervisorSignature"/>
            
            <input type="text" class="underlinedInput" id="prNameIn" name="prNameIn"
                   onkeyup='validate( "#prNameIn", "#prNameInError", name_regex)' required>
            
            <span id="prNameInError" class="invalidInput hidden">
                A printed name is required from the Supervising Professor.
            </span>
            
            <input type="text" class="underlinedInput date" id="prDateIn" name="prDateIn" required>
            
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
            
            <div id="adSigIn" class="underlinedInput signatureDiv"></div>
            <input type="hidden" id="advisorSignature" name="advisorSignature"/>
            
            <input type="text" class="underlinedInput" id="adNameIn" name="adNameIn"
                   onkeyup='validate( "#adNameIn", "#adNameInError", name_regex)' required>
            
            <span id="adNameInError" class="invalidInput hidden">
                A printed name is required from the Student.
            </span>
            
            <input type="text" class="underlinedInput date" id="adDateIn" name="adDateIn" required>
            
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
            
            <div style="margin-top: 1%">
                
                <div id="depSigIn" class="underlinedInput signatureDiv notrequired"></div>
                <input type="hidden" id="departmentSignature" name="departmentSignature"/>
                
                <span id="depSigInError" class="invalidInput hidden">
                    A signature is required from the Department/School Curriculum Committee Chair.
                </span>
                
                <input type="text" class="underlinedInput notrequired" id="depNameIn" name="depNameIn"
                       onkeyup='validate( "#depNameIn", "#depNameInError", name_regex)'>
                
                <span id="depNameInError" class="invalidInput hidden">
                    A printed name is required from the Department/School Curriculum Committee Chair.
                </span>
                
                
                <input type="text" class="underlinedInput date notrequired" id="depDateIn" name="depDateIn">
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
            
            <div id="chairSigIn" class="underlinedInput signatureDiv"></div>
            <input type="hidden" id="chairSignature" name="chairSignature"/>
            
            <input type="text" class="underlinedInput" id="chairNameIn" name="chairNameIn"
                   onkeyup='validate( "#chairNameIn", "#chairNameInError", name_regex)' required>
            
            <span id="chairNameInError" class="invalidInput hidden">
                A printed name is required from the Chair/School Director.
            </span>
            
            <input type="text" class="underlinedInput date" id="chairDateIn" name="chairDateIn" required>
            
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
            forms. &nbsp;Completed independent study proposal forms (including all signatures) must be submitted to the
            Registrar's Office prior to the deadline for adding courses in the term in which the study is to be
            undertaken. &nbsp;<b>Staff in the Registrar's Office will enroll the student in the Independent Study
                                 course; <i>i.e.</i>, the student need not take additional action to register for the
                                 course.</b>
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
        
        <br> <br>
        
        <div id="buttons">
            <button type="submit" id="btn_submit">Submit Form</button>
            <button type="reset">Reset Form</button>
            <button type="button" id="resetSigs">Reset Signatures</button>
        </div>
    
    
    </form>
</div>

<script type="text/javascript">
    //Reset the signature pads
    $("#resetSigs").click(function () {
        $(".signatureDiv").each(function () {
            $(this).jSignature("reset");
        });
    });

    //Toggle the department fields required or not, depending on if any of the are filled.
    $(".notrequired").change(function () {
            var empty = true;
            console.log("changed required ");

            $(".notrequired").each(function () {
                //Check the signature pad to see if it's empty
                if ($(this).hasClass("signatureDiv")) {
                    if ($(this).jSignature('getData', 'native').length !== 0)
                        empty = false;
                }
                //Check everything else
                else {
                    if ($(this).val() !== "")
                        empty = false;
                }
            });

            //Add the required property to everything if ant are filled, remove it if none are filled
            if (empty)
                $(".notrequired").each(function () {
                    $(".notrequired").prop("required", false);
                });
            else
                $(".notrequired").each(function () {
                    $(".notrequired").prop("required", true);
                });
        }
    );

    //Code based on: http://w3dproblems.dcense.com/2014/01/save-jsign-image-to-file-using-php.html
    //initialize the signature pads and bind an action to the submit button
    $(function () {
        'use strict';

        //Initialize the pads based on the dimensions of the div they are contained in.
        $(".signatureDiv").each(function () {
            $(this).jSignature({
                'background-color': 'transparent',
                'decor-color': 'transparent',
                'height': '3%',
                'width': '100%'
            });
        });

        //When submit is clicked, the data from each signature pad is bound to it's matching hidden input
        $('#btn_submit').on("click", function (e) {
            var valid = true;

            if( allYearsEmpty() ){
                alert("A semester is required");
                e.preventDefault();
                return;
            }


            //See if all of the signature pads are filled.
            $(".signatureDiv").each(function () {
                //Special attention for the department pad.
                if ($(this).hasClass("notrequired")) {
                    if ($(this).jSignature('getData', 'native').length === 0 && $("#depNameIn").prop("required") === true)
                        valid = false;
                }
                //Handle the rest of the pads.
                else {
                    if ($(this).jSignature('getData', 'native').length === 0)
                        valid = false;
                }
            });

            if (!valid) {
                //The signatures are not finished, prevent the submit from firing.
                alert("Signatures are required");
                e.preventDefault();
            }
            else {
                //The signatures are good, bind the information and try to submit
                $('#studentSignature').val($('#studentSigIn').jSignature("getData", "image")[1]);
                $('#supervisorSignature').val($('#prSigIn').jSignature("getData", "image")[1]);
                $('#advisorSignature').val($('#adSigIn').jSignature("getData", "image")[1]);
                $('#departmentSignature').val($('#depSigIn').jSignature("getData", "image")[1]);
                $("#chairSignature").val($('#chairSigIn').jSignature("getData", "image")[1]);

                if (document.forms[0].validity) {
                    document.forms[0].submit();
                }
            }
        });
    });


    //Bind validateYears to the semester year text inputs
    $(".semester").keyup(validateYears);

    //Bind validateCheckers to the summer semester checkboxes.
    $(".checker").change(validateCheckers);

    //Hide all of the invalid input panels before the page loads.
    $(document).ready(function () {
            $(".invalidInput").hide();
            $(".hidden").removeClass(".hidden");
            $("input").attr('autocomplete', 'off');
        }
    );

    //Convert all date class inputs into a jQuery UI date picker.
    $(function () {
        $(".date").datepicker();
    });
</script>
</body>
</html>