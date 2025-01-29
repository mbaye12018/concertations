<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Accueil & Orientation</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
    <link rel="icon" href="../assets/img/kaiadmin/favicon.ico" type="image/x-icon"/>

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
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            height: 400px; /* Hauteur fixée pour tous les graphiques */
        }
        .chart-header h4 {
            text-align: center;
            margin-bottom: 15px;
        }
        .chart-container canvas {
            width: 100% !important;
            height: 100% !important;
        }
        #orientationTable thead th {
            background-color: #2e59d9;
            color: #fff;
        }
        /* Ajustement de la table en hover */
        #orientationTable tbody tr:hover {
            background-color: #f2f2f2;
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
    <!-- SIDEBAR -->
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
    <!-- END SIDEBAR -->

    <div class="main-panel">
        <div class="main-header">
            <div class="main-header-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo">
                        <img src="assets/img/kaiadmin/logo_light.svg"
                             alt="navbar brand" class="navbar-brand"
                             height="20"/>
                    </a>
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

            <!-- NAVBAR HEADER -->
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
            <!-- END NAVBAR HEADER -->
        </div>

        <!-- CONTENU PRINCIPAL -->
        <div class="container">

            <div class="page-inner pt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-round">
                            <div class="card-header">

                                <div class="card-head-row">

                                    <div class="card-title">Statistiques : Accueil & Orientation</div>
                                    <div class="card-tools">
                                        <!-- Vos éventuels boutons Export / Print -->


                                    </div>

                                </div>
                                <a href="{{ route('admin.dashboard') }}" class="btn-choose-theme">
                        <span class="btn-text">Choisir un autre thème</span>
                      </a>
                            </div>
                            <div class="card-body">
                                <h2 class="text-center text-primary mb-4">Accueil & Orientation</h2>

                                <!-- Première ligne de graphiques : Évaluation + Signalétique -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="chart-container">
                                            <div class="chart-header">
                                                <h4>Évaluation de l'Accueil</h4>
                                            </div>
                                            <canvas id="evaluationChart"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="chart-container">
                                            <div class="chart-header">
                                                <h4>Signalétique Claire</h4>
                                            </div>
                                            <canvas id="signaletiqueChart"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <!-- Deuxième ligne de graphiques : Orientation + Sexe -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="chart-container">
                                            <div class="chart-header">
                                                <h4>Bonne Orientation</h4>
                                            </div>
                                            <canvas id="orientationChart"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="chart-container">
                                            <div class="chart-header">
                                                <h4>Répartition par Sexe</h4>
                                            </div>
                                            <canvas id="genderChart"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <!-- Troisième ligne de graphiques : Tranche d'âge + Localité -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="chart-container">
                                            <div class="chart-header">
                                                <h4>Tranche d'âge</h4>
                                            </div>
                                            <canvas id="ageChart"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="chart-container">
                                            <div class="chart-header">
                                                <h4>Répartition par Localité</h4>
                                            </div>
                                            <canvas id="localityChart"></canvas>
                                        </div>
                                    </div>

                                </div>

                                <h3 class="text-center mt-4">📊 Synthèse de l'Accueil et de l'Orientation</h3>
