<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Concertation natioanle</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="../assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   
    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    

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
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
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
        
        
             
          <!-- End Navbar -->
        </div>

        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
             
            </div>
            <div class="row">
  <div class="col-md-12">
    <div class="form-group" style="display: flex; align-items: center;">
      <label for="location-select" style="margin-right: 10px;">Choisissez votre emplacement :</label>
      <select id="location-select" class="form-select" onchange="showAdditionalSelects()" style="margin-right: 10px;">
        <option value="">-- Sélectionnez une option --</option>
        <option value="senegal">Sénégal</option>
        <option value="diaspora">Diaspora</option>
      </select>

      <!-- Sélection des régions du Sénégal -->
      <div id="senegal-selects" style="display: none; margin-right: 10px;">
        <select id="region-select" class="form-select" onchange="showDepartments()" style="margin-right: 10px;">
          <option value="">-- Sélectionnez une région --</option>
          <option value="dakar">Dakar</option>
          <option value="thies">Thiès</option>
          <option value="saint-louis">Saint-Louis</option>
        </select>

        <!-- Sélection des départements pour la région sélectionnée -->
        <div id="department-selects" style="display: none;">
          <select id="department-select" class="form-select" onchange="updateChart()">
            <option value="">-- Sélectionnez un département --</option>
            <option value="dakar">Dakar</option>
            <option value="pikine">Pikine</option>
            <option value="guediawaye">Guédiawaye</option>
          </select>
        </div>
      </div>

      <!-- Sélection des pays pour la Diaspora -->
      <div id="diaspora-select" style="display: none; margin-right: 10px;">
        <select id="country-select" class="form-select" onchange="updateChart()">
          <option value="">-- Sélectionnez un pays --</option>
          <option value="france">France</option>
          <option value="usa">États-Unis</option>
          <option value="italie">Italie</option>
        </select>
      </div>
    </div>

    <!-- Conteneur pour le graphique -->
    <div class="chart-container" style="min-height: 375px;">
      <canvas id="statisticsChart"></canvas>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


           
          </div>
        </div>

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

      <!-- Custom template | don't include it in your project! -->
     
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('statisticsChart').getContext('2d');
  let myChart;

  // Statistiques par défaut
  const defaultLabels = ['Sénégal', 'Diaspora'];
  const defaultData = [1453, 521]; // Valeurs par défaut

  // Fonction pour afficher le graphique avec des statistiques par défaut
  function displayDefaultChart() {
    if (myChart) {
      myChart.destroy();
    }

    myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: defaultLabels,
        datasets: [{
          label: 'Statistiques',
          data: defaultData,
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

  // Afficher les statistiques par défaut au chargement de la page
  window.onload = function() {
    displayDefaultChart();
  };

  function updateChart() {
    const locationSelect = document.getElementById('location-select');
    const regionSelect = document.getElementById('region-select');
    const departmentSelect = document.getElementById('department-select');
    const countrySelect = document.getElementById('country-select');

    let labels = [];
    let data = [];

    // Mise à jour des données et des labels en fonction de la sélection
    if (locationSelect.value === 'senegal') {
      if (regionSelect.value) {
        labels = ['Dakar', 'Thiès', 'Saint-Louis'];
        data = [10, 20, 30]; // Remplacez par les données réelles
      }
      if (departmentSelect.value) {
        labels = ['Dakar', 'Pikine', 'Guédiawaye'];
        data = [5, 15, 25]; // Remplacez par les données réelles
      }
    } else if (locationSelect.value === 'diaspora') {
      if (countrySelect.value) {
        labels = ['France', 'États-Unis', 'Italie'];
        data = [12, 22, 32]; // Remplacez par les données réelles
      }
    }

    // Effacer le graphique précédent si nécessaire
    if (myChart) {
      myChart.destroy();
    }

    // Créer le nouveau graphique uniquement si des labels sont disponibles
    if (labels.length > 0 && data.length > 0) {
      myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: 'Statistiques',
            data: data,
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
  }

  function showAdditionalSelects() {
    const locationSelect = document.getElementById('location-select');
    const senegalSelects = document.getElementById('senegal-selects');
    const diasporaSelect = document.getElementById('diaspora-select');
    const departmentSelects = document.getElementById('department-selects');

    // Masquer tous les sélecteurs supplémentaires
    senegalSelects.style.display = 'none';
    diasporaSelect.style.display = 'none';
    departmentSelects.style.display = 'none';

    if (locationSelect.value === 'senegal') {
      senegalSelects.style.display = 'block';
      displayDefaultChart(); // Afficher les statistiques par défaut
    } else if (locationSelect.value === 'diaspora') {
      diasporaSelect.style.display = 'block';
      displayDefaultChart(); // Afficher les statistiques par défaut
    }

    // Mise à jour du graphique après changement de sélection
    updateChart();
  }

  function showDepartments() {
    const regionSelect = document.getElementById('region-select');
    const departmentSelects = document.getElementById('department-selects');

    // Afficher ou masquer les départements selon la région choisie
    if (regionSelect.value) {
      departmentSelects.style.display = 'block';
    } else {
      departmentSelects.style.display = 'none';
    }

    // Mise à jour du graphique après changement de sélection
    updateChart();
  }
</script>
    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="../assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="../assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="../assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="../assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="../assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="../assets/js/setting-demo.js"></script>
    <script src="../assets/js/demo.js"></script>
    
  </body>
</html>
