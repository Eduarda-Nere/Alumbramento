<?php
if(empty($_SESSION["email"]) ){
    session_destroy ();
    header("Location: index.php");
}
?>