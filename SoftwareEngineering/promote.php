<?php
require "dbconnect.php";

// collect form data
$uname = $_GET["Username"];
$GroupID = $_GET["GroupID"];
$sql = "SELECT GroupID FROM member WHERE Username='$uname'";
$result = queryDB($sql);  // or mysqli_query($con, $tourquery);

// REMOVE MEMBER
    // Create sql statement for inserting this data into the database
    $sql = "UPDATE member SET GroupID=1 WHERE Username='$uname'";

    // Insert data into the Database
    echo modifyDB($sql);

// ADD ADMIN
    // Create sql statement for inserting this data into the database
    $sql = "UPDATE admin SET GroupID=$GroupID WHERE Username='$uname'";

    // Insert data into the Database
    echo modifyDB($sql);

    // Gather from DB the data just entered
    $sql = "select * from admin";
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
    header("location:index.php?msg=Member Promoted");
?>