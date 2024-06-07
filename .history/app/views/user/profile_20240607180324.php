<?php
include '/var/www/html/db.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>window.location.href = '/login.php';</script>";
    exit();
}

try {
    $currentUserId = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT username, email, created_at FROM users WHERE id = :currentUserId");
    $stmt->bindParam(':currentUserId', $currentUserId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Użytkownik nie znaleziony.";
        exit();
    }
} catch(PDOException $e) {
    echo "Błąd: " . $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/var/www/html/views/style/style.css">
    <style>
        body {
    font-family: 'Roboto', sans-serif;
    background-color: #f0f2f5 !important;
    margin: 0;
    padding: 0;
}
.nav-link {
    color: #fff !important;
}
.sidebar
{
    background-color: #fff;
    border-radius: 20px !important;
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    margin: 0 15px;
    padding: 20px;
    width: 75%; /* Zmniejszenie szerokości */
    margin-left: auto; 
    margin-right: auto; 
}
.content, .right-sidebar {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    margin: 0 15px;
    padding: 20px;
}
.card {
    margin-bottom: 20px;
    border:0px !important;
}
.card img {
    max-width: 100%;
    border-radius: 8px;
}
.footer {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    margin: 20px 15px;
    padding: 20px;
    text-align: center;
}
.col-md-6
{
    max-width: 100% !important;
    border:0px !important;
    
}/*Zdjęcie w tle */
.cover-photo {
    position: relative;
    width: 100%;
    height: 150px; /* Wysokość zdjęcia okładkowego */
    overflow: hidden;
    
}

.cover-photo img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

/* Zdjęcie główne */
.profile-picture-container {
    position: relative;
    margin-top: -30%; /* Przesunięcie profilu na zdjęcie okładkowe */
    text-align: center;
    border:0px !important;
}

.profile-picture {
    width: 100px; /* Rozmiar zdjęcia profilowego */
    height: 100px;
    overflow: hidden;
    display: inline-block;
}

.profile-picture img {
    width: 100%;
    height: auto;
}

.card-body {
    padding-top: 60px; /* Przestrzeń na zdjęcie profilowe */
    border: 0px !important;
}
/* Statystyki profilu */
.profile-stats {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
}

.profile-stats div {
    text-align: center;
}
.card-body h2
{
    text-align: center;
}
p.card-text 
{
    text-align: center;
    font-size: small;
    margin-top: -10px;
}
.col-md-3.sidebar {
    background-color: transparent;
    border: none;
    box-shadow: none;
    margin: 0;
    padding-left: 60px;
    text-align: center;
}
.button-container {
    display: flex;
    flex-direction: column;
    width: 100%; /* szerokość kontenera przycisków */
}

.custom-button {
    background-color: white; /* Brudniejszy biały */
    border: 0px solid #c0c0c0; /* Jaśniejszy niebieski dla obramowania */
    color: #000;
    padding: 5px 20px;
    padding-left:20px;
    margin: 2px 0;
    width: 100%;
    text-align: left;
    cursor: pointer;
    transition: background-color 0.4s ease;
    border-radius: 8px; /* Zaokrąglenie rogów */
    position: relative;
    overflow: hidden;
}

.custom-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 0;
    background-color: #5da6f5; /* Niebieski kolor tła przy najechaniu */
    transition: width 0.4s ease;
    z-index: 0;
    color:white;
    border-radius: 0 8px 8px 0;
}

.custom-button:hover::before {
    width: 5%;
    color:white;
}

.custom-button span {
    position: relative;
    z-index: 1;
}
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

.formularz
{
    background-color: #fff !important;
    border-radius: 20px !important;
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24) !important;
    margin: 0px !important;
    padding: 20px !important;
    margin-left: auto; 
    margin-right: auto; 
}
.row-mt-3, .col-md-6
{
    width:100% !important;

}
.post
{
    background-color: #fff !important;
    border-radius: 20px !important;
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24) !important;
    margin: 10px !important;
    padding: 20px !important;
    width:100%;
    
}
.col-md-9
{
    background-color: #fff !important;
    border-radius: 20px !important;
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24) !important;
    margin: 10px !important;
    padding: 20px !important;
    width:100%;
    
}
    </style>
</head>
<body>
<?php include '/var/www/html/views/layout/navbar.php'; ?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-3 sidebar">
            <?php include '/var/www/html/views/user/userInfo.php'; ?>
        </div>
        
        <div class="col-md-6">
            <h5>Dodaj Post</h5>
            <?php include '/var/www/html/views/posts/addPost.php'; ?>
            <h5>Wszystkie Posty</h5>
            <?php include '/var/www/html/views/posts/allPosts.php'; ?>
        </div>
        
        <div class="col-md-3 sidebar">
            <?php include '/var/www/html/views/friends/friendsList.php'; ?>
        </div>
    </div>
</div>

<footer class="footer mt-3">
    <p>&copy; 2023 SocialApp. Wszelkie prawa zastrzeżone.</p>
    <p><a href="#">O nas</a> | <a href="#">Pomoc</a> | <a href="#">Warunki</a> | <a href="#">Prywatność</a> | <a href="#">Ciasteczka</a> | <a href="#">Reklamy</a></p>
</footer>
<!--<script src="/scripts/buttonHover.js"></script>-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
