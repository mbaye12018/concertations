<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Concertation Nationale - Diligence</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
    <link rel="icon" href="../assets/img/logg.png" type="image/x-icon"/>

    <!-- Font Awesome + Webfont -->
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
      /* GENERAL */
      body {
        font-family: 'Public Sans', sans-serif;
        background-color: #F4F7FC;
        color: #333;
      }
      .chart-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
      }
      .chart-header h4 {
        text-align: center;
        margin-bottom: 15px;
      }
      .chart-container canvas {
        width: 100%;
        height: auto;
      }
      /* Aspect ratio communes pour Chart.js */
      .chart-canvas {
        /* Laissez la place au script Chart.js pour aspectRatio */
      }

      /* BOUTON */
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

      /* Carrousel Suggestions */
      #suggestionsContainer {
        max-width: 600px;
        min-height: 250px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        margin-bottom: 30px;
        padding: 20px;
        overflow: hidden;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-size: 1.1rem;
        color: #555;
        margin-left:30%
      }
      #suggestionText {
        margin: 0;
        max-width: 90%;
        transition: opacity 0.5s;
      }
      .nav-btn {
        position: absolute;
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: #888;
      }
      #prevBtn { left: 10px; }
      #nextBtn { right: 10px; }
    </style>
</head>
<body>
<div class="wrapper">
  <!-- SIDEBAR -->
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
            <a href="#">
              <i class="fas fa-home"></i>
              <p>Accueil</p>
            </a>
          </li>
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

      <div class="page-inner">

        <div class="row">
          <div class="col-md-12">
            <div class="card card-round">
              <div class="card-header">
                <div class="card-head-row">
                  <div class="card-title">Statistiques - Diligence</div>
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
                    <h2 class="text-primary" style="color:black">
                      <i class="fas fa-clock" style="color: green;"></i>
                      Diligence
                    </h2>
                  </div>

                  <!-- BOUTON RETOUR OU AUTRE -->
                  <a href="{{ route('admin.dashboard') }}" class="btn-choose-theme mb-3">
                    <span class="btn-text">Choisir un autre thème</span>
                  </a>

                  <!-- ROW 1 : Procédures & Formalités -->
                  <div class="row">
                    <!-- Procédures -->
                    <div class="col-md-6">
                      <div class="chart-container">
                        <div class="chart-header">

                          <h4><i class="fas fa-tasks" style="color: green;"></i>Les procédures administratives sont-elles longues ?</h4>
                        </div>
                        <canvas id="proceduresChart" class="chart-canvas"></canvas>
                      </div>
                    </div>
                    <!-- Formalités -->
                    <div class="col-md-6">
                      <div class="chart-container">
                        <div class="chart-header">

                          <h4><i class="fas fa-file-alt" style="color: green;"></i>Les formalités administratives sont-elles complexes ?</h4>
                        </div>
                        <canvas id="formalitesChart" class="chart-canvas"></canvas>
                      </div>
                    </div>
                  </div>

                  <!-- ROW 2 : Âge / Sexe / Localité -->
                  <div class="row">
                    <!-- Tranche d'âge -->
                    <div class="col-md-4">
                      <div class="chart-container">
                        <div class="chart-header">

                          <h4><i class="fas fa-users" style="color: green;"></i>Tranche d'âge des participants</h4>
                        </div>
                        <canvas id="ageChart" class="chart-canvas"></canvas>
                      </div>
                    </div>
                    <!-- Sexe -->
                    <div class="col-md-4">
                      <div class="chart-container">
                        <div class="chart-header">

                          <h4><i class="fas fa-venus-mars" style="color: green;"></i>leur répartition par Sexe</h4>
                        </div>
                        <canvas id="genderChart" class="chart-canvas"></canvas>
                      </div>
                    </div>
                    <!-- Localité -->
                    <div class="col-md-4">
                      <div class="chart-container">
                        <div class="chart-header">

                          <h4><i class="fas fa-map-marked-alt" style="color: green;"></i>leur répartition par Localité</h4>
                        </div>
                        <canvas id="localityChart" class="chart-canvas"></canvas>
                      </div>
                    </div>
                  </div>

                  <!-- SECTION SUGGESTIONS -->
                  <h3 class="text-center mt-5">💡 Suggestions des Participants</h3>
                  <div id="suggestionsContainer">
                    <button id="prevBtn" class="nav-btn">❮</button>
                    <p id="suggestionText"></p>
                    <button id="nextBtn" class="nav-btn">❯</button>
                  </div>
                </div> <!-- end .container-fluid -->
              </div> <!-- end .card-body -->
            </div> <!-- end .card -->
          </div> <!-- end .col-md-12 -->
        </div> <!-- end .row -->
      </div> <!-- end .page-inner -->
    </div> <!-- end .container -->

    <!-- FOOTER -->
    <footer class="footer">
      <div class="container-fluid d-flex justify-content-center">
        <div class="copyright text-center">
          © 2025 Copyright MFPRSP/DSI/D2I
        </div>
      </div>
    </footer>
    <!-- END FOOTER -->
  </div> <!-- end .main-panel -->
