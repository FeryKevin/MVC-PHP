<div class="container">
    <a href='/logout'>deconnter</a>
    <h2>Liste des film : </h2>
    <div class="row">
        <?php foreach ($films as $film): ?>
            <p><?= $film['title'] ?></p>
            <p><?= $film['producer'] ?></p>
            <p><?= $film['synopsis'] ?></p>
            <p><?= $film['type'] ?></p>
            <p><?= $film['scenarist'] ?></p>
            <p><?= $film['productionCompany'] ?></p>
            <p><?= $film['releaseYear'] ?></p>
            <a href="delete/<?= $film['id'] ?>">Supprimer</a>
        <?php endforeach; ?>
    </div>
</div>
