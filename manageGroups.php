<?php
include 'header.php';
require 'DBConnect.php';
$sql = "select Name, OwnerID, GroupID from groups";
$result = queryDB($sql);
$colCount = 0;
?>

<style>
    button {
  background-color: #555555;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  transition-duration: 0.2s;
}
</style>

<div class="card">
    <a class="w3-button w3-green" href="createGroup.php">Add Group</a>
</div>

<?php
if (gettype($result) == "object") {
    if ($result->num_rows > 0) {
        echo '<div class="row">';
        while ($row = $result->fetch_assoc()) {
            $colCount += 1;
            $Name = $row['Name'];
            $GroupID = $row['GroupID'];
            ?>
            <div class="col card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $Name ?></h4>
                        <a href="deleteGroup.php?GroupID=<?php echo $GroupID ?>"  id="deleteGroup" class="card-link">Delete Group</a>
                        <a href="#" class="card-link">Add Members</a>
                </div>
            </div>
            <?php
            if ($colCount % 5 == 0) {
                echo '</div><div class="row">';
            }
        }
        echo '</div>';
    }
} else {
    echo $result;
}
?>



</body>
</html>