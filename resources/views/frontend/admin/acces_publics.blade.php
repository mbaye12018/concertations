<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Concertation natioanle</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"/>
    <link
      rel="icon"
      href="../assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Fonts and icons -->
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
<style>
  /* General Styles for the grid */
.theme-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    padding: 20px;
    justify-items: center;
    background-color: #f4f7fc;
}

/* Theme card styling */
.theme-card {
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    max-width: 300px;
    width: 100%;
}

/* Add hover effects */
.theme-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

/* Theme icons */
.theme-icon {
    font-size: 3rem;
    color: #4e73df;
    transition: color 0.3s ease;
}

/* Change color on hover */
.theme-card:hover .theme-icon {
    color: #2e59d9;
}

/* Title Styling */
.theme-card h4 {
    font-size: 1.4rem;
    font-weight: bold;
    margin: 10px 0;
    color: #333;
}

/* Paragraph Styling */
.theme-card p {
    font-size: 1rem;
    color: #666;
    margin: 10px 0;
}

/* Responsive adjustments */
@media screen and (max-width: 768px) {
    .theme-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    }

    .theme-card {
        max-width: 260px;
    }
}
/* Style pour le champ select */
#themeSelect {
    width: 60%;
    padding: 10px;
    font-size: 1rem;
    margin-bottom: 20px;
    border-radius: 8px;
    border: 1px solid #ddd;
    background-color: #f8f9fa;
}

/* Style pour le graphique */
#themeChart {
    max-width: 80%;
    margin: 0 auto;
}

</style>
<style>
        /* Custom Styling */
        body {
            background-color: #f4f7fc;
        }

        .container {
            padding: 20px;
        }

        .chart-container {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        /* Adjust Chart Size */
        #servicesChart {
            height: 400px !important;
        }

        #accessibilityChart {
            height: 250px !important;
        }
    </style>
    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/plugins.min.css" />
    <link rel="stylesheet" href="../assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="../assets/css/demo.css" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">

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
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
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
          <!-- Navbar Header -->

          <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid">
            <span class="op-7">Bienvenue,</span>
            <span class="fw-bold">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</span>


              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">



                <div class="dropdown">
                  <button class="btn  dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user"></i>

                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li><button class="dropdown-item" type="button"><a href="{{ route('login') }}">Deconnexion</button></li>
                  </ul>
                </div>

              </ul>

          </nav>

          <!-- End Navbar -->
        </div>

        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row">
                      <div class="card-title">Statistique</div>
                      <div class="card-tools">
                        <a
                          href="#"
                          class="btn btn-label-success btn-round btn-sm me-2">
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

                 <div id="themeSelection" class="hidden-section mt-5">
            <div class="text-center mb-4">
            <!-- <h2 class="text-primary">Sur quelles thématiques souhaitez-vous donner votre avis ?</h2> -->

            </div>
<div class="container">
    <h2 class="text-center text-primary">Accès aux Services Publics</h2>

    <div class="row">
        <div class="col-md-8">
        <h4 class="text-center">les services publics les plus fréquemment utilisés</h4>
            <canvas id="servicesChart"></canvas>
        </div>
        <div class="col-md-4">
        <h4 class="text-center">l'Accessibilité à ses services</h4>
            <canvas id="accessibilityChart"></canvas>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-4">
            <h4 class="text-center">Tranche d'âge</h4>
            <canvas id="ageChart"></canvas>
        </div>
        <div class="col-md-4">
            <h4 class="text-center">Répartition par Sexe</h4>
            <canvas id="genderChart"></canvas>
        </div>
        <div class="col-md-4">
            <h4 class="text-center">Répartition par Localité</h4>
            <canvas id="localityChart"></canvas>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        new Chart(document.getElementById("servicesChart"), {
            type: "bar",
            data: {
                labels: @json($servicesLabels),
                datasets: [{ data: @json($servicesData), backgroundColor: "orange" }]
            }
        });

        new Chart(document.getElementById("accessibilityChart"), {
            type: "pie",
            data: {
                labels: @json($accessibilityLabels),
                datasets: [{
                    data: @json($accessibilityData),
                    backgroundColor: ["#2ecc71", "#27ae60", "#f39c12", "#e74c3c", "#c0392b"]
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.raw + '%';
                            }
                        }
                    }
                }
            }
        });


        new Chart(document.getElementById("ageChart"), {
            type: "bar",
            data: {
                labels: @json($ageLabels),
                datasets: [{ data: @json($ageData), backgroundColor: "#3498db" }]
            }
        });

        new Chart(document.getElementById("genderChart"), {
            type: "pie",
            data: {
                labels: @json($genderLabels),
                datasets: [{ data: @json($genderData), backgroundColor: ["#3498db", "#e74c3c"] }]
            }
        });

        new Chart(document.getElementById("localityChart"), {
            type: "pie",
            data: {
                labels: @json($localityLabels),
                datasets: [{ data: @json($localityData), backgroundColor: ["#27ae60", "#e67e22"] }]
            }
        });
    });
</script>

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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">

                    <footer class="footer">
              <div class="container-fluid d-flex justify-content-center">
                  <div class="copyright text-center">
                      © 2024 Copyright MFPRSP
                  </div>
              </div>
          </footer>


          </div>
        </footer>
      </div>
    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



  </body>
</html>
