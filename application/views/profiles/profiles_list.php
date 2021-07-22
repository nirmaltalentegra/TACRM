<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Profiles List</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="dashboard">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href=Profiles>Profiles</a>
        </div>
        <div class="breadcrumb-item">
          Profiles List
        </div>
      </div>
    </div>

<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Profiles List</h4>
            </div>
			<div class="pull-right">
                     <?php echo anchor(site_url('profiles/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
		    <th>Company Name</th>
		    <th>Created At</th>
		    <th>Display Name</th>
		    <th>Dob</th>
		    <th>Fullname</th>
		    <th>Gender</th>
		    <th>Location</th>
		    <th>Postalcode</th>
		    <th>Professional Exp</th>
		    <th>Profile Description</th>
		    <th>Role Job</th>
		    <th>Speciality Strength</th>
		    <th>Status</th>
		    <th>Subject Tech</th>
		    <th>Teaching Details</th>
		    <th>Updated At</th>
		    <th>User Education</th>
		    <th>User Id</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($profiles_data as $profiles)
            {
                ?>
                <tr>
		           <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
		    <td><?php echo $profiles->company_name ?></td>
		    <td><?php echo $profiles->created_at ?></td>
		    <td><?php echo $profiles->display_name ?></td>
		    <td><?php echo $profiles->dob ?></td>
		    <td><?php echo $profiles->fullname ?></td>
		    <td><?php echo $profiles->gender ?></td>
		    <td><?php echo $profiles->location ?></td>
		    <td><?php echo $profiles->postalcode ?></td>
		    <td><?php echo $profiles->professional_exp ?></td>
		    <td><?php echo $profiles->profile_description ?></td>
		    <td><?php echo $profiles->role_job ?></td>
		    <td><?php echo $profiles->speciality_strength ?></td>
		    <td><?php echo $profiles->status ?></td>
		    <td><?php echo $profiles->subject_tech ?></td>
		    <td><?php echo $profiles->teaching_details ?></td>
		    <td><?php echo $profiles->updated_at ?></td>
		    <td><?php echo $profiles->user_education ?></td>
		    <td><?php echo $profiles->user_id ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('profiles/read/'.$profiles->id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('profiles/update/'.$profiles->id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('profiles/delete/'.$profiles->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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

