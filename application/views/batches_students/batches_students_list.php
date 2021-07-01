<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Batches_students List</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="dashboard">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href=Batches_students>Batches_students</a>
        </div>
        <div class="breadcrumb-item">
          Batches_students List
        </div>
      </div>
    </div>

<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Batches_students List</h4>
            </div>
			<div class="pull-right">
                     <?php echo anchor(site_url('batches_students/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
		    <th>Active</th>
		    <th>Certified</th>
		    <th>Created</th>
		    <th>Faculty Comments</th>
		    <th>Faculty Id</th>
		    <th>Faculty Rating</th>
		    <th>Student Comments</th>
		    <th>Student Id</th>
		    <th>Student Rating</th>
		    <th>Updated</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($batches_students_data as $batches_students)
            {
                ?>
                <tr>
		           <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
		    <td><?php echo $batches_students->active ?></td>
		    <td><?php echo $batches_students->certified ?></td>
		    <td><?php echo $batches_students->created ?></td>
		    <td><?php echo $batches_students->faculty_comments ?></td>
		    <td><?php echo $batches_students->faculty_id ?></td>
		    <td><?php echo $batches_students->faculty_rating ?></td>
		    <td><?php echo $batches_students->student_comments ?></td>
		    <td><?php echo $batches_students->student_id ?></td>
		    <td><?php echo $batches_students->student_rating ?></td>
		    <td><?php echo $batches_students->updated ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('batches_students/read/'.$batches_students->batch_id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('batches_students/update/'.$batches_students->batch_id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('batches_students/delete/'.$batches_students->batch_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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

