<?php
    session_start();
    include("db_con.php"); // includo il file di connessione al database

    if($_POST["new_task"] != "" ){  // se i parametri non sono vuoti
        $query_registrazione = mysqli_query($connessione_al_server,"INSERT INTO tasks (id_user,task)
        VALUES ('".$_SESSION["id"]."','".$_POST["new_task"]."')") // scrivo sul DB questi valori
        or die ("query di registrazione non riuscita"); // se la query fallisce mostrami questo errore
    }else{
    header('location:welcome.php?Inserisci-un-task'); // se il campo task è vuoto entra in questo ramo else
    }
    if(isset($query_registrazione)){ //se la reg è andata a buon fine rimanda alla pagina con il task aggiunto
        header("location:welcome.php?task-aggiunto");
    }else{
        echo "OPS! Qualcosa è andato storto"; // altrimenti compare questa stringa
    }
?> 