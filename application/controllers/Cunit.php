<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cunit extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('lunit');
        $this->load->library('session');
        $this->load->model('Units');
        $this->auth->check_admin_auth();
    }

    // ================ by default create unit page load. =============
    public function index() {
        $content = $this->lunit->unit_add_form();
        $this->template->full_admin_html_view($content);
    }

//    ========== close index method ============
//    =========== unit add is start ====================
    public function insert_unit() {
        $unit_id = $this->auth->generator(15);
        $data = array(
            'unit_id' => $unit_id,
            'unit_name' => $this->input->post('unit_name'),
            'status' => 1
        );
        $result = $this->Units->insert_unit($data);

        if ($result == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));
            if (isset($_POST['add-customer'])) {
                redirect(base_url('Cunit/manage_unit'));
            } elseif (isset($_POST['add-customer-another'])) {
                redirect(base_url('Cunit'));
            }
        } else {
            $this->session->set_userdata(array('error_message' => display('already_inserted')));
            redirect(base_url('Cunit'));
        }
    }

//    =========== unit add is close ====================
//    =========== its for all unit record show start====================
    public function manage_unit() {
        $content = $this->lunit->unit_list();
        $this->template->full_admin_html_view($content);
    }

//    ========== its for all unit record show close ================
//    =========== its for unit edit form start ===============
    public function unit_update_form($unit_id) {
        $content = $this->lunit->unit_editable_data($unit_id);
        $this->template->full_admin_html_view($content);
    }

//    =========== its for unit edit form close ===============
//    =========== its for unit update start  ===============
    public function unit_update() {
        $this->load->model('Units');
        $unit_id = $this->input->post('unit_id');
        $data = array(
            'unit_name' => $this->input->post('unit_name'),
            'status' => $this->input->post('status'),
        );
        $this->Units->unit_update($data, $unit_id);
        $this->session->set_userdata(array('message' => display('successfully_added')));
        redirect(base_url('Cunit/manage_unit'));
    }

//    =========== its for unit update close ===============
//    =========== its for unit delete start ===============
    public function unit_delete($unit_id) {
        $this->Units->unit_delete($unit_id);
        $this->session->set_userdata(array('message' => display('successfully_delete')));
        redirect(base_url('Cunit/manage_unit'));
    }

//    =========== its for unit delete close ===============
//    //Insert category and upload
//    public function insert_category() {
//        $category_id = $this->auth->generator(15);
//
//        $data = array(
//            'category_id' => $category_id,
//            'category_name' => $this->input->post('category_name'),
//            'status' => 1
//        );
//
//        $result = $this->Categories->category_entry($data);
//
//        if ($result == TRUE) {
//            $this->session->set_userdata(array('message' => display('successfully_added')));
//            if (isset($_POST['add-customer'])) {
//                redirect(base_url('Ccategory/manage_category'));
//            } elseif (isset($_POST['add-customer-another'])) {
//                redirect(base_url('Ccategory'));
//            }
//        } else {
//            $this->session->set_userdata(array('error_message' => display('already_inserted')));
//            redirect(base_url('Ccategory'));
//        }
//    }
//
//    //Category Update Form
//    public function category_update_form($category_id) {
//        $content = $this->lcategory->category_edit_data($category_id);
//        $this->template->full_admin_html_view($content);
//    }
//
//    // Category Update
//    public function category_update() {
//        $this->load->model('Categories');
//        $category_id = $this->input->post('category_id');
//        $data = array(
//            'category_name' => $this->input->post('category_name'),
//            'status' => $this->input->post('status'),
//        );
//
//        $this->Categories->update_category($data, $category_id);
//        $this->session->set_userdata(array('message' => display('successfully_updated')));
//        redirect(base_url('Ccategory/manage_category'));
//    }
//
//    // Category delete
//    public function category_delete() {
//        $this->load->model('Categories');
//        $category_id = $_POST['category_id'];
//        $this->Categories->delete_category($category_id);
//        $this->session->set_userdata(array('message' => display('successfully_delete')));
//        return true;
//    }
}
