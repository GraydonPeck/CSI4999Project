<?php
include ("dbutils.php");
session_start();
session_destroy();
$goto = "Location: home.php";
header($goto);
?>