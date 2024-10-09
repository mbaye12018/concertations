
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Plateforme de concertation nationale</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="../assets/img/logoconcertation.PNG" rel="icon">
  <link href="../assets/img/logoconcertation.PNG" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    
      margin: 0;
      padding: 0;
    }

    #formContainer {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin: 60px auto; /* Ajout d'une marge pour le header */
      max-width: 600px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .section {
      display: none;
    }

    .section.active {
      display: block;
    }

    .question {
      margin: 15px 0;
    }

    .question input[type="text"],
    .question input[type="email"],
    .question input[type="tel"],
    .question select {
      width: calc(100% - 20px);
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .question textarea {
      width: calc(100% - 20px);
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
      height: 80px;
    }

    .buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    button {
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      background-color: #007BFF;
      color: white;
      cursor: pointer;
    }

    button:disabled {
      background-color: #ccc;
    }

    .star-rating {
      display: flex;
      justify-content: space-between;
      width: 100px;
      margin: 5px 0;
      cursor: pointer;
    }

    .star {
      font-size: 24px;
      color: #ccc;
    }

    .star.selected {
      color: #FFD700;
    }

    .emoji {
      font-size: 24px;
      text-align: center;
    }
    .question label {
    display: inline-block;
    margin-right: 40px;
}
.required {
  color: red;
}
#encouragementMessage {
    text-align: center;
    font-weight: bold;
    font-size: 1.5em;
    margin: 20px auto; /* Centrage horizontal et espace au-dessus et au-dessous */
    max-width: 80%; /* Limite la largeur à 80% de la page */
    color: black;
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeInMove 2s ease-in-out forwards;
  }

  @keyframes fadeInMove {
    0% {
      opacity: 0;
      transform: translateY(-20px);
    }
    50% {
      opacity: 0.5;
      transform: translateY(0);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Ajouter un léger effet clignotant pour l'emoji 💪 */
  #encouragementMessage span {
    animation: pulse 1.5s infinite;
  }

  @keyframes pulse {
    0%, 100% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.2);
    }
  }


  </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="../assets/img/logg.png" alt="Logo">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
      <li><a href="{{ route('home') }}">Accueil</a></li>

        <li><a href="{{ route('contexte') }}">Contexte</a></li>
    
          <li><a href="{{ route('participation.form') }}">Donnez-nous votre avis</a></li>

       
         
          <li><a href="{{ route('login') }}">Connexion</a></li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>
<!--  <h6 style="padding:2px;color:black">Bienvenue, {{ Auth::user()->prenom }} {{ Auth::user()->nom }} !</h6>-->
 
  <div id="encouragementMessage">
  "Votre rôle est crucial ! En remplissant ce formulaire pour recueillir les avis des citoyens, vous contribuez à améliorer nos services et à bâtir un avenir meilleur pour tous. <span>💪</span>"
