
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Batches_students <small>-Detail list of Batches_students</small></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="#">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          Batches_students
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
                <h4>Batches_students</h4>
              </div>
              <div class="card-body">


        <table class="table">
	    <tr><td>Active</td><td><?php echo $active; ?></td></tr>
	    <tr><td>Certified</td><td><?php echo $certified; ?></td></tr>
	    <tr><td>Created</td><td><?php echo $created; ?></td></tr>
	    <tr><td>Faculty Comments</td><td><?php echo $faculty_comments; ?></td></tr>
	    <tr><td>Faculty Id</td><td><?php echo $faculty_id; ?></td></tr>
	    <tr><td>Faculty Rating</td><td><?php echo $faculty_rating; ?></td></tr>
	    <tr><td>Student Comments</td><td><?php echo $student_comments; ?></td></tr>
	    <tr><td>Student Id</td><td><?php echo $student_id; ?></td></tr>
	    <tr><td>Student Rating</td><td><?php echo $student_rating; ?></td></tr>
	    <tr><td>Updated</td><td><?php echo $updated; ?></td></tr>
	</table>
         <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('batches_students/'); ?>';">Cancel</button>

                              
                            </div>
		

			     
     
          </div>
         </div>
      </div>
    </div>
	</div>
  </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>
	 

