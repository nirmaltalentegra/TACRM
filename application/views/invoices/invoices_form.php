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

                                            <input type="text" class="form-control " name="order_no" id="order_no" placeholder="order_no" value="<?php echo $emptyrowid; ?>" readonly="readonly" />
                                            <?php //echo form_error('order_no') 
                                            ?>

                                        </div>
                                    </div>





                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea class="form-control" style="height:100px" name="invoice_from" Placeholder="Who is the Invoice Form?"></textarea>
                                        </div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" value="Bill To" name="bill_to_label" style="border:none;" />
													<select class="form-control" name="bill_to" id="bill_to" required>
														<?php
															if(!empty($customers))
															{
																echo '<option value="">-- Select Customer --</option>';
																echo '<option value="New">Add New Customer</option>';
																foreach($customers as $cs)
																{
																	echo '<option value="'.$cs['id'].'">'.$cs['firstname'].' '.$cs['middlename'].' '.$cs['lastname'].'</option>';
																}
															}
															else
															{
																echo '<option value="">-- Add New Customer --</option>';
															}
														?>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" value="Ship To" name="ship_to_label" style="border:none;" />
													<textarea class="form-control" style="height:70px" name="ship_to" Placeholder="(Optional)"></textarea>
												</div>
											</div>
										</div>
                                    </div>
                                    <div class="col-md-6">
										<div class="form-group text-right">
											<label>Invoice No</label>
											<input type="text" value="1" name="invoice_no" class="form-control" style="border:none; text-align:right;" />
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" value="Date" name="invoice_date_label" class="form-control" style="border:none; text-align:right;" />
													<input type="text" value="Payment Terms" name="invoice_payment_terms_label" class="form-control" style="border:none; text-align:right;" />
													<input type="text" value="Due Date" name="invoice_due_date_label" class="form-control" style="border:none; text-align:right;" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="date" name="invoice_date" class="form-control" style="border:none; text-align:right;" />
													<input type="text" name="invoice_payment_terms" class="form-control" style="border:none; text-align:right;" />
													<input type="date" name="invoice_due_date" class="form-control" style="border:none; text-align:right;" />
												</div>
											</div>
										</div>
                                    </div>
                                </div>
                                <div class="row table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Item</th>
												<th>Quantity</th>
												<th>Rate</th>
												<th>Amount</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody id="TableRow"></tbody>
									</table>
									<input type="hidden" id="TableCount" name="TableCount" />
									<button class="btn btn-info" type="button" id="AppendRow">Add Item</button>
								</div><br/><br/>
								
								<div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
											<input type="text" value="Notes" name="invoice_notes_label" style="border:none;" />
                                            <textarea class="form-control" style="height:100px" name="invoice_notes" Placeholder="Notes"></textarea>
                                        </div>
										<div class="form-group">
											<input type="text" value="Terms" name="invoice_terms_label" style="border:none;" />
                                            <textarea class="form-control" style="height:100px" name="invoice_terms" Placeholder="Terms"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" value="Subtotal" id="sub_total_label" name="sub_total_label" class="form-control" style="border:none; text-align:right;" />
													<input type="text" value="Tax ($)" id="tax_label" name="tax_label" class="form-control" style="border:none; text-align:right;" />
													<input type="text" value="Discount ($)" id="discount_label" name="discount_label" class="form-control" style="border:none; text-align:right;" />
													<input type="text" value="Shipping" id="shipping_label" name="shipping_label" class="form-control" style="border:none; text-align:right;" />
												</div>
											</div>
											<div class="col-md-6">
												<input type="hidden" id="tax_type" name="tax_type" />
												<input type="hidden" id="discount_type" name="discount_type" />
												<div class="form-group">
													<input type="text" class="form-control" id="sub_total" name="sub_total" style="border:none; text-align:right;" />
													<div class="input-group" id="TaxDiv">
														<input type="text" class="form-control" id="tax_input" name="tax_input" placeholder="Tax" style="border:none; text-align:right;" />
														<div class="input-group-append">
															<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">^</button>
															<div class="dropdown-menu">
																<a class="dropdown-item" id="tax_flat_btn" href="javascript:void(0)">Flat</a>
																<a class="dropdown-item" id="tax_percent_btn" href="javascript:void(0)">Percent</a>
															</div>
															<a href="javascript:void(0)"><span class="input-group-text" id="tax_close">X</span></a>
														</div>
													</div>
													<div class="input-group" id="DiscountDiv">
														<input type="text" class="form-control" id="discount_input" name="discount_input" placeholder="Discount" style="border:none; text-align:right;" />
														<div class="input-group-append">
															<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">^</button>
															<div class="dropdown-menu">
																<a class="dropdown-item" id="discount_flat_btn" href="javascript:void(0)">Flat</a>
																<a class="dropdown-item" id="discount_percent_btn" href="javascript:void(0)">Percent</a>
															</div>
															<a href="javascript:void(0)"><span class="input-group-text" id="discount_close">X</span></a>
														</div>
													</div>
													<div class="input-group" id="ShippingDiv">
														<input type="text" class="form-control" id="shipping_input" name="shipping_input" placeholder="Shipping" style="border:none; text-align:right;" />
														<div class="input-group-append">
															<a href="javascript:void(0)"><span class="input-group-text" id="shipping_close">X</span></a>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 text-right">
												<a href="javascript:void(0)" id="tax_btn"><i class="fas fa-plus"></i> Tax</a> &nbsp;&nbsp;
												<a href="javascript:void(0)" id="discount_btn"><i class="fas fa-plus"></i> Discount</a> &nbsp;&nbsp;
												<a href="javascript:void(0)" id="shipping_btn"><i class="fas fa-plus"></i> Shipping</a>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" value="Total" id="grand_total_label" name="grand_total_label" class="form-control" style="border:none; text-align:right;" />
													<input type="text" value="Amount Paid" id="amount_paid_label" name="amount_paid_label" class="form-control" style="border:none; text-align:right;" />
													<input type="text" value="Balance Due" id="balance_due_label" name="balance_due_label" class="form-control" style="border:none; text-align:right;" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" class="form-control" readonly id="grand_total" name="grand_total" style="border:none; text-align:right;" />
													<input type="text" class="form-control" id="amount_paid" name="amount_paid" style="border:none; text-align:right;" />
													<input type="text" class="form-control" readonly id="balance_due" name="balance_due" style="border:none; text-align:right;" />
												</div>
											</div>
										</div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="int">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" <?php if ($status == 1) { echo " selected";} ?>>Active</option>
                                        <option value="0" <?php if ($status == 0) { echo " selected";} ?>>Inactive</option>
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
        </div>
    </section>
