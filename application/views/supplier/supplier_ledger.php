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

<!-- Supplier Ledger Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('supplier_ledger') ?></h1>
            <small><?php echo display('manage_supplier_ledger') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('supplier') ?></a></li>
                <li class="active"><?php echo display('supplier_ledger') ?></li>
            </ol>
        </div>
    </section>

    <!-- Supplier information -->
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
                    <a href="<?php echo base_url('Csupplier') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-plus"> </i> <?php echo display('add_supplier') ?> </a>

                    <a href="<?php echo base_url('Csupplier/manage_supplier') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('manage_supplier') ?> </a>

                    <a href="<?php echo base_url('Csupplier/supplier_sales_details_all') ?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('supplier_sales_details') ?> </a>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body"> 
                        <?php echo form_open('Csupplier/supplier_ledger', array('class' => '', 'id' => 'validate')) ?>
                        <?php $today = date('Y-m-d'); ?>

                        <div class="form-group row">
                            <label for="supplier_name" class="col-sm-3 col-form-label"><?php echo display('select_supplier') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select name="supplier_id"  class="form-control" required="">
                                    <option value=""></option>
                                    <?php if ($supplier) { ?>
                                        {supplier}
                                        <option value="{supplier_id}">{supplier_name} 
                                        </option>
                                        {/supplier}
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-3 col-form-label"><?php echo display('select_report') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select name="cat" class="form-control"  id='purpose'>
                                    <option value=""></option>
                                    <option value="1"><?php echo display('supplier_ledger') ?> </option>
                                    <option value="2"><?php echo display('supplier_details') ?> </option>
                                    <option value="3"><?php echo display('supplier_summary') ?></option>
                                    <option value="4"><?php echo display('sales_payment_actual') ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address " class="col-sm-3 col-form-label">Supplier All</label>
                            <div class="col-sm-6">
                                <select name="rep_cat" class="form-control"  >
                                    <option value="1">select All</option>
                                    <option value="all">All</option>
                                </select>
                            </div>
                        </div>

                        <div class="" id="datebetween" style="display:none;">
                            <div class="form-group row">
                                <label for="from_date " class="col-sm-3 col-form-label"> <?php echo display('from') ?></label>
                                <div class="col-sm-6">
                                    <input type="text" name="from_date"  value="<?php echo $today; ?>" class="datepicker form-control" id="from_date"/>
                                </div>
                            </div>      

                            <div class="form-group row">
                                <label for="to_date" class="col-sm-3 col-form-label"> <?php echo display('to') ?></label>
                                <div class="col-sm-6">
                                    <input type="text" name="to_date" value="<?php echo $today; ?>" class="datepicker form-control" id="to_date"/>
                                </div>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="details" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-6 text-center">
                                <button type="submit" class="btn btn-success "><i class="fa fa-search-plus" aria-hidden="true"></i> <?php echo display('generate') ?></button>
                                <a  class="btn btn-warning" href="#" onclick="printDiv('printableArea')"><?php echo display('print') ?></a>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Supplier ledger -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('supplier_ledger') ?></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="printableArea" style="margin-left:2px;">

                            <?php if ($supplier_name) { ?>
                                <div class="text-center">
                                    <h3> {supplier_name} </h3>
                                    <h4><?php echo display('address') ?> : {address} </h4>
                                    <h4> <?php echo display('print_date') ?>: <?php echo date("d/m/Y h:i:s"); ?> </h4>
                                </div>
                            <?php } ?>

                            <div class="table-responsive">

                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?php echo display('date') ?></th>
                                            <th class="text-center"><?php echo display('description') ?></th>
                                            <th class="text-center"><?php echo display('invoice_no') ?></th>
                                            <th class="text-center"><?php echo display('deposite_id') ?></th>
                                            <th class="text-right"><?php echo display('debit') ?></th>
                                            <th class="text-right"><?php echo display('credit') ?></th>
                                            <th class="text-right"><?php echo display('balance') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($ledgers) {
//                                        echo '<pre>';                                        print_r($ledgers);die();
                                            $sl = 0;
                                            $debit = $credit = $balance = 0;
                                            foreach ($ledgers as $ledger) {
                                                $sl++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $ledger['description']; ?></td>
                                                    <td><a href="<?php echo base_url(); ?>Cpurchase/purchase_details_data/<?php echo $ledger['transaction_id']; ?>"><?php echo $ledger['chalan_no']; ?></a></td>
                                                    <td><?php echo @$ledger['deposit_no']; ?></td>
                                                    <td align="right">
                                                        <?php
                                                        if ($ledger['d_c'] == 'd') {
                                                            echo (($position == 0) ? "$currency " : " $currency");
                                                            echo number_format($ledger['amount'], 2, '.', ',');
                                                            $debit += $ledger['amount'];
//                                                         $d = 12;
                                                        } else {
                                                            $debit += '0.00';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td align="right">
                                                        <?php
                                                        if ($ledger['d_c'] == 'c') {
                                                            echo (($position == 0) ? "$currency " : " $currency");
                                                            echo number_format($ledger['amount'], 2, '.', ',');
                                                            $credit += $ledger['amount'];
                                                        } else {
                                                            $credit += '0.00';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td align='right'>
                                                        <?php
                                                        $balance = $debit - $credit;
                                                        echo (($position == 0) ? "$currency " : " $currency");
                                                        echo number_format($balance, 2, '.', ',');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" align="right"><b><?php echo display('grand_total') ?>:</b></td>
                                            <td align="right"><b><?php
                                                    echo (($position == 0) ? "$currency " : "$currency");
                                                    echo number_format((@$debit), 2, '.', ',');
                                                    ?></b>
                                            </td>
                                            <td align="right"><b><?php
                                                    echo (($position == 0) ? "$currency " : "$currency");
                                                    echo number_format((@$credit), 2, '.', ',');
                                                    ?></b>
                                            </td>
                                            <td align="right"><b><?php
                                                    echo (($position == 0) ? "$currency " : "$currency");
                                                    echo number_format((@$balance), 2, '.', ',');
                                                    ?></b></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="text-right"><?php echo $links ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Supplier Ledger End  -->
<script type="text/javascript">
    $('#purpose').on('change', function () {
        var x = 0;
        if (this.value > x) {
            $("#datebetween").show();
        } else {
            $("#datebetween").hide();
        }
    });
</script>