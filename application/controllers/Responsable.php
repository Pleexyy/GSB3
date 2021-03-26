<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<body>
    <?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class Responsable extends CI_Controller
    {
        public function index()
        {
            /* vérification d'existance de variable de session pour pouvoir accéder à la page */
            if ($this->session->userdata('identifiant') == '') {
                redirect('connexion');
            }

            /* interdit l'accès à la page si c'est un visiteur qui est connecté */
            if ($this->session->userdata('role') == "visiteur") {
                redirect('visiteur/index');
            }

            $this->load->helper('url');

            $this->load->database();
            $this->load->model('modele');

            $this->load->view('responsable');
        }
        public function statistiques()
        {
            /* vérification d'existance de variable de session pour pouvoir accéder à la page */
            if ($this->session->userdata('identifiant') == '') {
                redirect('connexion');
            }

            /* interdit l'accès à la page si c'est un visiteur qui est connecté */
            if ($this->session->userdata('role') == "visiteur") {
                redirect('visiteur/index');
            }

            $this->load->helper('url');

            $this->load->database();
            $this->load->model('modele');

            /* récupère les résultats de nos fonctions dans des tableaux */
            $data['prestations'] = $this->modele->getPrestations($this->session->id);
            $data['nbconf'] = $this->modele->getNbConferences();
            $data['nbpresta'] = $this->modele->getNbPresta();
            $data['confpluspresta'] = $this->modele->getConfPlusPresta();
            $data['confmoinspresta'] = $this->modele->getConfMoinsPresta();
            $data['maxparticipant'] = $this->modele->getMaxParticipants();
            $data['minparticipant'] = $this->modele->getMinParticipants();

            /* charge la vue contenant les statistiques, avec les données passées en paramètre */
            $this->load->view('statistiques', $data);
        }

        public function pdf()
        {
            /* vérification d'existance de variable de session pour pouvoir accéder à la page */
            if ($this->session->userdata('identifiant') == '') {
                redirect('connexion');
            }

            /* interdit l'accès à la page si c'est un visiteur qui est connecté */
            if ($this->session->userdata('role') == "visiteur") {
                redirect('visiteur/index');
            }

            $this->load->helper('url');

            $this->load->database();
            $this->load->model('modele');

            /* récupère les résultats de nos fonctions dans des tableaux */

            $data['prestations'] = $this->modele->getPrestations($this->session->id);
            $data['nbconf'] = $this->modele->getNbConferences();
            $data['nbpresta'] = $this->modele->getNbPresta();
            $data['confpluspresta'] = $this->modele->getConfPlusPresta();
            $data['confmoinspresta'] = $this->modele->getConfMoinsPresta();
            $data['maxparticipant'] = $this->modele->getMaxParticipants();
            $data['minparticipant'] = $this->modele->getMinParticipants();

            /* chargement du pdf avec les données passées en paramètre */
            $this->load->view('pdf', $data);
        }
    }

    ?>
</body>