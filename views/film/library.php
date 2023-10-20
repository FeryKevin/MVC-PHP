<h2>Liste des films :</h2>
<div class="btn">
    <a href='/add' class="btn-add">Ajouter +</a>
</div>
<div class="film-view">
    <table>
        <thead>
            <tr>
                <th>Nom du film</th>
                <th>Réalisateur</th>
                <th>Synopsis</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($films as $film): ?>
                <tr>
                    <td data-title='Nom du film'><?= $film['title'] ?></td>
                    <td data-title='Réalisateur'><?= $film['producer'] ?></td>
                    <td data-title='Synopsis'><?= $film['synopsis'] ?></td>
                    <td data-title='Modifier'><a class="btn-up" href="/update?id=<?= $film['id'] ?>">Modifier</a></td>
                    <td data-title='Supprimer'><a class="btn-dl" href="delete?id=<?= $film['id'] ?>">Supprimer</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
