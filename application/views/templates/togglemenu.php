<!-- Contenu de la page  -->
<div id="content" class="p-4 p-md-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>

            <div id="navbarSupportedContent">
                <ul style="list-style: none;">
                    <li class="nav-item active">
                        <button id="deconnexion" class="btn btn-primary nav-link">Déconnexion</button>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <script>
        /* alerte qui demande confirmation de déconnexion */
        $('#deconnexion').on('click', function() {
            swal.fire({
                title: "Confirmer la déconnexion ?",
                showCancelButton: true,
                cancelButtonText: "Annuler",
                cancelButtonColor: "#dc3545",
                confirmButtonColor: "#28a745",
                confirmButtonText: "Déconnexion",
                reverseButtons: true
            }).then(function(result) {
                if (result.value === true) {
                    window.location = '<?php echo site_url('/connexion/deconnecter'); ?>';
                }
            });
        });
    </script>