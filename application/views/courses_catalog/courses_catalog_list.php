<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Courses List</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="dashboard">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href=Courses_catalog>Courses</a>
        </div>
        <div class="breadcrumb-item">
          Courses List
        </div>
      </div>
    </div>

<div class="row">
        <div class="col-12">
          <div class="card">
            <!--<div class="card-header">
              <h4>Courses_catalog List</h4>
            </div>-->
			<div class="pull-right">
                     <?php echo anchor(site_url('courses_catalog/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
		    
		    
			<th>Course Name</th>
		    <th>Course Code</th>
			<th>Category Name</th>
		    <!--<th>Course Contents</th>-->
		    <th>Course Duration</th>
		    <th>Course Fee Type</th>
		    <th>Course Fees</th>
		    
		    <!--<th>Course Summary</th>-->
			<th>Active</th>
		    <th>Added By</th>
		    <th>Created</th>
		    <!--<th>Deleted At</th>
		    <th>Is Deleted</th>
		    <th>Notes</th>
		    <th>Updated</th>-->
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($courses_catalog_data as $courses_catalog)
            {
                ?>
                <tr>
		           <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
		    <td><?php echo $courses_catalog->course_name ?></td>
		    <td><?php echo $courses_catalog->course_code ?></td>
			<td><?php echo $courses_catalog->category_name ?></td>
		    <!--<td><?php echo $courses_catalog->course_contents ?></td>-->
		    <td><?php echo $courses_catalog->course_duration ?></td>
		    <td><?php echo $courses_catalog->course_fee_type_name ?></td>
		    <td><?php echo $courses_catalog->course_fees ?></td>
		    
		    <!--<td><?php echo $courses_catalog->course_summary ?></td>-->
			<td><?php echo ($courses_catalog->active=='1')?'Yes':'No'; ?></td>
		    <td><?php echo (get_user_details($courses_catalog->added_by)['user_name'])?(get_user_details($courses_catalog->added_by)['user_name']):''; ?></td>
		    <td><?php echo date('d-m-Y',strtotime($courses_catalog->created)); ?></td>
		    <!--<td><?php echo $courses_catalog->deleted_at ?></td>
		    <td><?php echo ($courses_catalog->is_deleted=='1')?'Yes':'No'; ?></td>
		    <td><?php echo $courses_catalog->notes ?></td>
		    <td><?php echo $courses_catalog->updated ?></td>-->
		    <td width="200px">
			<?php 
			echo '<a class="btn btn-icon btn-sm btn-info" href="'.site_url('courses_catalog/read/'.$courses_catalog->course_id).'" title="Details">';
			echo '<i class="fas fa-info-circle"></i>'; 
            echo '</a>&nbsp;'; 
			
			echo '<a class="btn btn-icon btn-sm btn-primary" href="'.site_url('courses_catalog/update/'.$courses_catalog->course_id).'" title="Edit">';
			echo '<i class="far fa-edit"></i>'; 
            echo '</a>&nbsp;';
			
			echo '<a class="btn btn-icon btn-sm btn-danger" href="'.site_url('courses_catalog/delete/'.$courses_catalog->course_id).'" title="Delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')">';
			echo '<i class="fas fa-times"></i>'; 
            echo '</a>';
			
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

