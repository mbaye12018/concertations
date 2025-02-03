<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <title>Transformation Digitale</title>
   <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
   <link rel="icon" href="../assets/img/logg.png" type="image/x-icon"/>


   <!-- FontAwesome + Webfont -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
   <script>
     WebFont.load({
       google: { families: ["Public Sans:300,400,500,600,700"] },
       custom: {
         families: ["Font Awesome 5 Solid","Font Awesome 5 Regular","Font Awesome 5 Brands","simple-line-icons"],
         urls: ["assets/css/fonts.min.css"],
       },
       active: function () {
         sessionStorage.fonts = true;
       },
     });
   </script>


   <!-- Bootstrap + Kaiadmin CSS -->
   <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
   <link rel="stylesheet" href="../assets/css/plugins.min.css" />
   <link rel="stylesheet" href="../assets/css/kaiadmin.min.css" />
   <link rel="stylesheet" href="../assets/css/demo.css" />


   <style>
       body {
           background-color: #f4f7fc;
           font-family: 'Public Sans', sans-serif;
       }
       .chart-container {
           background: #fff;
           border-radius: 12px;
           box-shadow: 0 4px 8px rgba(0,0,0,0.1);
           padding: 20px;
           margin-bottom: 20px;

       }
       .chart-header h4 {
           text-align: center;
           margin-bottom: 15px;
       }

       /* Section suggestions */
       .suggestions-container {
           background: #fff;
           border-radius: 12px;
           box-shadow: 0 2px 5px rgba(0,0,0,0.1);
           margin: 20px auto;
           max-width: 600px;
           padding: 20px;
       }
       .suggestions-container h4 {
           text-align: center;
           margin-bottom: 10px;
       }
       .btn-choose-theme {
        display: inline-flex;
        align-items: center;
        padding: 12px 24px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 30px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      .btn-choose-theme:hover {
        background-color: #0056B3;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      }
      .btn-choose-theme:active {
        transform: translateY(1px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }
   </style>
</head>
<body>
<div class="wrapper">
<div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
            <h6 style="color:white">Concertations nationales</h6>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="gg-menu-right"></i>
                    </button>
                    <button class="btn btn-toggle sidenav-toggler">
                        <i class="gg-menu-left"></i>
                    </button>
                </div>
                <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                </button>
            </div>
            <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-secondary">
                    <li class="nav-item active">
                        <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <p>Accueil</p>
                        </a>
                    </li><!-- End Logo Header
                    <li class="nav-item">
                        <a href="{{ route('utilisateur.create') }}">
                            <i class="fas fa-user"></i>
                            <p>Utilisateur</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('statistique.statistique') }}">
                            <i class="far fa-chart-bar"></i>
                            <p>Statistique</p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="#">
                            <i class="fas fa-user"></i>
                            <p>Utilisateur</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="far fa-chart-bar"></i>
                            <p>Statistique</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
   <!-- END SIDEBAR -->



   <div class="main-panel">
   <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                <div class="container-fluid">
                    <span class="op-7">Bienvenue,</span>
                    <span class="fw-bold">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</span>

                    <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenu2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <li>
                                    <button class="dropdown-item" type="button">
                                        <a href="{{ route('login') }}">Deconnexion</a>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </ul>
                </div>

            </nav>

       <div class="container">
       <a href="{{ route('admin.dashboard') }}" class="btn-choose-theme">
            <span class="btn-text"><i class="fas fa-palette" style="color: green;"></i> Choisir un autre thème</span>
        </a>

       <div class="page-inner">
    <h2 class="text-center text-primary mt-3">
        <i class="fas fa-chart-line" style="color: green;"></i> <span style="color: black;">Statistiques - Transformation Digitale</span>
    </h2>

    <div class="row">
        <!-- Évaluation Accessibilité -->
        <div class="col-md-6">
            <div class="chart-container">
                <div class="chart-header">
                    <h4 style="color: black;">
                        <i class="fas fa-universal-access" style="color: green;"></i> Comment l’accessibilité des services digitaux  est évalué?
                    </h4>
                </div>
                <canvas id="evaluationChart"></canvas>
            </div>
        </div>

        <!-- Utilisation Services Numériques -->
        <div class="col-md-6">
            <div class="chart-container">
                <div class="chart-header">
                    <h4 style="color: black;">
                        <i class="fas fa-laptop" style="color: green;"></i> Utilisez-vous les services publics digitalisés ?
                    </h4>
                </div>
                <canvas id="usageChart"></canvas>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Problèmes Rencontrés -->
        <div class="col-md-6">
            <div class="chart-container">
                <div class="chart-header">
                    <h4 style="color: black;">
                        <i class="fas fa-exclamation-triangle" style="color: green;"></i> Problèmes Rencontrés (Oui / Non)
                    </h4>
                </div>
                <canvas id="problemChart"></canvas>
            </div>
        </div>

        <!-- Tranche d'âge -->
        <div class="col-md-6">
            <div class="chart-container">
                <div class="chart-header">
                    <h4 style="color: black;">
                        <i class="fas fa-user-clock" style="color: green;"></i> Tranche d'âge
                    </h4>
                </div>
                <canvas id="ageChart"></canvas>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Répartition par Sexe -->
        <div class="col-md-6">
            <div class="chart-container">
                <div class="chart-header">
                    <h4 style="color: black;">
                        <i class="fas fa-venus-mars" style="color: green;"></i> Répartition par Sexe
                    </h4>
                </div>
                <canvas id="genderChart"></canvas>
            </div>
        </div>

        <!-- Répartition par Localité -->
        <div class="col-md-6">
            <div class="chart-container">
                <div class="chart-header">
                    <h4 style="color: black;">
                        <i class="fas fa-map-marker-alt" style="color: green;"></i> Répartition par Localité
                    </h4>
                </div>
                <canvas id="localityChart"></canvas>
            </div>
        </div>



               <!-- SECTION SUGGESTIONS -->
               <div class="suggestions-container" id="suggestionsContainer">
    <h4><i class="fas fa-lightbulb"></i> Suggestions pour Améliorer la Transformation Digitale</h4>
    <button id="prevBtn" class="nav-btn">
        <i class="fas fa-chevron-left"></i>
    </button>
    <p id="suggestionText"></p>
    <button id="nextBtn" class="nav-btn">
        <i class="fas fa-chevron-right"></i>
    </button>
</div>
<style>
    .suggestions-container {
    position: relative;
    text-align: center;
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    min-height: 250px;
}

h4 {
    font-size: 1.2rem;
    color: #007bff;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px; /* Espacement entre l'icône et le texte */
}

h4 i {
    color: #ffc107; /* Icône en jaune */
}

.nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: #007bff;
}