</div> <!-- Main content -->

<div class="modal fade show" tabindex="-1" role="dialog" id="CreateCustomer" style="display: none; padding-left: 17px;">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">New Customer</h5>
				<button type="button" id="ModalBtn" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<form autocomplete="OFF" id="CustomerForm">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Perfix</label>
							<select name="prefix" id="prefix" class="form-control">
								<option value="2" selected="">Miss.</option>
								<option value="1">Mr.</option>
								<option value="0" selected="">Mrs.</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control " name="firstname" id="firstname" placeholder="First Name" value="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="middlename">Middle Name</label>
							<input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name" value="">
						</div>
					</div>
					<div class="col-md-6">
						<div class=" form-group">
							<label class="control-label" for="lastname">Last Name</label>
							<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="">
						</div>
					</div>
					<div class="col-md-6">
						<div class=" form-group">
							<label class="control-label" for="varchar">Email</label>
							<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="">
						</div>
					</div>
					<div class="col-md-6">
						<div class=" form-group">
							<label class="control-label" for="varchar">Phone</label>
							<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="">
						</div>
					</div>
					<div class="col-md-6">
						<div class=" form-group">
							<label class="control-label" for="varchar">Address</label>
							<textarea class="form-control" name="address" id="address" placeholder="address" value=""></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="varchar">City</label>
							<input type="text" class="form-control" name="city" id="city" placeholder="city" value="">
                        </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="varchar">Company</label>
							<input type="text" class="form-control" name="company" id="company" placeholder="company" value="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="int">Status</label>
							<select name="status" id="status1" class="form-control">
								<option value="1">Active</option>
								<option value="0">Inactive</option>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<button class="btn btn-success" type="submit">Submit</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('_layout/footer'); ?>

