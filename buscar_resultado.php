<?php session_start(); ?>
<?php include("login_verificar.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Fórum</title>
    
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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
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
  </head>
  <body class="blog_index" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="100">
    
    
    <!-- Preloader -->
    <div id="preloader">
        <div id="spinner"></div>
    </div>
    <!-- End Preloader-->

    
    <?php include("menu_online.php"); ?>

    <!-- Start Intro -->
       <section class="parallax-bg overlay-dark" style="background-image:url(img/forum.png)" data-stellar-background-ratio="0.5">

    <!-- Section Title -->
        <div class="js-height-full container">
            <div class="intro-content white-color text-center vertical-section">
                <div class="vertical-content">
                <h2 class="wow zoomIn m-bottom-20" data-wow-duration="1s" data-wow-delay="0.6s">Fórum</h2>
                <div class="testimonial-item text-center">
                    <p class="wow fadeInDown testimonial-desc" data-wow-duration="1s" data-wow-delay="0.8s">"Renda-se, como eu me rendi. Mergulhe no que você não conhece como eu mergulhei. Não se preocupe em entender, viver ultrapassa qualquer entendimento."</p>
                    <h5 class="testimonial-author">CLARICE LISPECTOR</h5>
                </div>
               
                </div>
            </div>
            <!-- Scroll Down -->
            <div class="scroll-next">
                <a data-scroll href="#temas" class="scroll-down"><i class="fa fa-angle-down scroll-down-icon"></i></a>
            </div>
            <!-- End Scroll Down -->
        </div>
    </section>
    <!-- End Intro -->

    <section id="temas" class="p-top-80 p-bottom-50">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- Section Title -->
                    <div class="section-title text-center m-bottom-40">
                        <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Biblioteca IFSP</h2>
                        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.1s"></div>
                        <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"><em>Olá <?php echo $_SESSION["nome"];?>! Que tal compartilhar suas impressões dos livros que já leu? <br> Confira abaixo uma lista de livros disponiveis na biblioteca do Câmpus Capivari.</em></p>
                    </div>
                </div> <!-- /.col -->
            </div>  <!-- /.row -->
        </div>
    </section>

    <div class="container">
    <?php
    
    include("banco_dados_conexao_acervo.php");
    
    try {
    
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $dbh->prepare('SELECT * from livro WHERE titulo = ?');
        $stmt->bindParam(1, $titulo);
        $titulo = $_POST["titulo"];
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


        echo '<div class="table-responsive"> ';

        echo '<div class="blog wow zoomIn" data-wow-duration="1s" data-wow-delay="0.7s">
                    <div class="blog-media"></div>';

        echo ' <div class="blog-post-body">';
        
        echo '<table class="table">';
        echo "<thead>";
        echo "<tr><th></th>";
        
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
            echo "<td>";
            echo "<a href='livro.php?isbn=".$row["isbn"]."'>";
            echo '<i class="fa fa-comment"></i>';
            echo "</a>";
            echo "</td>";
            foreach($row as $value){
                echo "<td>$value</td>";
            }
            echo "<td>";

            if($_SESSION["perfil"]== "adm"){ 

            echo "<a href='livro_editar.php?isbn=".$row["isbn"]."'>";
            echo '<i class="bi bi-pencil"></i>';
            echo "</a>";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<a href='livro_excluir.php?isbn=".$row["isbn"]."'>";
            echo '<i class="bi bi-x-square"></i>';
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
        print "Error!: " . $e->getMessage() . "<br/><br><a href='forum.php'>voltar</a>";
        die();
    }

    
    ?>

    <br><br>
    <div class="contact-form-item">
        <a href="forum.php">
            <button type="submit" class="btn-main btn-theme" name="voltar" id="voltar">
                <i class="fa fa-rotate-left"></i>&nbsp;&nbsp; Voltar </button></a> &nbsp;&nbsp;
            </div> 
        </div>
   
    <!-- Start Footer -->
    <footer class="site-footer">
        <div class="container">
            <small class="copyright pull-left">Copyrights © 2019 All Rights Reserved By <a href="http://www.tabthemes.com/">tabthemes</a>.</small>
            <div class="social-icon pull-right">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
                <a href="#"><i class="fa fa-google"></i></a>
                <a href="#"><i class="fa fa-rss"></i></a>
                <a href="#"><i class="fa fa-globe"></i></a>
            </div>
            <!-- /social-icon -->
        </div>
        <!-- /container -->
    </footer>
    <!-- End Footer -->


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