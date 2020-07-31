<?php
    include("db_con.php"); // Include il file di connessione al database
    session_start();// come sempre prima cosa, aprire la sessione 
    
    $_SESSION["username"]=$_POST["username"]; // con questo associo il parametro username che mi è stato passato dal form alla variabile SESSION username
    $_SESSION["password"]= md5($_POST["password"]); // con questo associo il parametro username che mi è stato passato dal form alla variabile SESSION password
    $protectUsername= mysqli_real_escape_string($connessione_al_server, $_SESSION["username"]);
    $protectPassowrd= mysqli_real_escape_string($connessione_al_server, $_SESSION["password"]);


    $query = "SELECT * FROM users WHERE username='".$_POST["username"]."' AND password ='".$_SESSION["password"]."'";  //per selezionare nel db l'utente e pw che abbiamo appena scritto nel log
    
    $trova_utente=mysqli_query($connessione_al_server, $query);
    if(!$trova_utente){
        die('RICHIESTA FALLITA');
    }

    while($row = mysqli_fetch_array($trova_utente)){
        $idUtente=$row['id_user'];
        $nomeUtente=$row['username'];
        $passUtente=$row['password'];
    }
    
    //se c'è una persona con quel nome nel db allora loggati
    if($_SESSION["username"]===$nomeUtente && $_SESSION["password"]===$passUtente){ 
        
        $_SESSION["id"]=$idUtente;
        header("Location:welcome.php?login-effettuato");
    }else{
        header("Location:accedi.php?Credenziali-errate");    }
?>