<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Branch List</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="dashboard">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href=Branch>Branch</a>
        </div>
        <div class="breadcrumb-item">
          Branch List
        </div>
      </div>
    </div>

<div class="row">
        <div class="col-12">
          <div class="card">
            <!--<div class="card-header">
              <h4>Branch List</h4>
            </div>-->
			<div class="pull-right">
                     <?php echo anchor(site_url('branch/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
		    <th>Branch Name</th>
			<th>Branch Code</th>
		    <th>Branch Reg Date</th>
			<th>Email Id</th>
			<th>Mobile</th>
		    <th>Branch Status</th>
		    <th>Branch Type</th>
		    <th>City</th>
		    <th>Country</th>
		    <!--<th>Created</th>
		    <th>Land Mark</th>
		    <th>Manager</th>
		    <th>Phone</th>
		    <th>Signature</th>
		    <th>Updated</th> 
		    <th>Zipcode</th>
			<th>Autoresp Email Id</th>
		    <th>Branch Address</th>
		    <th>Branch Area</th>-->
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($branch_data as $branch)
            {
                ?>
                <tr>
		           <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
		    <td><?php echo $branch->branch_name ?></td>
			<td><?php echo $branch->branch_code ?></td>
		    <td><?php echo date('d-m-Y',strtotime($branch->branch_reg_date)); ?></td>
			<td><?php echo $branch->email_id ?></td>
			<td><?php echo $branch->mobile ?></td>
		    <td><?php echo $branch->status_name ?></td>
		    <td><?php echo $branch->branch_type_name ?></td>
		    <td><?php echo $branch->city_name ?></td>
		    <td><?php echo $branch->country_name ?></td>
		    <!--<td><?php echo $branch->created ?></td>
		    <td><?php echo $branch->land_mark ?></td>
		    <td><?php echo $branch->manager_name ?></td>
		    <td><?php echo $branch->phone ?></td>
		    <td><?php echo $branch->signature ?></td>
		    <td><?php echo $branch->updated ?></td>
		    <td><?php echo $branch->zipcode ?></td>
			<td><?php echo $branch->autoresp_email_id ?></td>
		    <td><?php echo $branch->branch_address ?></td>
		    <td><?php echo $branch->branch_area ?></td>
			-->
		    <td width="200px">
				<div class="dropdown d-inline">
								<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  Actions
								</button>
								<div class="dropdown-menu">
								<?php 
								 echo '<a class="dropdown-item has-icon" href="'.site_url('branch/read/'.$branch->branch_id).'" title="Details">';
				echo '<i class="fas fa-info-circle"></i>View Details</i>'; 
                        echo '</a>';    
                        echo '<a class="dropdown-item has-icon"  href="'.site_url('branch/update/'.$branch->branch_id).'" title="Edit">';
			echo '<i class="far fa-edit"></i>Edit'; 
                        echo '</a>';
                        echo '<a class="dropdown-item has-icon"  href="'.site_url('branch/delete/'.$branch->branch_id).'" title="Delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')">';
			echo ' <i class="fas fa-times"></i> Delete'; 
                        echo '</a>';			
					?>
								</div>
						  </div> 		
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

