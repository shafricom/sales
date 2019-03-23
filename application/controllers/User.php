<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public $user_id;

    function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('lusers');
        $this->load->library('session');
        $this->load->model('Userm');
        $this->auth->check_admin_auth();

        if ($this->session->userdata('user_type') == '2') {
            $this->session->set_userdata(array('error_message' => display('you_are_not_access_this_part')));
            redirect('Admin_dashboard');
        }
    }

    #==============User page load============#

    public function index() {
        $content = $this->lusers->user_add_form();
        $this->template->full_admin_html_view($content);
    }

    #===============User Search Item===========#

    public function user_search_item() {
        $user_id = $this->input->post('user_id');
        $content = $this->lusers->user_search_item($user_id);
        $this->template->full_admin_html_view($content);
    }

    #================Manage User===============#

    public function manage_user() {
        $content = $this->lusers->user_list();
        $this->template->full_admin_html_view($content);
    }

    #==============Insert User==============#

    public function insert_user() {
        $data = array(
            'user_id' => $this->generator(15),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'password' => md5("gef" . $this->input->post('password')),
            'user_type' => $this->input->post('user_type'),
            'status' => 1
        );

        $this->lusers->insert_user($data);
        $this->session->set_userdata(array('message' => display('successfully_added')));
        if (isset($_POST['add-user'])) {
            redirect('User/manage_user');
        } elseif (isset($_POST['add-user-another'])) {
            redirect(base_url('User/manage_user'));
        }
    }

    #===============User update form================#

    public function user_update_form($user_id) {
        $user_id = $user_id;
        $content = $this->lusers->user_edit_data($user_id);
        $this->template->full_admin_html_view($content);
    }

    #===============User update===================#

    public function user_update() {
        $user_id = $this->input->post('user_id');
        $this->Userm->update_user($user_id);
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('User/manage_user'));
    }

    #============User delete===========#

    public function user_delete() {
        $user_id = $_POST['user_id'];
        $this->Userm->delete_user($user_id);
        $this->session->set_userdata(array('message' => display('successfully_delete')));
        return true;
    }

    // Random Id generator
    public function generator($lenth) {
        $number = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "N", "M", "O", "P", "Q", "R", "S", "U", "V", "T", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

        for ($i = 0; $i < $lenth; $i++) {
            $rand_value = rand(0, 61);
            $rand_number = $number["$rand_value"];

            if (empty($con)) {
                $con = $rand_number;
            } else {
                $con = "$con" . "$rand_number";
            }
        }
        return $con;
    }

}
