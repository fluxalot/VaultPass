<?php

require "dbconnect.php";

$Username = $_GET["Username"];
$Password = $_GET["Password"];

$sql = "select OwnerID, FName, LName from owner where Username = ? and Password = ?";
$result = loginDB($sql, $Username, $Password);
if (gettype($result) == "object") {
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $OwnerID = $row['OwnerID'];
    $FName = $row['FName'];
    $LName = $row['LName'];
    session_start();
    $_SESSION['OwnerID'] = $OwnerID;
    $_SESSION['name'] = $FName . " " . $LName;
    header("location:index.php?msg=Login Success");
    exit;
  } else
    header("location:index.php?msg=Login Failed");
} else
  header("location:index.php?msg=". $result);
?>