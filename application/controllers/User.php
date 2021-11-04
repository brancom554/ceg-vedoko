<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('forum_model');
    }

    public function login_page()
    {
    }

    public function admin_login()
    {
    }

    public function signin_page($referal, $rand)
    {

        $referaldata = $this->user_model->getUser($referal);
        // var_dump($referaldata);
        // exit;
        $data['activemenu'] = "signin";
        $classes = $this->user_model->getClasses();
        $prom = $this->user_model->getPromotion();
        //  print_r($classes);die;
        $data['classes'] = $classes;
        $data['proms'] = $prom;
        $data['ref'] = $referaldata;
        $this->load->view('template/header', $data);
        $this->load->view('users/singin', $data);
        $this->load->view('template/footer');
    }

    public function user_profil()
    {
        $this->auth_lib->isLoggedIn();
        $requests = $this->forum_model->getUserRequest($this->session->userdata('id'));
        // var_dump($requests);exit;
        $data['requests'] = $requests;
        $data['activemenu'] = "profile";
        $data['active_class'] = "activity";
        $this->load->view('template/header', $data);
        $this->load->view('users/user_profil_head', $data);
        $this->load->view('users/user_profil_activity');
        $this->load->view('users/user_profil_foot');
        $this->load->view('template/footer');
    }

    public function user_profil_profile()
    {
        $this->auth_lib->isLoggedIn();
        // print_r($this->session->userdata());
        // exit;
        $data['activemenu'] = "profile";
        $data['active_class'] = "profile";
        $this->load->view('template/header', $data);
        $this->load->view('users/user_profil_head');
        $this->load->view('users/user_profil_profile');
        $this->load->view('users/user_profil_foot');
        $this->load->view('template/footer');
    }

    public function user_profil_group()
    {

        $this->auth_lib->isLoggedIn();
        $group = $this->session->userdata('forum_promotion_id');
        $prom_forum = $this->forum_model->getPromGroup($group);
        $chatgroup = $this->forum_model->getUserRequestGroup($this->session->userdata('id'));
        $data['activemenu'] = "profile";
        $data['active_class'] = "group";
        $data['promgroup'] = $prom_forum;
        $data['chatgroups'] = $chatgroup;
        // print_r($chatgroup);
        // exit();
        $this->load->view('template/header', $data);
        $this->load->view('users/user_profil_head', $data);
        $this->load->view('users/user_profil_group', $data);
        $this->load->view('users/user_profil_foot');
        $this->load->view('template/footer');
    }

    public function user_profil_forum()
    {
        $this->auth_lib->isLoggedIn();
        $data['activemenu'] = "profile";
        $data['active_class'] = "forum";
        $this->load->view('template/header', $data);
        $this->load->view('users/user_profil_head', $data);
        $this->load->view('users/user_profil_forum');
        $this->load->view('users/user_profil_foot');
        $this->load->view('template/footer');
    }

    public function user_profil_media()
    {
        $this->auth_lib->isLoggedIn();
        $data['activemenu'] = "profile";
        $data['active_class'] = "media";
        $this->load->view('template/header', $data);
        $this->load->view('users/user_profil_head', $data);
        $this->load->view('users/user_profil_media');
        $this->load->view('users/user_profil_foot');
        $this->load->view('template/footer');
    }

    public function user_detail($user)
    {
        $data['activemenu'] = "user_detail";
        $userdata = $this->user_model->getUser($user);
        // var_dump($userdata);exit;
        $data['user'] = $userdata;
        $this->load->view('template/header', $data);
        $this->load->view('users/user_detail');
        $this->load->view('template/footer');
    }

    public function sear_member()
    {
        // var_dump($_REQUEST);
        $key = $_REQUEST['key'];
        $seardata = $this->user_model->searchuser($key);
        
        $output = "";
        foreach ($seardata as $members) {
            $imgsrc = ($members->profil_picture) ? 'uploads/profil_im/'.$members->profil_picture : 'assets/avatar/avatar_male.png';
            $output = $output . '
            <li class="gp-post-item even">
                                <div class="gp-loop-content gp-no-cover-image">
                                    <div class="gp-bp-col-avatar">
                                        <a href="'.base_url().'user/detail/'.$members->user_id.'"> <span class="gp-bp-hover-effect"></span> <img alt src="'.base_url().$imgsrc.'" class="avatar avatar-90 photo" width="90" height="90" />
                                            <div class="gp-user-offline"></div>
                                        </a>
                                    </div>
                                    <div class="gp-loop-title"> <a href="'.base_url().'user/detail/'.$members->user_id.'">'.ucfirst($members->firstname).' '.ucfirst($members->lastname).'</a></div>
                                    <div class="gp-loop-meta"> <span class="activity" data-livestamp="2018-07-02T00:15:57+0000">Active 3 years, 3 months ago</span></div>
                                    <div class="gp-bp-col-action"></div>
                                </div>
                            </li>
            ';
        }
        echo $output; 
        exit;
    }
}
