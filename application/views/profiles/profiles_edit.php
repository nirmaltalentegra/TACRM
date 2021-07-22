
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Profiles <small>-Detail list of Profiles</small></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="#">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          Profiles
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
<input type="hidden"  name="id" name="id" value="<?php echo $id; ?>" />
      <div class="card-header">
                <h4>Profiles</h4>
              </div>
              <div class="card-body">
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Company Name</label>
           
			<input type="text" class="form-control " name="company_name" id="company_name" placeholder="Company Name" value="<?php echo $company_name; ?>" />
			<?php echo form_error('company_name') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="timestamp">Created At</label>
           
			<input type="text" class="form-control " name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
			<?php echo form_error('created_at') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Display Name</label>
           
			<input type="text" class="form-control " name="display_name" id="display_name" placeholder="Display Name" value="<?php echo $display_name; ?>" />
			<?php echo form_error('display_name') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="date">Dob</label>
           
			<input type="text" class="form-control " name="dob" id="dob" placeholder="Dob" value="<?php echo $dob; ?>" />
			<?php echo form_error('dob') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Fullname</label>
           
			<input type="text" class="form-control " name="fullname" id="fullname" placeholder="Fullname" value="<?php echo $fullname; ?>" />
			<?php echo form_error('fullname') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Gender</label>
           
			<input type="text" class="form-control " name="gender" id="gender" placeholder="Gender" value="<?php echo $gender; ?>" />
			<?php echo form_error('gender') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Location</label>
           
			<input type="text" class="form-control " name="location" id="location" placeholder="Location" value="<?php echo $location; ?>" />
			<?php echo form_error('location') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Postalcode</label>
           
			<input type="text" class="form-control " name="postalcode" id="postalcode" placeholder="Postalcode" value="<?php echo $postalcode; ?>" />
			<?php echo form_error('postalcode') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="longtext">Professional Exp</label>
           
			<input type="text" class="form-control " name="professional_exp" id="professional_exp" placeholder="Professional Exp" value="<?php echo $professional_exp; ?>" />
			<?php echo form_error('professional_exp') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="longtext">Profile Description</label>
           
			<input type="text" class="form-control " name="profile_description" id="profile_description" placeholder="Profile Description" value="<?php echo $profile_description; ?>" />
			<?php echo form_error('profile_description') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Role Job</label>
           
			<input type="text" class="form-control " name="role_job" id="role_job" placeholder="Role Job" value="<?php echo $role_job; ?>" />
			<?php echo form_error('role_job') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Speciality Strength</label>
           
			<input type="text" class="form-control " name="speciality_strength" id="speciality_strength" placeholder="Speciality Strength" value="<?php echo $speciality_strength; ?>" />
			<?php echo form_error('speciality_strength') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Status</label>
           
			<input type="text" class="form-control " name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
			<?php echo form_error('status') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="longtext">Subject Tech</label>
           
			<input type="text" class="form-control " name="subject_tech" id="subject_tech" placeholder="Subject Tech" value="<?php echo $subject_tech; ?>" />
			<?php echo form_error('subject_tech') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="longtext">Teaching Details</label>
           
			<input type="text" class="form-control " name="teaching_details" id="teaching_details" placeholder="Teaching Details" value="<?php echo $teaching_details; ?>" />
			<?php echo form_error('teaching_details') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="timestamp">Updated At</label>
           
			<input type="text" class="form-control " name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
			<?php echo form_error('updated_at') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="longtext">User Education</label>
           
			<input type="text" class="form-control " name="user_education" id="user_education" placeholder="User Education" value="<?php echo $user_education; ?>" />
			<?php echo form_error('user_education') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">User Id</label>
           
			<input type="text" class="form-control " name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" />
			<?php echo form_error('user_id') ?>
		
		</div> <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('profiles/'); ?>';">Cancel</button>

                              
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
	        company_name: {
							required: true
							},
	        created_at: {
							required: true
							},
	        display_name: {
							required: true
							},
	        dob: {
							required: true
							},
	        fullname: {
							required: true
							},
	        gender: {
							required: true
							},
	        location: {
							required: true
							},
	        postalcode: {
							required: true
							},
	        professional_exp: {
							required: true
							},
	        profile_description: {
							required: true
							},
	        role_job: {
							required: true
							},
	        speciality_strength: {
							required: true
							},
	        status: {
							required: true
							},
	        subject_tech: {
							required: true
							},
	        teaching_details: {
							required: true
							},
	        updated_at: {
							required: true
							},
	        user_education: {
							required: true
							},
	        user_id: {
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