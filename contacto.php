<!-- Abro PHP -->
<?php
//Definir las variables y establecer valores vacíos
$nameErr = $apellidoErr = $emailErr = $subjectErr = $messageErr = "";//todos los Err valen nada
$name = $apellido = $email = $subject = $message = "";//estas variables no valen nada

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //validación del nombre
    if(empty($_POST["name"])) {
        $nameErr = "El nombre es obligatorio";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Sólo se permitn letras y espacios en blanco";
        }
    }
    //validación del apellido
    if(empty($_POST["apellido"])) {
        $apellidoErr = "El apellido es obligatorio";
    } else {
        $apellido = test_input($_POST["apellido"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $apellido)) {
            $apellidoErr = "Sólo se permitn letras y espacios en blanco";
        }
    }

    //validación del correo electrónico
    if(empty($_POST["email"])) {
        $emailErr = "El correo electrónico es obligatorio";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de correo inválido";
        }
    }

    //Validación del asunto
    if(empty($_POST["subject"])) {
        $subjectErr = "El asunto es obligatorio";
    } else {
        $subject = test_input($_POST["subject"]);
    }

    //validación del mensaje
    if(empty($_POST["message"])) {
        $messageErr = "El mensaje es obligatorio";
    } else {
        $message = test_input($_POST["message"]);
    }

    //Si no hay errores, vamos a procesar el formulario enviándolo por correo
    if($nameErr == "" && $apellidoErr == "" && $emailErr == "" && $subjectErr == "" && $messageErr == "") {
        $to = "elcorreodondevaallegar@hotmail.com";//aquí el correo donde queréis mandarlo
        $headers =  "From: " .$email."\r\n". 
                    "Reply-to: ".$email."\r\n".
                    "X-Mailer: PHP/".phpversion();
        $full_message = "Nombre: $name\nApellido: $apellido\n Correo: $email\n\nMensaje:\n$message";
        if (mail($to, $subject,$full_message,$headers)) {
            echo "<h3 class='fixed-bottom ms-4' style='color:green'>Gracias por contactarnos, $name. Te responderemos lo antes posible.</h3>";
            $name = $apellido = $email = $subject = $message = "";
        } else {
            echo "<h3 class='fixed-bottom ms-4' style='color:red'>Lo siento, ocurrió un error al enviar tu mensaje. Inténtalo de nuevo.</h3>";
        }
        //limpiar los valores después de enviar
        $name = $apellido = $email = $subject = $message = "";
        
    }
}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!-- cierro PHP -->




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>IbizaTransfer » Contacto</title>
    <link rel="icon" href="images/favicon-32x32.png" type="image/x-icon" />


    <!-------------- CSS FILES -------------->
    <!-- fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- BootStrap links -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <!-- My Style Sheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .error{
            color:red;
        }

    </style>
</head>

