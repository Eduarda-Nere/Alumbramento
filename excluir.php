<?php session_start(); ?>
<?php include("login_verificar.php"); ?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Excluir conta</title>
    
    <meta name="description" content="N.Agency - Responisve Landing Page for Agency">
    <meta name="keywords" content="">
    <meta name="author" content="tabthemes">
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="img/alumbramento.png">
    <link rel="apple-touch-icon" sizes="57x57" href="img/alumbramento.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/alumbramento.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/alumbramento.png">
    
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- CSS Files For Plugin -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/font-awesome/font-awesome.min.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet" />
    <link href="css/YTPlayer.css" rel="stylesheet" />
    
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  </head>
<body class="bg-light">

  <?php include("menu_off.php"); ?>

<div class="container">

    <?php
    

        try {
            $host='localhost';
            $username = 'root';
            $password = '';
            $db = 'alumbramento';
            $dbh = new PDO("mysql:host=$host;dbname=$db", $username , $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $dbh->prepare("delete from login where email = ?;");
            $stmt->bindParam(1, $email);

            $email = $_SESSION["email"];

            if($stmt->execute()) 
                ?>
                <br>
                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Aviso</h4>
                <p>Conta deletada permanentemente com sucesso!</p>
                <hr>
                
                <a href="index.php" class="btn btn-main btn-theme" >
                    <span class='bi-reply'></span>&nbsp;Voltar</a>   
                </div>

                <?php

        } catch (PDOException $e) {
            echo '<br>';
            echo '<div class="alert alert-danger" role="alert">';
            echo '<h4 class="alert-heading">Ops!</h4>';
            echo '<p>Algo deu errado! Tente Novamente.</p>';
            echo '<hr>';
            echo '';
            echo "<a href='index.php' class='btn btn-main btn-theme'><span class='bi-reply'></span>&nbsp;Voltar</a>";
            echo '</div>';

            die();
        }

    ?>

</div>

</body>
</html>