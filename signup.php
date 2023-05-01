<?php include 'header.php'; ?>
<div class="container w-75 mt-3">
    <h3>Sign Up</h3>
    <p>Please complete and submit the form.</p>

    <form name="register" action="registeraction.php" class="was-validated">
        <div class="mb-3 mt-3">
            <label for="Username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="uname" placeholder="Enter username" name="Username" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="pswd" placeholder="Enter password" name="Password" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="mb-3">
            <label for="FName" class="form-label">First Name:</label>
            <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="FName" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="mb-3">
            <label for="LName" class="form-label">Last Name:</label>
            <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="LName" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
</div>
</body>
</html>