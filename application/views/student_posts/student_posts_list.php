<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Student_posts List</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="dashboard">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href=Student_posts>Student_posts</a>
        </div>
        <div class="breadcrumb-item">
          Student_posts List
        </div>
      </div>
    </div>

<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Student_posts List</h4>
            </div>
			<div class="pull-right">
                     <?php echo anchor(site_url('student_posts/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
		    <th>Ass Due Date</th>
		    <th>Created At</th>
		    <th>I Need Smeone</th>
		    <th>Km Travel</th>
		    <th>Meeting Options</th>
		    <th>St Budget</th>
		    <th>St Gender Prfer</th>
		    <th>St I Want</th>
		    <th>St Level</th>
		    <th>St Location</th>
		    <th>St Requirement</th>
		    <th>St Subjects</th>
		    <th>Status</th>
		    <th>Tut Wantd</th>
		    <th>Updated At</th>
		    <th>User Id</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($student_posts_data as $student_posts)
            {
                ?>
                <tr>
		           <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
		    <td><?php echo $student_posts->ass_due_date ?></td>
		    <td><?php echo $student_posts->created_at ?></td>
		    <td><?php echo $student_posts->i_need_smeone ?></td>
		    <td><?php echo $student_posts->km_travel ?></td>
		    <td><?php echo $student_posts->meeting_options ?></td>
		    <td><?php echo $student_posts->st_budget ?></td>
		    <td><?php echo $student_posts->st_gender_prfer ?></td>
		    <td><?php echo $student_posts->st_i_want ?></td>
		    <td><?php echo $student_posts->st_level ?></td>
		    <td><?php echo $student_posts->st_location ?></td>
		    <td><?php echo $student_posts->st_requirement ?></td>
		    <td><?php echo $student_posts->st_subjects ?></td>
		    <td><?php echo $student_posts->status ?></td>
		    <td><?php echo $student_posts->tut_wantd ?></td>
		    <td><?php echo $student_posts->updated_at ?></td>
		    <td><?php echo $student_posts->user_id ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('student_posts/read/'.$student_posts->id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('student_posts/update/'.$student_posts->id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('student_posts/delete/'.$student_posts->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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

