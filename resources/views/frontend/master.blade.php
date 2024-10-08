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
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="#" class="logo d-flex align-items-center">
        <img src="assets/img/logg.png" alt="">
        <!-- Uncomment the line below if you also wish to use text logo -->
        <!-- <h1 class="sitename">Butterfly</h1>  -->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="{{ route('contexte') }}">Contexte</a></li>
    
          <li><a href="{{ route('participation.form') }}">Donnez-nous votre avis</a></li>

       
          <!--  <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>-->
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
        <h3 class="hero-title">PLATEFORME DES CONCERTATIONS NATIONALES POUR LA REFORME DU SERVICE PUBLIC</h3>
        <p class="hero-subtitle">Participez activement à la réforme en donnant votre avis.</p>
        <div class="d-flex mt-4 justify-content-center justify-content-md-start">
          <a href="{{ route('participation.form') }}" class="cta-btn">Votre avis compte</a>
        </div>
      </div>
      <!-- Image Section -->
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
        <img src="assets/img/bigdioms.jpg" class="img-fluid animated rounded-4 shadow-lg" alt="Hero Image">
      </div>
    </div>
  </div>
</section>
 <!-- Services Section -->
  <br>
  <section id="reforme" class="services section light-background">
  <div class="container section-title" data-aos="fade-up">
    <h1 class="title-highlight">La Réforme du Service public</h1>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">
      <!-- Bloc 1 : Qu'est-ce qu'une Réforme ? -->
      <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="reforme-item card-shadow position-relative d-flex flex-column justify-content-between" style="height: 100%;">
         
          <img src="assets/img/reforme.webp" style="height: 150px;width:50%;margin-left:25%;border-radius:10px" alt="">
          <h3 class="item-title">Qu'est-ce qu'une Réforme ?</h3>
          <p class="item-description">Une réforme est un changement significatif apporté aux politiques ou aux systèmes en place afin d'améliorer leur fonctionnement ou de répondre à de nouveaux besoins.</p>
        </div>
      </div><!-- End Reforme Item -->

      <!-- Bloc 2 : Termes Clés à Connaître -->
      <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="reforme-item card-shadow position-relative d-flex flex-column justify-content-between" style="height: 100%;">
        <img src="assets/img/image.png" style="height: 150px;width:50%;margin-left:25%;border-radius:10px" alt="">
        <br>
          <h3 class="item-title" >Termes Clés à Connaître</h3>
          <ul class="item-list">
            <li><strong>Concertation :</strong> Processus de consultation des citoyens pour recueillir leur avis.</li>
            <li><strong>Service public :</strong> Services offerts par l’État pour répondre aux besoins des citoyens (santé, éducation, etc.).</li>
          </ul>
        </div>
      </div><!-- End Reforme Item -->
    </div>
  </div>
</section><!-- /Réforme Section -->



<section id="themes">
  <div class="container section-title" data-aos="fade-up">
    <h1 style="color: black;font-weight:bold ">Thèmes phares des concertations</h1>
  </div><!-- End Section Title -->
  <div class="container">
    <div class="row gy-4 text-center">
      <!-- Qualité du service public -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="icon" style="font-size: 50px;" onclick="showPopup('Qualité du service public', 'Assurer une prestation de services publics de haute qualité, répondant aux attentes des citoyens.')">
        <i class="fas fa-star" style="font-size: 50px; color: #0059b3;"></i>
        </div>
        <h5 style="color: #0059b3;">Qualité du service public</h5>
      </div>
      <!-- Transparence, Équité et redevabilité -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="icon" style="font-size: 50px;" onclick="showPopup('Transparence, Équité et redevabilité', 'Promouvoir la transparence et la responsabilité dans les actions des institutions publiques.')">
        <i class="fas fa-balance-scale" style="font-size: 50px; color: #00b33c;"></i>
        </div>
        <h5 style="color: #00b33c;">Transparence, Équité et redevabilité</h5>
      </div>
      <!-- Transformation digitale de l'Administration -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="icon" style="font-size: 50px;" onclick="showPopup('Transformation digitale de l\'Administration', 'Faciliter l\'accès aux services publics par des solutions numériques innovantes.')">
        <i class="fas fa-desktop" style="font-size: 50px; color: #3399ff;"></i>
        </div>
        <h5 style="color: #3399ff;">Transformation digitale de l'Administration</h5>
      </div>
      <!-- Cadre de gestion des ressources humaines -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="icon" style="font-size: 50px;" onclick="showPopup('Cadre de gestion des ressources humaines', 'Mettre en place des pratiques de gestion des ressources humaines équitables et efficaces.')">
        <i class="fas fa-users" style="font-size: 50px; color: #800080;"></i>
        </div>
        <h5 style="color: #800080;">Cadre de gestion des ressources humaines</h5>
      </div>
      <!-- Cadre organisationnel des services publics -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
        <div class="icon" style="font-size: 50px;" onclick="showPopup('Cadre organisationnel des services publics', 'Renforcer l\'efficacité et la cohérence des structures administratives.')">
        <i class="fas fa-building" style="font-size: 50px; color: #ff6600;"></i>
        </div>
        <h5 style="color: #ff6600;">Cadre organisationnel des services publics</h5>
      </div>
      <!-- Autres -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
        <div class="icon" style="font-size: 50px;" onclick="showPopup('Autres', 'Explorer d\'autres thématiques pertinentes pour l\'amélioration des services publics.')">
        <i class="fas fa-ellipsis-h" style="font-size: 50px; color: #999999;"></i>
        </div>
        <h5 style="color: #999999;">Autres</h5>
      </div>
    </div>
  </div>
