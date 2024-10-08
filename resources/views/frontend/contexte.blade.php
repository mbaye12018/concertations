<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Plateforme de concertation nationale</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/logoconcertation.PNG" rel="icon">
  <link href="assets/img/logoconcertation.PNG" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

 
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="#" class="logo d-flex align-items-center">
        <img src="assets/img/logg.png" alt="">
      
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
        <li><a href="{{ route('home') }}">Accueil</a></li>

        <li><a href="{{ route('contexte') }}">Contexte</a></li>
    
          <li><a href="{{ route('participation.form') }}">Donnez-nous votre avis</a></li>
 <li><a href="{{ route('login') }}">Connexion</a></li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
<section id="hero" class="hero section light-background">
  <div class="container">
    <div class="row gy-4 align-items-center">
      <!-- Text Section -->
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-md-start" data-aos="fade-up">
      
        <p class="hero-subtitle" style="text-align:justify">L'alternance politique de mars 2024 marque pour le Sénégal le début d'une ère d'inclusion sociale et de souveraineté, avec un engagement vers un pays juste et prospère. Pour réaliser ce changement systémique, il est essentiel d'adopter une Administration publique moderne et accessible, soutenue par un nouveau contrat de gouvernance depuis le 2 avril 2024.

            Ce changement nécessite une réinvention des méthodes d'action de l'administration, souvent isolée de la société en raison de réformes qui ne tiennent pas compte des réalités locales. Des enquêtes révèlent un accès difficile aux services publics, notamment pour les régions éloignées de la capitale.

            À l'international, l'appel à une Administration publique performante se renforce, soulignant l'importance des services publics comme agents de transformation. Les nouvelles autorités sénégalaises s'engagent à réformer le Service public pour rétablir la confiance avec les usagers et construire un secteur public résilient face aux défis contemporains.

            </p>
        <div class="d-flex mt-4 justify-content-center justify-content-md-start">
         
        </div>
      </div>
      <!-- Image Section -->
      <!-- Image Section -->
      <div class="col-lg-6 order-1 order-lg-2 hero-image-no-bg" data-aos="zoom-out" data-aos-delay="100">
  <img src="assets/img/dss.png" style="margin-top: -50px; border-radius: 0%;" class="img-fluid" alt="Hero Image">
</div>


    </div>
  </div>
</section>
 <!-- Services Section -->
  <br>


<div id="popup" class="popup">
  <div class="popup-content">
    <span class="close" onclick="closePopup()">&times;</span>
    <h3 id="popup-title"></h3>
    <p id="popup-text"></p>
  </div>
</div>
<div id="popup" class="popup">
  <div class="popup-content">
    <span class="close" onclick="closePopup()">&times;</span>
    <p id="popup-text"></p>
  </div>
</div>


  </main>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
  function showPopup(title, content) {
  document.getElementById('popup-title').innerText = title;
  document.getElementById('popup-text').innerText = content;
  document.getElementById('popup').style.display = 'flex';
}
function closePopup() {
  document.getElementById('popup').style.display = 'none';
}
</script>





</body>

</html>



<footer id="footer" class="footer">
  

<div class="container footer-top">
  <div class="row gy-4">
   
    <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="#" class="logo d-flex align-items-center">
            <span class="sitename">Plateforme de concertation nationale pour la Réforme du service public</span>
          </a>
          <div class="col-lg-8 col-md-12 footer-about">
         <a href="#" class="logo d-flex align-items-center">
          <span class="rs">Suivez nous
          sur les réseaux sociaux</span>
          </a>
       <div class="social-links d-flex mt-4">
        <a href="https://x.com/FpubliqueSn"><i class="bi bi-twitter-x"></i></a>
        <a href="https://www.facebook.com/fonctionpubliqueSn"><i class="bi bi-facebook"></i></a>
        <a href="https://www.youtube.com/@fpubliquesn4927"><i class="bi bi-youtube"></i></a>
        <a href="https://sn.linkedin.com/company/minist-re-de-la-fonction-publique-et-de-la-transformation-du-secteur-public"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Accès rapide</h4>
          <ul>
            <li><a href="https://www.fonctionpublique.gouv.sn/Recrutement">Souscrire à une demande d’emploi</a></li>
            <li><a href="https://www.fonctionpublique.gouv.sn/Attestation-de-non-appartenance-a-la-Fonction-publique-39">Obtenir votre Attestation ...</a></li>
           <li><a href="https://www.fonctionpublique.gouv.sn/Actes-37">Télécharger votre acte administratif</a></li>
           <!--  <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>-->
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>liens utiles</h4>
          <ul>
            <li><a href="https://www.fonctionpublique.gouv.sn/Attestation-de-non-appartenance-a-la-Fonction-publique-39">Gov'athon 2024</a></li>
            <li><a href="https://www.fonctionpublique.gouv.sn/">Ministère de la Fonction publique</a></li>
            <li><a href="https://primature.sn/">Gouvernement du Sénégal</a></li>
          <!--  <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>-->
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Localisation</h4>
         
          <p>52, Vincens x </p>
          <p>Abdou Karim BOURGI,</p>
          <p>Dakar</p>
         <!-- <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
          <p><strong>Email:</strong> <span>info@example.com</span></p>-->
        </div>

      </div>
  

   

  </div>
</div>

<div class="container copyright text-center mt-4">
  <p>© <span>2024 Copyright</span> <strong class="px-1 sitename">MFPRSP/D2I</strong> <span></span></p>
 
</div>

</footer>
