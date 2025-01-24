<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Plateforme de concertation nationale</title>
  <link href="assets/img/logoconcertation.PNG" rel="icon">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
  <link rel="stylesheet" href="styles.css"> <!-- Assurez-vous d'inclure votre fichier CSS -->
</head>
<style>
    /* styles.css */

/* Global styles */
body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}

/* Header styles */
.header {
    background: #004080;
    color: white;
    padding: 20px;
}

.header .logo img {
    max-height: 50px;
}

.navmenu {
    display: flex;
    justify-content: flex-end;
}

.navmenu ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
}

.navmenu li {
    margin-left: 20px;
}

.navmenu a {
    color: white;
    text-decoration: none;
    font-weight: 500;
}

.navmenu a.active {
    font-weight: bold;
    text-decoration: underline;
}

/* Main content styles */
.main {
    padding: 40px;
}

.center-container {
    max-width: 800px;
    margin: auto;
    text-align: center;
}

.select-container {
    margin-bottom: 20px;
}

.select-container label {
    margin-right: 10px;
}

/* Chart container */
.chart-container {
    margin-top: 20px;
}

/* Footer styles */
.footer {
    background: #004080;
    color: white;
    padding: 40px 0;
}

.footer h4 {
    margin-bottom: 20px;
}

.footer-links ul {
    list-style: none;
    padding: 0;
}

.footer-links li {
    margin-bottom: 10px;
}

.footer-links a {
    color: white;
    text-decoration: none;
}

.footer-contact p {
    margin: 5px 0;
}

.copyright {
    margin-top: 20px;
    text-align: center;
}

/* Responsive styles */
@media (max-width: 768px) {
    .navmenu ul {
        flex-direction: column;
    }
}

</style>
<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="{{ route('home') }}" class="logo d-flex align-items-center">
        <img src="assets/img/logg.png" alt="">
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}">Accueil</a></li>
          <li><a href="{{ route('contexte') }}">Contexte</a></li>
          <li><a href="{{ route('objectif') }}">Objectif</a></li>
          <li><a href="{{ route('participation.form') }}">Donnez-nous votre avis</a></li>
          <li><a href="{{ route('tendance') }}">Tendance</a></li>
          <li><a href="{{ route('login') }}">Connexion</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <div class="center-container">
      <div class="select-container text-center">
        <label for="chartSelect">Voir tendance:</label>
        <select id="chartSelect" onchange="updateChart()">
          <option value="quality">Qualité des Services Publics</option>
          <option value="accessibility">Accessibilité</option>
        </select>

        <label for="chartTypeSelect">Type de graphique:</label>
        <select id="chartTypeSelect" onchange="updateChart()">
          <option value="bar">Barres</option>
          <option value="line">Lignes</option>
          <option value="pie">Camembert</option>
          <option value="doughnut">Doughnut</option>
        </select>
      </div>

      <div class="chart-container">
        <canvas id="myChart"></canvas>
      </div>
    </div>
  </main>

  <script>
    const responses = ['Médiocre', 'Insatisfaisant', 'Moyenne', 'Satisfaisant', 'Très Satisfaisant'];
    const accessibilityResponses = ['Oui', 'Non'];
    const responseColors = [
      'rgba(255, 0, 0, 1)',
      'rgba(54, 162, 235, 1)',
      'rgba(255, 206, 86, 1)',
      'rgba(75, 192, 192, 1)',
      'rgba(153, 102, 255, 1)'
    ];
    const accessibilityColors = [
      'rgba(75, 192, 192, 1)',
      'rgba(255, 99, 132, 1)'
    ];

    const qualityData = {
      labels: responses,
      datasets: [{
        label: 'Réponses',
        backgroundColor: responseColors,
        borderColor: responseColors,
        borderWidth: 1,
        data: [12, 19, 3, 5, 2] // Exemple de données pour la qualité
      }]
    };

    const accessibilityData = {
      labels: accessibilityResponses,
      datasets: [{
        label: 'Accessibilité',
        backgroundColor: accessibilityColors,
        borderColor: accessibilityColors,
        borderWidth: 1,
        data: [30, 10] // Exemple de données pour l'accessibilité
      }]
    };

    const ctx = document.getElementById('myChart').getContext('2d');
    let myChart = new Chart(ctx, {
      type: 'bar', // Type par défaut
      data: qualityData, // Données par défaut
      options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Perception des Services Publics'
          },
          datalabels: {
            anchor: 'end',
            align: 'end',
            formatter: (value) => value,
            color: '#444',
            font: {
              weight: 'bold'
            }
          }
        }
      },
      plugins: [ChartDataLabels]
    });

    function updateChart() {
      const selectedValue = document.getElementById('chartSelect').value;
      const selectedChartType = document.getElementById('chartTypeSelect').value;

      if (selectedValue === 'quality') {
        myChart.data = qualityData;
        myChart.options.plugins.title.text = 'Perception des Services Publics';
      } else {
        myChart.data = accessibilityData;
        myChart.options.plugins.title.text = 'Accessibilité des Services';
      }

      myChart.config.type = selectedChartType;
      myChart.update();
    }
  </script>

  <footer id="footer" class="footer">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="#" class="logo d-flex align-items-center">
            <span class="sitename">Plateforme de concertation nationale pour la Réforme du service public</span>
          </a>
          <div class="social-links d-flex mt-4">
            <a href="https://x.com/FpubliqueSn"><i class="bi bi-twitter-x"></i></a>
            <a href="https://www.facebook.com/fonctionpubliqueSn"><i class="bi bi-facebook"></i></a>
            <a href="https://www.youtube.com/@fpubliquesn4927"><i class="bi bi-youtube"></i></a>
            <a href="https://sn.linkedin.com/company/minist-re-de-la-fonction-publique-et-de-la-transformation-du-secteur-public"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Accès rapide</h4>
          <ul>
            <li><a href="https://www.fonctionpublique.gouv.sn/Recrutement">Souscrire à une demande d’emploi</a></li>
            <li><a href="https://www.fonctionpublique.gouv.sn/Attestation-de-non-appartenance-a-la-Fonction-publique-39">Obtenir votre Attestation ...</a></li>
            <li><a href="https://www.fonctionpublique.gouv.sn/Actes-37">Télécharger votre acte administratif</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Liens utiles</h4>
          <ul>
            <li><a href="https://www.fonctionpublique.gouv.sn/Attestation-de-non-appartenance-a-la-Fonction-publique-39">Gov'athon 2024</a></li>
            <li><a href="https://www.fonctionpublique.gouv.sn/">Ministère de la Fonction publique</a></li>
            <li><a href="https://primature.sn/">Gouvernement du Sénégal</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Localisation</h4>
          <p>52, Vincens x</p>
          <p>Abdou Karim BOURGI,</p>
          <p>Dakar</p>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>2024 Copyright</span> <strong class="px-1 sitename">MFPRSP/DSI/D2I</strong> <span>All Rights Reserved</span></p>
    </div>
  </footer>

</body>

</html>
