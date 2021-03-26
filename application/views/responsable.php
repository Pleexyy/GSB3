<!doctype html>
<html lang="fr">

<head>
  <title>Accueil - responsable</title>
  <!-- chargement des imports (ie: css) -->
  <?php $this->load->view('templates/import'); ?>
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <!-- chargement des menus / barre de navigation -->
    <?php
    $this->load->view('templates/r_sidebar');
    $this->load->view('templates/togglemenu');
    ?>

    <h2 class="mb-4">Gestion des conférences</h2>
    <p>Vous retrouverez sur cette page toutes les statistiques des diffentes conférences tel que : </p>

    <span>- le nombre de conférences</span> </br>
    <span>- le nombre de prestations</span> </br>
    <span>- la conférence avec le plus de prestations</span> </br>
    <span>- la conférence avec le moins de prestations</span> </br>
    <span>- la prestation avec le plus de participants</span> </br>
    <span>- la prestation avec le moins de participants</span> </br> </br>

    <p> Vous pouvez également retrouvez toutes les statistiques au format pdf afin de les conserver ou de les imprimer.</p>

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