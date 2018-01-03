<?php
require('inc/connexion.php');
$sql = $pdo->query("SELECT * FROM t_images");?>
<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Développeur et intégrateur web junior. En recherche de stage !">
    <meta name="author" lang="fr" content="Johan DA SILVA">
    <meta name="keywords" lang="fr" content="développeur, intégrateur, javascript, php, html, css, wordpress, bootstrap">

    <title>Site - </title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/agency.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <link rel="icon" href="img/favicon.ico" />
  </head>

  <body>
    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle">
      <i class="fa fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle">
          <i class="fa fa-times"></i>
        </a>
        <li class="sidebar-brand">
          <a class="js-scroll-trigger" href="#top">Johan.D.S</a>
        </li>

        <li>
          <a class="js-scroll-trigger" href="#about">Expériences & Formations</a>
        </li>
        <li>
          <a class="js-scroll-trigger" href="#services">Compétences</a>
        </li>
        <li>
          <a class="js-scroll-trigger" href="#portfolio">Projets</a>
        </li>
        <li>
          <a class="js-scroll-trigger" href="#contact" onclick=$( "#menu-close").click();>Contact</a>
        </li>
      </ul>
    </nav>

    <!-- Header -->
    <header class="header" id="top">
      <div class="text-vertical-center">
        <h1 class="title-cli" id="grostitre">Johan Da Silva</h1>
        <h3 class="title-cli" id="grostitre">&lt;Développeur Web && Intégrateur/></h3>
        <br>
        <a href="#about" class="btn btn-about btn-lg js-scroll-trigger">En savoir plus</a>
      </div>
    </header>

    <!-- About -->
    <section id="about" class="about" style="background:#F1F1F1">
      <div class="container text-center">
        <h2>Expériences et formations</h2>
        <p class="lead">Développeur web & Intégrateur curieux, autonome, rigoureux, j'aime les applications simples, rapides et efficaces.

Un sens de l'écoute et du service renforcé par quelques mois d'expériences à travailler sur des projets variés, une expertise technique en constante progression grâce à une formation perpétuelle. Motivé par le besoin de faire toujours mieux et appuyé par de solides bases acquises lors de mon parcours, je prend plaisir à relever de nouveaux challenges.

