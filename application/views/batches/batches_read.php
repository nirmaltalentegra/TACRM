
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Batches <small>-Detail list of Batches</small></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="#">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          Batches
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
                <h4>Batches</h4>
              </div>
              <div class="card-body">


        <table class="table">
	    <tr><td>Course</td><td><?php echo $course_id; ?></td></tr>
	    <tr><td>Category</td><td><?php echo $category_id; ?></td></tr>
	    <tr><td>Batch Title</td><td><?php echo $batch_title; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>Faculty</td><td><?php echo $faculty_id; ?></td></tr>
	    <tr><td>Branch Id</td><td><?php echo $branch_id; ?></td></tr>
	    <tr><td>Batch Type</td><td><?php echo $batch_type; ?></td></tr>
	    <tr><td>Batch Pattern</td><td><?php echo $batch_pattern; ?></td></tr>
	    <tr><td>Start Date</td><td><?php echo $start_date; ?></td></tr>
	    <tr><td>End Date</td><td><?php echo $end_date; ?></td></tr>
	    <tr><td>Week Days</td><td><?php echo $week_days; ?></td></tr>
	    <tr><td>Student Enrolled</td><td><?php echo $student_enrolled; ?></td></tr>
	    <tr><td>Batch Capacity</td><td><?php echo $batch_capacity; ?></td></tr>
	    <tr><td>Iscorporate</td><td><?php echo $iscorporate; ?></td></tr>
	    <tr><td>Currency Id</td><td><?php echo $currency_id; ?></td></tr>
	    <tr><td>Batch Fee Type</td><td><?php echo $batch_fee_type; ?></td></tr>
	    <tr><td>Fees</td><td><?php echo $fees; ?></td></tr>
	    <tr><td>Course Fee Type</td><td><?php echo $course_fee_type; ?></td></tr>
	    <tr><td>Course Fee</td><td><?php echo $course_fee; ?></td></tr>
	    <tr><td>Batch Status</td><td><?php echo $batch_status; ?></td></tr>
	    <tr><td>Created</td><td><?php echo $created; ?></td></tr>
	    <tr><td>Updated</td><td><?php echo $updated; ?></td></tr>
	</table>
         <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('batches/'); ?>';">Cancel</button>

                              
                            </div>
		

			     
     
          </div>
         </div>
      </div>
    </div>
	</div>
  </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>
	 

