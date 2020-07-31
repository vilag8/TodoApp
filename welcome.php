<?php
    include("db_con.php"); // Include il file di connessione al database
    session_start();// come sempre prima cosa, aprire la sessione 

    if(!$_SESSION){
        header('location:index.php?Accesso-negato');
    }else{
        $nome = $_SESSION["username"];
    }
?>

<!DOCTYPE html>
    <html>
    <head>
        <title>Tasks Area Personale</title>
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
                <nav class="nav_welcomepage">
                    <div class="menu">
                        <ul>
                            <a href="logout.php"><li id="home">LOG OUT</li></a>
                        </ul>
                    </div>
                </nav>   
        </header>

        <main>
            <div class="text_welcomepage">
                <h1>
                    <?php echo "Ciao $nome, sono le ". date('H:i'). " del giorno " . date('d/m/Y')?>
                </h1>
                <hr>
                <h3>Crea un task, quando lo hai completato clicca sul simbolo &#x2327</h3>
            </div>

        
            <div id="tasks">
                <div class="tasks">
                    <p>Inserisci Tasks &#x270D</p>
                    <hr>
                    <form name ="form_task" method="post" action="insertasks.php">
                        <input type="text" name="new_task" placeholder="il tuo task">
                        <button class="buttontasks">Crea</button>
                    </form>
                </div>

                <div class="tasks_in_corso">
                    <p>Tasks in corso &#x23F3</p>
                    <hr>
                    <table>
                        <tbody>
                            <?php
                                //STAMPO TUTTI I TASK INSERITI NEL DATABASE
                                $sql = "SELECT * FROM tasks WHERE id_user ='".$_SESSION["id"]."'";
                                $result = $connessione_al_server->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    $lista = "";
                                // ESTRAZIONE DEL CAMPO TASK CHE INSERISCO NELLA TABELLA
                                while($row = $result->fetch_assoc()) {
                                    $lista = $row["task"];
                                    $id = $row["id_task"];

                                    echo '<tr>';

                                    echo '<td>'.$lista.'</td>';
                                    echo '<td class="button"><a href="welcome.php?delete='.$id.'">&#x2327</a></td>';
                                        
                                    echo '</tr>';

                                    }
                                } else {
                                    echo "<td>Aggiungi un nuovo task</td>";
                                }

                                //CANCELLA TASK
                                if(isset($_GET['delete'])){
                                    $taskid = $_GET['delete'];
                                    $query = 'DELETE FROM tasks WHERE id_task='.$taskid.'';
                                    $cancTask = mysqli_query($connessione_al_server, $query);
                                    header('location:welcome.php');
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <footer>
            <div class="social">
                <a href="https://github.com/vilag8" target="blank"><img src="images/social/001-github.png" alt=""></a>
                <a href="https://www.linkedin.com/in/vincenzo-lagrotta-308362110" target="blank"><img src="images/social/002-linkedin.png" alt=""></a>
                <a href="https://www.instagram.com/vilagrotta/"target="blank"><img src="images/social/003-instagram.png" alt=""></a>
                <a href="https://www.facebook.com/vincenzo.lagrotta1/"target="blank"><img src="images/social/004-facebook.png" alt=""></a>
                <a href="https://vincenzolagrotta.herokuapp.com"target="blank"><img src="images/social/001-world-wide-web.png" alt=""></a>
            </div>
        </footer>
    </body>
</html>