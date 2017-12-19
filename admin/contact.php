<?php
class Contact
{
    // Déclaration des variables = champs de la table t_commentaires
    private $co_nom;
    private $co_email;
    private $co_sujet;
    private $co_message;

    // Fonction d'insertion en BDD
    public function insertContact($co_nom,$co_email,$co_sujet,$co_message)
        // On récupère les données rentrées par l'utilisateur
    {
        $this->co_nom = strip_tags($co_nom);
        $this->co_email = strip_tags($co_email);
        $this->co_sujet = strip_tags($co_sujet);
        $this->co_message = strip_tags($co_message);

        // Appel la connexion à la bdd
        require('inc/inc.init.php');

        // On crée une requête puis on l'exécute
        $req = $pdo->prepare("INSERT INTO t_commentaires (co_nom, co_email, co_sujet, co_message) VALUES (:co_nom, :co_email, :co_sujet, :co_message)");
        $req->execute([
            //attribue à la variable co_nom la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient d'être postés
            ':co_nom' => $this->co_nom,
            ':co_email' => $this->co_email,
            ':co_sujet' => $this->co_sujet,
            ':co_message' => $this->co_message
            // On ferme la requête pour protéger des injections
        ]);
        $req->closeCursor();
    }

    public function all()
    {
        $req = $req->prepare("SELECT * FROM t_commentaire");
        $req->execute([
            ':co_nom' => $this->co_nom,
            ':co_email' => $this->co_email,
            ':co_sujet' => $this->co_sujet,
            ':co_message' => $this->co_message
        ]);
        return $all;
    }

}

?>
