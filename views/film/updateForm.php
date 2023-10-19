<div>
    <form action="/update?id=<?= $film->getId() ?>" method="post">
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" value="<?=$film->getTitle()?>">

        <label for="producer">Producteur :</label>
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

        <button type="submit" name="submit">Modifier</button>

        <a href='/library'>retour</a>
    </form>
</div>
