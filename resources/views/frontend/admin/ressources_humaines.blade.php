<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Ressources Humaines - Statistiques</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
    <link rel="icon" href="../assets/img/kaiadmin/favicon.ico" type="image/x-icon"/>

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

        }
        .chart-header h4 {
            text-align: center;
            margin-bottom: 15px;
        }


        /* Carrousel "pourquoi_relations" */
        #relationsContainer {
            max-width: 600px;
            min-height: 150px;
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
        }
        #relationText {
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
    <!-- SIDEBAR (optionnel) -->
    <div class="sidebar" data-background-color="dark">
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <!-- Menu ou autres éléments -->
                <ul class="nav nav-secondary">
                    <li class="nav-item active">
                        <a href="#">
                            <i class="fas fa-home"></i>
                            <p>Accueil</p>
                        </a>
                    </li>
                    <!-- Autres liens du menu -->
                </ul>
            </div>
        </div>
    </div>
    <!-- END SIDEBAR -->

    <!-- NAVBAR HEADER (optionnel) -->
    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
        <div class="container-fluid">
            <span class="op-7">Bienvenue,</span>
            <span class="fw-bold">{{ Auth::user()->prenom ?? '' }} {{ Auth::user()->nom ?? '' }}</span>
            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <!-- Bouton user -->
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenu2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li>
                            <button class="dropdown-item" type="button">
                                <a href="{{ route('login') }}">Déconnexion</a>
                            </button>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
    </nav>
    <!-- END NAVBAR HEADER -->

    <div class="main-panel">
        <div class="container">
            <div class="page-inner pt-3">
                <h2 class="text-center text-primary mb-4">Ressources Humaines</h2>

                <!-- ROW 1 : Avis sur les Relations / Information Claire -->
                <div class="row">
                    <!-- Avis sur les Relations -->
                    <div class="col-md-6">
                        <div class="chart-container">
                            <div class="chart-header">
                                <h4>Avis sur les Relations Agents/Usagers</h4>
                            </div>
                            <canvas id="avisRelationsChart"></canvas>
                        </div>
                    </div>
                    <!-- Information Claire -->
                    <div class="col-md-6">
                        <div class="chart-container">
                            <div class="chart-header">
                                <h4>Clarté de l'Information</h4>
                            </div>
                            <canvas id="infoClaireChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- ROW 2 : Esprit Collaboratif / Compétence Agents -->
                <div class="row">
                    <!-- Esprit Collaboratif -->
                    <div class="col-md-6">
                        <div class="chart-container">
                            <div class="chart-header">
                                <h4>Esprit Collaboratif</h4>
                            </div>
                            <canvas id="espritCollaboratifChart"></canvas>
                        </div>
                    </div>
                    <!-- Compétence des Agents -->
                    <div class="col-md-6">
                        <div class="chart-container">
                            <div class="chart-header">
                                <h4>Compétence des Agents</h4>
                            </div>
                            <canvas id="competenceAgentsChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- ROW 3 : Tranche d'Âge / Sexe + Localité -->
                <div class="row">
                    <!-- Tranche d'âge -->
                    <div class="col-md-6">
                        <div class="chart-container">
                            <div class="chart-header">
                                <h4>Tranche d'Âge</h4>
                            </div>
                            <canvas id="ageChart"></canvas>
                        </div>
                    </div>
                    <!-- Sexe et Localité (2 mini-charts côte à côte) -->
                    <div class="col-md-6">
                        <div class="chart-container" style="height: 200px;">
                            <div class="chart-header">
                                <h4>Répartition par Sexe</h4>
                            </div>
                            <canvas id="genderChart"></canvas>
                        </div>

                        <div class="chart-container" style="height: 200px;">
                            <div class="chart-header">
                                <h4>Répartition par Localité</h4>
                            </div>
                            <canvas id="localityChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- SECTION COMMENTAIRES SUR LES RELATIONS AGENTS / USAGERS -->
                <h3 class="text-center mt-5">🗣️ Avis des Utilisateurs sur les Relations Agents/Usagers</h3>
                <div id="relationsContainer">
                    <button id="prevBtn" class="nav-btn">❮</button>
                    <p id="relationText"></p>
                    <button id="nextBtn" class="nav-btn">❯</button>
                </div>

            </div> <!-- end page-inner -->
        </div> <!-- end container -->

        <!-- FOOTER -->
        <footer class="footer mt-4">
            <div class="container-fluid d-flex justify-content-center">
                <div class="copyright text-center">
                    © 2024 Copyright MFPRSP
                </div>
            </div>
        </footer>
        <!-- END FOOTER -->
    </div> <!-- end main-panel -->
