<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Customers <small>-Detail list of Invoices</small></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="#">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    Invoices
                </div>
            </div>
        </div>
        <?php
        $user_data = get_user_details($this->session->userdata('id'));

        ?>


        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <form id="frm_edit" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
                            <input type="hidden" name="id" name="id" value="<?php echo $id; ?>" />
                            <div class="card-header">
                                <h4>Invoices</h4>
                            </div>
                            <div class="card-body">


                                <div class="form-group">
                                    <label class="control-label " for="order_no">Order No</label>

                                    <input type="text" class="form-control " name="order_no" id="order_no" placeholder="order_no" value="<?php echo $order_no; ?>" disabled />
                                    <?php echo form_error('order_no') ?>

                                </div>

                                <div class="form-group">
                                    <select name="customer_id" id="customer_id" class="form-control">
                                        <option value="2" <?php if ($status == 0) {
                                                                echo " selected";
                                                            } ?>>Miss.</option>
                                        <option value="1" <?php if ($status == 1) {
                                                                echo " selected";
                                                            } ?>>Mr.</option>
                                        <option value="0" <?php if ($status == 0) {
                                                                echo " selected";
                                                            } ?>>Mrs.</option>

                                    </select>
                                    <?php echo form_error('customer_id') ?>

                                </div>
                                <div class="form-group">
                                    <label class="control-label " for="varchar">Subject</label>

                                    <input type="text" class="form-control " name="subject" id="subject" placeholder="Subject" value="<?php echo $subject; ?>" />
                                    <?php echo form_error('subject') ?>

                                </div>
                                <div class="form-group">
                                    <label class="control-label " for="description">Description</label>

                                    <input type="text" class="form-control " name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
                                    <?php echo form_error('description') ?>

                                </div>
                                <div class="form-group">
                                    <label class="control-label " for="total_qty">Total Qty</label>

                                    <input type="text" class="form-control " name="total_qty" id="total_qty" placeholder="Total Qty" value="<?php echo $total_qty; ?>" />
                                    <?php echo form_error('total_qty') ?>

                                </div>

                                <div class="form-group">
                                    <label class="control-label " for="varchar">Total Amount</label>

                                    <textarea class="form-control " name="total_amt" id="total_amt" placeholder="Total Amount"><?php echo $total_amt; ?></textarea>
                                    <?php echo form_error('total_amt') ?>

                                </div>

                                <div class=" form-group">
                                    <label class="control-label " for="varchar">Paid</label>

                                    <input type="text" class="form-control " name="paid" id="paid" placeholder="Paid" value="<?php echo $paid; ?>" />
                                    <?php echo form_error('paid') ?>

                                </div>
                                <div class=" form-group">
                                    <label class="control-label " for="varchar">Balance</label>

                                    <input type="text" class="form-control " name="balance" id="balance" placeholder="Balance" value="<?php echo $balance; ?>" />
                                    <?php echo form_error('balance') ?>

                                </div>
                                <div class=" form-group">
                                    <label class="control-label " for="discount">Discount</label>

                                    <input type="text" class="form-control " name="discount" id="discount" placeholder="Discount" value="<?php echo $discount; ?>" />
                                    <?php echo form_error('discount') ?>

                                </div>
                                <div class=" form-group">
                                    <label class="control-label " for="varchar">Refunded</label>

                                    <input type="text" class="form-control " name="refunded" id="refunded" placeholder="Refunded" value="<?php echo $refunded; ?>" />
                                    <?php echo form_error('refunded') ?>

                                </div>
                                <div class=" form-group">
                                    <label class="control-label " for="due_date">Due Date</label>

                                    <input type="text" class="form-control " name="due_date" id="due_date" placeholder="due_date" value="<?php echo $due_date; ?>" />
                                    <?php echo form_error('due_date') ?>

                                </div>

                                <div class=" form-group">
                                    <label class="control-label " for="varchar">Terms</label>

                                    <input type="text" class="form-control " name="terms" id="terms" placeholder="terms" value="<?php echo $terms; ?>" />
                                    <?php echo form_error('terms') ?>

                                </div>

                                <div class=" form-group">
                                    <label class="control-label " for="int">Status</label>

                                    <select name="status" id="status" class="form-control">
                                        <option value="1" <?php if ($status == 1) {
                                                                echo " selected";
                                                            } ?>>Active</option>
                                        <option value="0" <?php if ($status == 0) {
                                                                echo " selected";
                                                            } ?>>Inactive</option>
                                    </select>
                                    <?php echo form_error('status') ?>

                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">

                                    <button class="btn btn-success" type="submit">Submit</button>
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('invoices/'); ?>';">Cancel</button>


                                </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>



<script type="text/javascript">
    var form2 = $('#frm_edit');
    var error1 = $('.alert-danger', form2);
    var success1 = $('.alert-success', form2);

    form2.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {

            order_no: {
                required: true
            },
            customer_id: {
                required: true
            },
            subject: {
                required: true
            },
            description: {
                required: true
            },
            total_qty: {
                required: true
            },
            total_amt: {
                required: true
            },
            paid: {
                required: true
            },
            balance: {
                required: true
            },
            refunded: {
                required: true
            },
            due_date: {
                required: true
            },
            terms: {
                required: true
            },
            remember_token: {
                required: true
            },
            status: {
                required: true
            },
        },
        messages: {},
        highlight: function(element) { // hightlight error inputs
            $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group

            $(".tab-content").find("div.tab-pane:has(div.has-error)").each(function(index, tab) {
                var id = $(tab).attr("id");
                $('a[href="#' + id + '"]').addClass('alert-danger');

            });

        },
        unhighlight: function(element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group

        },
        success: function(label) {
            label
                .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },
        submitHandler: function(form) {
            form.submit();

        }
    });
</script>