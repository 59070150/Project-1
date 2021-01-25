<?php
    session_start();
    include('server.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="boostrap/boostrap.css">
</head>
<body>
    
    <div class="header">
        <h2>Register</h2>
    </div>

    <form action="register_db.php" method="POST">
        <?php include('error.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>

        <?php endif ?>
        <div class="input-group">
            <label for="id">Student Id</label>
            <input type="text" name="id" required placeholder="ex.59070XXX">
        </div>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" required placeholder="Enter your firstname...">
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email" required placeholder="@it.kmitl.ac.th">
        </div>
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password_1" required>
        </div>
        <div class="input-group">
            <label for="password_2">Re-Password</label>
            <input type="password" name="password_2" required>
        </div>
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn btn-success">Register</button>
        </div>
        <p>Already a member? <a href="login.php">Sign in</a></p>
    </form>

    <script src="js/bundle.js"></script>
</body>
</html>