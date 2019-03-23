<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->template->current_menu = 'home';
        $this->load->model('Web_settings');
        $this->load->model('Reports');
    }

    public function index() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $CI->load->library('occational');
        if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }
        $this->auth->check_admin_auth();

        $CI->load->model('Customers');
        $CI->load->model('Products');
        $CI->load->model('Suppliers');
        $CI->load->model('Invoices');
        $CI->load->model('Purchases');
        $CI->load->model('Reports');
        $CI->load->model('Accounts');
        $CI->load->model('Web_settings');
        $CI->load->model('Payment');

        $total_customer = $CI->Customers->count_customer();
        $total_product = $CI->Products->count_product();
        $total_suppliers = $CI->Suppliers->count_supplier();
        $total_sales = $CI->Invoices->count_invoice();
        $total_purchase = $CI->Purchases->count_purchase();
        $todays_sales_report = $CI->Invoices->todays_sales_report();
//        echo '<pre>';        print_r($todays_sales_report);die();

        $this->Accounts->accounts_summary(1);
        $total_expese = $this->Accounts->sub_total;
        $monthly_sales_report = $CI->Reports->monthly_sales_report();

        $sales_report = $CI->Reports->todays_total_sales_report();
        $purchase_report = $CI->Reports->todays_total_purchase_report();
//        echo $purchase_report[0]['ttl_purchase_amount'];
//        echo '<pre>';        print_r($purchase_report);die();
        $todays_sale_product = $CI->Reports->todays_sale_product();

        $total_profit = ($sales_report[0]['total_sale'] - $sales_report[0]['total_supplier_rate']);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $best_sales_product = $CI->Invoices->best_sales_products();
//        echo '<pre>';        print_r($best_sales_product);die();
        $data = array(
            'title' => display('dashboard'),
            'total_customer' => $total_customer,
            'total_product' => $total_product,
            'total_suppliers' => $total_suppliers,
            'total_sales' => $total_sales,
            'total_purchase' => $total_purchase,
            'todays_sales_report' => $todays_sales_report,
            'purchase_amount' => number_format($sales_report[0]['total_supplier_rate'], 2, '.', ','),
            'sales_amount' => number_format($sales_report[0]['total_amt'], 2, '.', ','),
            'total_expese' => $total_expese,
            'todays_sale_product' => $todays_sale_product,
            'todays_total_purchase' => number_format($purchase_report[0]['ttl_purchase_amount'], 2, '.', ','),
            'total_profit' => number_format($total_profit, 2, '.', ','),
            'monthly_sales_report' => $monthly_sales_report,
            'best_sales_product' => $best_sales_product,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
        );

        $content = $CI->parser->parse('include/admin_home', $data, true);
        $this->template->full_admin_html_view($content);
    }

//    ============ its for see_all_best_sales =============
    public function see_all_best_sales() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $CI->load->library('occational');
        if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');

        $best_saler_product_list = $CI->Invoices->best_saler_product_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
//        echo '<pre>';        print_r($best_sales_product);die();
        $data = array(
            'title' => display('dashboard'),
            'best_saler_product_list' => $best_saler_product_list,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
        );

        $content = $CI->parser->parse('report/best_saler_product_list', $data, true);
        $this->template->full_admin_html_view($content);
    }

//    ============ its for todays_customer_receipt =============
    public function todays_customer_receipt() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $CI->load->library('occational');
        if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $today = date('Y-m-d');

        $company_info = $CI->Customers->retrieve_company();
        $all_customer = $this->db->select('*')->from('customer_information')->get()->result();
        $todays_customer_receipt = $CI->Invoices->todays_customer_receipt($today);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
//        echo '<pre>';        print_r($todays_customer_receipt);die();
        $data = array(
            'title' => "Received From Customer",
            'all_customer' => $all_customer,
            'todays_customer_receipt' => $todays_customer_receipt,
            'today' => $today,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
        );

        $content = $CI->parser->parse('report/todays_customer_receipt', $data, true);
        $this->template->full_admin_html_view($content);
    }

//    ============ its for todays_customer_receipt =============
    public function filter_customer_wise_receipt() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $CI->load->library('occational');
        if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $customer_id = $this->input->post('customer_id');
        $from_date = $this->input->post('from_date');
        $today = date('Y-m-d');

        $company_info = $CI->Customers->retrieve_company();
        $all_customer = $this->db->select('*')->from('customer_information')->get()->result();
        $filter_customer_wise_receipt = $CI->Invoices->filter_customer_wise_receipt($customer_id, $from_date);
        $todays_customer_receipt = $CI->Invoices->todays_customer_receipt($today);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
