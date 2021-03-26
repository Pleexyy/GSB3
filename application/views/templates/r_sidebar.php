<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>

<nav id="sidebar">
  <div class="p-4 pt-5">
    <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(https://cdn.discordapp.com/attachments/502860120653561910/818767652787847218/test.png);"></a>
    <ul class="list-unstyled components mb-5">
      <li class="<?= ($activePage == 'index') ? 'active' : ''; ?>"><a href="index">Accueil</a></li>
      <li class="<?= ($activePage == 'statistiques') ? 'active' : ''; ?>"><a id="stat-button" href="statistiques">Statistiques</a></li>
    </ul>
    <div class="footer">
      <p>
        Gérez toutes les conférences depuis cette page <a href="" target="_blank"><?php echo $_SESSION["prenom"] . " " . $_SESSION["nom"]; ?></a>
      </p>
    </div>

  </div>
</nav>