<?php
require('inc/inc.header.php');
if(isset($_POST['recup_mdp'], $_POST['recup_email'])) {
    if(!empty($_POST['recup_email'])) {
        $recup_email = htmlspecialchars($_POST['recup_email']);
            if(filter_var($recup_email, FILTER_VALIDATE_EMAIL)) {
                $emailexist = $pdo->prepare('SELECT id_utilisateur, pseudo FROM t_utilisateurs WHERE email = ?');
                $emailexist->execute(array($recup_email));
                $emailexist = $emailexist->rowCount();
                if($emailexist == 1) {
                    $_SESSION['recup_email'] = $recup_email;
                    $recup_code = "";
                    for($i = 0; $i < 8; $i++) {
                        $recup_code .= mt_rand(0 , 9);
                    }
                    $mail_recup_exist = $pdo->prepare('SELECT id FROM t_recuperation WHERE email = ? ');
                    $mail_recup_exist->execute(array($recup_email));
                    $mail_recup_exist = $mail_recup_exist->rowCount();
                    if($mail_recup_exist == 1) {
                        $recup_insert = $pdo->prepare('UPDATE t_recuperation SET code = ? WHERE email = ?')
                        $recup_insert->execute(array($recup_email, $recup_code));
                    } else {
                        $recup_insert = $pdo->prepare('INSERT INTO t_recuperation(email,code) VALUES (?,?)')
                        $recup_insert->execute(array($recup_email, $recup_code));
                    }
                } else {
                    $msg = '<div class="alert alert-danger">Cette adresse email n\'est pas enregistrée !</div>';
                }
            } else {
                $msg = '<div class="alert alert-danger">Adresse email invalide !</div>';
            }
    } else {
        $msg = '<div class="alert alert-danger">Veuillez entrer votre adresse email !</div>';
    }
}

?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-4">
            <div class="panel panel-default ">
            <div class="text-center panel-heading panel-title">Récupération du mot de passe</div>
                <div class="panel-body">
                    <form action="#"  method="post">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    </div>
                                    <input type="text" class="form-control" id="recup_email" name="recup_email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input class= "btn btn-warning btn-block" name="recup_mdp" id="recup_mdp" type="submit" value="Récupération du mot de passe"/>
                                </div>
                            </div>
                        </div>
                        <?= $msg ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('inc/inc.footer.php'); ?>
