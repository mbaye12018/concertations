<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Concertation Nationale</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="../assets/img/kaiadmin/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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
                <a href="{{ route('admin.dashboard') }}" class="collapsed" aria-expanded="false">
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
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
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
          </div>
        </div>

        <div class="container">
          <div class="page-inner">
            <div class="row mb-4">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body text-center">
                    <i class="fas fa-map-marker-alt fa-3x"></i>
                    <h5>Total Sénégal</h5>
                    <h3 id="total-senegal">{{ $totalSenegal }}</h3>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body text-center">
                    <i class="fas fa-globe-americas fa-3x"></i>
                    <h5>Total Diaspora</h5>
                    <h3 id="total-diaspora">{{ $totalDiaspora }}</h3>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group" style="display: flex; align-items: center;">
                <label for="location-select" style="margin-right: 10px;">Choisissez le lieu de :</label>
                <select id="location-select" class="form-select" onchange="updateChart()" style="margin-right: 10px;">
                  <option value="">-- Sélectionnez une option --</option>
                  <option value="Senegal">Sénégal</option>
                  <option value="Diaspora">Diaspora</option>
                </select>
              </div>

              <div class="chart-container" style="min-height: 375px;">
                <canvas id="statisticsChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      <footer class="footer">
        <div class="container-fluid d-flex justify-content-center">
          <div class="copyright text-center">
            © 2024 Copyright MFPRSP
          </div>
        </div>
      </footer>
    </div>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      const ctx = document.getElementById('statisticsChart').getContext('2d');
      let myChart;

      // Fonction pour afficher le graphique avec des statistiques par défaut
      function displayDefaultChart() {
        if (myChart) {
          myChart.destroy();
        }

        myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Sénégal', 'Diaspora'],
            datasets: [{
              label: 'Statistiques',
              data: [{{ $totalSenegal }}, {{ $totalDiaspora }}], // Valeurs par défaut
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      }

      // Fonction pour mettre à jour le graphique en fonction de la sélection
      function updateChart() {
        const locationSelect = document.getElementById('location-select');
        const location = locationSelect.value;

        if (location) {
          fetch(`{{ route('statistique.getStatistics') }}?location=${location}`)
            .then(response => response.json())
            .then(data => {
              const labels = data.labels;
              const chartData = data.chartData;

              if (myChart) {
                myChart.destroy();
              }

              myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: labels,
                  datasets: [{
                    label: 'Statistiques',
                    data: chartData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });
            })
            .catch(error => console.error('Error fetching data:', error));
        }
      }

      window.onload = function() {
        displayDefaultChart();
      };
    </script>
  </body>
</html>
