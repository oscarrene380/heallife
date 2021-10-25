<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HealLife</title>

    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
    <link href="css/nivo-lightbox.css" rel="stylesheet" />
    <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
    <link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
    <link href="css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">

    <!-- boxed bg -->
    <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
    <!-- template skin -->
    <link id="t-colors" href="color/default.css" rel="stylesheet">


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <div id="wrapper">

        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="top-area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <p class="bold text-left">Lunes - Domingo, 6am a 10pm </p>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <p class="bold text-right">Llama ahora al +503 2222 2222</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container navigation">

                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-main-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <img src="img/logo.png" alt="" width="150" height="40" />
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#intro">Inicio</a></li>
                        <li><a href="#service">Servicios</a></li>
                        <li><a href="#doctor">Programas</a></li>
                        <li><a href="#facilities">Instalaciones</a></li>
                        <li><a href="#pricing">Sobre nosotros</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mas <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= URL ?>login">Iniciar Sesion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>


        <!-- Section: intro -->
        <section id="intro" class="intro">
            <div class="intro-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                                <h2 class="h-ultra">Grupo Medico Fundeso</h2>
                            </div>
                            <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                                <h4 class="h-light">Proveemos <span class="color">la mejor calidad de cuidados</span>
                                    para ti</h4>
                            </div>
                            <div class="well well-trans">
                                <div class="wow fadeInRight" data-wow-delay="0.1s">

                                    <ul class="lead-list">
                                        <li><span class="fa fa-check fa-2x icon-success"></span> <span
                                                class="list"><strong>Precios y atencion a tu alcance</strong><br />No
                                                tienes que preocuparte por los precios, ya que son muy comodos</span>
                                        </li>
                                        <li><span class="fa fa-check fa-2x icon-success"></span> <span
                                                class="list"><strong>Escoge tu medico preferido</strong><br />Puedes
                                                escoger tu medico de preferencia para mas comodidad</span></li>
                                        <li><span class="fa fa-check fa-2x icon-success"></span> <span
                                                class="list"><strong>Ambiente amigable</strong><br />Un ambiente
                                                amigable y profesional es lo que ofrecemos</span></li>
                                    </ul>

                                </div>
                            </div>


                        </div>
                        <div class="col-lg-6">
                            <div class="form-wrapper">
                                <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

                                    <div class="panel panel-skin">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Programa
                                                un cita <small>(Es gratis!)</small></h3>
                                        </div>
                                        <div class="panel-body">

                                            <img src="img/bg-clinica.jpg" height="320px" width="" alt="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- /Section: intro -->

        <section id="callaction" class="home-section paddingtop-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="callaction bg-gray">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="cta-text">
                                            <h3>En una emergencia? Necesita agendar una cita ahora?</h3>
                                            <p>Programe su cita de forma facil, solo necesita registrarse y acceder a
                                                nuestra plataforma.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                                        <div class="cta-btn">
                                            <a href="#" class="btn btn-skin btn-lg">Hacer una cita.</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Section: boxes -->
        <section id="boxes" class="home-section paddingtop-80">

            <div class="container marginbot-50">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="section-heading text-center">
                                <h2 class="h-bold">Pasos</h2>

                            </div>
                        </div>
                        <div class="divider-short"></div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-md-3">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="box text-center">

                                <i class="fa fa-check fa-3x circled bg-skin"></i>
                                <h4 class="h-bold">Haz tu cita</h4>
                                <p>
                                    Es muy facil solo hace falta que te registres y estaras listo para tu proceso de
                                    citas.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="box text-center">

                                <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
                                <h4 class="h-bold">Escoge la fecha</h4>
                                <p>
                                    Elige la fecha que mas te sea conveniente para tu beneficio.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="box text-center">
                                <i class="fa fa-user-md fa-3x circled bg-skin"></i>
                                <h4 class="h-bold">Escoge tu medico</h4>
                                <p>
                                    Escoge al medico con el que tengas mas confianza o te sientas comodo.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="box text-center">

                                <i class="fa fa-hospital-o fa-3x circled bg-skin"></i>
                                <h4 class="h-bold">Obten tu cita rapido</h4>
                                <p>
                                    Una vez hecho todo lo anterior ya tendras tu cita programada, recuerda estar 10 min
                                    antes de la cita.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /Section: boxes -->




        <!-- Section: services -->
        <section id="service" class="home-section nopadding paddingtop-60">

            <div class="container">

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <img src="img/dummy/img-1.jpg" class="img-responsive" alt="" />
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">

                        <div class="wow fadeInRight" data-wow-delay="0.1s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-stethoscope fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">chequeos medicos</h5>
                                    <p>Haces chequeos medicos antes que nada para saber tu estado actual.</p>
                                </div>
                            </div>
                        </div>

                        <div class="wow fadeInRight" data-wow-delay="0.2s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-wheelchair fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">Servicios de enfermeria</h5>
                                    <p>Nuestro servicios de enfermeria a tu dispocicion en todo momento.</p>
                                </div>
                            </div>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.3s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-plus-square fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">Farmacia</h5>
                                    <p>Contamos con servicios de farmacias a tu alcance.</p>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-sm-3 col-md-3">

                        <div class="wow fadeInRight" data-wow-delay="0.1s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-h-square fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">Area de ginmasio</h5>
                                    <p>Contamos un area de ejercicio para mantener un buen estado fisico.</p>
                                </div>
                            </div>
                        </div>

                        <div class="wow fadeInRight" data-wow-delay="0.2s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-filter fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">Neurologia</h5>
                                    <p>Contamos con medicos especializados en neurologia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.3s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-user-md fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">Sala de descanso</h5>
                                    <p>Un sala en la que puedes tomar siesta para descansar.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- /Section: services -->


        <!-- Section: team -->
        <section id="doctor" class="home-section bg-gray paddingbot-60">
            <div class="container marginbot-50">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="section-heading text-center">
                                <h2 class="h-bold">Programas</h2>
                                <p>Estamos contigo en todo momento, puedes unirte a nuestros programas y preguntas mas
                                    al respecto</p>
                            </div>
                        </div>
                        <div class="divider-short"></div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">


                        <div id="grid-container" class="cbp-l-grid-team">
                            <ul>
                                <li class="cbp-item psychiatrist">
                                    <a href="#" class="cbp-caption cbp-singlePage">
                                        <div class="cbp-caption-defaultWrap">
                                            <img src="img/team/1.png" alt="" width="100%">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body">
                                                    <div class="cbp-l-caption-text">ver mas</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="cbp-singlePage cbp-l-grid-team-name">Clinica A</a>
                                    <div class="cbp-l-grid-team-position">Cuscatlan</div>
                                </li>
                                <li class="cbp-item cardiologist">
                                    <a href="#" class="cbp-caption cbp-singlePage">
                                        <div class="cbp-caption-defaultWrap">
                                            <img src="img/team/2.png" alt="" width="100%">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body">
                                                    <div class="cbp-l-caption-text">ver mas</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="cbp-singlePage cbp-l-grid-team-name">Clinica B</a>
                                    <div class="cbp-l-grid-team-position">San Salvador</div>
                                </li>
                                <li class="cbp-item cardiologist">
                                    <a href="#" class="cbp-caption cbp-singlePage">
                                        <div class="cbp-caption-defaultWrap">
                                            <img src="img/team/3.png" alt="" width="100%">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body">
                                                    <div class="cbp-l-caption-text">ver mas</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="cbp-singlePage cbp-l-grid-team-name">Clinica A</a>
                                    <div class="cbp-l-grid-team-position">Cuscatlan</div>
                                </li>
                                <li class="cbp-item neurologist">
                                    <a href="#" class="cbp-caption cbp-singlePage">
                                        <div class="cbp-caption-defaultWrap">
                                            <img src="img/team/4.png" alt="" width="100%">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body">
                                                    <div class="cbp-l-caption-text">ver mas</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="cbp-singlePage cbp-l-grid-team-name">Clinica B</a>
                                    <div class="cbp-l-grid-team-position">San Salvador</div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /Section: team -->



        <!-- Section: works -->
        <section id="facilities" class="home-section paddingbot-60">
            <div class="container marginbot-50">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="section-heading text-center">
                                <h2 class="h-bold">Nuestras instalaciones</h2>
                                <p>Ten un vistazo de nuestras instalaciones para te familiarices</p>
                            </div>
                        </div>
                        <div class="divider-short"></div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="wow bounceInUp" data-wow-delay="0.2s">
                            <div id="owl-works" class="owl-carousel">
                                <div class="item"><a href="img/photo/1.jpg" title="This is an image title"
                                        data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/1@2x.jpg"><img
                                            src="img/photo/1.jpg" class="img-responsive" alt="img"></a></div>
                                <div class="item"><a href="img/photo/2.jpg" title="This is an image title"
                                        data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/2@2x.jpg"><img
                                            src="img/photo/2.jpg" class="img-responsive " alt="img"></a></div>
                                <div class="item"><a href="img/photo/3.jpg" title="This is an image title"
                                        data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/3@2x.jpg"><img
                                            src="img/photo/3.jpg" class="img-responsive " alt="img"></a></div>
                                <div class="item"><a href="img/photo/4.jpg" title="This is an image title"
                                        data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/4@2x.jpg"><img
                                            src="img/photo/4.jpg" class="img-responsive " alt="img"></a></div>
                                <div class="item"><a href="img/photo/5.jpg" title="This is an image title"
                                        data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/5@2x.jpg"><img
                                            src="img/photo/5.jpg" class="img-responsive " alt="img"></a></div>
                                <div class="item"><a href="img/photo/6.jpg" title="This is an image title"
                                        data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/6@2x.jpg"><img
                                            src="img/photo/6.jpg" class="img-responsive " alt="img"></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Section: works -->



        <!-- Section: pricing -->
        <section id="pricing" class="home-section bg-gray paddingbot-60">
            <div class="container marginbot-50">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                            <div class="section-heading text-center">
                                <h2 class="h-bold">Nuestras Especialidades</h2>
                                <p>Diferentes especialidades a tu alcance para que todo sea mas simple</p>
                            </div>
                        </div>
                        <div class="divider-short"></div>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="row">

                    <div class="col-sm-4 pricing-box">
                        <div class="wow bounceInUp" data-wow-delay="0.1s">
                            <div class="pricing-content general">

                                <h3><img src="img/pediatria.jpg" class="servicios" alt=""></h3>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 pricing-box featured-price">
                        <div class="wow bounceInUp" data-wow-delay="0.3s">
                            <div class="pricing-content featured">
                                <h2>Desde medicina general</h2>
                                <h3>Nuestras especialidades</h3>
                                <ul>
                                    <li>Pediatria <i class="fa fa-check icon-success"></i></li>
                                    <li>Cirugia <i class="fa fa-check icon-success"></i></li>
                                    <li>Ginecologia <i class="fa fa-check icon-success"></i></li>
                                    <li>Psiquitria <i class="fa fa-check icon-success"></i></li>
                                    <li>Cirugia dental <i class="fa fa-check icon-success"></i></li>
                                    <li>Nutricion <i class="fa fa-check icon-success"></i></li>
                                    <li>Optometria <i class="fa fa-check icon-success"></i></li>
                                    <li>Fisioterapia <i class="fa fa-check icon-success"></i></li>
                                    <li>Enfermedia <i class="fa fa-check icon-success"></i></li>
                                    <li>Neurologia <i class="fa fa-check icon-success"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 pricing-box">
                        <div class="wow bounceInUp" data-wow-delay="0.2s">
                            <div class="pricing-content general last">

                                <h3><img src="img/embarazo.png" class="servicios" alt=""></h3>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- /Section: pricing -->



        <footer>

            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5>Acerca de Fundeso</h5>
                                <p>
                                    La Clínica Asistencial de Antiguo Cuscatlán nace con el fin de apoyar las distintas
                                    comunidades que lo necesitan, promoviendo el bienestar social a través de la salud y
                                    sus diferentes programas sociales
                                </p>
                            </div>
                        </div>
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5>Informacion</h5>
                                <ul>
                                    <li><a href="#">Instalacion</a></li>
                                    <li><a href="#">Laboratorio</a></li>
                                    <li><a href="#">tratamiento medico</a></li>
                                    <li><a href="#">Condiciones & terminos</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5>Fundeso Quezaltepeque</h5>
                                <p>
                                    La Clínica Asistencial de Quezaltepeque nace con el fin de expandir los proyectos
                                    sociales, que dispone FUNDESO.

                                    Atención en consultas, general y especialidades, además de enfermería.
                                </p>
                                <ul>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
                                        </span> Lunes - Domingo, 6am to 10pm
                                    </li>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                        </span> +503 2222 2222
                                    </li>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                                        </span> fundeso@medicio.com
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5>Encuentranos en:</h5>
                                <p>Calle Antiguo Cuscatlan, Antiguo Cuscatlán</p>

                            </div>
                        </div>
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5>Siguenos en</h5>
                                <ul class="company-social">
                                    <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="wow fadeInLeft" data-wow-delay="0.1s">
                                <div class="text-left">
                                    <p>&copy;Copyright 2020 - Fundeso. All rights reserved.</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="wow fadeInRight" data-wow-delay="0.1s">
                                <div class="text-right">
                                    <p>By Heallife</p>
                                </div>
                                <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Medicio
                    -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.scrollTo.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/stellar.js"></script>
    <script src="plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/nivo-lightbox.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>