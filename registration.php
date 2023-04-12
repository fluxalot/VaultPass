<?php
require_once('dbconnect.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Create an account | PHP</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div>
<?php
if ($_POST['password'] === $_POST['confirm_password']) {
    // passwords match
    $password = $_POST['password'];
    $salt = "randomSalt123";
    $password = hash('sha256', $password.$salt);
    $sql = "INSERT INTO member(FName, Lname, Username, Password) VALUES(?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $password = hash('sha256', $_POST['password'].$salt);
    $stmtinsert->execute([$_POST['fname'], $_POST['lname'], $_POST['email'], $password]);

    echo 'Success!';
} else {
    // passwords do not match
    echo 'Passwords do not match';
}
?>
</div>
<div>
<form action="registration.php" method="post">
<div class="container">
<div class="row">
<div class="mb-3 mt-3">
<h1>Register an Account</h1>
<hr class="mb-3">
<label for="fname"><b>First Name</b></label>
<input type="text" name="fname" id="fname" required>
 <div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>
<div class="mb-3 mt-3">
<label for="lname"><b>Last Name</b></label>
<input type="text" name="lname" id="lname" required>
 <div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>
<label for="email"><b>Email</b></label>
<input type="email" name="email" id="email" required>
 <div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
<div class="mb-3 mt-3">
<h1>Create a Password</h1>
<label for="password"><b>Password</b></label>
<input type="password" name="password" id="password" required>
 <div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
</div>
<div class="mb-3 mt-3">
<label for="password"><b>Confirm Password</b></label>
<input type="password" name="confirm_password" required>
 <div class="valid-feedback">Valid.</div>
<div class="invalid-feedback">Please fill out this field.</div>
<hr class="mb-3">
</div>
<input class="btn btn-dark" type="submit" name
="create" value="Register">
</div>
</div>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
$(function() {
    $('input[name="create"]').click(function(e){
        var valid = this.form.checkValidity();
        if(valid){
            e.preventDefault();
            var fname =$('#fname').val();
            var lname =$('#lname').val();
            var email =$('#email').val();
            var password =$('#password').val();
            Swal.fire({
                title: 'Account Created',
                text: 'Your account is now registered',
                type: 'success'
            });
        }else{
            alert('false');
        }
    })
});
</script>
</html>
