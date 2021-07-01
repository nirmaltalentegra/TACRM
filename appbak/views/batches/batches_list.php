<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Batches List</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="dashboard">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href=Batches>Batches</a>
        </div>
        <div class="breadcrumb-item">
          Batches List
        </div>
      </div>
    </div>

<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Batches List</h4>
            </div>
			<div class="pull-right">
                     <?php echo anchor(site_url('batches/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
		    <th>Course Id</th>
		    <th>Category Id</th>
		    <th>Batch Title</th>
		    <th>Description</th>
		    <th>Faculty Id</th>
		    <th>Branch Id</th>
		    <th>Batch Type</th>
		    <th>Batch Pattern</th>
		    <th>Start Date</th>
		    <th>End Date</th>
		    <th>Week Days</th>
		    <th>Student Enrolled</th>
		    <th>Batch Capacity</th>
		    <th>Iscorporate</th>
		    <th>Currency Id</th>
		    <th>Batch Fee Type</th>
		    <th>Fees</th>
		    <th>Course Fee Type</th>
		    <th>Course Fee</th>
		    <th>Batch Status</th>
		    <th>Created</th>
		    <th>Updated</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($batches_data as $batches)
            {
                ?>
                <tr>
		           <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
		    <td><?php echo $batches->course_id ?></td>
		    <td><?php echo $batches->category_id ?></td>
		    <td><?php echo $batches->batch_title ?></td>
		    <td><?php echo $batches->description ?></td>
		    <td><?php echo $batches->faculty_id ?></td>
		    <td><?php echo $batches->branch_id ?></td>
		    <td><?php echo $batches->batch_type ?></td>
		    <td><?php echo $batches->batch_pattern ?></td>
		    <td><?php echo $batches->start_date ?></td>
		    <td><?php echo $batches->end_date ?></td>
		    <td><?php echo $batches->week_days ?></td>
		    <td><?php echo $batches->student_enrolled ?></td>
		    <td><?php echo $batches->batch_capacity ?></td>
		    <td><?php echo $batches->iscorporate ?></td>
		    <td><?php echo $batches->currency_id ?></td>
		    <td><?php echo $batches->batch_fee_type ?></td>
		    <td><?php echo $batches->fees ?></td>
		    <td><?php echo $batches->course_fee_type ?></td>
		    <td><?php echo $batches->course_fee ?></td>
		    <td><?php echo $batches->batch_status ?></td>
		    <td><?php echo $batches->created ?></td>
		    <td><?php echo $batches->updated ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('batches/read/'.$batches->batch_id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('batches/update/'.$batches->batch_id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('batches/delete/'.$batches->batch_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
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
<?php $this->load->view('_layout/sitefooter'); ?>

