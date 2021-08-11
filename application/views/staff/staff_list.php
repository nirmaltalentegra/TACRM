<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Staff List</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="dashboard">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href="staff">Staff Details</a>
        </div>
        <div class="breadcrumb-item">
          Staff List
        </div>
      </div>
    </div>

  
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Staff List</h4>
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
                      <th>Name</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Manager Name</th>
					   <th>Designation</th>
					    <th>Mobile</th>
						 <th>Department</th>
						  <th>Last Login</th>
						  
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				   <?php
            $start = 0;
            foreach ($staff_data as $staff)
            {
                ?>
                    <tr>
                      <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
                      <td><?php echo $staff->sname ?></td>
                      <td class="align-middle">
                        <?php echo $staff->username ?>
                      </td>
                      <td>
                       <?php echo $staff->email ?>
                      </td>
                      <td><?php echo $staff->manager ?></td>
                      <td><?php echo $staff->designation ?>
                      </td>
					  <td><?php echo $staff->mobile ?></td>
					  <td><?php echo $staff->department ?></td>
		              <td><?php echo (!$staff->banned)?'Active':'Locked'; ?></td>
		              <td><?php echo $staff->last_login ?></td>
                     <!-- <td><a href="" class="btn btn-secondary">Detail</a></td> -->
					<td>		
					<?php
					   echo '<a href="'.site_url('staff/read/'.$staff->id).'" title="Details" class="btn btn-secondary">';
						echo 'Details';
                        echo '</a>';
					 ?> </td>
					
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
