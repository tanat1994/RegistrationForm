<?php
$myObj -> name = "hi";
$myObj -> age = 30;
$myObj -> city ="Thailand";

$myJson = json_encode($myObj);

echo $myJson;
?>