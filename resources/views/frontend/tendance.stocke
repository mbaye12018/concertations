<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme de Concertation Nationale</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: system-ui, sans-serif;
            background: white; /* Fond blanc */
            color: #333;
            overflow: hidden;
        }

        .wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 20px 0;
            position: relative;
            font-size: 2rem;
        }

        .responses {
            width: 80%;
            height: 100px;
            overflow: hidden;
            border: 2px solid #3498db;
            border-radius: 10px;
            background: rgba(52, 152, 219, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            font-weight: bold;
            color: #3498db;
            font-size: 3rem;
        }

        .response-text {
            position: absolute;
            white-space: nowrap;
            animation: move 5s linear infinite;
            opacity: 0; /* Début invisible */
        }

        @keyframes move {
            0% { transform: translateX(100%); opacity: 1; }
            20% { opacity: 1; }
            80% { opacity: 1; }
            100% { transform: translateX(-100%); opacity: 0; }
        }

        .chart-container {
            position: relative;
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            background: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        #myChart {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header class="header">
        <h1>Plateforme de Concertation Nationale</h1>
    </header>

    <div class="wrap">
        <div class="responses" id="responseBlock">
            <div class="response-text" id="responseText"></div>
        </div>
    </div>

    <div class="chart-container">
        <h4>Perception des Services Publics</h4>
        <canvas id="myChart"></canvas>
    </div>

    <script>
        const responses = ['Médiocre', 'Insatisfaisant', 'Moyenne', 'Satisfaisant', 'Très Satisfaisant'];
        const responseText = document.getElementById('responseText');

        function randomResponse() {
            const randomIndex = Math.floor(Math.random() * responses.length);
            responseText.textContent = responses[randomIndex];
            responseText.style.animation = 'none'; // Reset animation
            responseText.offsetHeight; // Trigger reflow
            responseText.style.animation = ''; // Restart animation
        }

        setInterval(randomResponse, 2000); // Change every 2 secondes

        const ctx = document.getElementById('myChart').getContext('2d');

        const data = {
            labels: ['Médiocre', 'Insatisfaisant', 'Moyenne', 'Satisfaisant', 'Très Satisfaisant'],
            datasets: [{
                label: 'Réponses',
                data: [12, 19, 5, 9, 4],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        };

        const myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Perception des Services Publics'
                    }
                },
                animation: {
                    duration: 1000, // Durée d'animation pour chaque mise à jour
                }
            }
        });

        // Changer les valeurs du graphique
        function updateChart() {
            let responseCounts = Array.from({ length: 5 }, () => Math.floor(Math.random() * 20)); // Nombres aléatoires
            myChart.data.datasets[0].data = responseCounts;
            myChart.update();
        }

        setInterval(updateChart, 3000); // Met à jour toutes les 3 secondes
    </script>
</body>

</html>

























<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perception des Services Publics</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            margin: 0;
            background-color: #eef2f3;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .responses {
            position: relative;
            width: 100%;
            max-width: 800px;
            height: 100px; /* Hauteur ajustée */
            overflow: hidden;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            padding: 100px;
            font-size: 1.2rem; /* Augmentation de la taille de police */
            color: #444;
        }

        .response {
            position: absolute;
            white-space: nowrap;
            animation: move 10s linear infinite;
            padding: 10px;
        }

        @keyframes move {
            0% { transform: translateX(100%); }
            50% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        #myChart {
            width: 100%;
            max-width: 800px;
            height: 400px;
            margin-top: 20px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Quelle est votre perception de la qualité des services publics ?</h1>
    <div class="responses" id="responsesContainer"></div>
    
    <canvas id="myChart"></canvas>

    <script>
        const responses = [
            'Médiocre',
            'Insatisfaisant',
            'Moyenne',
            'Satisfaisant',
            'Très Satisfaisant'
        ];

        const values = {
            'Médiocre': 0,
            'Insatisfaisant': 0,
            'Moyenne': 0,
            'Satisfaisant': 0,
            'Très Satisfaisant': 0
        };

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line', // Changement à un graphique en ligne
            data: {
                labels: Object.keys(values),
                datasets: [{
                    label: 'Perception',
                    data: Object.values(values),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Nombre de réponses'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Qualité des Services'
                        }
                    }
                }
            }
        });

        function createResponse() {
            const responseContainer = document.getElementById('responsesContainer');
            const responseDiv = document.createElement('div');
            const randomResponse = responses[Math.floor(Math.random() * responses.length)];
            
            responseDiv.className = 'response';
            responseDiv.innerText = randomResponse;
            responseContainer.appendChild(responseDiv);

            // Compter la réponse
            values[randomResponse]++;
            updateGraph();

            // Supprimer après l'animation
            setTimeout(() => {
                responseDiv.remove();
            }, 10000); // Correspond à la durée de l'animation
        }

        // Mise à jour du graphique avec des valeurs dynamiques
        function updateGraph() {
            myChart.data.datasets[0].data = Object.values(values);
            myChart.update();
        }

        // Simuler des réponses toutes les 2 secondes
        setInterval(createResponse, 2000);
    </script>
</body>
</html>

