<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cretrun_m extends CI_Controller {

    public $menu;

    function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('lreturn');
        $this->load->library('linvoice');
        $this->load->library('session');
        $this->auth->check_admin_auth();
    }

    public function index() {

        $content = $this->lreturn->return_form();

        $this->template->full_admin_html_view($content);
    }

    // invoice return form
    public function invoice_return_form() {
        $invoice_id = $this->input->post('invoice_id');
        $query = $this->db->select('invoice_id')->from('invoice')->where('invoice_id', $invoice_id)->get();


        if ($query->num_rows() == 0) {
            $this->session->set_userdata(array('error_message' => display('please_input_correct_invoice_id')));
            redirect('Cretrun_m');
        }
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lreturn');
        $content = $CI->lreturn->invoice_return_data($invoice_id);
        $this->template->full_admin_html_view($content);
    }

// supplier return form
    public function supplier_return_form() {
        $purchase_id = $this->input->post('purchase_id');
        $query = $this->db->select('purchase_id')->from('product_purchase')->where('purchase_id', $purchase_id)->get();


        if ($query->num_rows() == 0) {
            $this->session->set_userdata(array('error_message' => display('please_input_correct_purchase_id')));
            redirect('Cretrun_m');
        }
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lreturn');
        $content = $CI->lreturn->supplier_return_data($purchase_id);
        $this->template->full_admin_html_view($content);
    }

    public function return_invoice() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Returnse');
        $invoice_id = $CI->Returnse->return_invoice_entry();
        $this->session->set_userdata(array('message' => display('successfully_added')));
        $this->invoice_inserted_data($invoice_id);
    }

    // return supplier insert  start
    public function return_suppliers() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Returnse');
        $purchase_id = $CI->Returnse->return_supplier_entry();
        $this->session->set_userdata(array('message' => display('successfully_added')));
        $this->supplier_inserted_data($purchase_id);
    }

    // supplier inserted  data
    public function supplier_inserted_data($purchase_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lreturn');
        $content = $CI->lreturn->supplier_html_data($purchase_id);
        $this->template->full_admin_html_view($content);
    }

    // return list start
    public function return_list() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreturn');
        $CI->load->model('Returnse');

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Cretrun_m/return_list/');
        $config["total_rows"] = $this->Returnse->return_list_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #  
        $content = $this->lreturn->return_list($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

// date between return report list
    public function datewise_invoic_return_list() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreturn');
        $CI->load->model('Returnse');
        $config["base_url"] = base_url('Cretrun_m/return_list/');
        $config["total_rows"] = $this->Returnse->return_list_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $content = $CI->lreturn->return_list_datebetween($from_date, $to_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    public function supplier_return_list() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreturn');
        $CI->load->model('Returnse');

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Cretrun_m/supplier_return_list/');
        $config["total_rows"] = $this->Returnse->supplier_return_list_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #  
        $content = $this->lreturn->supplier_return_list($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

// wastage return list start
    public function wastage_return_list() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreturn');
        $CI->load->model('Returnse');

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Cretrun_m/wastage_return_list/');
        $config["total_rows"] = $this->Returnse->wastage_return_list_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #  
        $content = $this->lreturn->wastage_return_list($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    //wastage return list end
    public function invoice_inserted_data($invoice_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lreturn');
        $content = $CI->lreturn->invoice_html_data($invoice_id);
        $this->template->full_admin_html_view($content);
    }

// Return delete with invoice id
    public function delete_retutn_invoice($invoice_id = null) {
        $this->load->model('Returnse');
        if ($this->Returnse->returninvoice_delete($invoice_id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect("Cretrun_m/return_list");
    }

    // return delete with purchase id 
    public function delete_retutn_purchase($purchase_id = null) {
        $this->load->model('Returnse');
        if ($this->Returnse->return_purchase_delete($purchase_id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect("Cretrun_m/supplier_return_list");
    }

    // date wise supplier return list
    public function datebwteen_supplier_return_list() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreturn');
        $CI->load->model('Returnse');

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Cretrun_m/supplier_return_list/');
        $config["total_rows"] = $this->Returnse->supplier_return_list_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $content = $this->lreturn->datewise_supplier_return_list($from_date, $to_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

}
