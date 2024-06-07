<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
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
        }
        .registration-form {
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .registration-form h2 {
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
        .registration-form p {
            margin-top: 20px;
            color: #666;
        }
        .registration-form a {
            color: #4b6cb7;
            text-decoration: none;
        }
        .registration-form a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="registration-form">
    <h2>Zarejestruj się</h2>
    <form action="/controllers/register/register.php" method="POST">
        <div class="form-group">
            <label for="username">Nazwa użytkownika</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Adres email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Zarejestruj się</button>
    </form>
    <div class="form-group mt-3">
        <p>Masz konto? <a href="/index.php">Zaloguj się</a></p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
