<?php
function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
/*
$a = "12n";
var_dump($a);
$a = (int)$a;
var_dump($a);
*/

//var_dump( validateDate( '2000-02-29 12:12:12'));

//var_dump( validateDate( '2000-01-31', 'Y-m-d'));

$a = "";
$a = 0;
$a = [];
$a = false;
$a = true;
$a = null;
$a = "0";
var_dump( empty($a));