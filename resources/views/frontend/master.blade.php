<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Plateforme des concertations nationales</title>
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

  <!-- =======================================================
  * Template Name: Butterfly
  * Template URL: https://bootstrapmade.com/butterfly-free-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .icon {
  position: relative; /* Pour positionner le message */
  cursor: pointer; /* Change le curseur en main */
  transition: transform 0.4s ease; /* Animation de transformation */
}

.icon:hover {
  transform: scale(1.2); /* Agrandit l'icône au survol */
}

h5 {
  transition: color 0.4s ease; /* Animation de changement de couleur */
}

.icon:hover + h5 {
  color: #ff5733; /* Couleur au survol */
}

.icon:hover i {
  color: #ff5733; /* Couleur de l'icône au survol */
}

/* Styles pour le message d'invite */
.tooltip {
  visibility: hidden; /* Masqué par défaut */
  background-color: #333; /* Couleur de fond */
  color: #fff; /* Couleur du texte */
  text-align: center;
  border-radius: 5px;
  padding: 2px;
  position: absolute;
  z-index: 1;
  bottom: 125%; /* Positionné au-dessus de l'icône */
  left: 50%;
  transform: translateX(-50%); /* Centre le tooltip */
  opacity: 0; /* Masqué par défaut */
  transition: opacity 0.3s; /* Animation de l'opacité */
}

.icon:hover .tooltip {
  visibility: visible; /* Affiche le message au survol */
  opacity: 1; /* Rend visible */
}
.navmenu a.active {
    background-color: #F4F4F4; /* Choisissez la couleur de fond souhaitée */
    color: black; /* Couleur du texte pour le contraste */
}


  </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center">
        <img src="assets/img/logg.png" alt="">
        <!-- Uncomment the line below if you also wish to use text logo -->
        <!-- <h1 class="sitename">Butterfly</h1>  -->
      </a>

      <nav id="navmenu" class="navmenu">
    <ul>
        <li>
            <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}">Accueil</a>
        </li>
        <li>
            <a href="{{ route('contexte') }}">Contexte</a>
        </li>
        <li>
            <a href="{{ route('objectif') }}">objectif</a>
        </li>
        <li>
            <a href="{{ route('participation.form') }}">Donnez-nous votre avis</a>
        </li>
        <li>
            <a href="{{ route('login') }}">Connexion</a>
        </li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>


    </div>
  </header>

  <main class="main">
  
    <!-- Hero Section -->
<section id="hero" class="hero section light-background" style="background-color:#F4F4F4">
  <div class="container">
    
    <div class="row gy-4 align-items-center">
      <!-- Text Section -->
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-md-start" data-aos="fade-up">
        <h3 class="hero-title">PLATEFORME DES CONCERTATIONS NATIONALES POUR LA REFORME DU SERVICE PUBLIC</h3>
        <p class="hero-subtitle">Participez activement à la réforme en donnant votre avis.</p>
        <div class="d-flex mt-4 justify-content-center justify-content-md-start">
          <a href="{{ route('participation.form') }}" class="cta-btn">Votre avis compte</a>
        </div>
      </div>
      <!-- Image Section -->
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
        <img src="assets/img/dioms.avif" class="img-fluid animated rounded-4 shadow-lg" alt="Hero Image">
      </div>
    </div>
  </div>
