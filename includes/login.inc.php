<?php

if (isset($_POST['login-submit'])) {

    //Require database connection
    require 'dbh.inc.php';

    //Get information from user inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    //check if empty input
    if(empty($username) || empty($password)){
        header("location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        //set the SELECT sql code
        $sql = "SELECT * FROM users WHERE uidUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        //check the sql initialization any error
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            //No error, execute the code
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            //Find the row in database where match the username
            if ($row = mysqli_fetch_assoc($result)){
                //Verify the input password and and database pwd
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                //Wrong Password
                if ($pwdCheck == false) {
                    header("location: ../index.php?error=wrongpwd");
                    exit();
                }
                //Right Password
                else if($pwdCheck == true) {
                    //Username and email on the global session
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    $_SESSION['email'] = $row['emailUsers'];
                    $_SESSION['pwd'] = $row['pwdUsers'];
                    $_SESSION['indicator'] = $row['user_indicator'];

                    header("location: ../platform/submit.php");
                    exit();

                }
                //if any other error
                else {
                    header("location: ../index.php?error=wrongpwdtype");
                    exit();
                }
            }
            //Find the row in database no match the username
            else {
                header("location: ../index.php?error=nouser");
                exit();
            }

        }
    }

}
//check if the user directly use the url
else {
    header("location: ../index.php");
    exit();
}