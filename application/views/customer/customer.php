<!-- Customer js php -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/json/customer.js.php" ></script>

<!-- Manage Customer Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('manage_customer') ?></h1>
            <small><?php echo display('manage_your_customer') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('customer') ?></a></li>
                <li class="active"><?php echo display('manage_customer') ?></li>
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

                    <a href="<?php echo base_url('Ccustomer') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-plus"> </i> <?php echo display('add_customer') ?> </a>

                    <a href="<?php echo base_url('Ccustomer/credit_customer') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('credit_customer') ?> </a>

                    <a href="<?php echo base_url('Ccustomer/paid_customer') ?>" class="btn btn-warning m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('paid_customer') ?> </a>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body"> 

                        <form action="<?php echo base_url('Ccustomer/customer_search_item') ?>" class="form-inline" method="post" accept-charset="utf-8">

                            <label class="select"><?php echo display('customer_name') ?>:</label>
                            <select class="form-control" name="customer_id" style="width: 25%">
                                {all_customer_list}
                                <option value="{customer_id}">{customer_name}</option>
                                {/all_customer_list}
                            </select>
                            <button type="submit" class="btn btn-primary"><?php echo display('search') ?></button>

                        </form>		            
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Customer -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('manage_customer') ?></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTableExample3" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><?php echo display('sl') ?></th>
                                        <th><?php echo display('customer_name') ?></th>
                                        <th><?php echo display('address') ?></th>
                                        <th><?php echo display('mobile') ?></th>
                                        <th style="text-align:right !Important"><?php echo display('balance') ?></th>
                                        <th style="text-align:center !Important"><?php echo display('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
//                                    echo '<pre>';                                    print_r($customers_list);
                                    if ($customers_list) {
                                        $sl = 0;
                                        foreach ($customers_list as $customer) {
                                            $sql = 'SELECT (SELECT SUM(amount) FROM customer_ledger WHERE d_c = "d" AND customer_id = "' . $customer['customer_id'] . '") dr, 
		(SELECT sum(amount) FROM customer_ledger WHERE d_c = "c" AND customer_id = "' . $customer['customer_id'] . '") cr';
                                            $result = $this->db->query($sql)->result();
                                            $sl++;
                                            ?>
                                            <tr>
                                                <td><?php echo $sl; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url() . 'Ccustomer/customerledger/' . $customer['customer_id']; ?>"><?php echo $customer['customer_name']; ?></a>				
                                                </td>
                                                <td><?php echo $customer['customer_address']; ?></td>
                                                <td><?php echo $customer['customer_mobile']; ?></td>

                                                <td align="right">
                                                    <?php
//                                                    echo '<pre>';  print_r($result); 
                                                    echo (($position == 0) ? "$currency " : " $currency");
                                                    $balance = $result[0]->dr - $result[0]->cr;
                                                    echo number_format($balance, '2', '.', ',');
                                                    ?>
                                                </td>
                                                <td>
                                        <center>
                                            <?php echo form_open() ?>
                                            <a href="<?php echo base_url() . 'Ccustomer/customer_update_form/' . $customer['customer_id']; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                            <a href="" class="deleteCustomer btn btn-danger btn-sm" name="<?php echo $customer['customer_id'] ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                            <?php echo form_close() ?>
                                        </center>
                                        </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <th class="text-center" colspan="6"><?php echo display('not_found'); ?></th>
                                    </tr> 
                                <?php } ?>
                                </tbody>
<!--                                <tfoot>
                                    <tr>
                                        <td style="text-align:right !Important" colspan="4"><b> <?php echo display('grand_total') ?></b></td>
                                        <td style="text-align:right !Important">
                                            <b><?php echo (($position == 0) ? "$currency {subtotal}" : "{subtotal} $currency") ?></b>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tfoot>-->
                            </table>
                            <div class="text-right"><?php echo $links ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Manage Customer End -->

<!-- Delete Customer ajax code -->
<script type="text/javascript">
    //Delete Customer 
    $(".deleteCustomer").click(function ()
    {
        var customer_id = $(this).attr('name');
        var csrf_test_name = $("[name=csrf_test_name]").val();
        var x = confirm("Are You Sure,Want to Delete ?");
        if (x == true) {
            $.ajax
                    ({
                        type: "POST",
                        url: '<?php echo base_url('Ccustomer/customer_delete') ?>',
                        data: {customer_id: customer_id, csrf_test_name: csrf_test_name},
                        cache: false,
                        success: function (datas)
                        {
                        }
                    });
        }
    });
</script>