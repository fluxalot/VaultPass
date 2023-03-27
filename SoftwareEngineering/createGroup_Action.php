<?php

require "dbconnect.php";

// collect form data
$name = $_GET["Name"];

// Crete sql statement for inserting this data into the database
//$sql = "insert into register values (0, salt, name, OwnerID)";
// CHANGE SO IT GETS ACTUAL OWNER ID AND GENERATES SALT
$sql = "insert into groups values (0, 0, '" . $name . "', 1)";

// Insert data into the Database
echo modifyDB($sql);


// Gather from DB the data just entered
$sql = "select * from groups";
$result = queryDB($sql);
if (gettype($result) == "object") {
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      foreach ($row as $cname => $cvalue)
        print "$cname: $cvalue\t";
      echo "<br>";
    }
  } else
    echo "No data found.<br>";
} else
  echo $result . "<br>";

?>