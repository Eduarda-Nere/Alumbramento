<?php session_start(); ?>
<?php include("login_verificar.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Perfil</title>
    
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
       <section class="parallax-bg overlay-dark" style="background-image:url(img/perfil.jpg)" data-stellar-background-ratio="0.5">

    <!-- Section Title -->
        <div class="js-height-full container">
            <div class="intro-content white-color text-center vertical-section">
                <div class="vertical-content">
                <div class="testimonial-thumb">
                    <img class="img-responsive" src="img/testimonial/1.jpg" alt="">
                </div><br> <br>
                <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Olá <?php echo $_SESSION["nome"];?><h2>
                <div class="testimonial-item text-center">

            </div>
        </div>
    </section>
    <!-- End Intro -->

    <?php

try {
    
    $host='localhost';
    $username = 'root';
    $password = '';
    $db = 'alumbramento';
    $dbh = new PDO("mysql:host=$host;dbname=$db", $username , $password);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = $dbh->prepare("SELECT * from login WHERE email = '" . $_SESSION ['email']."'");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php

        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/><br><a href='index_logado.php'>voltar</a>";
        die();
    }
    ?>
    
    <!-- Start Regular Section -->
    <section id="team" class="p-top-80 p-bottom-80">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <!-- Section Title -->
                    <div class="m-bottom-30">
                        <h2 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">Perfil</h2>
                        <div class="divider-small wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s"></div>
                    </div>

                    <!-- === perfil Form === -->
                <div class="col-md-20 col-sm-20 p-bottom-30">
                    <div class="contact-form row">

                        <form action="update.php" method="post">
                            <div class="col-sm-10 contact-form-item wow zoomIn">
                                <label>Email</label>
                                <input name="email" id="email" type="email" style="background: #f5f5f5; border: 2px solid #CCCCCC; border-radius: 10px;color: #000 font-size: 0.9em; width: 100%; padding: 10px 15px;" value="<?php echo $result[0]["email"];?>" readonly/>
                            </div>
                            <div class="col-sm-10 contact-form-item wow zoomIn">
                                <label>Nome</label>
                                <input name="nome" id="nome" type="text" value="<?php echo $result[0]["nome"];?>"required/>
                            </div>
                            <div class="col-sm-10 contact-form-item wow zoomIn">
                                <label>Senha</label>
                                <input name="senha" id="senha" type="password" value="<?php echo $result[0]["senha"];?>" required/>
                            </div>
                            <div class="col-sm-12 contact-form-item"> 
                            <input class="send_message btn btn-main btn-theme wow fadeInUp" type="submit" value="Alterar">     
                                 
                            </div>

                        </form> 
                                    
                        <div class="clearfix"></div>
                        <div id="ajaxsuccess">Successfully sent!!</div>
                        <div class="clear"></div>

                    </div> <!-- /.contacts-form & inner row -->
                </div> <!-- /.col -->

                </div> <!-- /.col -->

                <!-- === Contact Information === -->
                <div class="col-md-6 col-sm-6 p-bottom-30">
                    <address class="contact-info">

                        <p class="m-bottom-30 wow slideInRight"><br><br><br><br>Instituto Federal de Educação, Ciência e Tecnologia de São Paulo, Campus Capivari</p>

                        <!-- === Location === -->
                        <div class="m-top-20 wow slideInRight">
                            <div class="contact-info-icon">
                                <i class="fa fa-location-arrow"></i>
                            </div>
                            <div class="contact-info-title">
                                Endereço:
                            </div>
                            <div class="contact-info-text">
                                 Av. Dr. Ênio Pires de Camargo, 2971 - Ribeirão
                            </div>
                        </div>

                        <!-- === Phone === -->
                        <div class="m-top-20 wow slideInRight">
                            <div class="contact-info-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="contact-info-title">
                                Telefone:
                            </div>
                            <div class="contact-info-text">
                                (19) 3199 8214 ou (19)3199 8215  
                            </div>
                        </div>

                        <!-- === email === -->
                        <div class="m-top-20 wow slideInRight">
                            <div class="contact-info-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-info-title">
                                Email:
                            </div>
                            <div class="contact-info-text">
                            cbi.cpv@ifsp.edu.br
                            </div>
                        </div>
                    </address>
                </div> <!-- /.col -->

            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
    <!-- End Regular Section -->

    <!-- Start Contact -->
    <section id="contact" class="p-top-80 p-bottom-50">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- Section Title -->
                    <div class="section-title text-center m-bottom-40">
                        <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Deletar conta</h2>
                        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.1s"></div>
                        <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"><em>Quer deletar sua conta permanentemente? Clique no botão abaixo.</em></p><p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"><em><b> Atenção: </b> Depois de concluído a ação não poderá ser desfeita.</em></p>
                    </div>
                </div> <!-- /.col -->
            </div>  <!-- /.row -->

            <div class="row">

                <!-- === Contact Form === -->
                <div class="col-md-8 col-sm-8 p-bottom-30">
                    <div class="contact-form row">
                        <div class="container">
                        <div class="testimonial-item text-center">
                        <form action="excluir.php" method="post">
                            
                            <div class="col-sm-8 contact-form-item wow zoomIn">
                                <input name="email" id="email" type="text" value="<?php echo $result[0]["email"];?>" readonly/>
                            </div>
                            <div class="contact-form-item">
                                <button type="submit" class="send_message btn btn-main btn-theme wow fadeInUp" name="excluir" id="excluir" data-lang="en"><i class="fa fa-trash"></i>&nbsp;&nbsp; Deletar conta</button>
                            </div>
                        </form> 
                        </div>
                    </div>
                    </div> <!-- /.contacts-form & inner row -->
                </div> <!-- /.col -->
            </div>
        </div>
    </section>


   <?php if($_SESSION["perfil"]== "adm"){ ?>

    <!-- Start Regular Section -->
    <section id="team" class="p-top-80 p-bottom-80">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <!-- Section Title -->
                    <div class="m-bottom-30">
                        <h2 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">Criar conta para Administrador</h2>
                        <div class="divider-small wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s"></div>
                    </div>

                    <!-- === perfil Form === -->
                <div class="col-md-20 col-sm-20 p-bottom-30">
                    <div class="contact-form row">

                        <form action="criar_conta_adm.php" method="post">
                            <div class="col-sm-10 contact-form-item wow zoomIn">
                                <label>Email</label>
                                <input name="email" id="email" type="email" style="background: #f5f5f5; border: 2px solid #CCCCCC; border-radius: 10px;color: #000 font-size: 0.9em; width: 100%; padding: 10px 15px;" required/>
                            </div>
                            <div class="col-sm-10 contact-form-item wow zoomIn">
                                <label>Nome</label>
                                <input name="nome" id="nome" type="text" required/>
                            </div>
                            <div class="col-sm-10 contact-form-item wow zoomIn">
                                <label>Senha</label>
                                <input name="senha" id="senha" type="password" required/>
                            </div>
                            
                            <p class="col-sm-10 contact-form-item wow zoomIn" >
                            <label for="perfil">Perfil&nbsp;</label>
                            <select style="background: #f5f5f5; border: 2px solid #CCCCCC; border-radius: 10px;color: #000 font-size: 0.9em; width: 100%; padding: 10px 15px;" name="perfil" id="perfil" required>
                                <option value="">Selecione</option>
                                <option value="usuario comum">Usuário comum</option>
                                <option value="adm">Administrador</option>
                            </select>
                            </p>

                            <div class="col-sm-12 contact-form-item"> 
                            <input class="send_message btn btn-main btn-theme wow fadeInUp" type="submit" value="Criar conta">            
                            </div>
                        </form> 
                                    
                        <div class="clearfix"></div>
                        <div id="ajaxsuccess">Successfully sent!!</div>
                        <div class="clear"></div>

                    </div> <!-- /.contacts-form & inner row -->
                </div> <!-- /.col -->

                </div> <!-- /.col -->

                <div class="col-md-6">

                    <div class="feature-image">
                        <img src="img/cadastroadm.jpg" alt="Feature Image" class="img-responsive wow fadeInRight" data-wow-duration="1s"/>
                    </div>                  
                    
                </div> <!-- /.col -->

            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
    <!-- End Regular Section -->

    <?php } ?>

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