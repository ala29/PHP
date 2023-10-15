
<?php
session_start();
require_once "connexion.php";
$bdd=connexionDB();
// récupération des données saisies par l'utilisateur
$emailx = $_POST['email'];
$salt="pfa_ala_emna";
$motdepassex = crypt($_POST['motdepasse'],$salt);



// recherche de l'utilisateur dans la table admin
$req_admin = $bdd->prepare('SELECT * FROM admin WHERE email = :email AND mot_de_passe = :motdepasse');
$req_admin->execute([
    'email' => $emailx,
    'motdepasse' => $motdepassex
]);
$admin = $req_admin->fetch();


// recherche de l'utilisateur dans la table etudiant
$req_etudiant = $bdd->prepare('SELECT * FROM etudiant WHERE email = :email AND mot_de_passe = :motdepasse');
$req_etudiant->execute([
    'email' => $emailx,
    'motdepasse' => $motdepassex
]);
$etudiant = $req_etudiant->fetch();

// recherche de l'utilisateur dans la table etudiant formateur
$req_etudiant = $bdd->prepare('SELECT * FROM etudiant,etudiant_formateur ef WHERE email = :email AND mot_de_passe = :motdepasse AND etudiant.ID_etudiant=ef.ID_etudiant');
$req_etudiant->execute([
    'email' => $emailx,
    'motdepasse' => $motdepassex
]);
$etudiant_formateur = $req_etudiant->fetch();

// recherche de l'utilisateur dans la table etudiant formateur
$req_etudiant = $bdd->prepare('SELECT * FROM etudiant,etudiant_entrepreneur ee WHERE email = :email AND mot_de_passe = :motdepasse AND etudiant.ID_etudiant=ee.ID_etudiant');
$req_etudiant->execute([
    'email' => $emailx,
    'motdepasse' => $motdepassex
]);
$etudiant_entrepreneur = $req_etudiant->fetch();

// recherche de l'utilisateur dans la table client
$req_client = $bdd->prepare('SELECT * FROM client WHERE email = :email AND mot_de_passe = :motdepasse');
$req_client->execute([
    'email' => $emailx,
    'motdepasse' => $motdepassex
]);
$client = $req_client->fetch();

// vérification du type d'utilisateur et affichage de l'interface correspondante
if ($admin) {
    // interface pour l'administrateur
    header("Location:../espace_admin/index.php");

}elseif($etudiant_formateur){
    // interface pour l'étudiant formateur
    $_SESSION['id_etudform']=$etudiant_formateur['ID_etudiant'];
    $_SESSION['prenom_etudform']=$etudiant_formateur['prenom'];
    $_SESSION['nom_etudform']=$etudiant_formateur['nom'];
    header("Location:../espace_etudiantformateur/index.php"); 

}elseif($etudiant_entrepreneur){
    // interface pour l'étudiant entrepreneur
    $_SESSION['id_etudentrep']=$etudiant_entrepreneur['ID_etudiant'];
    $_SESSION['prenom_etudentrep']=$etudiant_entrepreneur['prenom'];
    $_SESSION['nom_etudentrep']=$etudiant_entrepreneur['nom'];
    header("Location:../espace_etudiantentrepreneur/index.php"); 

} elseif ($etudiant) {
    // interface pour l'étudiant
    $_SESSION['prenom_etud']=$etudiant['prenom'];
    $_SESSION['nom_etud']=$etudiant['nom'];
    $_SESSION['ID_etud']=$etudiant['ID_etudiant'];
    header("Location:../index1.php"); 

} elseif ($client) {
    // interface pour le client
    echo "Bienvenue, client";
} else {
    // affichage d'un message d'erreur si l'utilisateur n'est pas trouvé dans aucune des tables
    echo "Email ou mot de passe incorrect";
}
?>