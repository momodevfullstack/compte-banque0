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
      $reponse="";
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
            $_SESSION['user'] = $stmt->fetch(PDO::FETCH_ASSOC);

            // Redirection vers la page de tableau de bord
            header("Location: dashboard.php");
            exit(); // Assure la fin de l'exécution du script après la redirection
        } else {
            // L'utilisateur n'est pas authentifié, affichage d'un message d'erreur
          $reponse = "Identifiant ou code secret incorrect.";
        
         
        }
    }
} catch(PDOException $e) {
    // Gestion des erreurs de connexion à la base de données
   $reponse = "La connexion à la base de données a échoué : " . $e->getMessage();
 
 
}

// Fermeture de la connexion à la base de données
$conn = null;
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/logo.jpg">
  <title>
   Connexion-Sg-maroc-appservice-enligne
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
     .logo{
         margin-top:-75px;
         width:250px;
         height:250px;
         margin-left:-50px;
     }
     .container1{
        
     }
    }
  </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent mt-4">
    <div class="container" >
     <div class="container1" >
          <img class="logo" src="assets/img/logo_user1.png" alt="" width="280px" height="300px">
     </div>
     
      
     
     
    
      <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  
  <section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('assets/img/image-sg.jpg')">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Bienvenue!</h1>
            <p class="row justify-content-center" style="color: white;">Connectez vous à votre espace client en lignes et accéder a vos comptes..</p>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Connectez vous</h5>
            </div>
           
            
              
      
        <?php
           

             if(!empty($reponse)){
              echo "<div class='message_erreur'><span  style='color:red;font-weight:bold;'>".$reponse ."</span> </div>" ;
             }


              ?>
       

            <div class="card-body">
              <form role="form text-left" method="POST" >
               
                <div class="mb-3">
                  <input type="number" class="form-control" placeholder="identifiant" name="identifiant" aria-label="Email" aria-describedby="number-addon">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" placeholder="Code secret" name="password"  aria-label="Password" aria-describedby="password-addon">
                </div>
                <div class="form-check form-check-info text-left">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                  <label class="form-check-label" for="flexCheckDefault">
                    Se souvenir de moi 
                  </label>
                </div>
               
                 <div class="text-center">
                  <button type="submit" name="button"  class="btn bg-gradient-dark w-100 my-4 mb-2">Connexion</button>
                  </div>
             
                <p class="row justify-content-center"> <a href="javascript:;" class="text-dark font-weight-bolder">Vous n'etre pas encore client </a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5 justify-content-center">
    <div class="container ">
     
      <div class="row">
        <div class="row">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> 2024 SOCIETE GENERALE DE FRANCE.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
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
  
 <?php
  unset($reponse);
 ?>


 
</body>

</html>