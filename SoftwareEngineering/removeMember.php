<?php
require "dbconnect.php";
// sql to delete a record
$MemberID = $_GET['MemberID'];
$sql = "DELETE FROM member WHERE MemberID=$MemberID";

// Insert data into the Database
echo modifyDB($sql);

// Return to homepage
header("location:index.php?msg=Member Removed");
?>