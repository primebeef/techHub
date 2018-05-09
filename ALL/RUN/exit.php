<?php
$enter = isset($_POST['script'])?$_POST['script']:null;
$pre = array(
    'nation' => null,
    'domain' => null,
    'list' => null,
    'state' => null,
    'data' => null,
    );
$data = array();
    $pre_domain = null;
include_once "barkist.php";
//PARSIER("//show inGrey 'My name is Makky.'//show inBlue 'I'm a cowboy, if you were wondering.'");

PARSIER($enter,$pre);

?>