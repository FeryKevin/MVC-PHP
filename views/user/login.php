<h2>Connexion</h2>
<?= isset($message) ? "<p class='error'>".$message."</p>" : "" ?>
<form action="/login" method="post">
    <div class="form-crud">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
    </div>    
    <div class="btn">
        <button type="submit" class="btn-add">Connexion</button>
    </div>
    <div class="btn2">
        <a href='/signin' class="btn-retour">Inscription</a>
    </div>  
</form>
