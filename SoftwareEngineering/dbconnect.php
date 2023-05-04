<?php

//connection string
$servername = "localhost";
$username = "bjones";
$password = "";
$dbname = "vaultpass";
$conn;

// APIs 
function openDB() {
  global $servername, $username, $password, $dbname, $conn;

// Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error)
    return $conn->connect_error;
  else
    return "Connected";

// Alternative code using PDO object. Need similar changes to other API as well.

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return "Connected";
  } catch (PDOException $e) {
    return $e->getMessage();
  }

}

function closeDB() {
  global $conn;
  //$conn->close();
}

// API to modify DB
function modifyDB($sql) {
  global $conn;
  $message = openDB();
  if ($message == "Connected") {
    if ($conn->query($sql) === TRUE)
      $message = "Update Successful";
    else
      $message = $conn->error;
    closeDB();
  }
  return $message . "<br>";
}

// API to query DB
function queryDB($sql) { // returns an object or a string
  global $conn;
  $message = openDB();
  if ($message == "Connected") {
    $result = $conn->query($sql);
    if (gettype($result) == "object")
      $message = $result;
    else
      $message = $conn->error . "<br>Your SQL:" . $sql;
    closeDB();
  }
  return $message;
}

// API for login with prepared statement
function loginDB($sql, $Username, $Password) {
  global $conn;
  $message = openDB();
  if ($message == "Connected") {
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $Username, $Password);
    $stmt->execute();
    $result = $stmt->get_result();
    if (gettype($result) == "object")
      $message = $result;
    else
      $message = $conn->error . "<br>Your SQL:" . $sql;
    closeDB();
  }
  return $message;
}
?>