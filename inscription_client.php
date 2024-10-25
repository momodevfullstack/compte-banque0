<?php
session_start();
if(!isset($_SESSION['user'])) {
  // Redirigez l'utilisateur vers une autre page s'il n'est pas connecté
  header("Location: index.php");
  exit; // Arrêtez l'exécution du script après la redirection
};

// Vérifie si les données du formulaire ont été envoyées

// Vérifie si les données du formulaire ont été envoyées
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si tous les champs requis sont renseignés
    if (isset($_POST['identifiant']) && isset($_POST['password']) && isset($_POST['nom']) && isset($_POST['solde'])) {
        // Récupère les valeurs des champs du formulaire
        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];
        $nom = $_POST['nom'];
        $solde = $_POST['solde'];

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

            // Prépare la requête d'insertion SQL avec des paramètres pour éviter les injections SQL
            $stmt = $conn->prepare("INSERT INTO user (identifiant, password, nom, solde) VALUES (:identifiant, :password, :nom, :solde)");

            // Lie les valeurs des paramètres avec les valeurs des champs du formulaire
            $stmt->bindParam(':identifiant', $identifiant);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':solde', $solde);

            // Exécute la requête
            $stmt->execute();

            $reponse = "Enregistrement ajouté avec succès.";
        } catch(PDOException $e) {
            // Affiche l'erreur en cas de problème avec la requête
            $reponse = "Erreur lors de l'ajout de l'enregistrement : " . $e->getMessage();
            
        }

        // Ferme la connexion à la base de données
        $conn = null;
    } else {
        // Affiche un message d'erreur si des champs requis ne sont pas renseignés
       $reponse = "Veuillez remplir tous les champs du formulaire.";
    }
} else {
    // Affiche un message d'erreur si les données n'ont pas été envoyées via la méthode POST
    // $reponse = "Les données du formulaire doivent être envoyées via la méthode POST.";
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
 
  <link rel="icon" type="image/png" href="assets/img/logo.jpg">
  <title>
   Virement
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <style>
   

.message_erreur{
  display: flex;
    justify-content: center;
    align-items: center;
}


@media only screen and (max-width: 768px){
    p{
      margin-right:180px;
      font-size: 10px;
    }
   .text-lead{
    display: flex;
    justify-content: center;
    align-items: center;
   }
   .message_erreur{
    display: flex;
    justify-content: center;
    align-items: center;
   
   }
  }

  @media only screen and (max-width: 768px){
    .navbar-brand img{
      width: 90px;
      height: 20px;
    }
}
  </style>
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand m-0" target="_blank">
              <img src="assets/img//LOGO-vrai.png" class="navbar-brand-img w-30 max-height-vh-40" alt="main_logo">
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation" style="width: 80%;">
              
             
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
      




  <main class="main-content  mt-0">




    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Effectuer une inscription</h3>
                  <p class="mb-0">Remplissez le formulaire pour effectuer une inscription d'un client</p>
                </div>
                <div class="card-body">

                <?php
           

           if(!empty($reponse)){
            echo "<div class='message_erreur'><span  style='color:red;font-weight:bold;'>".$reponse ."</span> </div>" ;
           }


            ?>
                  <form role="form" method="POST" >
                    <label>indentifiant bénéficiaire</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="identifiant" name="identifiant" aria-label="identifiant" aria-describedby="text-addon" require>
                    </div>
                    <label>password du bénéficiaire</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" placeholder="password" name="password" aria-label="password" aria-describedby="password-addon" require>
                    </div>
                    <label>Nom du bénéficiaire</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="nom"  name="nom" aria-label="nom" aria-describedby="text-addon" require>
                    </div>
                    <label>Solde du bénéficiaire</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="solde" name="solde" aria-label="solde" aria-describedby="text-addon" require>
                    </div>
                   
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0" id="submitButton">Valider</button>
                    </div>
                    
                  </form>
                </div>
                
              </div>

            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('assets/img/image-banque.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
 
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
 

 
</body>

</html>