<script type="text/javascript">
$(document).ready(function()
{
	$("#tax_btn").hide();
	$("#tax_type").val('Flat');
	$("#discount_type").val('Flat');
	
	$("#tax_percent_btn").click(function(){
		$("#tax_type").val('Percent');
		$("#tax_input").val('');
		$("#tax_label").val('Tax (%)');
		calculation();
	});
	
	$("#tax_flat_btn").click(function(){
		$("#tax_type").val('Flat');
		$("#tax_input").val('');
		$("#tax_label").val('Tax ($)');
		calculation();
	});
	
	$("#discount_percent_btn").click(function(){
		$("#discount_type").val('Percent');
		$("#discount_input").val('');
		$("#discount_label").val('Discount (%)');
		calculation();
	});
	
	$("#discount_flat_btn").click(function(){
		$("#discount_type").val('Flat');
		$("#discount_input").val('');
		$("#discount_label").val('Discount ($)');
		calculation();
	});
	
	$("#discount_label").hide();
	$("#DiscountDiv").hide();
	
	$("#shipping_label").hide();
	$("#ShippingDiv").hide();
	
    var wrapper = $('#TableRow');
	var x = 1;
	
    var fieldHTML = '';
    
    $("#AppendRow").click(function(){
		fieldHTML = '<tr id="TxtRow" class="TxtRow"><td><input type="text" class="form-control" Placeholder="Item Description" name="invoice_item[]" /></td><td><input type="number" data-id="'+x+'" id="qty'+x+'" class="form-control qty" Placeholder="Quantity" name="invoice_qty[]" /></td><td><input type="number" class="form-control rate" id="rate'+x+'" data-id="'+x+'" Placeholder="Rate" name="invoice_rate[]" /></td><td><input type="text" id="tot'+x+'" class="form-control totamt" placeholder="Rs." /></td><td><a href="javascript:void(0)" class="remove_button">Delete</a></td></tr>';
		$(wrapper).append(fieldHTML);
		x++;
		$("#TableCount").val(x);
    });
    
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).closest('tr').remove();
        x--;
		$("#TableCount").val(x);
    });
	
	$(wrapper).on('keyup', '.qty', function(e){
        e.preventDefault();
		var cnt = $(this).data('id');
		var rate = $("#rate"+cnt).val();
		var qty = $("#qty"+cnt).val();
		if(rate!="")
		{
			qty = Number(rate)*Number(qty);
			if(qty=="NaN")
			{
				qty="0";
			}
			$("#tot"+cnt).val(qty);
			var sub_total=0;
			$(".TxtRow .totamt").each(function() {
				sub_total = parseInt(sub_total)+parseInt($(this).val());
			});
			$("#sub_total").val(sub_total);
		}
		else
		{
			$("#tot"+cnt).val("0");
		}
		calculation();
    });
	
	$(wrapper).on('change', '.qty', function(e){
        e.preventDefault();
		var cnt = $(this).data('id');
		var rate = $("#rate"+cnt).val();
		var qty = $("#qty"+cnt).val();
		if(rate!="")
		{
			qty = Number(rate)*Number(qty);
			if(qty=="NaN")
			{
				qty="0";
			}
			$("#tot"+cnt).val(qty);
			var sub_total=0;
			$(".TxtRow .totamt").each(function() {
				sub_total = parseInt(sub_total)+parseInt($(this).val());
			});
			$("#sub_total").val(sub_total);
		}
		else
		{
			$("#tot"+cnt).val("0");
		}
		calculation();
    });
	
	$(wrapper).on('keyup', '.rate', function(e){
        e.preventDefault();
		var cnt = $(this).data('id');
		var rate = $("#rate"+cnt).val();
		var qty = $("#qty"+cnt).val();
		if(qty!="")
		{
			qty = Number(rate)*Number(qty);
			if(qty=="NaN")
			{
				qty="0";
			}
			$("#tot"+cnt).val(qty);
			var sub_total=0;
			$(".TxtRow .totamt").each(function() {
				sub_total = parseInt(sub_total)+parseInt($(this).val());
			});
			$("#sub_total").val(sub_total);
		}
		else
		{
			$("#tot"+cnt).val("0");
		}
		calculation();
    });
	
	$(wrapper).on('change', '.rate', function(e){
        e.preventDefault();
		var cnt = $(this).data('id');
		var rate = $("#rate"+cnt).val();
		var qty = $("#qty"+cnt).val();
		if(qty!="")
		{
			qty = Number(rate)*Number(qty);
			if(qty=="NaN")
			{
				qty="0";
			}
			$("#tot"+cnt).val(qty);
			var sub_total=0;
			$(".TxtRow .totamt").each(function() {
				sub_total = parseInt(sub_total)+parseInt($(this).val());
			});
			$("#sub_total").val(sub_total);
		}
		else
		{
			$("#tot"+cnt).val("0");
		}
		calculation();
    });
	
	$("#tax_close").click(function(){
		$("#tax_input").val('');
		$("#TaxDiv").hide();
		$("#tax_label").hide();
		$("#tax_btn").show();
		calculation();
	});
	
	$("#tax_btn").click(function(){
		$("#tax_input").val('');
		$("#TaxDiv").show();
		$("#tax_label").show();
		$("#tax_btn").hide();
	});
	
	$("#discount_close").click(function(){
		$("#discount_input").val('');
		$("#DiscountDiv").hide();
		$("#discount_label").hide();
		$("#discount_btn").show();
		calculation();
	});
	
	$("#discount_btn").click(function(){
		$("#discount_input").val('');
		$("#DiscountDiv").show();
		$("#discount_label").show();
		$("#discount_btn").hide();
	});
	
	$("#shipping_close").click(function(){
		$("#shipping_input").val('');
		$("#ShippingDiv").hide();
		$("#shipping_label").hide();
		$("#shipping_btn").show();
		calculation();
	});
	
	$("#shipping_btn").click(function(){
		$("#shipping_input").val('');
		$("#ShippingDiv").show();
		$("#shipping_label").show();
		$("#shipping_btn").hide();
	});
	
	$("#tax_input").keyup(function(){
		calculation();
	});
	
	$("#discount_input").keyup(function(){
		calculation();
	});
	
	$("#shipping_input").keyup(function(){
		calculation();
	});
	
	$("#amount_paid").keyup(function(){
		calculation();
	});
	
	function calculation()
	{
		var total = $("#sub_total").val();
		var sub_total = $("#sub_total").val();
		
		var tax_type = $("#tax_type").val();
		if($("#tax_input").val()>0 && $("#tax_input").val()!="")
		{
			if(tax_type=="Flat")
			{
				tax_type = $("#tax_input").val();
			}
			else
			{
				tax_type = (Number(sub_total)*Number($("#tax_input").val()))/100;
			}
			total = Number(total)+Number(tax_type);
		}
		
		var discount_type = $("#discount_type").val();
		if($("#discount_input").val()>0 && $("#discount_input").val()!="")
		{
			if(discount_type=="Flat")
			{
				discount_type = $("#discount_input").val();
			}
			else
			{
				discount_type = (Number(sub_total)*Number($("#discount_input").val()))/100;
			}
			total = Number(total)-Number(discount_type);
		}
		
		if($("#shipping_input").val()>0 && $("#shipping_input").val()!="")
		{
			total = Number(total)+Number($("#shipping_input").val());
		}
		
		$("#grand_total").val(total);
		
		if($("#amount_paid").val()>0 && $("#amount_paid").val()!="")
		{
			total = Number(total)-Number($("#amount_paid").val());
		}
		
		$("#balance_due").val(total);
	}
		
	$("#bill_to").change(function(){
		if($(this).val()=="New")
		{
			$('#CreateCustomer').modal({backdrop: 'static', keyboard: false}, 'show');
		}
		else
		{
			$("#CreateCustomer").modal('hide');
		}
	});
	
	$("#ModalBtn").click(function(){
		$("#bill_to").val("");
	});
	
});

