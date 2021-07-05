<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Courses_catalog List</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="dashboard">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href=Courses_catalog>Courses_catalog</a>
        </div>
        <div class="breadcrumb-item">
          Courses_catalog List
        </div>
      </div>
    </div>

<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Courses_catalog List</h4>
            </div>
			<div class="pull-right">
                     <?php echo anchor(site_url('courses_catalog/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
		    <th>Category Id</th>
		    <th>Course Code</th>
		    <th>Course Name</th>
		    <th>Course Summary</th>
		    <th>Course Contents</th>
		    <th>Course Duration</th>
		    <th>Course Fee Type</th>
		    <th>Notes</th>
		    <th>Active</th>
		    <th>Created</th>
		    <th>Updated</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($courses_catalog_data as $courses_catalog)
            {
                ?>
                <tr>
		           <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
		    <td><?php echo $courses_catalog->category_id ?></td>
		    <td><?php echo $courses_catalog->course_code ?></td>
		    <td><?php echo $courses_catalog->course_name ?></td>
		    <td><?php echo $courses_catalog->course_summary ?></td>
		    <td><?php echo $courses_catalog->course_contents ?></td>
		    <td><?php echo $courses_catalog->course_duration ?></td>
		    <td><?php echo $courses_catalog->course_fee_type ?></td>
		    <td><?php echo $courses_catalog->notes ?></td>
		    <td><?php echo $courses_catalog->active ?></td>
		    <td><?php echo $courses_catalog->created ?></td>
		    <td><?php echo $courses_catalog->updated ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('courses_catalog/read/'.$courses_catalog->course_id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('courses_catalog/update/'.$courses_catalog->course_id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('courses_catalog/delete/'.$courses_catalog->course_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
