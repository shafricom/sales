<!-- Product js php -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/json/product.js.php" ></script>

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

<!-- Stock List Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('stock_report') ?></h1>
            <small><?php echo display('all_stock_report') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('stock') ?></a></li>
                <li class="active"><?php echo display('stock_report') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">

        <!-- Alert Message -->
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error_message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('error_message');
        }
        ?>

        <div class="row">
            <div class="col-sm-12">
                <div class="column">
                    <a href="<?php echo base_url('Creport/stock_report_supplier_wise') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('stock_report_supplier_wise') ?> </a>
                    <a href="<?php echo base_url('Creport/stock_report_product_wise') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('stock_report_product_wise') ?> </a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body"> 
                        <?php echo form_open_multipart('Creport', array('class' => 'form-inline', 'id' => 'stock_report')) ?>

                        <?php
                        date_default_timezone_set("Asia/Dhaka");
                        $today = date('Y-m-d');
                        ?>
                        <label class="select"><?php echo display('search_by_product') ?>:</label>
                        <input type="text" name="product_name" onclick="producstList();" class="form-control productSelection" placeholder='<?php echo display('product_name') ?>' id="product_name" required>
                        <input type="hidden" class="autocomplete_hidden_value" name="product_id" id="SchoolHiddenId"/>
                        <label class="select"><?php echo display('date') ?></label>
                        <input type="text" name="stock_date" value="<?php echo $today; ?>" class="form-control productSelection datepicker" required/>
                        <button type="submit" class="btn btn-primary"><?php echo display('search') ?></button>
                        <a  class="btn btn-warning" href="#" onclick="printDiv('printableArea')"><?php echo display('print') ?></a>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('stock_report') ?></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="printableArea" style="margin-left:2px;">

                            <div class="text-center">
                                {company_info}
                                <h3> {company_name} </h3>
                                <h4 >{address} </h4>
                                {/company_info}
                                <h4> <?php echo display('stock_date') ?> : {date} </h4>
                                <h4> <?php echo display('print_date') ?>: <?php echo date("d/m/Y h:i:s"); ?> </h4>
                            </div>

                            <div class="table-responsive" style="margin-top: 10px;">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?php echo display('sl') ?></th>
                                            <th class="text-center"><?php echo display('product_name') ?></th>
                                            <th class="text-center"><?php echo display('product_model') ?></th>
                                            <th class="text-center"><?php echo display('unit') ?></th>
                                            <th class="text-center"><?php echo display('sell_price') ?></th>
                                            <th class="text-center"><?php echo display('in_qnty') ?></th>
                                            <th class="text-center"><?php echo display('out_qnty') ?></th>
                                            <th class="text-center"><?php echo display('stock') ?></th>
                                            <th class="text-center"><?php echo display('stock_sale') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($stok_report) {
                                            ?>
                                            <?php $sl = 1; ?>
                                            <?php
                                            foreach ($stok_report as $stok_report) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td align="center">
                                                        <a href="<?php echo base_url() . 'Cproduct/product_details/' . $stok_report['product_id']; ?>">
                                                            <?php echo $stok_report['product_name']; ?>
                                                        </a>	
                                                    </td>
                                                    <td align="center">
                                                        <?php echo $stok_report['product_model']; ?>
                                                        <br><small><?php echo $stok_report['serial_no']; ?></small>
                                                    </td>                                                    
                                                    <td align="center"><?php echo $stok_report['unit']; ?></td>
                                                    <td style="text-align: right;"><?php
                                                        echo (($position == 0) ? "$currency " : "$currency");
                                                        echo $stok_report['sales_price'];
                                                        ?>
                                                    </td>

                                                    <td align="center">
                                                        <?php
                                                        $totalPurchaseQnty = $stok_report['totalPurchaseQnty'];
//                                                        "$currency " . ? sign er por chilo 
                                                        echo (($position == 0) ? number_format($totalPurchaseQnty, 2, '.', ',') : number_format($totalPurchaseQnty, 2, '.', ',') . " $currency");
                                                        ?>
                                                    </td>
                                                    <td align="center">
                                                      <?php
                                                        $totalSalesQnty = $stok_report['totalSalesQnty'];
                                                        echo (($position == 0) ? number_format($totalSalesQnty, 2, '.', ',') : number_format($totalSalesQnty, 2, '.', ',') . " $currency");
                                                        ?>
                                                    </td>
                                                    <td align="center"><?php
                                                        $stok_quantity_cartoon = $stok_report['stok_quantity_cartoon'];
                                                        echo (($position == 0) ? number_format($stok_quantity_cartoon, 2, '.', ',') : number_format($stok_quantity_cartoon, 2, '.', ',') . " $currency");
                                                        ?></td>
                                                    <td align="center"><?php
                                                        $total_sale_price = $stok_report['total_sale_price'];
                                                        echo (($position == 0) ? "$currency " . number_format($total_sale_price, 2, '.', ',') : number_format($total_sale_price, 2, '.', ',') . " $currency");
                                                        ?></td>
                                                </tr>
                                                <?php $sl++; ?>
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
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" align="right"><b><?php echo display('grand_total') ?>:</b></td>
                                            <td align="center"><b>{sub_total_in}</b></td>
                                            <td align="center"><b>{sub_total_out}</b></td>
                                            <td align="center"><b>{sub_total_stock}</td>
                                            <td align="center"><b>{stock_sale}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="text-center">
                            <?php
                            if (isset($link)) {
                                echo $link;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Stock List End -->