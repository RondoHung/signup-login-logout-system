<?php
    session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--Bootstrap CDN-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time();?>">
        <title>Login In</title>
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
                        <!--Call main.js for hidden login form-->
                        <li><a href="#" onclick="document.getElementById('id01').style.display='block'">Submit</a></li>
                        <li><a href="#" onclick="document.getElementById('id01').style.display='block'">Record</a></li>
                    </ul>
                </nav>
                <img src="./images/cuhk.png" alt="CUHK" id="cuhk">
                </div>
            </div>
        </header>
        <!--The Main Login Form-->
        <div class = "container">
            <div id = "block">
                <img src="./images/img_avatar2.png" alt="Avatar" class="avatar">
                <!--Call "login.inc.php" in folder "includes"-->
                <form action="./includes/login.inc.php" method="post">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" name="username" placeholder="Enter Username" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="text" class="password" name="password" placeholder="Enter Password" required>
                    <button name="login-submit" type="submit" class = "logIn">LOGIN</button>
                    <?php
                        if (isset($_GET["error"])){
                            echo '<p class="alert alert-danger">Wrong Password</p>';
                        }
                        if (isset($_GET["newpwd"])){
                            echo '<p class="alert alert-success">Password Updated</p>';
                        }
                    ?>
                    
                </form>
                <!--Call "signup.php" Signup page-->
                <p><a class="Sign-Up" href="signup.php">Sign Up</a></p>
                <p><a class="Forget-Password" href="reset-password.php">Forgot Password?</a></p>
            </div>
        </div>
        
        <section id = "showcase">
            <h2>About Us</h2>
            <!--A Paragraph for "About Us"(should change)-->
            <div>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum repellat aperiam molestias assumenda autem facilis maxime facere labore fuga libero tempore veniam iusto sit, aliquam beatae odit, id numquam. Amet.
            </div>
        </section>

        <!--The hidden login form for several #-->
        <div id="id01" class="modal">
                <form class="modal-content" action="./includes/login.inc.php" method="post">
                    <div>
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                        <img src="./images/img_avatar2.png" alt="Avatar" class="avatar">
                    </div>
                    <div class="container">
                        <label for="uname"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username"  name="username" required>
                        <label for="psw"><b>Password</b></label>
                        <input type="text" class="password" placeholder="Enter Password" name = "password" required>
                        <button type="submit" name="login-submit" class="logIn">LOGIN</button>
                        <br>
                        <span><a href="signup.php">Sign Up</a></span>
                    </div>
                </form>
                

            </div>
    </body>
    <!--JS for hidden form & hidden password-->
    <script src = main.js></script>
</html>