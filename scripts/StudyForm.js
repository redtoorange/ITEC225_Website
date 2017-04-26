/**
 * Andrew McGuiness
 * Project 3
 * 9AM Class
 * 4/23/2017
 */

//All of the regex things that are long...
var name_regex = /^[a-zA-Z]+ [-'a-zA-Z]+$/;
var department_regex = /^[a-zA-Z ]+$/;
var phone_regex = /^(\(?)([0-9]{3})(\)?)[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
var email_regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

/**
 * Validate an input field, if it fails, display an error message contained in a span, if
 * it passes, hide the error message.  The error is positioned under the source element.
 *
 * @param source    The input that has failed to validate.
 * @param error     The Span that should be moved.
 * @param pattern   The regex to use.
 */
function validate(source, error, pattern) {
    //if the source is empty, hide the error
    if ($(source).val() === "") {
        $(source).addClass("valid").removeClass("invalid");
        $(error).hide();
    }
    //if the source fails the pattern, show the error
    else if (!(pattern.test($(source).val()))) {
        $(source).addClass("invalid").removeClass("valid");

        //only do the calculations if the error is currently hidden
        if (!$(error).is(':visible')) {
            $(error).show();

            var width = $(source).outerWidth(true);
            var height = $(source).outerHeight(true);
            var left = $(source).position().left + ( (width - $(error).outerWidth(true)) / 2);
            var bottom = $(source).position().top + height;

            $(error).css("left", left);
            $(error).css("top", bottom);
        }
    }
    //if the source passes the pattern, hide the error
    else {
        $(source).addClass("valid").removeClass("invalid");
        $(error).hide();
    }
}

/**
 * Validate an input field, if it fails, display an error message contained in a span, if
 * it passes, hide the error message.  The error message is positioned under the attached element.
 *
 * @param source    The input that has failed to validate.
 * @param error     The Span that should be moved.
 * @param pattern   The regex to use.
 * @param attached  The other element to position the error at.
 */
function validateToOther(source, error, pattern, attached) {
    //if the source is empty, hide the error
    if ($(source).val() === "") {
        $(source).addClass("valid").removeClass("invalid");
        $(error).hide();
    }
    //if the source fails the pattern, show the error
    else if (!(pattern.test($(source).val()))) {
        $(source).addClass("invalid").removeClass("valid");

        //only do the calculations if the error is currently hidden
        if (!$(error).is(':visible')) {
            $(error).show();

            var width = $(attached).outerWidth(true);
            var height = $(attached).innerHeight(true);
            var left = $(attached).position().left + ( (width - $(error).outerWidth(true)) / 2);
            var bottom = $(attached).position().top + (height / 2);

            $(error).css("left", left);
            $(error).css("top", bottom);
        }
    }
    //if the source passes the pattern, hide the error
    else {
        $(source).addClass("valid").removeClass("invalid");
        $(error).hide();
    }
}

/** @returns {boolean} Are all the year text boxes empty? */
function allYearsEmpty() {
    var empty = true;
    $(".semester").each(function () {
        if ($(this).val() !== "")
            empty = false;
    });
    return empty;
}

/** Lock all the empty year text boxes. */
function lockEmptyYears() {
    $(".semester").each(function () {
        if ($(this).val() === "") {
            $(this).prop('disabled', true);
        }
    });
}

/** Unlock all the year text boxes. */
function unlockAllYears() {
    $(".semester").each(function () {
        $(this).prop('disabled', false);
    });
}

/** @returns {boolean} Are all of the checkboxes empty? */
function allCheckersEmpty() {
    var empty = true;
    $(".checker").each(function () {
        if ($(this).prop("checked") === true)
            empty = false;
    });
    return empty;
}

/**  Unlock all the empty checkboxes. */
function unlockAllCheckers() {
    $(".checker").each(function () {
        $(this).prop('disabled', false);
    });
}

/** Lock all the empty checkboxes. */
function lockEmptyCheckers() {
    $(".checker").each(function () {
            if ($(this).prop("checked") === false)
                $(this).prop("disabled", true);
        }
    );
}

/**
 *  Process the summer semester check boxes, locking and unlocking them as necessary.  If any
 *  are checked, all the year boxes are locked except the summer year box.
 */
function validateCheckers() {
    //unlock the checkers and years unless the summer year is filled.
    if (allCheckersEmpty()) {
        unlockAllCheckers();
        $(".summerYear").prop("required", false);
        if (allYearsEmpty())
            unlockAllYears();
    }
    // lock everything but the summer year.
    else {
        lockEmptyYears();
        $(".summerYear").prop("disabled", false);
        $(".summerYear").prop("required", true);
        lockEmptyCheckers();
    }
}

/**
 *  Process all of the year fields for the semester, locking and unlocking them as necessary.  If any
 *  have text other than the summer year, the checkers will also be locked.
 */
function validateYears() {
    //unlock everything, checkers and years
    if (allYearsEmpty() && allCheckersEmpty()) {
        unlockAllYears();
        unlockAllCheckers();
    }
    //unlock only the summer year
    else if (allYearsEmpty() && !allCheckersEmpty()) {
        lockEmptyYears();
        $(".summerYear").prop("disabled", false);
    }
    //lock everything, including the checkers
    else {
        lockEmptyYears();
        if (!$(this).hasClass("summerYear"))
            lockEmptyCheckers();
    }
}