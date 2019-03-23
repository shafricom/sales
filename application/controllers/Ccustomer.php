<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ccustomer extends CI_Controller {

    public $menu;

    function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('lcustomer');
        $this->load->library('session');
        $this->load->model('Customers');
        $this->auth->check_admin_auth();
    }

    //Default loading for Customer System.
    public function index() {
        //Calling Customer add form which will be loaded by help of "lcustomer,located in library folder"
        $content = $this->lcustomer->customer_add_form();
        //Here ,0 means array position 0 will be active class
        $this->template->full_admin_html_view($content);
    }

    //customer_search_item
    public function customer_search_item() {
        $customer_id = $this->input->post('customer_id');
        $content = $this->lcustomer->customer_search_item($customer_id);
        $this->template->full_admin_html_view($content);
    }

    //credit customer_search_item
    public function credit_customer_search_item() {
        $customer_id = $this->input->post('customer_id');
        $content = $this->lcustomer->credit_customer_search_item($customer_id);
        $this->template->full_admin_html_view($content);
    }

    //paid customer_search_item
    public function paid_customer_search_item() {
        $customer_id = $this->input->post('customer_id');
        $content = $this->lcustomer->paid_customer_search_item($customer_id);
        $this->template->full_admin_html_view($content);
    }

    //Manage customer
    public function manage_customer() {
        $this->load->model('Customers');

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Ccustomer/manage_customer/');
        $config["total_rows"] = $this->Customers->customer_list_count();
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
        $content = $this->lcustomer->customer_list($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
        ;
    }

    //Product Add Form
    public function credit_customer() {
        $this->load->model('Customers');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Ccustomer/credit_customer/');
        $config["total_rows"] = $this->Customers->credit_customer_list_count();
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
        $content = $this->lcustomer->credit_customer_list($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
        ;
    }

    //Paid Customer list. The customer who will pay 100%.
    public function paid_customer() {
        $this->load->model('Customers');

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Ccustomer/paid_customer/');
        $config["total_rows"] = $this->Customers->paid_customer_list_count();
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
        $content = $this->lcustomer->paid_customer_list($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
        ;
    }

    //Insert Product and upload
    public function insert_customer() {
        $customer_id = $this->auth->generator(15);

        //Customer  basic information adding.
        $data = array(
            'customer_id' => $customer_id,
            'customer_name' => $this->input->post('customer_name'),
            'customer_address' => $this->input->post('address'),
            'customer_mobile' => $this->input->post('mobile'),
            'customer_email' => $this->input->post('email'),
            'status' => 2
        );
        $result = $this->Customers->customer_entry($data);
        if ($result == TRUE) {
            //Previous balance adding -> Sending to customer model to adjust the data.
            $this->Customers->previous_balance_add($this->input->post('previous_balance'), $customer_id);

            $this->session->set_userdata(array('message' => display('successfully_added')));
            if (isset($_POST['add-customer'])) {
                redirect(base_url('Ccustomer/manage_customer'));
                exit;
            } elseif (isset($_POST['add-customer-another'])) {
                redirect(base_url('Ccustomer'));
                exit;
            }
        } else {
            $this->session->set_userdata(array('error_message' => display('already_exists')));
            redirect(base_url('Ccustomer'));
        }
    }

    //customer Update Form
    public function customer_update_form($customer_id) {
        $content = $this->lcustomer->customer_edit_data($customer_id);
        $this->template->full_admin_html_view($content);
    }

    //Customer Ledger
    public function customer_ledger($customer_id) {
        $content = $this->lcustomer->customer_ledger_data($customer_id);
        $this->template->full_admin_html_view($content);
    }

    //Customer Final Ledger
    public function customerledger($customer_id) {
        $content = $this->lcustomer->customerledger_data($customer_id);
        $this->template->full_admin_html_view($content);
    }

    //Customer Previous Balance
    public function previous_balance_form() {
        $content = $this->lcustomer->previous_balance_form();
        $this->template->full_admin_html_view($content);
    }

    // customer Update
    public function customer_update() {
        $this->load->model('Customers');
        $customer_id = $this->input->post('customer_id');
        $data = array(
            'customer_name' => $this->input->post('customer_name'),
            'customer_address' => $this->input->post('address'),
            'customer_mobile' => $this->input->post('mobile'),
            'customer_email' => $this->input->post('email')
        );
        $this->Customers->update_customer($data, $customer_id);
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Ccustomer/manage_customer'));
        exit;
    }

    // product_delete
    public function customer_delete() {
        $this->load->model('Customers');
        $customer_id = $_POST['customer_id'];
        $this->Customers->delete_customer($customer_id);
        $this->Customers->delete_transection($customer_id);
        $this->Customers->delete_customer_ledger($customer_id);
        $this->Customers->delete_customer_ledger($customer_id);
        $this->Customers->delete_invoic($customer_id);
        $this->session->set_userdata(array('message' => display('successfully_delete')));
        return true;
    }

}
