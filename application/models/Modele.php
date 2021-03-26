<?php
class modele extends CI_Model
{
    /**
     * récupère le rôle de l'utilisateur connecté
     *
     * @param string $login login de l'utilisateur
     * @param string $mdp mot de passe de l'utilisateur
     * 
     * @return row retourne les informations concernant l'utilisateur qui vient de se connecter
     */
    function getRole($login, $mdp)
    {
        $array = array('login' => $login, 'mdp' => md5($mdp));
        $this->db->select('*');
        $this->db->from('utilisateur');
        $this->db->where($array);
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * récupère les prestations
     * @param string $idutilisateur identifiant de l'utilisateur
     * @return query retourne les prestations
     */
    function getPrestations($idutilisateur)
    {
        $sql = "SELECT C.id, C.codec, datep, theme, horaire, nom, codesalle, nbplace
        from conference C, theme T, animateur A
        where C.codeC = T.codec
        AND C.code = A.code
        AND nbplace > 0 
        AND DATEDIFF(NOW(),datep) < 0
        AND C.id not in (select idconference from inscrits where idutilisateur='$idutilisateur');";
        $query = $this->db->query($sql);
        return $query->result();
    }

    /**
     * récupère le nombre de conférences
     * 
     * @return row retourne le nombre de conférences
     */
    function getNbConferences()
    {
        $this->db->select('count(*)');
        $this->db->from('theme');
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * récupère le nombre de prestations
     * 
     * @return row retourne le nombre de prestations
     */
    function getNbPresta()
    {
        $this->db->select('count(*)');
        $this->db->from('conference');
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * récupère la conférence avec le plus de prestations
     * 
     * @return row retourne la conférence avec le plus de prestations
     */
    function getConfPlusPresta()
    {
        $sql = "select T.codec, theme
        from conference C, theme T 
        where C.codec = T.codec 
        group by id order by count(*) desc limit 1";
        $query = $this->db->query($sql);
        $row = $query->row();
        return $row;
    }

    /**
     * récupère la conférence avec le moins de prestations
     * 
     * @return row retourne la conférence avec le moins de prestations
     */
    function getConfMoinsPresta()
    {
        $sql = "select theme.codec, theme
        from theme left 
        outer join conference on theme.codec=conference.codec 
	 	group by theme.codec desc limit 1;
        ";
        $query = $this->db->query($sql);
        $row = $query->row();
        return $row;
    }

    /**
     * récupère la conférence avec le plus de participants
     * 
     * @return row retourne la conférence avec le plus de participants
     */
    function getMaxParticipants()
    {
        $sql = "select id, horaire, duree, nbplace, datep, codesalle from conference where nbplace = (select max(nbplace) from conference)";
        $query = $this->db->query($sql);
        $row = $query->row();
        return $row;
    }

    /**
     * récupère la conférence avec le moins de participants
     * 
     * @return row retourne la conférence avec le moins de participants
     */
    function getMinParticipants()
    {
        $sql = "select id, horaire, duree, nbplace, datep, codesalle from conference where nbplace = (select min(nbplace) from conference)";
        $query = $this->db->query($sql);
        $row = $query->row();
        return $row;
    }

    /**
     * mnsère les données pour l'inscription d'un utilisateur à une conférence
     * met à jour le nombre de places disponibles
     * @param string $idconference id de la conférence
     * @param string $codec code de la conférence
     * @param string $idutilisateur id de l'utilisateur
     */
    function inscrit($idconference, $codec, $idutilisateur)
    {
        $sql = "insert into inscrits (idconference, codeconference, idutilisateur, estinscrit) values ($idconference, $codec, '$idutilisateur', TRUE)";
        $this->db->query($sql);

        $sql2 = "update conference set nbplace = nbplace - 1 where id = '$idconference';";
        $this->db->query($sql2);
    }

    /**
     * supprime les données de l'inscription d'un utilisateur à une conférence
     * met à jour le nombre de places disponibles
     * @param string $idconference id de la conférence
     * @param string $codec code de la conférence
     * @param string $idutilisateur id de l'utilisateur
     */
    function desinscrire($idconference, $codec, $idutilisateur)
    {
        $sql = "delete from inscrits where codeconference = '$codec' and idutilisateur = '$idutilisateur' and idconference = '$idconference'";
        $this->db->query($sql);

        $sql2 = "update conference set nbplace = nbplace + 1 where id = '$idconference';";
        $this->db->query($sql2);
    }

    /**
     * récupère les codes d'inscription pour l'utilisateur
     * @param string $idutilisateur id de l'utilisateur
     * @return row retourne les codes d'inscription de l'utilisateur
     */
    function estInscrit($idutilisateur)
    {
        $this->db->select('estinscrit');
        $this->db->from('inscrits');
        $this->db->where('idutilisateur', $idutilisateur);
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * récupère l'historique des participations aux conférences pour l'utilisateur
     * @param string $idutilisateur id de l'utilisateur
     * @return row retourne les conférences auxquelles a participé l'utilisateur
     */
    function historique($idutilisateur)
    {
        $sql = "select datep, duree, horaire, theme, codeinscription, idconference, codeconference 
        from inscrits, theme, conference 
        where theme.codec = inscrits.codeconference and conference.codec = theme.codec 
        and conference.id = inscrits.idconference and conference.codec = inscrits.codeconference 
        and idutilisateur = '$idutilisateur';";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
