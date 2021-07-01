<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Students List</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="dashboard">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href=Students>Students</a>
        </div>
        <div class="breadcrumb-item">
          Students List
        </div>
      </div>
    </div>

<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Students List</h4>
            </div>
			<?php if($this->session->flashdata('error')): ?>
				<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
			<?php endif ?>
			<div class="pull-right">
                     <?php echo anchor(site_url('students/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
                    <a href="\#" class="btn btn-danger"><i class="fa fa-print"></i> PDF</a>
                        <a href="#" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
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
			<th>Student Name</th>
			<th>Email</th>
			<th>Mobile</th>	
			<th>Batch</th>		
			<th>Course</th>	
			<th>Course Completed</th>
			<th>Completion Date</th>
			<th>Fees Paid</th>
		    <th>Fees Payable</th>
		    <th>Active</th>
		    <th>Added By</th>
		    <!--<th>Created</th>
		    <th>Deleted At</th>
		    <th>Is Deleted</th>
		    <th>Updated</th>
		    <th>User Id</th>-->
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($students_data as $students)
            {
                ?>
                <tr>
		           <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
					    <td><?php echo $students->name ?></td>
						<td><?php echo $students->email ?></td>
						<td><?php echo $students->phone ?></td>
						<td><?php echo $students->batch_title ?></td>
						<td><?php echo $students->course_name ?></td>
						<td><?php echo ($students->course_completed == 1) ? "Yes" : "No"; ?></td>
						<td><?php echo ($students->completion_date != "") ? date('d-m-Y',strtotime($students->completion_date)) : ""; ?></td>
						<td><?php echo $students->fees_paid ?></td>
						<td><?php echo $students->fees_payable ?></td>
						<td><?php echo ($students->active == 1) ? "Yes" : "No"; ?></td>
						<td><?php echo (get_user_details($students->added_by)['user_name'])?(get_user_details($students->added_by)['user_name']):'' ?></td>
						<!--<td><?php //echo $students->created ?></td>
						<td><?php //echo $students->deleted_at ?></td>
						<td><?php //echo $students->is_deleted ?></td>
						<td><?php //echo $students->updated ?></td>
						<td><?php //echo $students->user_id ?></td>-->
						<td style="text-align:center" width="200px">
						<?php 
						echo anchor(site_url('students/read/'.$students->student_id),'Read'); 
						echo ' | '; 
						echo anchor(site_url('students/update/'.$students->student_id),'Update'); 
						echo ' | '; 
						echo anchor(site_url('students/delete/'.$students->student_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
						if($students->course_completed == 1) {
						?>
						<a href="javascript:void(0);" class="print_certificate" data-id=<?php echo $students->student_id; ?>>Print</a>
						<?php } ?>
						</td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
				  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
        $(".print_certificate").click(function(){
            //alert($(this).attr('data-id'));
            var student_id = $(this).attr('data-id');
            window.location.href = "<?php echo base_url(); ?>student_certificate/print_certificate/"+student_id;
        });
</script>
<?php $this->load->view('_layout/sitefooter'); ?>

