<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="UTF-8" />
      <title><?php echo $title ?></title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet">
      <link href="https://cdnpublic/js.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" type='text/css' href="/css/main.css" />
          <noscript><link rel="stylesheet" type='text/css' href="/css/noscript.css" /></noscript>
  </head>
    <body class="is-preload">
        <!-- Wrapper -->
            <div id="wrapper">
                <!-- Header -->
                    <header id="header">
                        <div class="inner">
                            <!-- Logo -->
                                <a href="<?php echo (new Framework\UrlGenerator)->generate('home') ?>" class="logo">
                                    <span class="symbol"><img src="/img/logo.svg" alt="" /></span><span class="title">Blog Avenir2point0</span>
                                </a>
                                <p>Message du system : <?php if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                } else { ?>
                                  <em>Pas de message pour le moment...</em> <?php } ?>
                                  </p>
                            <!-- Nav -->
                                <nav>
                                    <ul>
                                        <li><a href="#menu">Menu</a></li>
                                    </ul>
                                </nav>
                        </div>
                    </header>
            <!-- Menu -->
            <nav id="menu">
              <h2>Menu</h2>
                <?php if (isset($_SESSION['user']['pseudo'])) { ?>
                  <h4> Bonjour :  <?php echo $_SESSION['user']['pseudo']; ?></h4>
                <?php } ?>
              <ul>
                <li><a href="<?php echo (new Framework\UrlGenerator)->generate('home') ?>">Accueil</a></li>
                <li><a href="<?php echo (new Framework\UrlGenerator)->generate('articles') ?>">Articles</a></li>
                
                <li><a href="<?php echo (new Framework\UrlGenerator)->generate('contact') ?>">Contact</a></li>
                <?php
                if (isset($_SESSION['user']['pseudo'])) { ?>
                  <li><a href="<?php echo (new Framework\UrlGenerator)->generate('disconnect') ?>">Deconnexion</a></li>
                <?php } else { ?>
                  <li><a href="<?php echo (new Framework\UrlGenerator)->generate('register') ?>">Enregistrement</a></li>
                  <li><a href="<?php echo (new Framework\UrlGenerator)->generate('connection') ?>">Se connecter</a></li>
                <?php }
                  if (isset($_SESSION['user']['admin']) && ($adminPass = $_SESSION['user']['admin']) && ($adminPass == 1)) { ?>
                  <li>
                    <a href="<?php echo (new Framework\UrlGenerator)->generate('admin') ?>">Administration</a>
                  </li>
                  <?php } ?>
              </ul>
            </nav>
          </header>
      <div id="main">
        <?php echo $content ?>
      </div>
     <!-- Footer -->
    <footer id="footer">
      <div class="inner">
        <section>
          <h2>Réseaux sociaux</h2>
          <ul class="icons">
            <li><a href="https://www.linkedin.com/in/dimitri-subrini-b48848156/" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
            <li><a href="https://www.facebook.com/profile.php?id=1152429246" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="https://github.com/avenir2point0/projet5" class="icon style2 fa-github"><span class="label">GitHub</span></a></li>
          </ul>
        </section>
        <section>
          <img src="https://insight.symfony.com/projects/8ff27fc9-0817-435f-9aca-cec05502442b/big.svg" alt="SymfonyInsight">
          <ul class="copyright">
            <li>&copy; Avenir2point0. All rights reserved</li>
            <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
          </ul>
        </section>
      </div>
    </footer>
    </div>
     <!-- Scripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/browser.min.js"></script>
    <script src="/js/breakpoints.min.js"></script>
    <script src="/js/util.js"></script>
    <script src="/js/main.js"></script>
  </body>
</html>
