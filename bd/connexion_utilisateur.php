<?php
session_start(); // Démarre la session PHP pour stocker les informations de connexion

// Informations de connexion à la base de données
$servername = "localhost"; // Nom du serveur
$username = "root"; // Nom d'utilisateur de la base de données
$password = ""; // Mot de passe de la base de données
$dbname = "g-maroc-appservices"; // Nom de la base de données

try {
    // Création d'une connexion PDO à la base de données
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configuration des options de PDO pour générer des exceptions en cas d'erreurs
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des valeurs saisies dans le formulaire
        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];

        // Requête SQL paramétrée pour vérifier l'identifiant et le code secret dans la base de données
        $sql = "SELECT * FROM user WHERE identifiant=? AND password=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$identifiant, $password]);

        // Vérification si l'utilisateur existe dans la base de données
        if ($stmt->rowCount() > 0) {
            // L'utilisateur est authentifié, enregistrement de l'identifiant de l'utilisateur dans la session
            $_SESSION['identifiant'] = $identifiant;
            // Redirection vers la page de tableau de bord
            header("Location: ../dashboard.php");
            exit(); // Assure la fin de l'exécution du script après la redirection
        } else {
            // L'utilisateur n'est pas authentifié, affichage d'un message d'erreur
          $reponse = "Identifiant ou code secret incorrect.";
          header("Location: ../index.php");
        }
    }
} catch(PDOException $e) {
    // Gestion des erreurs de connexion à la base de données
   $reponse ="La connexion à la base de données a échoué : " . $e->getMessage();
   header("Location: ../index.php");
}

// Fermeture de la connexion à la base de données
$conn = null;
?>
