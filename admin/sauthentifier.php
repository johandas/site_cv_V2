<?php require('inc/inc.init.php');

if(isset($_GET['action']) && $_GET['action'] == 'deconnexion') { // si une action est demandé dans l'URL et que cette action est "déconnexion" alors on procède à la  déconnexion.
    unset($_SESSION['connexion']);
	session_destroy();
  header('location:../index.php');
}

if(isset($_POST['connexion'])){//on envoie le form avec le name du button (on a cliqué dessus)
	$email = addslashes($_POST['email']);
	$mdp = addslashes($_POST['mdp']);
		$sql = $pdo->prepare(" SELECT * FROM t_utilisateurs WHERE email='$email' AND mdp='$mdp' ");// on vérifie courriel ET mot de passe
		$sql->execute();
		$nbr_utilisateur = $sql->rowCount();//on compte s'il est dans la table, le compte répond 1 s'il y est, 0 s'il n'y est pas
			if($nbr_utilisateur == 0){//il n'y est pas ! c'est la faute à sarah
				$msg='<div class="alert alert-danger">Erreur d\'authentification !</div>';
			}
            else {//on le trouve, il est inscrit, grâce à hadi
				$ligne_utilisateur = $sql->fetch();//on cherche ses infos

				$_SESSION['connexion']='connecté';
				$_SESSION['id_utilisateur']=$ligne_utilisateur['id_utilisateur'];
				$_SESSION['prenom']=$ligne_utilisateur['prenom'];
				$_SESSION['nom']=$ligne_utilisateur['nom'];

				header('location:utilisateurs.php');
			}//ferme le if else
}//ferme le if isset
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Authentification : admin</title>
        	<!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <!--Mes styles-->
        <link rel="stylesheet" type="text/css" href="css/styleadmin.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>
<body>
<div class="container">
        <div class="row conexion">
            <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-4" style="margin-top:250px;">
				<?= $msg; ?>
                <div class="panel panel-default">
                    <div class="text-center panel-heading panel-title">Se connecter</div>
                    <div class="panel-body">
                    <form action="#"  method="post">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    </div>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0 " >
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                        </div>
                                        <input type="text" class="form-control input" id="mdp" name="mdp" placeholder="Mot de passe">
                                    </div>
                                </div>
                             <div>
                                 <div class="form-group">
                                <input class= "btn btn-primary btn-block" name="connexion" id="connexion" type="submit" value="Connexion"/>
                            </div>
                             <div class="col-md-offset-0">
                                 <small id="mdplost" class="form-text text-muted">
                                     <a href="recuperation.php">Mot de passe oublié ?</a>
                                 </small>
                            </div>
                             <div class="col-md-offset-0">
                                 <small id="inscription" class="form-text text-muted">
                                      <a href="inscription.php">S'inscrire </a>
                                 </small>
                            </div>
                        </div>
                 </form>
            </div>
        </div>
    </div>
</div>
<?php require('inc/inc.footer.php'); ?>
