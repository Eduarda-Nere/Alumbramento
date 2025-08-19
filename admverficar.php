<?php
if(empty($_SESSION["perfil"]) ){
    if ($_SESSION["perfil"]!="adm"){
        session_destroy ();
        header("Location: index.php");
    }
}
?>