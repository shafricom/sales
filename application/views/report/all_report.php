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
            <h1><?php echo display('todays_report') ?></h1>
            <small><?php echo display('todays_sales_and_purchase_report') ?></small>
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

        <!-- Todays sales report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('todays_sales_report') ?> </h4>
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
                                <h4> <?php echo display('print_date') ?>: <?php echo date("d/m/Y h:i:s"); ?> </h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('sales_date') ?></th>
                                            <th><?php echo display('invoice_no') ?></th>
                                            <th><?php echo display('customer_name') ?></th>
                                            <th class="text-right"><?php echo display('total_amount') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($sales_report) {
                                            ?>
                                            {sales_report}
                                            <tr>
                                                <td>{sales_date}</td>
                                                <td>
                                                    <a href="<?php echo base_url() . 'Cinvoice/invoice_inserted_data/{invoice_id}'; ?>">
                                                        {invoice_id}
                                                    </a>
                                                </td>
                                                <td>{customer_name}</td>
                                                <td style="text-align: right;"><?php echo (($position == 0) ? "$currency {total_amount}" : "{total_amount} $currency") ?></td>
                                            </tr>
                                            {/sales_report}
                                        <?php } else {
                                            ?>
                                            <tr>
                                                <th class="text-center" colspan="6"><?php echo display('not_found'); ?></th>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" align="right"  style="text-align:right;font-size:14px !Important">&nbsp;<b><?php echo display('total_sales') ?>:</b></td>
                                            <td style="text-align: right;"><b><?php echo (($position == 0) ? "$currency {sales_amount}" : "{sales_amount} $currency") ?></b></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Todays purchase report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('todays_purchase_report') ?></h4>
                            <p class="text-right">
                                <a  class="btn btn-warning" href="#" onclick="printDiv('purchase_div')"><?php echo display('print') ?></a>
                            </p>
                        </div>
                    </div>
                    <div class="panel-body">


                        <div id="purchase_div" style="margin-left:2px;">
                            <div class="text-center">
                                {company_info}
                                <h3> {company_name} </h3>
                                <h4 >{address} </h4>
                                {/company_info}
                                <h4> <?php echo display('stock_date') ?> : {date} </h4>
                                <h4> <?php echo display('print_date') ?>: <?php echo date("d/m/Y h:i:s"); ?> </h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('purchase_date') ?></th>
                                            <th><?php echo display('invoice_no') ?></th>
                                            <th><?php echo display('supplier_name') ?></th>
                                            <th class="text-right"><?php echo display('total_amount') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($purchase_report) {
                                            ?>
                                            {purchase_report}
                                            <tr>
                                                <td>{prchse_date}</td>
                                                <td>
                                                    <a href="<?php echo base_url() . 'Cpurchase/purchase_details_data/{purchase_id}'; ?>">
                                                        {chalan_no}
                                                    </a>
                                                </td>
                                                <td>{supplier_name}</td>
                                                <td style="text-align: right;"><?php echo (($position == 0) ? "$currency {grand_total_amount}" : "{grand_total_amount} $currency") ?></td>
                                            </tr>
                                            {/purchase_report}
                                            <?php } else {
                                            ?>
                                            <tr>
                                                <th class="text-center" colspan="6"><?php echo display('not_found'); ?></th>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" align="right" style="text-align:right;font-size:14px !Important">&nbsp; <b><?php echo display('total_purchase') ?>: </b></td>
                                            <td style="text-align: right;"><b><?php echo (($position == 0) ? "$currency {purchase_amount}" : "{purchase_amount} $currency") ?></b></td>
                                        </tr>
                                    </tfoot>
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