</section>
 <!-- Services Section -->
  <br>
  <section id="reforme" class="services section light-background">
  <div class="container section-title" data-aos="fade-up">
    <h1 class="title-highlight">La réforme des services publics</h1>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">
      <!-- Bloc 1 : Qu'est-ce qu'une Réforme ? -->
      <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="reforme-item card-shadow position-relative d-flex flex-column justify-content-between" style="height: 100%;">
         
          <img src="assets/img/reforme.webp" style="height: 40%;width:40%;margin-left:30%;border-radius:10px" alt="">
          <h5></h5>
          <h3 class="item-title">Qu'est-ce qu'une Réforme ?</h3>
          
          <p class="item-description">Une réforme est un changement significatif apporté aux politiques ou aux systèmes en place afin d'améliorer leur fonctionnement ou de répondre à de nouveaux besoins.</p>
        </div>
      </div><!-- End Reforme Item -->

      <!-- Bloc 2 : Termes Clés à Connaître -->
      <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="reforme-item card-shadow position-relative d-flex flex-column justify-content-between" style="height: 100%;">
        <img src="assets/img/image.png" style="height: 40%;width:40%;margin-left:30%;border-radius:10px" alt="">
        <h1></h1>
          <h3 class="item-title"  style=''>Termes Clés à Connaître</h3>
          <ul class="item-list">
            <li><strong>Concertation :</strong> Processus de consultation des citoyens pour recueillir leur avis.</li>
            <li><strong>Service public :</strong> Services offerts par l’État pour répondre aux besoins des citoyens (santé, éducation, etc.).</li>
          </ul>
        </div>
      </div><!-- End Reforme Item -->
    </div>
  </div>
</section><!-- /Réforme Section -->
    <!-- About Section -->



    <section id="about" class="about section" style="background-color: #f8f9fa;">
  <div class="container section-title" data-aos="fade-up">
    <h1 class="title-highlight">Principes de la Concertation Nationale</h1>
  </div>

  <div class="container">

    <div class="row gy-4">

      <!-- Image section -->
      <div class="col-lg-6 position-relative" data-aos="fade-up" data-aos-delay="100">
        <img src="assets/img/olivier.PNG" class="img-fluid" style="border-radius: 2%; height: 85%; width: 85%;" alt="Ministre Olivier Boucal">
      </div>

      <div class="col-lg-6 ps-lg-4 content d-flex flex-column justify-content-start" data-aos="fade-up" data-aos-delay="200" style="margin-top: 60px;">
        <p style="text-align: justify;">
          Des concertations seront organisées dans chaque région du Sénégal, offrant ainsi aux communautés locales une précieuse opportunité de partager leurs besoins spécifiques et d'exprimer leurs préoccupations. Ces échanges, qui favorisent le dialogue entre les citoyens et les acteurs locaux, visent à recueillir des avis diversifiés, afin de mieux cerner les défis et les priorités uniques de chaque région.
        </p>
        <p style="text-align: justify;">
          En intégrant activement les contributions citoyennes et régionales, ces concertations permettront aux différentes organisations et parties prenantes d'élaborer et de proposer des mesures de réforme significatives et adaptées. L'objectif principal est de renforcer la synergie des actions engagées et d'accroître l'impact positif sur les bénéficiaires. De plus, les travaux préparatoires du comité technique ad hoc ont déjà permis d'identifier plusieurs thèmes clés, qui seront au cœur des discussions lors de ces concertations thématiques, garantissant ainsi que les préoccupations des citoyens soient véritablement prises en compte.
        </p>
      </div>
    </div>

  </div>

</section>




