<?php
include '/var/www/html/controllers/user/loggedUser.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FriendSpace</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <style>
        #searchResults {
            position: absolute;
            top: 350px; /* Możesz dostosować tę wartość w zależności od wysokości paska nawigacyjnego */
            left: 0;
            right: 0;
            z-index: 999;
            background-color: white;
            border: 1px solid #ccc;
            display: none;
        }
        .post-card {
            margin-bottom: 10px;
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
        <?php
            include '/var/www/html/db.php';
            session_start();

            try {
                $stmt = $conn->prepare("SELECT posts.id, posts.content, 
                                        CONCAT('http://localhost:8080/', posts.image_path) AS image_path, 
                                        posts.created_at, users.username, 
                                        (SELECT COUNT(*) FROM favorites WHERE favorites.post_id = posts.id) AS like_count 
                                        FROM posts 
                                        JOIN users ON posts.user_id = users.id 
                                        ORDER BY posts.created_at DESC");
                $stmt->execute();

                $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Błąd: " . $e->getMessage();
                $posts = [];
            }
        ?>
        
        <div class="col-md-6">
            <?php include '/var/www/html/views/posts/addPost.php'; ?>

            <input type="text" id="search" class="form-control" placeholder="Szukaj postów po treści...">
            <div id="searchResults">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="resultsContainer"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <h5><br>Wszystkie Posty</h5>
            <?php include '/var/www/html/views/posts/allPosts.php'; ?>
        </div>
        
        <div class="col-md-3 sidebar">
            <?php include '/var/www/html/views/friends/friendsList.php'; ?>
        </div>
    </div>
</div>

<?php include '/var/www/html/views/layout/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
function expandImage(src) {
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

    modal.appendChild(modalContent);
    modal.appendChild(closeBtn);

    document.body.appendChild(modal);

    modal.style.display = "block";
}

document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById("search");
    var searchResults = document.getElementById("searchResults");
    var resultsContainer = document.getElementById("resultsContainer");

    var posts = <?php echo json_encode($posts); ?>;

    searchInput.addEventListener("input", function() {
        var searchText = this.value.trim().toLowerCase();

        if (searchText.length > 0) {
            // Filtruj wyniki
            var filteredPosts = posts.filter(function(post) {
                return post.content && post.content.toLowerCase().includes(searchText);
            });

            // Wyświetlaj tylko pierwsze 5 wyników
            var limitedPosts = filteredPosts.slice(0, 5);

            // Czyszczenie poprzednich wyników
            resultsContainer.innerHTML = '';

            // Dodawanie nowych wyników
            limitedPosts.forEach(function(post) {
                var postCard = document.createElement('div');
                postCard.className = 'post-card card mb-3';

                var cardBody = document.createElement('div');
                cardBody.className = 'card-body';

                var cardTitle = document.createElement('h5');
                cardTitle.className = 'card-title';
                cardTitle.textContent = post.username;

                var cardText = document.createElement('p');
                cardText.className = 'card-text';
                cardText.textContent = post.content;

                cardBody.appendChild(cardTitle);
                cardBody.appendChild(cardText);

                if (post.image_path) {
                    var cardImage = document.createElement('img');
                    cardImage.src = post.image_path;
                    cardImage.alt = 'Post Image';
                    cardImage.className = 'img-fluid mt-2';
                    cardBody.appendChild(cardImage);
                }

                var cardFooter = document.createElement('p');
                cardFooter.className = 'card-text';
                cardFooter.innerHTML = '<small class="text-muted">' + post.created_at + '</small>';

                var likeButton = document.createElement('button');
                likeButton.className = 'btn btn-primary like-button';
                likeButton.dataset.postId = post.id;
                likeButton.innerHTML = '<i class="fa-solid fa-thumbs-up"></i> Polub';

                var likeCount = document.createElement('span');
                likeCount.className = 'like-count';
                likeCount.textContent = post.like_count + ' Liczba polubień';

                cardBody.appendChild(cardFooter);
                cardBody.appendChild(likeButton);
                cardBody.appendChild(likeCount);

                postCard.appendChild(cardBody);
                resultsContainer.appendChild(postCard);
            });

            searchResults.style.display = "block";
        } else {
            searchResults.style.display = "none";
        }
    });
});
</script>
</body>
</html>
