<?php session_start(); ?>
<?php include("login_verificar.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Comentários</title>
    
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

  <?php include("menu_online.php"); ?>

    <!-- Section Title Portfolio -->
    <div class="section-title-bg text-center">
        <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Comentários</h2>
          <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.1s"></div>
    </div>

     <section class="blog-index">

<div class="container clearfix">

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET["isbn"])){
    $_SESSION["isbn_livro"] = $_GET["isbn"];
  }
}
?>

<div class="contact-form-item">
  <a href="forum.php">
  	<button type="submit" class="btn-main btn-theme" name="voltar" id="voltar">
  		<i class="fa fa-rotate-left"></i>&nbsp;&nbsp; Voltar </button></a> &nbsp;&nbsp; 

  <a href="comentario_add_form.php">
    <button type="submit" class="btn-main btn-theme" name="comentario" id="comentario">
    	<i class="fa fa-comment"></i>&nbsp;&nbsp; Comentar </button></a> &nbsp;&nbsp;
      
    </div><br><br>

<?php

echo "<input type='hidden' id='id_ciclo' name='isbn_livro' value='".$_SESSION["isbn_livro"]."'>";

include("banco_dados_conexao_acervo.php");
try {
  $sth = $dbh->prepare('select * from livro where isbn = '.$_SESSION["isbn_livro"].' ');
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  $titulo = $result[0]["titulo"];
  $autor = $result[0]["autor"];
  
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/><br><a href='forum.php'>voltar</a>";
  die();
}	
		echo "<h2 class='wow fadeInDown' data-wow-duration='1s' data-wow-delay='0.6s'>$titulo</h2>";
		
if(isset($_SESSION["isbn_livro"])) {

  try {
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sth = $dbh->prepare('select id, comentario from forum where isbn_livro = '.$_SESSION["isbn_livro"].' ');
    $sth->execute();
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		
		// escrevendo cabeçalho a partir dos índices do vetor FETCH_ASSOC

		echo '<div class="table-responsive"> ';

   	echo '<div class="blog wow zoomIn" data-wow-duration="1s" data-wow-delay="0.7s">
                    <div class="blog-media"></div>';

    echo ' <div class="blog-post-body">';
   	echo '<table class="table">';
		echo "<thead>";
		echo "<tr>";
        
		foreach($result[0] as $index=>$values) {
			echo "<th><a class='read-more'>$index</a></th>";
		}
		echo "<th></th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";


		// escrevendo resultado do SELECT
		foreach($result as $row) {
			echo "<tr>";
			foreach($row as $value){
				echo "<td>$value</td>";
			}
			echo "<td>";

			if($_SESSION["perfil"]== "adm"){ 

			echo "<a href='comentario_excluir.php?id=".$row["id"]."'>";
			echo '<i class="bi bi-x-square"> &nbsp;&nbsp; Excluir</i>';
			echo "</a>";

			}
			
			echo "</td>";
			echo "</tr>";
		}

		echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

		$dbh = null;
	} catch (PDOException $e) {
		print ""Error!: " . $e->getMessage()" . "<br/><br><a href='forum.php'>voltar</a>";
		die();
	}
}
?>

</section>



    <!-- Back to top -->
    <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a>
    <!-- /Back to top -->

    
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- Components Plugin -->
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/smooth-scroll.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/jquery.countTo.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/jquery.mb.YTPlayer.js"></script>
    <script src="js/retina.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="inc/owlcarousel/js/owl.carousel.min.js"></script>
    
    <!-- Custom Plugin -->
    <script src="js/custom.js"></script>
    
  </body>
</html>