Actuellement en stage , je m'épanoui avec l'équipe du Pole S sur des projets atypiques afin de rendre le web meilleur
          <a target="_blank" href="http://lepoles.org/">Le pôle solidaire et social</a>.</p>
      </div>
      <!-- /.container -->
    </section>

    <!-- Services -->
    <section id="services" class="services text-white">
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-12 mx-auto">
            <h2>Mes compétences</h2>
            <hr class="small">
            <div class="row">
      <div class="col-md-3 col-sm-6 service-item">
        <a target="_blank" href="https://fr.wikipedia.org/wiki/Hypertext_Markup_Language" class="thumbnail">
          <img class="skill" src="img/htmlrond.png" alt="HTML5">
        </a>
      </div>
      <div class="col-md-3 col-sm-6 service-item">
        <a target="_blank" href="https://fr.wikipedia.org/wiki/Feuilles_de_style_en_cascade" class="thumbnail">
          <img class="skill" src="img/css3.svg" alt="CSS3">
        </a>
      </div>
      <div class="col-md-3 col-sm-6 service-item">
        <a target="_blank" href="https://fr.wikipedia.org/wiki/Bootstrap_(framework)" class="thumbnail">
          <img class="skill" src="img/bootstrap.png" alt="bootstrap">
        </a>
      </div>
      <div class="col-md-3 col-sm-6 service-item">
        <a target="_blank" href="https://fr.wikipedia.org/wiki/PHP" class="thumbnail">
          <img class="skill" src="img/php.png" alt="php">
        </a>
      </div>
      <div class="col-md-3 col-sm-6 service-item">
        <a target="_blank" href="http://www.adobe.com/fr/products/photoshop.html" class="thumbnail">
          <img class="skill" src="img/phototest.png" alt="photoshop">
        </a>
      </div>
      <div class="col-md-3 col-sm-6 service-item">
        <a target="_blank" href="https://fr.wikipedia.org/wiki/JavaScript" class="thumbnail">
          <img class="skill" src="img/js.png" alt="javascript">
        </a>
      </div>
      <div class="col-md-3 col-sm-6 service-item">
        <a target="_blank" href="https://fr.wordpress.org/" class="thumbnail">
          <img class="skill" src="img/wordpress.png" alt="Wordpress">
        </a>
      </div>
      <div class="col-md-3 col-sm-6 service-item">
        <a target="_blank" href="https://fr.wikipedia.org/wiki/MySQL" class="thumbnail">
          <img class="skill" src="img/mysql.png" alt="Mysql">
        </a>
      </div>

            </div>
            <!-- /.row (nested) -->
          </div>
          <!-- /.col-lg-10 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>

    <!-- Portfolio -->
    <section id="portfolio" class="portfolio" style="background:#F1F1F1">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            <h2 class="black-typo">Mes réalisations</h2>
            <hr class="small">
            <div class="row">
              <div class="col-md-6">
                <div class="portfolio-item">
                  <a href="http://www.matcherunbien.com/">
                    <img class="img-portfolio img-fluid" src="img/work.png">
                  </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="portfolio-item">
                  <a href="http://www.matcherunbien.com/">
                    <img class="img-portfolio img-fluid" src="img/work.png">
                  </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="portfolio-item">
                  <a href="http://www.matcherunbien.com/">
                    <img class="img-portfolio img-fluid" src="img/work.png">
                  </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="portfolio-item">
                  <a href="http://www.matcherunbien.com/">
                    <img class="img-portfolio img-fluid" src="img/work.png">
                  </a>
                </div>
              </div>

            </div>
            <!-- /.row (nested) -->
            <!-- <a href="#" class="btn btn-dark">View More Items</a> -->
          </div>
          <!-- /.col-lg-10 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>

    <!-- Call to Action -->
    <!-- <aside class="call-to-action bg-primary text-white">
      <div class="container text-center">
        <h3>The buttons below are impossible to resist.</h3>
        <a href="#" class="btn btn-lg btn-light">Click Me!</a>
        <a href="#" class="btn btn-lg btn-dark">Look at Me!</a>
      </div>
    </aside> -->

    <!-- footer  contact -->

    <?php
    require('admin/contact.php');
    if(!empty($_POST)) {
        // On éclate le $_POST en tableau qui permet d'accéder directement aux champs par des variables
        // On effectue une validation des données du formulaire et on vérifie la validité  de l'email
        extract($_POST);

        $valid = (empty($co_nom) || empty($co_email) || !filter_var($co_email, FILTER_VALIDATE_EMAIL) || empty($co_sujet) || empty($co_message)) ? false : true;

        $erreurnom = (empty($co_nom)) ? 'Indiquez votre Nom' : null;
        $erreuremail = (empty($co_email) || !filter_var($co_email, FILTER_VALIDATE_EMAIL))  ? 'Indiquez votre Email' : null;
        $erreursujet = (empty($co_sujet)) ? 'Indiquez votre Sujet' : null;
        $erreurmessage = (empty($co_message)) ? 'Indiquez votre Message' : null;
        // Si tous les champs sont correctement renseignés
        if($valid) {
            // On crée un nouvel objet (ou une instanciation) de la class Contact.class.php
            $contact = new Contact();
            // On utilise la méthode insetContact() pour insérer en BDD
            $contact->insertContact($co_nom,$co_email,$co_sujet,$co_message);
        }
    }
    ?>
    <footer>
		<div class="container">
            <div class="row">
                <div class="col-md-6 offset-0">
                    <div class="formulaire-contact">
                        <form class="form"action="#" method="post">
                            <div class="form-group">
                                <label for="nom" class="labelContact">Nom :</label>
                                <span class="error"><?php if(isset($erreurnom))  echo $erreurnom;  ?></span>
                                <input type="text" name="co_nom" class="form-control inputContact" placeholder="Votre nom" value="<?php if(isset($co_nom)) echo $co_nom; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email" class="labelContact">Email :</label>
                                <span class="error"><?php if(isset($erreuremail))  echo $erreuremail;  ?></span>
                                <input type="text" name="co_email"  class="form-control inputContact" placeholder="Votre email" value="<?php if(isset($co_email)) echo $co_email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="sujet" class="labelContact">Sujet :</label>
                                <span class="error"><?php if(isset($erreursujet))  echo $erreursujet;  ?></span>
                                <input type="text" name="co_sujet" class="form-control inputContact" placeholder="Votre sujet" value="<?php if(isset($co_sujet)) echo $co_sujet; ?>">
                            </div>
                            <div class="form-group">
                                <label for="message" class="labelContact">Message :</label>
                                <span class="error"><?php if(isset($erreurmessage))  echo $erreurmessage;  ?></span>
                                <textarea type="text" name="co_message" class="form-control inputContact" cols="30" rows="10" placeholder="Votre message"><?php if(isset($co_message)) echo $co_message; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-danger" name="submit" value="ready">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-2 text-center">
                        <div class="contactez">
                            <h4>
                              <strong>Contactez-moi !</strong>
                            </h4>


                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="thumbnail ">
                                <img class="photo-profil" src="img/mev2.jpg" width="150" height="150" alt="...">
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <a href="https://goo.gl/maps/r8XDdYhEAur">France, Colombes</a>
                        </li>
                      <li>
                        <i class="fa fa-phone fa-fw"></i>
                        07 81 53 04 28</li>
                      <li>
                        <i class="fa fa-envelope-o fa-fw"></i>
                        <a href="mailto:name@example.com">johanmoreiradasilva@gmail.com</a>
                      </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#">
                        <i class="fa fa-linkedin fa-fw fa-3x"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                            <i class="fa fa-github fa-fw fa-3x"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                             <i class="fa fa-twitter fa-fw fa-3x"></i>
                        </a>
                      </li>

                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Johan Da Silva,  2017</p>
                  </div>
                </div>
                </div>
              </div>

              <a id="to-top" href="#top" class="btn btn-dark btn-lg js-scroll-trigger">
                <i class="fa fa-chevron-up fa-fw fa-1x"></i>
              </a>
         </div>
        </div>
	    </div>
</footer>

    <!-- Footer -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/stylish-portfolio.js"></script>

  </body>

</html>
