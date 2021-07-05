<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('_layout/siteheader');
?>

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
			<th>Action</th>
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
						<?php 
						echo '<a class="btn btn-icon btn-sm btn-info" href="'.site_url('students/read/'.$row->student_id).'" title="Details">';
						echo '<i class="fas fa-info-circle"></i>'; 
						echo '</a>&nbsp;'; 
						
						echo '<a class="btn btn-icon btn-sm btn-primary" href="'.site_url('students/update/'.$row->student_id).'" title="Edit">';
						echo '<i class="far fa-edit"></i>'; 
						echo '</a>&nbsp;';
						
						echo '<a class="btn btn-icon btn-sm btn-danger" href="'.site_url('students/delete/'.$row->student_id).'" title="Delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')">';
						echo '<i class="fas fa-times"></i>'; 
						echo '</a>';
						
						if($row->course_completed == 1) {
						?>
						<a href="javascript:void(0);" class=" btn btn-icon btn-sm btn-warning print_certificate" data-id=<?php echo $row->student_id; ?> title="Print"><i class="fas fa-print"></i></a> 
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

