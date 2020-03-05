<!--Very Similar to index.php-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--Bootstrap CDN-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time();?>">
        <title>Reset Password</title>
    </head>
    <body>
        <header id="main-header">
            <div class="container">
                <div id="welcome">
                    <h1>CUHK</h1>
                    <h5>Data Analysis Service</h5>
                </div>
                <div class="float">
                <nav>
                    <ul>
                        <li><a class="current" href="#">HOME</a></li>
                        <!--2 links are not available-->
                        <li><a href="#" style="cursor: default;font-weight:normal;color:#ffffff;">Submit</a></li>
                        <li><a href="#" style="cursor: default;font-weight:normal;color:#ffffff;">Record</a></li>
                    </ul>
                </nav>
                <img src="./images/cuhk.png" alt="CUHK" id="cuhk">
                </div>
            </div>
        </header>
        <!--Form is changed-->
        <div class = "container">
            <div id = "Reset-Box">
                
                <?php
                    $selector = $_GET["selector"];
                    $validator = $_GET["validator"];

                    if(empty($selector) || empty($validator)){
                        echo "Could not validate your request!";
                    }
                    else {
                        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
                            ?>

                                <form action="includes/reset-password.inc.php" method="post">
                                    <input type="hidden" name="selector" value="<?php echo $selector ?>">
                                    <input type="hidden" name="validator" value="<?php echo $validator ?>">
                                    <label for="psw"><b>New Password</b></label>
                                    <input type="password" name="pwd" placeholder="Enter a new password...">
                                    <label for="pwd-repeat"><b>Repeat New Password</b></label>
                                    <input type="password" name="pwd-repeat" placeholder="Repeat new password...">
                                    <button type="submit" name="reset-password-submit">Reset Password</button>
                                    <?php
                                        if (isset($_GET["error"])){
                                            if ($GET["error"]=="emptyfield"){
                                                echo '<p class="alert alert-danger">Some fields are empty!</p>';
                                            }
                                            if ($GET["error"]=="pwdnotsame"){
                                                echo '<p class="alert alert-danger">Password and Repeated Password are different!</p>';
                                            }
                                        }
                                    ?>
                                </form>

                            <?php
                        }
                    }
                ?>

            </div>

            <section id = "showcase">
            <h2>About Us</h2>
            <div>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum repellat aperiam molestias assumenda autem facilis maxime facere labore fuga libero tempore veniam iusto sit, aliquam beatae odit, id numquam. Amet.
            </div>
        </section>
        </div>
        
        
    </body>
    <script src = main.js></script>
</html>