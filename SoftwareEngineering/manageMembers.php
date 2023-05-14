<?php
include 'header.php';
require 'DBConnect.php';
$sql = "select Username, MemberID, GroupID from member";
$result = queryDB($sql);
$sql = "select Username, AdminID, GroupID from admin";
$adminResult = queryDB($sql);
$colCount = 0;
$adminColCount = 0;
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
                            <a href="promote.php?GroupID=<?php echo $GroupID ?>&Username=<?php echo $Name ?>"  id="promote" class="card-link">Promote to Admin</a>
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

if (gettype($adminResult) == "object") {
    if ($adminResult->num_rows > 0) {
        echo '<div class="row">';
        while ($row = $adminResult->fetch_assoc()) {
            $adminColCount += 1;
            $adminName = $row['Username'];
            $adminID = $row['AdminID'];
            $adminGroupID = $row['GroupID'];
            if ($GroupID == $adminGroupID) {
                ?>
                <div class="col card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $adminName ?></h4>
                            <a href="removeMember.php?AdminID=<?php echo $adminID ?>"  id="removeMember" class="card-link">Remove Member</a>
                            <a href="demote.php?GroupID=<?php echo $GroupID ?>&Username=<?php echo $adminName ?>"  id="demote" class="card-link">Demote to Member</a>
                    </div>
                </div>
                <?php
            }
            if ($adminColCount % 5 == 0) {
                echo '</div><div class="row">';
            }
        }
        echo '</div>';
    }
} else {
    echo $adminResult;
}
?>



</body>
</html>
