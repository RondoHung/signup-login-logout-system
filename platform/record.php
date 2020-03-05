<?php
session_start();

//check the global session
if(!isset($_SESSION['userId'])){
    header("Location: ../index.php");
}
else{
    //Require database connection
    require 'dbh.up.php';
    $username = $_SESSION['userUid'];
}
?>

<!DOCTYPE html>
<html>
        <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <!--Bootstrap CDN-->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
                <link rel="stylesheet" type="text/css" href="./stylein.css?v=<?php echo time();?>">
                <!--JQuery CDN-->
                <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                <title>Records Page</title>
            </head>
            <body>
                <header id="main-header">
                <!--The Logout Button-->
                <form action="../includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit" id="logout">LOGOUT
                    </button>
                </form>
                    <div class="container">
                        <div id="welcome">
                            <h1>CUHK</h1>
                            <h5>Data Analysis Service</h5>
                        </div>
                        <div class="float">
                        <nav>
                            <ul>
                                <li><a href="#" style="cursor: default;font-weight:normal;color:#666;">HOME</a></li>
                                <li><a href="submit.php">Submit</a></li>
                                <li><a href="#" class="current">Record</a></li>
                            </ul>
                        </nav>
                        <img src="./images/cuhk.png" alt="CUHK" id="cuhk">
                        </div>
                    </div>
                </header>

                <div class="container" >
                <div class="row" id="Records">
                    <div class="col-md-6">
                        <h1 id="header-title">Your Records</h1>
                    </div>
                    <!--Searching Function, call main.js-->
                    <div class="col-md-6 align-self-center">
                        <input type="text" class="form-control" id="filter" placeholder="Search file name...">
                    </div>
                </div>
                </div>

                <span class="container card card-body bg-light">
                    <ul id="items" class="list-group">
                        <h5>
                            <span id="record-title">Your Files </span>
                            <span class="float-right" id="states">Status</span>
                        </h5>
                        <?php
                        $sql = "SELECT * FROM uploads WHERE Usersid = '".$username."';";
                        //find the files belong the specific user
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);
                            //if there are some uploads

                            function convertString($date){
                                $sec=strtotime($date);
                                $date=date("Y-m-d g:i a",$sec);
                                echo $date;
                            }

                            if($resultCheck > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    ?><li class="list-group-item mb-3"><?php //list of file name
                                     echo $row['exact_file']
                                     ?>
                                    <span class="float-right">
                                    <div class="float-right"><?php
                                     //list of its status
                                     echo $row['states']
                                     ?></div><br>
                                    <div class="up-date">upload: <?php
                                     //its upload time
                                     convertString($row['upload_time']);
                                     ?></div>
                                    </span>
                                    </li>
                                    <?php
                                }
                            }

                        ?>
                    </ul>  
                </div>
               
                
                
            <script src = main.js></script>
            <script src="timeOut.js"></script>
    </body>
</html>