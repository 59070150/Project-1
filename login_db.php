<?php 

    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_escape_string($conn, $_POST['username']);
        $password = mysqli_escape_string($conn, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "Username is required.");
        }
        if (empty($password)) {
            array_push($errors, "Password is required.");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);

                if ($row['userlevel'] == 'admin') { //Check user level 'admin'
                    $_SESSION['username'] = $username;
                    $_SESSION['userlevel'] = $row['userlevel'];
                    $_SESSION['success'] = "Your are now logged in.";
                    header('location: admin.php');
                } else {
                    $_SESSION['username'] = $username;
                    $_SESSION['userlevel'] = $row['userlevel'];
                    $_SESSION['success'] = "Your are now logged in.";
                    header('location: index.php');
                }
            } else {
                array_push($errors, "Wrong username/password combination.");
                $_SESSION['error'] = "Wrong username or password try again!";
                header('location: login.php');
            }
        }
    }

?>