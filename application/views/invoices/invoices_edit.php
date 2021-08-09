<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Invoices <small>-Detail list of Invoices</small></h1>
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
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">

                        <form id="frm_edit" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
                            <input type="hidden" name="id" name="id" value="<?php echo $id; ?>" />
                            <div class="card-header">
                                <h4>Invoices</h4>
                            </div>
                            <div class="card-body">


                                <div class="form-group">
                                    <label class="control-label " for="order_no">Order No</label>

                                    <input type="text" class="form-control " name="order_no" id="order_no" placeholder="order_no" value="<?php echo $order_no; ?>" readonly="readonly" />
                                    <?php echo form_error('order_no') ?>

                                </div>

                                <div class="form-group">
                                    <select name="customer_id" id="customer_id" class="form-control">
                                        <option value="">Select Customers</option>
                                        <?php foreach ($customers as $row) { ?>
                                            <option <?= ($customer_id == $row['id']) ? 'selected' : ''; ?> value="<?php echo $row['id']; ?>"><?= $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] ?></option>

                                        <?php } ?>
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

                                <div class="form-row">
                                    <!-- Table -->
                                    <table id='list' class="table  table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Rate</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id=" myTable">
                                            <?php
                                            $start = 0;
                                            foreach ($itemstbl as $item) {
                                            ?>
                                                <tr>

                                                    <!-- <td><?php //echo $c->name 
                                                                ?></td> -->
                                                    <td><input type="text" name="item_name" class=" form-control item_name " id="item_name<?php echo $item['id'] ?>" value="<?php echo $item['item_name'] ?>" /></td>
                                                    <td>
                                                        <input type="text" name="item_qty" class="item_qty form-control calc" id="item_qty<?php echo $item['id'] ?>" value="<?php echo $item['qty'] ?>" />
                                                    </td>
                                                    <td><input type="text" name="item_rate" class="item_rate form-control calc" id="item_rate<?php echo $item['id'] ?>" value="<?php echo $item['rate'] ?>" /></td>
                                                    <td><input type="text" name="item_total" class="item_total form-control " id="item_total<?php echo $item['id'] ?>" value="<?php echo $item['total'] ?>" /></td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-primary btn-sm itemupdate" name="itemupdate" id="itemupdate" value="<?php echo $item['id'] ?>">Update</button>

                                                        <button type="button" class="btn btn-outline-danger btn-sm itemdelete" name="itemdelete" id="itemdelete" value="<?php echo $item['id'] ?>">Delete</button>
                                                    </td>


                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>

                                    </table>
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
    $(document).ready(function() {



        // Update record
        $('#list').on('click', '.itemupdate', function() {
            var id = this.value;

            url = '<?php echo site_url('invoices/updateItem_action')
                    ?>';

            //AJAX request
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    id: id,
                    name: $('#item_name' + id).val(),
                    rate: $('#item_rate' + id).val(),
                    qty: $('#item_qty' + id).val(),
                    total: $('#item_total' + id).val(),
                },
                dataType: 'json',
                success: function(response) {

                    if (response == 1) {
                        alert("updated succssfully.");
                        // $('#name').val(response.data.name);
                        // $('#email').val(response.data.email);
                        // $('#gender').val(response.data.gender);
                        // $('#city').val(response.data.city);

                        // this.reload();
                    } else {
                        alert("Invalid ID.");
                    }
                }
            });

        });

        // delete 
        $('#list').on('click', '.itemdelete', function() {
            var id = this.value;

            url = '<?php echo site_url('invoices/deleteItem')
                    ?>';
            //AJAX request
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {

                    if (response == 1) {
                        alert("deleted succssfully.");
                        $(this).hide()

                    } else {
                        alert("Invalid ID.");
                    }
                }
            });

        });
        // calculate
        $('#list').on('blur', '.calc', function() {
            var val1 = this.value; 
            var val2,val3;
            $('#list').on('blur', '.calc', function() {});
            // console.log(parseFloat($("#item_rate" + id).val()));
            // var sum = parseFloat($("#item_rate" + id).val()) * parseFloat($("#item_qty" + id).val())
            // $("#item_total" + id).val(sum);
        });

    });
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