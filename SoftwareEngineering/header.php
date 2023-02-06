<!DOCTYPE html>
<html lang="en">
    <head>
        <title>VaultPass</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .fakeimg {
                height: 200px;
                background: #aaa;
            }
            h2 {
                margin-right: 25px;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        ?>
        <div class="p-5 bg-dark text-white text-center">
            <img src="Arkenflux_logo.png" class="rounded-circle" style="max-width:10%;" alt="Logo">
            <h1>VaultPass</h1>
            <p class="fst-italic">SUBTITLE HERE</p>
        </div>

        <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php">Home</a>
                    </li>
                    <?php if (isset($_SESSION['MemberID'])): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">MemberPageHere</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="profile_customer.php">Edit Profile</a>
                        </li>
                    <?php elseif (isset($_SESSION['AdminID'])): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">AdminPageHere</a>
                        </li>
                    <?php elseif (isset($_SESSION['OwnerID'])): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="modifyMembers.php">Add / Delete Staff</a>
                        </li>
                    <?php else: ?>
                        
                    <?php endif; ?>
                </ul>
            </div>

            <?php
            if (isset($_SESSION['name'])):
                echo "<h2>Welcome</h2>" . $_SESSION['name'];
                ?>
                <div class="w3-right ms-auto mx-5">
                    <form class="form-inline" name="logout" action="logoutAction.php" method="post">
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-block">Logout</button>
                        </div>
                    </form>
                </div>
            <?php else: ?>    
                <div class="nav-item dropdown ms-auto mx-5">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">Login / Sign Up</a>
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item" href="signin_member.php">Member Login</a></li>
                        <li><a class="dropdown-item" href="signin_admin.php">Admin Login</a></li>
                        <li><a class="dropdown-item" href="signin_owner.php">Owner Login</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </nav>

