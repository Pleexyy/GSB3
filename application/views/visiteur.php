<!doctype html>
<html lang="fr">

<head>
  <title>Accueil - visiteur</title>
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

    <h2 class="mb-4">Inscription aux conférences</h2>
    <p>Vous retrouverez sur cette page toutes les conférences disponibles à l'inscription</p>
    <p>Vous pouvez : </p>
    <span>- Consulter les conférences</span> </br>
    <span>- Vous inscrire aux conférences ayant encore des places disponibles</span>
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