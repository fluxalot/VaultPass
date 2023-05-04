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
    margin-bottom: 25px; /* Add margin-bottom to prevent overlap */
}

p {
    text-align: center;
    font-size: 14px;
    margin-top: 5px;
    margin-bottom: 25px; /* Add margin-bottom to prevent overlap */
}

.button-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 25px;
    margin-bottom: 25px; /* Add margin-bottom to prevent overlap */
}

    </style>
    <body>
        <h4>Safety starts here</h4>
        <p>
            Share passwords with your family, friends, and employees by creating groups and adding the passwords you use everyday.
        </p>
        <div class="button-container">
            <button class="copy-button" type="button" onclick="copyPassword()">
                <img src="copybutton.png">
                Copy Password
            </button>
        </div>
        <p>
            <a href="ChangePW.php">Forgot Password? Click here to reset it.</a>
        </p>

        <script>
        function copyPassword() {
          // Send an AJAX request to the PHP file
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "copyPW.php");
          xhr.send();

          // Handle the response from the PHP file
          xhr.onload = function() {
            if (xhr.status === 200) {
              // Password was copied successfully
              alert(xhr.responseText);
            } else {
              // Error copying password
              alert("Error copying password: " + xhr.statusText);
            }
          };
        }
        </script> 
    </body>
</html>
