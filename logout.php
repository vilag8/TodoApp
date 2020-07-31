<?php
    session_start(); 
    include("db_con.php"); // Include il file di connessione al database
    
    // cancello tutti i dati di sessione
    $_SESSION = array();

    // Cancello l'eventuale cookie di sessione
    if (isset($_COOKIE[session_name()]))
    {
    setcookie(session_name(), '', time()-42000, '/');
    }

    // distruggo la sessione
    session_destroy();
    header('location:index.php?Sei-uscito-correttamente')
?>