/**
 * Andrew McGuiness
 * Project 3
 * 9AM Class
 * 4/23/2017
 */

var name_regex = /^[a-zA-Z]+ [-'a-zA-Z]+$/;
var department_regex = /^[a-zA-Z ]+$/;
var phone_regex = /^(\(?)([0-9]{3})(\)?)[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
var email_regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

function validate(source, error, pattern ){
    if( $(source).val() === "" ){
        $(source).addClass("valid").removeClass("invalid");
        $(error).hide();
    }
    else if (!(pattern.test($(source).val()))) {
        $(source).addClass("invalid").removeClass("valid");


        if( !$(error).is(':visible')){
            $(error).show();

            var width = $(source).outerWidth(true);
            var height = $(source).outerHeight(true);
            var left = $(source).position().left + ( (width - $(error).outerWidth(true)) / 2);
            var bottom = $(source).position().top + height;

            $(error).css("left", left);
            $(error).css("top", bottom);
        }
    }
    else {
        $(source).addClass("valid").removeClass("invalid");
        $(error).hide();
    }
}

function validateToOther(source, error, pattern, attached ){
    if( $(source).val() === "" ){
        $(source).addClass("valid").removeClass("invalid");
        $(error).hide();
    }
    else if (!(pattern.test($(source).val()))) {
        $(source).addClass("invalid").removeClass("valid");


        if( !$(error).is(':visible')){
            $(error).show();

            var width = $(attached).outerWidth(true);
            var height = $(attached).innerHeight(true);
            var left = $(attached).position().left + ( (width - $(error).outerWidth(true)) / 2);
            var bottom = $(attached).position().top + (height/2);

            $(error).css("left", left);
            $(error).css("top", bottom);
        }
    }
    else {
        $(source).addClass("valid").removeClass("invalid");
        $(error).hide();
    }
}



function allEmpty() {
    var empty = true;
    $(".semester").each(function () {
        if( $(this).val() !== "")
            empty = false;
    });
    return empty;
}

function lockEmpty(){
    $(".semester").each(function () {
        if( $(this).val() === ""){
            $(this).prop('disabled', true);
        }
    });
}


function unlockAll(){
    $(".semester").each(function () {
        $(this).prop('disabled', false);
    });
}

function noneChecked(){
    var empty = true;
    $(".checker").each(function () {
        if( $(this).prop("checked") === true )
            empty = false;
    });
    return empty;
}

function unlockCheckboxes(){
    $(".checker").each(function () {
        $(this).prop('disabled', false);
    });
}

function lockEmptyChecks(){
    $(".checker").each(function () {
            if( $(this).prop("checked") === false )
                $(this).prop("disabled", true);
        }
    );
}

function validateCheckboxes() {
    if (noneChecked()) {
        unlockCheckboxes();
        $(".summerYear").prop("required", false);
        if (allEmpty())
            unlockAll();
    }
    else {
        lockEmpty();
        $(".summerYear").prop("disabled", false);
        $(".summerYear").prop("required", true);
        lockEmptyChecks();
    }
}

function validateYears() {
    if (allEmpty() && noneChecked() ){
        unlockAll();
        unlockCheckboxes();
    }
    else if( allEmpty( ) && !noneChecked() ) {
        lockEmpty();
        $(".summerYear").prop("disabled", false);
    }
    else{
        lockEmpty();
        if (!$(this).hasClass("summerYear"))
            lockEmptyChecks();
    }

}