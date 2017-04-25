/**
 * Andrew McGuiness
 * Project 2
 * 9AM Class
 * 3/22/2017
 */

//##################################################################
//---------------------- Regex functions ---------------------------



/**
 * !CITATION!
 * Regex templates borrowed (stolen) from:
 * https://www.sitepoint.com/jquery-basic-regex-selector-examples/
 */

/**
 * Use regex to ensure that the email address entered is valid.
 * @param email Email address entered by the user via the form.
 * @returns {boolean} False if any part of the String violates the rules; True otherwise.
 */
function regexEmail(email) {
    var emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return emailRegex.test(email);
}

/**
 * Use regex to ensure that the phone number entered is valid.
 * @param phone Phone number entered by the user via the form.
 * @returns {boolean} False if any part of the String violates the rules; True otherwise.
 */
function regexPhone(phone) {
    var phoneRegex = /^(\(?)([0-9]{3})(\)?)[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

    return (phoneRegex.test(phone));
}

/**
 * Use regex to ensure that the zipcode entered is valid.
 * @param zipcode Zipcode entered by the user via the form.
 * @returns {boolean} False if any part of the String violates the rules; True otherwise.
 */
function regexZipcode(zipcode) {
    var zipcodeRegex = /(^\d{5}$)|(^\d{5}-\d{4}$)/;
    return zipcodeRegex.test(zipcode);
}

/**
 * Use regex to ensure that the first and last name entered are valid
 * @param name The first and last name entered by the user via the form.
 * @returns {boolean} False if any part of the String violates the rules; True otherwise.
 */
function regexName(name) {
    var nameRegex = /^[a-zA-Z]+ [-'a-zA-Z]+$/;
    return nameRegex.test(name);
}
//---------------------------- End Regex functions -----------------
//##################################################################


/**
 * Scan a validated phone number for the first three digits
 * @param phone the validated phone number
 * @returns {number} the first three digits
 */
function getAreaCode(phone) {
    return /[0-9]{3}/.exec(phone)[0]
}

/**
 * If an invalid input it entered, then the form is reset
 */
function resetForm() {
    document.getElementById("form").reset();
}

/**
 * Update the theme any time the theme drop down is changed
 */
function updateTheme() {
    //check which theme to use
    if ($("#theme").val() == "dark") {
        //toggle off the old theme
        if ($("#output").hasClass("light"))
            $("#output").removeClass("light");

        //toggle on the new theme
        if (!$("#output").hasClass("dark"))
            $("#output").addClass("dark");
    }

    //check which theme to use
    else if ($("#theme").val() == "light") {
        //toggle off the old theme
        if ($("#output").hasClass("dark"))
            $("#output").removeClass("dark");

        //toggle on the new theme
        if (!$("#output").hasClass("light"))
            $("#output").addClass("light");
    }

}

//global to help with the callback from the geocoding
var inputValid = true;

/**
 *  Build an object out of the form input, then validate each field.  If all fields are good, then the output is processed
 *  into a string and output, otherwise, the output is hidden and cleared.
 */
function validate() {

    //build the person object from the form
    var person = {
        name: $("#name").val(),
        firstName: "invalid",
        lastName: "invalid",
        phoneNumber: $("#phone").val(),
        areaCode: "invalid",
        digitCount: "invalid",
        emailAddress: $("#email").val(),
        username: "invalid",
        domain: "invalid",
        zipcode: $("#zipcode").val(),
        zipcount: "invalid"
    };

    //validate all of the fields
    inputValid = validName(person) && validEmail(person) && validEmail(person) && validPhoneNumber(person) && validZipcode(person);

    if (inputValid) {   //all fields are good
        $("#output").html(buildOutput(person)); //build the string and print it
        updateTheme();
    }
    else {  //something failed, user will get feedback and the output is cleared/hidden
        $("#output").hide();
        $("#output").html("");
    }
}


/**
 * Validate the input name, then populate the person object
 * @param person The person object from the input.
 * @returns {boolean} True if the person is valid, False if not
 */
function validName(person) {
    var valid = regexName(person.name);

    if (valid) {
        var name = person.name;
        var nameList = name.split(" ");

        person.firstName = nameList[0];
        person.lastName = nameList[nameList.length - 1];
    }

    return valid;
}

/**
 * Validate the input email address, then populate the person object
 * @param person The person object from the input.
 * @returns {boolean} True if the person is valid, False if not
 */
function validEmail(person) {
    var valid = regexEmail(person.emailAddress);

    if (valid) {
        var email = person.emailAddress;
        var emailList = email.split("@");

        person.username = emailList[0];
        person.domain = emailList[1];
    }

    return valid;
}

/**
 * Validate the input phone number, then populate the person object
 * @param person The person object from the input.
 * @returns {boolean} True if the person is valid, False if not
 */
function validPhoneNumber(person) {
    var valid = regexPhone(person.phoneNumber);

    if (valid) {
        valid = countOnlyDigits(person.phoneNumber) == 10;
    }


    if (valid) {
        person.areaCode = getAreaCode(person.phoneNumber);
        person.digitCount = 10;
    }

    return valid;
}

/**
 * Validate the input zip code, then populate the person object
 * @param person The person object from the input.
 * @returns {boolean} True if the person is valid, False if not
 */
function validZipcode(person) {
    var valid = regexZipcode(person.zipcode);

    if (valid) {
        person.zipcount = person.zipcode.length;
        getCityState(person.zipcode);
    }

    return valid;
}

/**
 * Build the output strong according to spec
 * @param person The fully validated person object.
 * @returns {string} The constructed string.
 */
function buildOutput(person) {
    /*
     First name: John
     Last name: Derp
     Area code: 123
     Digit Count: 10
     Username: jderp
     Domain: derpindustries.com
     Zip Count: 5
     EXTRA CREDIT VALIDATION
     City: Radford
     County: Montgomery
     State: VA
     */
    return outputString =
        "First name: " + person.firstName + "<br/>" +
        "Last name: " + person.lastName + "<br/>" +
        "Area code: " + person.areaCode + "<br/>" +
        "Digit Count: " + person.digitCount + "<br/>" +
        "Username: " + person.username + "<br/>" +
        "Domain: " + person.domain + "<br/>" +
        " Zip Count: " + person.zipcount + "<br/>"
        ;
}

/**
 * Scan a phone nunmber for digits, it ignores anything that is not a digit.
 * @param phone validated phone number to scan for digits.
 * @returns {number} the number of digits in the phone number.
 */
function countOnlyDigits(phone) {
    var total = 0;
    var pattern = /[0-9]/;

    for( var i = 0; i < phone.length; i++){
        var c = phone[i];
        if( pattern.test( c ) )
            total++;
    }

    return total;
}


/**
 * Get the city and state from the zipcode, then append it to the output section.
 * @param zipcode {number} A validated zipcode to look for.
 *
 * !CITATION!
 * Code modified from original:
 * http://nobleintentstudio.com/blog/zip-code-to-city-state-lookup/
 */
function getCityState(zipcode) {
    //local temp variables
    var city = '';
    var state = '';

    //make a request to the google geocode api
    $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address=' + zipcode).then(function (response) {
        //find the city and state
        var address_components = response.results[0].address_components;
        $.each(address_components, function (index, component) {
            var types = component.types;
            $.each(types, function (index, type) {
                if (type == 'locality') {
                    city = component.long_name;
                }
                if (type == 'administrative_area_level_1') {
                    state = component.short_name;
                }
            });
        });

        if (inputValid) {
            //append to the output section after the callback
            $("#output").append("City: " + city + "<br/>");
            $("#output").append("State: " + state + "<br/>");

            $("#output").show();
        }
    });
}

/**
 * Hide the output section as soon as the document is loaded
 */
$("document").ready(function () {
    $("#output").hide();
})