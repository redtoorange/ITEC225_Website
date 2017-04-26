<?php
/**
 * Andrew McGuiness
 * Project 3
 * 9AM Class
 * 4/23/2017
 */
//Import the form Class
require( 'RequestForm.php');

//Build a form Object from the $_POST data
$form = new RequestForm( $_POST );

//If there were errors, print them, otherwise store it all locally
if ( !$form->hasErrors() ) {
    echo "Operation complete, data stored locally.";

    //store locally
    $fileName = $form->getIdNumber() . ".JSON";

    file_put_contents("users/" . $fileName, json_encode($form, JSON_FORCE_OBJECT));
}
else {
    //output errors
    echo $form->getErrors();
}
