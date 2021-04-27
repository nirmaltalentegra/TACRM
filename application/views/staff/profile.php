<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="#">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          Profile
        </div>
      </div>
    </div>
	 <?php 
	$user_data = get_user_details($this->session->userdata('id')); 

?>  
    <div class="section-body">
      <h2 class="section-title">Hi, <?php echo $user_data['user_name']; ?>!</h2>
      <p class="section-lead">
        Change information about yourself on this page.
      </p>

      <div class="row mt-sm-4">
	  <!---- This is for Tab -->
	  
	  
	     <div class="col-12 col-sm-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Staff Profile</h4>
            </div>
            <div class="card-body">
              <ul class="nav nav-tabs" id="myTab2" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="passwd-tab2" data-toggle="tab" href="#passwd" role="tab" aria-controls="password" aria-selected="false">Password</a>
                </li>
              </ul>
              <div class="tab-content tab-bordered" id="myTab3Content">
                <div class="tab-pane fade show active" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                 <?php $this->load->view('staff/profile_form_tab_1');?>
                </div>
                <div class="tab-pane fade" id="passwd" role="tabpanel" aria-labelledby="passwd-tab2">
                  <?php $this->load->view('staff/profile_form_tab_2');?>
                </div>
              </div>
            </div>
          </div>
        </div>
		
<!-- End of Tab		-->
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('_layout/sitefooter'); ?>