<!-- Admin Home Start -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>

        </div>
        <div class="header-title">
            <h1><?php echo display('dashboard') ?></h1>
            <small><?php echo display('home') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li class="active"><?php echo display('dashboard') ?></li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
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
        <!-- First Counter -->
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number"><?php echo $total_customer ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                            <div class="small"><?php echo display('total_customer') ?></div>
                            <div class="sparkline1 text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number"><?php echo $total_product ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                            <div class="small"><?php echo display('total_product') ?></div>
                            <div class="sparkline1 text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number"><?php echo $total_suppliers ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> </span></h2>
                            <div class="small"><?php echo display('total_supplier') ?></div>
                            <div class="sparkline1 text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number"><?php echo $total_sales ?></span><span class="slight"> <i class="fa fa-play fa-rotate-270 text-warning"> </i> </span></h2>
                            <div class="small"><?php echo display('total_invoice') ?></div>
                            <div class="sparkline1 text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- Second Counter -->
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="slight" style="margin-left: 70px;">
                                    <img src="<?php echo base_url('my-assets/image/pos_invoice.png'); ?>" height="40" width="40" >
                                </span></h2>
                            <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;"><a href="<?php echo base_url('Cinvoice/pos_invoice') ?>"><?php echo display('create_pos_invoice') ?></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="slight" style="margin-left: 70px;"><img src="<?php echo base_url('my-assets/image/invoice.png'); ?>" height="40" width="40" > </span></h2>
                            <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;"><a href="<?php echo base_url('Cinvoice') ?>"><?php echo display('create_new_invoice') ?></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="slight" style="margin-left: 70px;"><img src="<?php echo base_url('my-assets/image/product.png'); ?>" height="40" width="40" > </span></h2>
                            <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;"><a href="<?php echo base_url('Cproduct') ?>"><?php echo display('add_product') ?></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="slight" style="margin-left: 70px;"><img src="<?php echo base_url('my-assets/image/customer.png'); ?>" height="40" width="40" > </span></h2>
                            <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;"><a href="<?php echo base_url('Ccustomer') ?>"><?php echo display('add_customer') ?></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($this->session->userdata('user_type') == '1') { ?>
            <!-- Third Counter -->
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="panel panel-bd">
                        <div class="panel-body">
                            <div class="statistic-box">
                                <h2><span class="slight" style="margin-left: 70px;"><img src="<?php echo base_url('my-assets/image/sale.png'); ?>" height="40"> </span></h2>
                                <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;"><a href="<?php echo base_url('Admin_dashboard/todays_sales_report') ?>"><?php echo display('sales_report') ?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="panel panel-bd">
                        <div class="panel-body">
                            <div class="statistic-box">
                                <h2><span class="slight" style="margin-left: 70px;"><img src="<?php echo base_url('my-assets/image/purchase.png'); ?>" height="40"> </span></h2>
                                <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;"><a href="<?php echo base_url('Admin_dashboard/todays_purchase_report') ?>"><?php echo display('purchase_report') ?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="panel panel-bd">
                        <div class="panel-body">
                            <div class="statistic-box">
                                <h2><span class="slight" style="margin-left: 70px;"><img src="<?php echo base_url('my-assets/image/stock.png'); ?>" height="40"> </span></h2>
                                <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;"><a href="<?php echo base_url('Creport') ?>"><?php echo display('stock_report') ?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="panel panel-bd">
                        <div class="panel-body">
                            <div class="statistic-box">
                                <h2><span class="slight" style="margin-left: 70px;"><img src="<?php echo base_url('my-assets/image/account.png'); ?>" height="40"></span></h2>
                                <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;"><a href="<?php echo base_url('Cretrun_m/return_list') ?>"><?php echo display('stock_return') ?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <!-- This month progress -->
                <div class="col-sm-12 col-md-8">
                    <div class="panel panel-bd">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4 style="display: inline-block; line-height: 34px;"> <?php echo display('best_sale_product') ?></h4>
                                <a href="<?php echo base_url(); ?>Admin_dashboard/see_all_best_sales" class="btn btn-success text-white" style="display: inline-block; float: right;">See All</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <canvas id="lineChart" height="142"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Total Report -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4><?php echo display('todays_overview') ?></h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="message_inner">
                                <div class="message_widgets">

                                    <table class="table table-bordered table-striped table-hover">
                                        <tr>
                                            <th><?php echo display('todays_report') ?></th>
                                            <th><?php echo display('money') ?></th>
                                        </tr>
                                        <tr>
                                            <th><?php echo display('total_sales') ?></th>
                                            <td><?php echo (($position == 0) ? "$currency $sales_amount" : "$sales_amount $currency") ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo display('total_purchase') ?></th>
                                            <td><?php echo (($position == 0) ? "$currency $todays_total_purchase" : "$todays_total_purchase $currency") ?></td>
                                        </tr>

                                    </table>

                                    <table class="table table-bordered table-striped table-hover">
                                        <tr>
                                            <th><?php echo display('last_sales') ?></th>
                                            <th><?php echo display('money') ?></th>
                                        </tr>
                                        <?php
                                        if ($todays_sale_product) {
                                            ?>
                                            {todays_sale_product}
                                            <tr>
                                                <th>{product_name}</th>
                                                <td><?php echo (($position == 0) ? "$currency {price}" : "{price} $currency") ?></td>
                                            </tr>
                                            {/todays_sale_product}
                                        <?php } ?>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- This today transaction progress -->
                <div class="col-sm-12 col-md-12">
                    <div class="panel panel-bd">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4 style="display: inline-block; line-height: 34px;"> <?php echo display('todays_sales_report') ?></h4>
                                <!--<a href="<?php echo base_url(); ?>Admin_dashboard/see_all_best_sales" class="btn btn-success text-white" style="display: inline-block; float: right;">See All</a>-->
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive" style="overflow: scroll; height: 300px;">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('sl') ?></th>
                                            <th><?php echo display('customer_name') ?></th>
                                            <th><?php echo display('invoice_id') ?></th>
                                            <th><?php echo display('total_amount') ?></th>
                                            <th><?php echo display('paid_ammount') ?></th>
                                            <th><?php echo display('due') ?></th>
                                            <th><?php echo display('total_discount') ?></th>
                                            <th><?php echo display('collection') ?></th>
                                            <th><?php echo display('details') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $ttl_amount = $ttl_paid = $ttl_due = $ttl_discout = $ttl_receipt = 0;
                                        $todays = date('Y-m-d');
                                        if ($todays_sales_report) {
                                            $sl = 0;
//                                            echo '<pre>';   print_r($todays_sales_report); echo '<pre>';
                                            foreach ($todays_sales_report as $single) {
                                                $sql = "SELECT (SELECT SUM(total_price) FROM invoice_details a JOIN invoice b ON b.invoice_id = a.invoice_id WHERE a.invoice_id = '" . $single->invoice_id . "' AND b.customer_id = '" . $single->customer_id . "') as total_amount, 
		(SELECT SUM(paid_amount) FROM invoice_details a JOIN invoice b ON b.invoice_id = a.invoice_id WHERE a.invoice_id = '" . $single->invoice_id . "' AND b.customer_id = '" . $single->customer_id . "') as total_paid, 
		(SELECT SUM(due_amount) FROM invoice_details a JOIN invoice b ON b.invoice_id = a.invoice_id WHERE a.invoice_id = '" . $single->invoice_id . "' AND b.customer_id = '" . $single->customer_id . "') as total_due, 
		(SELECT SUM(total_discount) FROM invoice_details a JOIN invoice b ON b.invoice_id = a.invoice_id WHERE a.invoice_id = '" . $single->invoice_id . "' AND b.customer_id = '" . $single->customer_id . "') as total_discount";
                                                $result = $this->db->query($sql)->row();
                                                
                                                $todays_receipt_sql = "SELECT SUM(a.amount) today_receipt FROM transection a JOIN customer_information b ON b.customer_id = a.relation_id WHERE a.date_of_transection = '".$todays."' AND a.relation_id = '" . $single->customer_id . "'";
                                                $todays_receipt_result = $this->db->query($todays_receipt_sql)->row();
//                                               echo '<pre>'; print_r($result);
                                                $sl++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>Ccustomer/customerledger/<?php echo $single->customer_id; ?>">
                                                            <?php echo $single->customer_name; ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url() . 'Cinvoice/invoice_inserted_data/'; ?><?php echo $single->invoice_id; ?>">
                                                            <?php echo $single->invoice_id; ?>
                                                        </a>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        $ttl_amount += $result->total_amount - $result->total_discount; 
                                                        echo number_format($result->total_amount - $result->total_discount, '2','.',','); 
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        $ttl_paid += $result->total_paid;
                                                        echo number_format($result->total_paid, '2', '.', ','); ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php
                                                        $ttl_due += $result->total_due; 
                                                        echo number_format($result->total_due, '2', '.', ','); 
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php 
                                                        $ttl_discout += $result->total_discount; 
                                                        echo number_format($result->total_discount, '2', '.', ','); 
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php 
                                                        $ttl_receipt += $todays_receipt_result->today_receipt; 
                                                        echo $todays_receipt_result->today_receipt; 
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url() . 'Ccustomer/customerledger/'; ?><?php echo $single->customer_id; ?>">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </td>
                                                    <!--<td style="text-align: right;"><?php echo (($position == 0) ? "$currency {total_amount}" : "{total_amount} $currency") ?></td>-->
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <th class="text-center" colspan="10"><?php echo display('not_found'); ?></th>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <?php // $ttl_amount = 0;?>
                                        <tr>
                                            <td colspan="3" align="right"  style="text-align:right;font-size:14px !Important">&nbsp;<b><?php echo display('total') ?>:</b></td>
                                            <td class="text-right">
                                                <?php
                                                $ttl_amount_float = number_format($ttl_amount, '2', '.',',');
                                                echo (($position == 0) ? "$currency $ttl_amount_float" : "$ttl_amount_float $currency"); ?>
                                            </td>
                                            <td class="text-right">
                                                <?php
                                                $ttl_paid_float = number_format($ttl_paid, '2', '.',',');
                                                echo (($position == 0) ? "$currency $ttl_paid_float" : "$ttl_paid_float $currency"); ?>
                                            </td>
                                            <td class="text-right">
                                                <?php
                                                $ttl_due_float = number_format($ttl_due, '2','.',',');
                                                echo (($position == 0) ? "$currency $ttl_due_float" : "$ttl_due_float $currency"); ?>
                                            </td>
                                            <td class="text-right">
                                                <?php echo (($position == 0) ? "$currency $ttl_discout" : "$ttl_discout $currency"); ?>
                                            </td>
                                            <td class="text-right">
                                                <?php
                                                $ttl_receipt_float = number_format($ttl_receipt, '2', '.',',');
                                                echo (($position == 0) ? "$currency $ttl_receipt_float" : "$ttl_receipt_float $currency"); ?>
                                            </td>
                                            <td></td>
                                            <!--<td style="text-align: right;"><b><?php echo (($position == 0) ? "$currency {sales_amount}" : "{sales_amount} $currency") ?></b></td>-->
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php // echo '<pre>';                    print_r($best_sales_product);   ?>
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<!-- Admin Home end -->

<!-- ChartJs JavaScript -->
<script src="<?php echo base_url() ?>assets/plugins/chartJs/Chart.min.js" type="text/javascript"></script>

<script type="text/javascript">
<?php
$chart_label = $chart_data = '';
if (!empty($best_sales_product))
    for ($i = 0; $i < 12; $i++) {
        $chart_label .= (!empty($best_sales_product[$i]) ? '"' . $best_sales_product[$i]->product_name . '", ' : null);
        $chart_data .= (!empty($best_sales_product[$i]) ? $best_sales_product[$i]->quantity . ', ' : null);
    }
$chart_label = rtrim($chart_label, ", ");
$chart_data = rtrim($chart_data, ", ");
?>
    //line chart
    var ctx = document.getElementById("lineChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
//            labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
            labels: [<?php echo $chart_label; ?>],
            datasets: [
                {
                    label: "Sales Product",
                    fillColor: "#000000",
                    strokeColor: "#000000",
                    pointColor: "#000000",
                    pointStrokeColor: "#000000",
                    pointHighlightFill: "#000000",
                    pointHighlightStroke: "#000000",
                    maintainAspectRatio: false,
                    scaleFontColor: "#000000",
                    pointLabelFontColor: "#000000",
                    pointLabelFontSize: 30,
                    data: [<?php echo $chart_data; ?>]
                }
//                ,
//                {
//                    label: "Purchase",
//                    borderColor: "#73BC4D",
//                    borderWidth: "1",
//                    backgroundColor: "#73BC4D",
//                    pointHighlightStroke: "rgba(26,179,148,1)",
//                    data: [
//                    <?php
if (!empty($monthly_sales_report[1]))
    for ($i = 0; $i < 12; $i++)
        echo (!empty($monthly_sales_report[1][$i]) ? $monthly_sales_report[1][$i]->total_month . ", " : null);
?>// 
//                    ]
//                }
            ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                intersect: false
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Products'
                        }
                    }],
                yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            steps: 10,
                            stepValue: 5,
                            max: <?php
$seperatedData = explode(',', $chart_data);
echo ($seperatedData[0] + 10);
?>
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Quantity'
                        }
                    }]
            },
            "animation": {
                "duration": 1,
                "onComplete": function () {
                    var chartInstance = this.chart,
                            ctx = chartInstance.ctx;

                    // ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.color = '#000000';
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function (dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function (bar, index) {
                            var data = dataset.data[index];
                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                        });
                    });
                }
            }
        }


    });

    //
</script>