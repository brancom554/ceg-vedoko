<?php

if (!defined('BASEPATH')) { exit('No direct script access allowed'); }
/**
 * Description de Auth
 * 
 * Cette classe permet de verifie les 
 */
class Auth_lib {

    // Instance de Controlleur
    private $CI;

    /**
     * Default constructor
     */
    public function __construct() {
        //Recuperation de l'instance du controlleur qui initialise la classe
        // On n'a besoin de ca pour acceder a donnee des autres classe comme model, session et autre..
        $this->CI = & get_instance();
        $this->CI->load->library('session');
    }

    /*
     * Role: verifie si l'utilisateur est logger
     *       sinon renvoit a la plage de login
     *@return boolean si l'utilisateur s'est logger
     */
    
    public function isLoggedIn(){
        if(!$this->CI->session->userdata('logged_in')){ 
            //redirige vers la page de connection
            redirect(base_url());    
            return false ;
        }
        return true;
    }
   
    /**
     * Role: Verifie si l'utilisateur connecté a la permission requise
     * @param string $operation
     * @return boolean
     */
    public function isAllowed($operation) {
       $permissions = $this->CI->session->userdata('permissions');
        if(empty($permissions)) return false;
        if(in_array($operation, $permissions)){
           return true;
        }
        return false;
    }
    
    /**
     * Role: Verifie si l'utilisateur connecte est un administrateur
     * @return boolean
     */
    public function isAdmin(){
        if($this->CI->session->userdata('isAdmin')== 1){
           return true;
        }
        return false;
    }
    

    /**
     * Role: Verifie si l'utilisateur connecté a la permission requise 
     * sinon renvoi a la page de non acces
     * @param string $operation
     * @return boolean
     */
    public function checkIfOperationIsAllowed($operation) {
        //Verifie si un utilisateur est connecte
        $this->isLoggedIn();
        if (!$this->isAllowed($operation)) {
            //redirige a la page de
            redirect('forbidden' , 'refresh');
        }
    }
    
    /**
     * Crypte un mot de passe avec un algorithme asymetrique
     * @param string $password
     * @return string
     */
    public function crypt($password){
        return sha1($password);
    }
}
