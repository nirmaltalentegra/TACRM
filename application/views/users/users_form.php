


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
            <form id="frm_create" name="frm_create" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
              <div class="card-header">
                <h4>Users</h4>
              </div>
              <div class="card-body">
	    <!--<div class=" form-group">
			 <label class="control-label " for="timestamp">Created At</label>
         
			<input type="text" class="form-control " name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
			<?php echo form_error('created_at') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Default Email Id</label>
         
			<input type="text" class="form-control " name="default_email_id" id="default_email_id" placeholder="Default Email Id" value="<?php echo $default_email_id; ?>" />
			<?php echo form_error('default_email_id') ?>
		
		</div>
		
	    <div class=" form-group">
			 <label class="control-label " for="int">Default Mobile No</label>
         
			<input type="text" class="form-control " name="default_mobile_no" id="default_mobile_no" placeholder="Default Mobile No" value="<?php echo $default_mobile_no; ?>" />
			<?php echo form_error('default_mobile_no') ?>
		
		</div>
		-->
		<div class=" form-group">
			 <label class="control-label " for="varchar">Name</label>
         
			<input type="text" class="form-control " name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
			<?php echo form_error('name') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Email</label>
         
			<input type="text" class="form-control " name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
			<?php echo form_error('email') ?>
		
		</div>
		
		<!--<div class=" form-group">
			 <label class="control-label " for="varchar">Password</label>
         
			<input type="text" class="form-control " name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
			<?php echo form_error('password') ?>
		
		</div>
		-->
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Phone</label>
         
			<input type="text" class="form-control " name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
			<?php echo form_error('phone') ?>
		
		</div>
		
		<div class=" form-group">
			 <label class="control-label " for="varchar">User Type</label>
         
			<!--<input type="text" class="form-control " name="user_type" id="user_type" placeholder="User Type" value="<?php echo $user_type; ?>" />-->
			<select name="user_type" id="user_type" class="form-control">
			<option value="teacher">Teacher</option>
			<option value="student">Student</option>
			<option value="parents">Parents</option>
			</select>
			<?php echo form_error('user_type') ?>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="int">Status</label>
			<select name="status" id="status1" class="form-control">
			<option value="1">Active</option>
			<option value="0">Inactive</option>
			</select>
			<!--<input type="text" class="form-control " name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />-->
			<?php echo form_error('status') ?>
		
		</div>
	    <!--<div class=" form-group">
			 <label class="control-label " for="timestamp">Email Verified At</label>
         
			<input type="text" class="form-control " name="email_verified_at" id="email_verified_at" placeholder="Email Verified At" value="<?php echo $email_verified_at; ?>" />
			<?php echo form_error('email_verified_at') ?>
		
		</div>
		
		
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Facebook Id</label>
         
			<input type="text" class="form-control " name="facebook_id" id="facebook_id" placeholder="Facebook Id" value="<?php echo $facebook_id; ?>" />
			<?php echo form_error('facebook_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Google Id</label>
         
			<input type="text" class="form-control " name="google_id" id="google_id" placeholder="Google Id" value="<?php echo $google_id; ?>" />
			<?php echo form_error('google_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Iam Type</label>
         
			<input type="text" class="form-control " name="iam_type" id="iam_type" placeholder="Iam Type" value="<?php echo $iam_type; ?>" />
			<?php echo form_error('iam_type') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Last Login</label>
         
			<input type="text" class="form-control " name="last_login" id="last_login" placeholder="Last Login" value="<?php echo $last_login; ?>" />
			<?php echo form_error('last_login') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="timestamp">Last Seen</label>
         
			<input type="text" class="form-control " name="last_seen" id="last_seen" placeholder="Last Seen" value="<?php echo $last_seen; ?>" />
			<?php echo form_error('last_seen') ?>
		
		</div>
	    <div class=" form-group"> 
					<label class="control-label " for="linkedin">Linkedin</label>
					
					<textarea class="form-control " rows="3" name="linkedin" id="linkedin" placeholder="Linkedin"><?php echo $linkedin_id; ?></textarea>
					<?php echo form_error('linkedin') ?>
				
		</div>
		-->
	    
		<!--
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Only Acc</label>
         
			<input type="text" class="form-control " name="only_acc" id="only_acc" placeholder="Only Acc" value="<?php echo $only_acc; ?>" />
			<?php echo form_error('only_acc') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Org Id</label>
         
			<input type="text" class="form-control " name="org_id" id="org_id" placeholder="Org Id" value="<?php echo $org_id; ?>" />
			<?php echo form_error('org_id') ?>
		
		</div>
		-->
	    
		<!--
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Phone Verified</label>
         
			<input type="text" class="form-control " name="phone_verified" id="phone_verified" placeholder="Phone Verified" value="<?php echo $phone_verified; ?>" />
			<?php echo form_error('phone_verified') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Profile Img</label>
         
			<input type="text" class="form-control " name="profile_img" id="profile_img" placeholder="Profile Img" value="<?php echo $profile_img; ?>" />
			<?php echo form_error('profile_img') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Remember Token</label>
         
			<input type="text" class="form-control " name="remember_token" id="remember_token" placeholder="Remember Token" value="<?php echo $remember_token; ?>" />
			<?php echo form_error('remember_token') ?>
		
		</div>
		-->
	    
		<!--
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Temp Email</label>
         
			<input type="text" class="form-control " name="temp_email" id="temp_email" placeholder="Temp Email" value="<?php echo $temp_email; ?>" />
			<?php echo form_error('temp_email') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="timestamp">Updated At</label>
         
			<input type="text" class="form-control " name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
			<?php echo form_error('updated_at') ?>
		
		</div>
		-->
	    
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
	 


<!---- This is not end -->

<script type="text/javascript">

var form2 = $('#frm_create');
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