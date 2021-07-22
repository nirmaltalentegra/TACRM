<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Categories List</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="dashboard">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href=Categories>Categories</a>
        </div>
        <div class="breadcrumb-item">
          Categories List
        </div>
      </div>
    </div>

<div class="row">
        <div class="col-12">
          <div class="card">
            <!--<div class="card-header">
              <h4>Categories List</h4>
            </div>-->
			<div class="pull-right">
                     <?php echo anchor(site_url('categories/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
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
		    <th>Category Name</th>
		    <th>Parent Category</th>
		    <th>Active</th>
		    <th>Created</th>
		    <!--<th>Updated</th>-->
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($categories_data as $categories)
            {
                ?>
                <tr>
		           <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
		    
			<td><?php echo $categories->category_name ?></td>
		    <td><?php echo $categories->parent_category_name ?></td>
		    <td><?php echo ($categories->active=='1')?'Yes':'No' ?></td>
		    <td><?php echo date('d-m-Y',strtotime($categories->created)); ?></td>
		    <!--<td><?php echo $categories->updated ?></td>-->
		    <td width="200px">
				<div class="dropdown d-inline">
								<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  Actions
								</button>
								<div class="dropdown-menu">
								<?php 
								 echo '<a class="dropdown-item has-icon"  href="'.site_url('categories/read/'.$categories->category_id).'" title="Details">';
			echo '<i class="fas fa-info-circle"></i>View Details</i>'; 
                        echo '</a>';    
                        echo '<a class="dropdown-item has-icon"  href="'.site_url('categories/update/'.$categories->category_id).'" title="Edit">';
			echo '<i class="far fa-edit"></i>Edit'; 
                        echo '</a>';
                        echo '<a class="dropdown-item has-icon"  href="'.site_url('categories/delete/'.$categories->category_id).'" title="Delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')">';
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

