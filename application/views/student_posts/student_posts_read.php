
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Student_posts <small>-Detail list of Student_posts</small></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="#">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          Student_posts
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
                <h4>Student_posts</h4>
              </div>
              <div class="card-body">


        <table class="table">
	    <tr><td>Ass Due Date</td><td><?php echo $ass_due_date; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>I Need Smeone</td><td><?php echo $i_need_smeone; ?></td></tr>
	    <tr><td>Km Travel</td><td><?php echo $km_travel; ?></td></tr>
	    <tr><td>Meeting Options</td><td><?php echo $meeting_options; ?></td></tr>
	    <tr><td>St Budget</td><td><?php echo $st_budget; ?></td></tr>
	    <tr><td>St Gender Prfer</td><td><?php echo $st_gender_prfer; ?></td></tr>
	    <tr><td>St I Want</td><td><?php echo $st_i_want; ?></td></tr>
	    <tr><td>St Level</td><td><?php echo $st_level; ?></td></tr>
	    <tr><td>St Location</td><td><?php echo $st_location; ?></td></tr>
	    <tr><td>St Requirement</td><td><?php echo $st_requirement; ?></td></tr>
	    <tr><td>St Subjects</td><td><?php echo $st_subjects; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Tut Wantd</td><td><?php echo $tut_wantd; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td>User Id</td><td><?php echo $user_id; ?></td></tr>
	</table>
         <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('student_posts/'); ?>';">Cancel</button>

                              
                            </div>
		

			     
     
          </div>
         </div>
      </div>
    </div>
	</div>
  </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>
	 

