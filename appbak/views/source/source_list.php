<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Source List</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="dashboard">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href=Source>Source</a>
        </div>
        <div class="breadcrumb-item">
          Source List
        </div>
      </div>
    </div>

<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Source List</h4>
            </div>
			<div class="pull-right">
                     <?php echo anchor(site_url('source/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
		    <th>Source Details</th>
		    <th>Active</th>
		    <th>Created</th>
		    <th>Updated</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($source_data as $source)
            {
                ?>
                <tr>
		           <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
		    <td><?php echo $source->source_details ?></td>
		    <td><?php echo $source->active ?></td>
		    <td><?php echo $source->created ?></td>
		    <td><?php echo $source->updated ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('source/read/'.$source->source_id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('source/update/'.$source->source_id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('source/delete/'.$source->source_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
