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
        <h4>Title</h4>
        <h3>
            Body
        </h3>
        <img src="biohacking.jpg" alt="biohacking" class="center">

    </body>
</html>