<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Caccounts extends CI_Controller {
    function __construct() 
    {
        parent::__construct();
        $this->load->library('lsettings');
        $this->load->library('auth');
        $this->load->library('session');
        $this->load->library('laccounts');

        $this->load->model('Settings');
        $this->load->model('Accounts');
        $this->load->model('Web_settings');
        $this->auth->check_admin_auth();
        $this->template->current_menu = 'Caccounts';

        if ($this->session->userdata('user_type') == '2') {
            $this->session->set_userdata(array('error_message'=>display('you_are_not_access_this_part')));
            redirect('Admin_dashboard');
        }
    }
    
    public function index()
    {
        $data=array('title'=>display('accounts_inflow_form'));
        $data["accounts"]=$this->Accounts->accounts_name_finder(2);
        $data["bank"]=$this->Settings->get_bank_list();
        $content = $this->parser->parse('accounts/inflow',$data,true);
        $this->template->full_admin_html_view($content);
    }
    #===============Outflow accounts========#    
    public function outflow()
    {
        $data=array('title'=> display('accounts_outflow_form'));
        $data["accounts"]=$this->Accounts->accounts_name_finder(1);
        $data["bank"]=$this->Settings->get_bank_list();
        $content = $this->parser->parse('accounts/outflow',$data,true);
        $this->template->full_admin_html_view($content);   
        
    }
    #===============Add TAX================#
    public function add_tax()
    {
        $data=array('title'=>display('add_tax'));
        $content = $this->parser->parse('accounts/add_tax',$data,true);
        $this->template->full_admin_html_view($content);   
        
    }
    #==============TAX Entry==============#
    public function tax_entry()
    {
        $data=array('title'=>display('accounts_tax_form'));
        $tax['tax_id'] = $this->auth->generator(10);
        $tax['tax'] = $this->input->post('enter_tax');
        $tax['status'] = 1;
        $result = $this->Accounts->tax_entry($tax);
        if ($result == true) {
           $this->session->set_userdata(array('message'=>display('successfully_inserted')));
           redirect('Caccounts/manage_tax');
        }else{
            $this->session->set_userdata(array('error_message'=>display('already_exists')));
            redirect('Caccounts/manage_tax');
        }
    }
    #==============Manage TAX==============#
    public function manage_tax()
    {
        $tax_list = $this->db->select('*')
                    ->from('tax_information')
                    ->get()
                    ->result();

        $data=array(
                'title'=>display('manage_tax'),
                'tax_list'=>$tax_list
            );
        
        $content = $this->parser->parse('accounts/manage_tax',$data,true);
        $this->template->full_admin_html_view($content);   
        
    }

    #==============TAX Edit==============#
    public function tax_edit($tax_id)
    {
        $tax_info = $this->db->select('*')
                    ->from('tax_information')
                    ->where('tax_id',$tax_id)
                    ->get()
                    ->result_array();

        $data=array(
                'title'=>display('accounts_tax_edit'),
                'tax_id'=>$tax_info[0]['tax_id'],
                'tax'=>$tax_info[0]['tax']
            );
        
        $content = $this->parser->parse('accounts/tax_edit',$data,true);
        $this->template->full_admin_html_view($content);   
        
    }
    #==============TAX Update==============#
    public function update_tax($id)
    {
        $data=array('title'=>display('accounts_tax_edit'));
        $tax['tax'] = $this->input->post('enter_tax');
        $result = $this->Accounts->update_tax_data($tax,$id);
        if ($result == true) {
           $this->session->set_userdata(array('message'=>display('successfully_updated')));
        }
        $tax_list = $this->db->select('*')
                    ->from('tax_information')
                    ->get()
                    ->result();

        $data=array(
                'title'=> display('tax_edit'),
                'tax_list'=>$tax_list
            );
        $content = $this->parser->parse('accounts/manage_tax',$data,true);
        $this->template->full_admin_html_view($content);   
        
    }

    #==============TAX Update==============#
    public function tax_delete($id)
    {
        $tax['tax'] = $this->input->post('enter_tax');
        
        $result = $this->db->delete('tax_information', array('tax_id' => $id)); 

        if ($result == true) {
           $this->session->set_userdata(array('message'=>display('successfully_delete')));
        }
        redirect('Caccounts/manage_tax');
    }

    #==============Closing reports==========#
    public function closing()
    {
      $data=array('title'=> display('closing_account'));
      $data=$this->Accounts->accounts_closing_data();
      $content = $this->parser->parse('accounts/closing_form',$data,true);
      $this->template->full_admin_html_view($content);  
    }
    #===============Accounts summary==========#
    public function summary()
    {

        $currency_details = $this->Web_settings->retrieve_setting_editdata();
        $data=array(
            'title'    =>display('accounts_summary_data'),
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            );
      
        $data['table_inflow']=$this->Accounts->table_name(2);
        $data['table_outflow']=$this->Accounts->table_name(1);
      
        $data['inflow']=$this->Accounts->accounts_summary(2);
        $data['total_inflow']=number_format($this->Accounts->sub_total, 2, '.', ',');

        $data['outflow']=$this->Accounts->accounts_summary(1);
        $data['total_outflow']=number_format($this->Accounts->sub_total, 2, '.', ',');

        $content = $this->parser->parse('accounts/summary',$data,true);
        $this->template->full_admin_html_view($content);  
    }
    #================Summary single===========#
    public function summary_single($start,$end,$account)
    {
        $data=array('title'=>   display('accounts_details_data'));
            
        //Getting all tables name.   
        $data['table_inflow']=$this->Accounts->table_name(2);
        $data['table_outflow']=$this->Accounts->table_name(1);
            
        $data['accounts']=$this->Accounts->accounts_summary_details($start,$end,$account);
        //$data['total_inflow']=$this->accounts->sub_total;
            
        $content = $this->parser->parse('accounts/summary_single',$data,true);
        $this->template->full_admin_html_view($content);      
    }
    #==============Summary report date  wise========#
    public function summary_datewise()
    {
        $start=  $this->input->post('from_date');
        $end=  $this->input->post('to_date');
        $account=$this->input->post('accounts');
        
        if($account != "All")
            { $url="Caccounts/summary_single/$start/$end/$account";
                redirect(base_url($url));
                exit;     
            }

        $currency_details = $this->Web_settings->retrieve_setting_editdata();
            
        $data=array(
            'title'    => display('datewise_summary_data'),
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            );
            
        //Getting all tables name.   
        $data['table_inflow']=$this->Accounts->table_name(2);
        $data['table_outflow']=$this->Accounts->table_name(1);
        
        $data['inflow']=$this->Accounts->accounts_summary_datewise($start,$end,"2");
        $data['total_inflow']=$this->Accounts->sub_total;
        
        $data['outflow']=$this->Accounts->accounts_summary_datewise($start,$end,"1");
        $data['total_outflow']=$this->Accounts->sub_total;
        
        $content = $this->parser->parse('accounts/summary',$data,true);
        $this->template->full_admin_html_view($content);  
    }
        
    #============ Cheque Manager ==============#
    public function cheque_manager()
    {

        $currency_details = $this->Web_settings->retrieve_setting_editdata();
       
        $data=array(
            'title'    => display('accounts_cheque_manager'),
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            );
        $data["cheque_manager"]=$this->Accounts->cheque_manager(30,0);
        //print_r($data);
        $content = $this->parser->parse('accounts/cheque_manager',$data,true);
        $this->template->full_admin_html_view($content);
    }

    #============ Cheque Manager edit ==============#
    public function cheque_manager_edit($transection_id,$action)
    {
        $this->Accounts->data_update(array('status'=>$action),"customer_ledger",array('transaction_id'=>$transection_id));
        $this->Accounts->data_update(array('cheque_status'=>$action),"cheque_manger",array('transection_id'=>$transection_id));
        $this->session->set_userdata(array('message'=>display('cheque_ammount_asjusted')));
        redirect(base_url('Caccounts/cheque_manager'));exit;
    }

    // Add daily closing 
    public function add_daily_closing()
    {
        date_default_timezone_set('Asia/Dhaka');
    //    $todays_date = date("m-d-Y");
        $todays_date = date("Y-m-d");
        
        $data = array(
            'closing_id'        =>  $this->generator(15),           
            'last_day_closing'  =>  str_replace(',', '', $this->input->post('last_day_closing')),
            'cash_in'           =>  str_replace(',', '', $this->input->post('cash_in')),
            'cash_out'          =>  str_replace(',', '', $this->input->post('cash_out')),
            'date'              =>  $todays_date,
            'amount'            =>  str_replace(',', '', $this->input->post('cash_in_hand')),
//            'adjustment'        =>  str_replace(',', '', $this->input->post('adjusment')),
            'status'            =>      1
        );
//        echo '<pre>';        print_r($data); die();
        $invoice_id = $this->Accounts->daily_closing_entry( $data );
        
        $note = array(
            'cash_date'=> date('Y-m-d'),
            '1000n'=>   $this->input->post('thousands'),
            '500n' =>   $this->input->post('fivehnd'),
            '100n' =>   $this->input->post('hundrad'),
            '50n'  =>   $this->input->post('fifty'),
            '20n'  =>   $this->input->post('twenty'),
            '10n'  =>   $this->input->post('ten'),
            '5n'   =>   $this->input->post('five'),
            '2n'   =>   $this->input->post('two'),
            '1n'   =>   $this->input->post('one'),
            'grandtotal'=>$this->input->post('grndtotal')
        );

        $this->db->insert('notes',$note);
        $this->session->set_userdata(array('message'=> display('successfully_added')));
        redirect(base_url('Caccounts/closing_report'));exit;
    }
    // Add drawing entry
    public function add_drawing_entry()
    {
        $CI =& get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Closings');
        date_default_timezone_set('Asia/Dhaka');
        $todays_date = date("m-d-Y");
        
        $data = array(
            'drawing_id'    =>  $this->generator(15),
            'date'          =>  $todays_date,
            'drawing_title' =>  $this->input->post('title'),
            'description'   =>  $this->input->post('description'),
            'amount'        =>  $this->input->post('amount'),
            'status'        =>1
        );
        
        $invoice_id = $CI->Closings->drawing_entry( $data );
        $this->session->set_userdata(array('message'=> display('successfully_draw_added')));
        redirect(base_url('cclosing'));exit;
    }
    // Add expance entry
    public function add_expence_entry()
    {
        $CI =& get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Closings');
        date_default_timezone_set('Asia/Dhaka');
        $todays_date = date("m-d-Y");
        
        $data = array(
            'expence_id'    =>  $this->generator(15),
            'date'          =>  $todays_date,
            'expence_title' =>  $this->input->post('title'),
            'description'   =>  $this->input->post('description'),
            'amount'        =>  $this->input->post('amount'),
            'status'        =>  1
        );
        
        $invoice_id = $CI->Closings->expence_entry( $data );
        $this->session->set_userdata(array('message'=> display('successfully_added')));
        redirect(base_url('cclosing'));
    }
    // Add bank entry
    public function add_banking_entry()
    {
        $CI =& get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Closings');
        date_default_timezone_set('Asia/Dhaka');
        $todays_date = date("m-d-Y");
        
        $data = array(
            'banking_id'        =>  $this->generator(15),
            'date'              =>  $todays_date,
            'bank_id'           =>  $this->input->post('bank_id'),
            'deposit_type'      =>  $this->input->post('deposit_name'),
            'transaction_type'  =>  $this->input->post('transaction_type'),
            'description'       =>  $this->input->post('description'),
            'amount'            =>  $this->input->post('amount'),
            'status'            =>1
        );
        
        $invoice_id = $CI->Closings->banking_data_entry( $data );
        $this->session->set_userdata(array('message'=> display('successfully_added')));
        redirect(base_url('cclosing'));exit;
    }
    
    //Closing report
    public function closing_report()
    {
        $content =$this->laccounts->daily_closing_list();
        $this->template->full_admin_html_view($content);
    }
    // Date wise closing reports 
    public function date_wise_closing_reports()
    {           
        $from_date = $this->input->get('from_date');       
        $to_date = $this->input->get('to_date');
        
        #
        #pagination starts
        #
        $config["base_url"]     = base_url('Caccounts/date_wise_closing_reports/');
        $config["total_rows"]   = $this->Accounts->get_date_wise_closing_report_count($from_date,$to_date);
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5; 
        $config['suffix'] = '?'. http_build_query($_GET, '', '&');
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
        
        $content = $this->laccounts->get_date_wise_closing_reports($links,$config["per_page"],$page,$from_date,$to_date );
       
        $this->template->full_admin_html_view($content);
    }
    // Random Id generator
    public function generator($lenth)
    {
        $number=array("A","B","C","D","E","F","G","H","I","J","K","L","N","M","O","P","Q","R","S","U","V","T","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","1","2","3","4","5","6","7","8","9","0");
    
        for($i=0; $i<$lenth; $i++)
        {
            $rand_value=rand(0,61);
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
}
