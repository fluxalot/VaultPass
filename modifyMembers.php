<?php
require 'DBConnect.php';
include 'header.php';
if (!(isset($_SESSION['OwnerID']))) {
    header("Location:index.php");
    exit;
} else {

}
?>