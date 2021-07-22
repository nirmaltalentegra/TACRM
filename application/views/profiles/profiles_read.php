
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
          
              <div class="card-header">
                <h4>Profiles</h4>
              </div>
              <div class="card-body">


        <table class="table">
	    <tr><td>Company Name</td><td><?php echo $company_name; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Display Name</td><td><?php echo $display_name; ?></td></tr>
	    <tr><td>Dob</td><td><?php echo $dob; ?></td></tr>
	    <tr><td>Fullname</td><td><?php echo $fullname; ?></td></tr>
	    <tr><td>Gender</td><td><?php echo $gender; ?></td></tr>
	    <tr><td>Location</td><td><?php echo $location; ?></td></tr>
	    <tr><td>Postalcode</td><td><?php echo $postalcode; ?></td></tr>
	    <tr><td>Professional Exp</td><td><?php echo $professional_exp; ?></td></tr>
	    <tr><td>Profile Description</td><td><?php echo $profile_description; ?></td></tr>
	    <tr><td>Role Job</td><td><?php echo $role_job; ?></td></tr>
	    <tr><td>Speciality Strength</td><td><?php echo $speciality_strength; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Subject Tech</td><td><?php echo $subject_tech; ?></td></tr>
	    <tr><td>Teaching Details</td><td><?php echo $teaching_details; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td>User Education</td><td><?php echo $user_education; ?></td></tr>
	    <tr><td>User Id</td><td><?php echo $user_id; ?></td></tr>
	</table>
         <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('profiles/'); ?>';">Cancel</button>

                              
                            </div>
		

			     
     
          </div>
         </div>
      </div>
    </div>
	</div>
  </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>
	 

