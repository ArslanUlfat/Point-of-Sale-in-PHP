<?php
date_default_timezone_set("America/New_York");
echo date("h:i:s:a"). "<br>";
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l"). "<br>";
$year=date("Y");
$month=date("m");
$day=date("d");
$day1=$day-1;
echo "year".$year ."<br>";
echo "month".$month ."<br>";
echo "day".$day1 ."<br>";
?>