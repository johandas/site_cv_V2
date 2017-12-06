<?php
require('inc/inc.header.php');

if(!$_SESSION['connexion']) {
    header('location:../index_.php');
}

echo '<pre>';
print_r($_FILES);
print_r($ligne_images);
echo '</pre>';
$sql = $pdo->prepare("SELECT * FROM t_photos WHERE utilisateur_id = '1'");
$sql->execute();
$nbr_images = $sql->rowCount();

if(!empty($_POST)) {

    $url_photo = '';
    if(isset($_GET['action']) && $_GET['action'] == 'modification')
    {
        $url_photo = $_POST['photo_actuelle'];
        // chemin
    }
    if(!empty($_FILES['photo']['name'])){ // Si une photo est uploadé
        //echo '<pre>'; print_r($_FILES); echo '</pre>';
        $nom_photo = time(). '_' . $_FILES['photo']['name']; // Si la photo est nommé tshirt.jpg, on la renomme : XX21-1543234454_tshirt.jpg pour éviter les doublons possible sur le serveur

        $chemin_photo = $_SERVER['DOCUMENT_ROOT'] . RACINE_CV . 'photo/' . $nom_photo;
        //echo $chemin_photo;
        $url_photo = URL . 'photo/' . $nom_photo;
        // chemin : c://xampp/htdocs/PHP/site/photo/XX21-1543234454_tshirt.jpg

        $ext = array('image/png', 'image/jpeg', 'image/gif');

        if(!in_array($_FILES['photo']['type'], $ext)){
            $msg .= '<div class="erreur"> Images autorisées : PNG, JPG, JPEG et GIF </div>'; // Si le fichier uploadé ne correspond pas aux extenstions autorisées (ici, PNG, JPG, JPEG et GIF ) alors on affiche un message d'erreur.
        }

        if($_FILES['photo']['size'] > 2000000){
            $msg .= '<div class="erreur"> Images : 2Mo maximum autorisé </div>'; // SI la photo uploadée est trop volumineurse (ici 2Mo max) alors on met un message d'erreur.
            // PAr défaut XAMPP autorise 2.5Mo. Voir dans php.ini, rechercher max_filesize=2.5M
        }

        if(empty($msg) && $_FILES['photo']['error'] == 0){
            copy($_FILES['photo']['tmp_name'], $chemin_photo); // On enregistre la photo sur le serveur. Dans les faits, on la copier depuis son emplacement temporaire et on la colle dans son emplacement définitif.
        }
    }
    $resultat = $pdo->exec("UPDATE t_photos SET photo = '$url_photo', nom ='$_POST[nom]', sous-titre ='$_POST[sous_titre]' WHERE utilisateur_id = '1'");

    header('location:images.php');
    if(isset($msg)) {
         $msg .= '<div class="alert alert-success">Mise à jours éffectuer</div>';
    }
}
if(empty($msg)) {
    $resultat = $pdo->prepare("INSERT INTO t_photos (photo, nom, sous-titre) VALUES (:photo, :nom, :sous-titre)");
    $resultat -> bindParam(':photo', $nom_photo, PDO::PARAM_STR);
    $resultat -> bindParam(':sous_titre', $_POST['sous_titre'], PDO::PARAM_STR);
    $resultat -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
    $resultat -> execute();
}
?>
<div class="panel panel-default">
    <div class="panel-heading">Il y a  <?= $nbr_images; ?> images</div>
</div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-info">
            <div class="panel-heading">Liste des images</div>
                <div class="panel-body">
                    <table border="3" class="table table-bordered table-hover">
                        <tr>
                            <th>Images</th>
                            <th>Nom</th>
                            <th>Sous-titre</th>
                            <th>Modification</th>
                            <th>Suppression</th>
                        </tr>
                        <tr>
                    <?php while($ligne_images = $sql->fetch()) :  ?>
                            <td><?= $ligne_images['photo']; ?></td>
                            <td><?= $ligne_images['nom']; ?></td>
                            <td><?= $ligne_images['sous_titre']; ?></td>

                            <td class="modif"><a href="modif_photos.php?id_photos=<?= $ligne_images['id_photos']; ?>">
                            <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></button></a></td>

                                <td class="supr"><a href="images.php?id_photos=<?= $ligne_images['id_photos']; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>
                            </tr>
                    <?php endwhile; ?>
                    </table>
                </div> <!-- ferme panel-body -->
            </div>
        </div>
        <div class="col-sm-4 col-lg4 text-justify">
            <div class="panel panel-primary">
            <div class=" panel panel-heading">Insertion d'une image</div>
                <div class="panel-body">
                    <form action="images.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_photo" value="<?= $ligne_images['id_photo'] ?>">
                        <div class="form-group">
                            <input id="photos" name="photo" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nom</label>
                            <input id="nom" name="nom" class="form-control" type="text" placeholder="Inserer une légende">
                        </div>
                        <div class="form-group">
                            <label>Sous-Titre</label>
                            <input id="sous-titre" name="sous-titre" class="form-control" type="text" placeholder="Inserer une légende">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="upload" class="btn btn-success btn-block form-control" value="Ajouté une image">
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
































<?php require('inc/inc.footer.php');?>
