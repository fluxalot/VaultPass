
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
        <h4>Safety starts here</h4>
        <h3>
            Share passwords with your family, friends, and employees throughout
            by creating groups and adding the passwords you use everyday.
        </h3>
		<a href="ChangePW.php">Forgot Password? Clicke here to reset it.</a>

		
    </body>
</html>