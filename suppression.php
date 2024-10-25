<?php
// Vérifie si l'identifiant de l'utilisateur à supprimer est passé dans l'URL
if(isset($_GET['id'])) {
    // Récupère l'identifiant de l'utilisateur depuis l'URL
    $id = $_GET['id'];

// Informations de connexion à la base de données
$servername = "localhost"; // Nom du serveur
$username = "root"; // Nom d'utilisateur de la base de données
$password = ""; // Mot de passe de la base de données
$dbname = "g-maroc-appservices"; // Nom de la base de données

try {
    // Création d'une connexion PDO à la base de données
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password2);
    // Configuration des options de PDO pour générer des exceptions en cas d'erreurs
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prépare la requête de suppression SQL
        $stmt = $conn->prepare("DELETE FROM user WHERE id = :id");
        // Lie l'identifiant de l'utilisateur à supprimer à la requête préparée
        $stmt->bindParam(':id', $id);
        // Exécute la requête de suppression
        $stmt->execute();

        // Redirige l'utilisateur vers une page de confirmation ou une autre page après la suppression
        header("Location: liste_client.php");
        exit(); // Arrête l'exécution du script après la redirection
    } catch(PDOException $e) {
        // Affiche l'erreur en cas de problème avec la requête
        echo "Erreur lors de la suppression de l'utilisateur : " . $e->getMessage();
    }

    // Ferme la connexion à la base de données
    $conn = null;
} else {
    // Redirige l'utilisateur vers une page d'erreur ou une autre page si l'identifiant n'est pas passé dans l'URL
    header("Location: erreur_suppression.php");
    exit(); // Arrête l'exécution du script après la redirection
}
?>