//        echo '<pre>';        print_r($filter_customer_wise_receipt);die();
        $data = array(
            'title' => "Received From Customer",
            'all_customer' => $all_customer,
            'todays_customer_receipt' => $filter_customer_wise_receipt,
//            'filter_customer_wise_receipt' => $filter_customer_wise_receipt,
            'today' => $today,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
        );

        $content = $CI->parser->parse('report/todays_customer_receipt', $data, true);
        $this->template->full_admin_html_view($content);
    }

    //Today All Report
    public function all_report() {
        if ($this->session->userdata('user_type') == '2') {
            $this->session->set_userdata(array('error_message' => display('you_are_not_access_this_part')));
            redirect('Admin_dashboard');
        }

        $CI = & get_instance();
        $CI->load->library('lreport');
        if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }
        $this->auth->check_admin_auth();

        $user_type = $this->session->userdata('user_type');

        if ($user_type == 1) {
            $content = $CI->lreport->retrieve_all_reports();
            $this->template->full_admin_html_view($content);
        } elseif ($user_type == 2) {
            $CI->load->library('linvoice');
            $content = $CI->linvoice->invoice_add_form();
            $this->template->full_admin_html_view($content);
        }
    }

    #==============Todays_sales_report============#

    public function todays_sales_report() {
        if ($this->session->userdata('user_type') == '2') {
            $this->session->set_userdata(array('error_message' => display('you_are_not_access_this_part')));
            redirect('Admin_dashboard');
        }
        $CI = & get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/todays_sales_report/');
        $config["total_rows"] = $this->Reports->todays_sales_report_count();
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

        $content = $CI->lreport->todays_sales_report($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    #================todays_purchase_report========#

    public function todays_purchase_report() {
        if ($this->session->userdata('user_type') == '2') {
            $this->session->set_userdata(array('error_message' => display('you_are_not_access_this_part')));
            redirect('Admin_dashboard');
        }
        $CI = & get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/todays_purchase_report/');
        $config["total_rows"] = $this->Reports->todays_sales_report_count();
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

        $content = $CI->lreport->todays_purchase_report($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    #=============Total purchase_report_category_wise ===================#

    public function purchase_report_category_wise() {
        if ($this->session->userdata('user_type') == '2') {
            $this->session->set_userdata(array('error_message' => display('you_are_not_access_this_part')));
            redirect('Admin_dashboard');
        }
        $CI = & get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/purchase_report_category_wise/');
        $config["total_rows"] = $this->Reports->purchase_report_category_wise_count();
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

        $content = $CI->lreport->purchase_report_category_wise($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

//    ========= its for filter_purchase_report_category_wise ==============
    public function filter_purchase_report_category_wise() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $category = $this->input->post('category');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
//        if ($data == "All") {
//            $url = "Cpayment/purchase_report_category_wise";
//            redirect(base_url($url));
//            exit;
//        }
        $content = $this->lreport->filter_purchase_report_category_wise($category, $from_date, $to_date);
        $this->template->full_admin_html_view($content);
    }

//    ============== sales report category wise =================
    public function sales_report_category_wise() {
        if ($this->session->userdata('user_type') == '2') {
            $this->session->set_userdata(array('error_message' => display('you_are_not_access_this_part')));
            redirect('Admin_dashboard');
        }
        $CI = & get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/sales_report_category_wise/');
        $config["total_rows"] = $this->Reports->sales_report_category_wise_count();
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

        $content = $CI->lreport->sales_report_category_wise($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

//    ========= its for filter_sales_report_category_wise ==============
    public function filter_sales_report_category_wise() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $category = $this->input->post('category');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
//        if ($data == "All") {
//            $url = "Cpayment/purchase_report_category_wise";
//            redirect(base_url($url));
//            exit;
//        }
        $content = $this->lreport->filter_sales_report_category_wise($category, $from_date, $to_date);
        $this->template->full_admin_html_view($content);
    }

    #=============Total profit report===================#

    public function total_profit_report() {
        if ($this->session->userdata('user_type') == '2') {
            $this->session->set_userdata(array('error_message' => display('you_are_not_access_this_part')));
            redirect('Admin_dashboard');
        }
        $CI = & get_instance();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/total_profit_report/');
        $config["total_rows"] = $this->Reports->total_profit_report_count();
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
        $content = $this->lreport->total_profit_report($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    #============Date wise sales report==============#

    public function retrieve_dateWise_SalesReports() {
        if ($this->session->userdata('user_type') == '2') {
            $this->session->set_userdata(array('error_message' => display('you_are_not_access_this_part')));
            redirect('Admin_dashboard');
        }
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $config["base_url"] = base_url('Admin_dashboard/retrieve_dateWise_SalesReports/');
        $config["total_rows"] = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
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

        $content = $CI->lreport->retrieve_dateWise_SalesReports($from_date, $to_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    #==============Date wise purchase report=============#

    public function retrieve_dateWise_PurchaseReports() {
        if ($this->session->userdata('user_type') == '2') {
            $this->session->set_userdata(array('error_message' => display('you_are_not_access_this_part')));
            redirect('Admin_dashboard');
        }
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $start_date = $this->input->get('from_date');
        $end_date = $this->input->get('to_date');
        #exit;
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/retrieve_dateWise_PurchaseReports/');
        $config["total_rows"] = $this->Reports->count_retrieve_dateWise_PurchaseReports($start_date, $end_date);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
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
        $content = $CI->lreport->retrieve_dateWise_PurchaseReports($start_date, $end_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    #==============Product sales report date wise===========#

    public function product_sales_reports_date_wise() {
        if ($this->session->userdata('user_type') == '2') {
            $this->session->set_userdata(array('error_message' => display('you_are_not_access_this_part')));
            redirect('Admin_dashboard');
        }
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_sales_reports_date_wise/');
        $config["total_rows"] = $this->Reports->retrieve_product_sales_report_count();
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
        $content = $this->lreport->get_products_report_sales_view($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    #==============Date wise purchase report=============#

    public function retrieve_dateWise_profit_report() {
        if ($this->session->userdata('user_type') == '2') {
            $this->session->set_userdata(array('error_message' => display('you_are_not_access_this_part')));
            redirect('Admin_dashboard');
        }
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $start_date = $this->input->get('from_date');
        $end_date = $this->input->get('to_date');

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/retrieve_dateWise_profit_report/');
        $config["total_rows"] = $this->Reports->retrieve_dateWise_profit_report_count($start_date, $end_date);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
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
        $content = $this->lreport->retrieve_dateWise_profit_report($start_date, $end_date, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    #==============Product sales search reports============#

    public function product_sales_search_reports() {
        if ($this->session->userdata('user_type') == '2') {
            $this->session->set_userdata(array('error_message' => display('you_are_not_access_this_part')));
            redirect('Admin_dashboard');
        }
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_sales_search_reports/');
        $config["total_rows"] = $this->Reports->retrieve_product_search_sales_report_count($from_date, $to_date);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
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
        $content = $this->lreport->get_products_search_report($from_date, $to_date, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    #============User login=========#

    public function login() {
        if ($this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard', TRUE, 302);
        }
        $data['title'] = display('admin_login_area');
        $content = $this->parser->parse('user/admin_login_form', $data, true);
        $this->template->full_admin_html_view($content);
    }

    #==============Valid user check=======#

    public function do_login() {
        $error = '';
        $setting_detail = $this->Web_settings->retrieve_setting_editdata();

        if ($setting_detail[0]['captcha'] == 0 && $setting_detail[0]['secret_key'] != null && $setting_detail[0]['site_key'] != null) {

            $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
            $this->form_validation->set_message('validate_captcha', 'Please check the the captcha form');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_userdata(array('error_message' => display('please_enter_valid_captcha')));
                $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                if ($username == '' || $password == '' || $this->auth->login($username, $password) === FALSE) {
                    $error = display('wrong_username_or_password');
                }
                if ($error != '') {
                    $this->session->set_userdata(array('error_message' => $error));
                    $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
                } else {
                    $this->output->set_header("Location: " . base_url(), TRUE, 302);
                }
            }
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($username == '' || $password == '' || $this->auth->login($username, $password) === FALSE) {
                $error = display('wrong_username_or_password');
            }
            if ($error != '') {
                $this->session->set_userdata(array('error_message' => $error));
                $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
            } else {
                $this->output->set_header("Location: " . base_url(), TRUE, 302);
            }
        }
    }

    //Valid captcha check
    function validate_captcha() {
        $setting_detail = $this->Web_settings->retrieve_setting_editdata();
        $captcha = $this->input->post('g-recaptcha-response');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $setting_detail[0]['secret_key'] . ".&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response . 'success' == false) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    #===============Logout=======#

    public function logout() {
        if ($this->auth->logout())
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
    }

    #=============Edit Profile======#

    public function edit_profile() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('luser');
        $content = $CI->luser->edit_profile_form();
        $this->template->full_admin_html_view($content);
    }

    #=============Update Profile========#

    public function update_profile() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Users');
        $this->Users->profile_update();
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Admin_dashboard/edit_profile'));
    }

    #=============Change Password=========# 

    public function change_password_form() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $content = $CI->parser->parse('user/change_password', array('title' => display('change_password')), true);
        $this->template->full_admin_html_view($content);
    }

    #============Change Password===========#

    public function change_password() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Users');

        $error = '';
        $email = $this->input->post('email');
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('password');
        $repassword = $this->input->post('repassword');

        if ($email == '' || $old_password == '' || $new_password == '') {
            $error = display('blank_field_does_not_accept');
        } else if ($email != $this->session->userdata('user_email')) {
            $error = display('you_put_wrong_email_address');
        } else if (strlen($new_password) < 6) {
            $error = display('new_password_at_least_six_character');
        } else if ($new_password != $repassword) {
            $error = display('password_and_repassword_does_not_match');
        } else if ($CI->Users->change_password($email, $old_password, $new_password) === FALSE) {
            $error = display('you_are_not_authorised_person');
        }

        if ($error != '') {
            $this->session->set_userdata(array('error_message' => $error));
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/change_password_form', TRUE, 302);
        } else {
            $this->session->set_userdata(array('message' => display('successfully_changed_password')));
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/change_password_form', TRUE, 302);
        }
    }

}
