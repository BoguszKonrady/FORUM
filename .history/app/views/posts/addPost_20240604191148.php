<div class="card mb-3">
                    <div class="card-body">
                        <form action="/addPost.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <textarea class="form-control" name="content" rows="3" placeholder="Co masz na myśli?"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="document.getElementById('uploadImage').click()">Dodaj zdjęcie <i class="fa-solid fa-image"></i></button>
                                <input type="file" name="image" id="uploadImage" style="display: none;">
                                <button type="button" class="btn btn-outline-secondary btn-sm">Dodaj lokalizację <i class="fa-solid fa-location-dot"></i></button>
                                <button type="submit" class="btn btn-primary btn-sm btn-submit">Opublikuj <i class="fa-solid fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>