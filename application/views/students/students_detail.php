<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('_layout/siteheader');
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-social/bootstrap-social.css">
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Course Details for <?php echo $result[0]->name; ?></h1>
      <div class="section-header-breadcrumb"> 
        <div class="breadcrumb-item active">
          <a href="dashboard">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href='<?php echo base_url('students/'); ?>' >Students</a>
        </div>
        <div class="breadcrumb-item">
          Student Details
        </div>
      </div>
    </div>

<div class="row">
        <div class="col-12">
          <div class="card">
            <!--<div class="card-header">
              <h4>Student <?php echo $result[0]->name; ?> List</h4>
            </div>-->
			<?php if($this->session->flashdata('error')): ?>
				<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
			<?php endif ?>
			<div class="pull-right">
                </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-2">
                  <thead>
                    <tr>
                      <th class="text-center">
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                          <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                        </div>
                      </th>
					  
			<th>Batch Name</th>	
			<th>Course Name</th>
			<th>Course Completed</th>			
			<th>Completion Date</th>	
		    <!--<th>Deleted At</th>	-->		
			<th>Fees Paid</th>	
		    <th>Fees Payable</th>
			<!--<th>Is Deleted</th>-->
			<!--<th>Updated</th>-->
			<th>Active</th>
			<th>Added By</th>
			<th>Created</th>			
			<th>Actions</th>
                </tr>
				
				 
            </thead>
	    <tbody>
            <?php 
            $start = 0;
            foreach ($result as $row)
            {
                ?>
                <tr>
		           <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
						<td><?php echo $row->batch_title; ?></td>
						<td><?php echo $row->course_name; ?></td>
						<td><?php echo ($row->course_completed == 1) ? "Yes" : "No"; ?></td>
						<td><?php echo ($row->course_completed == 1) ? date('d-m-Y',strtotime($row->completion_date)) : ""; ?></td>
						<!--<td><?php //echo $row->deleted_at; ?></td>-->
						<td><?php echo $row->fees_paid; ?></td>
						<td><?php echo $row->fees_payable; ?></td>
						<!--<td><?php //echo $row->is_deleted; ?></td>-->
						<!--<td><?php //echo $row->updated; ?></td>-->
					    <td><?php echo ($row->active == 1) ? "Yes" : "No"; ?></td>
						<td><?php echo (get_user_details($row->added_by)['user_name'])?(get_user_details($row->added_by)['user_name']):''; ?></td>
						<td><?php echo date('d-m-Y',strtotime($row->created)); ?></td>
						
						<td width="200px">
							<div class="dropdown d-inline">
								<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  Actions
								</button>
								<div class="dropdown-menu">
								<?php 
								  echo '<a class="dropdown-item has-icon" href="'.site_url('students/read/'.$row->student_id).'">
								  <i class="fas fa-info-circle"></i> View Details</a>';
								  echo '<a class="dropdown-item has-icon" href="'.site_url('students/update/'.$row->student_id).'">
								  <i class="far fa-edit"></i> Edit</a>';
								  echo '<a class="dropdown-item has-icon" href="'.site_url('students/delete/'.$row->student_id).'" onclick="javasciprt: return confirm(\'Are You Sure ?\')">
								  <i class="fas fa-times"></i> Delete</a>';
								  echo '<a class="dropdown-item has-icon" id="add_payment" data-cid="'.$row->course_id.'" data-uid="'.$row->user_id.'" data-sid="'.$row->student_id.'" href="#"><i class="far fa-clock"></i> Add Payments</a>';
								  echo '<a class="dropdown-item has-icon" href="#"><i class="far fa-clock"></i> View Payments</a>';
								  if($row->course_completed == 1) {
									echo '<a class="dropdown-item has-icon print_certificate" href="javascript:void(0);" data-id="'.$row->student_id.'">
									<i class="fas fa-print"></i>Print Certficate</a>';	
								  }
								?>   
								</div>
						  </div>
						</td>
	       </tr>
                <?php
            }
            ?>
            </tbody>
				  </table>
	<form class="modal-part" id="model-add-payment"> <div class="form-group">
      <label>Date</label>
      <div class="input-group">
        <input type="date" class="form-control" placeholder="Date" name="date">
      </div>
    </div>
    <div class="form-group">
      <label>Amount Paid</label>
      <div class="input-group"><input type="text" class="form-control" placeholder="amt_paid" name="amt_paid">
      </div>
    </div>
	<div class="form-group">
      <label>Note</label>
      <div class="input-group">
        <textarea class="form-control" placeholder="note" id="note" name="note"></textarea>
      </div> 
    </div>
  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php $this->load->view('_layout/sitefooter'); ?>
<script>
        $(".print_certificate").click(function(){
            //alert($(this).attr('data-id'));
            var student_id = $(this).attr('data-id');
            window.location.href = "<?php echo base_url(); ?>student_certificate/print_certificate/"+student_id;
        });
$("#add_payment").fireModal({
  title: 'Add Payment',
  body: $("#model-add-payment"),
  footerClass: 'bg-whitesmoke',
  autoFocus: false,
  onFormSubmit: function(modal, e, form) {
    // Form Data
    let form_data = $(e.target).serialize();
    console.log(form_data);
	var student_id = $(this).attr('data-sid');
	var user_id = $(this).attr('data-uid');
	var course_id = $(this).attr('data-cid');
	var date = $("#date").val();
	var amt_paid = $("#amt_paid").val();
	var note = $("#note").val();
     $.ajax({
                url: '<?php echo base_url(); ?>Students/student_add_payment',
                type: 'post',
                data: {student_id:student_id, course_id:course_id, user_id:user_id, date: date, amt_paid: amt_paid, note:note},
                dataType: 'json',
                success:function(response){
					console.log(response);
					//alert(response);
					/*if(response!='failure'){
						$("#err_msg").html("Record already present");
						$("#batch_id").val('0');
					}
					else
					{ 
						$("#err_msg").html(""); 
						var fee = $("#batch_id").find(':selected').data('fees');
						$("#fees_paid").val(fee);
					} */
					  

                }
            });
    // DO AJAX HERE
    /*let fake_ajax = setTimeout(function() {
      form.stopProgress();
      modal.find('.modal-body').prepend('<div class="alert alert-info">Please check your browser console</div>')

      clearInterval(fake_ajax);
    }, 1500);
*/
    e.preventDefault();
  },
  shown: function(modal, form) {
    console.log(form)
  },
  buttons: [
    {
      text: 'Login',
      submit: true,
      class: 'btn btn-primary btn-shadow',
      handler: function(modal) {
      }
    }
  ]
});

</script>

