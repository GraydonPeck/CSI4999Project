<?php
include ("dbutils.php");
session_start();
session_destroy();
$goto = "Location: main.php";
header($goto);
?>