<div class="table-responsive">
    <table id="summaryTable" class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>Critère</th>
                <th>Excellent</th>
                <th>Bon</th>
                <th>Moyen</th>
                <th>Mauvais</th>
                <th>Très Mauvais</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><b>Nombre de personnes</b></td>
                <td>{{ $evaluationData[0] }}</td>
                <td>{{ $evaluationData[1] }}</td>
                <td>{{ $evaluationData[2] }}</td>
                <td>{{ $evaluationData[3] }}</td>
                <td>{{ $evaluationData[4] }}</td>
            </tr>
            <tr>
                <td><b>Signalétique Claire</b></td>
                <td>{{ $signaletiqueData[0] }}</td>
                <td>{{ $signaletiqueData[0] }}</td>
                <td>{{ $signaletiqueData[0] }}</td>
                <td>{{ $signaletiqueData[0] }}</td>
                <td>{{ $signaletiqueData[0] }}</td>
            </tr>
            <tr>
                <td><b>Signalétique Non Claire</b></td>
                <td>{{ $signaletiqueData[1] }}</td>
                <td>{{ $signaletiqueData[1] }}</td>
                <td>{{ $signaletiqueData[1] }}</td>
                <td>{{ $signaletiqueData[1] }}</td>
                <td>{{ $signaletiqueData[1] }}</td>
            </tr>
            <tr>
                <td><b>Bonne Orientation</b></td>
                <td>{{ $orientationData[0] }}</td>
                <td>{{ $orientationData[0] }}</td>
                <td>{{ $orientationData[0] }}</td>
                <td>{{ $orientationData[0] }}</td>
                <td>{{ $orientationData[0] }}</td>
            </tr>
            <tr>
                <td><b>Mauvaise Orientation</b></td>
                <td>{{ $orientationData[1] }}</td>
                <td>{{ $orientationData[1] }}</td>
                <td>{{ $orientationData[1] }}</td>
                <td>{{ $orientationData[1] }}</td>
                <td>{{ $orientationData[1] }}</td>
            </tr>
            <tr>
                <td><b>Tranche d'âge majoritaire</b></td>
                <td>{{ count($ageData) ? $ageLabels[array_search(max($ageData), $ageData)] : 'N/A' }}</td>
                <td>{{ count($ageData) ? $ageLabels[array_search(max($ageData), $ageData)] : 'N/A' }}</td>
                <td>{{ count($ageData) ? $ageLabels[array_search(max($ageData), $ageData)] : 'N/A' }}</td>
                <td>{{ count($ageData) ? $ageLabels[array_search(max($ageData), $ageData)] : 'N/A' }}</td>
                <td>{{ count($ageData) ? $ageLabels[array_search(max($ageData), $ageData)] : 'N/A' }}</td>
            </tr>
            <tr>
                <td><b>Nombre d'hommes</b></td>
                <td>{{ $genderData[0] }}</td>
                <td>{{ $genderData[0] }}</td>
                <td>{{ $genderData[0] }}</td>
                <td>{{ $genderData[0] }}</td>
                <td>{{ $genderData[0] }}</td>
            </tr>
            <tr>
                <td><b>Nombre de femmes</b></td>
                <td>{{ $genderData[1] }}</td>
                <td>{{ $genderData[1] }}</td>
                <td>{{ $genderData[1] }}</td>
                <td>{{ $genderData[1] }}</td>
                <td>{{ $genderData[1] }}</td>
            </tr>
            <tr>
                <td><b>Nombre venant du Sénégal</b></td>
                <td>{{ $localityData[0] }}</td>
                <td>{{ $localityData[0] }}</td>
                <td>{{ $localityData[0] }}</td>
                <td>{{ $localityData[0] }}</td>
                <td>{{ $localityData[0] }}</td>
            </tr>
            <tr>
                <td><b>Nombre venant de la Diaspora</b></td>
                <td>{{ $localityData[1] }}</td>
                <td>{{ $localityData[1] }}</td>
                <td>{{ $localityData[1] }}</td>
                <td>{{ $localityData[1] }}</td>
                <td>{{ $localityData[1] }}</td>
            </tr>
        </tbody>
    </table>
</div><!-- SECTION SUGGESTIONS -->
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


                                <!-- FIN TABLEAU -->

                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end page-inner -->
        </div> <!-- end container -->
        <!-- FOOTER -->
        <footer class="footer">
            <div class="container-fluid d-flex justify-content-center">
                <div class="copyright text-center">
                    © 2024 Copyright MFPRSP
                </div>
            </div>
        </footer>
        <!-- END FOOTER -->
    </div> <!-- end main-panel -->
</div> <!-- end wrapper -->

<!-- SCRIPTS -->
<script src="../assets/js/core/jquery-3.7.1.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugin/chart.js/chart.min.js"></script>
<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
<script src="../assets/js/kaiadmin.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // EVALUATION (BAR)
    new Chart(document.getElementById('evaluationChart'), {
        type: 'bar',
        data: {
            labels: @json($evaluationLabels),
            datasets: [{
                label: "Évaluations",
                data: @json($evaluationData),
                backgroundColor: ['#28a745','#007bff','#ffc107','#dc3545','#6c757d']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
          padding: 30
          },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // SIGNALETIQUE (DOUGHNUT)
    new Chart(document.getElementById('signaletiqueChart'), {
        type: 'doughnut',
        data: {
            labels: @json($signaletiqueLabels), // ['Oui','Non']
            datasets: [{
                data: @json($signaletiqueData),   // [countOui, countNon]
                backgroundColor: ['#2ecc71','#e74c3c']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
          padding: 30
          },
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // ORIENTATION (DOUGHNUT)
    new Chart(document.getElementById('orientationChart'), {
        type: 'doughnut',
        data: {
            labels: @json($orientationLabels), // ['Oui','Non']
            datasets: [{
                data: @json($orientationData),   // [countOui, countNon]
                backgroundColor: ['#3498db','#c0392b']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
          padding: 30
          },
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // SEXE (PIE)
    new Chart(document.getElementById('genderChart'), {
        type: 'pie',
        data: {
            labels: @json($genderLabels), // ex. ['Masculin','Féminin']
            datasets: [{
                data: @json($genderData),   // ex. [12, 18]
                backgroundColor: ['#3498db','#e74c3c']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
          padding: 30
          },
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // TRANCHE D'ÂGE (BAR)
    new Chart(document.getElementById('ageChart'), {
        type: 'bar',
        data: {
            labels: @json($ageLabels), // ex. ["18-25","26-35","36-45", etc.]
            datasets: [{
                label: "Nombre de personnes",
                data: @json($ageData),
                backgroundColor: "#f39c12"
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
          padding: 30
          },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // LOCALITÉ (PIE)
    new Chart(document.getElementById('localityChart'), {
        type: 'pie',
        data: {
            labels: @json($localityLabels), // ["Sénégal","Diaspora"]
            datasets: [{
                data: @json($localityData), // [countSenegal, countDiaspora]
                backgroundColor: ["#27ae60","#e67e22"]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
          padding: 30
          },
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // TABLEAU (DataTables)
    $('#orientationTable').DataTable({
        pageLength: 10,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true
    });
});
</script>
</body>
</html>

