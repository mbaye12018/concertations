<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Concertation nationale</title>
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

    <!-- Bootstrap & Plugins CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/plugins.min.css" />
    <link rel="stylesheet" href="../assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <style>
        /* GLOBAL STYLES */
        body {
            background-color: #f4f7fc;
        }
        .container {
            padding: 20px;
        }
        .card-round {
            border-radius: 12px !important;
        }

        /* CHART CONTAINERS */
        .chart-container {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;

            /* On peut augmenter la hauteur si la légende est très longue */
            height: 420px;
        }
        .chart-header {
            margin-bottom: 15px;
        }
        .chart-header h4 {
            margin: 0;
            text-align: center;
        }

        /* Force the canvas to fill the chart-container */
        .chart-container canvas {
            width: 100% !important;
            height: 100% !important;
        }

        /* TABLE STYLES */
        #servicesTable {
            background: #fff;
        }
        #servicesTable thead th {
            background-color: #2e59d9;
            color: #fff;
        }
        #servicesTable tbody tr:hover {
            background-color: #f2f2f2;
        }

        /* DataTables minimal adjustments */
        .dataTables_length,
        .dataTables_filter {
            margin-bottom: 10px;
        }
        .dataTables_wrapper .dataTables_info {
            margin-top: 10px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .chart-container {
                height: 350px; /* Un peu moins haut sur mobile */
            }
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
                <div class="nav-toggle">
                    <!-- le logo des concertations dans le sidebar
                    <img src="assets/img/logg.PNG" alt="" style="height: 90px;margin-top:20px;margin-right:50px"> -->
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
                    </li>
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

        <div class="container">
            <div class="page-inner">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-round">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <div class="card-title">
                                        Statistiques relatifs à l'accès aux services publics
                                    </div>
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
                                    <!-- SECTION: ACCES AUX SERVICES PUBLICS -->
                                    <div id="themeSelection" class="hidden-section mt-5">
                                        <div class="text-center mb-4"></div>

                                        <div class="container">
                                            <h2 class="text-center text-primary mb-4">
                                                Accès aux Services Publics
                                            </h2>

                                            <div class="row">
                                                <!-- Services Chart -->
                                                <div class="col-md-8">
                                                    <div class="chart-container">
                                                        <div class="chart-header">
                                                            <h4>Services publics les plus utilisés</h4>
                                                        </div>
                                                        <canvas id="servicesChart"></canvas>
                                                    </div>
                                                </div>

                                                <!-- Accessibility Chart -->
                                                <div class="col-md-4">
                                                    <div class="chart-container" style="height: 420px;">
                                                        <div class="chart-header">
                                                            <h4>Accessibilité des Services</h4>
                                                        </div>
                                                        <canvas id="accessibilityChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <!-- Age Chart -->
                                                <div class="col-md-4">
                                                    <div class="chart-container">
                                                        <div class="chart-header">
                                                            <h4>Tranche d'âge</h4>
                                                        </div>
                                                        <canvas id="ageChart"></canvas>
                                                    </div>
                                                </div>

                                                <!-- Gender Chart -->
                                                <div class="col-md-4">
                                                    <div class="chart-container">
                                                        <div class="chart-header">
                                                            <h4>Répartition par Sexe</h4>
                                                        </div>
                                                        <canvas id="genderChart"></canvas>
                                                    </div>
                                                </div>

                                                <!-- Locality Chart -->
                                                <div class="col-md-4">
                                                    <div class="chart-container">
                                                        <div class="chart-header">
                                                            <h4>Répartition par Localité</h4>
                                                        </div>
                                                        <canvas id="localityChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end container -->

                                        <!-- TABLEAU DES SERVICES -->
                                        <h3 class="text-center mt-4">📋 Détail des Services</h3>
                                        <div class="table-responsive">
                                            <table id="servicesTable" class="table table-bordered table-striped">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Service</th>
                                                        <th>Nombre d'accès</th>
                                                        <th>Très Accessible</th>
                                                        <th>Accessible</th>
                                                        <th>Moyennement Accessible</th>
                                                        <th>Difficilement Accessible</th>
                                                        <th>Très Difficilement Accessible</th>
                                                        <th>Tranche d'âge majoritaire</th>
                                                        <th>Nombre d'hommes</th>
                                                        <th>Nombre de femmes</th>
                                                        <th>Nombre venant du Sénégal</th>
                                                        <th>Nombre venant de la Diaspora</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($detailedServices as $service => $details)
                                                    <tr>
                                                        <td>{{ $service }}</td>
                                                        <td>{{ $details['count'] }}</td>
                                                        <td>{{ $details['accessibility']['très accessible'] ?? 0 }}</td>
                                                        <td>{{ $details['accessibility']['accessible'] ?? 0 }}</td>
                                                        <td>{{ $details['accessibility']['moyennement accessible'] ?? 0 }}</td>
                                                        <td>{{ $details['accessibility']['difficilement accessible'] ?? 0 }}</td>
                                                        <td>{{ $details['accessibility']['très difficilement accessible'] ?? 0 }}</td>
                                                        <td>{{ $details['major_age_group'] ?? 'N/A' }}</td>
                                                        <td>{{ $details['gender']['Masculin'] ?? 0 }}</td>
                                                        <td>{{ $details['gender']['Féminin'] ?? 0 }}</td>
                                                        <td>{{ $details['locality']['Sénégal'] ?? 0 }}</td>
                                                        <td>{{ $details['locality']['Diaspora'] ?? 0 }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END TABLEAU -->
                                    </div> <!-- end #themeSelection -->
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
                    © 2024 Copyright MFPRSP/DSI/D2I
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
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="../assets/js/plugin/chart.js/chart.min.js"></script>
<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="../assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
<script src="../assets/js/plugin/jsvectormap/world.js"></script>
<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script src="../assets/js/kaiadmin.min.js"></script>
<script src="../assets/js/setting-demo.js"></script>
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // -- Services Chart (Bar)
        new Chart(document.getElementById("servicesChart"), {
            type: "bar",
            data: {
                labels: @json($servicesLabels),
                datasets: [{
                    label: "Nombre d’utilisations",
                    data: @json($servicesData),
                    backgroundColor: "rgba(255, 165, 0, 0.7)",
                    borderColor: "#FF9900",
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: 20
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });

        // -- Accessibility Chart (Doughnut)
        new Chart(document.getElementById("accessibilityChart"), {
            type: "doughnut",
            data: {
                labels: @json($accessibilityLabels),
                datasets: [{
                    data: @json($accessibilityData),
                    backgroundColor: [
                        "#2ecc71", // vert clair
                        "#27ae60", // vert foncé
                        "#f39c12", // orange
                        "#e74c3c", // rouge
                        "#c0392b"  // rouge foncé
                    ],
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: 20
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 12 // Réduire la police pour que tout tienne
                            },
                            boxWidth: 14, // Taille du carré de couleur
                            padding: 8   // Espacement entre légendes
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.raw || 0;
                                return label + ': ' + value + '%';
                            }
                        }
                    }
                }
            }
        });

        // -- Age Chart (Bar)
        new Chart(document.getElementById("ageChart"), {
            type: "bar",
            data: {
                labels: @json($ageLabels),
                datasets: [{
                    label: "Nombre de personnes",
                    data: @json($ageData),
                    backgroundColor: "#3498db"
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: 20
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });

        // -- Gender Chart (Pie)
        new Chart(document.getElementById("genderChart"), {
            type: "pie",
            data: {
                labels: @json($genderLabels),
                datasets: [{
                    data: @json($genderData),
                    backgroundColor: ["#3498db", "#e74c3c"]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: 20
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });

        // -- Locality Chart (Pie)
        new Chart(document.getElementById("localityChart"), {
            type: "pie",
            data: {
                labels: @json($localityLabels),
                datasets: [{
                    data: @json($localityData),
                    backgroundColor: ["#27ae60", "#e67e22"]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: 20
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });

        // -- DataTables Initialization (si besoin)
        $("#servicesTable").DataTable({
            pageLength: 15,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false
        });
    });
</script>
</body>
</html>


