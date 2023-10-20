<h1>Modifier un film</h1>
<?= isset($message) ? "<p class='error'>".$message."</p>" : "" ?>
<form action="/update?id=<?= $film->getId() ?>" method="post">
    <div class="form-crud">
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" value="<?=$film->getTitle()?>">
        <label for="producer">Réalisateur :</label>
        <input type="text" id="producer" name="producer" value="<?=$film->getProducer()?>">
        <label for="synopsis">Synopsis :</label>
        <input type="text" id="synopsis" name="synopsis" value="<?=$film->getSynopsis()?>">
        <label for="type">Type :</label>
        <input type="text" id="type" name="type" value="<?=$film->getType()?>">
        <label for="scenarist">Scénariste :</label>
        <input type="text" id="scenarist" name="scenarist" value="<?=$film->getScenarist()?>">
        <label for="productionCompany">Société de production :</label>
        <input type="text" id="productionCompany" name="productionCompany" value="<?=$film->getProductionCompany()?>">
        <label for="releaseYear">Anné de sortie :</label>
        <input type="text" id="releaseYear" name="releaseYear" value="<?=$film->getReleaseYear()?>">
    </div>
    <div class="btn">
        <button type="submit" name="submit"class="btn-add">Modifier</button>
    </div>
    <div class="btn2">
        <a href='/library' class="btn-retour">Retour</a>
    </div>
</form>
