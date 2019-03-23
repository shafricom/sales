<!-- Person ledger start -->
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


<!-- Person Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('cashflow') ?></h1>
            <small><?php echo display('cashflow') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('cashflow') ?></a></li>
                <li class="active"><?php echo display('cashflow') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
        <!-- Manage Product report -->

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body"> 
                        <?php echo form_open('Cpayment/search_datewise/', array('class' => 'form-inline',)) ?>
                        <?php $today = date('Y-m-d'); ?>
                        <label class="select"><?php echo display('search_by_date') ?>: <?php echo display('from') ?></label>
                        <input type="text" name="from_date"  value="<?php echo $today; ?>" class="datepicker form-control"/>
                        <label class="select"><?php echo display('to') ?></label>
                        <input type="text" name="to_date" value="<?php echo $today; ?>" class="datepicker form-control"/>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i>
                            <?php echo display('search') ?></button>
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
                            <h4></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="printableArea" style="margin-left:2px;">



                            <div class="table-responsive" style="margin-top: 10px;">





                                <p style="font-size: 17px; color: black; font-weight:bold">
                                    <?php
//                                    echo display('company_name');
//                                    echo "<br>";
//
//                                    echo "<br>";
                                    ?> From: {start}; To: {endt}

                                <table id="dataTableExample3" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('sl') ?></th>
                                            <th class="text-center"><?php echo display('name') ?></th>
                                            <th class="text-center"><?php echo display('account_name') ?></th>
                                            <th class="text-center"><?php echo display('receipt_amount') ?></th>
                                            <th class="text-center"><?php echo display('paid_amount') ?></th>
                                            <th class="text-center"><?php echo display('action') ?></th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
//                                        echo '<pre>';    print_r($ledger); //die();
                                        if ($ledger) {
                                            ?>
                                            <?php
                                            $sl = 0;
                                            $debit = $credit = $balance = 0;
                                            foreach ($ledger as $single) {
                                                $sl++
                                                ?>
                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($single['supplier_name']) {
                                                            echo $single['supplier_name'];
                                                        } elseif($single['customer_name']) {
                                                            echo $single['customer_name'];
                                                        }elseif($single['person_name']) {
                                                            echo $single['person_name'];
                                                        }elseif($single['office_person_name']) {
                                                            echo $single['office_person_name'];
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                        $tran_cat = $single['transection_category'];
                                                        if ($tran_cat == 1) {
                                                            echo "supplier";
                                                        } elseif ($tran_cat == 2) {
                                                            echo "customer";
                                                        } elseif ($tran_cat == 3) {
                                                            echo "Office";
                                                        } elseif ($tran_cat == 5) {
                                                            echo "Salary";
                                                        } else {
                                                            echo "Loan";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td align="right">
                                                        <?php
                                                        if ($single['amount']) {
                                                            echo (($position == 0) ? "$currency " : " $currency");
                                                            echo number_format($single['amount'], '2', '.', ',');
                                                            $debit += $single['amount'];
                                                        } else {
                                                            $debit += '0.00';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td align="right">
                                                        <?php
                                                        if ($single['pay_amount']) {
                                                            echo (($position == 0) ? "$currency " : " $currency");
                                                            echo number_format($single['pay_amount'], '2', '.', ',');
                                                            $credit += $single['pay_amount'];
                                                        } else {
                                                            $credit += '0.00';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td align="center">
                                                        <a href="<?php echo base_url() . 'Cpayment/payment_update_form/' . $single['transaction_id']; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        <a href="" class="deletePayment btn btn-danger btn-sm" name="<?php echo $single['transaction_id']; ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>

                                    <tfoot>
                                        <tr  align="right">
                                            <td colspan="3"  align="right"><b>Total:</b></td>
                                            <td align="right"><b>
                                                    <?php
                                                    echo (($position == 0) ? "$currency " : "$currency");
                                                    echo number_format(@$debit, '2', '.', ',');
                                                    ?></b>
                                            </td>
                                            <td align="right"><b>
                                                    <?php
                                                    echo (($position == 0) ? "$currency " : "$currency");
                                                    echo number_format(@$credit, '2', '.', ',');
                                                    ?></b>
                                            </td>
                                            <td></td>
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
<!-- Person ledger End -->

<!-- Modal start -->
<!-- Link trigger modal -->


<!-- Default bootstrap modal example -->


<!-- Modal end -->

<!-- modal popup script -->
<script type="text/javascript">

    function report_popup(transection_category)
    {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Cpayment/today_details'); ?>",
            data: "transection_category=" + transection_category,
            success: function (response) {
                $(".displaycontent").html(response);

            }
        });
    }
</script>

<div class="modal fade displaycontent" id="myModal">
    <script type="text/javascript">
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            // add a zero in front of numbers<10
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
            t = setTimeout(function () {
                startTime()
            }, 500);
        }

        startTime();
    </script>