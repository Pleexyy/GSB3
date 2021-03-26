<!doctype html>
<html lang="fr">

<head>
    <title>Historique de mes inscriptions</title>
    <!-- chargement des imports (ie: css) -->
    <?php $this->load->view('templates/import'); ?>
</head>

<body>

    <!-- Contenu de la page  -->
    <div class="wrapper d-flex align-items-stretch">
        <!-- chargement des menus / barre de navigation -->
        <?php
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/togglemenu');
        ?>

        <h2 class="mb-4">Historique de mes inscriptions</h2>

        <!-- vérifie l'existance de données avant de parcourir le tableau,
        dans le cas contraire, un message sera affiché -->
        <?php if (is_array($historique) && count($historique) > 0) { ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Thème</th>
                        <th scope="col">Date prestation</th>
                        <th scope="col">Durée</th>
                        <th scope="col">Horaire</th>
                        <th scope="col">Code Inscription</th>
                        <th scope="col">Id conférence</th>
                        <th scope="col">Code conférence</th>
                        <th scope="col">Gérer l'inscription</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    /* parcours de notre tableau contenant l'historique des inscriptions aux conférences */
                    foreach ($historique as $unHistorique) { ?>
                        <form id="desinscription" method="POST" action="<?php echo base_url(); ?>index.php/Visiteur/removeInscription">
                            <?php
                            echo "<tr>";
                            echo "<th scope=\"row\">$i</th>";
                            echo "<td>" . $unHistorique->theme . "</td>";
                            echo "<td>" . $unHistorique->datep . "</td>";
                            echo "<td>" . $unHistorique->duree . "</td>";
                            echo "<td>" . $unHistorique->horaire . "</td>";
                            echo "<td>" . $unHistorique->codeinscription . "</td>";
                            echo "<td>" . $unHistorique->idconference . "</td>";
                            echo "<td>" . $unHistorique->codeconference . "</td>";
                            ?>
                            <td><input type="submit" class="btn-submit btn btn-primary" value="Se désinscrire"></td>
                            <input type="hidden" name="codec" value="<?php echo $unHistorique->codeconference; ?>">
                            <input type="hidden" name="idconference" value="<?php echo $unHistorique->idconference; ?>">
                        </form>
                    <?php
                        echo "</tr>";
                        $i += 1;
                    }
                    ?>
                </tbody>
            </table>

            <script>
                /* alerte qui demande confirmation de désinscription */
                $('.btn-submit').on('click', function(e) {
                    e.preventDefault();
                    var form = document.getElementById("desinscription");
                    swal.fire({
                        title: "Confirmer la désinscription ?",
                        showCancelButton: true,
                        cancelButtonText: "Annuler",
                        cancelButtonColor: "#dc3545",
                        confirmButtonColor: "#28a745",
                        confirmButtonText: "Je me désinscris",
                        reverseButtons: true
                    }).then(function(result) {
                        if (result.value === true) {
                            form.submit();
                        }
                    });
                });
            </script>

        <?php } else { ?>
            <p>Vous n'êtes inscrit à aucune conférence, <a href='<?php echo base_url() . 'index.php/visiteur/inscription' ?>'>cliquez-ici</a> pour participer aux conférences disponibles.</p>
        <?php } ?>
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

        $(function() {
            $('#inscription-button').click(function() {
                $("#inscription").load("<?php echo site_url('accueil/inscription') ?>");
            })
        })
    </script>

</body>

</html>