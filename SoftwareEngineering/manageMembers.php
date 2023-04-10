<?php
include 'header.php';
require 'DBConnect.php';
$sql = "select Username, MemberID, GroupID from member";
$result = queryDB($sql);
$colCount = 0;
$GroupID = $_GET['GroupID'];
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
    <a class="w3-button w3-green" href="addMember.php?GroupID=<?php echo $GroupID ?>"  id="addMember">Add Member</a>
</div>

<?php
if (gettype($result) == "object") {
    if ($result->num_rows > 0) {
        echo '<div class="row">';
        while ($row = $result->fetch_assoc()) {
            $colCount += 1;
            $Name = $row['Username'];
            $MemberID = $row['MemberID'];
            $MemberGroupID = $row['GroupID'];
            if ($GroupID == $MemberGroupID) {
                ?>
                <div class="col card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $Name ?></h4>
                            <a href="removeMember.php?MemberID=<?php echo $MemberID ?>"  id="removeMember" class="card-link">Remove Member</a>
                    </div>
                </div>
                <?php
            }
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