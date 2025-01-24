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
  /* General Styles */
  body {
      font-family: 'Public Sans', sans-serif;
      background-color: #f4f7fc;
      color: #333;
  }

  .btn-choose-theme {
      display: inline-flex;
      align-items: center;
      padding: 12px 24px;
      background-color: #007bff;
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
      background-color: #0056b3;
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
      color: #4e73df;
      transition: color 0.3s ease;
  }

  .theme-card:hover .theme-icon {
      color: #007bff;
  }

  .theme-select {
      width: 70%;
      padding: 12px 18px;
      font-size: 1rem;
      margin-bottom: 20px;
      border-radius: 25px;
      border: 1px solid #ddd;
      background-color: #f8f9fa;
      transition: border 0.3s ease;
  }

  .theme-select:hover {
      border-color: #007bff;
  }
</style>

<!-- Make sure the HTML elements are aligned well with these styles -->


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

         
       
</div>

<div class="text-center mb-4">
    <h2 class="text-primary">Accès aux services publics</h2>
    <select id="themeSelect" class="form-select">
        <option value="" disabled selected>Veuillez choisir un service public</option>
        <option value="delivrancePapierAdmin">Délivrance de papiers administratifs</option>
        <option value="defenseSecurite">Défense et sécurité</option>
        <option value="santeProtection">Santé et protection sociale</option>
        <option value="educationEnseignement">Éducation et Enseignement</option>
        <option value="habitatCadreVie">Habitat et cadre de vie</option>
        <option value="transport">Transport</option>
        <option value="environnement">Environnement</option>
        <option value="finances">Finances</option>
        <option value="sportLoisirsCulture">Sport, Loisirs, culture</option>
        <option value="industrie">Industrie</option>
        <option value="agriculture">Agriculture, pêche, élevage</option>
</select>


</div>
<div class="text-center mt-4">
    <canvas id="themeChart" width="200" height="50"></canvas>
</div>



             <a href="{{ route('admin.dashboard') }}" class="btn-choose-theme">
  <span class="btn-text">Choisir un autre thème</span>
</a>

<style>
  /* Button for choosing another theme */
  .btn-choose-theme {
    display: inline-flex;
    align-items: center;
    padding: 12px 24px;
    background-color: #28a745; /* Green background for a fresh look */
    color: white;
    border: 2px solid #28a745;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .btn-choose-theme:hover {
    background-color: #218838;
    border-color: #218838;
    transform: translateY(-3px);
  }

  .btn-choose-theme:active {
    transform: translateY(1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .btn-choose-theme .btn-text {
    margin-left: 8px;
    font-size: 1rem;
  }

  /* Add a left arrow icon before the text */
  .btn-choose-theme::before {
    content: '\f0a8'; /* Font Awesome left arrow icon */
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    font-size: 1.3rem;
    margin-right: 8px;
  }
</style>


                          
                           

                        </body>
                        </html>
                          
                      </table>
                    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                         
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const themeSelect = document.getElementById("themeSelect");
    const themeChartCanvas = document.getElementById("themeChart").getContext("2d");

    const themeData = {
        delivrancePapierAdmin: [5, 10, 20, 30, 35],
        defenseSecurite: [10, 12, 25, 40, 13],
        santeProtection: [15, 20, 18, 25, 22],
        educationEnseignement: [8, 15, 30, 25, 22],
        habitatCadreVie: [5, 15, 40, 25, 10],
        transport: [20, 18, 12, 30, 20],
        environnement: [18, 28, 22, 15, 10],
        finances: [12, 10, 15, 30, 33],
        sportLoisirsCulture: [10, 8, 30, 45, 7],
        industrie: [13, 22, 35, 10, 15],
        agriculture: [7, 20, 30, 35, 8],
    };

    const accessibilityLabels = ['Très accessible', 'Accessible', 'Moyenne accessible', 'Difficile accessible', 'Très difficile accessible'];

    let chart = new Chart(themeChartCanvas, {
        type: 'bar',
        data: {
            labels: accessibilityLabels,
            datasets: [{
                label: 'Accessibilité',
                data: themeData.accesPublics, // Default data
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'],
                borderColor: '#fff',
                borderWidth: 1,
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

    themeSelect.addEventListener("change", function() {
        const selectedTheme = themeSelect.value;

        if (selectedTheme) {
            // Update the chart data based on the selected theme
            chart.data.datasets[0].data = themeData[selectedTheme];
        } else {
            // Keep the chart empty if no theme is selected
            chart.data.datasets[0].data = [];
        }

        // Re-render the chart
        chart.update();
    });
</script>


  </body>
</html>