</div> <!-- end .wrapper -->

<!-- SCRIPTS -->
<script src="../assets/js/core/jquery-3.7.1.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugin/chart.js/chart.min.js"></script>
<script src="../assets/js/kaiadmin.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // ⚙️ Options communes pour éviter le zoom
    const commonOptions = {
        responsive: true,
        maintainAspectRatio: true,
        aspectRatio: 2, // Ajustez si vous préférez un ratio différent
        plugins: {
            legend: {
                position: 'bottom'
            }
        },
        layout: {
            padding: 15
        }
    };

    // 1) Procédures
    new Chart(document.getElementById('proceduresChart'), {
        type: 'pie',
        data: {
            labels: @json($proceduresLabels),
            datasets: [{
                data: @json($proceduresData),
                backgroundColor: ['rgba(255, 99, 132, 0.7)', 'rgba(46, 204, 113, 0.7)']
            }]
        },
        options: {
            ...commonOptions
        }
    });

    // 2) Formalités
    new Chart(document.getElementById('formalitesChart'), {
        type: 'pie',
        data: {
            labels: @json($formalitesLabels),
            datasets: [{
                data: @json($formalitesData),
                backgroundColor: ['rgba(52, 152, 219, 0.7)', 'rgba(241, 196, 15, 0.7)']
            }]
        },
        options: {
            ...commonOptions
        }
    });

    // 3) Tranche d'âge
    new Chart(document.getElementById('ageChart'), {
        type: 'bar',
        data: {
            labels: @json($ageLabels),
            datasets: [{
                label: 'Répartition par Âge',
                data: @json($ageData),
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            ...commonOptions,

            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // 4) Sexe
    new Chart(document.getElementById('genderChart'), {
        type: 'pie',
        data: {
            labels: @json($genderLabels),
            datasets: [{
                data: @json($genderData),
                backgroundColor: ['rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)']
            }]
        },
        options: {
            ...commonOptions,
            layout: {
          padding: 0
          },
        }
    });

    // 5) Localité
    new Chart(document.getElementById('localityChart'), {
        type: 'pie',
        data: {
            labels: @json($localityLabels),
            datasets: [{
                data: @json($localityData),
                backgroundColor: ['rgba(52, 152, 219, 0.7)', 'rgba(230, 126, 34, 0.7)']
            }]
        },
        options: {
            ...commonOptions,
            layout: {
          padding: 0
          },
        }
    });

    // -- Carrousel Suggestions
    const suggestions = @json($suggestions);

    const suggestionText = document.getElementById('suggestionText');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let currentIndex = 0;
    let interval;

    if (!suggestions || suggestions.length === 0) {
        suggestionText.textContent = "Aucune suggestion pour le moment.";
        prevBtn.style.display = "none";
        nextBtn.style.display = "none";
    } else {
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
        const suggestionsContainer = document.getElementById('suggestionsContainer');
        suggestionsContainer.addEventListener('mouseenter', stopAutoScroll);
        suggestionsContainer.addEventListener('mouseleave', startAutoScroll);
    }
});
</script>
</body>
</html>