</div> <!-- end wrapper -->

<!-- jQuery + Bootstrap + Chart.js -->
<script src="../assets/js/core/jquery-3.7.1.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugin/chart.js/chart.min.js"></script>
<script src="../assets/js/kaiadmin.min.js"></script>

<!-- Graphiques -->
<script>
document.addEventListener('DOMContentLoaded', function() {

    // 1) Avis sur les Relations
    new Chart(document.getElementById('avisRelationsChart'), {
        type: 'bar',
        data: {
            labels: @json($avisRelationsLabels),
            datasets: [{
                label: "Avis sur les Relations",
                data: @json($avisRelationsData),
                backgroundColor: "#2ecc71"
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

    // 2) Clarté de l'Information
    new Chart(document.getElementById('infoClaireChart'), {
        type: 'pie',
        data: {
            labels: @json($infoClaireLabels),
            datasets: [{
                data: @json($infoClaireData),
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

    // 3) Esprit Collaboratif
    new Chart(document.getElementById('espritCollaboratifChart'), {
        type: 'pie',
        data: {
            labels: @json($espritCollaboratifLabels),
            datasets: [{
                data: @json($espritCollaboratifData),
                backgroundColor: ["#9b59b6","#1abc9c"]
            }]
        },
        options: {
            responsive: true,
            layout: {
          padding: 30
          },
        }
    });

    // 4) Compétence des Agents
    new Chart(document.getElementById('competenceAgentsChart'), {
        type: 'pie',
        data: {
            labels: @json($competenceAgentsLabels),
            datasets: [{
                data: @json($competenceAgentsData),
                backgroundColor: ["#f39c12","#7f8c8d"]
            }]
        },
        options: {
            responsive: true,
            layout: {
          padding: 30
          },
        }
    });

    // 5) Tranche d'Âge
    new Chart(document.getElementById('ageChart'), {
        type: 'bar',
        data: {
            labels: @json($ageLabels),
            datasets: [{
                label: "Âge",
                data: @json($ageData),
                backgroundColor: "#ffc107"
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

    // 6) Répartition par Sexe
    new Chart(document.getElementById('genderChart'), {
        type: 'pie',
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

    // 7) Répartition par Localité
    new Chart(document.getElementById('localityChart'), {
        type: 'pie',
        data: {
            labels: @json($localityLabels),
            datasets: [{
                data: @json($localityData),
                backgroundColor: ["#2ecc71","#d35400"]
            }]
        },
        options: {
            responsive: true,
            layout: {
          padding: 30
          },
        }
    });

    // --- Carrousel "pourquoi_relations" ---
    const relations = @json($pourquoiRelations);

    const relationText = document.getElementById('relationText');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const relationsContainer = document.getElementById('relationsContainer');
    let currentIndex = 0;
    let interval;

    if(!relations || relations.length === 0) {
        relationText.textContent = "Aucun retour pour le moment.";
        prevBtn.style.display = "none";
        nextBtn.style.display = "none";
    } else {
        function showRelation(index) {
            relationText.style.opacity = 0;
            setTimeout(() => {
                relationText.textContent = relations[index];
                relationText.style.opacity = 1;
            }, 300);
        }
        function startAutoScroll() {
            interval = setInterval(() => {
                currentIndex = (currentIndex + 1) % relations.length;
                showRelation(currentIndex);
            }, 5000);
        }
        function stopAutoScroll() {
            clearInterval(interval);
        }

        showRelation(currentIndex);
        startAutoScroll();

        // Navigation manuelle
        prevBtn.addEventListener('click', () => {
            stopAutoScroll();
            currentIndex = (currentIndex - 1 + relations.length) % relations.length;
            showRelation(currentIndex);
            startAutoScroll();
        });
        nextBtn.addEventListener('click', () => {
            stopAutoScroll();
            currentIndex = (currentIndex + 1) % relations.length;
            showRelation(currentIndex);
            startAutoScroll();
        });

        // Pause au survol
        relationsContainer.addEventListener('mouseenter', stopAutoScroll);
        relationsContainer.addEventListener('mouseleave', startAutoScroll);
    }
});
</script>
</body>
</html>
