<?php
require('inc/inc.header.php');
if(!$_SESSION['connexion']) { // redirection si pas admin
    header('location:../index.php');
    exit();
}
$sql = $pdo->query("SELECT * FROM t_commentaires ORDER BY id_commentaire DESC");
$nbr_commentaires = $sql->rowCount();
if(isset($_GET['id_commentaire'])) { // on récupère le loisir. par son id dans l'url
    $efface = $_GET['id_commentaire']; //  je mets cela dans une variable
    $sqlDelete = (" DELETE FROM t_commentaires WHERE id_commentaire = '$efface'");
    $pdo->query($sqlDelete); // on peut avec exec aussi si on veut
    header('location:commentaires.php'); // pour revenir sur la page
} // ferme le if isset
?>
<div class="panel panel-default">
    <div class="panel-heading">Vous avez <?=  $nbr_commentaires ?> messages</div>
</div>
<div class="row">
    <?php while($ligne_commentaires = $sql->fetch()) : ?>
        <div style="margin:30px 0px;padding:40px 0px;background: #F5F5F5;border-radius: 20px;border: 2px solid #337BB4;">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <?= '<b>Message n° <span class="badge">' . $ligne_commentaires['id_commentaire'] . '</span></b>' ?>
                    </li>
                    <li class="list-group-item">
                        <?= '<b>Nom : </b><span class="badge">' . $ligne_commentaires['co_nom'] . '</span>' ?>
                    </li>
                    <li class="list-group-item">
                        <?= '<b>Sujet : </b><span class="badge">' . $ligne_commentaires['co_sujet'] . '</span>'  ?>
                    </li>
                    <li class="list-group-item">
                        <?= '<b>Email : </b><span class="badge">' . $ligne_commentaires['co_email'] . '</span>'  ?>
                    </li>
                       <a id="supr-comment" href="commentaires.php?id_commentaire=<?= $ligne_commentaires['id_commentaire']; ?>">
                           <li class="list-group-item list-group-item-danger text-center hoover-comment">
                               <b>Supprimer le message</b>
                           </li>
                       </a>
                </ul>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4 ">
                    <ul class="list-group">
                        <li class="list-group-item active msg" style="box-sizing:border-box;">
                            <?= '<i>Message de :</i><b> ' . $ligne_commentaires['co_nom'] . '</b><br><br><span class="badge">' .  $ligne_commentaires['co_message'] .'</span> <br>' ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endwhile ?>
</div>
<?php require('inc/inc.footer.php'); ?>
