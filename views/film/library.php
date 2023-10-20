<h2>Liste des films :</h2>
<div class="btn">
    <a href='/add' class="btn-add">Ajouter +</a>
</div>
<div class="film-view">
    <table>
        <thead>
            <tr>
                <th>Nom du film</th>
                <th>Producteur</th>
                <th>Synopsis</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($films as $film): ?>
                <tr>
                    <td><?= $film['title'] ?></td>
                    <td><?= $film['producer'] ?></td>
                    <td><?= $film['synopsis'] ?></td>
                    <td><a class="btn-up" href="/update?id=<?= $film['id'] ?>">Modifier</a></td>
                    <td><a class="btn-dl" href="delete?id=<?= $film['id'] ?>">Supprimer</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

 <!-- <a href='/logout'>Déconnecter</a>
 < ?php echo $_SESSION['username'];?> -->