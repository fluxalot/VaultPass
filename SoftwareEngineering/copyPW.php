<?php
require('dbconnect.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['email'])) {
    $user_email = $_SESSION['email'];

    // Check if the user is a member
    $sql = "SELECT password_hash FROM member WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$user_email]);
    $result = $stmt->fetch();

    if ($result) {
        $password_hash = $result['password_hash'];
        echo "Password: ********<br>";
        echo "<button onclick='copyPassword(\"$password_hash\")'>Copy password to clipboard</button>";
    } else {
        // Check if the user is an owner
        $sql = "SELECT password_hash FROM owner WHERE email = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$user_email]);
        $result = $stmt->fetch();

        if ($result) {
            $password_hash = $result['password_hash'];
            echo "Password: ********<br>";
            echo "<button onclick='copyPassword(\"$password_hash\")'>Copy password to clipboard</button>";
        } else {
            echo "User not found";
        }
    }
} else {
    echo "You must be signed in to access this page.";
}
