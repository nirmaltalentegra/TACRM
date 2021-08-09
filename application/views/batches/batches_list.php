<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Batches List</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active">
					<a href="dashboard">Dashboard</a>
				</div>
				<div class="breadcrumb-item">
					<a href=Batches>Batches</a>
				</div>
				<div class="breadcrumb-item">
					Batches List
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">

					<div class="card-header">
						<h4>Batches List</h4>
					</div>
					<div class="pull-right">
						<?php echo anchor(site_url('batches/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
										<th>Category</th>
										<th>Course</th>

										<th>Batch Title</th>
										<th>Batch Code</th>
										<!--<th>Description</th>-->
										<th>Faculty</th>
										<th>Branch</th>
										<th>Batch Type</th>
										<th>Batch Pattern</th>
										<th>Start Date</th>
										<th>End Date</th>
										<!--<th>Week Days</th>-->
										<!--<th>Student Enrolled</th>
		    <th>Batch Capacity</th>
		    <th>Iscorporate</th>
		    <th>Currency Id</th>-->
										<th>Batch Fee Type</th>
										<th>Fees</th>
										<!--<th>Course Fee Type</th>
		    <th>Course Fee</th>-->
										<th>Batch Status</th>
										<!--<th>Created</th>
		    <th>Updated</th>-->
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$start = 0;
									foreach ($batches_data as $batches) {
									?>
										<tr>
											<td>
												<div class="custom-checkbox custom-control">
													<input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
													<label for="checkbox-1" class="custom-control-label">&nbsp;</label>
												</div>
											</td>
											<td><?php echo $batches->category_name ?></td>
											<td><?php echo $batches->course_name ?></td>
											<td><?php echo $batches->batch_title ?></td>
											<td><?php echo ($batches->batch_code != "") ? $batches->batch_code : ""; ?></td>
											<!--<td><?php echo $batches->description ?></td>-->
											<td><?php echo $batches->fullname ?></td>
											<td><?php echo $batches->branch_name ?></td>
											<td><?php echo $batches->batch_type_name ?></td>
											<td><?php echo $batches->batch_pattern ?></td>
											<td><?php echo date('d-m-Y', strtotime($batches->start_date)); ?></td>
											<td><?php echo date('d-m-Y', strtotime($batches->end_date)); ?></td>
											<!--<td><?php //echo $batches->week_days 
													?></td>-->
											<!--<td><?php //echo $batches->student_enrolled 
													?></td>-->
											<!--<td><?php //echo $batches->batch_capacity 
													?></td>-->
											<!--<td><?php //echo $batches->iscorporate 
													?></td>-->
											<!--<td><?php echo $batches->currency_id ?></td>-->
											<td><?php echo $batches->batch_fee_type_name ?></td>
											<td><?php echo $batches->fees ?></td>
											<!--<td><?php echo $batches->course_fee_type_name ?></td>
		    <td><?php echo $batches->course_fee ?></td>-->
											<td><?php echo $batches->status ?></td>
											<!--<td><?php //echo $batches->created 
													?></td>-->
											<!--<td><?php //echo $batches->updated 
													?></td>-->
											<td width="200px">
												<div class="dropdown d-inline">
													<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Actions
													</button>
													<div class="dropdown-menu">
														<?php
														echo '<a class="dropdown-item has-icon" href="' . site_url('students/create/' . $batches->batch_id) . '" title="Enroll Students">';
														echo '<i class="fas fa-plus"></i>Enroll Students';
														echo '</a>';
														echo '<a class="dropdown-item has-icon" href="' . site_url('batches/read/' . $batches->batch_id) . '" title="Details">';
														echo '<i class="fas fa-info-circle"></i>View Details';
														echo '</a>';
														echo '<a class="dropdown-item has-icon" href="' . site_url('batches/update/' . $batches->batch_id) . '" title="Edit">';
														echo '<i class="far fa-edit"></i>Edit';
														echo '</a>';
														echo '<a class="dropdown-item has-icon" href="' . site_url('batches/delete/' . $batches->batch_id) . '" title="Delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')">';
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