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
        <title>Sign Up</title>
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
            <div id = "box">
                <h3 style="padding:10px;">Register Account</h3>
                <!--Call "signup.inc.php" in "includes"-->
                <form action="./includes/signup.inc.php" method="post">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" name="username" placeholder="Enter Username" required>
                    <label for=""><b>Email</b></label>
                    <input type="text" name="mail" placeholder="Enter E-mail" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="text" class="password" name="password" placeholder="More Then 8 Charaters" required>
                    <label for="psw"><b>Repeat Password</b></label>
                    <input type="text" class="password" name="password-repeat" placeholder="Repeat Password"  required>                    
                    <button name="signup-submit" type="submit" >Sign Up</button>
                    
                    <?php
                    if (isset($_GET["error"])){
                        if ($_GET["error"]=="emptyfields"){
                            echo '<p class="alert alert-danger">Some Fields are Empty!</p>';
                        }
                        if ($_GET["error"]=="invalidmailuid"){
                            echo '<p class="alert alert-danger">Invalid E-mail and Username!</p>';
                        }
                        if ($_GET["error"]=="invalidmail"){
                            echo '<p class="alert alert-danger">Invalid E-mail!</p>';
                        }
                        if ($_GET["error"]=="invaliduid"){
                            echo '<p class="alert alert-danger">Invalid Username(Letters/No. only)!</p>';
                        }
                        if ($_GET["error"]=="invalidpwd"){
                            echo '<p class="alert alert-danger">Password Too Short!</p>';
                        }
                        if ($_GET["error"]=="passwordcheck"){
                            echo '<p class="alert alert-danger">Repeat Password is not the Same!</p>';
                        }
                        if ($_GET["error"]=="sqlerror"){
                            echo '<p class="alert alert-danger">Database Error!</p>';
                        }
                        if ($_GET["error"]=="usertaken"){
                            echo '<p class="alert alert-danger">Username is Taken!</p>';
                        }
                    }
                    ?>

                </form>
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
    <script src = main.js></script>
</html>