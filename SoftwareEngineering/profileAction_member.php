<?php

require "DBConnect.php";
session_start();
$MemberID = $_SESSION['MemberID'];
// collect form data
$pswd = $_GET["Password"];
$fname = $_GET["FName"];
$lname = $_GET["LName"];

$sql = "update member set Password = '" . $pswd . "', FName ='" .
        $fname . "', LName = '" . $lname . "' where MemberID = " . $MemberID;
echo modifyDB($sql) . "<br>Use back button to return";
header("location:index.php?msg=Profile Edit Success");
?>
