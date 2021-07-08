<style>
.clear{
 clear:both;
 margin-top: 20px;
}

#searchResult{
 list-style: none;
 padding: 0px;
 width: 250px;
 position: absolute;
 margin: 0;
}

#searchResult li{
 background: lavender;
 padding: 4px;
 margin-bottom: 1px;
}

#searchResult li:nth-child(even){
 background: cadetblue;
 color: white;
}

#searchResult li:hover{
 cursor: pointer;
}

input[type=text]{
 padding: 5px;
 width: 250px;
 letter-spacing: 1px;
}

</style>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Students <small>-Detail list of Students</small></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="#">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          Students
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
		  
            <form id="frm_create" name="frm_create" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
              <div class="card-header">
			
                <h4>Students</h4>
              </div>
			  
			  
			  
              <div class="card-body">
			  
			  <div class="form-group">
				<label class="control-label " for="name">Search by student Name/Email/Mobile</label>
				<input type="text" id="txt_search" name="txt_search" class="form-control" placeholder="Enter Name/Email/Mobile">
				</div>
				<ul id="searchResult"></ul>

				<div class="clear"></div>
				<div id="userDetail"></div>
			  <div id="err_msg_student" class="text-danger"></div>
			  <div id="div_new_student" style="display:none;">
				 <div class="form-group">
				 <label class="control-label " for="name">Name</label>
			 
				<input type="text" class="form-control " name="name" id="name" placeholder="Name" value="<?php //echo $name; ?>" />
				<?php echo form_error('name') ?>
				</div>
				<div class="form-group">
				 <label class="control-label " for="email">Email</label>
			
				<input type="text" class="form-control " name="email" id="email" placeholder="Email" value="<?php //echo $name; ?>" />
				<?php echo form_error('email') ?>
				</div>
				<div class="form-group">
				 <label class="control-label " for="email">Phone</label>
			 
				<input type="text" class="form-control " name="phone" id="phone" placeholder="Phone" value="<?php //echo $name; ?>" />
				<?php echo form_error('phone') ?>
				</div>
			</div>
			 
	    
		
		<?php if($bid){ ?>
		 <input type="hidden" class="form-control " name="batch_id" id="batch_id" placeholder="batch_id" value="<?php echo $bid; ?>" />
		 <input type="hidden" class="form-control " name="frm_page" id="frm_page" placeholder="frm_page" value="batch" />
		 <input type="hidden" class="form-control " name="course_id" id="course_id" placeholder="course_id" value="<?php echo $cid; ?>" />
		 <input type="text" disabled class="form-control " name="course_name" id="course_name" placeholder="Course Name" value="<?php echo $course_name; ?>" />
		 <?php } else { ?>
		 <div class=" form-group">
			 <label class="control-label " for="int">Course</label>
             <select class="form-control" name="course_id" id="course_id" placeholder="Course Id" >
			        <option value="0">Select</option>
			  <?php foreach ($row_courses as $row)
				{ ?>
					<option value="<?php echo $row['course_id'];?>" ><?php echo $row['course_name']; ?></option>
				<?php 
				}
				?>
			  </select>
			  <!--<input type="hidden" class="form-control " name="course_id" id="course_id" placeholder="course_id" value="<?php //echo $cid; ?>" />-->
			
			  <!--<input type="text" disabled class="form-control " name="course_name" id="course_name" placeholder="Course Name" value="<?php //echo $course_name; ?>" />-->
			
			  <div id="err_msg"></div>
			<?php echo form_error('course_id') ?>
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Batch</label>
             <select class="form-control" name="batch_id" id="batch_id" placeholder="Batch Id" >
			        <option value="0">Select</option>
			  <?php foreach ($row_batch as $row)
				{ ?>
					<option data-course = "<?php echo $row['course_id'];  ?>" data-fees = "<?php echo $row['fees'];  ?>" value="<?php echo $row['batch_id'];?>" ><?php echo $row['batch_title']; ?></option>
				<?php 
				}
				?>
			  </select>
			   <div id="err_batch_msg" class="text-danger"></div>
			<?php echo form_error('batch_id') ?>
		</div>
		 <?php } ?>
	    <!--<div class=" form-group">
			 <label class="control-label " for="timestamp">Completion Date</label>
         
			<input type="date" class="form-control " name="completion_date" id="completion_date" placeholder="Completion Date" value="<?php //echo $completion_date; ?>" />
			<?php //echo form_error('completion_date') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Course Completed</label>
         
			<input type="text" class="form-control " name="course_completed" id="course_completed" placeholder="Course Completed" value="<?php //echo $course_completed; ?>" />
			<?php //echo form_error('course_completed') ?>
		
		</div>-->
		
	
	    <div class=" form-group">
			 <label class="control-label " for="float">Fees Paid</label>
         
			<input type="text" class="form-control " name="fees_paid" id="fees_paid" placeholder="Fees Paid" value="<?php echo $fees_paid; ?>" />
			<?php echo form_error('fees_paid') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="float">Fees Payable</label>
         
			<input type="text" class="form-control " name="fees_payable" id="fees_payable" placeholder="Fees Payable" value="<?php echo $fees_payable; ?>" />
			<?php echo form_error('fees_payable') ?>
		
		</div>
	
         
			<input type="hidden" class="form-control " name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" />
			<input type="hidden" class="form-control " name="student_name" id="student_name" placeholder="Student" value="<?php echo $student_name; ?>" />
			<?php echo form_error('user_id') ?>
		
	     <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('students/'); ?>';">Cancel</button>

                              
                            </div>
			</form>

			     
     
          </div>
         </div>
      </div>
    </div>
  </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>
	 


