<h1>Ajouter un film</h1>
<?= isset($message) ? "<p class='error'>".$message."</p>" : "" ?>
<form action="/add" method="post">
    <div class="form-crud">
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" required>
        <label for="producer">Réalisateur :</label>
        <input type="text" id="producer" name="producer" required>
        <label for="synopsis">Synopsis :</label>
        <input type="text" id="synopsis" name="synopsis" required>
        <label for="type">Type :</label>
        <input type="text" id="type" name="type" required>
        <label for="scenarist">Scénariste :</label>
        <input type="text" id="scenarist" name="scenarist" required>
        <label for="productionCompany">Société de production :</label>
        <input type="text" id="productionCompany" name="productionCompany" required>
        <label for="releaseYear">Anné de sortie :</label>
        <input type="text" id="releaseYear" name="releaseYear" required>
    </div>
    <div class="btn">
        <button type="submit" class="btn-add">Ajouter</button>
    </div>
    <div class="btn2">
        <a href='/library' class="btn-retour">Retour</a>
    </div>
</form>
