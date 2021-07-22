
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Courses Catalog <small>- Detail list of Courses Catalog</small></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="#">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          Courses Catalog
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
          
              
              <div class="card-body">


        <table class="table">
	    
	    <tr><td>Category Name</td><td><?php echo $category_id; ?></td></tr>
	    <tr><td>Course Code</td><td><?php echo $course_code; ?></td></tr>
	    <tr><td>Course Contents</td><td><?php echo $course_contents; ?></td></tr>
	    <tr><td>Course Duration</td><td><?php echo $course_duration; ?></td></tr>
	    <tr><td>Course Fee Type</td><td><?php echo $course_fee_type; ?></td></tr>
	    <tr><td>Course Fees</td><td><?php echo $course_fees; ?></td></tr>
	    <tr><td>Course Name</td><td><?php echo $course_name; ?></td></tr>
	    <tr><td>Course Summary</td><td><?php echo $course_summary; ?></td></tr>
	    <tr><td>Created</td><td><?php echo $created; ?></td></tr>
		<tr><td>Active</td><td><?php echo $active; ?></td></tr>
	    <tr><td>Added By</td><td><?php echo $added_by; ?></td></tr>
	    <tr><td>Deleted At</td><td><?php echo $deleted_at; ?></td></tr>
	    <tr><td>Is Deleted</td><td><?php echo $is_deleted; ?></td></tr>
	    <tr><td>Notes</td><td><?php echo $notes; ?></td></tr>
	    <tr><td>Updated</td><td><?php echo $updated; ?></td></tr>
	</table>
         <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('courses_catalog/'); ?>';">Cancel</button>

                              
                            </div>
		

			     
     
          </div>
         </div>
      </div>
    </div>
	</div>
  </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>
	 

