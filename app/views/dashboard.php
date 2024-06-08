<?php
include '/var/www/html/controllers/user/loggedUser.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FriendSpace </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    
</head>
<body>
<?php include '/var/www/html/views/layout/navbar.php'; ?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-3 sidebar">
            <?php include '/var/www/html/views/user/userInfo.php'; ?>
        </div>
        
        <div class="col-md-6">
            <br>
            <?php include '/var/www/html/views/posts/addPost.php'; ?>
            <h5>Wszystkie Posty</h5>
            <?php include '/var/www/html/views/posts/allPosts.php'; ?>
        </div>
        
        <div class="col-md-3 sidebar">
            <?php include '/var/www/html/views/friends/friendsList.php'; ?>
        </div>
    </div>
</div>

<?php
include '/var/www/html/views/layout/footer.php';
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    function expandImage(src) {
    // Tworzenie elementów modal
    var modal = document.createElement("div");
    modal.classList.add("modal");

    var modalContent = document.createElement("img");
    modalContent.classList.add("modal-content");
    modalContent.src = src;

    var closeBtn = document.createElement("span");
    closeBtn.classList.add("close");
    closeBtn.innerHTML = "&times;";
    closeBtn.onclick = function() {
        document.body.removeChild(modal);
    };

    // Dodanie elementów do modal
    modal.appendChild(modalContent);
    modal.appendChild(closeBtn);

    // Dodanie modal do dokumentu
    document.body.appendChild(modal);

    // Wyświetlenie modal
    modal.style.display = "block";
}
</script>
</body>
</html>
