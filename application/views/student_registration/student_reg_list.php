<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Students List</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="dashboard">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href=Users>Registration</a>
                </div>
                <div class="breadcrumb-item">
                    Students List
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Students List</h4>
                    </div>
                    <div class="pull-right">
                        <?php echo anchor(site_url('student_registration/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
                        <a href="\#" class="btn btn-danger"><i class="fa fa-print"></i> PDF</a>
                        <a href="#" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
                    </div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('message')) { ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('message'); ?>
                            </div>

                        <?php } ?>
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>User Type</th>
                                        <th>Profile Img</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                        <!--<th>Email Verified At</th>
										<th>Facebook Id</th>
										<th>Google Id</th>
										<th>Iam Type</th>
										<th>Last Login</th>
										<th>Last Seen</th>
										<th>Linkedin</th>
										<th>Only Acc</th>
										<th>Org Id</th>
										<th>Password</th>
										<th>Phone Verified</th>-->

                                        <!--<th>Remember Token</th>
										<th>Temp Email</th>
										<th>Updated At</th>-->

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $start = 0;
                                    foreach ($users_data as $users) {
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><?php echo $users->name ?></td>
                                            <td><?php echo $users->email ?></td>
                                            <td><?php echo $users->phone ?></td>
                                            <td><?php echo $users->user_type ?></td>
                                            <td><?php echo $users->profile_img ?></td>
                                            <td><?php if ($users->status == 1) echo "Active";
                                                else echo "Inactive"; ?></td>
                                            <td><?php echo $users->created_at ?></td>
                                            <!--
											<td><?php echo $users->default_email_id ?></td>
											<td><?php echo $users->default_mobile_no ?></td>
											<td><?php echo $users->email_verified_at ?></td>
											<td><?php echo $users->facebook_id ?></td>
											<td><?php echo $users->google_id ?></td>
											<td><?php echo $users->iam_type ?></td>
											<td><?php echo $users->last_login ?></td>
											<td><?php echo $users->last_seen ?></td>
											<td><?php echo $users->linkedin_id ?></td>
											<td><?php echo $users->only_acc ?></td>
											<td><?php echo $users->org_id ?></td>
											<td><?php echo $users->password ?></td>
											<td><?php echo $users->phone_verified ?></td>
											
											<td><?php echo $users->remember_token ?></td>
											<td><?php echo $users->temp_email ?></td>
											<td><?php echo $users->updated_at ?></td>-->

                                            <td style="text-align:center" width="200px">
											<div class="dropdown d-inline">
								<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  Actions
								</button>
								<div class="dropdown-menu">
								<?php 
								 echo '<a class="dropdown-item has-icon"  href="'.site_url('student_registration/read/' . $users->id).'" title="Details">';
									echo '<i class="fas fa-info-circle"></i>Read</i>'; 
												echo '</a>';    
												echo '<a class="dropdown-item has-icon"  href="'.site_url('student_registration/update/' . $users->id).'" title="Update">';
									echo '<i class="far fa-edit"></i> Update'; 
												echo '</a>';
												echo '<a class="dropdown-item has-icon"  href="'.site_url('student_registration/delete/' . $users->id).'" title="Delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')">';
									echo ' <i class="fas fa-times"></i> Delete'; 
												echo '</a>';			
										echo '<a class="dropdown-item has-icon"  href="'.site_url('student_registration/send_email_verification/' . $users->id).'" title="Send Verification Email">';
									echo '  <i class="fas fa-envelope-square"></i> Send Verification Email'; 
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