</section>
<section id="themes">
  <div class="container" data-aos="fade-up">
    <div class="row align-items-center justify-content-center text-center text-lg-start">
      <!-- Image section -->
      <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
        <div class="ministere-img">
          <img src="assets/img/mfp.png" alt="MFP Logo" class="img-fluid" style="max-width: 50%; height: auto;">
        </div>
      </div>
      <!-- Text section -->
      <div class="col-lg-8 col-md-6 col-12">
        <div class="ministere-content">
          <h4 class="mb-3">Ministère de la Fonction publique et de la Réforme du Service public</h4>
          <p style="text-align:justify">
            Le Ministère en charge de la Réforme du service public œuvre à donner corps à cette vision, en ayant comme objectif d’être la force d’impulsion de la transformation qualitative de notre Administration, qui doit être le miroir des attentes du public, une Administration à l’écoute des citoyens, une Administration qui réinvente sa relation avec chaque demandeur du service public.
          </p>
          <p style="text-align:justify">
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

    <!-- About Section -->
<section id="about" class="about section">

<div class="container">

  <div class="row gy-4">

    <!-- Image section -->
    <div class="col-lg-6 position-relative" data-aos="fade-up" data-aos-delay="100">
    <img src="assets/img/boucal.jpeg" class="img-fluid" style="margin-top:10%; border-radius: 2%;" alt="Ministre Olivier Boucal">

     
    </div>

    <!-- Content section -->
    <div class="col-lg-6 ps-lg-4 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200" style="margin-top:150px">
    <h3>Principes de la Concertation Nationale</h3>
      <p>
     
      <p>
              Des conertations seront organisées dans chaque région du Sénégal, permettant aux différentes communautés locales de partager leurs besoins spécifiques et de faire entendre leurs voix.
        </p>
        <p>
              En recueillant les avis des citoyens, la concertation permettra de mieux comprendre les défis et les priorités de chaque région, afin de formuler des réformes qui répondent véritablement aux besoins exprimés par la population.
</br>

        </p>
         
      <ul>
        <li>
     
        </li>
     
        <li>
       
          <div>
          
        </li>
      </ul>
      
    </div>
  

  </div>

</div>

</section>


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
<!-- /About Section -->

    <!-- Stats Section 
    <section id="stats" class="stats section light-background">

      <img src="assets/img/stats-bg.jpg" alt="" data-aos="fade-in">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1974" data-purecounter-duration="1" class="purecounter"></span>
              <p>Avis recueillis</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p>De la diaspora</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p>Sénégal</p>
            </div>
          </div><
><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Clients Section -->
    <!-- <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0 clients-wrap">

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div> 

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-7.png" class="img-fluid" alt="">
          </div>

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-8.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>

    </section>< /Clients Section -->

   
    <!-- Portfolio Section -->
   <!--  <section id="portfolio" class="portfolio section">

     
      <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div>

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-product">Product</li>
            <li data-filter=".filter-branding">Branding</li>
            <li data-filter=".filter-books">Books</li>
          </ul>

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/app-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/portfolio/app-1.jpg" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/product-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Product 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/portfolio/product-1.jpg" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/branding-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Branding 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/portfolio/branding-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/books-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Books 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/portfolio/books-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/app-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/portfolio/app-2.jpg" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/product-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Product 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/portfolio/product-2.jpg" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/branding-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Branding 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/portfolio/branding-2.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/books-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Books 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/portfolio/books-2.jpg" title="Branding 2" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/app-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/portfolio/app-3.jpg" title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/product-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Product 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/portfolio/product-3.jpg" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/branding-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Branding 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/portfolio/branding-3.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/books-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Books 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/portfolio/books-3.jpg" title="Branding 3" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>

    </section>-->

    <!-- Testimonials Section
    <section id="testimonials" class="testimonials section dark-background">

      <img src="assets/img/testimonials-bg.jpg" class="testimonials-bg" alt="">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div> -->

  <!--         <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div> 

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section>-->

 
  
    <!-- Contact Section 
    <section id="contact" class="contact section">

     
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55</p>
              </div>
            </div>

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>info@example.com</p>
              </div>
            </div>

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div>

        </div>

      </div>

    </section><!-- /Contact Section -->

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