</div>

 
<form id="registrationForm" method="POST" action="{{ route('enquetes.store') }}">

    @csrf <!-- Protection CSRF -->
    <div id="formContainer">
        <div id="section1" class="section active">
            <h2>Identification</h2>
            <div class="question">
                <label for="region">Région <span class="required">(*)</span> :</label>
                <select id="regions" name="region_id" required>
                    <option value="">Choisir une région</option>
                    @foreach($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="question">
                <label for="departement">Département <span class="required">(*)</span> :</label>
                <select id="departement" name="departement_id" required>
                    <option value="">Choisir un département</option>
                    <!-- Les départements seront chargés par JavaScript en fonction de la région sélectionnée -->
                </select>
            </div>

            <div class="question">
                <label for="secteur">Secteur <span class="required">(*)</span> :</label>
                <select id="secteur" name="secteur_id" required>
                    <option value="">Choisir un secteur</option>
                    <!-- Les secteurs seront chargés par JavaScript en fonction du département sélectionné -->
                </select>
            </div>

            <div class="question">
                <label for="firstname">Prénom et nom représentant <span class="required">(*)</span> :</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>


            <div class="question">
                <label for="phone">Contact<span class="required">(*)</span> :</label>
                <input type="tel" id="phone" name="phone" placeholder="Email ou téléphone" required>
            </div>


            <div class="question">
                <label for="position">Fonction :</label>
                <input type="text" id="position" name="position">
            </div>

            <div class="buttons">
        <p></p>
                
            <button type="button" id="next1" class="btn-green">Suivant &#8594;</button>
        </div>
    </div>

        <div id="section2" class="section">
        <h4 style="text-align:center">Parlons de votre perception du Service Public Actuel:</h4>
  <div class="question">
    <label>Comment noteriez-vous la qualité des services ?<span class="required">(*)</span> :</label>
    <div class="star-rating" data-question="1">
    <span class="star" data-value="1">★</span>
    <span class="star" data-value="2">★</span>
    <span class="star" data-value="3">★</span>
    <span class="star" data-value="4">★</span>
    <span class="star" data-value="5">★</span>
  </div>



  <script>
    const stars = document.querySelectorAll('.star');
    stars.forEach(star => {
        star.addEventListener('click', () => {
            // Retirer les classes de sélection de toutes les étoiles
            stars.forEach(s => {
                s.classList.remove('selected-1', 'selected-2', 'selected-3', 'selected-4', 'selected-5');
            });
            // Récupérer la valeur de l'étoile cliquée
            let value = star.getAttribute('data-value');
            // Ajouter la classe de couleur appropriée pour l'étoile sélectionnée et les précédentes
            for (let i = 0; i < stars.length; i++) {
                if (i < value) {
                    stars[i].classList.add(`selected-${value}`);
                }
            }
        });
    });
   </script>

    <div id="comment1">Satisfaction: <span id="satisfactionMessage" class="satisfaction-medium">😐</span></div>
    <input type="hidden" name="service_quality" id="service_quality" value="0"> <!-- Ajouter ce champ pour le rating -->
   </div>

            <div class="question">
                <label for="serviceFeedback">Quels sont les principaux points forts et les principales faiblesses des services publics actuels selon vous ?:</label>
                <textarea id="servicePoint" name="service_point"></textarea>
            </div>
           
      <div class="question">
        <label>Les services publics sont-ils facilement accessibles pour tous ? (géographiquement, financièrement, etc.)
        <span class="required">(*)</span> :</label>
        
        <br>
        <label><input type="radio" id="ouiaccessible" name="accessible" value="Oui" required> Oui</label>
        <label><input type="radio" id="nonaccessible" name="accessible" value="Non" required> Non</label>
    </div>
    <div class="question">
                <label for="serviceFeedback">Quels sont les principaux obstacles à l'accès aux services publics ?</label>
                <textarea id="obstable" name="obstable"></textarea>
            </div>

    <div class="question">
    <label>Les procédures administratives sont-elles trop longues et complexes ?</label><br>
    <label>
        <input type="radio" id="yes" name="service_longue" value="oui" required> Oui
    </label>
    <label>
        <input type="radio" id="no" name="service_longue" value="non" required> Non
    </label>
  </div>

  <div class="question">
      <label>Les services publics répondent-ils à vos besoins de manière efficace ?</label><br>
      <label>
          <input type="radio" id="efficace-oui" name="service_efficace" value="oui" required> Oui
      </label>
      <label>
          <input type="radio" id="efficace-non" name="service_efficace" value="non" required> Non
      </label>
  </div>

      <div class="question">
          <label>À votre avis, les services publics sont-ils suffisamment modernisés pour répondre aux défis actuels ?</label><br>
          <label>
              <input type="radio" id="modernise-oui" name="service_modernise" value="oui" required> Oui
          </label>
          <label>
              <input type="radio" id="modernise-non" name="service_modernise" value="non" required> Non
          </label>
      </div>

            <div class="question">
                <label for="serviceFeedback">Quels outils numériques ou technologiques pourraient améliorer les services publics ?

                </label>
                <textarea id="serviceFeedback" name="service_feedback"required></textarea>
            </div>

            <div class="buttons">
            <button type="button" class="btn-grey" id="prev1">
            &#8592; Précédent
          </button>
          <button type="button" class="btn-green" id="next2">
         Suivant &#8594;
  </button>
   </div>
        </div>

        <div id="section3" class="section">
            <h4 style="text-align:center"> Attentes et Priorités pour la Réforme</h4>
            <div class="question">
    <label>Quelles sont, selon vous, les trois principales réformes à mettre en œuvre pour améliorer le service public ?</label><br>
          <textarea name="reformes" rows="3"required ></textarea>
      </div>

      <div class="question">
          <label>Quelles mesures concrètes faudrait-il mettre en place pour améliorer la qualité des services publics ?</label><br>
          <textarea name="qualite_services" rows="3"required ></textarea>
      </div>

      <div class="question">
          <label>Comment garantir la transparence et la responsabilité des administrations publiques ?</label><br>
          <textarea name="transparence_responsabilite" rows="3" required></textarea>
      </div>

      <div class="question">
          <label>Quelles actions pourraient être entreprises pour rendre les services publics plus accessibles à tous ?</label><br>
          <textarea name="accessibilite_services" rows="3" required></textarea>
      </div>

      <div class="question">
          <label>Comment simplifier les procédures administratives et réduire les délais de traitement ?</label><br>
          <textarea name="simplification_procedures" rows="3" required></textarea>
      </div>

      <div class="question">
          <label>Comment améliorer la coordination entre les différents services publics ?</label><br>
          <textarea name="coordination_services" rows="3"required ></textarea>
      </div>

      <div class="question">
          <label>Comment encourager l'utilisation des technologies numériques dans les services publics ?</label><br>
          <textarea name="technologies_numeriques" rows="3" required></textarea>
      </div>

      <div class="question">
          <label>Comment former les agents publics aux nouveaux outils et méthodes de travail ?</label><br>
          <textarea name="formation_agents" rows="3" required></textarea>
      </div>


            <div class="buttons">
                <button type="button" class="btn-grey" id="prev2"> &#8592;Précédent</button>
                <button type="button" class="btn-green"  id="next3">Suivant &#8594;</button>
            </div>
        </div>

        <div id="section4" class="section">
            <h4 style="text-align:center"> Implication des Citoyens</h4>
            <div class="question">
    <label>Comment les citoyens pourraient-ils être davantage associés aux décisions concernant la réforme du service public ?</label><br>
    <textarea name="association_citoyens" rows="3" required></textarea>
   </div>

      <div class="question">
          <label>Quels outils de participation citoyenne pourraient être mis en place ?</label><br>
          <textarea name="outils_participation" rows="3" required></textarea>
      </div>

            <div class="buttons">
                <button type="button" class="btn-grey"  id="prev3"> &#8592; Précédent</button>
                <button type="button" class="btn-green"  id="next4">Suivant &#8594;</button>
            </div>
        </div>

        <div id="section5" class="section">
            <h4 style="text-align:center"> Autres Commentaires</h4>
            <div class="question">
                <label>Commentaires supplémentaires :</label>
                <textarea id="additionalComments" name="additional_comments"></textarea>
            </div>
            <div class="buttons">
                <button type="button" class="btn-grey" id="prev4"> &#8592; Précédent</button>
                <button type="submit" class="btn-green" id="submit">Soumettre</button>
            </div>
        </div>
    </div>
</form>
        <div id="section3" class="section">
            <h4 style="text-align:center">Attentes et Priorités pour la Réforme</h4>
            <div class="question">
                <label>Quelles sont les trois principales réformes à mettre en œuvre ?</label>
                <textarea id="reforms" name="reforms" required></textarea>
            </div>
            <div class="buttons">
                <button type="button" id="prev2">Précédent</button>
                <button type="button" id="next3">Suivant</button>
            </div>
        </div>

        <div id="section4" class="section">
            <h4 style="text-align:center">Implication des Citoyens</h4>
            <div class="question">
                <label>Comment les citoyens pourraient-ils être davantage associés aux décisions ?</label>
                <textarea id="citizenInvolvement" name="citizen_involvement"></textarea>
            </div>
            <div class="buttons">
                <button type="button" id="prev3">Précédent</button>
                <button type="button" id="next4">Suivant</button>
            </div>
        </div>

        <div id="section5" class="section">
            <h4 style="text-align:center">Autres Commentaires</h4>
            <div class="question">
                <label>Commentaires supplémentaires :</label>
                <textarea id="additionalComments" name="additional_comments"></textarea>
            </div>
            <div class="buttons">
                <button type="button" id="prev4">Précédent</button>
                <button type="submit" id="submit">Soumettre</button>
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Récupérer les régions dès le chargement de la page
        fetch('/regions') // Remplacez par votre route d'API
            .then(response => response.json())
            .then(data => {
                const regionSelect = document.getElementById('regions');
                regionSelect.innerHTML = '<option value="">Choisir une région</option>'; // Réinitialiser les options
                data.forEach(region => {
                    const option = document.createElement('option');
                    option.value = region.id; // Utilisez l'identifiant de la région
                    option.textContent = region.nom; // Utilisez le nom de la région
                    regionSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Erreur lors de la récupération des régions:', error);
            });

        // Récupérer les départements en fonction de la région sélectionnée
        document.getElementById('regions').addEventListener('change', function() {
            const regionId = this.value;
            const departementSelect = document.getElementById('departement');
            departementSelect.innerHTML = '<option value="">Choisir un département</option>'; // Reset options

            if (regionId) {
                fetch(`/departements/${regionId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(departement => {
                            const option = document.createElement('option');
                            option.value = departement.id;
                            option.textContent = departement.nom;
                            departementSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Erreur lors de la récupération des départements:', error);
                    });
            }
        });

        // Récupérer les secteurs en fonction du département sélectionné
        document.getElementById('departement').addEventListener('change', function() {
            const departementId = this.value;
            const secteurSelect = document.getElementById('secteur');
            secteurSelect.innerHTML = '<option value="">Choisir un secteur</option>'; // Reset options

            if (departementId) {
                fetch(`/secteurs/${departementId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(secteur => {
                            const option = document.createElement('option');
                            option.value = secteur.id;
                            option.textContent = secteur.nom_secteur; // Utilisez le nom du secteur
                            secteurSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Erreur lors de la récupération des secteurs:', error);
                    });
            }
        });

        // Gestion des sections du formulaire
        const sections = document.querySelectorAll('.section');
        let currentSection = 0;

        function showSection(index) {
            sections.forEach((section, i) => {
                section.classList.toggle('active', i === index);
            });
        }

        // Fonction de validation des champs obligatoires (uniquement pour les champs visibles)
        function checkRequiredFields(section) {
            const inputs = section.querySelectorAll('input[required], select[required], textarea[required]');
            return Array.from(inputs).every(input => input.value.trim() !== '');
        }

        document.getElementById('next1').addEventListener('click', () => {
            if (checkRequiredFields(sections[currentSection])) {
                currentSection++;
                showSection(currentSection);
            } else {
                alert('Veuillez remplir tous les champs obligatoires.');
            }
        });

        document.getElementById('prev1').addEventListener('click', () => {
            currentSection--;
            showSection(currentSection);
        });

        document.getElementById('next2').addEventListener('click', () => {
            if (checkRequiredFields(sections[currentSection])) {
                currentSection++;
                showSection(currentSection);
            } else {
                alert('Veuillez remplir tous les champs obligatoires.');
            }
        });

        document.getElementById('prev2').addEventListener('click', () => {
            currentSection--;
            showSection(currentSection);
        });

        document.getElementById('next3').addEventListener('click', () => {
            if (checkRequiredFields(sections[currentSection])) {
                currentSection++;
                showSection(currentSection);
            } else {
                alert('Veuillez remplir tous les champs obligatoires.');
            }
        });

        document.getElementById('prev3').addEventListener('click', () => {
            currentSection--;
            showSection(currentSection);
        });

        document.getElementById('next4').addEventListener('click', () => {
            if (checkRequiredFields(sections[currentSection])) {
                currentSection++;
                showSection(currentSection);
            } else {
                alert('Veuillez remplir tous les champs obligatoires.');
            }
        });

        document.getElementById('prev4').addEventListener('click', () => {
            currentSection--;
            showSection(currentSection);
        });

        // Gestion de l'évaluation par étoiles
        const stars = document.querySelectorAll('.star-rating[data-question="1"] .star');
        const satisfactionMessage = document.getElementById('satisfactionMessage');
        const serviceQualityInput = document.getElementById('service_quality');

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const rating = star.getAttribute('data-value');
                serviceQualityInput.value = rating; // Sauvegarder la note dans le champ caché

                // Changer le message en fonction de la note
                switch (rating) {
                    case '1':
                        satisfactionMessage.textContent = '😡 Mauvaise';
                        break;
                    case '2':
                        satisfactionMessage.textContent = '😟 Insatisfaisant';
                        break;
                    case '3':
                        satisfactionMessage.textContent = '😐 Moyenne';
                        break;
                    case '4':
                        satisfactionMessage.textContent = '😊 Satisfaisant';
                        break;
                    case '5':
                        satisfactionMessage.textContent = '😁 Excellent';
                        break;
                }

                // Mettre à jour l'affichage des étoiles
                stars.forEach(s => {
                    s.classList.toggle('active', s.getAttribute('data-value') <= rating);
                });
            });
        });

        // Afficher la première section par défaut
        showSection(currentSection);
    });
