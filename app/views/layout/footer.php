<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page with Sticky Footer</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }
        .footer a {
            color: white;
            text-decoration: none;
        }
        .footer a:hover {
            color: #007bff;
            text-decoration: none;
        }
        .footer .social-icons a {
            margin-right: 10px;
        }
    </style>
</head>
<body><div class="container">
    <div class="row">
        <div class="col-md-4">
            <h5>O nas</h5>
            <p>Jesteśmy firmą dedykowaną dostarczaniu najlepszych usług i produktów. Naszym celem jest poprawa Twojego życia dzięki naszym rozwiązaniom.</p>
        </div>
        <div class="col-md-4">
            <h5>Nawigacja</h5>
            <ul class="list-unstyled">
                <li><a href="#">Strona główna</a></li>
                <li><a href="#">O nas</a></li>
                <li><a href="#">Usługi</a></li>
                <li><a href="#">Kontakt</a></li>
            </ul>
        </div>
        <div class="col-md-4">
            <h5>Śledź nas</h5>
            <div class="social-icons">
                <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 text-center">
            <p class="mb-0">&copy; 2024 Twoja Firma. Wszelkie prawa zastrzeżone.</p>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
