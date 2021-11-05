<?php

class Pages extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }


    public function index()
    {
        $members = $this->user_model->getmembersLimit(12);
        // var_dump($members);exit;
        $data['members'] = $members;
        $data['activemenu'] = "home";
        $this->load->view('template/header', $data);
        $this->load->view('pages/home',$data);
        $this->load->view('template/footer');
    }

    public function about()
    {
        $data['activemenu'] = "about";
        $this->load->view('template/header', $data);
        $this->load->view('pages/about');
        $this->load->view('template/footer');
    }

    public function search_member()
    {
        // var_dump($this->session->userdata());exit;
        $members = $this->user_model->getmembersLimit(12);
        // var_dump($members);exit;
        $data['members'] = $members;
        $data['activemenu'] = "search_member";
        $this->load->view('template/header', $data);
        $this->load->view('pages/search_member', $data);
        $this->load->view('template/footer');
    }

    public function contact()
    {
        $data['activemenu'] = "contact";
        $this->load->view('template/header', $data);
        $this->load->view('pages/contact');
        $this->load->view('template/footer');
    }

    public function signup()
    {
        $data['activemenu'] = "";
        $this->load->view('template/header', $data);
        $this->load->view('pages/signup');
        $this->load->view('template/footer');
    }
}
