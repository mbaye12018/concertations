<!-- sector-feedback.html -->
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Avis par secteur</title>

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Styling for the page */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f7fc;
    }

    .container {
      max-width: 800px;
      margin: 50px auto;
      padding: 30px;
      background-color: #fff;
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    .form-group label {
      font-weight: bold;
    }

    .btn-primary {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      width: 100%;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>

  <div class="container">
    <h2>Donner un avis par secteur</h2>
    <form action="/submit-sector-feedback" method="POST">
      <div class="form-group">
        <label for="sector">Sélectionnez un secteur :</label>
        <select id="sector" name="sector" class="form-control" required>
          <option value="Service Client">Service Client</option>
          <option value="Assistance Technique">Assistance Technique</option>
          <option value="Accueil">Accueil</option>
          <option value="Produits">Produits</option>
        </select>
      </div>
      <div class="form-group">
        <label for="sector-feedback">Votre avis sur ce secteur :</label>
        <textarea id="sector-feedback" name="sector-feedback" class="form-control" rows="4" placeholder="Exprimez votre avis sur ce secteur..." required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Soumettre mon avis</button>
    </form>
  </div>

</body>

</html>
