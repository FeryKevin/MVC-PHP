<div class="container">
    <a href='/logout'>deconnter</a>
    <a href='/add'>ajouter</a>
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
            <a href="/update?id=<?= $film['id'] ?>">Modifier</a>
            <a href="delete?id=<?= $film['id'] ?>">Supprimer</a>
        <?php endforeach; ?>
    </div>
</div>
