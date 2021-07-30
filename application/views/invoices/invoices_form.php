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
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <form id="frm_create" name="frm_create" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
                            <div class="card-header">
                                <h4>Invoice</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label " for="order_no">Order No</label>

                                            <input type="text" class="form-control " name="order_no" id="order_no" placeholder="order_no" value="<?php echo $emptyrowid; ?>" disabled />
                                            <?php echo form_error('order_no') ?>

                                        </div>
                                    </div>





                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label " for="order_no">Customer</label>
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
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label " for="varchar">Subject</label>

                                            <input type="text" class="form-control " name="subject" id="subject" placeholder="Subject" value="<?php echo $subject; ?>" />
                                            <?php echo form_error('subject') ?>

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label " for="description">Description</label>

                                            <textarea class="form-control " name="description" id="description" placeholder="Description" value="<?php echo $description; ?>"> </textarea>
                                            <?php echo form_error('description') ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class=" form-group">
                                            <label class="control-label " for="due_date">Due Date</label>

                                            <input type="date" class="form-control " name="due_date" id="due_date" placeholder="due_date" value="<?php echo $due_date; ?>" />
                                            <?php echo form_error('due_date') ?>

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class=" form-group">
                                            <label class="control-label " for="varchar">Terms</label>

                                            <input type="text" class="form-control " name="terms" id="terms" placeholder="terms" value="<?php echo $terms; ?>" />
                                            <?php echo form_error('terms') ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col"><input type='text' class="form-control " name='item_name' id='item_name' placeholder='Item Name' /></div>
                                        <div class="col"><input type='text' class="form-control " name='item_rate' id='item_rate' class='calc' placeholder='Rate' /></div>
                                        <div class="col"><input type='text' class="form-control " name='item_qty' id='item_qty' class='calc' placeholder='Quantity' /></div>
                                        <div class="col"><input type='text' name='item_total' class="form-control " id='item_total' class='calc' placeholder='Total' disabled /></div>

                                        <div class="col"> <input type='button' class="btn btn-primary" name='additem' id="additem" value='Add Item' /></div>
                                        <div class="col"><input type='hidden' name='itemsdata' id="itemsdata" value='' /></div>




                                    </div>
                                    <table id='list'>
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Rate</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <td><input type='button' name='data' id="data" value='Add Table data' /></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>


                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label " for="total_qty">Total Qty</label>

                                            <input type="text" class="form-control " name="total_qty" id="total_qty" placeholder="Total Qty" value="<?php echo $total_qty; ?>" />
                                            <?php echo form_error('total_qty') ?>

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label " for="varchar">Total Amount</label>

                                            <textarea class="form-control " name="total_amt" id="total_amt" placeholder="Total Amount"><?php echo $total_amt; ?></textarea>
                                            <?php echo form_error('total_amt') ?>

                                        </div>
                                    </div>
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


                                <div class="form-group">

                                    <button class="btn btn-success" type="submit">Submit</button>
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('customers/'); ?>';">Cancel</button>
                                </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>



<!---- This is not end -->

<script type="text/javascript">
    $(document).ready(function() {
        //item list code
        $("#list").hide();
        // adding an item to table
        $('#additem').on('click', function() {
            if ($('#item_name').val() != '' && $('#item_qty').val() != '' && $('#item_rate').val() != '') {
                $("#list").show();
                var item_name = $('#item_name').val();
                var item_qty = $('#item_qty').val();
                var item_rate = $('#item_rate').val();
                var item_total = $('#item_total').val();
                $('#list').append('<tr><td>' + item_name + '</td><td>' + item_qty + '</td><td>' + item_rate + '</td><td>' + item_total + '</td><td><button class="remove">Remove</button></td></tr></li>')
                $('.calc').val('');
                $('#item_name').val('')
            } else {
                alert('items cannot blank!')
            }
        });
        //remove table row 
        $("#list").on('click', '.remove', function() {
            $(this).parent().parent().remove();
        });

        // adding table data to json object
        $('#data').on('click', function() {
            //remove column 
            $('table tr').find('td:eq(4),th:eq(4)').remove();


            //add table object
            var myRows = {
                myRows: []
            };

            var $th = $('table th');

            $('table tbody tr').each(function(i, tr) {
                var obj = {},
                    $tds = $(tr).find('td');
                $th.each(function(index, th) {
                    obj[$(th).text()] = $tds.eq(index).text();
                });
                myRows.myRows.push(obj);
            });
            var itemsObject = JSON.stringify(myRows);
            $('#itemsdata').val(itemsObject);
            $(this).hide();


            console.log(itemsObject)
        });

        //allow only decimals

        $(function() {
            $("input.calc").bind("change keyup input", function() {
                var position = this.selectionStart - 1;
                //remove all but number and .
                var fixed = this.value.replace(/[^0-9\.]/g, '');
                if (fixed.charAt(0) === '.') //can't start with .
                    fixed = fixed.slice(1);

                var pos = fixed.indexOf(".") + 1;
                if (pos >= 0) //avoid more than one .
                    fixed = fixed.substr(0, pos) + fixed.slice(pos).replace('.', '');

                if (this.value !== fixed) {
                    this.value = fixed;
                    this.selectionStart = position;
                    this.selectionEnd = position;
                }

                var val1, val2, res;
                val1 = $('#item_qty').val();
                val2 = $('#item_rate').val();
                if (val1 && val2) {
                    res = val1 * val2
                    $('#item_total').val(res);
                }

            });
        });
        //End of item list



        var form2 = $('#frm_create');
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
    });
</script>