</script>

<!---- This is not end -->

<script type="text/javascript">
	
	// $("#AppendRow").click(function(){
		// $("#TxtRow").clone().appendTo('#TableRow');
	// });

    $(document).ready(function() {
        var grand_tot = 0;
        //item list code
        $("#list").hide();
        $("#divtotal").hide();

        // adding an item to table
        $('#additem').on('click', function() {
            if ($('#item_name').val() != '' && $('#item_qty').val() != '' && $('#item_rate').val() != '') {
                $("#list").show();
                var item_name = $('#item_name').val();
                var item_qty = $('#item_qty').val();
                var item_rate = $('#item_rate').val();
                var item_total = $('#item_total').val();
                $('#list').append('<tr><td>' + item_name + '</td><td>' + item_rate + '</td><td>' + item_qty + '</td><td>' + item_total + '</td><td><button class="remove">Remove</button></td></tr></li>')
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
            for (var j = 2; j <= 3; j++) {
                calculateColumn(j);
            }
            $(this).hide();
            $("#divtotal").show();


            console.log(itemsObject)
        });

        // code to update total qty,totalamount.
        function calculateColumn(index) {
            var total = 0;
            $('table tr').each(function() {
                var value = parseFloat($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
            });
            $('table tfoot td').eq(index).text('Total:' + total);
            if (index == 2) {
                $('#total_qty').val(total);
            }
            if (index == 3) {
                $('#total_amt').val(total);
                grand_tot = total;
                $('#balance').val(total);
                $('#refunded').val(0);
            }
        }
        //end of code
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
                val1 = parseFloat($('#item_qty').val());
                val2 = parseFloat($('#item_rate').val());

                if (val1 && val2) {
                    res = val1 * val2
                    $('#item_total').val(res);
                }

                if ($('#paid').val() != '' && $('#discount').val()) {

                    $('#balance').val(parseFloat($('#total_amt').val()) - parseFloat($('#paid').val()));
                }

                if ($('#discount').val() != '' && $('#discount').val()) {
                    // debugger

                    $('#total_amt').val(parseFloat(grand_tot) - parseFloat($('#discount').val()));
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
                // order_no: {
                //     required: true
                // },
                customer_id: {
                    required: true
                },
                subject: {
                    required: true
                },
                description: {
                    required: true
                },
                // total_qty: {
                //     required: true
                // },
                // total_amt: {
                //     required: true
                // },
                paid: {
                    required: true
                },
                // balance: {
                //     required: true
                // },
                refunded: {
                    required: true
                },
                due_date: {
                    required: true
                },
                terms: {
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
	
$("#frm_create").on('submit',(function(e){
	e.preventDefault();
	var formData = new FormData($("#frm_create")[0]);
	$.ajax({
		'async': false,
        url: '<?php echo base_url(); ?>Invoices/create_invoice',
		type: "POST",
		data:  formData,
		contentType: false,
		cache: false,
		processData:false,
		success: function(data)
		{
			if(data=="Error")
			{
				alert("Add Item to the List");
			}
			else
			{
				window.location.href("<?php echo base_url() ?>invoices");
			}
		}
	});
}));
</script>