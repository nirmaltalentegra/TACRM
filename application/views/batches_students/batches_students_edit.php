
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
		  
<form id="frm_edit" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
<input type="hidden"  name="batch_id" name="batch_id" value="<?php echo $batch_id; ?>" />
      <div class="card-header">
                <h4>Batches_students</h4>
              </div>
              <div class="card-body">
	    <div class=" form-group">
			 <label class="control-label " for="tinyint">Active</label>
           
			<input type="text" class="form-control " name="active" id="active" placeholder="Active" value="<?php echo $active; ?>" />
			<?php echo form_error('active') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="enum">Certified</label>
           
			<input type="text" class="form-control " name="certified" id="certified" placeholder="Certified" value="<?php echo $certified; ?>" />
			<?php echo form_error('certified') ?>
		
		</div>
	
	    <div class=" form-group"> 
					<label class="control-label " for="faculty_comments">Faculty Comments</label>
					
					<textarea class="form-control " rows="3" name="faculty_comments" id="faculty_comments" placeholder="Faculty Comments"><?php echo $faculty_comments; ?></textarea>
					<?php echo form_error('faculty_comments') ?>
				
				</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Faculty Id</label>
           
			<input type="text" class="form-control " name="faculty_id" id="faculty_id" placeholder="Faculty Id" value="<?php echo $faculty_id; ?>" />
			<?php echo form_error('faculty_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Faculty Rating</label>
           
			<input type="text" class="form-control " name="faculty_rating" id="faculty_rating" placeholder="Faculty Rating" value="<?php echo $faculty_rating; ?>" />
			<?php echo form_error('faculty_rating') ?>
		
		</div>
	    <div class=" form-group"> 
					<label class="control-label " for="student_comments">Student Comments</label>
					
					<textarea class="form-control " rows="3" name="student_comments" id="student_comments" placeholder="Student Comments"><?php echo $student_comments; ?></textarea>
					<?php echo form_error('student_comments') ?>
				
				</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Student Id</label>
           
			<input type="text" class="form-control " name="student_id" id="student_id" placeholder="Student Id" value="<?php echo $student_id; ?>" />
			<?php echo form_error('student_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Student Rating</label>
           
			<input type="text" class="form-control " name="student_rating" id="student_rating" placeholder="Student Rating" value="<?php echo $student_rating; ?>" />
			<?php echo form_error('student_rating') ?>
		
		</div>
	 <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('batches_students/'); ?>';">Cancel</button>

                              
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
	        active: {
							required: true
							},
	        certified: {
							required: true
							},
	        faculty_comments: {
							required: true
							},
	        faculty_id: {
							required: true
							},
	        faculty_rating: {
							required: true
							},
	        student_comments: {
							required: true
							},
	        student_id: {
							required: true
							},
	        student_rating: {
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