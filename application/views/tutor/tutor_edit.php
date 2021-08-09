
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Users <small>-Detail list of Users</small></h1>
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
		  
<form id="frm_edit" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $user['action']; ?>" method="post">
<input type="hidden"  name="id" name="id" value="<?php echo $user['id']; ?>" />
<input type="hidden"  name="user_id" name="user_id" value="<?php echo $profile['user_id']; ?>" />
      <div class="card-header">
                <h4>Users</h4>
              </div>
              <div class="card-body">
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Name</label>
         
			<input type="text" class="form-control " name="name" id="name" placeholder="Name" value="<?php echo $user['name']; ?>" />
			<?php echo form_error('name') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Email</label>
         
			<input type="text" class="form-control " name="email" id="email" placeholder="Email" value="<?php echo $user['email']; ?>" />
			<?php echo form_error('email') ?>
		
		</div>
		
		
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Mobile</label>
         
			<input type="text" class="form-control " name="phone" id="phone" placeholder="Phone" value="<?php echo $user['phone']; ?>" />
			<?php echo form_error('phone') ?>
		
		</div>
		
		<div class=" form-group">
			 <label class="control-label " for="varchar">Skills</label>
         
			<textarea class="form-control " rows="3" name="skills" id="skills" placeholder="Skills"><?php echo $profile['skills']; ?></textarea>			
			<?php echo form_error('skills') ?>
		
		</div>

		<div class=" form-group">
			  <label class="control-label " for="varchar">Expert Level</label>
         
			<select name="expert_level" id="expert_level" class="form-control">
			<option value="Beginners" <?php if($profile['expert_level']== 'Beginners') echo "selected";?>>Beginners</option>
			<option value="intermediate" <?php if($profile['expert_level']=='intermediate') echo "selected";?>>intermediate</option>
			<option value="SME" <?php if($profile['expert_level']=='SME' )echo "selected";?>>SME</option>
			</select>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="varchar">Certification</label>
         
			<textarea class="form-control " rows="3" name="certification" id="certification" placeholder="Certification"><?php echo $profile['certification']; ?></textarea>
			<?php echo form_error('certification') ?>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="varchar">Cost per hour</label>
         
			<textarea class="form-control " rows="3" name="cost_per_hour" id="cost_per_hour" placeholder="Cost per hour"><?php echo $profile['cost_per_hour']; ?></textarea>
			<?php echo form_error('cost_per_hour') ?>
		
		</div>
		
		<div class=" form-group">
			 <label class="control-label " for="varchar">Availablity</label>
         
			<input type="text" class="form-control " name="availablity" id="availablity" placeholder="availablity" value="<?php echo $profile['availablity']; ?>" />
			<?php echo form_error('availablity') ?>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="varchar">Document Type</label>
         
			<select name="document_type" id="document_type" class="form-control">
			<option value="Pan card"<?php if($profile['document_type']=='PAN Card') echo "selected";?>>PAN Card</option>
			<option value="Aadhar Card" <?php if($profile['document_type']=='Aadhar Card') echo "selected";?>>Aadhar Card</option>
			<option value="Driving License" <?php if($profile['document_type']=='Driving License') echo "selected";?>>Driving License</option>
			</select>
			<?php echo form_error('document_type') ?>
		
		</div>
		
		<div class=" form-group">
			 <label class="control-label " for="varchar">Photo id proof</label>
         
			<input type="text" class="form-control " name="document_file_name" id="document_file_name" placeholder="Photo id proof" value="<?php echo $profile['document_file_name']; ?>" />
			<?php echo form_error('document_file_name') ?>
		
		</div>

		<div class=" form-group">
			 <label class="control-label " for="varchar">Bank account details</label>
         
			<textarea class="form-control " rows="3" name="bank_details" id="bank_details" placeholder="Bank account details"><?php echo $profile['bank_details']; ?></textarea>
			<?php echo form_error('bank_details') ?>
		
		</div>


		<!--<div class=" form-group">
			 <label class="control-label " for="varchar">User Type</label>
         
		<input type="text" class="form-control " name="user_type" id="user_type" placeholder="User Type" value="<?php echo $user_type; ?>" />
			<select name="user_type" id="user_type" class="form-control">
			<option value="teacher">Teacher</option>
			<option value="student">Student</option>
			<option value="parents">Parents</option>
			</select>
			<?php echo form_error('user_type') ?>
		
		</div>
		-->
		<div class=" form-group">
			 <label class="control-label " for="varchar">I am Type</label>
         
			<select name="iam_type" id="iam_type" class="form-control">
			<option value="Individual Teacher" <?php if($user['iam_type']=='Individual Teacher') echo "selected";?>>Individual Teacher</option>
			<option value="Tutoring Company" <?php if($user['iam_type']=='Tutoring Company') echo "selected";?>>Tutoring Company</option>
			</select>
			<?php echo form_error('iam_type') ?>
		
		</div>
		
		<div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('users/'); ?>';">Cancel</button>

                              
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
	        created_at: {
							required: true
							},
	        default_email_id: {
							required: true
							},
	        default_mobile_no: {
							required: true
							},
	        email: {
							required: true
							},
	        email_verified_at: {
							required: true
							},
	        facebook_id: {
							required: true
							},
	        google_id: {
							required: true
							},
	        iam_type: {
							required: true
							},
	        last_login: {
							required: true
							},
	        last_seen: {
							required: true
							},
	        linkedin: {
							required: true
							},
	        name: {
							required: true
							},
	        only_acc: {
							required: true
							},
	        org_id: {
							required: true
							},
	        password: {
							required: true
							},
	        phone: {
							required: true
							},
	        phone_verified: {
							required: true
							},
	        profile_img: {
							required: true
							},
	        remember_token: {
							required: true
							},
	        status: {
							required: true
							},
	        temp_email: {
							required: true
							},
	        updated_at: {
							required: true
							},
	        user_type: {
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