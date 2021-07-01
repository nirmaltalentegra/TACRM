<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Accounts List</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="dashboard">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href=Accounts>Accounts</a>
        </div>
        <div class="breadcrumb-item">
          Accounts List
        </div>
      </div>
    </div>

<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Accounts List</h4>
            </div>
			<div class="pull-right">
                     <?php echo anchor(site_url('accounts/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
		    <th>Payee Name</th>
		    <th>Amount Type</th>
		    <th>Branch Id</th>
		    <th>Payable For</th>
		    <th>Student Id</th>
		    <th>Total Amount</th>
		    <th>Primary Date</th>
		    <th>Due Date</th>
		    <th>Payment Type</th>
		    <th>Account Type</th>
		    <th>Paid Amount</th>
		    <th>Due Amount</th>
		    <th>Payment Date</th>
		    <th>Payment Mode Id</th>
		    <th>Comments</th>
		    <th>Account Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($accounts_data as $accounts)
            {
                ?>
                <tr>
		           <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
		    <td><?php echo $accounts->payee_name ?></td>
		    <td><?php echo $accounts->amount_type ?></td>
		    <td><?php echo $accounts->branch_id ?></td>
		    <td><?php echo $accounts->payable_for ?></td>
		    <td><?php echo $accounts->student_id ?></td>
		    <td><?php echo $accounts->total_amount ?></td>
		    <td><?php echo $accounts->primary_date ?></td>
		    <td><?php echo $accounts->due_date ?></td>
		    <td><?php echo $accounts->payment_type ?></td>
		    <td><?php echo $accounts->account_type ?></td>
		    <td><?php echo $accounts->paid_amount ?></td>
		    <td><?php echo $accounts->due_amount ?></td>
		    <td><?php echo $accounts->payment_date ?></td>
		    <td><?php echo $accounts->payment_mode_id ?></td>
		    <td><?php echo $accounts->comments ?></td>
		    <td><?php echo $accounts->account_status ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('accounts/read/'.$accounts->account_id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('accounts/update/'.$accounts->account_id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('accounts/delete/'.$accounts->account_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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

