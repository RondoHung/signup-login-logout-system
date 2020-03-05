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
                <h3 style="margin:20px 0;">Reset Your Password</h3>
                <!--Call "signup.inc.php" in "includes"-->
                <form action="./includes/reset-request.inc.php" method="post">
                    <input type="text" name="email" placeholder="Enter your e-mail address..." style="margin:20px 0;">
                    <button type="submit" name="reset-request-submit" style="margin:20px 0;">Receive new password by e-mail</button>
                </form>
                <?php
                    if (isset($_GET["reset"])){
                        if ($_GET["reset"]=="success"){
                            echo '<p class="alert alert-success">Check your e-mail!</p>';
                        }
                    }
                    if (isset($_GET["error"])){
                        if ($_GET["error"]=="invalidmail"){
                            echo '<p class="alert alert-danger">Invalid E-Mail!</p>';
                        }
                    }
                ?>
                <span><a href="index.php">Log In</a></span>
            </div>

            <section id = "showcase">
            <h2>About Us</h2>
            <div>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum repellat aperiam molestias assumenda autem facilis maxime facere labore fuga libero tempore veniam iusto sit, aliquam beatae odit, id numquam. Amet.
            </div>
        </section>
        </div>
        
        
    </body>
    <!--<script src = main.js></script>-->
</html>