<?php
session_start();


if (isset($_POST['submit'])){

    //Require database connection
    require 'dbh.up.php';

    //Get information from user inputs
    //$number = $_POST['number'];
    $text = $_POST['text'];
    $file = $_FILES['file'];
    $username = $_SESSION['userUid'];
    $email = $_SESSION['email'];
    
    //Check if both text and file are empty
    if(empty($text) && $_FILES['file']['size'] == 0){
        header("location: ./submit.php?error=emptyfields");
        exit();
    }
    //Check if empty text 
    else 
    if(empty($text) && !$_FILES['file']['size'] == 0){
        //Get file info
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
    
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        //Restrict the file type
        $allowed = array('xlsx', 'xls' , 'csv',  'txt');

        //check if the file type upload is allowed
        if(in_array($fileActualExt, $allowed)){
            //Error Control
            if($fileError === 0){
                //Restrict the file size
                if ($fileSize < 1000000){

                    //Current upload time
                    $date = new DateTime();
                    $dateString = $date->format('Y_m_d');
                    //Set New filename
                    $fileNameNew = $dateString."_".$username."_Assignment.".$fileActualExt;


                    $sql = "SELECT upload_file FROM uploads WHERE upload_file=?";
                    $stmt = mysqli_stmt_init($conn);
                    //check the sql initialization any error
                    if (!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ./submit.php?error=sqlerror");
                        exit();
                    }
                    else{
                        //no error, SELECT data to database
                        mysqli_stmt_bind_param($stmt, "s", $fileNameNew);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        $resultCheck = mysqli_stmt_num_rows($stmt);
                        //check if there is same filename in database
                        if($resultCheck > 0){
                        header("Location: ./submit.php?error=filetaken");
                        exit();
                        }  
                        //INSERT DATA to database
                        else{
                        $sql = "INSERT INTO uploads(Usersid, emailUsers, upload_file, exact_file, states) VALUES(?,?,?,?,'incomplete')";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)){
                            header("Location: ./submit.php?error=sqlerror");
                            exit();
                        }
                        else{
                        //INSERT DATA to database
                        mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $fileNameNew, $fileName);
                        mysqli_stmt_execute($stmt);
                        
                        //Move File to PC upload folder
                        $fileDestination = 'upload/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        

                        $to = $email;

                        $subject = 'Submit Success Email';

                        $message = '<p>Your upload is success. Please do not reply this email. </p>';
                        //$message .= '<p>Assignment Number:' . $number . '<br>';
                        $message .= 'Text Message:' . NULL . '<br>';
                        $message .= 'File Name:' . $file . '<br>';
                        $message .= 'Upload Date:' . $dateString . '<br>';
                        $message .= 'If there is any problem, please contact: </p>';

                        $headers = "From: HungFanHin <khung67618663@gmail.com>\r\n";
                        $headers .= "Reply-To: khung67618663@gmail.com\r\n";
                        $headers .= "Content-type: text/html\r\n";

                        mail($to, $subject, $message, $headers);
//Go to the record page
                        header("Location: record.php?uploadsuccess");
                        }
                    }
                }

                }else{
                    //echo "Your file is too large!";
                    header("Location: ./submit.php?error=filetoolarge");
                        exit();
                }
            }else{
                //echo "There was an error uploading your file!";
                header("Location: ./submit.php?error=uploaderror");
                        exit();
            }
        }else{
            //echo "You can't upload file of this type!";
            header("Location: ./submit.php?error=wrongfiletype");
                        exit();
        }
    }
    else
    //no text only
    if(!empty($text) && $_FILES['file']['size'] == 0){
        header("location: ./submit.php?error=emptyfields&text=".$text);
        exit();
    }
    //All filled
    //Very Similar to above
    else
    if(!empty($text) && !$_FILES['file']['size'] == 0){
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
    
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('xlsx', 'xls', 'csv', 'txt');

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if ($fileSize < 1000000){
                    //file name
                    $date = new DateTime();
                    $dateString = $date->format('Y_m_d');
                    $fileNameNew = $dateString."_".$username."_Assignment.".$fileActualExt;

                    $sql = "SELECT upload_file FROM uploads WHERE upload_file=?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ./submit.php?error=sqlerror");
                        exit();
                    }
                    else{
                        mysqli_stmt_bind_param($stmt, "s", $fileNameNew);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        $resultCheck = mysqli_stmt_num_rows($stmt);
                        if($resultCheck > 0){
                        header("Location: ./submit.php?error=filetaken&text=".$text);
                        exit();
                        }  
                        else{
                        $sql = "INSERT INTO uploads(Usersid, emailUsers, TEXT_msg, upload_file, exact_file, states) VALUES(?,?,?,?,?,'incomplete')";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)){
                            header("Location: ./submit.php?error=sqlerror");
                            exit();
                        }
                        else{
                        mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $text, $fileNameNew, $fileName);
                        mysqli_stmt_execute($stmt);

                        $fileDestination = 'upload/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);

                        $to = $email;

                        $subject = 'Submit Success Email';

                        $message = '<p>Your upload is success. Please do not reply this email. </p>';
                        //$message .= '<p>Assignment Number:' . $number . '<br>';
                        $message .= 'Text Message:' . $text . '<br>';
                        $message .= 'File Name:' . $file . '<br>';
                        $message .= 'Upload Date:' . $dateString . '<br>';
                        $message .= 'If there is any problem, please contact: </p>';

                        $headers = "From: HungFanHin <khung67618663@gmail.com>\r\n";
                        $headers .= "Reply-To: khung67618663@gmail.com\r\n";
                        $headers .= "Content-type: text/html\r\n";

                        mail($to, $subject, $message, $headers);

                        header("Location: record.php?uploadsuccess");
                        }
                    }
                }
                }else{
                    //echo "Your file is too large!";
                    header("Location: ./submit.php?error=filetoolarge");
                        exit();
                }
            }else{
                //echo "There was an error uploading your file!";
                header("Location: ./submit.php?error=uploaderror");
                        exit();
            }
        }else{
            //echo "You can't upload file of this type!";
            header("Location: ./submit.php?error=wrongfiletype");
                        exit();
        }
    }
    //check if the user directly use the url
    else {
        header("location: ./submit.php?error=urlwrong");
        exit();
    }
}