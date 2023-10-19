<div>
    <h2>Connexion</h2>
    <div>
        <form action="" method="post">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <p><?php if(isset($message)){echo ($message);}?></p>

            <button type="submit">Connexion</button>
            
        </form>
    </div>
</div>
