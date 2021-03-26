<html>

<head>
    <title>GSB Conférences - Connexion</title>
    <!-- chargement des imports pour la page de connexion  -->
    <?php $this->load->view('templates/import_login'); ?>
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center align-items-center h-100">
            <div class="col-lg-4 col-md-5 col-sm-offset-3">
                <?php echo form_open('Connexion'); ?>
                <fieldset>
                    <h1>Connexion</h1> <br>
                    <p>Heureux de vous revoir ! Connectez-vous pour accéder à la gestion des conférences.</p>
                    <p>Avez-vous <a href="">oublié votre mot de passe ?</a> </p>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <?php
                            echo form_input(['class' => 'form-control', 'name' => 'identifiant', 'id' => 'identifiant', 'placeholder' => 'Identifiant', 'required' => ""]);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <?php
                            echo form_password(['class' => 'form-control', 'name' => 'mdp', 'id' => 'mdp', 'placeholder' => 'Mot de passe', 'required' => ""]);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <?php echo form_submit(array('id' => 'submit', 'value' => 'connexion', 'class' => 'btn btn-primary')); ?>
                        </div>
                    </div>
                </fieldset>
                <?php form_close() ?>
            </div>
        </div>
    </div>

</body>

</html>