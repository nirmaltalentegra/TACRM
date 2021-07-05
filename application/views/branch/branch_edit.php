
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Branch <small>-Detail list of Branch</small></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="#">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          Branch
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
<input type="hidden"  name="branch_id" name="branch_id" value="<?php echo $branch_id; ?>" />
      <div class="card-header">
                <h4>Branch</h4>
              </div>
              <div class="card-body">
	    
		<div class=" form-group">
			 <label class="control-label " for="int">Branch Type</label>
             <select class="form-control" name="branch_type" id="branch_type" placeholder="Branch Type" >
					<option value="0">Select</option>
			  <?php foreach ($row_branch_type as $row)
				{ ?>
					<option <?=($branch_type == $row['branch_type_id'])?'selected':''; ?> value="<?php echo $row['branch_type_id'];?>" ><?php echo $row['branch_type_name']; ?></option>
				<?php 
				}
				?>
			  </select>
			  <?php echo form_error('branch_type') ?>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="varchar">Branch Name</label>
           
			<input type="text" class="form-control " name="branch_name" id="branch_name" placeholder="Branch Name" value="<?php echo $branch_name; ?>" />
			<?php echo form_error('branch_name') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="date">Branch Reg Date</label>
           
			<input type="date" class="form-control " name="branch_reg_date" id="branch_reg_date" placeholder="Branch Reg Date" value="<?php echo $branch_reg_date; ?>" />
			<?php echo form_error('branch_reg_date') ?>
		
		</div>
	    <div class=" form-group"> 
					<label class="control-label " for="branch_address">Branch Address</label>
					
					<textarea class="form-control " rows="3" name="branch_address" id="branch_address" placeholder="Branch Address"><?php echo $branch_address; ?></textarea>
					<?php echo form_error('branch_address') ?>
				
				</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Branch Area</label>
           
			<input type="text" class="form-control " name="branch_area" id="branch_area" placeholder="Branch Area" value="<?php echo $branch_area; ?>" />
			<?php echo form_error('branch_area') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">City</label>
           <select class="form-control" name="city_id" id="city_id" placeholder="City" >
					<option value="0">Select</option>
			  <?php foreach ($row_city as $row)
				{ ?>
					<option <?=($city_id == $row['city_id'])?'selected':''; ?> value="<?php echo $row['city_id'];?>" ><?php echo $row['city_name']; ?></option>
				<?php 
				}
				?>
			  </select>
			<?php echo form_error('city_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Country</label>
            <select class="form-control" name="country_id" id="country_id" placeholder="City" >
					<option value="0">Select</option>
			  <?php foreach ($row_country as $row)
				{ ?>
					<option <?=($country_id == $row['country_id'])?'selected':''; ?> value="<?php echo $row['country_id'];?>" ><?php echo $row['country_name']; ?></option>
				<?php 
				}
				?>
			  </select>
			  <?php echo form_error('country_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Zipcode</label>
           
			<input type="text" class="form-control " name="zipcode" id="zipcode" placeholder="Zipcode" value="<?php echo $zipcode; ?>" />
			<?php echo form_error('zipcode') ?>
		
		</div>
		<div class=" form-group"> 
					<label class="control-label " for="land_mark">Land Mark</label>
					
					<textarea class="form-control " rows="3" name="land_mark" id="land_mark" placeholder="Land Mark"><?php echo $land_mark; ?></textarea>
					<?php echo form_error('land_mark') ?>
				
		</div>
		<div class=" form-group">
			 <label class="control-label " for="varchar">Mobile</label>
           
			<input type="text" class="form-control " name="mobile" id="mobile" placeholder="Mobile" value="<?php echo $mobile; ?>" />
			<?php echo form_error('mobile') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Phone</label>
           
			<input type="text" class="form-control " name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
			<?php echo form_error('phone') ?>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="varchar">Email Id</label>
           
			<input type="text" class="form-control " name="email_id" id="email_id" placeholder="Email Id" value="<?php echo $email_id; ?>" />
			<?php echo form_error('email_id') ?>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="int">Manager Id</label>
            <select class="form-control" name="manager_id" id="manager_id" placeholder="Manager" >
					<option value="0">Select</option>
			  <?php foreach ($row_staff as $row)
				{ ?>
					<option <?=($manager_id == $row['staff_id'])?'selected':''; ?> value="<?php echo $row['staff_id'];?>" ><?php echo $row['firstname'].' '.$row['lastname'] ; ?></option>
				<?php 
				}
				?>
			  </select>
			  <?php echo form_error('manager_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Branch Status</label>
			<select class="form-control" name="branch_status" id="branch_status" placeholder="Branch Status" >
					<option value="0">Select</option>
			  <?php foreach ($row_status as $row)
				{ ?>
					<option <?=($branch_status == $row['status_id'])?'selected':''; ?> value="<?php echo $row['status_id'];?>" ><?php echo $row['status']; ?></option>
				<?php 
				}
				?>
			  </select><?php echo form_error('branch_status') ?>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="int">Autoresp Email Id</label>
           
			<input type="text" class="form-control " name="autoresp_email_id" id="autoresp_email_id" placeholder="Autoresp Email Id" value="<?php echo $autoresp_email_id; ?>" />
			<?php echo form_error('autoresp_email_id') ?>
		
		</div>
	    <div class=" form-group"> 
					<label class="control-label " for="signature">Signature</label>
					
					<textarea class="form-control " rows="3" name="signature" id="signature" placeholder="Signature"><?php echo $signature; ?></textarea>
					<?php echo form_error('signature') ?>
				
				</div>
	
	     <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('branch/'); ?>';">Cancel</button>

                              
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
	        autoresp_email_id: {
							required: true
							},
	        branch_address: {
							required: true
							},
	        branch_area: {
							required: true
							},
	        branch_code: {
							required: true
							},
	        branch_name: {
							required: true
							},
	        branch_reg_date: {
							required: true
							},
	        branch_status: {
							required: true
							},
	        branch_type: {
							required: true
							},
	        city_id: {
							required: true
							},
	        country_id: {
							required: true
							},
	        email_id: {
							required: true
							},
	        flags: {
							required: true
							},
	        ispublic: {
							required: true
							},
	        land_mark: {
							required: true
							},
	        manager_id: {
							required: true
							},
	        mobile: {
							required: true
							},
	        phone: {
							required: true
							},
	        signature: {
							required: true
							},
	        zipcode: {
							required: true
							},
	        },
			messages: {
	        },highlight: function(element) { // hightlight error inputs
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