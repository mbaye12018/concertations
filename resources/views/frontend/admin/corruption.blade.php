<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Concertation nationale - Corruption</title>
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
        /* GENERAL */
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
            height: 400px;
        }
        .chart-header h4 {
            text-align: center;
            margin-bottom: 15px;
        }
        .chart-container canvas {
            width: 100% !important;
            height: 100% !important;
        }

        /* TABLEAU DE SYNTHÈSE */
        #corruptionTable thead th {
            background-color: #2e59d9;
            color: #fff;
        }
        #corruptionTable tbody tr:hover {
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
    <!-- (Optionnel) SIDEBAR / HEADER ICI -->
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

            <div class="page-inner pt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-round">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <div class="card-title">Statistiques : Corruption</div>
                                    <div class="card-tools">
                                        <!-- Boutons Export / Print si besoin -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                            <h2 class="text-center text-primary mb-4">
    <i class="fas fa-hand-holding-usd" style="color: red;"></i> Corruption
</h2>

<!-- Row 1 : Gravité (Bar) + Corruption existante (Doughnut) -->
<div class="row">
    <div class="col-md-6">
        <a href="{{ route('admin.dashboard') }}" class="btn-choose-theme">
            <span class="btn-text">Choisir un autre thème</span>
        </a>
        <div class="chart-container">
            <div class="chart-header">
                <h4><i class="fas fa-exclamation-triangle" style="color: red;"></i> Niveau de Gravité</h4>
            </div>
            <canvas id="graviteChart"></canvas>
        </div>
    </div>
    <div class="col-md-6">
        <div class="chart-container">
            <div class="chart-header">
                <h4><i class="fas fa-balance-scale-left" style="color: red;"></i> Pensez-vous que la corruption est une réalité dans les services publics de votre région ?</h4>
            </div>
            <canvas id="existChart"></canvas>
        </div>
    </div>
</div>

<!-- Row 2 : Sexe (Pie) + Âge (Bar) -->
<div class="row">
    <div class="col-md-6">
        <div class="chart-container">
            <div class="chart-header">
                <h4><i class="fas fa-venus-mars" style="color: red;"></i> Répartition par Sexe</h4>
            </div>
            <canvas id="genderChart"></canvas>
        </div>
    </div>
    <div class="col-md-6">
        <div class="chart-container">
            <div class="chart-header">
                <h4><i class="fas fa-user-clock" style="color: red;"></i> Tranche d'Âge</h4>
            </div>
            <canvas id="ageChart"></canvas>
        </div>
    </div>
</div>

<!-- Row 3 : Localité (Pie) -->
<div class="row">
    <div class="col-md-6">
        <div class="chart-container">
            <div class="chart-header">
                <h4><i class="fas fa-map-marker-alt" style="color: red;"></i> Répartition par Localité</h4>
            </div>
            <canvas id="localityChart"></canvas>
        </div>
    </div>
