<?php
require 'DBConnect.php';
include 'header.php';
if (!(isset($_SESSION['MemberID']))) {
    header("Location:index.php");
    exit;
} else {
    $CustomerID = $_SESSION['CustomerID'];
    $sql = "select Username, Password, FName, LName from customer where MemberID = " .
            $MemberID;
    $result = queryDB($sql);
    if (gettype($result) == "object") {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $Username = $row['Username'];
            $Password = $row['Password'];
            $FName = $row['FName'];
            $LName = $row['LName'];
        }
        echo "";
    } else {
        header("Location:index.php?msg=" . $result);
        exit;
    }
}
?>
<div class="container w-75 mt-3">
    <h3>Edit your info and click on Update button</h3>

    <form name="profile" action="profileAction_member.php" class="was-validated">
        <div class="mb-3 mt-3">
            <label for="Username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="uname" placeholder="Enter username" name="Username" value="<?php echo $Username ?>" disabled>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="pswd" placeholder="Enter password" name="Password" value="<?php echo $Password ?>" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="mb-3">
            <label for="FName" class="form-label">First Name:</label>
            <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="FName" value="<?php echo $FName ?>" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="mb-3">
            <label for="LName" class="form-label">Last Name:</label>
            <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="LName" value="<?php echo $LName ?>" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <button type="submit" class="btn btn-dark">Update</button>
    </form>
</div>

</body>
</html>