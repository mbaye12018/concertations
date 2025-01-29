<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Concertation nationale</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
    <link rel="icon" href="../assets/img/kaiadmin/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/plugins.min.css" />
    <link rel="stylesheet" href="../assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <style>
      /* General Styles */
      body {
        font-family: 'Public Sans', sans-serif;
        background-color: #F4F7FC;
        color: #333;
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
      .theme-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        max-width: 320px;
        width: 100%;
      }
      .theme-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
      }
      .theme-icon {
        font-size: 3rem;
        color: #4E73DF;
        transition: color 0.3s ease;
      }
      .theme-card:hover .theme-icon {
        color: #007BFF;
      }
      .theme-select {
        width: 70%;
        padding: 12px 18px;
        font-size: 1rem;
        margin-bottom: 20px;
        border-radius: 25px;
        border: 1px solid #ddd;
        background-color: #F8F9FA;
        transition: border 0.3s ease;
      }
      .theme-select:hover {
        border-color: #007BFF;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
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
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item active">
                <a href="{{ route('utilisateur.create') }}">
                  <i class="fas fa-home"></i>
                  <p>Accueil</p>
                </a>
              </li><!-- SECTION: ACCÈS AUX SERVICES PUBLICS
              <li class="nav-item">
                <a href="{{ route('utilisateur.create') }}">
                  <i class="fas fa-user"></i>
                  <p>Utilisateur</p>
                </a>
              </li>-->
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
      <div class="main-panel">
        <div class="container">
          <div class="page-inner">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row">
                      <div class="card-title">Statistique</div>
                      <div class="card-tools">
                        <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                          <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                          </span>
                          Export
                        </a>
                        <a href="#" class="btn btn-label-info btn-round btn-sm">
                          <span class="btn-label">
                            <i class="fa fa-print"></i>
                          </span>
                          Print
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="container-fluid" style="min-height: 375px">
                      <div class="text-center mb-4">
                        <h2 class="text-primary">Dilligence</h2>
                      </div>
                     <!-- Répartition par Complexité -->
                      <h1></h1>
                      <a href="{{ route('admin.dashboard') }}" class="btn-choose-theme">
                        <span class="btn-text">Choisir un autre thème</span>
                      </a>
                      <div class="col-md-12 d-flex justify-content-center">
    <div class="chart-container" style="width: 100%; max-width: 450px; height: 350px; border: 1px solid #ddd; padding: 20px; border-radius: 10px; background-color: #fff;">
        <h4>Répartition par Complexité</h4>
        <canvas id="complexityChart" style="max-height: 300px;"></canvas>
    </div>
</div>

</div>
                  </div>
                  <div class="card-body">
    <div class="container-fluid" style="min-height: 375px">
        <!-- SECTION: ACCÈS AUX SERVICES PUBLICS -->
        <div id="themeSelection" class="hidden-section mt-5">
            <hr>
            <div class="row text-center">
                <!-- Tranche d'âge -->
                <div class="col-md-4 d-flex justify-content-center">
                    <div class="chart-container" style="width: 100%; max-width: 350px; height: 350px; border: 1px solid #ddd; padding: 20px; border-radius: 10px; background-color: #fff;">
                        <h4>Tranche d'âge</h4>
                        <canvas id="ageChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>
                <!-- Répartition par sexe -->
                <div class="col-md-4 d-flex justify-content-center">
                    <div class="chart-container" style="width: 100%; max-width: 350px; height: 350px; border: 1px solid #ddd; padding: 20px; border-radius: 10px; background-color: #fff;">
                        <h4>Répartition par Sexe</h4>
                        <canvas id="genderChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>
                <!-- Répartition par localité -->
                <div class="col-md-4 d-flex justify-content-center">
                    <div class="chart-container" style="width: 100%; max-width: 350px; height: 350px; border: 1px solid #ddd; padding: 20px; border-radius: 10px; background-color: #fff;">
                        <h4>Répartition par Localité</h4>
                        <canvas id="localityChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

              </div>
            </div>
          </div>
        </div>
        <!-- SECTION SUGGESTIONS -->
<h3 class="text-center mt-5">💡 Suggestions des Participants</h3>
<div id="suggestionsContainer" class="mx-auto"
     style="max-width: 600px; min-height: 150px;
            background: #fff; border-radius: 12px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 30px; padding: 20px;
            overflow: hidden; position: relative;
            display: flex; align-items: center; justify-content: center;
            text-align: center; font-size: 1.1rem; color: #555;">

    <button id="prevBtn" class="nav-btn" style="position: absolute; left: 10px; background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #888;">❮</button>

    <p id="suggestionText" style="margin: 0; max-width: 90%; transition: opacity 0.5s;"></p>

    <button id="nextBtn" class="nav-btn" style="position: absolute; right: 10px; background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #888;">❯</button>
</div>

<!-- SCRIPT DE DÉFILEMENT DES SUGGESTIONS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const suggestions = @json($suggestions);

    if (!suggestions.length) {
        document.getElementById('suggestionText').textContent = "Aucune suggestion pour le moment.";
        return;
    }

    let currentIndex = 0;
    const suggestionEl = document.getElementById('suggestionText');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let interval;

    function showSuggestion(index) {
        suggestionEl.style.opacity = 0;
        setTimeout(() => {
            suggestionEl.textContent = suggestions[index];
            suggestionEl.style.opacity = 1;
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

    // Initialisation
    showSuggestion(currentIndex);
    startAutoScroll();

    // Navigation manuelle
    prevBtn.addEventListener('click', () => {
        stopAutoScroll();
        currentIndex = (currentIndex - 1 + suggestions.length) % suggestions.length;
        showSuggestion(currentIndex);
        startAutoScroll();
    });

    nextBtn.addEventListener('click', () => {
        stopAutoScroll();
        currentIndex = (currentIndex + 1) % suggestions.length;
        showSuggestion(currentIndex);
        startAutoScroll();
    });

    // Pause au survol
    document.getElementById('suggestionsContainer').addEventListener('mouseenter', stopAutoScroll);
    document.getElementById('suggestionsContainer').addEventListener('mouseleave', startAutoScroll);
});
</script>

        <footer class="footer">
          <div class="container-fluid d-flex justify-content-center">
            <div class="copyright text-center">
              © 2024 Copyright MFPRSP
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugin/chart.js/chart.min.js"></script>
    <script src="../assets/js/kaiadmin.min.js"></script>
<script>
    // Créer un graphique pour la répartition par complexité
    new Chart(document.getElementById('complexityChart'), {
        type: 'pie',
        data: {
            labels: @json($complexityLabels),
            datasets: [{
                label: 'Répartition par Complexité',
                data: @json($complexityData),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Données pour les graphiques
        const ageLabels = @json($ageLabels);
        const ageData = @json($ageData);
        const genderLabels = @json($genderLabels);
        const genderData = @json($genderData);
        const localityLabels = @json($localityLabels);
        const localityData = @json($localityData);
        // Créer un graphique pour la répartition par âge
        new Chart(document.getElementById('ageChart'), {
            type: 'bar',
            data: {
                labels: ageLabels,
                datasets: [{
                    label: 'Répartition par âge',
                    data: ageData,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        // Créer un graphique pour la répartition par sexe
        new Chart(document.getElementById('genderChart'), {
            type: 'pie',
            data: {
                labels: genderLabels,
                datasets: [{
                    label: 'Répartition par sexe',
                    data: genderData,
                    backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
        // Créer un graphique pour la répartition par localité
        new Chart(document.getElementById('localityChart'), {
            type: 'doughnut',
            data: {
                labels: localityLabels,
                datasets: [{
                    label: 'Répartition par localité',
                    data: localityData,
                    backgroundColor: ['rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)'],
                    borderColor: ['rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    });
</script>
  </body>
</html>
