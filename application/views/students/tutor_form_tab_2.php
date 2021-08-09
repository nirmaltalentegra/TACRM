<h3 class="page-header">Subjects</h3>


<div class="card">
            <form id="frm_subject" name="frm_subject" class="form-horizontal form-label-left" data-parsley-validate="" action="add_subjects" method="post">
            <div class="card-body">
	    
		<!--<div class=" form-group">
			 <label class="control-label " for="varchar">Subject  (One at a Time)</label>
         
			<input type="text" class="form-control " name="subject" id="subject" placeholder="subject" value="<?php echo $name; ?>" />
			<?php echo form_error('subject') ?>
		-->
		<div class="form-group">
				<label class="control-label " for="name">Search by Subject</label>
				<input type="text" id="txt_subject" name="txt_subject" class="form-control" placeholder="Enter Subject">
		</div>
				<ul id="searchResult"></ul>

				<div class="clear"></div>
				<div id="userDetail"></div>
			  <div id="err_msg_student" class="text-danger"></div>
			  <div id="div_new_student" style="display:none;">
				 <div class="form-group">
				 <label class="control-label " for="name">Subject</label>
			 
				<input type="text" class="form-control " name="subject" id="subject" placeholder="Subject" value="<?php //echo $name; ?>" />
				<?php echo form_error('subject') ?>
				</div>
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">From Level</label>
         
			<select name="from_level" id="from_level" class="form-control">
			<option value="Beginners">Beginners</option>
			<option value="intermediate">intermediate</option>
			<option value="SME">SME</option>
			</select>
		
			<?php echo form_error('from_level') ?>
		
		</div>
		
		
	    <div class=" form-group">
			 <label class="control-label " for="varchar">To Level</label>
         
			<select name="to_level" id="to_level" class="form-control">
			<option value="Beginners">Beginners</option>
			<option value="intermediate">intermediate</option>
			<option value="SME">SME</option>
			</select>
	
			<?php echo form_error('to_level') ?>
		
		</div>
		    	    
		<div class="ln_solid"></div>
            <div class="form-group">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> <?php echo $button ?></button>&nbsp;
				  <a href="<?php echo site_url('tutor') ?>" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
				</div>
			  </div>
            </div>    
			</form>
</div>
<script>
$(document).ready(function(){
    $("#txt_search").keyup(function(){
        var search = $(this).val();

        if(search != ""){
			
            $.ajax({
                url: '<?php echo base_url(); ?>Tutor/get_subjects',
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

                        $("#searchResult").append("<li value='"+id+"'>"+subject_name+"</li>");

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

</script>