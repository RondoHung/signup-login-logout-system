<?php

if(isset($_POST['signup-submit'])){

    //Require database connection
    require 'dbh.inc.php';

    //Get information from user inputs
    $username = $_POST['username'];
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];

    //check if empty input
    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    //check if invalid email && invalid username
    //important to run first
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }
    //check if invalid email
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    }
    //check if invalid username
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    //check if password more then 8 charaters
    else if(strlen($password) <= 8){
        header("Location: ../signup.php?error=invalidpwd&uid=".$username."&mail=".$email);
        exit();
    }
    //check if password and repeat password are not equal
    else if($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else{
        //set the SELECT sql code
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        //check the sql initialization any error
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else {
            //No error, execute the code
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            //check if the username is used
            if($resultCheck > 0){
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            }
            else {
                //INSERT user info to database
                $sql = "INSERT INTO users(uidUsers, emailUsers, pwdUsers, user_indicator) VALUES(?,?,?, 0)";
                $stmt = mysqli_stmt_init($conn);
                //check the sql initialization any error
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else{
                    //no error, insert data to database
                    //hashed the password by Bcrypt
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    
                    $sql = "CREATE USER '" .$username. "'@'localhost' IDENTIFIED BY '" .$hashedPwd."';";
                    $stmt = mysqli_stmt_init($conn);
                    //check the sql initialization any error
                    if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                    }
                    else {
                    //No error, execute the code
                    mysqli_stmt_execute($stmt);
                    
                    $sql = "GRANT SELECT,INSERT ON website_project.uploads TO '".$username."'@'localhost';";
                    $stmt = mysqli_stmt_init($conn);
                    //check the sql initialization any error
                    if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                    }
                    else {
                    //No error, execute the code
                    mysqli_stmt_execute($stmt);


                    }

                    }

                    header("Location: ../index.php");
                    exit();
                }
            }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
//check if the user directly use the url
else{
    header("Location: ../signup.php");
        exit();
}