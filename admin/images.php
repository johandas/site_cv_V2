<?php
require('inc/inc.header.php');

if(!$_SESSION['connexion']) {
    header('location:../index.php');
}
$sql = $pdo->query("SELECT * FROM t_images");
$ligne_image = $sql->fetch();
$nbr_loisirs = $sql->rowCount();

if(isset($_POST['upload'])) {
    $image = $_FILES['photo'];
    $imageName = $_FILES['photo']['name'];
    $imageTmpName = $_FILES['photo']['tmp_name'];
    $imageSize = $_FILES['photo']['size'];
    $imageError = $_FILES['photo']['error'];
    $imageType = $_FILES['photo']['type'];

    $imageExt = explode('.', $imageName);
    $imageActuelleExt = strtolower(end($imageExt));

    $imageValid = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($imageActuelleExt, $imageValid )) {
        if ($imageError === 0) {
            if ($imageSize < 1000000) {
                $imageNewName = uniqid('', true) . "." . $imageActuelleExt;
                $imageDestination = 'img/' . $imageNewName;
                move_uploaded_file($imageTmpName, $imageDestination);
                // header('location:images.php');
            } else {
                $msg .= '<div class="alert alert-danger">Veuillez insérer une image inférieur ou égale a 1/mo</div>';
            }
        } else {
            $msg .= '<div class="alert alert-danger">Une erreur s\'est produite lors de l\'envois du fichier</div>';
        }
     } else {
        $msg .= '<div class="alert alert-danger">Vous ne pouvez pas enregistré ce type d\'image</div>';
     }
    if(empty($msg)) {
        $resultat = $pdo->prepare("INSERT INTO t_images (photo, i_nom) VALUES (:photo , :i_nom)");
        $resultat->bindParam(':i_nom', $_POST['i_nom'], PDO::PARAM_STR);
        $resultat->bindParam(':photo', $imageNewName , PDO::PARAM_STR);
        if($resultat->execute()) {
            header('location:images.php');
        }
    }
}
if(isset($_GET['id_images'])) { // on récupère le loisir. par son id dans l'url
    $efface = $_GET['id_images']; //  je mets cela dans une variable
    $sql = (" DELETE FROM t_images WHERE id_images = '$efface'");
    $pdo->query($sql); // on peut avec exec aussi si on veut
    header('location:images.php'); // pour revenir sur la page

} // ferme le if isset
?>
<div class="panel panel-default">
    <div class="panel-heading">Il y a  <?= $nbr_loisirs ?> images</div>
</div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-info">
            <div class="panel-heading">Liste des images</div>
                <div class="panel-body">
                    <table border="3" class="table table-bordered table-hover">
                        <tr>
                            <th># ID</th>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Modification</th>
                            <th>Suppression</th>
                        </tr>
                        <tr>
                    <?php while($ligne_image = $sql->fetch()) : ?>
                            <td><?= $ligne_image['id_images'] ?></td>
                            <td><img src="<?= RACINE_CV ?>img/<?= $ligne_image['photo'] ?>" height="100px"></td>
                            <td><?= $ligne_image['i_nom'] ?></td>
                            <td class="modif">
                                <a href="images.php?id_images=<?= $ligne_image['id_images'] ?>">
                                    <button type="button" class="btn btn-success">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </button>
                                </a>
                            </td>
                            <td class="supr">
                                <a href="images.php?id_images=<?= $ligne_image['id_images'] ?>">
                                    <button type="button" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </table>
                </div> <!-- ferme panel-body -->
            </div>
        </div>
        <div class="col-sm-4 col-lg4 text-justify">
            <div class="panel panel-primary">
            <div class=" panel panel-heading">Insertion d'une image</div>
            <?= $msg; ?>
                <div class="panel-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input id="photos" name="photo" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nom</label>
                            <input id="nom" name="i_nom" class="form-control" type="text" value="" placeholder="Inserer une légende">
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
