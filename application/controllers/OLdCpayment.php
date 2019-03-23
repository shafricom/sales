<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cpayment extends CI_Controller{
	public $menu;
	function __construct(){
		parent::__construct();
		$this->load->library('auth');
		$this->load->library('lpayment');
		$this->load->library('lsettings');
		$this->load->model('Payment');
        $this->load->library('linvoice');
		$this->load->library('laccounts');
        $this->load->model('Settings');
        $this->load->model('Accounts');
        $this->load->model('Web_settings');
        $this->load->model('Reports');
        $this->auth->check_admin_auth();
	}

	public function index(){
		$content=$this->lpayment->payement_form();
		$this->template->full_admin_html_view($content);
	}
    
    public function receipt_transaction(){
        $content=$this->lpayment->receipt_form();
        $this->template->full_admin_html_view($content);
    }

	/* transection method add start */
	public function transection_entry()
    {
        $todays_date =  $todays_date = $this->input->post('date'); // date("m-d-Y");
                
        $payment_type=$this->input->post('payment_type');
        $cheque_no=$this->input->post('cheque_no');
        $cheque_mature_date=$this->input->post('cheque_mature_date');
        $bank_name=$this->input->post('bank_name');
        $account_table=$this->input->post('account_table');
        $amount=$this->input->post('amount');
        $description=$this->input->post('description');
        $tran_category=$this->input->post('transection_category');
        $transaction_id=$this->auth->generator(15);

        if($tran_category==1){
        	$relation_id=$this->input->post('supplier_id');
        }elseif ($tran_category==2) {
        	$relation_id=$this->input->post('customer_id');
        }elseif($tran_category==3){
        	$relation_id=$this->input->post('office');;
        }else{
           $relation_id=$this->input->post('loan_id');
        }

        $dataP=array(
            'transaction_id'       =>  $transaction_id,
        	'date_of_transection'  =>$this->input->post('date'),
        	'transection_category' =>$this->input->post('transection_category'),
        	'transection_type'     =>$this->input->post('transectio_type'),
        	'relation_id'     =>$relation_id,
    		'amount'          =>$this->input->post('amount'),
            'pay_amount'      =>$this->input->post('pay_amount'),
    		'transection_mood'=>$this->input->post('payment_type'),
    		'description'     =>$this->input->post('description'),
		);
		
        $this->db->insert('transection',$dataP);

        if($payment_type==1){
            $status=1;
        }else{
            $status=0;
        }

        $receipt_no=$this->auth->generator(10);
        $trans_type= $this->input->post('transectio_type');

        $customer_id = $this->input->post('customer_id');
        if ($customer_id AND $trans_type==1) {
        	//Data ready for customer ledger
	         $data = array(
            'transaction_id'=>  $transaction_id,
            'customer_id'   =>  $customer_id,
            'invoice_no'    =>  NULL,
            'receipt_no'    =>  $receipt_no,
            'amount'        =>  $this->input->post('pay_amount'),
            'description'   =>  $description,
            'payment_type'  =>  $payment_type,
            'cheque_no'     =>  $cheque_no,
            'date'          =>  $todays_date,
            'status'        =>  1
            ); 

	        $this->Accounts->customer_ledger($data);
        }

        if ($customer_id AND $trans_type==2) {
            //Data ready for customer ledger
            $datarcv = array(
                'transaction_id'=>  $transaction_id,
                'customer_id'   =>  $customer_id,
                'invoice_no'    =>  NULL,
                'receipt_no'    =>  $receipt_no,
                'description'   => "Accounts",
                'amount'        =>  $this->input->post('amount'),
                'description'   =>  $description,
                'payment_type'  =>  $payment_type,
                'cheque_no'     =>  $cheque_no,
                'date'          =>  $todays_date,
                'status'        =>  1
            ); 
            $this->Accounts->customer_ledger($datarcv);
        }

        $loan_id=$this->input->post('loan_id');
        if($loan_id AND $trans_type==1){
        	$data14 = array(
			'transaction_id'=>	 $transaction_id,
			'person_id'		=>	$relation_id,
			'credit'		=>	$this->input->post('pay_amount'),
			'date'			=>	$this->input->post('date'),
			'details'		=>	$this->input->post('description'),
			'status'		=>	2
		);
		$result = $this->Settings->submit_payment($data14);
        }

        $loan_id=$this->input->post('loan_id');
        if($loan_id AND $trans_type==2){
        	$data15 = array(
			'transaction_id'=>	 $transaction_id,
			'person_id'		=>	$relation_id,
			'debit'		    =>	$this->input->post('amount'),
			'date'			=>	$this->input->post('date'),
			'details'		=>	$this->input->post('description'),
			'status'		=>	1
		);
        $result = $this->Settings->submit_payment($data15);
        }


        $supplier_id = $this->input->post('supplier_id');
        if ($supplier_id AND $trans_type==2) {
        	$deposit_no=$this->auth->generator(10);
	       	$data = array(
	            'transaction_id'=>  $transaction_id,
	            'supplier_id'   =>  $supplier_id,
	            'chalan_no'     =>  NULL,
	            'deposit_no'    =>  $deposit_no,
	            'amount'        =>  $this->input->post('amount'),
	            'description'   =>  $description,
	            'payment_type'  =>  $payment_type,
	            'cheque_no'     =>  $cheque_no,
	            'date'          =>  $todays_date,
	            'status'        =>  $status
	        );
	        $this->Accounts->supplier_ledger($data);
        }
        if ($supplier_id AND $trans_type==1) {
            $deposit_no=$this->auth->generator(10);
            $datapay = array(
            'transaction_id'=>  $transaction_id,
            'supplier_id'   =>  $supplier_id,
            'chalan_no'     =>  NULL,
            'deposit_no'    =>  $deposit_no,
            'amount'        =>  $this->input->post('pay_amount'),
            'description'   =>  $description,
            'payment_type'  =>  $payment_type,
            'cheque_no'     =>  $cheque_no,
            'date'          =>  $todays_date,
            'status'        =>  $status
            );
            $this->Accounts->supplier_ledger($datapay);
        }
        
        //Invoice sending data from transection
       
        $this->session->set_userdata(array('message'=>display('successfully_saved')));
        redirect(base_url('Cpayment/manage_payment'));exit;   
    }

    /* transection method add End*/
	public function manage_payment()
	{	
	
		$CI =& get_instance();
		$this->auth->check_admin_auth();
		$CI->load->library('lpayment');
		$CI->load->model('Payment');

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Cpayment/manage_payment/');
        $config["total_rows"] = $this->Payment->date_summary_query_count();
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

        $content = $CI->lpayment->payment_list($links,$config["per_page"],$page);
		$this->template->full_admin_html_view($content);
	}

	public function payment_delete()
	{	
		$CI =& get_instance();
		$this->auth->check_admin_auth();
		$CI->load->model('Payment');
		$id =  $_POST['transaction_id'];
		$result=$CI->Payment->delete_payment($id);
        $as=$CI->Payment->delete_customer_ledger($id);
        $asd=$CI->Payment->delete_supplier_ledger($id);
        $df=$CI->Payment->delete_person_ledger($id);
        $dsf=$CI->Payment->delete_inflow($id);
        //$result=$CI->Payment->delete_invoice($id);
		return true;
			
	}

	public function payment_update_form()
	{	
        $trans=$this->uri->segment(3);
		$content = $this->lpayment->payment_up_data($trans);
		$this->template->full_admin_html_view($content);
	}
	public function payment_update()
	{
		$trans  = $this->input->post('transaction_id'); 
        $payment_type=$this->input->post('payment_type');
        $cheque_no=$this->input->post('cheque_no');
        $cheque_mature_date=$this->input->post('cheque_mature_date');
        $bank_name=$this->input->post('bank_name');
        $account_table=$this->input->post('account_table');
        $amount=$this->input->post('amount');
        $description=$this->input->post('description');
        $tran_category=$this->input->post('transection_category');
        
        if($tran_category==1){
            $relation_id=$this->input->post('supplier_id');
        }elseif ($tran_category==2) {
            $relation_id=$this->input->post('customer_id');
        }elseif($tran_category==3){
            $relation_id=$this->input->post('office');;
        }else{
           $relation_id=$this->input->post('loan_id');
        }
       
        $trans_type= $this->input->post('transection_type');


        if (!empty($this->input->post('transection_category'))) {
            $data=array(
                'transaction_id'    =>  $trans,
                'date_of_transection'=>$this->input->post('date'),
                'transection_category'=>$this->input->post('transection_category'),
                'transection_type'    =>$this->input->post('transection_type'),
                'relation_id'     =>$relation_id,
                'amount'          =>$this->input->post('amount'),
                'pay_amount'      =>$this->input->post('pay_amount'),
                'transection_mood'=>$this->input->post('payment_type'),
                'description'     =>$this->input->post('description'),
            );
             $this->Payment->update_payment($data,$trans);
        }
        

        if($payment_type==1){
            $status=1;
        }else{
            $status=0;
        }
            
          $customer_id = $this->input->post('customer_id');   
        if ($customer_id AND $trans_type==2) {
            //Data ready for customer ledger
             $datarcv = array(
            'transaction_id'=>  $trans,
            'customer_id'   =>  $customer_id,
            'invoice_no'    =>  NULL,
            'receipt_no'    =>  '1233',
            'amount'        =>  $this->input->post('amount'),
            'description'   =>  'Acoun transection',
            'payment_type'  =>  $payment_type,
            'cheque_no'     =>  $cheque_no,
            'date'          =>  $this->input->post('date'),
           
            ); 
     

            $this->Payment->customer_leder_updata($datarcv,$trans);
        }

       $customer_id = $this->input->post('customer_id'); 
        if ($customer_id AND $trans_type==1) {
            //Data ready for customer ledger
             $datacd = array(
            'transaction_id'=>  $trans,
            'customer_id'   =>  $customer_id,
            'invoice_no'    =>  NULL,
            'receipt_no'    =>  '',
            'amount'        =>  $this->input->post('pay_amount'),
            'description'   =>  $description,
            'payment_type'  =>  $payment_type,
            'cheque_no'     =>  $cheque_no,
            'date'          =>  $this->input->post('date'),
           
            ); 

            $this->Payment->customer_leder_updata($datacd,$trans);
        }
        if($customer_id AND $trans_type==2){
            $account_adjustment = array(
                'transection_id'    =>  $trans,
                'tracing_id'        =>  $customer_id,
                'date'              =>  $this->input->post('date'),
                'amount'            =>  $this->input->post('amount'),
                // 'payment_type'      =>  1,
                // 'description'       =>  'ITP',
                // 'status'            =>  1
            );
             $this->Payment->customer_inflow_updata($account_adjustment,$trans);
        }
        $supplier_id=$this->input->post('supplier_id');
        if ($supplier_id AND $trans_type==1) {
            $deposit_no=$this->auth->generator(10);
            $datapay = array(
            'transaction_id'=>  $trans,
            'supplier_id'   =>  $supplier_id,
            'chalan_no'     =>  NULL,
           // 'deposit_no'    =>  $deposit_no,
            'amount'        =>  $this->input->post('pay_amount'),
            'description'   =>  'Update Transection',
            'payment_type'  =>  $payment_type,
            //'cheque_no'     =>  $cheque_no,
            'date'          =>  $this->input->post('date'),
           
            );
            $this->Payment->supplier_leder_updata($datapay,$trans);
        }

 $supplier_id=$this->input->post('supplier_id');
        if ($supplier_id AND $trans_type==2) {
            $deposit_no=$this->auth->generator(10);
            $datarec = array(
            'transaction_id'=>  $trans,
            'supplier_id'   =>  $supplier_id,
            'chalan_no'     =>  NULL,
           // 'deposit_no'    =>  $deposit_no,
            'amount'        =>  $this->input->post('amount'),
            'description'   =>  'Update Transection',
            'payment_type'  =>  $payment_type,
            //'cheque_no'     =>  $cheque_no,
            'date'          =>  $this->input->post('date'),
            
            );
            $this->Payment->supplier_leder_updata($datarec,$trans);
        }


         $this->session->set_userdata(array('message'=>display('successfully_updated')));
        redirect(base_url('Cpayment/manage_payment'));
        exit;
	}
	// trans report details
	public function trans_details(){
		$content=$this->lpayment->transection_report_details();
		$this->template->full_admin_html_view($content);
	}

	public function tran_det_id($id){
		$content = $this->lpayment->transection_data($id);
		$this->template->full_admin_html_view($content);
	}

    #==============Closing form==========#
    public function closing()
    {
      $data=array('title'=>display('closing_account'));
      $data=$this->Accounts->accounts_closing_data();
      $content = $this->parser->parse('accounts/closing_form',$data,true);
      $this->template->full_admin_html_view($content);  
    }
 
    #====== Cash closing report ============#
    public function closing_report()
    {   
        #
        #pagination starts
        #
        $config["base_url"]     = base_url('Cpayment/closing_report/');
        $config["total_rows"]   = $this->Accounts->get_closing_report_count();
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

        $content =$this->laccounts->daily_closing_list($links,$config["per_page"],$page);
        $this->template->full_admin_html_view($content);
    }

    public function summary_single($start,$end,$account)
    {
        $data=array('title'=>display('accounts_details_data'));
            
        //Getting all tables name.   
        $data['table_inflow']=$this->Payment->table_name(2);
        $data['table_outflow']=$this->Payment->table_name(1);
            
        $data['accounts']=$this->Payment->trans_summary_details($start,$end,$account);
        //$data['total_inflow']=$this->accounts->sub_total;
            
        $content = $this->parser->parse('payment/summary_single',$data,true);
        $this->template->full_admin_html_view($content);      
    }

    // Transection report
    public function summaryy(){

        #
        #pagination starts
        #
        $config["base_url"]     = base_url('Cpayment/summaryy/');
        $config["total_rows"]   = $this->Payment->tran_rep_query_count();
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
        $content = $this->lpayment->trans_data($links,$config["per_page"],$page);
        $this->template->full_admin_html_view($content);
    }

    public function getreport_details()
    {

        $transection_category   = $_POST['transection_category'];
        $marks  = $this->Payment->get_details($transection_category);

        $currency_details = $this->Web_settings->retrieve_setting_editdata();
        $company_info = $this->Reports->retrieve_company();
        $data = array(
            'marks' => $marks, 
            'company_info'  => $company_info,
            'currency'      => $currency_details[0]['currency'],
            'position'      => $currency_details[0]['currency_position'],
        );
        $this->load->view("payment/modal", $data);
    }

     public function today_details()
    {
        $transection_category   = $_POST['transection_category'];
        $data['marks']  = $this->Payment->today_details($transection_category);
        $this->load->view("payment/modal", $data);
    }
    //date wise report details
    public function date_summary()
    {

        #
        #pagination starts
        #
        $config["base_url"]     = base_url('Cpayment/date_summary/');
        $config["total_rows"]   = $this->Payment->date_summary_query_count();
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

        $content = $this->lpayment->trans_datewise_data($links,$config["per_page"],$page);
        $this->template->full_admin_html_view($content);
    }


    // Search date between controller 
    public function search_datewise()
    {
        $start=  $this->input->post('from_date');
        $end=  $this->input->post('to_date');

        $content = $this->lpayment->result_datewise_data($start,$end);
        $this->template->full_admin_html_view($content);
    }

    //Custom report transection
    public function custom_report()
    {
        #
        #pagination starts
        #
        $config["base_url"]     = base_url('Cpayment/custom_report/');
        $config["total_rows"]   = $this->Payment->date_summary_query_count();
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

        $content = $this->lpayment->trans_custom_report_data($links,$config["per_page"],$page);
        $this->template->full_admin_html_view($content);
    }
    
    // Custom report search
    public function custom_search_datewise()
    {
        $start  =  $this->input->post('from_date');
        $end    =  $this->input->post('to_date');
        $account=  $this->input->post('accounts');

        if($account == "All")
        { 
            $url="Cpayment/custom_report";
            redirect(base_url($url));
            exit;     
        }

        $content = $this->lpayment->custom_result_datewise_data($start,$end,$account);
        $this->template->full_admin_html_view($content);
    }

    public function generator($lenth)
    {
        $number=array("1","2","3","4","5","6","7","8","9");
    
        for($i=0; $i<$lenth; $i++)
        {
            $rand_value=rand(0,8);
            $rand_number=$number["$rand_value"];
        
            if(empty($con))
            { 
            $con=$rand_number;
            }
            else
            {
            $con="$con"."$rand_number";}
        }
        return $con;
    }
    public function manage_payment_date_to_date()
	{	
	
		$CI =& get_instance();
		$this->auth->check_admin_auth();
		$CI->load->library('lpayment');
		$CI->load->model('Payment');
        $start=  $this->input->post('from_date');
        $end=  $this->input->post('to_date');
       
        $content = $CI->lpayment->payment_list_date_wise($start,$end);
		$this->template->full_admin_html_view($content);
	}

}