<?php
session_start();
$errorInfo = null;
if(isset($_SESSION["error"])) $errorInfo = "<p>".$_SESSION["error"]."</p>";

include("../Views/error.php");
?>