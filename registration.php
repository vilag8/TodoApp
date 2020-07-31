<?php
    session_start();
    include("db_con.php"); // includo il file di connessione al database

    if($_POST["username_reg"] != "" && $_POST["password_reg"]!= "" && $_POST["email_reg"] != ""){  // se i parametri non sono vuoti li registro nel DB
        $query_registrazione = mysqli_query($connessione_al_server,"INSERT INTO users (username,password,email)
        VALUES ('".$_POST["username_reg"]."','".md5($_POST["password_reg"])."','".$_POST["email_reg"]."')") // scrivo sul DB questi valori
        or die ("query di registrazione non riuscita"); // se la query fallisce mostrami questo errore
    }else{
    header('location:index.php?Non hai compilato tutti i campi obbligatori'); // se le prime condizioni non vanno bene entra in questo ramo else
    }
    
    if(isset($query_registrazione)){ //se la reg è andata a buon fine
        $_SESSION["logged"]=true; //restituisci vero alla chiave logged in SESSION
        header("location:accedi.php");
    }else{
        echo "non ti sei registrato con successo"; // altrimenti esce scritta a video questa stringa
    }
?> 