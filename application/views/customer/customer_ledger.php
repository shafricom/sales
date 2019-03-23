<!-- Customer Ledger Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('customer_ledger') ?></h1>
            <small><?php echo display('manage_customer_ledger') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('customer') ?></a></li>
                <li class="active"><?php echo display('customer_ledger') ?></li>
            </ol>
        </div>
    </section>

    <!-- Customer information -->
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

                    <a href="<?php echo base_url('Ccustomer') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-plus"> </i> <?php echo display('add_customer') ?> </a>

                    <a href="<?php echo base_url('Ccustomer/manage_customer') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('manage_customer') ?> </a>

                    <a href="<?php echo base_url('Ccustomer/credit_customer') ?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('credit_customer') ?> </a>

                    <a href="<?php echo base_url('Ccustomer/paid_customer') ?>" class="btn btn-warning m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('paid_customer') ?> </a>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('customer_information') ?></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div style="float:left">
                            {company_info}
                            <h5><u> {company_name}</u></h5>
                            {/company_info}
                            <?php echo display('customer_name') ?> : {customer_name} <br>
                            <?php echo display('customer_address') ?> : {customer_address}<br>
                            <?php echo display('mobile') ?> : {customer_mobile}
                        </div>
                        <div style="float:right;margin-right:100px">
                            <?php
                            $sql = 'SELECT (SELECT SUM(amount) FROM customer_ledger WHERE d_c = "d" AND customer_id = "' . $customer_id . '") dr, 
		(SELECT sum(amount) FROM customer_ledger WHERE d_c = "c" AND customer_id = "' . $customer_id . '") cr';
//                            echo $sql;die();
                            $result = $this->db->query($sql)->result();
//                            echo '<pre>';                            print_r($result); echo $result[0]->dr; die();
                            ?>
                            <table class="table table-striped table-condensed table-bordered">
                                <tr>
                                    <td> <?php echo display('debit_ammount') ?> </td>
                                    <td style="text-align:right !Important;margin-right:20px">
                                        <?php echo (($position == 0) ? "$currency " . $result[0]->dr : $result[0]->dr . " $currency") ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo display('credit_ammount'); ?></td> 
                                    <td style="text-align:right !Important;margin-right:20px"> 
                                        <?php echo (($position == 0) ? "$currency " . $result[0]->cr : $result[0]->cr . " $currency") ?>
                                    </td> 
                                </tr>
                                <tr>
                                    <td><?php echo display('balance_ammount'); ?> </td>
                                    <td style="text-align:right !Important;margin-right:20px"> 
                                        <?php
                                        $balance = $result[0]->dr - $result[0]->cr;
                                        echo (($position == 0) ? "$currency " . $balance : $balance . " $currency")
                                        ?>
                                    </td> 
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Ledger -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('customer_ledger') ?></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><?php echo display('date') ?></th>
                                        <th><?php echo display('invoice_no') ?></th>
                                        <th><?php echo display('receipt_no') ?></th>
                                        <th><?php echo display('description') ?></th>
                                        <th style="text-align:right !Important;margin-right:20px"><?php echo display('debit') ?></th>
                                        <th style="text-align:right !Important;margin-right:20px"><?php echo display('credit') ?></th>
                                        <th style="text-align:right !Important;margin-right:20px"><?php echo display('balance') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($ledgers) {
//                                        echo '<pre>';                                        print_r($ledgers);
                                        ?>
                                        <?php
                                        $debit = $credit = $balance = 0;
                                        foreach ($ledgers as $single) {
                                            # code...
                                            ?>
                                            <tr>
                                                <td><?php echo date('d-M-Y', strtotime($single['date'])); ?></td>
                                                <td>
                                                    <a href="<?php echo base_url() . 'Cinvoice/invoice_inserted_data/' . $single['invoice_no']; ?>">

                                                        <?php
                                                        echo $single['invoice_no'];
//                                                        if ($ledger['receipt_no'] == '') {
//                                                            echo $ledger['invoce_no'];
//                                                        }
                                                        ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php echo $single['receipt_no'] ?>
        <!--                                                    <a href="<?php echo base_url() . 'Cinvoice/receipt_inserted_data/' . $single['receipt_no']; ?>">
        <?php echo $single['receipt_no'] ?></a>-->

                                                </td>
                                                <td><?php echo $single['description'] ?></td>
                                                <td style="text-align:right;"> 
                                                    <?php
                                                    if ($single['d_c'] == 'd') {
                                                        echo (($position == 0) ? "$currency " : " $currency");
                                                        echo number_format($single['amount'], '2', '.', ',');
                                                        $debit += $single['amount'];
                                                    } else {
                                                        $debit += '0.00';
                                                    }
                                                    ?>
                                                </td>
                                                <td style="text-align:right;"> 
                                                    <?php
                                                    if ($single['d_c'] == 'c') {
                                                        echo (($position == 0) ? "$currency " : " $currency");
                                                        echo number_format($single['amount'], '2', '.', ',');
                                                        $credit += $single['amount'];
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
                                        <?php } ?>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" align="right"><b><?php echo display('grand_total') ?>:</b></td>
                                        <td align="right">
                                            <b>
                                                <?php
                                                echo (($position == 0) ? "$currency " : "$currency");
                                                echo number_format((@$debit), 2, '.', ',');
                                                ?>
                                            </b>
                                        </td>
                                        <td align="right">
                                            <b>
                                                <?php
                                                echo (($position == 0) ? "$currency " : "$currency");
                                                echo number_format((@$credit), 2, '.', ',');
                                                ?>
                                            </b>
                                        </td>
                                        <td align="right">
                                            <b>
                                                <?php
                                                echo (($position == 0) ? "$currency " : "$currency");
                                                echo number_format((@$balance), 2, '.', ',');
                                                ?>
                                            </b>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Customer Ledger End  -->