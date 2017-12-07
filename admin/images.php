<?php
require('inc/inc.header.php');

if(!$_SESSION['connexion']) {
    header('location:../index.php');
}

echo '<pre>';
print_r($_FILES);
echo '</pre>';


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
                            <td class="modif">
                                <a href="images.php?id_photos=<?= $ligne_images['id_photos']; ?>">
                                    <button type="button" class="btn btn-success">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </button>
                                </a>
                            </td>
                            <td class="supr">
                                <a href="images.php?id_photos=<?= $ligne_images['id_photos']; ?>">
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
                <div class="panel-body">
                    <form action="images.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_photo" value="<?= $ligne_images['id_photo'] ?>">
                        <div class="form-group">
                            <input id="photos" name="photo" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nom</label>
                            <input id="nom" name="nom" class="form-control" type="text" value="<?=$ligne_images['id_photo']?>" placeholder="Inserer une légende">
                        </div>
                        <div class="form-group">
                            <label>Sous-Titre</label>
                            <input id="sous-titre" name="sous-titre" class="form-control" type="text" value="<?=$ligne_images['sous_titre']?>" placeholder="Inserer une légende">
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
