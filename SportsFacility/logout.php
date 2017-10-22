<?php
include ("dbutils.php");
session_start();
session_destroy();
$goto = "Location: index.php";
header($goto);
?>