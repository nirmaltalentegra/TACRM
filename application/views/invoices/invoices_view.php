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
        <?php $user_data = get_user_details($this->session->userdata('id')); ?>
		
		<div class="section-body">
      <div class="invoice">
        <div class="invoice-print">
          <div class="row">
			<?php foreach($invoices as $nt) { ?>
            <div class="col-lg-12">
				<div class="invoice-title">
					<h2>Invoice</h2>
					<div class="invoice-number">					
						Order <?php echo $nt->id; ?>
						<input type="hidden" id="invoice_id" value="<?php echo $nt->id; ?>" />
					</div>
				</div>
              <hr>
				<div class="row">
					<div class="col-md-6">
						<address>
							<strong>Invoice From:</strong><br>
							<?php echo $nt->invoice_from; ?>
						</address>
						<address>
							<strong><?php echo $nt->invoice_to_label; ?>:</strong><br>
							<?php echo $nt->invoice_to; ?>
						</address>
						<div class="row">
							<div class="col-md-6">
								<strong><?php echo $nt->invoice_notes_label; ?>:</strong><br>
								<?php echo $nt->invoice_notes; ?>
							</div>
							<div class="col-md-6">
								<strong><?php echo $nt->invoice_terms_label; ?>:</strong><br>
								<?php echo $nt->invoice_terms; ?>
							</div>
						</div><br/><br/>
					</div>
					<div class="col-md-6 text-md-right">
						<address>
							<strong><?php echo $nt->invoice_ship_label; ?>:</strong><br>
							<?php echo $nt->invoice_ship; ?>
						</address>
						<address>
							<strong><?php echo $nt->invoice_payment_terms_label; ?>:</strong><br>
							<?php echo $nt->invoice_payment_terms; ?>
						</address>
						<address>
							<strong>Status:</strong><br>
							<?php if($nt->invoice_status=='1'){ echo "Active"; } else { echo "Inactive"; } ?>
						</address>
					</div>
				</div>
              <div class="row">
                <div class="col-md-6">
                  <address>
                    <strong>Payment Method:</strong><br>
                    Visa ending **** 4242<br>
                    ujang@maman.com
                  </address>
                </div>
                <div class="col-md-6 text-md-right">
					<address>
						<strong><?php echo $nt->invoice_date_label; ?>:</strong><br>
						<?php echo date('d/m/Y',strtotime($nt->invoice_date)); ?><br>
					</address>
					<address>
						<strong><?php echo $nt->invoice_due_date_label; ?>:</strong><br>
						<?php echo date('d/m/Y',strtotime($nt->invoice_due_date)); ?>
					</address>
                </div>
              </div>
            </div>
			<?php } ?>
          </div>

			<div class="row mt-4">
				<div class="col-md-12">
					<div class="section-title">Order Summary</div>
					<p class="section-lead">All items here cannot be deleted.</p>
					<div class="table-responsive">
						<table class="table table-striped table-hover table-md">
							<tbody>
								<tr>
									<th data-width="40" style="width: 40px;">#</th>
									<th>Item</th>
									<th class="text-center">Quantity</th>
									<th class="text-center">Price</th>
									<th class="text-right">Total</th>
								</tr>
								<?php
									$i=1;
									foreach($invoices_items as $row)
									{
										echo '<tr>';
											echo '<td>'.$i.'</td>';
											echo '<td>'.$row->invoice_item.'</td>';
											echo '<td class="text-right">'.$row->invoice_qty.'</td>';
											echo '<td class="text-right">$'.$row->invoice_rate.'</td>';
											echo '<td class="text-right">$'.($row->invoice_qty*$row->invoice_rate).'</td>';
										echo '</tr>';
										$i++;
									}
								?>
							</tbody>
						</table>
					</div>
              <div class="row mt-4">
                <div class="col-lg-8">
                  
                </div>
                <div class="col-lg-4 text-right">
					<?php
						foreach($invoices as $nt)
						{
							echo '<div class="invoice-detail-item">';
								echo '<div class="invoice-detail-name">'.$nt->invoice_subtotal_label.'</div>';
								echo '<div class="invoice-detail-value">$'.$nt->invoice_subtotal.'</div>';
							echo '</div>';
							
							echo '<div class="row">';
							if($nt->invoice_tax>0)
							{
								echo '<div class="col-md-4">';
									echo '<div class="invoice-detail-item">';
										echo '<div class="invoice-detail-name">'.$nt->invoice_tax_label.'</div>';
										echo '<div class="invoice-detail-value">$'.$nt->invoice_tax.'</div>';
									echo '</div>';
								echo '</div>';
							}
							
							if($nt->invoice_discount>0)
							{
								echo '<div class="col-md-4">';
									echo '<div class="invoice-detail-item">';
										echo '<div class="invoice-detail-name">'.$nt->invoice_discount_label.'</div>';
										echo '<div class="invoice-detail-value">$'.$nt->invoice_discount.'</div>';
									echo '</div>';
								echo '</div>';
							}
							
							if($nt->invoice_shipping>0)
							{
								echo '<div class="col-md-4">';
									echo '<div class="invoice-detail-item">';
										echo '<div class="invoice-detail-name">'.$nt->invoice_shipping_label.'</div>';
										echo '<div class="invoice-detail-value">$'.$nt->invoice_tax.'</div>';
									echo '</div>';
								echo '</div>';
							}
							echo '</div>';
							
							echo '<hr class="mt-2 mb-2">';
							echo '<div class="invoice-detail-item">';
								echo '<div class="invoice-detail-name">'.$nt->invoice_total_label.'</div>';
								echo '<div class="invoice-detail-value">$'.$nt->invoice_total.'</div>';
							echo '</div>';
							
							if($nt->invoice_amountpaid>0)
							{
								echo '<div class="invoice-detail-item">';
									echo '<div class="invoice-detail-name">'.$nt->invoice_amountpaid_label.'</div>';
									echo '<div class="invoice-detail-value">$'.$nt->invoice_amountpaid.'</div>';
								echo '</div>';
							}
							
							echo '<div class="invoice-detail-item">';
								echo '<div class="invoice-detail-name">'.$nt->invoice_balance_due_label.'</div>';
								echo '<div class="invoice-detail-value">$'.$nt->invoice_balance_due.'</div>';
							echo '</div>';
						}
					?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="text-md-right">
          <!--<div class="float-lg-left mb-lg-0 mb-3">
            <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button>
            <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
          </div>-->
          <button class="btn btn-warning btn-icon icon-left" id="print_invoice"><i class="fas fa-print"></i> Print</button>
        </div>
      </div>
    </div>

    </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>

<script type="text/javascript">

$("#print_invoice").click(function(){
	var student_id = $("#invoice_id").val();
	window.location.href = "<?php echo base_url(); ?>Invoices/print_payment/"+student_id;
});

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
			alert(data);
			if(data=="Error")
			{
				alert("Add Item to the List");
				window.location.reload();
			}
			else
			{
				window.location.href("<?php echo base_url() ?>invoices");
			}
		}
	});
}));
</script>