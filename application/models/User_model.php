<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description User_model
 *
 * @author Moctar OSSENI <osneine@gmail.com>
 */

class User_model extends CI_Model
{

    // Constante relative a la suppression logique d'enregistrement
    const ENREG_ACTIVE = 1;
    const ENREG_SUPPRIME = 0;

    // Constante relative a la suppression logique d'enregistrement
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    // Nom de la table
    private $table = 'users';

    private $table_pref = 'user_preferences';

    private $table_class = 'classes';

    private $table_prom = 'promotions';

    /**
     * Constructeur par defaut 
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function select_join()
    {
        $this->db->select($this->table . '.*');
        $this->db->select($this->table_pref . '.referral_id	as referral, ' . $this->table_pref . '.referral_link as referral_link, ' . $this->table_pref . '.birth_date	as birth_date, ' . $this->table_pref . '.father_id as father,
        ' . $this->table_pref . '.is_job_needed as is_job_needed, ' . $this->table_pref . '.is_employee as is_employee,' . $this->table_pref . '.forum_promotion_id as forum_promotion_id, ' . $this->table_pref . '.forum_general_id as forum_general_id, ' . $this->table_pref . '.activity_sector_id as activity_sector_id, 
        ' . $this->table_pref . '.promotion_id as promotion_id');
        $this->db->join($this->table_pref, $this->table . '.user_id = ' . $this->table_pref . '.user_id');
        $this->db->where($this->table_pref . '.active', self::ENREG_ACTIVE);
    }

    /**
     * Role: Verifie si le login et le mot de passe sont corrects 
     * @params: string $login, $password
     * @return: bool
     */
    public function validCredentials($email, $password)
    {

        $user = $this->getUser_byEmail($email);
        // var_dump(password_verify($password, $user['password']));exit;
        if (password_verify($password, $user['password'])) {
            // Charge les informations de l'utilisateur en session
            $this->loadSessionData($user['user_id']);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Role: Charge les informations d'un utilisateur en session
     * @param int $id 
     */
    public function loadSessionData($id)
    {
        //Recuperation des information de l'utilisateur et ses permissions
        $user = $this->getUser($id);
        //Chargement en session des donnees de l'utilisateur
        $session_data = array(
            'id' => $id,
            'lastname' => $user['lastname'],
            'firstname' => $user['firstname'],
            'phone_number' => $user['phone_number'],
            'email' => $user['email'],
            'gender' => $user['gender'],
            'profil_picture' => $user['profil_picture'],
            'coverture_picture' => $user['coverture_picture'],
            'referral_id' => $user['referral'],
            'referral_link' => $user['referral_link'],
            'birth_date' => $user['birth_date'],
            'father' => $user['father'],
            'is_job_needed' => $user['is_job_needed'],
            'is_employee' => $user['is_employee'],
            'forum_promotion_id' => $user['forum_promotion_id'],
            'forum_general_id' => $user['forum_general_id'],
            'activity_sector_id' => $user['activity_sector_id'],
            'promotion_id' => $user['promotion_id'],
            'logged_in' => true
        );
        $this->session->set_userdata($session_data);
    }

    /**
     * Retourne la liste de tous les utilisateurs ou un utilisateur par son id 
     * @param int $id
     * @return bool
     */
    public function getUser($id = FALSE)
    {
        $this->select_join();
        if ($id === FALSE) {
            $query = $this->db->get($this->table);
            return $query->result();
        }
        $query = $this->db->get_where($this->table, array($this->table . '.user_id' => $id));
        return $query->row_array();
    }

    /**
     * Role: Recupere un utilisateur par son login
     * @param string $login
     * @return array
     */
    public function getUser_byLogin($login)
    {
        $this->select_join();
        $query = $this->db->get_where($this->table, array($this->table . '.login' => $login));
        return $query->row_array();
    }

    /**
     * Role: Recupere un utilisateur par son email
     * @param string $email
     * @return array
     */
    public function getUser_byEmail($email)
    {
        $this->select_join();
        $query = $this->db->get_where($this->table, array($this->table . '.email' => $email));
        // $this->db->where($this->table . '.active', self::ENREG_ACTIVE);
        return $query->row_array();
    }

    /**
     * Role: Recupere le mot de passe d'un utilisateur
     * @param int $id
     * @return array
     */
    public function getUserPassword($id)
    {
        $this->db->select('password');
        $this->db->where($this->table . '.id', $id);
        $this->db->where($this->table . '.active', self::ENREG_ACTIVE);
        $query = $this->db->get($this->table);
        $result = $query->row_array();
        return $result['password'];
    }


    /**
     * Compte le nombre d;utilisateur du systeme
     * @return int
     */
    public function countAll()
    {
        //        $this->db->where($this->table .'.active', self::ENREG_ACTIVE);
        $this->db->where($this->table . '.active', self::ENREG_ACTIVE);
        return $this->db->count_all_results($this->table);
    }

    /**
     * Retourne la numero de l'enregistrement suivant
     * @return int
     */
    public function getNextNumero()
    {
        return generateNumero($this->table, 'id');
    }

    /**
     * Role : Insert un utilisateur dans la base de donnees
     * @return bool
     */
    public function setUser($data)
    {
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }


    public function setUserPref($data)
    {
        return $this->db->insert($this->table_pref, $data);
    }

    /**
     * Role: Modifie les informations de l'utilisateur dans la base de données
     * @param int $id
     * @return bool 
     */
    public function updateUserInfos($id)
    {
        $data = array(
            'id' => $id,
            'nom' =>  $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'sexe' => $this->input->post('sexe'),
            'email' => $this->input->post('email'),
            'telephone' => $this->input->post('telephone'),
            'idGroupe' => $this->input->post('idGroupe'),
            'ou' => $this->input->user_agent(),
            'usermodification' => $this->session->userdata('id'),
            'modificationdate' => date('Y-m-d H:i:s')
        );
        if ($this->input->post('image')) {
            $data['image'] = $this->input->post('image');
            $this->session->set_userdata('image', $this->input->post('image'));
        }
        $params['id'] = $id;
        return $this->db->update($this->table, $data, $params);
    }

    /**
     * Role: Modifie l'etat du compte d'utilisateur dans la base de données
     * @param int $id
     * @return bool 
     */
    public function updateUserState($id)
    {
        $data = array(
            'etat' => $this->input->post('etat')
        );
        $params['id'] = $id;
        return $this->db->update($this->table, $data, $params);
    }

    /**
     * Role: Modifie le mot de passe de l'utilisateur dans la base de données
     * @param int $id
     * @return bool 
     */
    public function updateUserPassword($id)
    {
        $data = array(
            'password' =>  $this->input->post('password'),
            'ou' => $this->input->user_agent(),
            'usermodification' => $this->session->userdata('id'),
            'modificationdate' => date('Y-m-d H:i:s')
        );
        $params['id'] = $id;
        return $this->db->update($this->table, $data, $params);
    }

    /**
     * Role: Modifie le mot de passe de l'utilisateur dans la base de données
     * @param int $id
     * @return bool 
     */
    public function updateToken($id)
    {
        $data = array(
            'token' =>  $this->input->post('token'),
            'ou' => $this->input->user_agent(),
            'usermodification' => $this->session->userdata('id'),
            'modificationdate' => date('Y-m-d H:i:s')
        );
        $params['id'] = $id;
        return $this->db->update($this->table, $data, $params);
    }

    /**
     * Role: Supprime un utilisateur dans la base donnees
     * @param int $id
     * @return bool
     */
    public function deleteUser($id)
    {
        $data = array(
            'active' => self::ENREG_SUPPRIME,
            'ou' => $this->input->user_agent(),
            'usermodification' => $this->session->userdata('id'),
            'modificationdate' => date('Y-m-d H:i:s')
        );

        $this->db->where($this->table . '.id', $id);
        return $this->db->update($this->table, $data);
    }



    public function getClasses($classe_id = false)
    {
        $this->db->select($this->table_class . '.*');
        if ($classe_id === false) {
            return $this->db->get($this->table_class)->result();
        } else {
            $this->db->where($this->table_class . '.classe_id', $classe_id);
            return $this->db->get($this->table_class)->row_array();
        }
    }

    function getPromotion($prom = false)
    {
        $this->db->select($this->table_prom . '.*');
        if ($prom === false) {
            return $this->db->get($this->table_prom)->result();
        } else {
            $this->db->where($this->table_prom . '.promotion_id', $prom);
            return $this->db->get($this->table_prom)->row_array();
        }
    }

    function searchuser($key){
        $this->select_join();
        $this->db->like($this->table.'.firstname', $key);
        $this->db->or_like($this->table.'.lastname', $key);
        return $this->db->get($this->table)->result();
    }

    public function getLastUserByRef($ref_id){
        $this->db->select($this->table_pref.'.*');
        $this->db->where($this->table_pref.'.referral_id', $ref_id);
        $this->db->order_by($this->table_pref.'.netword_order','DESC');
        $this->db->limit(1);
        return $this->db->get($this->table_pref)->row_array();
    }


}
