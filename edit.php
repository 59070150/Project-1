<?php

    session_start();
    include('server.php');

    $errors = array();

    if (isset($_REQUEST['update_id'])) {
        # code...
        $id = $_REQUEST['update_id'];

        $user_check_query = "SELECT * FROM user WHERE id = '$id' ";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);
    } else {
        array_push($errors, "Id is not match.");
        $_SESSION['error'] = "Id is not match.";
    }

    if (isset($_REQUEST['edit_user'])) {
        # code...
        $score_up = $_REQUEST['score'];
        //$userlevel_up = $_REQUEST['userlevel'];

        if (count($errors) == 0) {
            $user_update_query = "UPDATE user SET score = '$score_up' WHERE id = '$id'";
            $query = mysqli_query($conn, $user_update_query);
            $_SESSION['success'] = "Update score successfully.";
            header("refresh:2;admin.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="boostrap/boostrap.css">
</head>
<body>
    
    <div class="header">
        <h2>Edit</h2>
    </div>

    <form method="POST">
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
        <div class="input-group">
            <label for="score">Edit Score</label>
            <input type="text" name="score" required value="<?php echo $result['score'] ?>">
        </div>
        <div class="input-group">
            <button type="submit" name="edit_user" class="btn btn-success">Edit</button>
            
        </div>
        <a href="admin.php" class="btn btn-danger">Cancel</a>
    </form>

    <script src="js/bundle.js"></script>
</body>
</html>