</div>

                                <!-- TABLEAU DE SYNTHÈSE : types de corruption
                                <h3 class="text-center mt-4">Synthèse par Type de Corruption</h3>
                                <div class="table-responsive">
                                    <table id="corruptionTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Type de Corruption</th>
                                                <th>Total</th>
                                                <th>Très grave</th>
                                                <th>Grave</th>
                                                <th>Moyennement grave</th>
                                                <th>Peu grave</th>
                                                <th>Pas grave</th>
                                                <th>Tranche d'âge majoritaire</th>
                                                <th>Nb Hommes</th>
                                                <th>Nb Femmes</th>
                                                <th>Depuis Sénégal</th>
                                                <th>Depuis Diaspora</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($detailedCorruption as $type => $infos)
                                            <tr>
                                                <td>{{ $type }}</td>
                                                <td>{{ $infos['count'] }}</td>
                                                <td>{{ $infos['evaluation']['tres_grave'] ?? 0 }}</td>
                                                <td>{{ $infos['evaluation']['grave'] ?? 0 }}</td>
                                                <td>{{ $infos['evaluation']['moyennement_grave'] ?? 0 }}</td>
                                                <td>{{ $infos['evaluation']['peu_grave'] ?? 0 }}</td>
                                                <td>{{ $infos['evaluation']['pas_grave'] ?? 0 }}</td>
                                                <td>{{ $infos['major_age_group'] ?? 'N/A' }}</td>
                                                <td>{{ $infos['gender']['Masculin'] ?? 0 }}</td>
                                                <td>{{ $infos['gender']['Féminin'] ?? 0 }}</td>
                                                <td>{{ $infos['locality']['Sénégal'] ?? 0 }}</td>
                                                <td>{{ $infos['locality']['Diaspora'] ?? 0 }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>-->
                                <!-- Fin tableau --><!-- SECTION SUGGESTIONS -->
<h3 class="text-center mt-5">🛡️ Suggestions pour Renforcer l'Intégrité</h3>
<div id="suggestionsContainer" class="mx-auto"
     style="max-width: 600px; min-height: 250px;
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const suggestions = @json($suggestions);

    if (!suggestions.length) {
        document.getElementById('suggestionText').textContent = "Aucune suggestion pour le moment.";
        return;
    }

    let currentIndex = 0;
    const suggestionEl = document.getElementById('suggestionText');

    function showSuggestion(index) {
        suggestionEl.style.opacity = 0;
        setTimeout(() => {
            suggestionEl.textContent = suggestions[index];
            suggestionEl.style.opacity = 1;
        }, 300);
    }

    setInterval(() => {
        currentIndex = (currentIndex + 1) % suggestions.length;
        showSuggestion(currentIndex);
    }, 5000);

    showSuggestion(currentIndex);
});
</script>
<footer class="footer">
            <div class="container-fluid d-flex justify-content-center">
                <div class="copyright text-center">
                    © 2025 MFPRSP/DSI/D2I
                </div>
            </div>
        </footer>

                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end page-inner -->
        </div> <!-- end container -->
    </div> <!-- end main-panel -->
</div> <!-- end wrapper -->

<!-- SECTION SUGGESTIONS -->


<!-- JS SCRIPTS -->
<script src="../assets/js/core/jquery-3.7.1.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugin/chart.js/chart.min.js"></script>
<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
<script src="../assets/js/kaiadmin.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // -- GRAVITÉ (Bar)
    new Chart(document.getElementById('graviteChart'), {
        type: 'bar',
        data: {
            labels: @json($evaluationLabels),
            datasets: [{
                label: 'Niveau de gravité',
                data: @json($evaluationData),
                backgroundColor: ['#28a745','#007bff','#ffc107','#dc3545','#6c757d']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
          padding: 20
          },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // -- CORRUPTION EXISTANTE (Doughnut)
    new Chart(document.getElementById('existChart'), {
        type: 'doughnut',
        data: {
            labels: @json($existLabels), // ex. ['Oui','Non']
            datasets: [{
                data: @json($existData),   // ex. [x, y]
                backgroundColor: ['#2ecc71','#e74c3c']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
          padding: 55
          },
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // -- SEXE (Pie)
    new Chart(document.getElementById('genderChart'), {
        type: 'pie',
        data: {
            labels: @json($genderLabels), // ['Masculin','Féminin']
            datasets: [{
                data: @json($genderData),
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

    // -- TRANCHE D'ÂGE (Bar)
    new Chart(document.getElementById('ageChart'), {
        type: 'bar',
        data: {
            labels: @json($ageLabels),
            datasets: [{
                label: 'Nombre de personnes',
                data: @json($ageData),
                backgroundColor: '#f39c12'
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

    // -- LOCALITÉ (Pie)
    new Chart(document.getElementById('localityChart'), {
        type: 'pie',
        data: {
            labels: @json($localityLabels),
            datasets: [{
                data: @json($localityData),
                backgroundColor: ['#27ae60','#e67e22']
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

    // -- TABLEAU
    $('#corruptionTable').DataTable({
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
