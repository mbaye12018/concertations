<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Concertation nationale</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
    <link rel="icon" href="../assets/img/kaiadmin/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/plugins.min.css" />
    <link rel="stylesheet" href="../assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
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
  </head>
  <body>
    <div class="wrapper">
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
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
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item active">
                <a href="{{ route('utilisateur.create') }}">
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

      <div class="main-panel">
        <div class="container">
          <div class="page-inner">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row">
                      <div class="card-title">Statistique</div>
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
                        <h2 class="text-primary">Dilligence</h2>
                      </div>
                      <div class="text-center mt-4">
                        <canvas id="themeChart" width="200" height="50"></canvas>
                      </div>
                      <h1></h1>
                      <a href="{{ route('admin.dashboard') }}" class="btn-choose-theme">
                        <span class="btn-text">Choisir un autre thème</span>
                      </a>
                    </div>
                  </div>
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
    </div>

    <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugin/chart.js/chart.min.js"></script>
    <script src="../assets/js/kaiadmin.min.js"></script>

    <script>
    var ctx = document.getElementById('themeChart').getContext('2d');
    var themeChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Longue', 'Pas Longue', 'Complexe', 'Pas complexe'],
            datasets: [{
                label: 'Évaluations',
                data: [
                    {{ $delaisLong }},
                    {{ $pasLong }},
                    {{ $complexe }},
                    {{ $pasComplexe }}
                ],
                backgroundColor: ['#4e73df', '#ff6347', '#ffa500', '#32cd32'],
                borderColor: ['#4e73df', '#ff6347', '#ffa500', '#32cd32'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    enabled: true
                }
            }
        }
    });
</script>

  </body>
</html>
