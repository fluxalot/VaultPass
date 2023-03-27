<?php

require "dbconnect.php";


// sql to delete a record
// UPDATE TO DELETE THE CORRESPONDING GROUP
$sql = "DELETE FROM groups WHERE GroupID=9";

// Insert data into the Database
echo modifyDB($sql);
?>