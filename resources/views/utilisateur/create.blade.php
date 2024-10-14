<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Concertation nationale</title>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

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
                <a href="#">
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
<br>
        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
             
            </div>
          
            <div class="container">
             
            <div class="row">
             
            

              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h1 class="card-title">Liste des Utilisateurs</h1>
                      <button
    class="btn btn-success btn-round ms-auto"
    data-bs-toggle="modal"
    data-bs-target="#addRowModal"
>
    <i class="fa fa-plus"></i>
    Ajout
</button>

                    </div>
                   
                  </div>
                  <div class="card-body">
                    <!-- Modal -->
                    <div
                      class="modal fade"
                      id="addRowModal"
                      tabindex="-1"
                      role="dialog"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-0">
                            <h5 class="modal-title">
                              <span class="fw-mediumbold"> Formulaire D'ajout</span>
                               </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     
                        </button>
                          </div>
                          <div class="modal-body">
                           
<form method="POST" action="{{ route('utilisateur.store') }}">
    @csrf
    <div class="form-group">
        <label>Prénom</label>
        <input type="text" name="prenom" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Nom</label>
        <input type="text" name="nom" class="form-control">
    </div>
    <div class="form-group">
        <label>Rôle</label>
        <select name="role" class="form-control">
            <option value="" disabled selected>Choisir un rôle</option>
            <option value="admin">Admin</option>
            <option value="rapporteur">Rapporteur</option>
            <option value="consultation">Consultant</option>
        </select>
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Mot de passe</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

                          </div>
                        
                        </div>
                      </div>

                    </div>
                    <div class="container">
    @if(session('success'))
    <div class="alert alert-success" id="successMessage">
        {{ session('success') }}
    
       
</div>
@endif



    <!-- Votre tableau d'utilisateurs ici -->
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Prénom Nom</th>
                <th>Rôle</th>
                <th>Username</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($utilisateurs as $utilisateur)
                <tr>
                    <td>{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</td>
                    <td>{{ $utilisateur->role }}</td>
                    <td>{{ $utilisateur->username }}</td>
                    <td>
                        <!-- Bouton Modifier -->
                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $utilisateur->id }}">Modifier</a>
                        <!-- Modal de modification -->
                        <div class="modal fade" id="editUserModal{{ $utilisateur->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modifier l'Utilisateur</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('utilisateur.update', $utilisateur->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label>Prénom</label>
                                                <input type="text" name="prenom" class="form-control" value="{{ $utilisateur->prenom }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" name="nom" class="form-control" value="{{ $utilisateur->nom }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Rôle</label>
                                                <select name="role" class="form-control">
                                                    <option value="admin" {{ $utilisateur->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                                    <option value="rapporteur" {{ $utilisateur->role === 'rapporteur' ? 'selected' : '' }}>Rapporteur</option>
                                                    <option value="consultation" {{ $utilisateur->role === 'consultation' ? 'selected' : '' }}>Consultant</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control" value="{{ $utilisateur->username }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Mot de passe</label>
                                                <input type="password" name="password" class="form-control" placeholder="Laissez vide pour ne pas changer">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                  
                    <td>
    <!-- Bouton Supprimer -->
    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $utilisateur->id }}">Supprimer</button>

    <!-- Modal de confirmation -->
    <div class="modal fade" id="confirmDeleteModal{{ $utilisateur->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmer la Suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                    <form action="{{ route('utilisateur.destroy', $utilisateur->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</td>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       

   
            
          </div>
        </div>

      </div>

      <!-- Custom template | don't include it in your project! -->
      <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
          <div class="switcher">
            <div class="switch-block">
              <h4>Logo Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="selected changeLogoHeaderColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Navbar Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="selected changeTopBarColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Sidebar</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="white"
                ></button>
                <button
                  type="button"
                  class="selected changeSideBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="dark2"
                ></button>
              </div>
            </div>
          </div>
        </div>
      
      </div>
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

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
    <script>
    // Vérifier si le message est présent
    window.onload = function() {
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            // Attendre 5 secondes (5000 ms) avant de masquer le message
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 2000);
        }
    };
</script>

  </body>
</html>
