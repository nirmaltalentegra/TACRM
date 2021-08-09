<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Customers <small>-Detail list of Customers</small></h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active">
					<a href="#">Dashboard</a>
				</div>
				<div class="breadcrumb-item">
					Users
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
								<h4>Customers</h4>
							</div>
							<div class="card-body">

								<div class=" form-group">
									<label class="control-label " for="int">Prefix</label>

									<!--<input type="text" class="form-control " name="status" id="status" placeholder="Status" value="<?php echo $prefix; ?>" />-->
									<select name="prefix" id="prefix" class="form-control">
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
									<?php echo form_error('prefix') ?>

								</div>
								<div class="form-group">
									<label class="control-label " for="firstname">First Name</label>

									<input type="text" class="form-control " name="firstname" id="firstname" placeholder="firstname" value="<?php echo $firstname; ?>" />
									<?php echo form_error('firstname') ?>

								</div>

								<div class="form-group">
									<label class="control-label " for="middlename">Middle Name</label>

									<input type="text" class="form-control " name="middlename" id="middlename" placeholder="Middle Name" value="<?php echo $middlename; ?>" />
									<?php echo form_error('middlename') ?>

								</div>

								<div class="form-group">
									<label class="control-label " for="lastname">Last Name</label>

									<input type="text" class="form-control " name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $lastname; ?>" />
									<?php echo form_error('lastname') ?>

								</div>

								<div class="form-group">
									<label class="control-label " for="varchar">Address</label>

									<textarea class="form-control " name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
									<?php echo form_error('address') ?>

								</div>

								<div class=" form-group">
									<label class="control-label " for="varchar">Email</label>

									<input type="text" class="form-control " name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
									<?php echo form_error('email') ?>

								</div>
								<div class=" form-group">
									<label class="control-label " for="varchar">Phone/Mobile</label>

									<input type="text" class="form-control " name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
									<?php echo form_error('phone') ?>

								</div>
								<div class=" form-group">
									<label class="control-label " for="city">City</label>

									<input type="text" class="form-control " name="city" id="city" placeholder="city" value="<?php echo $city; ?>" />
									<?php echo form_error('city') ?>

								</div>
								<div class=" form-group">
									<label class="control-label " for="company">Comapny</label>

									<input type="text" class="form-control " name="company" id="company" placeholder="company" value="<?php echo $company; ?>" />
									<?php echo form_error('company') ?>

								</div>
								<!--<div class=" form-group">
									<label class="control-label " for="receivables">Receivables</label>

									<input type="text" class="form-control " name="receivables" id="receivable" placeholder="receivables" value="<?php //echo $receivables; ?>" />
									<?php //echo form_error('receivables') ?>

								</div>

								<div class=" form-group">
									<label class="control-label " for="credits">Credits</label>

									<input type="text" class="form-control " name="credits" id="credit" placeholder="credits" value="<?php //echo $credits; ?>" />
									<?php //echo form_error('credits') ?>

								</div>-->

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

			phone: {
				required: true
			},
			email: {
				required: true
			},
			firstname: {
				required: true
			},
			lastname: {
				required: true
			},
			prefix: {
				required: true
			},
			address: {
				required: true
			},
			company: {
				required: true
			},
			city: {
				required: true
			},
			receivables: {
				required: true
			},
			credits: {
				required: true
			},
			phone: {
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