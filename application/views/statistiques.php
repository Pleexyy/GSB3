<!doctype html>
<html lang="fr">

<head>
  <title>Statistiques</title>
  <!-- chargement des imports (ie: css) -->
  <?php $this->load->view('templates/import'); ?>
</head>

<body>

  <!-- Contenu de la page  -->
  <div class="wrapper d-flex align-items-stretch">
    <!-- chargement des menus / barre de navigation -->
    <?php
    $this->load->view('templates/r_sidebar');
    $this->load->view('templates/togglemenu');
    ?>

    <h4 class="mb-4">Liste des prestations</h4>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Date</th>
          <th scope="col">Thème</th>
          <th scope="col">Horaire</th>
          <th scope="col">Animateur</th>
          <th scope="col">Code salle</th>
          <th scope="col">Places</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        /* parcours de notre tableau contenant la liste des conférences */
        foreach ($prestations as $unePrestation) {
          echo "<tr>";
          echo "<th scope=\"row\">$i</th>";
          echo "<td>" . $unePrestation->datep . "</td>";
          echo "<td>" . $unePrestation->theme . "</td>";
          echo "<td>" . $unePrestation->horaire . "</td>";
          echo "<td>" . $unePrestation->nom . "</td>";
          echo "<td>" . $unePrestation->codesalle . "</td>";
          echo "<td>" . $unePrestation->nbplace . "</td>";
          echo "</tr>";
          $i += 1;
        }
        ?>
      </tbody>
    </table>

    </br>
    <h4 class="mb-4">Informations générales</h4>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">nombre de conférences</th>
          <th scope="col">nombre de prestation</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        echo "<tr>";
        foreach ($nbconf as $unNbconf) {
          echo "<td>" . $unNbconf . "</td>";
        }
        foreach ($nbpresta as $unNbpresta) {
          echo "<td>" . $unNbpresta . "</td>";
        }
        echo "</tr>";
        $i += 1;
        ?>
      </tbody>
    </table>

    </br>

    <h4 class="mb-4">Conférence avec le plus de prestations</h4>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">code</th>
          <th scope="col">thème</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($confpluspresta as $laConfpluspresta) {
          echo "<td>" . $laConfpluspresta . "</td>";
        }
        ?>
      </tbody>
    </table>

    </br>

    <h4 class="mb-4">Conférence avec le moins de prestations</h4>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">code</th>
          <th scope="col">thème</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($confmoinspresta as $laConfmoinspresta) {
          echo "<td>" . $laConfmoinspresta . "</td>";
        }
        ?>
      </tbody>
    </table>

    </br>

    <h4 class="mb-4">Prestation avec le plus de participants</h4>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">horaire</th>
          <th scope="col">duree</th>
          <th scope="col">places restantes</th>
          <th scope="col">date</th>
          <th scope="col">salle</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($maxparticipant as $lemaxparticipant) {
          echo "<td>" . $lemaxparticipant . "</td>";
        }
        ?>
      </tbody>
    </table>

    </br>

    <h4 class="mb-4">Prestation avec le moins de participants</h4>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">horaire</th>
          <th scope="col">duree</th>
          <th scope="col">places restantes</th>
          <th scope="col">date</th>
          <th scope="col">salle</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($minparticipant as $leminparticipant) {
          echo "<td>" . $leminparticipant . "</td>";
        }
        ?>
      </tbody>
    </table>

    </br>

    <a href="pdf" class="btn btn-primary" role="button" target="_blank">Générer un PDF</a>

  </div>
  </div>

  <!-- fonction permettant le repliement et dépliement du menu latéral -->
  <script>
    (function($) {

      "use strict";

      var fullHeight = function() {

        $('.js-fullheight').css('height', $(window).height());
        $(window).resize(function() {
          $('.js-fullheight').css('height', $(window).height());
        });

      };
      fullHeight();

      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
      });

    })(jQuery);
  </script>
</body>

</html>