</script>



<!-- Add this somewhere in your HTML to display the quality text -->
<div id="quality_text"></div>


<style>
  .section {
    display: none;
  }

  .section.active {
    display: block;
  }

  .star {
    cursor: pointer;
    font-size: 30px;
    color: gray;
  }

  .star.selected {
    color: gold;
  }

  .required {
    color: red;
  }
</style>
<!-- Pop-up de validation -->
<div id="success-popup" class="popups" style="display: none;">
    <span class="close-btn">&times;</span>
    <p>✔ Merci ! Vos réponses ont été enregistrées aves succès.</p>

</div>
<style>
  .popups {
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    background-color: white; /* Couleur de fond blanche */
    color: black; /* Couleur du texte noir */
    padding: 20px;
    border-radius: 5px;
    border: 1px solid #ccc; /* Bordure grise */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Ombre pour un léger effet de profondeur */
    z-index: 1000; /* Assure que le popup est au-dessus des autres éléments */
    display: none; /* Masquer par défaut */
}

.close-btn {
    cursor: pointer;
    float: right;
    font-size: 20px;
    font-weight: bold;
    color: black; /* Couleur du bouton de fermeture */
}

.close-btn:hover {
    color: red; /* Couleur au survol pour un effet */
}

.popups p {
    margin: 10px 0 0; /* Ajuster la marge du texte */
    text-align: center; /* Centrer le texte */
}

</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Vérifiez si le pop-up doit s'afficher
        @if(session('success'))
            const popups = document.getElementById('success-popup');
            popups.style.display = 'block'; // Afficher le pop-up

            // Fermer le pop-up après 3 secondes
            setTimeout(() => {
                popups.style.display = 'none'; // Masquer le pop-up
            }, 3000);
        @endif
    });
</script>



  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>


</body>

</html>
