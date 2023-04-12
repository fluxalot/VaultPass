<?php include 'header.php'; ?>

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  if ($password === $confirm_password) {
    $salt = "randomSalt123";
    $password = hash('sha256', $password.$salt);
    $sql = "INSERT INTO member(FName, Lname, Username, Password) VALUES(?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $stmtinsert->execute([$fname, $lname, $email, $password]);
    $_SESSION['OwnerID'] = $OwnerID;
    $_SESSION['name'] = $fname . " " . $lname;
    echo 'Success!';
  } else {
    echo 'Error: Passwords do not match';
  }
}
?>
</div>
<div>
  <form action="registration.php" method="post">
    <div class="container">
      <div class="row">
        <form name="signin" action="signinAction_admin.php" class="was-validated">
          <div class="mb-3 mt-3">
            <h1>Register an Account</h1>
            <hr class="mb-3">
            <label for="fname"><b>First Name</b></label>
            <input type="text" name="fname" id="fname" required class="form-control">
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="mb-3 mt-3">
            <label for="lname"><b>Last Name</b></label>
            <input type="text" name="lname" id="lname" required class="form-control">
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="mb-3 mt-3">
            <label for="email"><b>Email</b></label>
            <input type="email" name="email" id="email" required class="form-control">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="mb-3 mt-3">
            <h1>Create a Password</h1>
            <label for="password"><b>Password</b></label>
            <input type="password" name="password" id="password" required class="form-control">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="mb-3 mt-3">
            <label for="confirm_password"><b>Confirm Password</b></label>
            <input type="password" name="confirm_password" id="confirm_password" required class="form-control">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
            <hr class="mb-3">
          </div>
          <div class="mb-3 mt-3">
            <label for="OwnerID"><b>Enter Owner ID (if applicable)</b></label>
            <input type="number" name="OwnerID" id="OwnerID" class="form-control">
            <div class="valid-feedback">Valid.</div>
            <hr class="mb-3">
          </div>
          <input class="btn btn-dark" type="submit" name="create" value="Register" style="margin-bottom: 20xp;">            
        </form>
      </div>
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>"                "
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
            var confirm_password =$('#confirm_password').val();

            if (password === confirm_password) {
                Swal.fire({
                    title: 'Account Created',
                    text: 'Your account is now registered',
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
</form>
</html>
