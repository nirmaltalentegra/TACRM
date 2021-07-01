<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Grade_level List</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="dashboard">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href=Grade_level>Grade_level</a>
        </div>
        <div class="breadcrumb-item">
          Grade_level List
        </div>
      </div>
    </div>

<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Grade_level List</h4>
            </div>
			<div class="pull-right">
                     <?php echo anchor(site_url('grade_level/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
		    <th>Created At</th>
		    <th>Grade Level Name</th>
		    <th>Updated At</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($grade_level_data as $grade_level)
            {
                ?>
                <tr>
		           <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
		    <td><?php echo $grade_level->created_at ?></td>
		    <td><?php echo $grade_level->grade_level_name ?></td>
		    <td><?php echo $grade_level->updated_at ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('grade_level/read/'.$grade_level->id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('grade_level/update/'.$grade_level->id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('grade_level/delete/'.$grade_level->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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

