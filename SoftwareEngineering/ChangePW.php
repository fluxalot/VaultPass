<?php include 'header.php'; ?>
<?php
require_once('dbconnect.php');
?>


<!DOCTYPE html>
<html>
<head>

<title>Change Your Account Password| PHP</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
<div>
<?php
error_reporting(0);

if(isset($_POST['create'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
	$result = null;
    $confirm_password = $_POST['confirm_password'];
	if ($password === $confirm_password) {
    if(empty($fname) || empty($lname) || empty($email) || empty($password) || empty($confirm_password)){
        echo 'Insufficient Data';
    } elseif ($password !== $confirm_password) {
        echo 'Passwords do not match';
    } else {
        $hostname = 'localhost';
        $dbname = 'vaultpass';
        $username = 'your_username'; // Update with your actual username
        $password = 'your_password'; // Update with your actual password

        try {
            $db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT COUNT(*) as count FROM member WHERE email = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if($result['count'] > 0){
                echo 'This email address has already been registered';
            } else {
                $sql = "UPDATE member SET Password = ? WHERE email = ?";
                $stmtupdate = $db->prepare($sql);
                $result = $stmtupdate->execute([$password, $email]);
                if($result){
                    echo 'Success! Password has been updated.';
                } else {
                    echo 'Error updating password';
                }
            }
        } catch(PDOException $e) {
            echo 'Error connecting to the database: ' . $e->getMessage();
        }
    }
	}
}
?>


</div>
<form action="ChangePW.php" method="post">
    <div class="container">
      <div class="row">
	  <div class="mb-3 mt-3">
            <label for="email"><b>Verify your email adress</b></label>
            <input type="email" name="email" id="email" required class="form-control">
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
		   <div class="mb-3 mt-3">
            <h1>Create a Password</h1>
            <label for="password"><b> What would you like your new password to be?</b></label>
            <input type="password" name="password" id="password" required class="form-control">
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="mb-3 mt-3">
            <label for="confirm_password"><b>Confirm New Password</b></label>
            <input type="password" name="confirm_password" id="confirm_password" required class="form-control">
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Please fill out this field.</div>
            <hr class="mb-3">
          </div>
		  <input class="btn btn-dark" type="submit" name="create" value="Register" style="margin-bottom: 20xp;">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(function() {
    $('input[name="create"]').click(function(e){
        var valid = this.form.checkValidity();
        if(valid){
            e.preventDefault();
            var email =$('#email').val();
            var password =$('#password').val();
            var confirm_password =$('#confirm_password').val();

            if (password === confirm_password) {
                Swal.fire({
                    title: 'Pasword changed succesfully',
                    text: 'Your new password has been set',
                    type: 'success'
                });
                // Perform form submission
                this.form.submit();
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'Passwords do not match',
                    type: 'error'
                });
            }
        }else{
            alert('Please Check your input and try again.');
        }
    })
});
</script>