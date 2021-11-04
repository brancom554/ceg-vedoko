<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('forum_model');
    }

    public function login()
    {
        // var_dump($_REQUEST);
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['password'];

        if (empty($email) || empty($pass)) {
            echo "false||Veillez remplir tous les champs";
            exit;
        } else {
            $chechuserexist = $this->user_model->getUser_byEmail($email);
            if ($chechuserexist) {
                $checkuser = $this->user_model->validCredentials($email, $pass);
                // var_dump($checkuser);
                // exit;
                if ($checkuser) {
                    echo "true||Connexion établie";
                    exit;
                } else {
                    echo 'false||Erreur lors de la connexion, veillez reesayer';
                    exit;
                }
            } else {
                echo "false||Ce utilisateur n'existe pas, veillez vous connecter";
                exit;
            }
        }
    }

    public function signup()
    {
        // var_dump($this->input->post());
        // exit;
        $lastname = $this->input->post('lastname');
        $firstname = $this->input->post('firstname');
        $phone = $this->input->post('phone');
        $gender = $this->input->post('gender');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password_conf = $this->input->post('password_conf');
        $prom = $this->input->post('proom');
        $classe = $this->input->post('userclasse');
        $ref_id = $this->input->post('ref_id');

        $lastuser = $this->user_model->getLastUserByRef($ref_id);
        // print_r($lastuser);exit;



        if (empty($lastname) || empty($firstname) || empty($phone) || empty($gender) || empty($email) || empty($password) || empty($password_conf) || empty($prom) || empty($classe)) {
            echo "false||Veillez remplir tous les champs obligatoires";
            exit;
        } else if ($password !=  $password_conf) {
            echo "false||Les Mots de passe ne correspondent pas";
            exit;
        } else {
            $checkuser = $this->user_model->getUser_byEmail($email);
            if ($checkuser) {
                echo "false||Ce compte existe déja, veillez réinitialiser votre mot de passe pour acceder à votre compte";
                exit;
            } else {

                $checkforum = $this->forum_model->checkForbyPromClass($prom, $classe);
                if ($checkforum) {
                    
                    $forumid = $checkforum['forum_id'];
                } else {
                    $classdata = $this->user_model->getClasses($classe);
                    $promdata = $this->user_model->getPromotion($prom);
                    

                    $forumdata = array(
                        'forum_name' => $classdata['class_code'] . ' - Prom : ' . $promdata['promotion_name'],
                        'forum_type' => "group",
                        'creation_date_time' => date('Y-m-d H:i:s'),
                        'promotion_id' => $prom,
                        'classe_id' => $classe
                    );
                    // var_dump($forumdata);
                    // exit;
                    $forumid = $this->forum_model->createForum($forumdata);
                }

                $userdata = array(
                    "firstname" => $firstname,
                    "lastname" => $lastname,
                    "phone_number" => $phone,
                    "gender" => $gender,
                    "email" => $email,
                    "password" => password_hash($password, PASSWORD_DEFAULT)
                );

                $insertUser = $this->user_model->setUser($userdata);
                if ($insertUser) {
                    // $lastuser = 
                    $rand = rand();
                    $link = base_url().'user/subscribe/referal/'.$insertUser.'/'.$rand;
                    $userPref = array(
                        "referral_id" => $lastuser['user_id'],
                        "user_id" => $insertUser,
                        "forum_promotion_id" => $forumid,
                        "promotion_id" => $prom,
                        "classe_id" => $classe,
                        "active" => 1,
                        "referral_link" =>$link,
                        "netword_order" => $lastuser['netword_order'] + 1
                    );
                    $insertUserPref = $this->user_model->setUserPref($userPref);
                    if ($insertUserPref) {
                        echo "true||Votre compte a été bien crée";
                        exit;
                    }
                }
            }
            // var_dump($checkuser);
            // die;

        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function forgetPassword()
    {
    }

    /**
     * Genere un mot de passe aleatoire
     * @param int $length 
     * @return string password
     */
    public function randomPassword($length)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }
}
