<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Organization List</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="dashboard">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href=Organization>Organization</a>
        </div>
        <div class="breadcrumb-item">
          Organization List
        </div>
      </div>
    </div>

<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Organization List</h4>
            </div>
			<div class="pull-right">
                     <?php echo anchor(site_url('organization/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
		    <th>Created</th>
		    <th>Domain</th>
		    <th>Extra</th>
		    <th>Manager</th>
		    <th>Name</th>
		    <th>Status</th>
		    <th>Updated</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($organization_data as $organization)
            {
                ?>
                <tr>
		           <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
		    <td><?php echo $organization->created ?></td>
		    <td><?php echo $organization->domain ?></td>
		    <td><?php echo $organization->extra ?></td>
		    <td><?php echo $organization->manager ?></td>
		    <td><?php echo $organization->name ?></td>
		    <td><?php echo $organization->status ?></td>
		    <td><?php echo $organization->updated ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('organization/read/'.$organization->id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('organization/update/'.$organization->id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('organization/delete/'.$organization->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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

