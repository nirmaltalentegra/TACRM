<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Tutors <small>-Detail list of Tutor</small></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="#">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          Tutors
        </div>
      </div>
    </div>
	 <?php 
	$user_data = get_user_details($this->session->userdata('id')); 

?>  
 

     <div class="section-body">
     
	 <div class="row mt-sm-4">
	  <!---- This is for Tab -->
	  
	  
	     <div class="col-12 col-sm-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Tutor Profile</h4>
            </div>
            <div class="card-body">
              <ul class="nav nav-tabs" id="myTab2" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="basic-tab2" data-toggle="tab" href="#basic" role="tab" aria-controls="basic" aria-selected="false">Tutor Basic Info</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="subjects-tab2" data-toggle="tab" href="#subjects" role="tab" aria-controls="subjects" aria-selected="false">Subjects</a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" id="education-tab2" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="false">Education</a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" id="experience-tab2" data-toggle="tab" href="#experience" role="tab" aria-controls="experience" aria-selected="false">Experience</a>
                </li>
              </ul>
			 <!-- <form class="form-horizontal" action="<?php //echo $action; ?>" method="post" id="frm_create">-->
              <div class="tab-content tab-bordered" id="myTab3Content">
                <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab2">
                 <?php $this->load->view('tutor/tutor_form_tab_1');?>
                </div>
                <div class="tab-pane fade" id="subjects" role="tabpanel" aria-labelledby="subjects-tab2">
                  <?php $this->load->view('tutor/tutor_form_tab_2');?>
                </div>
				<div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab2">
                  <?php $this->load->view('tutor/tutor_form_tab_3');?>
                </div>
				<div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab2">
                  <?php $this->load->view('tutor/tutor_form_tab_4');?>
                </div>
              </div>
           
			<!--<div class="box-footer">
			<div class="form-group">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> <?php echo $button ?></button>&nbsp;
				  <a href="<?php echo site_url('tutor') ?>" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
				</div>
			  </div>
			</div>
			</form>
			-->

          </div>
        </div>
	</div> <!-- Main content -->
	</div>
	</section>
	</div>
<?php $this->load->view('_layout/sitefooter'); ?>
	 


<!---- This is not end -->

<script type="text/javascript">

// var form2 = $('#frm_create');
        // var error1 = $('.alert-danger', form2);
        // var success1 = $('.alert-success', form2);

        // form2.validate({
            // errorElement: 'span', //default input error message container
            // errorClass: 'help-block', // default input error message class
            // focusInvalid: false, // do not focus the last invalid input
            // ignore: "",
            // rules: {
	        // created_at: {
							// required: true
							// },
	        // default_email_id: {
							// required: true
							// },
	        // default_mobile_no: {
							// required: true
							// },
	        // email: {
							// required: true
							// },
	        // email_verified_at: {
							// required: true
							// },
	        // facebook_id: {
							// required: true
							// },
	        // google_id: {
							// required: true
							// },
	        // iam_type: {
							// required: true
							// },
	        // last_login: {
							// required: true
							// },
	        // last_seen: {
							// required: true
							// },
	        // linkedin: {
							// required: true
							// },
	        // name: {
							// required: true
							// },
	        // only_acc: {
							// required: true
							// },
	        // org_id: {
							// required: true
							// },
	        // password: {
							// required: true
							// },
	        // phone: {
							// required: true
							// },
	        // phone_verified: {
							// required: true
							// },
	        // profile_img: {
							// required: true
							// },
	        // remember_token: {
							// required: true
							// },
	        // status: {
							// required: true
							// },
	        // temp_email: {
							// required: true
							// },
	        // updated_at: {
							// required: true
							// },
	        // user_type: {
							// required: true
							// },
	        // },
			// messages: {
	        // },highlight: function(element) { // hightlight error inputs
                // $(element)
                        // .closest('.form-group').addClass('has-error'); // set error class to the control group

                // $(".tab-content").find("div.tab-pane:has(div.has-error)").each(function(index, tab) {
                    // var id = $(tab).attr("id");
                    // $('a[href="#' + id + '"]').addClass('alert-danger');

                // });

            // },
            // unhighlight: function(element) { // revert the change done by hightlight
                // $(element)
                        // .closest('.form-group').removeClass('has-error'); // set error class to the control group

            // },
            // success: function(label) {
                // label
                        // .closest('.form-group').removeClass('has-error'); // set success class to the control group
            // },
            // submitHandler: function(form) {
                    // form.submit();
              
            // }
        // });
</script>
<script type="text/javascript">
$(document).ready(function() {
        $(".nav-tabs a").click(function() {
            $(this).tab('show');
        });
        $('.nav-tabs a').on('shown.bs.tab', function() {

        });   
    });
</script>