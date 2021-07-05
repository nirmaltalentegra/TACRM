
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
          
              <div class="card-header">
                <h4>Branch</h4>
              </div>
              <div class="card-body">


        <table class="table">
	    
	    <tr><td>Branch Code</td><td><?php echo $branch_code; ?></td></tr>
	    <tr><td>Branch Type</td><td><?php echo $branch_type; ?></td></tr>
	    <tr><td>Branch Name</td><td><?php echo $branch_name; ?></td></tr>
	    <tr><td>Branch Reg Date</td><td><?php echo $branch_reg_date; ?></td></tr>
	    <tr><td>Branch Address</td><td><?php echo $branch_address; ?></td></tr>
	    <tr><td>Branch Area</td><td><?php echo $branch_area; ?></td></tr>
	    <tr><td>Land Mark</td><td><?php echo $land_mark; ?></td></tr>
	    <tr><td>City</td><td><?php echo $city_id; ?></td></tr>
	    <tr><td>Country</td><td><?php echo $country_id; ?></td></tr>
	    <tr><td>Zipcode</td><td><?php echo $zipcode; ?></td></tr>
	    <tr><td>Email Id</td><td><?php echo $email_id; ?></td></tr>
	    <tr><td>Mobile</td><td><?php echo $mobile; ?></td></tr>
	    <tr><td>Phone</td><td><?php echo $phone; ?></td></tr> 
	    <tr><td>Manager</td><td><?php echo $manager_id; ?></td></tr>
	    <tr><td>Branch Status</td><td><?php echo $branch_status; ?></td></tr>
		<tr><td>Autoresp Email Id</td><td><?php echo $autoresp_email_id; ?></td></tr>
	    <tr><td>Signature</td><td><?php echo $signature; ?></td></tr>
	    <tr><td>Created</td><td><?php echo $created; ?></td></tr>
	    <tr><td>Updated</td><td><?php echo $updated; ?></td></tr>
	</table>
         <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('branch/'); ?>';">Cancel</button>

                              
                            </div>
		

			     
     
          </div>
         </div>
      </div>
    </div>
	</div>
  </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>
	 

