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
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
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
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Avis recueillis</p>
                          <h4 class="card-title">1974</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                        <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Sénégal</p>
                          <h4 class="card-title">1453</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                        <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Diaspora</p>
                          <h4 class="card-title">521</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
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
                    
              <div id="senegal-options">
                <select id="localisation-select" >
                    <option value="localisation">--- localisation --</option>
                    <option value="SENEGAL">SENEGAL</option>
                    <option value="DIASPORA">DIASPORA</option>
                </select>

                <!-- Sélecteurs pour Sénégal -->
                
                    <select id="region-select">
                        <option value="">--- Sélectionner une région ---</option>
                        <!-- Les options de région seront ajoutées ici -->
                    </select>

                    <select id="departement-select">
                        <option value="">--- Sélectionner un département ---</option>
                    </select>
                    
                </div>
                <div id="departement-chart-container" style="display: none;">
                            <h3>departementChart departementChart</h3>
                            <canvas id="departementChart"></canvas>
                          </div>

                <!-- Sélecteur pour la diaspora -->
                <div id="diaspora-options" style="display: none;">
                    <select id="pays-select">
                        <option value="">--- Sélectionner un pays ---</option>
                        <!-- Les options de pays seront ajoutées ici -->
                    </select>
                </div>
                <div id="departement-chart-container" style="display: none;">
    <canvas id="departementChart"></canvas>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Variables pour les graphiques
    let regionChart;
    let departementChart;

    // Fonction pour initialiser le graphique des régions
    function initRegionChart() {
        const ctx = document.getElementById('regionChart').getContext('2d');
        regionChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Nombre de rapports par région',
                    data: [],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
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

    // Fonction pour initialiser le graphique des départements
    function initDepartementChart() {
        const ctx = document.getElementById('departementChart').getContext('2d');
        departementChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Occurrences par département',
                    data: [],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
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

    // Fetch regions as soon as the page loads
    fetch('/regions')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const regionSelect = document.getElementById('region-select');
            regionSelect.innerHTML = '<option value="REGION">Choisir une région</option>'; // Reset options

            data.forEach(region => {
                const option = document.createElement('option');
                option.value = region.id;
                option.textContent = region.nom;
                regionSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Erreur lors de la récupération des régions:', error);
        });

    // Initialize charts
    initRegionChart();
    initDepartementChart();

    // Handle localisation change
    document.getElementById('localisation-select').addEventListener('change', function() {
        const localisationValue = this.value;
        const senegalOptions = document.getElementById('senegal-options');
        const diasporaOptions = document.getElementById('diaspora-options');
        const regionChartContainer = document.getElementById('region-chart-container'); 
        const myChartContainer = document.getElementById('myChart');
        const departementChartContainer = document.getElementById('departement-chart-container');

        // Reset visibility
        regionChartContainer.style.display = 'none';
        departementChartContainer.style.display = 'none';
        myChartContainer.style.display = 'none';

        if (localisationValue === 'SENEGAL') {
            senegalOptions.style.display = 'block';
            diasporaOptions.style.display = 'none';
            regionChartContainer.style.display = 'block';

            // Fetch region stats
            fetch('/stats/regions')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const regionNames = data.map(region => region.nom);
                    const regionCounts = data.map(region => region.total);
                    updateRegionChart(regionNames, regionCounts);
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des stats des régions:', error);
                });
        } else if (localisationValue === 'DIASPORA') {
            senegalOptions.style.display = 'none';
            diasporaOptions.style.display = 'block';
            myChartContainer.style.display = 'block';
        }
    });

    // Handle region change
    document.getElementById('region-select').addEventListener('change', function() {
        const regionId = this.value;
        const departementChartContainer = document.getElementById('departement-chart-container');

        // Show departments only if "SENEGAL" is selected and a region is chosen
        const localisationValue = document.getElementById('localisation-select').value;
        if (localisationValue === 'SENEGAL' && regionId && regionId !== 'REGION') {
            fetch(`/departements/${regionId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const departementNames = data.map(departement => departement.nom);
                    const departementCounts = data.map(departement => departement.nombre_occurrences);
                    updateDepartementChart(departementNames, departementCounts);
                    departementChartContainer.style.display = 'block'; // Show department chart
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des départements:', error);
                });
        } else {
            departementChartContainer.style.display = 'none'; // Hide if no region is selected
        }
    });

    // Function to update region chart
    function updateRegionChart(labels, data) {
        const ctx = document.getElementById('regionChart').getContext('2d');

        if (regionChart) {
            regionChart.destroy();
        }

        regionChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre de rapports par région',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
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

    // Function to update department chart
    function updateDepartementChart(labels, data) {
        const ctx = document.getElementById('departementChart').getContext('2d');

        if (departementChart) {
            departementChart.destroy();
        }

        departementChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Occurrences par département',
                    data: data,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
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
});
</script>



                          <div>
                            <canvas id="myChart"></canvas>
                          </div>
                          <div id="region-chart-container" style="display: none;">
                            <canvas id="regionChart"></canvas>
                          </div>

                           

                        </body>
                        </html>
                          
                      </table>
                    </div>
                    <div id="myChartLegend"></div>
                  </div>
                </div>
              </div>
             
            </div>
           
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

      <!-- representation graphique des avis du SENEGAL ET DE LA DISAPORA -->
      <script>
    const ctt = document.getElementById('myChart').getContext('2d');

    const label_total = @json($labels); 
    const data_total = @json($data);     

    new Chart(ctt, {
        type: 'pie',
        data: {
            labels: label_total,
            datasets: [{
                label: '# d\'Avis',
                data: data_total,
                borderWidth: 1,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)', 
                    'rgba(153, 102, 255, 0.2)' 
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)', 
                    'rgba(153, 102, 255, 1)' 
                ]
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    min: 0,  // Ensure Y-axis starts at 0
                    ticks: {
                        stepSize: 0.5 
                    },
                    title: {
                        display: true,
                        text: '# d\'Avis'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Localisation'
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
</script>


          <!-- representaton graphique par region -->
<script>
                      const ctx = document.getElementById('regionChart').getContext('2d');
                      const regionCounts = @json($regionCounts);

                      const labels = regionCounts.map(item => item.region_id);
                      const data = regionCounts.map(item => item.total);

                      const chart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                              labels: labels,
                              datasets: [{
                                  label: 'Count of Region IDs',
                                  data: data,
                                  backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                  borderColor: 'rgba(75, 192, 192, 1)',
                                  borderWidth: 1
                              }]
                          },
                          options: {
                              scales: {
                                x: {
                                      ticks: {
                                          stepSize: 0.5 // Définir la graduation de l'axe x par 0,5
                                      }
                                  },
                                  y: {
                                      beginAtZero: true,
                                      ticks: {
                                          stepSize: 0.5 
                                      }
                                  }
                              }
                          }
                      });
</script>
                    <!-- representaton DEPARTEMENT par region -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                               

  </body>
</html>