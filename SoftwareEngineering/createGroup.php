<?php include 'header.php'; ?>
<div class="container w-75 mt-3">
    <h3>Create Group</h3>
    <p>Please complete and submit the form.</p>

    <form name="Create Group" action="createGroup_Action.php" class="was-validated">
        <div class="mb-3 mt-3">
            <label for="Name" class="form-label">Group Name:</label>
            <input type="text" class="form-control" id="uname" placeholder="Enter name" name="Name" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
</div>
</body>
</html>