<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Enquête</title>
    <link rel="stylesheet" href="styles.css"> <!-- Votre fichier CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        #formContainer {
            max-width: 800px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2, h3 {
            text-align: center;
            color: #4CAF50;
        }
        .question-section {
            margin-bottom: 2rem;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f9f9f9;
            position: relative;
        }
        .question-section i {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 2rem;
            color: #4CAF50;
        }
        .question {
            margin: 1rem 0;
        }
        label {
            font-weight: bold;
        }
        .required {
            color: red;
        }
        .star-rating {
            display: flex;
            justify-content: center;
            margin-top: 0.5rem;
        }
        .star {
            font-size: 2rem;
            cursor: pointer;
            color: #ccc;
        }
        .star:hover,
        .star:hover ~ .star {
            color: #FFD700;
        }
        input[type="text"], select, textarea {
            width: calc(100% - 20px);
            padding: 8px;
            margin-top: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="checkbox"], input[type="radio"] {
            margin-right: 10px;
        }
        .buttons {
            text-align: center;
            margin-top: 2rem;
        }
        .btn-green {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-green:hover {
            background-color: #45a049;
        }
        .optional-text {
            display: none; /* Masquer par défaut */
        }
    </style>
</head>
<body>

<form id="registrationForm" method="POST" action="{{ route('enquete.store') }}">
    @csrf <!-- Protection CSRF -->
    <div id="formContainer">

        <h2>Formulaire d'Enquête sur le Service Public</h2>

        <!-- Section 1: Perception du Service Public Actuel -->
        <div class="question-section">
            <i class="fas fa-thumbs-up"></i>
            <h3>Section 1 : Perception du Service Public Actuel</h3>
            
            <div class="question">
                <label>1. Dans quelle mesure êtes-vous satisfait(e) de la qualité des services publics ? <span class="required">(*)</span></label>
                <div class="star-rating" data-question="1">
                    <span class="star" data-value="1">★</span>
                    <span class="star" data-value="2">★</span>
                    <span class="star" data-value="3">★</span>
                    <span class="star" data-value="4">★</span>
                    <span class="star" data-value="5">★</span>
                </div>
                <input type="hidden" name="satisfaction" id="satisfaction" value="0">
            </div>

            <div class="question">
                <label>2. Points forts des services publics (choisissez tout ce qui s'applique) :</label>
                <label><input type="checkbox" name="points_forts[]" value="Accessibilité"> Accessibilité</label><br>
                <label><input type="checkbox" name="points_forts[]" value="Efficacité"> Efficacité</label><br>
                <label><input type="checkbox" name="points_forts[]" value="Qualité"> Qualité</label><br>
                <label><input type="checkbox" name="points_forts[]" value="Rapidité"> Rapidité</label><br>
                <label><input type="checkbox" name="points_forts[]" value="Service client"> Service client</label>
            </div>

            <div class="question">
                <label>3. Points faibles des services publics (choisissez tout ce qui s'applique) :</label>
                <label><input type="checkbox" name="points_faiblesses[]" value="Longs délais"> Longs délais</label><br>
                <label><input type="checkbox" name="points_faiblesses[]" value="Complexité"> Complexité</label><br>
                <label><input type="checkbox" name="points_faiblesses[]" value="Manque d'information"> Manque d'information</label><br>
                <label><input type="checkbox" name="points_faiblesses[]" value="Inaccessibilité"> Inaccessibilité</label>
            </div>

            <div class="question">
                <label>4. Les services publics sont-ils facilement accessibles pour tous ? <span class="required">(*)</span></label>
                <label><input type="radio" name="accessibilite" value="Oui" required> Oui</label>
                <label><input type="radio" name="accessibilite" value="Non" required> Non</label>
            </div>

            <div class="question">
                <label>5. Quels sont les obstacles à l'accès aux services publics ? (choisissez tout ce qui s'applique)</label>
                <label><input type="checkbox" name="obstacles[]" value="Frais élevés"> Frais élevés</label><br>
                <label><input type="checkbox" name="obstacles[]" value="Manque de communication"> Manque de communication</label><br>
                <label><input type="checkbox" name="obstacles[]" value="Proximité géographique"> Proximité géographique</label>
            </div>

            <div class="question">
                <label>6. Les procédures administratives sont-elles trop longues et complexes ? <span class="required">(*)</span></label>
                <label><input type="radio" name="complexite" value="Oui" required> Oui</label>
                <label><input type="radio" name="complexite" value="Non" required> Non</label>
            </div>

            <div class="question">
                <label>7. À votre avis, les services publics sont-ils suffisamment modernisés pour répondre aux défis actuels ? <span class="required">(*)</span></label>
                <label><input type="radio" name="modernisation" value="Oui" required> Oui</label>
                <label><input type="radio" name="modernisation" value="Non" required> Non</label>
            </div>

            <div class="question">
                <label>8. Outils numériques ou technologiques pouvant améliorer les services publics (choisissez tout ce qui s'applique) :</label>
                <label><input type="checkbox" name="outils_numeriques[]" value="Applications mobiles"> Applications mobiles</label><br>
                <label><input type="checkbox" name="outils_numeriques[]" value="Portails web"> Portails web</label><br>
                <label><input type="checkbox" name="outils_numeriques[]" value="Services en ligne"> Services en ligne</label><br>
            </div>
        </div>

        <!-- Section 2: Attentes et Priorités pour la Réforme -->
        <div class="question-section">
            <i class="fas fa-tools"></i>
            <h3>Section 2 : Attentes et Priorités pour la Réforme</h3>
            
            <div class="question">
                <label>1. Quelles sont, selon vous, les principales réformes à mettre en œuvre ?</label>
                <input type="text" name="reformes" placeholder="Listez les réformes">
            </div>

            <div class="question">
                <label>2. Quelles mesures pourraient améliorer la qualité des services publics ?</label>
                <input type="text" name="ameliorations" placeholder="Listez les mesures">
            </div>

            <div class="question">
                <label>3. Comment garantir la transparence des administrations publiques ?</label>
                <input type="text" name="transparence" placeholder="Proposez des idées">
            </div>

            <div class="question">
                <label>4. Priorités pour la réforme des services publics (choisissez tout ce qui s'applique) :</label>
                <label><input type="checkbox" name="priorites_reformes[]" value="Amélioration de la qualité"> Amélioration de la qualité</label><br>
                <label><input type="checkbox" name="priorites_reformes[]" value="Réduction des coûts"> Réduction des coûts</label><br>
                <label><input type="checkbox" name="priorites_reformes[]" value="Digitalisation"> Digitalisation</label>
            </div>
        </div>

        <!-- Section 3: Participation Citoyenne -->
        <div class="question-section">
            <i class="fas fa-users"></i>
            <h3>Section 3 : Participation Citoyenne</h3>
            
            <div class="question">
                <label>1. À quel point pensez-vous que la participation citoyenne est importante ?</label>
                <div class="star-rating" data-question="2">
                    <span class="star" data-value="1">★</span>
                    <span class="star" data-value="2">★</span>
                    <span class="star" data-value="3">★</span>
                    <span class="star" data-value="4">★</span>
                    <span class="star" data-value="5">★</span>
                </div>
                <input type="hidden" name="participation_importance" id="participation_importance" value="0">
            </div>

            <div class="question">
                <label>2. Quels outils de participation citoyenne pourraient être mis en place ?</label>
                <label><input type="checkbox" name="outils_participation[]" value="Forums communautaires"> Forums communautaires</label><br>
                <label><input type="checkbox" name="outils_participation[]" value="Consultations publiques"> Consultations publiques</label><br>
                <label><input type="checkbox" name="outils_participation[]" value="Sondages en ligne"> Sondages en ligne</label>
            </div>
        </div>

        <!-- Section 4: Autres Commentaires -->
        <div class="question-section">
            <i class="fas fa-comments"></i>
            <h3>Section 4 : Autres Commentaires</h3>
            <div class="question">
                <label>1. Avez-vous d'autres suggestions ou commentaires ?</label>
                <textarea name="autres_commentaires" rows="4" placeholder="Écrivez vos suggestions ici..."></textarea>
            </div>

            <div class="question">
                <label>2. Autre (optionnel) :</label>
                <textarea name="autre_option" rows="2" placeholder="Votre réponse..."></textarea>
            </div>
        </div>

        <div class="buttons">
            <button type="submit" class="btn-green">Envoyer vos réponses</button>
        </div>
    </div>
</form>

<script>
    document.querySelectorAll('.star').forEach(star => {
        star.addEventListener('click', () => {
            const value = star.getAttribute('data-value');
            const questionId = star.parentElement.getAttribute('data-question');
            document.getElementById(questionId === "1" ? 'satisfaction' : 'participation_importance').value = value;
            document.querySelectorAll(`.star[data-question="${questionId}"]`).forEach(s => s.style.color = '#ccc'); // Reset stars
            for (let i = 0; i < value; i++) {
                document.querySelectorAll(`.star[data-question="${questionId}"]`)[i].style.color = '#FFD700'; // Highlight stars
            }
        });
    });
</script>

</body>
</html>
