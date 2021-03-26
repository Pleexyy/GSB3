<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Connexion extends CI_Controller
{
    public function index()
    {
        $this->load->library('form_validation');

        /* paramètrage des règles sur nos identifiants de connexion */
        $this->form_validation->set_rules('identifiant', 'Identifiant', 'required');
        $this->form_validation->set_rules('mdp', 'Mdp', 'required');

        $this->load->view('login');

        $this->load->helper('url');

        $this->load->database();
        $this->load->model('modele');

        // condition de connexion valide
        if ($this->form_validation->run()) {
            $data['prestations'] = $this->modele->getPrestations($this->session->id);
            $data['nbconf'] = $this->modele->getNbConferences();
            $data['nbpresta'] = $this->modele->getNbPresta();
            $data['confpluspresta'] = $this->modele->getConfPlusPresta();
            $data['confmoinspresta'] = $this->modele->getConfMoinsPresta();
            $data['maxparticipant'] = $this->modele->getMaxParticipants();
            $data['minparticipant'] = $this->modele->getMinParticipants();

            $identifiant = $this->input->post('identifiant');
            $mdp = $this->input->post('mdp');

            /* création de la variable de session */
            $id = $this->input->post('identifiant');
            $this->session->set_userdata(array('identifiant' => $id));

            $data['role'] = $this->modele->getRole($identifiant, $mdp);

            /* test de validité du role de l'utilisateur qui se connecte */
            if (!empty($data['role']->role)) {
                $this->session->set_userdata(array('prenom' => $data['role']->prenom));
                $this->session->set_userdata(array('nom' => $data['role']->nom));
                $this->session->set_userdata(array('role' => $data['role']->role));
                $this->session->set_userdata(array('id' => $data['role']->id));

                if ($data['role']->role == "visiteur") {
                    redirect('visiteur/index');
                } else {
                    redirect('responsable/index');
                }
            }
        }
    }
    /* appelle notre fonction de déconnexion, dans notre modèle */
    public function deconnecter()
    {
        // suppression des variables de session
        $this->session->unset_userdata('identifiant');
        $this->session->unset_userdata('prenom');
        $this->session->unset_userdata('nom');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('id');

        /* redirection sur la page de connexion */
        redirect(base_url());
    }
}
?>