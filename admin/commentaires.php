<?php
require('inc/inc.header.php');
if(!$_SESSION['connexion']) {
    header('location:../index.php');
}
$sql = $pdo->query("SELECT * FROM t_commentaires ORDER BY id_commentaire DESC");
$nbr_formations = $sql->rowCount();
if(isset($_GET['id_commentaire'])) { // on récupère le loisir. par son id dans l'url
    $efface = $_GET['id_commentaire']; //  je mets cela dans une variable
    $sqlDelete = (" DELETE FROM t_commentaires WHERE id_commentaire = '$efface'");
    $pdo->query($sqlDelete); // on peut avec exec aussi si on veut
    header('location:commentaires.php'); // pour revenir sur la page

} // ferme le if isset
?>
<div class="row">
    <div class="well">Vous avez <?= $nbr_formations ?> messages</div>
    <?php while($ligne_commentaires = $sql->fetch()) : ?>
        <div style="margin: 30px 0px;">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <?= 'Message n° '. $ligne_commentaires['id_commentaire']  ?>
                    </li>
                    <li class="list-group-item">
                        <?= 'Nom : '. $ligne_commentaires['co_nom']  ?>
                    </li>
                    <li class="list-group-item">
                        <?= 'Sujet : '. $ligne_commentaires['co_sujet']  ?>
                    </li>
                    <li class="list-group-item">
                        <?= 'Email : '. $ligne_commentaires['co_email']  ?>
                    </li>
                       <a id="supr-comment" href="commentaires.php?id_commentaire=<?= $ligne_commentaires['id_commentaire']; ?>">
                           <li class="list-group-item list-group-item-danger text-center hoover-comment"><b>Supprimer le message</b></li>
                       </a>

                </ul>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4 ">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <?= '<b>Message</b> :<br><br>'.  $ligne_commentaires['co_message'] .'<br>' ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endwhile ?>
</div>
<?php require('inc/inc.footer.php'); ?>
