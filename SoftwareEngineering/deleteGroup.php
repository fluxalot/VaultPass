<?php

require "dbconnect.php";


// sql to delete a record
// UPDATE TO DELETE THE CORRESPONDING GROUP

$GroupID = $_GET['GroupID'];
$sql = "DELETE FROM groups WHERE GroupID=$GroupID";

// Insert data into the Database
echo modifyDB($sql);

// Return to homepage
header("location:index.php?msg=Group Deleted");
?>