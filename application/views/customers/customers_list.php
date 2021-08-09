<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Customers List</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="dashboard">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href=Users>Users</a>
                </div>
                <div class="breadcrumb-item">
                    Customers List
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customers List</h4>
                    </div>
                    <div class="pull-right">
                        <?php echo anchor(site_url('customers/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
                                        <!--<th>Created At</th>-->
                                        <!--<th>Default Email Id</th>-->
                                        <!--<th>Default Mobile No</th>-->
                                        <th>Prefix</th>
                                        <th>Firstname</th>
                                        <th>Middlename</th>
                                        <th>Lastname</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Company</th>
                                        <th>Email</th>
                                        <th>Phone/Mobile</th>
										<th>Created At</th>
										<th>Status</th>
                                        <!--<th>Receivables</th>
                                        <th>Credits</th>
                                        <th>Updated At</th>-->

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $start = 0;
                                    foreach ($data as $customer) {
										if($customer->prefix == 0) {
											$prefix = "Mrs.";
										}
										else if($customer->prefix == 1) {
											$prefix = "Mr.";
										}
										else if($customer->prefix == 2) {
											$prefix = "Miss.";
										}										
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <!-- <td><?php //echo $c->name 
                                                        ?></td> -->
                                            <td><?php echo $prefix ?></td>
                                            <td><?php echo $customer->firstname ?></td>
                                            <td><?php echo $customer->middlename ?></td>
                                            <td><?php echo $customer->lastname ?></td>
                                            <td><?php echo $customer->address ?></td>
                                            <td><?php echo $customer->city ?></td>
                                            <td><?php echo $customer->company ?></td>
                                            <td><?php echo $customer->email ?></td>
                                            <td><?php echo $customer->phone ?></td>
											<td><?php echo $customer->created_at ?></td>
                                            <!--<td><?php echo $customer->receivables ?></td>
                                            <td><?php echo $customer->credits ?></td>
                                            <td><?php echo $customer->updated_at ?></td>-->
                                            <td><?php if ($customer->status == 1) echo "Active";
                                                else echo "Inactive"; ?></td>

                                            <td style="text-align:center" width="200px">
											<div class="dropdown d-inline">
								<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  Actions
								</button>
								<div class="dropdown-menu">
								<?php 
								 echo '<a class="dropdown-item has-icon"  href="'.site_url('customers/read/' . $customer->id).'" title="Read">';
								echo '<i class="fas fa-info-circle"></i>View Details</i>'; 
											echo '</a>';    
											echo '<a class="dropdown-item has-icon"  href="'.site_url('customers/update/' . $customer->id).'" title="Update">';
								echo '<i class="far fa-edit"></i> Update'; 
											echo '</a>';
											echo '<a class="dropdown-item has-icon"  href="'.site_url('customers/delete/' . $customer->id).'" title="Delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')">';
								echo ' <i class="fas fa-times"></i> Delete'; 
											echo '</a>';			
						//echo ' | ';
                                                //echo anchor(site_url('customers/send_email_verification/' . $customer->id), 'Send Verification Email');
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