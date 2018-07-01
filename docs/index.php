<?php
    session_start();
    if (isset($_GET["action"]) AND $_GET["action"] === "logout") {
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>PhilD Home</title>
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="dist/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.css">

    <!-- Smartlook script -->
    <script type="text/javascript">
        window.smartlook||(function(d) {
        var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
        var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
        c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);
        })(document);
        smartlook('init', 'd690a89b975defcf9cc055fa18c67a4be7d7ea69');
    </script>
</head>

<?php include "pop-up.php" ?>

<!-- Conteúdo -->
<div id="msg-container">
    <div class="content">
        <p class="msg">Default text <i class="fas fa-circle-notch"></i></p>
    </div>
</div>

<body>
    <header id="cabecalho">
        <nav id="menu">
            <div class="content">
                <div class="menu-control">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <ul>
                    <li><a href="#cabecalho" class="scroll">Início</a></li>
                    <li><a href="#flow" class="scroll">Propostas</a></li>
                    <li><a href="#galeria" class="scroll">Galeria</a></li>
                    <!-- <li><a href="">Trabalhos<i class="fas fa-angle-down"></i></a>
                        <ul>
                            <li><a href="">sub 1</a></li>
                            <li><a href="">sub 2</a></li>
                            <li><a href="">sub 3</a></li>
                            <li><a href="">sub 4</a></li>
                            <li><a href="">sub 5</a></li>
                        </ul>
                    </li> -->
                    <li><a href="#contato" class="scroll">Contato<i class="fas fa-envelope"></i></a></li>
                    <li><a href="#sobre" class="scroll">Sobre</a></li>
                </ul>

                <ul>
                <?php if (!isset($_SESSION["id"])): ?>
                    <li><a href="#" class="show-popup">Login<i class="fas fa-sign-in-alt"></i></a></li>
                <?php else: ?>
                    <li class="account"><a>Minha conta <i class="fas fa-users"></i></a>
                        <ul>
                            <li><a href="#" class="show-popup">
                                <img src="uploads/<?php echo $_SESSION["userAvatar"] ?>" alt="">
                                <p><?php echo $_SESSION["username"] ?></p>
                                </a></li>
                            <li><a href="?action=logout">Sair <i class="fas fa-sign-out-alt"></i></a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                </ul>
            </div>
        </nav>
        <div class="content">
            <a href="index.php">
                <div class="header-content">
                    <img src="images/logo-full.png" alt="">
                    <div class="header-info">
                        <h1>PhilD</h1>
                        <p>Webdesign, graphic design, creative mind.</p>
                    </div>
                </div>
            </a>
        </div>
    </header>
    <section id="slider" class="slider">
        <ul>
            <li>
                <img src="images/slide4.jpg" alt="">
                <span class="full">
                    <div class="about-slide">
                        <h1>Faça já um cartão de visitas</h1>
                        <p>Se você possuí um pequeno ou grande negócio, é sempre bom ter em mãos um bom cartão de visitas para oferecer aos seus clientes. Peça um cartão de visitas adequado conosco, sem informações desnecessárias.</p>
                    </div>
                </span>
            </li>
            <li>
                <img src="images/slide5.jpg" alt="">
                <span class="full">
                    <div class="about-slide">
                        <h1>Websites 100% responsivos</h1>
                        <p>Nada melhor do que possuir um website que tenha total responsabilidade com o navegador. Sendo assim, seu website irá se adptar a resolução adequada para quem está acessando. Entre em contato conosco!</p>
                    </div>
                </span>
            </li>
            <li>
                <img src="images/slide6.jpg" alt="">
                <span class="full">
                    <div class="about-slide">
                        <h1>Não afunde seus negócios</h1>
                        <p>Pra que complicar as coisas? Não contrate alguém que não vai dar conta do trabalho. Com a gente você não terá esse tipo de problema.</p>
                    </div>
                </span>
            </li>
            <div class="background full"></div>
            <div class="grid full"></div>
            <div class="navigators full"></div>
        </ul>
    </section>
    <div id="main">
        <div class="content">
            <section id="flow">
                <h1>Propostas</h1>
                <div class="flow-content">
                    <div class="item">
                        <h2>Sites responsivos</h2>
                        <div class="item-info">
                            <i class="fas fa-align-justify"></i>
                            <p>Nada melhor do que ter um site adaptável à qualquer plataforma. Com a gente é assim.</p>
                        </div>
                    </div>
                    <div class="item">
                        <h2>Ao gosto do cliente</h2>
                        <div class="item-info">
                            <i class="fas fa-handshake"></i>
                            <p>Visamos deixar tudo do modo mais parecido com a ideia original do cliente.</p>
                        </div>
                    </div>
                    <div class="item">
                        <h2>Fácil contato</h2>
                        <div class="item-info">
                            <i class="fas fa-comments"></i>
                            <p>Você pode entrar em contato conosco de diversas maneiras. Procure nossa página contato para saber mais.</p>
                        </div>
                    </div>
                    <div class="item">
                        <h2>Flat design</h2>
                        <div class="item-info">
                            <i class="fas fa-edit"></i>
                            <p>Todos hoje em dia estão se adaptando à este estilo limpo e suave. Por que não mergulhar nessa?</p>
                        </div>
                    </div>
                </div>
            </section>
            <section id="galeria">
                <h1>Galeria</h1>
                <div class="gallery-content">
                </div>
            </section>
            <section id="contato">
                <h1>Contato</h1>
                <p>Entre em contato conosco através deste formulário. Sua mensagem será respondida via e-mail.</p>
                <div class="contact-content">
                    <form>
                        <p class="info-input">Primeiro nome</p>
                        <input type="text" autocomplete="given-name" required>
                        <p class="info-input">Sobrenome</p>
                        <input type="text" autocomplete="family-name" required>
                        <p class="info-input">E-mail</p>
                        <input type="email" autocomplete="email" required>
                        <p class="info-input">Mensagem</p>
                        <textarea autocomplete="off"></textarea>
                        <input type="submit" class="submit" value="Enviar" required>
                    </form>
                </div>
            </section>

            <section id="sobre">
                <h1>Sobre</h1>
                <div class="about-content">
                    <p>Em breve...</p>
                </div>
                </div>
            </section>
        </div>
    </div>
    <footer id="rodape">
        <div class="top">
            <div class="content">
                <div class="footer-slider">
                    <img src="images/brands/brand1.png" alt="">
                    <img src="images/brands/brand2.png" alt="">
                    <img src="images/brands/brand3.png" alt="">
                    <img src="images/brands/brand4.png" alt="">
                    <img src="images/brands/brand5.png" alt="">
                    <img src="images/brands/brand6.png" alt="">
                    <img src="images/brands/brand7.png" alt="">
                    <img src="images/brands/brand8.png" alt="">
                    <img src="images/brands/brand9.png" alt="">
                    <img src="images/brands/brand10.png" alt="">
                    <img src="images/brands/brand11.png" alt="">
                    <img src="images/brands/brand12.png" alt="">
                    <img src="images/brands/brand13.png" alt="">
                    <img src="images/brands/brand14.png" alt="">
                    <img src="images/brands/brand15.png" alt="">
                    <img src="images/brands/brand16.png" alt="">
                    <img src="images/brands/brand17.png" alt="">
                    <img src="images/brands/brand18.png" alt="">
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="content">
                <p><i class="fas fa-copyright"></i> PhilD - Todos os direitos reservados</p>
                <p>Desenvolvido por <a href="http://fb.com/philippe.henriquee" target="_BLANK">Philippe Henrique</a></p>
            </div>
        </div>
        <div id="back-top">
            <a class="tDefaultLinear scroll" href="#cabecalho">
            <i class="fas fa-angle-up"></i>
        </a>
        </div>
    </footer>
</body>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/main.js"></script>
<script src="js/form.js"></script>
<script src="js/upload.js"></script>
<script src="js/slider.js"></script>

<!-- FontAwesome -->
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

</html>
