<?php
require_once('vaultpass.php');

// Next, check if the form has been submitted
if(isset($_POST['create'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the email address is already registered
    $sql = "SELECT COUNT(*) as count FROM member WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result['count'] > 0){
        // email address already exists
        echo 'This email address has already been registered';
    } elseif ($password !== $confirm_password) {
        // passwords do not match
        echo 'Passwords do not match';
    } else {
        // all validation checks passed, insert the new user into the database
        $sql = "INSERT INTO member(FName, LName, Username, Password) VALUES(?,?,?,?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$fname, $lname, $email, $password]);
        if($result){
            echo 'Success!';
        } else {
            echo 'Error inserting new user';
        }
    }
} else {
    // the form has not been submitted, display an error message
    echo 'Insufficient Data';
}
?>
