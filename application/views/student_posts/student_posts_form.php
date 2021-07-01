


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
            <form id="frm_create" name="frm_create" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
              <div class="card-header">
                <h4>Student_posts</h4>
              </div>
              <div class="card-body">
	    <div class=" form-group">
			 <label class="control-label " for="date">Ass Due Date</label>
         
			<input type="text" class="form-control " name="ass_due_date" id="ass_due_date" placeholder="Ass Due Date" value="<?php echo $ass_due_date; ?>" />
			<?php echo form_error('ass_due_date') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="timestamp">Created At</label>
         
			<input type="text" class="form-control " name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
			<?php echo form_error('created_at') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">I Need Smeone</label>
         
			<input type="text" class="form-control " name="i_need_smeone" id="i_need_smeone" placeholder="I Need Smeone" value="<?php echo $i_need_smeone; ?>" />
			<?php echo form_error('i_need_smeone') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Km Travel</label>
         
			<input type="text" class="form-control " name="km_travel" id="km_travel" placeholder="Km Travel" value="<?php echo $km_travel; ?>" />
			<?php echo form_error('km_travel') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Meeting Options</label>
         
			<input type="text" class="form-control " name="meeting_options" id="meeting_options" placeholder="Meeting Options" value="<?php echo $meeting_options; ?>" />
			<?php echo form_error('meeting_options') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">St Budget</label>
         
			<input type="text" class="form-control " name="st_budget" id="st_budget" placeholder="St Budget" value="<?php echo $st_budget; ?>" />
			<?php echo form_error('st_budget') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">St Gender Prfer</label>
         
			<input type="text" class="form-control " name="st_gender_prfer" id="st_gender_prfer" placeholder="St Gender Prfer" value="<?php echo $st_gender_prfer; ?>" />
			<?php echo form_error('st_gender_prfer') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">St I Want</label>
         
			<input type="text" class="form-control " name="st_i_want" id="st_i_want" placeholder="St I Want" value="<?php echo $st_i_want; ?>" />
			<?php echo form_error('st_i_want') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">St Level</label>
         
			<input type="text" class="form-control " name="st_level" id="st_level" placeholder="St Level" value="<?php echo $st_level; ?>" />
			<?php echo form_error('st_level') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">St Location</label>
         
			<input type="text" class="form-control " name="st_location" id="st_location" placeholder="St Location" value="<?php echo $st_location; ?>" />
			<?php echo form_error('st_location') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="longtext">St Requirement</label>
         
			<input type="text" class="form-control " name="st_requirement" id="st_requirement" placeholder="St Requirement" value="<?php echo $st_requirement; ?>" />
			<?php echo form_error('st_requirement') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">St Subjects</label>
         
			<input type="text" class="form-control " name="st_subjects" id="st_subjects" placeholder="St Subjects" value="<?php echo $st_subjects; ?>" />
			<?php echo form_error('st_subjects') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Status</label>
         
			<input type="text" class="form-control " name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
			<?php echo form_error('status') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Tut Wantd</label>
         
			<input type="text" class="form-control " name="tut_wantd" id="tut_wantd" placeholder="Tut Wantd" value="<?php echo $tut_wantd; ?>" />
			<?php echo form_error('tut_wantd') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="timestamp">Updated At</label>
         
			<input type="text" class="form-control " name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
			<?php echo form_error('updated_at') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="bigint">User Id</label>
         
			<input type="text" class="form-control " name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" />
			<?php echo form_error('user_id') ?>
		
		</div> <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('student_posts/'); ?>';">Cancel</button>

                              
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
	        ass_due_date: {
							required: true
							},
	        created_at: {
							required: true
							},
	        i_need_smeone: {
							required: true
							},
	        km_travel: {
							required: true
							},
	        meeting_options: {
							required: true
							},
	        st_budget: {
							required: true
							},
	        st_gender_prfer: {
							required: true
							},
	        st_i_want: {
							required: true
							},
	        st_level: {
							required: true
							},
	        st_location: {
							required: true
							},
	        st_requirement: {
							required: true
							},
	        st_subjects: {
							required: true
							},
	        status: {
							required: true
							},
	        tut_wantd: {
							required: true
							},
	        updated_at: {
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