<script>
    function forum(){
       alert('Por favor, faça login para acessar o fórum.');
       window.location.href = "log-in.html";
    }
</script>

<!-- Start Navigation -->
    <header class="nav-solid" id="home">

        <nav class="navbar navbar-fixed-top">
            <div class="navigation">
                <div class="container-fluid">
                    <div class="row">

                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                                <span class="sr-only">Alternar de navegação</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <!-- Logo -->
                           <div class="logo-container">
                            <div class="logo-wrap local-scroll">
                                <a href="#home">
                                <img class="logo" src="img/alumbramento.png" alt="logo" height="60" width="60">
                                        <a href="index.php" style="font-family: 'Montserrat', sans-serif;font-weight: 600; color: #434343; font-size: 13px; text-transform: uppercase;">&nbsp; Alumbramento</a>
                                    </a>
                                </div>
                            </div>
                        </div> <!-- end navbar-header -->

                        <div class="col-md-8 col-xs-12 nav-wrap">
                            <div class="collapse navbar-collapse" id="navbar-collapse">

                                <ul class="nav navbar-nav navbar-right">
                                    <li><a data-scroll href="#home">Home</a></li>
                                    <li><a target="_blank" href="http://pergamum.biblioteca.ifsp.edu.br/">Pergamum</a></li>
                                    <li><a data-scroll href="#temas">Sobre</a></li>
                                    <li><a data-scroll href="#team">Quem somos?</a></li>
                                    <li><a href="#" onclick="forum();">Fórum</a></li>                       
                                    <li><a href="log-in.html"><i class="fa fa-user"></i>&nbsp; &nbsp; Login </a>
                                </ul>

                            </div>
                        </div> <!-- /.col -->

                    </div> <!-- /.row -->
                </div> <!--/.container -->
            </div> <!-- /.navigation-overlay -->
        </nav> <!-- /.navbar -->

    </header>
    <!-- End Navigation -->