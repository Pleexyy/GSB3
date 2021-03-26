<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<body>
    <?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class Visiteur extends CI_Controller
    {

        public function index()
        {

            /* vérification d'existance de variable de session pour pouvoir accéder à la page */
            if ($this->session->userdata('identifiant') == '') {
                redirect('connexion');
            }

            /* interdit l'accès à la page si c'est un responsable qui est connecté */
            if ($this->session->userdata('role') == "responsable") {
                redirect('responsable/index');
            }

            $this->load->helper('url');

            $this->load->database();
            $this->load->model('modele');

            $this->load->view('visiteur');
        }
        public function inscription()
        {

            /* vérification d'existance de variable de session pour pouvoir accéder à la page */
            if ($this->session->userdata('identifiant') == '') {
                redirect('connexion');
            }

            /* interdit l'accès à la page si c'est un responsable qui est connecté */
            if ($this->session->userdata('role') == "responsable") {
                redirect('responsable/index');
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

            $data['estinscrit'] = $this->modele->estInscrit($this->session->id);

            $this->load->view('inscription', $data);
        }
        public function confirmInscription()
        {
            /* vérification d'existance de variable de session pour pouvoir accéder à la page */
            if ($this->session->userdata('identifiant') == '') {
                redirect('connexion');
            }

            /* interdit l'accès à la page si c'est un responsable qui est connecté */
            if ($this->session->userdata('role') == "responsable") {
                redirect('responsable/index');
            }

            $this->load->helper('url');

            $this->load->database();
            $this->load->model('modele');

            /* exécute la fonction du modèle permettant l'inscription à une conférence */
            $this->modele->inscrit($_POST['idconference'], $_POST['codec'], $this->session->id);

            redirect(base_url() . 'index.php/visiteur/inscription');
        }

        public function removeInscription()
        {
            /* vérification d'existance de variable de session pour pouvoir accéder à la page */
            if ($this->session->userdata('identifiant') == '') {
                redirect('connexion');
            }

            /* interdit l'accès à la page si c'est un responsable qui est connecté */
            if ($this->session->userdata('role') == "responsable") {
                redirect('responsable/index');
            }

            $this->load->helper('url');

            $this->load->database();
            $this->load->model('modele');

            /* exécute la fonction du modèle permettant la désinscription à une conférence */
            $this->modele->desinscrire($_POST['idconference'], $_POST['codec'], $this->session->id);

            redirect(base_url() . 'index.php/visiteur/historique');
        }

        public function historique()
        {
            /* vérification d'existance de variable de session pour pouvoir accéder à la page */
            if ($this->session->userdata('identifiant') == '') {
                redirect('connexion');
            }

            /* interdit l'accès à la page si c'est un responsable qui est connecté */
            if ($this->session->userdata('role') == "responsable") {
                redirect('responsable/index');
            }

            $this->load->helper('url');

            $this->load->database();
            $this->load->model('modele');

            /* exécute la fonction du modèle qui récupère les inscriptions pour l'utilisateur en question */
            $data['historique'] = $this->modele->historique($this->session->id);

            $this->load->view('historique', $data);
        }
    }
    ?>
</body>