<!-- Customer js php -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/json/customer.js.php" ></script>
<!-- Product invoice js -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/json/product_invoice.js.php" ></script>
<!-- Invoice js -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice.js" type="text/javascript"></script>
<!-- Manage Invoice Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('manage_invoice') ?></h1>
            <small><?php echo display('manage_your_invoice') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active"><?php echo display('manage_invoice') ?></li>
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

                    <a href="<?php echo base_url('Cinvoice') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-plus"> </i> <?php echo display('new_invoice') ?> </a>

                    <a href="<?php echo base_url('Cinvoice/pos_invoice') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('pos_invoice') ?> </a>

                </div>
            </div>
        </div>

        <!-- date between search -->
        <div class="row">
            <div class="col-sm-7">
                <div class="panel panel-default">
                    <div class="panel-body"> 
                        <?php echo form_open('Cinvoice/date_to_date_invoice', array('class' => 'form-inline', 'method' => 'get')) ?>
                        <?php
                        date_default_timezone_set("Asia/Dhaka");
                        $today = date('Y-m-d');
                        ?>
                        <div class="form-group">
                            <label class="" for="from_date"><?php echo display('start_date') ?></label>
                            <input type="text" name="from_date" class="form-control datepicker" id="from_date" value="<?php echo $today ?>" placeholder="<?php echo display('start_date') ?>" >
                        </div> 

                        <div class="form-group">
                            <label class="" for="to_date"><?php echo display('end_date') ?></label>
                            <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="<?php echo $today ?>">
                        </div>  

                        <button type="submit" class="btn btn-success"><?php echo display('search') ?></button>

                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="panel panel-default">
                    <div class="panel-body"> 

                        <form action="<?php echo base_url('Cinvoice/manage_invoice_invoice_id') ?>" class="form-inline" method="post" accept-charset="utf-8">
                            <label for="invoice_no"><?php echo display('invoice_no') ?></label>
                            <input type="text" class="form-control" name="invoice_no" placeholder="<?php echo display('invoice_no') ?>">
                            <button type="submit" class="btn btn-primary btn-sm"><?php echo display('search') ?></button>     
                        </form>		

                    </div>
                </div>
            </div>
        </div>
        <div class="row"> 
        </div>
        <!-- Manage Invoice report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('manage_invoice') ?></h4>
                        </div>
                        <span class="text-right">
                            <?php echo form_open('Cinvoice/invoice_search', array('class' => 'form-inline', 'method' => 'get')) ?>

                            <div class="form-group">

                                <input type="text"   name="customer_name" class="customerSelection form-control" placeholder='<?php echo display('customer_name') ?>' id="customer_name" tabindex="1" />

                                <input id="SchoolHiddenId" class="customer_hidden_value abc" type="hidden" name="customer_id">
                            </div>  

                            <button type="submit" class="btn btn-success"><?php echo display('search') ?></button>

                            <?php echo form_close() ?>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><?php echo display('sl') ?></th>
                                        <th><?php echo display('invoice_no') ?></th>
                                        <th><?php echo display('invoice_id') ?></th>
                                        <th><?php echo display('customer_name') ?></th>
                                        <th><?php echo display('date') ?></th>
                                        <th><?php echo display('total_amount') ?></th>
                                        <th><?php echo display('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($invoices_list) {
                                        ?>
                                        {invoices_list}
                                        <tr>
                                            <td>{sl}</td>
                                            <td>
                                                <a href="<?php echo base_url() . 'Cinvoice/invoice_inserted_data/{invoice_id}'; ?>">
                                                    {invoice}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() . 'Cinvoice/invoice_inserted_data/{invoice_id}'; ?>">
                                                    {invoice_id}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() . 'Ccustomer/customerledger/{customer_id}'; ?>">{customer_name}</a>				
                                            </td>

                                            <td>{final_date}</td>
                                            <td style="text-align: right;"><?php echo (($position == 0) ? "$currency {total_amount}" : "{total_amount} $currency") ?></td>
                                            <td>
                                    <center>
                                        <?php echo form_open() ?>

                                        <a href="<?php echo base_url() . 'Cinvoice/invoice_inserted_data/{invoice_id}'; ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('invoice') ?>"><i class="fa fa-window-restore" aria-hidden="true"></i></a>


                                        <a href="<?php echo base_url() . 'Cinvoice/pos_invoice_inserted_data/{invoice_id}'; ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('pos_invoice') ?>"><i class="fa fa-fax" aria-hidden="true"></i></a>

                                        <a href="<?php echo base_url() . 'Cinvoice/invoice_update_form/{invoice_id}'; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                        <a href="" class="deleteInvoice btn btn-danger btn-sm" name="{invoice_id}" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        <?php echo form_close() ?>
                                    </center>
                                    </td>
                                    </tr>
                                    {/invoices_list}
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <div class="text-right"><?php echo $links ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Manage Invoice End -->

<!-- Delete Invoice ajax code -->
<script type="text/javascript">
    //Delete Invoice Item 
    $(".deleteInvoice").click(function ()
    {
        var invoice_id = $(this).attr('name');
        var csrf_test_name = $("[name=csrf_test_name]").val();
        var x = confirm("Are You Sure,Want to Delete ?");
        if (x == true) {
            $.ajax
                    ({
                        type: "POST",
                        url: '<?php echo base_url('Cinvoice/invoice_delete') ?>',
                        data: {invoice_id: invoice_id, csrf_test_name: csrf_test_name},
                        cache: false,
                        success: function (datas)
                        {
//                            alert(datas);return false;
                            window.reload();
                        }
                    });
        }
    });
</script>