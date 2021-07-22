<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Users List</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active">
					<a href="dashboard">Dashboard</a>
				</div>
				<div class="breadcrumb-item">
					<a href=Users>Users</a>
				</div>
				<div class="breadcrumb-item">
					Users List
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4>Users List</h4>
					</div>
					<div class="pull-right">
						<?php echo anchor(site_url('users/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
											<td><?php if($users->status == 1)echo "Active"; else echo "Inactive";?></td>
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
												<?php
												echo anchor(site_url('users/read/' . $users->id), 'Read');
												echo ' | ';
												echo anchor(site_url('users/update/' . $users->id), 'Update');
												echo ' | ';
												echo anchor(site_url('users/delete/' . $users->id), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
												echo ' | ';
												echo anchor(site_url('users/send_email_verification/' . $users->id), 'Send Verification Email');


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