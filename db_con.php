<?php
    //APRO LA CONNESSIONE GLOBALE
    $connessione_al_server = mysqli_connect("localhost","root","");
    if(!$connessione_al_server){
    die ('Non riesco a connettermi: errore '.mysqli_error());
    };
    
    //SELEZIONO IL DATABASE
    $db_selected=mysqli_select_db($connessione_al_server, "test");
    if(!$db_selected){
    die ('Errore nella selezione del database: errore '.mysqli_error());
    }
?>