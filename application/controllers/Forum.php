<?php


class Forum extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('forum_model');
    }

    public function group_forum($group)
    {
        $this->auth_lib->isLoggedIn();
        $groupdata = $this->forum_model->getPromGroup($group);
        $data['activemenu'] = "profile";
        $data['active_class'] = "home";
        $data['groupdata'] = $groupdata;
        $this->load->view('template/header', $data);
        $this->load->view('forum/group_header', $data);
        $this->load->view('forum/group_home', $data);
        $this->load->view('forum/group_footer', $data);
        $this->load->view('template/footer');
    }

    public function group_members($group)
    {
        $this->auth_lib->isLoggedIn();
        $groupdata = $this->forum_model->getPromGroup($group);
        $data['activemenu'] = "profile";
        $data['active_class'] = "member";
        $data['groupdata'] = $groupdata;
        $this->load->view('template/header', $data);
        $this->load->view('forum/group_header', $data);
        $this->load->view('forum/group_member', $data);
        $this->load->view('forum/group_footer', $data);
        $this->load->view('template/footer');
    }


    public function newmsg()
    {
        // var_dump($this->input->post());
        // exit;
        $msgtext = $this->input->post('text');
        $forum_id = $this->input->post('forumid');
        $newmsgdata = array(
            "message_date" => date('Y-m-d H:i:s'),
            "message" => $msgtext,
            "send_by_user_id" => $this->session->userdata('id'),
            "forum_id" => $forum_id
        );
        $addmsg = $this->forum_model->newmessag($newmsgdata);
        if ($addmsg) {
            echo 'true||message envoyé';
            exit;
        } else {
            echo 'false||erreur survenue, veillez renvoyer';
            exit;
        }
    }


    public function promformmsg()
    {

        $forum_id = $_REQUEST['forumid'];
        $messages = $this->forum_model->getForumMsg($forum_id);

        $output = "";
        foreach ($messages as $message) {
            $output = $output . '
            <li class="groups activity_updategroups activity_update activity-item" id="activity-8980">
            <div class="activity-avatar">
                <a href="javascript:void(0)"> <img loading="lazy" src="' . base_url() . 'assets/avatar/avatar_male.png" class="avatar user-72-avatar avatar-90 photo" width="90" height="90" alt="Profile picture of ' . ucfirst($message->firstname) . ' ' . ucfirst($message->lastname) . '" /> </a>
            </div>
            <div class="activity-content">
                <div class="activity-header">
                    <p><a href="javascript:void(0)">' . ucfirst($message->firstname) . ' ' . ucfirst($message->lastname) . '</a>
                        <a href="javascript:void(0)" class="view activity-time-since bp-tooltip" data-bp-tooltip="View Discussion"><span class="time-since" data-livestamp="2021-10-07T12:54:29+0000">' . $message->message_date . '</span></a>
                    </p>
                </div>
                <div class="activity-inner">
                    <p>
                    ' . $message->message . '
                    </p>
                </div>
                <div class="activity-meta"></div>
            </div>
            <div class="activity-comments"></div>
        </li>
            ';
        }
        echo $output;
        exit;
    }


    public function sendrequest()
    {
        // print_r($this->session->userdata);exit;
        $inviteduser = $_REQUEST['user'];
        $newforumdata = array(
            "forum_type" => "INDIVIDUAL",
            "creation_date_time" => date('Y-m-d H:i:s')
        );
        $newforum = $this->forum_model->createForum($newforumdata);
        $request = array(
            "forum_id" => $newforum,
            "date_create" => date('Y-m-d H:i:s'),
            "invited_user" => $inviteduser,
            "created_by " => $this->session->userdata('id'),
            "active" => 1
        );
        $newrequest = $this->forum_model->newrequest($request);
        if($newrequest){
            echo 'ok';
            exit;
        }
        // print_r($newforum);exit;

    }


    public function generateLink(){
        $forum_link = base_url().'user/forum/group/home/'.$_REQUEST['forum'];
        $data = array(
            "forum_link" => $forum_link,
        );
        $updatelink = $this->forum_model->updatelink($_REQUEST['forum'], $data);
        if($updatelink){
            echo "ok||Demande acceptée";
            exit;
        }else{
            echo 'no||Erreur, veillez réessayer';
            exit;
        }
        // print_r($updatelink);exit;

    }
}
