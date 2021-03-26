<!doctype html>
<html lang="fr">

<head>
  <title>Inscription aux conférences</title>
  <!-- chargement des imports (ie: css) -->
  <?php $this->load->view('templates/import'); ?>
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <!-- chargement des menus / barre de navigation -->
    <?php
    $this->load->view('templates/v_sidebar');
    $this->load->view('templates/togglemenu');
    ?>

    <h2 class="mb-4">Liste des prestations</h2>
    <!-- vérifie l'existance de données avant de parcourir le tableau,
        dans le cas contraire, un message sera affiché -->
    <?php if (is_array($prestations) && count($prestations) > 0) { ?>
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
            <th scope="col">inscription</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          /* parcours de notre tableau contenant la liste des conférences */
          foreach ($prestations as $unePrestation) {
          ?>
            <form id="inscription" method="POST" action="<?php echo base_url(); ?>index.php/Visiteur/confirmInscription">
              <?php
              echo "<tr>";
              echo "<th scope=\"row\">$i</th>";
              echo "<td>" . $unePrestation->datep . "</td>";
              echo "<td>" . $unePrestation->theme . "</td>";
              echo "<td>" . $unePrestation->horaire . "</td>";
              echo "<td>" . $unePrestation->nom . "</td>";
              echo "<td>" . $unePrestation->codesalle . "</td>";
              echo "<td>" . $unePrestation->nbplace . "</td>";
              ?>
              <td><input type="submit" class="btn-submit btn btn-primary" value="S'inscrire"></td>
              <input type="hidden" name="codec" value="<?php echo $unePrestation->codec; ?>">
              <input type="hidden" name="idconference" value="<?php echo $unePrestation->id; ?>">
            </form>
          <?php
            echo "</tr>";
            $i += 1;
          }
          ?>
        </tbody>
      </table>

    <?php } else { ?>
      <p>Aucunes conférences n'est actuellement disponible.</p>
    <?php } ?>

    <script>
      /* alerte qui demande confirmation d'inscription */
      $('.btn-submit').on('click', function(e) {
        e.preventDefault();
        var form = document.getElementById("inscription");
        swal.fire({
          title: "Confirmer l'inscription ?",
          showCancelButton: true,
          cancelButtonText: "Annuler",
          cancelButtonColor: "#dc3545",
          confirmButtonColor: "#28a745",
          confirmButtonText: "Je m'inscris",
          reverseButtons: true
        }).then(function(result) {
          if (result.value === true) {
            form.submit();
          }
        });
      });
    </script>

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

      $(function() {
        $('#inscription-button').click(function() {
          $("#inscription").load("<?php echo site_url('accueil/inscription') ?>");
        })
      })
    </script>
</body>

</html>