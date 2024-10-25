<?php
session_start();
if(!isset($_SESSION['user'])) {
  // Redirigez l'utilisateur vers une autre page s'il n'est pas connecté
  header("Location: index.php");
  exit; // Arrêtez l'exécution du script après la redirection
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/logo.jpg">
  <title>
    Mes projets
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
    .btn {
     margin-right:-45px;
    width: 90px;
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
}



  </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" target="_blank">
        <img src="assets/img/logo-maroc-removebg-preview (2).png" class="navbar-brand-img h-100 w-100 max-height-vh-100" style="margin-top: -30px ;" alt="main_logo">
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    

  

  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
 
    
    <!-- End Navbar -->


    <div class="container-fluid py-4" style="margin-top: 4rem;">
      <div class="row" style="margin-top:1rem ;">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Mes clients</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">identifiant</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">nom</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">password</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">solde</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">statut</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  
    <?php
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

    // Prépare la requête de sélection SQL
    $stmt = $conn->prepare("SELECT * FROM user");
    // Exécute la requête
    $stmt->execute();
    // Récupère toutes les lignes résultantes
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    // Affiche l'erreur en cas de problème avec la requête
    echo "Erreur lors de la sélection des données : " . $e->getMessage();
}

// Affichage des données dans un tableau HTML
if(isset($result) && !empty($result)) {
    $count =0;
    foreach($result as $row) {
       
 
   $count++

        ?>
                 
                     <tr>
                     <td><?= $count?></td>
                        <td><?= $row['identifiant'] ?></td>
                        <td><?=  $row['nom'] ?></td>
                        <td><?=  $row['password'] ?></td>
                        <td><?=  $row['solde'] ?></td>
                        <td><a href="suppression.php?id=<?=  $row['id'] ?>"><button type="button" class="btn btn-primary" >supprimer</button></a></td>
                    </tr>
                 
                <?php
            }
   
        } else {
            echo "Aucune donnée trouvée dans la table 'user'.";
        }
        
        // Ferme la connexion à la base de données
        $conn = null;
        ?>
                           
                           </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
  
      <footer class="footer pt-3  "  style="margin-top: 4rem;">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">2024 SOCIETE GENERALE DU MAROC.</a>
            
              </div>
            </div>
           
          </div>
        </div>
      </footer>
    </div>
  </main>
 
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

  </html>