<?php 
include 'header.php';
$GroupID = $_GET['GroupID'];
?>

<div class="container w-75 mt-3">
    <h3>Add Member to Group</h3>

    <form name="addMember" action="addMember_Action.php?GroupID=<?php echo $GroupID ?>"  id="addMember_Action" class="was-validated">
        <div class="mb-3 mt-3">
            <label for="Username" class="form-label">Enter the username of the account you would like to add:</label>
            <input type="text" class="form-control" id="uname" placeholder="Enter username" name="Username" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <input type="hidden" id="GroupID" name="GroupID" value="<?php echo $GroupID ?>" >
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
</div>
</body>
</html>