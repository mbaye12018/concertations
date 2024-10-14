<div class="accordion-form">
    <h2>Questionnaire sur le Service Public</h2>
    <div class="accordion">
        <button class="accordion-button">Section 1 : Perception du Service Public Actuel</button>
        <div class="accordion-content">
            <label>Qualité des services :</label>
            <input type="radio" name="qualite_services" value="1" required> Très insatisfait(e)
            <input type="radio" name="qualite_services" value="5"> Très satisfait(e)
            <textarea name="points_forts_faiblesses" rows="3" required placeholder="Points forts et faiblesses"></textarea>
        </div>
    </div>

    <div class="accordion">
        <button class="accordion-button">Section 2 : Attentes et Priorités pour la Réforme</button>
        <div class="accordion-content">
            <textarea name="priorites_reformes" rows="3" required placeholder="Trois principales réformes"></textarea>
        </div>
    </div>

    <div class="accordion">
        <button class="accordion-button">Section 3 : Implication des Citoyens</button>
        <div class="accordion-content">
            <textarea name="participation_citoyenne" rows="3" required placeholder="Comment associer les citoyens ?"></textarea>
        </div>
    </div>

    <button type="submit" class="btn">Soumettre</button>
</div>


<style>
    .accordion-form {
    max-width: 600px;
    margin: auto;
    padding: 20px;
    background: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.accordion-button {
    background-color: #007BFF;
    color: white;
    cursor: pointer;
    padding: 10px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    transition: background-color 0.3s;
}

.accordion-button:hover {
    background-color: #0056b3;
}

.accordion-content {
    display: none;
    padding: 15px;
    background-color: #fff;
    border: 1px solid #ddd;
    margin-top: 5px;
}

.btn {
    margin-top: 20px;
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
}

.btn:hover {
    background-color: #0056b3;
}

</style>

<script>
    const accordions = document.querySelectorAll('.accordion-button');

accordions.forEach(acc => {
    acc.addEventListener('click', function() {
        this.classList.toggle('active');
        const content = this.nextElementSibling;
        if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
        }
    });
});

</script>