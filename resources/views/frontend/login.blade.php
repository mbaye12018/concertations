<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme de Concertation</title>
    <link href="https://fonts.googleapis.com/css?family=Abel|Playfair+Display|Merriweather" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(to right, #f3f9f1, #e2f2e2);
            font-family: 'Abel', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            transition: background-color 0.5s;
        }

        form {
            width: 90%;
            max-width: 450px;
            border-radius: 15px;
            margin: 2% auto;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 20px;
            background-color: #ffffff;
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header img {
            max-width: 100%;
            height: 180px;
            margin-bottom: 10px;
        }

        header h2 {
            font-size: 2.5rem;
            font-family: 'Playfair Display', serif;
            color: #4A4A4A;
            margin-bottom: 5px;
        }

        header p {
            letter-spacing: 0.05em;
            color: #5E6472;
        }

        .input-item {
            display: flex;
            align-items: center;
            background: #f9f9f9;
            padding: 10px;
            border-radius: 5px 0 0 5px;
            margin-bottom: 15px;
        }

        .input-item i {
            margin-right: 10px;
            color: green;
        }

        input {
            width: 100%;
            height: 50px;
            padding: 10px;
            font-size: 16px;
            color: #5E6472;
            border: 1px solid #ccc;
            border-radius: 0 5px 5px 0;
            transition: border-color 0.2s;
        }

        input:focus {
            border-color: #A4D65E;
            outline: none;
        }

        .eye-icon {
            cursor: pointer;
            margin-left: -35px;
            position: relative;
            z-index: 1;
        }

        .animal-icon {
            display: none;
            font-size: 1.5rem;
            color: #A4D65E;
            margin-left: 10px;
        }

        button {
            display: block;
            width: 100%;
            height: 50px;
            margin: 10% 0 5%;
            padding: 0 20px;
            background: green;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.2s, transform 0.2s;
        }

        button:hover {
            background: green;
            transform: translateY(-2px);
        }

        .other {
            text-align: center;
        }

        @media (max-width: 600px) {
            header h2 {
                font-size: 2rem;
            }

            button {
                height: 45px;
                font-size: 14px;
            }
        }
        .papa{
            height: 200px;
        }
        .h2{
            color: green;
            font-size: 25px;
        }
    </style>
</head>
<body>
<form method="POST" action="{{ route('login.submit') }}">
    @csrf <!-- Protection CSRF -->
    <header>
        <img src="assets/img/logg.png" alt="">
        <h2 class="h2">Connectez-vous</h2>
    </header>

    <div class="field-set">
        <div class="input-item">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <input type="text" name="username" placeholder="Nom d'utilisateur" required> <!-- Changer email en username -->
        </div>

        <div class="input-item">
            <i class="fa fa-key" aria-hidden="true"></i>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required>
            <i class="fas fa-eye eye-icon" id="togglePassword" aria-hidden="true"></i>
        </div>
        
        <button type="submit" class="log-in">Se Connecter</button>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const animal = document.getElementById('animal');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            animal.style.display = type === 'password' ? 'block' : 'none';
        });

        passwordInput.addEventListener('focus', () => {
            animal.style.display = 'block';
        });

        passwordInput.addEventListener('blur', () => {
            animal.style.display = 'none';
        });
    </script>
</body>
</html>
