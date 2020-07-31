<?php
    session_start();// come sempre prima cosa, aprire la sessione 
    include("db_con.php"); // includo il file di connessione al database
?>
<!DOCTYPE html>
    <html>
    <head>
        <title>Tasks LogIn</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
        <link rel="manifest" href="images/favicon/site.webmanifest">
        <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="images/favicon/favicon.ico">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-config" content="images/favicon/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <div class="header">
                <div class="logo">
                    <img src="images/logo.png" alt="logo">
                </div>
                <nav>
                    <div class="menu">
                        <ul>
                            <a href="index.php"><li id="home">HOME</li></a>
                        </ul>
                    </div>
                </nav>   
            </div>
            <hr>
        </header>
        
        <main class="loginpage">
            <form name="form_login" method="post" action="login.php">
                <h2>Accedi</h2>
                <p>Username</p> <input type="text" name="username" >
                <p>Password</p> <input name="password">
                <button type="submit" nome="login">Accedi</button>
            </form>
        </main>

        <footer class="accedipage">
            <div class="social">
                <a href="https://github.com/vilag8" target="blank"><img src="images/social/001-github.png" alt=""></a>
                <a href="https://www.linkedin.com/in/vincenzo-lagrotta-308362110" target="blank"><img src="images/social/002-linkedin.png" alt=""></a>
                <a href="https://www.instagram.com/vilagrotta/"target="blank"><img src="images/social/003-instagram.png" alt=""></a>
                <a href="https://www.facebook.com/vincenzo.lagrotta1/"target="blank"><img src="images/social/004-facebook.png" alt=""></a>
                <a href="https://vincenzolagrotta.herokuapp.com"target="blank"><img src="images/social/001-world-wide-web.png" alt=""></a>
            </div>
        </footer>
        <script src="script.js"></script>
    </body>
</html>