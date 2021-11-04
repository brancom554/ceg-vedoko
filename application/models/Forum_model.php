<?php

class Forum_model extends CI_Model
{


    private $table = 'forums';
    private $msg_tb = 'forum_messages';
    private $user_tb = 'users';
    private $user_forums_tb = 'user_forums';
    private $request_tb = 'forum_request';
    private $forum_tb = 'forums';


    public function checkForbyPromClass($prom, $classe)
    {
        $this->db->select($this->table . '.*');
        $this->db->where($this->table . '.promotion_id', $prom);
        $this->db->where($this->table . '.classe_id', $classe);
        return $this->db->get($this->table)->row_array();
    }

    public function createForum($data)
    {
        $this->db->insert($this->table, $data);
        $lastid = $this->db->insert_id();
        return $lastid;
    }

    public function getPromGroup($group = false)
    {
        $this->db->select($this->table . '.*');
        if ($group === false) {
            return $this->db->get($this->table)->result();
        } else {
            $this->db->where($this->table . '.forum_id', $group);
            return $this->db->get($this->table)->row_array();
        }
    }

    public function newmessag($data)
    {
        $this->db->insert($this->msg_tb, $data);
        return true;
    }

    function getForumMsg($forum)
    {
        $this->db->select($this->msg_tb . '.*');
        $this->db->select($this->user_tb . '.firstname as firstname,' . $this->user_tb . '.lastname as lastname,' . $this->user_tb . '.user_id as user_id,' . $this->user_tb . '.profil_picture');
        $this->db->join($this->user_tb, $this->user_tb . '.user_id = ' . $this->msg_tb . '.send_by_user_id');
        $this->db->where($this->msg_tb . '.forum_id', $forum);
        $this->db->order_by($this->msg_tb . '.message_id', 'ASC');
        return $this->db->get($this->msg_tb)->result();
    }


    public function newrequest($data)
    {
        $this->db->insert($this->request_tb, $data);
        return true;
    }

    public function getUserRequest($user)
    {
        // $this->db->select($this->request_tb.'.*');
        // $this->db->select(
        //     $this->table.'.forum_type as type, '
        //     .$this->table.'.creation_date_time, '
        //     .$this->table.'.forum_link'
        // );
        // $this->db->select($this->user_tb.'.lastname');
        // $this->db->join($this->user_tb, $this->user_tb.'.user_id = '.$this->user_forums_tb.'.created_by_user_id');
        // $this->db->join($this->table, $this->table.'.forum_id = '.$this->user_forums_tb.'.forum_id');
        // $this->db->where($this->user_forums_tb.'.invited_user_id', $user);
        // $this->db->get($this->user_forums_tb)->result();
        $this->db->select($this->request_tb . '.*, ' . $this->user_tb . '.firstname, ' . $this->user_tb . '.lastname, ' . $this->user_tb . '.profil_picture');
        $this->db->join($this->user_tb, $this->user_tb . ',user_id = ' . $this->request_tb . '.created_by');
        $this->db->join($this->forum_tb, $this->forum_tb . '.forum_id = ' . $this->request_tb . '.forum_id');
        $this->db->where($this->request_tb . '.invited_user', $user);
        $this->db->where($this->forum_tb . '.forum_link', null);
        return $this->db->get($this->request_tb)->result();
    }

    public function getUserRequestGroup($user)
    {
        $this->db->select($this->request_tb . '.*, ' . $this->user_tb . '.firstname, ' . $this->user_tb . '.lastname, ' . $this->user_tb . '.profil_picture');
        $this->db->join($this->user_tb, $this->user_tb . ',user_id = ' . $this->request_tb . '.created_by');
        $this->db->join($this->forum_tb, $this->forum_tb . '.forum_id = ' . $this->request_tb . '.forum_id');
        $this->db->where($this->request_tb . '.invited_user', $user);
        $this->db->where($this->table.'.forum_type', 'INDIVIDUAL');
        return $this->db->get($this->request_tb)->result();
    }

    public function updatelink($forum, $data)
    {
        $this->db->where($this->table . '.forum_id', $forum);
        $query =  $this->db->update($this->table, $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