#prevBtn {
    left: 10px;
}

#nextBtn {
    right: 10px;
}

.nav-btn:hover {
    color: #0056b3;
}

</style>


           </div><!-- end page-inner -->
       </div><!-- end container -->


       <!-- FOOTER -->
       <footer class="footer">
           <div class="container-fluid d-flex justify-content-center">
               <div class="copyright text-center">
                   © 2025 Copyright MFPRSP/DSI/D2I
               </div>
           </div>
       </footer>
       <!-- END FOOTER -->
   </div><!-- end main-panel -->
</div><!-- end wrapper -->


<!-- SCRIPTS -->
<script src="../assets/js/core/jquery-3.7.1.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugin/chart.js/chart.min.js"></script>
<script src="../assets/js/kaiadmin.min.js"></script>


<script>
document.addEventListener("DOMContentLoaded", function() {
   // 1) Évaluation Accessibilité
   new Chart(document.getElementById("evaluationChart"), {
       type: "bar",
       data: {
           labels: @json($evaluationLabels),
           datasets: [{
               label: "Accessibilité",
               data: @json($evaluationData),
               backgroundColor: ["#27ae60","#2ecc71","#f39c12","#e74c3c","#c0392b"]
           }]
       },
       options: {
           responsive: true,
           layout: {
          padding: 8
          },
           scales: { y: { beginAtZero: true } }
       }
   });


   // 2) Utilisation (oui / non)
   new Chart(document.getElementById("usageChart"), {
       type: "pie",
       data: {
           labels: @json($usageLabels),
           datasets: [{
               data: @json($usageData),

               backgroundColor: ["#3498db","#e67e22"]
           }]
       },
       options: {
           responsive: true,
           layout: {
          padding: 30
          },
       },

   });


   // 3) Problèmes (oui / non)
   new Chart(document.getElementById("problemChart"), {
       type: "doughnut",
       data: {
           labels: @json($problemLabels),
           datasets: [{
               data: @json($problemData),
               backgroundColor: ["#9b59b6","#16a085"]
           }]
       },
       options: {
           responsive: true,
           layout: {
          padding: 30
          },
       }
   });


   // 4) Tranche d'âge
   new Chart(document.getElementById("ageChart"), {
       type: "bar",
       data: {
           labels: @json($ageLabels),
           datasets: [{
               label: "Âge",
               data: @json($ageData),
               backgroundColor: "#f39c12"
           }]
       },
       options: {
           responsive: true,
           layout: {
          padding: 30
          },
           scales: { y: { beginAtZero: true } }
       }
   });


   // 5) Sexe
   new Chart(document.getElementById("genderChart"), {
       type: "pie",
       data: {
           labels: @json($genderLabels),
           datasets: [{
               data: @json($genderData),
               backgroundColor: ["#3498db","#e74c3c"]
           }]
       },
       options: {
           responsive: true,
           layout: {
          padding: 30
          },
       }
   });


   // 6) Localité
   new Chart(document.getElementById("localityChart"), {
       type: "pie",
       data: {
           labels: @json($localityLabels),
           datasets: [{
               data: @json($localityData),
               backgroundColor: ["#27ae60","#d35400"]
           }]
       },
       options: {
           responsive: true,
           layout: {
          padding: 30
          },
       }
   });


   // SECTION SUGGESTIONS
   const suggestions = @json($suggestions);
   console.log("Suggestions Digitale :", suggestions);


   // Sélection des éléments
   const suggestionContainer = document.getElementById("suggestionsContainer");
   const suggestionText = document.getElementById("suggestionText");
   const prevBtn = document.getElementById("prevBtn");
   const nextBtn = document.getElementById("nextBtn");


   if(!suggestions || suggestions.length === 0) {
       suggestionText.textContent = "Aucune suggestion pour le moment.";
       prevBtn.style.display = "none";
       nextBtn.style.display = "none";
       return;
   }


   let currentIndex = 0;
   let interval;


   function showSuggestion(index) {
       suggestionText.style.opacity = 0;
       setTimeout(() => {
           suggestionText.textContent = suggestions[index];
           suggestionText.style.opacity = 1;
       }, 300);
   }


   function startAutoScroll() {
       interval = setInterval(() => {
           currentIndex = (currentIndex + 1) % suggestions.length;
           showSuggestion(currentIndex);
       }, 5000);
   }


   function stopAutoScroll() {
       clearInterval(interval);
   }


   // Init
   showSuggestion(currentIndex);
   startAutoScroll();


   // Boutons
   prevBtn.addEventListener("click", () => {
       stopAutoScroll();
       currentIndex = (currentIndex - 1 + suggestions.length) % suggestions.length;
       showSuggestion(currentIndex);
       startAutoScroll();
   });


   nextBtn.addEventListener("click", () => {
       stopAutoScroll();
       currentIndex = (currentIndex + 1) % suggestions.length;
       showSuggestion(currentIndex);
       startAutoScroll();
   });


   // Pause au survol
   suggestionContainer.addEventListener("mouseenter", stopAutoScroll);
   suggestionContainer.addEventListener("mouseleave", startAutoScroll);
});
</script>


</body>
</html>


