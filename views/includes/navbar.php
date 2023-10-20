<nav class="navbar">
    <div class="user-info">
        <?= isset ($_SESSION['username']) ? "<p>".$_SESSION['username']."</p>" : "" ?>      
    </div>
    <a href='/logout' class="btn-dl">Déconnexion</a>
</nav>
