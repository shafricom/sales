<!-- Stock report start -->
<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        document.body.style.marginTop = "0px";
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
<!-- All Report Start  -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('todays_customer_receipt') ?></h1>
            <small><?php echo display('todays_customer_receipt') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active"><?php echo display('todays_report') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-sm-12">
                <div class="column">

                    <a href="<?php echo base_url('Admin_dashboard/todays_sales_report') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('sales_report') ?> </a>

                    <a href="<?php echo base_url('Admin_dashboard/todays_purchase_report') ?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('purchase_report') ?> </a>

                    <a href="<?php echo base_url('Admin_dashboard/product_sales_reports_date_wise') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('sales_report_product_wise') ?> </a>

                    <a href="<?php echo base_url('Admin_dashboard/total_profit_report') ?>" class="btn btn-warning m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('profit_report') ?> </a>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body"> 
                        <?php echo form_open('Admin_dashboard/filter_customer_wise_receipt', array('class' => 'form-inline', 'method' => 'post')) ?>
                        <?php
                        date_default_timezone_set("Asia/Dhaka");
                        $today = date('Y-m-d');
//                        echo '<pre>';                        print_r($all_customer);die();
//                          foreach ($all_customer as $customer) {
//                              echo $customer->customer_name;
////                                    echo "<option value='$category->category_id'>$category->category_name</option>";
//                                }
                        ?>
                        <div class="form-group">
                            <label class="" for="customer_id"><?php echo display('customer_name') ?></label>
                            <select  name="customer_id" class="form-control" id="customer_id">
                                <option value="">--select one -- </option>
                                <?php
                                foreach ($all_customer as $customer) {
                                    ?>
                                    <option value="<?php echo $customer->customer_id; ?>"><?php echo $customer->customer_name; ?></option>
                                <?php } ?>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label class="" for="from_date"><?php echo display('date') ?></label>
                            <input type="text" name="from_date" class="form-control datepicker" id="from_date" placeholder="<?php echo display('date') ?>" value="">
                        </div> 

                        <button type="submit" class="btn btn-success"><?php echo display('search') ?></button>
                        <!--<a  class="btn btn-warning" href="#" onclick="printDiv('purchase_div')"><?php echo display('print') ?></a>-->
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Todays sales report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('todays_customer_receipt') ?> </h4>
                            <p class="text-right">
                                <a  class="btn btn-warning btn-sm" href="#" onclick="printDiv('printableArea')"><?php echo display('print') ?></a>
                            </p>
                        </div>
                    </div>
                    <div class="panel-body">


                        <div id="printableArea" style="margin-left:2px;">
                            <div class="text-center">
                                {company_info}
                                <h3> {company_name} </h3>
                                <h4 >{address} </h4>
                                {/company_info}
                                <h4> <?php echo display('print_date') ?>: <?php echo date("Y/m/d h:i:s"); ?> </h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('sl') ?></th>
                                            <th><?php echo display('customer_name') ?></th>
                                            <th class="text-right"><?php echo display('receipt') ?></th>
                                            <!--<th class="text-right"><?php echo "Balance"; ?></th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
//                                        echo '<pre>'; print_r($todays_customer_receipt);
                                        if ($todays_customer_receipt) {
                                            $sl = 0;
                                            foreach ($todays_customer_receipt as $single) {
//                                            echo $single->customer_id;
//                                                $sql = "SELECT (SELECT SUM(amount) FROM customer_ledger WHERE customer_id = '" . $single->customer_id . "' 
//                                                    and date <= '" . $today . "' and invoice_no IS NOT NULL) as total_invoice, (SELECT SUM(amount) 
//                                                    FROM customer_ledger WHERE customer_id = '" . $single->customer_id . "' and date <= '" . $today . "' 
//                                                    and receipt_no IS NOT NULL) as total_receipt";
//                                                $query = $this->db->query($sql)->row();
//                                                echo '<pre>'; print_r($query);
//                                                if ($query->total_invoice == null) {
//                                                    echo 'XXX';
//                                                }
                                                $sl++;
                                                ?>
                                                <tr>
                                                    <td> <?php echo $sl; ?></td>
                                                    <td>
                                                        <?php echo $single->customer_name; ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        echo (($position == 0) ? "$currency $single->total_amount" : "$single->total_amount $currency");
                                                        ?>
                                                    </td>
        <!--                                                        <td class="text-right"><?php // echo $single->total_amount;   ?></td>
                                                    <td class="text-right"><?php // echo $query->total_invoice - $query->total_receipt;   ?></td>-->
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <th class="text-center" colspan="6"><?php echo display('not_found'); ?></th>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
<!--                                    <tfoot>
                                        <tr>
                                            <td colspan="3" align="right"  style="text-align:right;font-size:14px !Important">&nbsp;<b><?php echo display('total_sales') ?>:</b></td>
                                            <td style="text-align: right;"><b><?php echo (($position == 0) ? "$currency {sales_amount}" : "{sales_amount} $currency") ?></b></td>
                                        </tr>
                                    </tfoot>-->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<!-- All Report End -->