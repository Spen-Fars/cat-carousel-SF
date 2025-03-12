<?php
session_start(); /* this allows you to save data in $_SESSION */
/* https://www.w3schools.com/php/php_sessions.asp */

/* write PHP functions here */

function test() {

    $value="test";
    return $value;


}

function apiCall() {
    $data=file_get_contents("https://api.thecatapi.com/v1/breeds?api_key=APIKEY");
    $object=json_decode($data);
    var_dump($object);

    return $object;




}


?>