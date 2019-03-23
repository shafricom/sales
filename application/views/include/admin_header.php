<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$CI->load->model('Reports');
$CI->load->model('Users');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
$users = $CI->Users->profile_edit_data();
$out_of_stock = $CI->Reports->out_of_stock_count();
?>
<!-- Admin header end -->
<style type="text/css">
    .navbar .btn-success{
        margin: 13px 2px;
    }
</style>
<header class="main-header"> 
    <a href="<?php echo base_url() ?>" class="logo"> <!-- Logo -->
        <span class="logo-mini">
            <!--<b>A</b>BD-->
            <img src="<?php
            if (isset($Web_settings[0]['favicon'])) {
                echo $Web_settings[0]['favicon'];
            }
            ?>" alt="">
        </span>

        <span class="logo-lg">
            <!--<b>Admin</b>BD-->
            <img src="<?php
            if (isset($Web_settings[0]['logo'])) {
                echo $Web_settings[0]['logo'];
            }
            ?>" alt="">
        </span>
    </a>
    <!-- Header Navbar -->


    <nav class="navbar navbar-static-top text-center">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
            <span class="sr-only">Toggle navigation</span>

            <span class="pe-7s-keypad"></span>
        </a>

        <a href="<?php echo base_url('Cinvoice') ?>" class="btn btn-success btn-outline" style=""><i class="ti-layout-accordion-list"></i> <?php echo display('invoicex') ?></a>

        <a href="<?php echo base_url('Cpayment/receipt_transaction') ?>" class="btn btn-success btn-outline" style=""><i class="fa fa-money"></i> <?php echo display('receiptx') ?></a>

        <a href="<?php echo base_url('Cpayment') ?>" class="btn btn-success btn-outline" style=""><i class="fa fa-paypal" aria-hidden="true"></i> <?php echo display('paymentx') ?></a>

        <a href="<?php echo base_url('Cpurchase') ?>" class="btn btn-success btn-outline" style=""><i class="ti-shopping-cart"></i> <?php echo display('purchasex') ?></a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
                    <a href="<?php echo base_url('Creport/out_of_stock') ?>" >
                        <i class="pe-7s-attention" title="<?php echo display('out_of_stock') ?>"></i>
                        <span class="label label-danger"><?php echo $out_of_stock ?></span>
                    </a>
                </li>
                <!-- settings -->
                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-settings"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('Admin_dashboard/edit_profile') ?>"><i class="pe-7s-users"></i><?php echo display('user_profile') ?></a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/change_password_form') ?>"><i class="pe-7s-settings"></i><?php echo display('change_password') ?></a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i><?php echo display('logout') ?></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel text-center">
            <div class="image">
                <img src="<?php echo $users[0]['logo'] ?>" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <p><?php echo $this->session->userdata('user_name') ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> <?php echo display('online') ?></a>
            </div>
        </div>
        <!-- sidebar menu -->
        <ul class="sidebar-menu">

            <li class="<?php
            if ($this->uri->segment('1') == ("")) {
                echo "active";
            } else {
                echo " ";
            }
            ?>">
                <a href="<?php echo base_url() ?>"><i class="ti-dashboard"></i> <span><?php echo display('dashboard') ?></span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>

            <!-- Invoice menu start -->
            <li class="treeview <?php
            if ($this->uri->segment('1') == ("Cinvoice")) {
                echo "active";
            } else {
                echo " ";
            }
            ?>">
                <a href="#">
                    <i class="ti-layout-accordion-list"></i><span><?php echo display('invoice') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Cinvoice') ?>"><?php echo display('new_invoice') ?></a></li>
                    <li><a href="<?php echo base_url('Cinvoice/manage_invoice') ?>"><?php echo display('manage_invoice') ?></a></li>
                    <li><a href="<?php echo base_url('Cinvoice/pos_invoice') ?>"><?php echo display('pos_invoice') ?></a></li>
                </ul>
            </li>
            <!-- Invoice menu end -->

            <!-- Customer menu end -->

            <!-- Category menu start -->
            <li class="treeview <?php
            if ($this->uri->segment('1') == ("Ccategory")) {
                echo "active";
            } else {
                echo " ";
            }
            ?>">
                <a href="#">
                    <i class="ti-tag"></i><span><?php echo display('category') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Ccategory') ?>"><?php echo display('add_category') ?></a></li>
                    <li><a href="<?php echo base_url('Ccategory/manage_category') ?>"><?php echo display('manage_category') ?></a></li>
                </ul>
            </li>
            <!-- Category menu end -->
            <!-- Product menu start -->
            <li class="treeview <?php
            if ($this->uri->segment('1') == ("Cproduct")) {
                echo "active";
            } else {
                echo " ";
            }
            ?>">
                <a href="#">
                    <i class="ti-bag"></i><span><?php echo display('product') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Cproduct') ?>"><?php echo display('add_product') ?></a></li>
                    <li><a href="<?php echo base_url('Cproduct/add_product_csv') ?>"><?php echo display('import_product_csv') ?></a></li>
                    <li><a href="<?php echo base_url('Cproduct/manage_product') ?>"><?php echo display('manage_product') ?></a></li>
                </ul>
            </li>
            <!-- Product menu end -->

            <!-- Customer menu start -->
            <li class="treeview <?php
            if ($this->uri->segment('1') == ("Ccustomer")) {
                echo "active";
            } else {
                echo " ";
            }
            ?>">
                <a href="#">
                    <i class="fa fa-handshake-o"></i><span><?php echo display('customer') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Ccustomer') ?>"><?php echo display('add_customer') ?></a></li>
                    <li><a href="<?php echo base_url('Ccustomer/manage_customer') ?>"><?php echo display('manage_customer') ?></a></li>
                    <li><a href="<?php echo base_url('Ccustomer/credit_customer') ?>"><?php echo display('credit_customer') ?></a></li>
                    <li><a href="<?php echo base_url('Ccustomer/paid_customer') ?>"><?php echo display('paid_customer') ?></a></li>
                </ul>
            </li>
            <!--Unit menu start--> 
            <li class="treeview<?php
            if ($this->uri->segment('1') == ("Cunit")) {
                echo "active";
            } else {
                echo " ";
            }
            ?>">
                <a href="#">
                    <i class="fa fa-universal-access""></i><span><?php echo display('unit'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Cunit'); ?>"><?php echo display('add_unit'); ?></a></li>
                    <li><a href="<?php echo base_url('Cunit/manage_unit'); ?>"><?php echo display('manage_unit'); ?></a></li>
                </ul>
            </li>
            <!--Unit menu close--> 

            <!-- Supplier menu start -->
            <li class="treeview <?php
            if ($this->uri->segment('1') == ("Csupplier")) {
                echo "active";
            } else {
                echo " ";
            }
            ?>">
                <a href="#">
                    <i class="ti-user"></i><span><?php echo display('supplier') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Csupplier') ?>"><?php echo display('add_supplier') ?></a></li>
                    <li><a href="<?php echo base_url('Csupplier/manage_supplier') ?>"><?php echo display('manage_supplier') ?></a></li>

                    <li><a href="<?php echo base_url('Csupplier/supplier_ledger_report') ?>"><?php echo display('supplier_ledger') ?></a></li>
                    <li><a href="<?php echo base_url('Csupplier/supplier_sales_details_all') ?>"><?php echo display('supplier_sales_details') ?></a></li> 
                </ul>
            </li>
            <!-- Supplier menu end -->

            <!-- Purchase menu start -->
            <li class="treeview <?php
            if ($this->uri->segment('1') == ("Cpurchase")) {
                echo "active";
            } else {
                echo " ";
            }
            ?>">
                <a href="#">
                    <i class="ti-shopping-cart"></i><span><?php echo display('purchase') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Cpurchase') ?>"><?php echo display('add_purchase') ?></a></li>
                    <li><a href="<?php echo base_url('Cpurchase/manage_purchase') ?>"><?php echo display('manage_purchase') ?></a></li>
                </ul>
            </li>
            <!-- Purchase menu end -->            
            <!-- start return -->
            <li class="treeview <?php
            if ($this->uri->segment('1') == ("Cretrun_m")) {
                echo "active";
            } else {
                echo " ";
            }
            ?>">
                <a href="#">
                    <i class="fa fa-retweet" aria-hidden="true"></i><span><?php echo display('return'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Cretrun_m') ?>"><?php echo display('return'); ?></a></li>
                    <li><a href="<?php echo base_url('Cretrun_m/return_list') ?>"><?php echo display('stock_return_list') ?></a></li>
                    <li><a href="<?php echo base_url('Cretrun_m/supplier_return_list') ?>"><?php echo display('supplier_return_list') ?></a></li>
                    <li><a href="<?php echo base_url('Cretrun_m/wastage_return_list') ?>"><?php echo display('wastage_return_list') ?></a></li>

                </ul>
            </li>

            <!-- Transection menu start -->
            <li class="treeview <?php
            if ($this->uri->segment('1') == ("Caccounts") || $this->uri->segment('1') == ("Account_Controller") || $this->uri->segment('1') == ("Cpayment")) {
                echo "active";
            } else {
                echo " ";
            }
            ?>">
                <a href="#">
                    <i class="fa fa-money"></i><span><?php echo display('accounts') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Account_Controller') ?>"><?php echo display('create_accounts') ?></a></li>
                    <li><a href="<?php echo base_url('Account_Controller/manage_account') ?>"><?php echo display('manage_account') ?></a></li>
                    <li><a href="<?php echo base_url('Cpayment') ?>"><?php echo display('payment') ?></a></li>
                    <li><a href="<?php echo base_url('Cpayment/receipt_transaction') ?>"><?php echo display('receipt') ?></a></li>
                    <li><a href="<?php echo base_url('Cpayment/manage_payment') ?>"><?php echo display('manage_transaction') ?></a></li>
                    <li><a href="<?php echo base_url('Cpayment/closing') ?>"><?php echo display('closing') ?></a></li>
                    <li class="treeview <?php
                    if ($this->uri->segment('2') == ("summaryy") || $this->uri->segment('2') == ("date_summary") || $this->uri->segment('2') == ("custom_report") || $this->uri->segment('2') == ("closing_report")) {
                        echo "active";
                    } else {
                        echo " ";
                    }
                    ?>"><a href=""style="position: relative;"><?php echo display('report') ?>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url('Cpayment/summaryy') ?>"><?php echo display('daily_summary') ?></a></li>
                            <li><a href="<?php echo base_url('Cpayment/date_summary') ?>"><?php echo display('daily_cash_flow') ?></a></li>
                            <!--<li><a href="<?php echo base_url('Cpayment/custom_report') ?>"><?php echo display('custom_report') ?></a></li>-->
                            <li><a href="<?php echo base_url('Cpayment/closing_report') ?>"><?php echo display('closing_report') ?></a></li>
                        </ul>

                    <li><a href="<?php echo base_url('Caccounts/add_tax') ?>"><?php echo display('add_tax') ?></a></li>
                    <li><a href="<?php echo base_url('Caccounts/manage_tax') ?>"><?php echo display('manage_tax') ?></a></li>

            </li>
        </ul>
        </li>
        <!-- Transection menu End -->


        <!-- Stock menu start -->
        <li class="treeview <?php
        if ($this->uri->segment('1') == ("Creport")) {
            echo "active";
        } else {
            echo " ";
        }
        ?>">
            <a href="#">
                <i class="ti-bar-chart"></i><span><?php echo display('stock') ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url('Creport') ?>"><?php echo display('stock_report') ?></a></li>
                <li><a href="<?php echo base_url('Creport/stock_report_supplier_wise') ?>"><?php echo display('stock_report_supplier_wise') ?></a></li>
                <li><a href="<?php echo base_url('Creport/stock_report_product_wise') ?>"><?php echo display('stock_report_product_wise') ?></a></li>
            </ul>
        </li>
        <!-- Stock menu end -->

        <?php
        if ($this->session->userdata('user_type') == '1') {
            ?>
            <!-- Report menu start -->
            <li class="treeview <?php
            if ($this->uri->segment('2') == ("all_report") || $this->uri->segment('2') == ("todays_sales_report") || $this->uri->segment('2') == ("todays_purchase_report") || $this->uri->segment('2') == ("product_sales_reports_date_wise") || $this->uri->segment('2') == ("total_profit_report") || $this->uri->segment('2') == ("purchase_report_category_wise") || $this->uri->segment('2') == ("sales_report_category_wise") || $this->uri->segment('2') == ("filter_purchase_report_category_wise") || $this->uri->segment('2') == ("sales_report_category_wise") || $this->uri->segment('2') == ("todays_customer_receipt") || $this->uri->segment('2') == ("filter_sales_report_category_wise") || $this->uri->segment('2') == ("filter_customer_wise_receipt")) {
                echo "active";
            } else {
                echo " ";
            }
            ?>">
                <a href="#">
                    <i class="ti-book"></i><span><?php echo display('report') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Admin_dashboard/all_report') ?>"><?php echo display('todays_report') ?></a></li>
                    <li><a href="<?php echo base_url('Admin_dashboard/todays_customer_receipt') ?>"><?php echo display('todays_customer_receipt') ?></a></li>
                    <li><a href="<?php echo base_url('Admin_dashboard/todays_sales_report') ?>"><?php echo display('sales_report') ?></a></li>
                    <li><a href="<?php echo base_url('Admin_dashboard/todays_purchase_report') ?>"><?php echo display('purchase_report') ?></a></li>
                    <li><a href="<?php echo base_url('Admin_dashboard/purchase_report_category_wise') ?>"><?php echo display('purchase_report_category_wise') ?></a></li>
                    <li><a href="<?php echo base_url('Admin_dashboard/product_sales_reports_date_wise') ?>"><?php echo display('sales_report_product_wise') ?></a></li>
                    <li><a href="<?php echo base_url('Admin_dashboard/sales_report_category_wise') ?>"><?php echo display('sales_report_category_wise') ?></a></li>

                </ul>
            </li>
            <!-- Report menu end -->

            <!-- Bank menu start -->
            
            <!-- Bank menu end -->

            <!-- Comission start -->
           
            <!-- Comission end -->

            <!-- Personal loan start -->
            
            <!-- Personal loan end -->
            <!--  loan start -->
            
            <!-- loan end -->

            <!-- Synchronizer setting start -->
            <li class="treeview <?php
            if ($this->uri->segment('2') == ("form") || $this->uri->segment('2') == ("synchronize") || $this->uri->segment('1') == ("Backup_restore")) {
                echo "active";
            } else {
                echo " ";
            }
            ?>">
                <a href="#">
                    <i class="ti-reload"></i><span><?php echo display('data_synchronizer') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php
                    $localhost = false;
                    if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1', 'localhost'))) {
                        ?>
                            <!--<li><a href="<?php echo base_url('data_synchronizer/form') ?>"><?php echo display('setting') ?></a></li>-->
                        <?php
                    }
                    ?>
            <!--<li><a href="<?php echo base_url('data_synchronizer/synchronize') ?>"><?php echo display('synchronize') ?></a></li>-->
                    <li><a href="<?php echo base_url('Backup_restore') ?>"><?php echo display('backup_restore') ?></a></li>
                </ul>
            </li>
            <!-- Synchronizer setting end -->

            <!-- Software Settings menu start -->
            <li class="treeview <?php
            if ($this->uri->segment('1') == ("Company_setup") || $this->uri->segment('1') == ("User") || $this->uri->segment('1') == ("Cweb_setting") || $this->uri->segment('1') == ("Language")) {
                echo "active";
            } else {
                echo " ";
            }
            ?>">
                <a href="#">
                    <i class="ti-settings"></i><span><?php echo display('web_settings') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Company_setup/manage_company') ?>"><?php echo display('manage_company') ?></a></li>
                    <li><a href="<?php echo base_url('User') ?>"><?php echo display('add_user') ?></a></li>
                    <li><a href="<?php echo base_url('User/manage_user') ?>"><?php echo display('manage_users') ?> </a></li>
                    <li><a href="<?php echo base_url('Language') ?>"><?php echo display('language') ?> </a></li>
                    <li><a href="<?php echo base_url('Cweb_setting') ?>"><?php echo display('setting') ?> </a></li>
                </ul>
            </li>
            <!-- Software Settings menu end -->
            <?php
        }
        ?>

        </ul>
    </div> <!-- /.sidebar -->
</aside>
<script type="text/javascript">
    $(document).ready(function () {
        $("form :input").attr("autocomplete", "off");
    })
</script>