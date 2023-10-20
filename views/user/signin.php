<h2>Inscription</h2>
<?= isset($message) ? "<p class='error'>".$message."</p>" : "" ?>
<form action="/signin" method="post">
    <div class="form-crud">
        <label for="username">Nom :</label>
        <input type="text" id="username" name="username" required>
        <label for="email">Email :</label>
        <input type="text" id="email" name="email" required>
        <label for="password">Mot de passe :</label>
        <input type="text" id="password" name="password" required>
    </div>    
    <div class="btn">
        <button type="submit" class="btn-add">Inscription</button>
    </div>
    <div class="btn2">
        <a href='/login' class="btn-retour">Connexion</a>
    </div>
</form>
