<?php

include_once('DeprecateProperties.php');

function writeAndReadProperties($object) {
    $object->db = true;
    $object->user = true;
    $object->payment = true;
    $object->login = true;
    $object->checkout = true;
    $object->lists = true;
    $object->models = true;

    for ($i = 0; $i < 100; $i++) {
        $dummy = null;
        $dummy = $object->db;
        $dummy = $object->user;
        $dummy = $object->payment;
        $dummy = $object->login;
        $dummy = $object->checkout;
        $dummy = $object->lists;
        $dummy = $object->models;
    }
}

$directObject = new stdClass();
$magicObject = new DeprecateProperties();

$proceedWithStdClass = function() use ($directObject) { writeAndReadProperties($directObject); };
$proceedWithSupportDeprecatedPropsClass = function() use ($magicObject) { writeAndReadProperties($magicObject); };

for ($i = 0; $i < 100; $i++) {
    $proceedWithStdClass();
    $proceedWithSupportDeprecatedPropsClass();
}
