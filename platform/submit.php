<?php
session_start();

//check the global session
if(!isset($_SESSION['userId'])){
    header("Location: ../index.php");
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
                <!--Bootstrap filestyle CDN-->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
                <!--JQuery CDN-->
                <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                <title>Submit Page</title>
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
                                <li><a href="#" style="cursor: default;font-weight:normal;color:#666;" >Home</a></li>
                                <li><a href="#" class="current">Submit</a></li>
                                <li><a href="record.php">Record</a></li>
                            </ul>
                        </nav>
                        <img src="./images/cuhk.png" alt="CUHK" id="cuhk">
                        </div>
                    </div>
                </header>
                
                <!--Submit Form-->
                <div class="container" id="submit-form">
                <h2 class="sub-headings">Submit your document</h2>
                <!--Call "upload.php"-->

                <?php
                if($_SESSION['indicator'] == 0){
                ?>
                <form action="upload.php" method="POST" enctype="multipart/form-data" >
                <!--number is commented out-->
                        <!--<div id="as-number">
                        <label for="No. of assignment">Assginment number: </label>
                        <select name="number">
                            <?php
                            //1 to 100 select number
                            //for ($i=1; $i<=100; $i++)
                            //{
                                ?>
                                <option value="<?php //echo $i;?>"><?php //echo $i;?></option>
                                <?php
                            //}
                            ?>
                        </select>
                        </div>-->
                        <br>
                        <!--Text input-->
                        <div id="as-text">
                        <label for="txtinput">Text Input: </label><br>
                        <textarea type="text" name="text" class="area"></textarea>
                        </div>
                        <br>
                        <!--File input-->
                        <div id="as-file">
                        <label for="fileinput">Upload File: </label>
                        <label class="input-label" id="upfile1">
                        <i class="fa fa-upload" aria-hidden="true"></i>    
                            <span id="label_span">Select File</span>
                        </label>
                        <!--Use JQuery to change the select file button-->
                        <input type="file" name="file" id="file">
                        </div>
                        <br>
                        <!--Upload Button-->
                        <button type="submit" name="submit">UPLOAD</button>
                        <?php
                        if (isset($_GET["error"])){
                            if ($_GET["error"]=="emptyfields"){
                            echo '<p class="alert alert-danger">Some Fields Are Empty!</p>';
                        }
                        if ($_GET["error"]=="sqlerror"){
                            echo '<p class="alert alert-danger">Database Error!</p>';
                        }
                        if ($_GET["error"]=="filetaken"){
                            echo '<p class="alert alert-danger">You are not allowed to upload twicw a day!</p>';
                        }
                        if ($_GET["error"]=="filetoolarge"){
                            echo '<p class="alert alert-danger">File Too Large!</p>';
                        }
                        if ($_GET["error"]=="uploaderror"){
                            echo '<p class="alert alert-danger">Your File Has Error!</p>';
                        }
                        if ($_GET["error"]=="wrongfiletype"){
                            echo '<p class="alert alert-danger">The File Type is not Available(xlsx, xls, csv, txt)!</p>';
                        }
                    }
                ?>
                    </form>
                <?php
                }
                else{
                    ?>
                       <p class="alert alert-danger">You are not allowed to submit files. If you require any further information, feel free to contact: ...@gmail.com</p> 
                    <?php
                }
                ?>

                
                </div>
                <!--JS for the button style-->
                <script src="index.js"></script>
                <script src="timeOut.js"></script>
    </body>
</html>