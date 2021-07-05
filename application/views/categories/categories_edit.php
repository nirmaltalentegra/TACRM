
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Categories <small>-Detail list of Categories</small></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="#">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          Categories
        </div>
      </div>
    </div>
	 <?php 
	$user_data = get_user_details($this->session->userdata('id')); 

?>  
 

     <div class="section-body">
	  <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
		  
<form id="frm_edit" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
<input type="hidden"  name="category_id" name="category_id" value="<?php echo $category_id; ?>" />
      <div class="card-header">
                <h4>Categories</h4>
              </div>
              <div class="card-body">
				<div class=" form-group">
			 <label class="control-label " for="int">Parent Category</label>
             <select class="form-control" name="parent_id" id="parent_id" placeholder="Category" >
					<option value="0">Select</option>
			  <?php foreach ($row_categories as $row)
				{ ?>
					<option <?=($parent_id == $row['category_id'])?'selected':''; ?> value="<?php echo $row['category_id'];?>" ><?php echo $row['category_name']; ?></option>
				<?php 
				}
				?>
			  </select>
			<?php echo form_error('parent_id') ?>
		
			</div>
			<div class=" form-group">
				 <label class="control-label " for="varchar">Category Name</label>
			 
				<input type="text" class="form-control " name="category_name" id="category_name" placeholder="Category Name" value="<?php echo $category_name; ?>" />
				<?php echo form_error('category_name') ?>
			
			</div>
	 <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('categories/'); ?>';">Cancel</button>

                              
                            </div>
			</form>

			     
     
          </div>
         </div>
      </div>
    </div>
  </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>
	 


<script type="text/javascript">

var form2 = $('#frm_edit');
        var error1 = $('.alert-danger', form2);
        var success1 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
	        active: {
							required: true
							},
	        added_by: {
							required: true
							},
	        category_id: {
							required: true
							},
	        course_code: {
							required: true
							},
	        course_contents: {
							required: true
							},
	        course_duration: {
							required: true
							},
	        course_duration_in: {
							required: true
							},
	        course_fee_type: {
							required: true
							},
	        course_fees: {
							required: true
							},
	        course_name: {
							required: true
							},
	        course_summary: {
							required: true
							},
	        deleted_at: {
							required: true
							},
	        is_deleted: {
							required: true
							},
	        notes: {
							required: true
							},
	        },
			messages: {
	        },highlight: function(element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group

                $(".tab-content").find("div.tab-pane:has(div.has-error)").each(function(index, tab) {
                    var id = $(tab).attr("id");
                    $('a[href="#' + id + '"]').addClass('alert-danger');

                });

            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group

            },
            success: function(label) {
                label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function(form) {
                    form.submit();
              
            }
        });
</script>