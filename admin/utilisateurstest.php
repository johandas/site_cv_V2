<?php
require('inc/inc.header.php');

    // Gestion des contenus de la Base de données
    $sql = $pdo->prepare("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
    $sql -> execute();
    $nbr_utilisateurs = $sql->rowCount();
    // Insertion d'un utilisateur
    if(isset($_POST['prenom'])) { // Si on a posté une nouvelle utilisateur
        if($_POST['nom'] != '' && $_POST['telephone'] != ''  && $_POST['pseudo'] != '' && $_POST['adresse'] != '')  {

            $sql =  $pdo->prepare("INSERT INTO t_utilisateurs (prenom, nom, email, telephone, pseudo, mdp, avatar, age, date_de_naissance, adresse, sexe, etat_civil, ville, pays, site_web ) VALUES (:prenom, :nom, :email, :telephone, :pseudo, :mdp, :avatar, :age, :date_de_naissance, :adresse, :sexe, etat_civil:, :ville, :pays, site_web, '1')");

            $sql->bindParam(':prenom', addslashes($_POST['prenom']), PDO::PARAM_STR);
            $sql->bindParam(':nom', addslashes($_POST['nom']), PDO::PARAM_STR);
            $sql->bindParam(':email', addslashes($_POST['email']), PDO::PARAM_STR);
            $sql->bindParam(':telephone', addslashes($_POST['telephone']), PDO::PARAM_STR);
            $sql->bindParam(':pseudo', addslashes($_POST['pseudo']), PDO::PARAM_STR);
            $sql->bindParam(':mdp', addslashes($_POST['mdp']), PDO::PARAM_STR);
            $sql->bindParam(':avatar', addslashes($_POST['avatar']), PDO::PARAM_STR);
            $sql->bindParam(':age', addslashes($_POST['age']), PDO::PARAM_STR);
            $sql->bindParam(':date_de_naissance', addslashes($_POST['date_de_naissance']), PDO::PARAM_STR);
            $sql->bindParam(':adresse', addslashes($_POST['adresse']), PDO::PARAM_STR);
            $sql->bindParam(':sexe', addslashes($_POST['sexe']), PDO::PARAM_STR);
            $sql->bindParam(':etat_civil', addslashes($_POST['etat_civil']), PDO::PARAM_STR);
            $sql->bindParam(':ville', addslashes($_POST['ville']), PDO::PARAM_STR);
            $sql->bindParam(':pays', addslashes($_POST['pays']), PDO::PARAM_STR);
            $sql->bindParam(':site_web', addslashes($_POST['site_web']), PDO::PARAM_STR);
            if($sql->execute()) {

                header('location:utilisateurstest.php');
            }
            exit();
        } // ferme le if $_POST
    } // ferme le if isset du form

    // Suppression d'une utilisateur
    if(isset($_GET['id_utilisateur'])) { // on récupère la comp. par son id dans l'url
        $efface = $_GET['id_utilisateur']; //  je mets cela dans une variable
        $sql = (" DELETE FROM t_utilisateurs WHERE id_utilisateur = '$efface'");
        $pdo->query($sql); // on peut avec exec aussi si on veut
        header('location:utilisateurstest.php'); // pour revenir sur la page

    } // ferme le if isset
?>
<div class="row">
    <div class="col-md-8 personal-info">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-lg-4 control-label">Prenom</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" value="<?=$ligne_utilisateurs['prenom']?>">
            </div>
            </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Nom</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" value="<?=$ligne_utilisateurs['nom']?>">
            </div>
          </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Email</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" value="<?=$ligne_utilisateurs['email']?>">
            </div>
        </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Téléphone portable</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" value="<?=$ligne_utilisateurs['telephone']?>">
            </div>
        </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Age</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" value="<?=$ligne_utilisateurs['age']?>">
            </div>
            </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Date de naissance</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" value="<?=$ligne_utilisateurs['date_naissance']?>">
            </div>
          </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Adresse</label>
            <div class="col-lg-8">
                <textarea class="form-control" type="text" value=""><?=$ligne_utilisateurs['adresse']?></textarea>
            </div>
          </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Sexe</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" value="<?=$ligne_utilisateurs['sexe']?>">
            </div>
          </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Etat civil</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" value="<?=$ligne_utilisateurs['etat_civil']?>">
            </div>
          </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Pays</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" value="<?=$ligne_utilisateurs['pays']?>">
            </div>
          </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Site internet</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" value="<?=$ligne_utilisateurs['site_web']?>">
            </div>
          </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Pseudo</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" value="<?=$ligne_utilisateurs['pseudo']?>">
            </div>
          </div>
          <div class="form-group">
                <label class="col-lg-4  control-label">Mot de passe</label>
            <div class="col-lg-8">
                <input class="form-control" type="password" value="<?=$ligne_utilisateurs['mdp']?>">
            </div>
          </div>
          <div class="form-group">
                <label class="col-lg-4 control-label">Confirmé le mot de passe</label>
            <div class="col-lg-8">
                <input class="form-control" type="password" value="<?=$ligne_utilisateurs['mdp']?>">
            </div>
          </div>
          <div class="form-group">
                <input type="button" class="btn btn-block btn-primary" value="Modifier">
                <input type="reset" class="btn btn-block btn-default" value="Annulé">
          </div>
        </div>
     </form>
  </div>
<hr>
    <div class="panel panel-default">
        <div class="panel-heading">Il y a  <?= $nbr_utilisateurs; ?> utilisateurs</div>
    </div>
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-info">
                <div class="panel-heading">Liste des utilisateurs</div>
                    <div class="panel-body">
                        <table border="3" class="table table-bordered table-hover">
                            <tr>
                                <td>Identifiant des utiliseur :<?= $ligne_utilisateurs['id_utilisateur']; ?>s</td>
                                <td>Prénom : <?= $ligne_utilisateurs['prenom']; ?></td>
                                <td>Nom :<?= $ligne_utilisateurs['nom']; ?></td>
                                <td>Email : <?= $ligne_utilisateurs['email']; ?></td>
                                <td>Téléphone :<?= $ligne_utilisateurs['telephone']; ?></td>
                                <td>Pseudo : <?= $ligne_utilisateurs['pseudo']; ?></td>
                                <td>Adresse : <?= $ligne_utilisateurs['adresse']; ?></td>
                                <td>Code Postal : <?= $ligne_utilisateurs['code']?></td>
                                <td>Pays</th>
                                <td>Site Web</th>
                                <td>Modification</th>
                                <td>Suppression</th>
                            </tr>

                    </div> <!-- ferme panel-body -->
                </div>
            </div>
            <div class="col-sm-4 col-lg-3 text-justify">
                <div class="panel panel-primary">
                <div class=" panel panel-heading">Insertion d'un utilisateur</div>
                    <div class="panel-body">
                        <form action="utilisateurs.php" method="post">
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input id="prenom" name="prenom" type="text" class="form-control" placeholder="Inserer un Prénom">
                                <label>Nom</label>
                                <input id="nom" name="nom" class="form-control" type="text" placeholder="Inserer un Nom">
                                <label>Email</label>
                                <input id="email" name="email" class="form-control" type="text" placeholder="Inserer un Email">
                                <label>Téléphone</label>
                                <input id="telephone" name="telephone" class="form-control" type="text" placeholder="Inserer un téléphone">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-block form-control" value="ajouté un utilisateur">
                            </div>
                        </form>
                    </div>
                </div>
        </div>
</div>
<?php require('inc/inc.footer.php');?>
