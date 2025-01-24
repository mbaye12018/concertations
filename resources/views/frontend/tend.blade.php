<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme de Concertation Nationale</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef2f3;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .select-container {
            margin-bottom: 20px;
            text-align: center;
        }

        .select-container label {
            font-size: 1.2rem;
            color: #333;
            margin-right: 10px;
        }

        #chartSelect {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            font-size: 1rem;
            color: #333;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        #chartSelect:hover {
            border-color: #007bff;
        }

        #chartSelect:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .wrap {
            position: relative;
            overflow: hidden;
            width: 100%;
            max-width: 800px;
            height: 500px;
            border: 1px solid #ccc;
            background-color: #eef2f3;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            flex-direction: column;
        }

        .question {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        .response-container {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .response-text {
            font-size: 2rem;
            opacity: 0;
            transition: opacity 1s ease, transform 1s ease;
            position: absolute;
            text-align: center;
            transform: scale(0) translate(-50%, -50%);
            white-space: nowrap;
            margin: 10px;
        }

        .chart-container {
            width: 100%;
            max-width: 800px;
            height: 400px;
        }

        footer {
            margin-top: auto;
            padding: 10px;
            background-color: #eef2f3;
            color: #333;
            text-align: center;
            width: 100%;
        }
</style>
</head>

<body>
    <header class="header">
        <h1>Plateforme de Concertation Nationale</h1>
    </header>

    <div class="select-container">
        <label for="chartSelect">Choisissez un type de graphique :</label>
        <select id="chartSelect" onchange="updateChart()">
            <option value="quality">Qualité des Services Publics</option>
            <option value="accessibility">Accessibilité</option>
        </select>
    </div>

    <br>
    <div class="wrap">
        <div class="question">Sélectionnez un type de graphique :</div>
        <div class="response-container" id="responseContainer"></div>
    </div>

    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>

    <footer>
        <p>&copy; 2024 Copyright MFPRSP</p>
    </footer>

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
        const responseContainer = document.getElementById('responseContainer');
        const ctx = document.getElementById('myChart').getContext('2d');

        const qualityData = {
            labels: responses,
            datasets: [{
                label: 'Réponses',
                backgroundColor: responseColors.map(color => color.replace('1', '0.5')),
                borderColor: responseColors,
                borderWidth: 1,
                data: [0, 0, 0, 0, 0]
            }]
        };

        const accessibilityData = {
            labels: accessibilityResponses,
            datasets: [{
                label: 'Accessibilité',
                backgroundColor: accessibilityColors,
                borderColor: accessibilityColors,
                borderWidth: 1,
                data: [0, 0]
            }]
        };

        let myChart = new Chart(ctx, {
            type: 'bar',
            data: qualityData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
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
                },
                animation: {
                    duration: 1000,
                }
            },
            plugins: [ChartDataLabels]
        });

        function updateChart() {
            const selectedValue = document.getElementById('chartSelect').value;

            if (selectedValue === 'quality') {
                myChart.data = qualityData;
                myChart.options.plugins.title.text = 'Perception des Services Publics';
                showResponses(responses, responseColors);  // Affiche les réponses de qualité
            } else {
                myChart.data = accessibilityData;
                myChart.options.plugins.title.text = 'Accessibilité des Services';
                showResponses(accessibilityResponses, accessibilityColors);  // Affiche les réponses d'accessibilité
            }

            myChart.update();
        }

        async function fetchResponses() {
            try {
                const response = await fetch('/api/responses'); // L'URL doit correspondre à votre API
                const data = await response.json();

                // Assurez-vous que les clés correspondent à celles de votre base de données
                qualityData.datasets[0].data = [
                    data['Médiocre'],
                    data['Insatisfaisant'],
                    data['Moyenne'],
                    data['Satisfaisant'],
                    data['Très Satisfaisant']
                ];

                accessibilityData.datasets[0].data = [
                    data['Accessibilite_Oui'],  // Clé pour "Oui"
                    data['Accessibilite_Non']   // Clé pour "Non"
                ];

                // Mettre à jour le graphique selon la sélection actuelle
                updateChart();
            } catch (error) {
                console.error('Erreur lors de la récupération des données:', error);
            }
        }

        fetchResponses();
        setInterval(fetchResponses, 5000);

        function showResponses(responseList, colorList) {
            responseContainer.innerHTML = '';  // Effacer les réponses précédentes

            responseList.forEach((response, index) => {
                const responseText = document.createElement('div');
                responseText.textContent = response;
                responseText.className = 'response-text';
                responseText.style.color = colorList[index];

                responseText.style.left = '50%';
                responseText.style.top = '50%';

                responseContainer.appendChild(responseText);

                setTimeout(() => {
                    responseText.style.opacity = 1;
                    responseText.style.transform = 'scale(1) translate(-50%, -50%)';
                }, index * 2000);

                setTimeout(() => {
                    responseText.style.opacity = 0;
                }, (index + 1) * 2000);
            });
        }
    </script>
</body>

</html>
