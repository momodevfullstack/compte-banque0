<?php
session_start();

if(!isset($_SESSION['user'])) {
  // Redirigez l'utilisateur vers une autre page s'il n'est pas connecté
  header("Location: index.php");
  exit; // Arrêtez l'exécution du script après la redirection
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
              <img src="assets/img/logo.png" class="navbar-brand-img w-30 max-height-vh-40" alt="main_logo">
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation" style="width: 80%;">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="dashboard.php">
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    Espace client
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="mes_cartes.php">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    Mes cartes
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="projet.php">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Projet
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="beneficiaires.php">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                   beneficiaire
                  </a>
                </li>
              </ul>
             
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
                  <h3 class="font-weight-bolder text-info text-gradient">Effectuer un virement</h3>
                  <p class="mb-0">Remplissez le formulaire pour effectuer un virement en ligne</p>
                </div>
                <div class="card-body">

                  <form role="form" method="POST" action="sendMail/traitement_form.php">
                    <label>Nom du bénéficiaire</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="nom" name="nom" aria-label="nom" aria-describedby="text-addon" require>
                    </div>
                    <label>prénom du bénéficiaire</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="prénom" name="prénom" aria-label="prénom" aria-describedby="text-addon" require>
                    </div>
                    <label>IBAN</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="IBAN"  name="iban" aria-label="IBAN" aria-describedby="text-addon" require>
                    </div>
                    <label>CODE SWIFT</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="CODE SWIFT" name="code_swift" aria-label="CODE SWIFT" aria-describedby="text-addon" require>
                    </div>
                    <label>CODE BANQUE</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="CODE BANQUE" name="code_banque" aria-label="CODE BANQUE" aria-describedby="text-addon" require>
                    </div>
                    <label>Montant</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Montant" name="montant" aria-label="Montant" aria-describedby="text-addon" require>
                    </div>
                    <label>Mail</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" placeholder="Mail" name="mail" aria-label="Mail" aria-describedby="email-addon" require>
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
  
  <script>
  let timerInterval;
  var button = document.getElementById('submitButton');

  // Ajout d'un écouteur d'événements pour le clic sur le bouton
  button.addEventListener('click', function() {
    ;
    Swal.fire({
      title: "Virement en cours",
      html: "chargement ...",
      timer: 3000,
      timerProgressBar: false,
      didOpen: () => {
        Swal.showLoading();
        const timer = Swal.getPopup().querySelector("b");
        timerInterval = setInterval(() => {
          timer.textContent = `${Swal.getTimerLeft()}`;
        }, 100);
      },
      willClose: () => {
        clearInterval(timerInterval);
      }
    }).then((result) => {
      /* Read more about handling dismissals below */
      if (result.dismiss === Swal.DismissReason.timer) {
        Swal.fire({
          title: 'Succes',
          text: 'Virement éffectué',
          icon: "success",
        }).then(() => {
          
          window.location.href = 'sendMail/traitement_form.php';
        });
      }
    });
  });
</script>

 
</body>

</html>