<!---- This is not end -->
<script type="text/javascript">

/*var form2 = $('#frm_create');
        var error1 = $('.alert-danger', form2);
        var success1 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
	        added_by: {
							required: true
							},
	        batch_id: {
							required: true
							},
	        completion_date: {
							required: true
							},
	        course_completed: {
							required: true
							},
	        course_id: {
							required: true
							},
	        fees_paid: {
							required: true
							},
	        fees_payable: {
							required: true
							},
	        user_id: { 
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
        });*/
		
		$(document).ready(function(){
    $("#txt_search").keyup(function(){
        var search = $(this).val();

        if(search != ""){
			
            $.ajax({
                url: '<?php echo base_url(); ?>Students/get_students',
                type: 'post',
                data: {search:search, type:1},
                dataType: 'json',
                success:function(response){
				    //alert(response);
                    var len = response.length;
                    $("#searchResult").empty();
                    for( var i = 0; i<len; i++){
                        var id = response[i]['id'];
                        var name = response[i]['name'];

                        $("#searchResult").append("<li value='"+id+"'>"+name+"</li>");

                    }
						$("#searchResult").append("<li value='0'>Not in the list</li>");
                    // binding click event to li
                    $("#searchResult li").bind("click",function(){
                        setText(this);
                    });

                }
            });
        }
		else
		{
			$("#searchResult").empty();
			$("#userDetail").empty();
		}

    });

});

// Set Text to search box and get details
function setText(element){

    var value = $(element).text();
    $("#txt_search").val(value);
    $("#searchResult").empty();
	var userid = $(element).val();
	if(userid == '0'){
		$("#div_new_student"). show();
		$("#userDetail").empty();
		$("#user_id").val('0');
		$("#student_name").val('');
	}
	else{
		$("#div_new_student"). hide();
    // Request User Details
    $.ajax({
        url: '<?php echo base_url(); ?>Students/get_students_deatils',
        type: 'post',
        data: {userid:userid, type:2},
        dataType: 'json',
        success: function(response){
			//alert(response['email']);
            var len = response.length;
            $("#userDetail").empty();
            //if(len > 0){
                $("#userDetail").append("Student : " + response['name'] + "<br/>");
                $("#userDetail").append("Email : " + response['email'] + "<br/>");
				$("#userDetail").append("Phone : " + response['phone']);
           // }
		   //$("#active").val='1';
		   //$("#user_id").val = response['id'];
		   $("#user_id").val(response['id']);
		   $("#student_name").val(response['name']);
		    var course_id = $("#course_id").val()
			var batch_id = $("#batch_id").val();
			var user_id = $("#user_id").val();
		   if(batch_id!='0' && course_id!='0' && user_id!='0' ){
			   check_student_batch_course(batch_id,course_id,user_id);
		   }
        }

    });
	}
}
/*$(document).ready(function(){
     $("#batch_id").change(function(){
		 $("#course_name").val('');
		 $("#course_id").val('');
		 $("#fees_paid").val('');
		 
		var course_id = $(this).find(':selected').data('course');
		var fees_paid = $(this).find(':selected').data('fees');
		
		var batch_id = $("#batch_id").val();
		var user_id = $("#user_id").val();
		//alert('user_id = '+user_id)
        if(user_id != ""){
			
            $.ajax({
                url: '<?php echo base_url(); ?>Students/check_student_batch',
                type: 'post',
                data: {user_id:user_id, batch_id: batch_id, course_id:course_id},
                dataType: 'json',
                success:function(response){
					//alert(response['result']);
					if(response['result']!='failure'){
						$("#err_batch_msg").html("You have already enrolled this student to this batch");
						$("#batch_id").val('0');
					}
					else
					{
						$("#err_batch_msg").html(""); 
						$("#course_name").val(response['course_name']);
						$("#fees_paid").val(fees_paid);
						$("#course_id").val(course_id);
					} 
					 

                }
            });
        }

    });

});*/
$(document).ready(function(){
$("#course_id").change(function(){
	$('#batch_id').html( $batch.find('option').filter( '[data-course="' + this.value + '"]' ) );
	var fee = $("#batch_id").find(':selected').data('fees');
	$("#fees_paid").val(fee);
} ).trigger( 'change' );
});

$(document).ready(function(){
     $("#batch_id").change(function(){
        var course_id = $("#course_id").val()
		var batch_id = $("#batch_id").val();
		var user_id = $("#user_id").val();
        if(user_id != ""){
			
            $.ajax({
                url: '<?php echo base_url(); ?>Students/check_student_batch_course',
                type: 'post',
                data: {user_id:user_id, course_id: course_id, batch_id: batch_id},
               // dataType: 'json',
                success:function(response){
					//alert(response);
					if(response!='failure'){
						$("#err_msg").html("Record already present");
						$("#batch_id").val('0');
					}
					else
					{ 
						$("#err_msg").html(""); 
						var fee = $("#batch_id").find(':selected').data('fees');
						$("#fees_paid").val(fee);
					} 
					  

                }
            });
        }

    });
	
	

});
function check_student_batch_course(batch_id,course_id,user_id){

        if(user_id != ""){
			
            $.ajax({
                url: '<?php echo base_url(); ?>Students/check_student_batch_course',
                type: 'post',
                data: {user_id:user_id, course_id: course_id, batch_id: batch_id},
               // dataType: 'json',
                success:function(response){
					//alert(response);
					if(response!='failure'){
						$("#err_msg_student").html("Student already selected for this batch, please select new student");
					}
					else
					{ 
						$("#err_msg_student").html("");
					} 
					  

                }
            });
        }
	
}

</script>