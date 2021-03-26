<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>

<nav id="sidebar">
    <div class="p-4 pt-5">
        <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(https://cdn.discordapp.com/attachments/502860120653561910/818767652787847218/test.png);"></a>
        <ul class="list-unstyled components mb-5">
            <li class="<?= ($activePage == 'index') ? 'active' : ''; ?>"><a href="index">Accueil</a></li>
            <li class="<?= ($activePage == 'inscription') ? 'active' : ''; ?>"><a id="inscription-button" href="inscription">Inscription aux conférences</a></li>
            <li class="<?= ($activePage == 'historique') ? 'active' : ''; ?>"><a id="historique" href="historique">Historique des participations</a></li>
        </ul>
        <div class="footer">
            <p>
                Inscrivez-vous à des conférences depuis cette page <a href="" target="_blank"><?php echo $_SESSION["prenom"] . " " . $_SESSION["nom"]; ?></a>
            </p>
        </div>
    </div>
</nav>