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

<!-- Stock List Supplier Wise Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('stock_report_supplier_wise') ?></h1>
            <small><?php echo display('stock_report_supplier_wise') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('stock') ?></a></li>
                <li class="active"><?php echo display('stock_report_supplier_wise') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-sm-12">
                <div class="column">

                    <a href="<?php echo base_url('Creport/stock_report_product_wise') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('stock_report_product_wise') ?> </a>

                    <a href="<?php echo base_url('Creport') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('stock_report') ?> </a>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body"> 

                        <?php echo form_open('Creport/stock_report_supplier_wise', array('class' => 'form-vertical', 'id' => 'stock_report_supplier_wise')); ?>

                        <?php
                        date_default_timezone_set("Asia/Dhaka");
                        $today = date('Y-m-d');
                        ?>

                        <div class="form-group row">
                            <label for="supplier_id" class="col-sm-3 col-form-label"><?php echo display('select_supplier') ?>: <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select class="form-control" id="supplier_id" name="supplier_id" required="">
                                    <option value=""><?php echo display('select_one') ?></option>
                                    {supplier_list}
                                    <option value="{supplier_id}">{supplier_name} </option>
                                    {/supplier_list}
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_id" class="col-sm-3 col-form-label"><?php echo display('select_product') ?>: <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select class="form-control" id="product_id" name="product_id" required="">

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="from_date" class="col-sm-3 col-form-label"><?php echo display('from') ?>: <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" id="from_date" name="from_date" value="<?php echo $today; ?>" class="form-control datepicker" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="to_date" class="col-sm-3 col-form-label"><?php echo display('to') ?>: <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" id="to_date" name="to_date" value="<?php echo $today; ?>" class="form-control datepicker" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-6 text-center">
                                <button type="submit" class="btn btn-primary"><?php echo display('search') ?></button>
                                <a  class="btn btn-warning" href="#" onclick="printDiv('printableArea')"><?php echo display('print') ?></a>
                            </div>
                        </div>

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
                            <h4><?php echo display('stock_report_supplier_wise') ?></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="printableArea" style="margin-left:2px;">
                            <div class="text-center">
                                <?php if ($supplier_info) { ?>
                                    {supplier_info}
                                    <h3> {supplier_name} </h3>
                                    <h4><?php echo display('address') ?> : {address} </h4>
                                    <h4 ><?php echo display('phone') ?> : {mobile} </h4>
                                    {/supplier_info}
                                    <h4><?php echo display('product_model') ?>:{product_model}</h4>
                                <?php } ?>	
                                <h4> <?php echo display('stock_date') ?> : {date} </h4>
                                <h4> <?php echo display('print_date') ?>: <?php echo date("d/m/Y h:i:s"); ?> </h4>
                            </div>

                            <div class="table-responsive" style="margin-top: 10px;">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr><th class="text-center"><?php echo display('sl') ?></th>
                                            <th class="text-center"><?php echo display('date') ?></th>
                                            <th class="text-center"><?php echo display('product_model') ?></th>

                                            <th class="text-center"><?php echo display('in_quantity') ?></th>
                                            <th class="text-center"><?php echo display('out_quantity') ?></th>
                                            <th class="text-center"><?php echo display('stock') ?></th>
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
                                                <tr><td><?php echo $sl; ?></td>
                                                    <td><?php echo $stok_report['date']; ?></td>
                                                    <td align="center">
                                                        <a href="<?php echo base_url() . 'Cproduct/product_details/' . $stok_report['product_id']; ?>"><?php echo $stok_report['product_model']; ?></a>	
                                                    </td>

                                                    <td style="text-align: right;">
                                                        <?php
                                                        $totalPurchaseQnty = $stok_report['totalPurchaseQnty'];
                                                        echo (($position == 0) ? number_format($totalPurchaseQnty, 2, '.', ',') : number_format($totalPurchaseQnty, 2, '.', ',') . " $currency");
                                                        ?></td>
                                                    <td style="text-align: right;"><?php
                                                        $totalSalesQnty = $stok_report['totalSalesQnty'];
                                                        echo (($position == 0) ? number_format($totalSalesQnty, 2, '.', ',') : number_format($totalSalesQnty, 2, '.', ',') . " $currency");
                                                        ?></td>


                                                    <td style="text-align: right;"><?php
                                                        $SubTotalStock = $stok_report['SubTotalStock'];
                                                        echo (($position == 0) ? number_format($SubTotalStock, 2, '.', ',') : number_format($SubTotalStock, 2, '.', ',') . " $currency");
                                                        ?></td>
                                                </tr>
                                                <?php $sl++; ?>
                                            <?php } ?>
                                            <?php
                                        }else{ ?>                                        
                                                    <tr>
                                                        <th class="text-center" colspan="6"><?php echo display('not_found'); ?></th>
                                                    </tr> 
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" align="right"><b><?php echo display('grand_total') ?>:</b></td>

                                            <td style="text-align: right;"><b>{SubTotalinQnty}</b></td>

                                            <td style="text-align: right;"><b>{SubTotaloutQnty}</b></td>

                                            <td  style="text-align: right;"><b>{sub_total_stock}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="text-right"><?php echo $links ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Stock List Supplier Wise End -->

<!-- Stock Product By Supplier -->
<script type="text/javascript">
    $('#supplier_id').change(function (e) {
        var supplier_id = $(this).val();
        $.ajax({
            type: "post",
            async: false,
            url: '<?php echo base_url('Creport/get_product_by_supplier') ?>',
            data: {supplier_id: supplier_id},
            success: function (data) {
                if (data) {
                    $("#product_id").html(data);
                } else {
                    $("#product_id").html("Product not found !");
                }
            },
            error: function () {
                alert('Request Failed, Please check your code and try again!');
            }
        });
    });
</script>