<?php
require('inc/inc.header.php');

if (isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté') {
  $id_utilisateur = $_SESSION['id_utilisateur'];
  $prenom = $_SESSION['prenom'];
  $nom = $_SESSION['nom'];
  // echo $_SESSION['connexion'];
} else { // l'utilisateur n'est pas connecté
  header('location:sauthentifier.php');
}
$resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);
// Suppression d'un loisir
if (isset($_GET['id_utilisateur'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_utilisateur'];
    $resultat = "DELETE FROM t_utilisateurs WHERE id_utilisateur = '$efface'";
    $pdo -> query($resultat); // on peut avec exec aussi si on veut
    header("location:utilisateurs.php"); // pour revenir sur la page
} // ferme le if(isset)
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8 col-sm-offset-2">
        <div class="panel panel-default" style="margin-top:100px;">
            <div class="panel-heading">
                <b>Informations de <?= $ligne_utilisateur['prenom'] . ', ' . $ligne_utilisateur['nom']; ?></b>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled list-group">
                    <li class="list-group-item"><b>Prénom :</b> <?= $ligne_utilisateur['prenom']; ?></li>
                    <li class="list-group-item"><b>Nom</b> : <?=  $ligne_utilisateur['nom']; ?></li>
                    <li class="list-group-item"><b>Email :</b> <?=  $ligne_utilisateur['email'] ;?></li>
                    <li class="list-group-item"><b>Téléphone :</b> <?= $ligne_utilisateur['telephone']; ?></li>
                    <li class="list-group-item"><b>Pseudo :</b> <?= $ligne_utilisateur['pseudo']; ?></li>
                    <li class="list-group-item"><b>Age :</b> <?= $ligne_utilisateur['age']; ?></li>
                    <li class="list-group-item"><b>Date de naissance :</b> <?= $ligne_utilisateur['date_naissance'];?></li>
                    <li class="list-group-item"><b>Civilité :</b> <?= $ligne_utilisateur['sexe'];?></li>
                    <li class="list-group-item"><b>Adresse :</b> <?= $ligne_utilisateur['adresse'];?></li>
                    <li class="list-group-item"><b>Code postal :</b> <?= $ligne_utilisateur['code_postal'];?></li>
                    <li class="list-group-item"><b>Ville :</b> <?= $ligne_utilisateur['ville'];?></li>
                    <li class="list-group-item"><b>Pays :</b> <?= $ligne_utilisateur['pays']; ?></li>
                    <li class="list-group-item"><b>Avatar :</b> <?= $ligne_utilisateur['avatar'];?></li>
                    <li class="list-group-item">
                        <a href="modif_utilisateurs.php?id_utilisateur=<?= $ligne_utilisateur['id_utilisateur']; ?>">
                            <button type="button" class="btn btn-block btn-info">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>
                        </a>
                    </li>
                    <li class="list-group">
                        <a href="utilisateurs.php?id_utilisateur=<?= $ligne_utilisateur['id_utilisateur']; ?>">
                            <button type="button" class="btn btn-block btn-default">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php require('inc/inc.footer.php');?>
