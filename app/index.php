<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(90deg, #4b6cb7 0%, #182848 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            overflow: hidden;
        }

        .stars {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            background: transparent;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            box-shadow: 
                0 0 2px white,
                0 0 4px white,
                0 0 8px white;
            animation: fall 10s linear infinite;
        }

        @keyframes fall {
            to {
                transform: translateY(100vh);
                opacity: 0;
            }
        }

        .login-form {
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            position: relative;
            z-index: 1;
        }
        .login-form h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #182848;
        }
        .form-group {
            position: relative;
            margin-bottom: 20px;
        }
        .form-group label {
            position: absolute;
            top: -10px;
            left: 20px;
            background: #fff;
            padding: 0 5px;
            color: #4b6cb7;
            font-size: 12px;
        }
        .form-control {
            border-radius: 30px;
            border: 1px solid #4b6cb7;
            padding: 10px 20px;
        }
        .btn-primary {
            border-radius: 30px;
            padding: 10px 20px;
            background: #4b6cb7;
            border: none;
            font-weight: bold;
            transition: background 0.3s;
        }
        .btn-primary:hover {
            background: #3a4c8b;
        }
        .login-form p {
            margin-top: 20px;
            color: #666;
        }
        .login-form a {
            color: #4b6cb7;
            text-decoration: none;
        }
        .login-form a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="stars"></div>
<div class="login-form">
    <h2>Zaloguj się</h2>
    <form action="/controllers/register/login.php" method="POST">
        <div class="form-group">
            <label for="email">Adres email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Zaloguj się</button>
        <p>Nie jesteś zarejestrowany? <a href="/views/register.php">Załóż konto</a></p>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function createStars() {
        const starContainer = document.querySelector('.stars');
        for (let i = 0; i < 100; i++) {
            const star = document.createElement('div');
            star.className = 'star';
            star.style.left = `${Math.random() * 100}vw`;
            star.style.top = `${Math.random() * -100}vh`;
            star.style.animationDuration = `${Math.random() * 5 + 5}s`;
            starContainer.appendChild(star);
        }
    }
    createStars();
</script>
</body>
</html>
