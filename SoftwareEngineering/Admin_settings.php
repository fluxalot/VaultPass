<?php
include 'header.php';
if (isset($_GET['msg'])) {
    echo "<h2 class='w3-center'>" . $_GET['msg'] . "</h2>";
}
?>
<html>
    <style>
        h4 {
            text-align: center;
            font-size: 32px;
            margin-left: 225px;
            margin-right: 225px;
            margin-top: 25px;
        }
        h3 {
            text-align: center;
            font-size: 18px;
            margin-left: 225px;
            margin-right: 225px;
            text-indent: 50px;
            margin-top: 15px;
        }
        img {
            margin-top: 50px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
    <body>
        <div class="p-5 text-dark text-center">
       <a href="modifyPasswords.php">Manage Group Passwords</a>
        <a href="modifyPasswords.php">Manage Group Passwords</a>
        </div>
    </body>
</html>