<section id="themes">
  <div class="container section-title" data-aos="fade-up">
    <h1 style="color: black; font-weight: bold;">Thèmes phares des concertations</h1>
    
  </div><!-- End Section Title -->
  
  <div class="container">
    <div class="row gy-4 text-center">
      <!-- Qualité du service public -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="icon" style="font-size: 50px;" onclick="showPopup('Qualité du service public', 'Assurer une prestation de services publics de haute qualité, répondant aux attentes des citoyens.')">
          <i class="fas fa-star" style="font-size: 50px; color: #ffcc00;"></i>
          <span class="tooltip">Cliquez pour voir les détails</span>
        </div>
        <h5 style="color: #ffcc00;">Qualité du service public</h5>
      </div>
      
      <!-- Transparence, Équité et redevabilité -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="icon" style="font-size: 50px;" onclick="showPopup('Transparence, Équité et redevabilité', 'Promouvoir la transparence et la responsabilité dans les actions des institutions publiques.')">
          <i class="fas fa-balance-scale" style="font-size: 50px; color: #28a745;"></i>
          <span class="tooltip">Cliquez pour voir les détails</span>
        </div>
        <h5 style="color: #28a745;">Transparence, Équité et redevabilité</h5>
      </div>
      
      <!-- Transformation digitale de l'Administration -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="icon" style="font-size: 50px;" onclick="showPopup('Transformation digitale de l\'Administration', 'Faciliter l\'accès aux services publics par des solutions numériques innovantes.')">
          <i class="fas fa-desktop" style="font-size: 50px; color: #007bff;"></i>
          <span class="tooltip">Cliquez pour voir les détails</span>
        </div>
        <h5 style="color: #007bff;">Transformation digitale de l'Administration</h5>
      </div>
      
      <!-- Cadre de gestion des ressources humaines -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="icon" style="font-size: 50px;" onclick="showPopup('Cadre de gestion des ressources humaines', 'Mettre en place des pratiques de gestion des ressources humaines équitables et efficaces.')">
          <i class="fas fa-users" style="font-size: 50px; color: #6f42c1;"></i>
          <span class="tooltip">Cliquez pour voir les détails</span>
        </div>
        <h5 style="color: #6f42c1;">Cadre de gestion des ressources humaines</h5>
      </div>
      
      <!-- Cadre organisationnel des services publics -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
        <div class="icon" style="font-size: 50px;" onclick="showPopup('Cadre organisationnel des services publics', 'Renforcer l\'efficacité et la cohérence des structures administratives.')">
          <i class="fas fa-building" style="font-size: 50px; color: #fd7e14;"></i>
          <span class="tooltip">Cliquez pour voir les détails</span>
        </div>
        <h5 style="color: #fd7e14;">Cadre organisationnel des services publics</h5>
      </div>
      
      <!-- Autres -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
        <div class="icon" style="font-size: 50px;" onclick="showPopup('Autres', 'Explorer d\'autres thématiques pertinentes pour l\'amélioration des services publics.')">
          <i class="fas fa-ellipsis-h" style="font-size: 50px; color: #6c757d;"></i>
          <span class="tooltip">Cliquez pour voir les détails</span>
        </div>
        <h5 style="color: #6c757d;">Autres</h5>
      </div>
    </div>
  </div>
</section>

<section id="themes" style="background-color: #f8f9fa; padding: 50px 0;">
  <div class="container" data-aos="fade-up">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-12">
        <div class="ministere-content" style="max-width: 800px; margin: auto;">
          <h4 class="mb-4" style="font-size: 2rem; font-weight: bold; color: #333333;">Ministère de la Fonction publique et de la Réforme du Service public</h4>
          <p style="text-align: justify; line-height: 1.6;">
            Le Ministère en charge de la Réforme du service public œuvre à donner corps à cette vision, avec pour objectif d’être la force d’impulsion de la transformation qualitative de notre Administration. Celle-ci doit être le miroir des attentes du public, une Administration à l’écoute des citoyens, une Administration qui réinvente sa relation avec chaque demandeur de service public.
          </p>
          <p style="text-align: justify; line-height: 1.6;">
            La concertation nationale permettra à chaque citoyen, dans toutes les régions, de participer activement au dialogue visant à réformer les services publics.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>


  
</section>
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




<section id="stats" class="stats section light-background">

<img src="assets/img/statss.webp" alt="" data-aos="fade-in">

<div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
  

  <div class="row gy-4">

    <div class="col-lg-4 col-md-6">
      <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="1974" data-purecounter-duration="1" class="purecounter"></span>
        <h4>Avis recueillis</h4>
      </div>
    </div><!-- End Stats Item -->

    <div class="col-lg-4 col-md-6">
      <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
        <h4>De la diaspora</h4>
      </div>
    </div><!-- End Stats Item -->

    <div class="col-lg-4 col-md-6">
      <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
        <h4>Sénégal</h>
      </div>
    </div><!-- End Stats Item -->
<!-- End Stats Item -->

  </div>

</div>

</section>
</main>

 @yield('footer')
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