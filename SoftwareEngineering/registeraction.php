<?php

require "dbconnect.php";

// collect form data
$uname = $_GET["Username"];
$pswd = $_GET["Password"];
$fname = $_GET["FName"];
$lname = $_GET["LName"];

// Crete sql statement for inserting this data into the database
//$sql = "insert into register values (0, '$uname', '$pswd', '$fname', '$lname', '$addr', '$state', '$junk')";
$sql = "insert into member values (0, '" . $fname . "', '" . $lname . "', '" . "', '" . $uname . "', '" . $pswd . "')";

// Insert data into the Database
echo modifyDB($sql);


// Gather from DB the data just entered
$sql = "select * from member";
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
header("location:index.php?msg=Sign Up Success");
?>