<body>

    <main>

        <header class="site-header d-lg-block d-none">
            <div class="container">
                <div class="row">

                    <div class="col-12 d-flex flex-wrap">
                        <p class="d-flex me-5 mt-1 mb-0">
                            <i class="bi bi-telephone-fill custom-icon me-2"></i>
                            <a href="https://whatsapp.com" class="text-tlf">+34 639 943 284</a>
                        </p>

                        <ul class="social-icon d-flex align-items-center justify-content-center">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-facebook"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-twitter"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-instagram"></span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </header>


        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo-no-background2.png" width="260" height="75">
                </a>



                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="servicios.html">Servicios</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="flota.html">Flota</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="tarifas.html">Tarifas</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link btn custom-btn d-lg-block d-none" href="contacto.php">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <section class="contacto-section">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-11 mx-auto mt-4 mt-lg-0">

                        <form class="custom-form ticket-form mb-5 mb-lg-5 mt-5" method="post"
                            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                            <h2 class="text-center mb-4 mb-lg-5">Contacta con<span class="subrayar"> nosotros</span>
                            </h2>

                            <div class="ticket-form-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">

                                        Nombre:
                                        <span class="error">
                                            <?php echo $nameErr;?>
                                        </span>
                                        <input type="text" name="name" value="<?php echo $name;?>" class="form-control">
                                        

                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">

                                        Apellidos:
                                        <span class="error">
                                            <?php echo $apellidoErr;?>
                                        </span>
                                        <input type="text" name="apellido" value="<?php echo $apellido;?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>



                            Correo electrónico:
                            <span class="error">
                                <?php echo $emailErr;?>
                            </span>
                            <input type="email" name="email" value="<?php echo $email;?>"
                                class="form-control">
                            

                            Asunto:
                            <span class="error">
                                <?php echo $subjectErr;?>
                            </span>
                            <input type="text" name="subject" value="<?php echo $subject;?>"
                                class="form-control">
                            

                            Mensaje: 
                            <span class="error">
                                <?php echo $messageErr;?>
                            </span>
                            <textarea name="message" rows="5" cols="40"
                                class="form-control"><?php echo $message;?></textarea>
                            

                            
                            <input type="submit" name="submit" value="Enviar" class="form-control">
                        </form>





                    </div>
                </div>
        </section>
    </main>


    <!----------------------------- FOOTER ----------------------------->
    <footer class="site-footer">
        <div class="site-footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 ">
                        <h2 class="text-white">IbizaTransfer<span class="smallertitle"> Luxury.</span></h2>
                    </div>

                    <div class="col-lg-6 col-12 d-flex justify-content-lg-end align-items-center pe-lg-5 pe-0">
                        <ul class="social-icon d-flex justify-content-lg-end">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-twitter"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-apple"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-instagram"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-youtube"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-footer-med">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-4 pb-2">
                        <h5 class="site-footer-title mb-3">Links</h5>

                        <ul class="site-footer-links">
                            <li class="site-footer-link-item">
                                <a href="index.html" class="site-footer-link">Inicio</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="servicios.html" class="site-footer-link">Servicios</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="flota.html" class="site-footer-link">Flota</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="tarifas.html" class="site-footer-link">Tarifas</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="contacto.html" class="site-footer-link">Contacto</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="sitemap.html" class="site-footer-link">Mapa del sitio</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <h5 class="site-footer-title mb-3">¿Preguntas?</h5>

                        <p class="text-white d-flex mb-1">
                            <a href="tel: +34 639 943 284" class="site-footer-link">
                                <i class="bi bi-telephone text-white me-2"></i>+34 639 943 284
                            </a>
                        </p>

                        <p class="text-white d-flex">
                            <a href="mailto:hello@company.com" class="site-footer-link">
                                contacto@ibizatransfer.com
                            </a>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 col-11 mb-4 mb-lg-0 mb-md-0">
                        <h5 class="site-footer-title mb-3">Ubicación</h5>

                        <p class="text-white d-flex mt-3 mb-2">
                            C. del Far, 22, 07820 Sant Antoni de Portmany, Illes Balears</p>

                        <a class="link-fx-1 color-contrast-higher mt-3"
                            href="https://maps.app.goo.gl/GsEARsrbHc3mu4wU9">
                            <span>Abre Maps</span>
                            <svg class="icon" viewBox="0 0 32 32" aria-hidden="true">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="16" cy="16" r="15.5"></circle>
                                    <line x1="10" y1="18" x2="16" y2="12"></line>
                                    <line x1="16" y1="12" x2="22" y2="18"></line>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-12 mt-5">
                        <p class="copyright-text">Copyright © 2024 IbizaTransfer Company</p>
                        <p class="copyright-text">Creado por: <a
                                href="https://gutizzz.000webhostapp.com">antoniogutiérrez</a></p>
                    </div>

                    <div class="col-lg-8 col-12 mt-lg-5 d-flex justify-content-end mt-3 mt-lg-0 ">

                        <div class="col-lg-2 text-center">
                            <ul class="site-footer-links">
                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">Términos &amp;
                                        Condiciones</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-2 text-center">
                            <ul class="site-footer-links">
                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">Política de Privacidad</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-2 text-center">
                            <ul class="site-footer-links">
                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link mt-0 mt-lg-2">Tu Feedback</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
    </footer>


 <!-- COOKIES! -->

 <div class="cookiesbox">
        <div class="header">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="orange" class="bi bi-cookie" viewBox="0 0 16 16">
                <path d="M6 7.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m4.5.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m-.5 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                <path d="M8 0a7.96 7.96 0 0 0-4.075 1.114q-.245.102-.437.28A8 8 0 1 0 8 0m3.25 14.201a1.5 1.5 0 0 0-2.13.71A7 7 0 0 1 8 15a6.97 6.97 0 0 1-3.845-1.15 1.5 1.5 0 1 0-2.005-2.005A6.97 6.97 0 0 1 1 8c0-1.953.8-3.719 2.09-4.989a1.5 1.5 0 1 0 2.469-1.574A7 7 0 0 1 8 1c1.42 0 2.742.423 3.845 1.15a1.5 1.5 0 1 0 2.005 2.005A6.97 6.97 0 0 1 15 8c0 .596-.074 1.174-.214 1.727a1.5 1.5 0 1 0-1.025 2.25 7 7 0 0 1-2.51 2.224Z"/>
              </svg>
            <h2>Consentimiento<br>de Cookies</h2>
        </div>

        <hr>

        <div class="data">
            <p>Para mejorar tu experiencia en nuestra página y que te muestre información más relevante, utilizamos cookies y tecnologías similares. <a href="#"> Leer más...</a></p>
        </div>
        <div class="buttons">
            <button class="button" id="acceptBtn">Aceptar</button>
            <button class="button" id="declineBtn">Rechazar</button>
        </div>
    </div>



    <!-------------------------------------------

A n t o n i o  G u t i é r r e z

--------------------------------->


    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/custom.js"></script>

    <!-- ICONOS FILES -->
    <script src="https://use.fontawesome.com/1744f3f671.js"></script>

    <!-- CARUSEL JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="js/micarusel.js"></script>

    <!-- fadein JS -->
    <script src="js/fadein.js"></script>

    <!-- cookies JS -->
    <script src="js/cookies.js"></script>

</body>

</html>