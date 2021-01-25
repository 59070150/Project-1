<?php 

    session_start();
    include('server.php');

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must login fisrt!";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="boostrap/boostrap.css">
</head>
<body>
    
    <div class="header">
        <h2>Home Page</h2>
    </div>

    <div class="content">
        <!-- Notification Message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <!--Logged in user information-->
        <?php if (isset($_SESSION['username'])) : ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong> <?php echo $_SESSION['userlevel']; ?></p>
            <!--<p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>-->
        <?php endif ?>
        
        <div class="display-6 text-center mb-3">User Information</div>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Score</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    $query = "SELECT * FROM user WHERE userlevel = 'student'";
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_assoc($result)){
                        
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['score'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
    </div>

    <script src="js/bundle.js"></script>

</body>
</html>