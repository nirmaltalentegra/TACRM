<ul class="nav nav-tabs">
        <li class="active"><a href="#customer" data-toggle="tab">Customer</a></li>
        <li><a href="#org" data-toggle="tab">Organization</a></li>
        <li><a href="#staff" data-toggle="tab">Staff</a></li>
        <li><a href="#dept" data-toggle="tab">Dept</a></li>
    </ul>

    <div class="tab-content">
        <div id="customer" class="tab-pane in active">
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="create_customer" value="1" <?php if($create_customer == 1) { ?> checked="" <?php } ?> /> Create Customer
                      </label>
                    </div>                
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="edit_customer" value="1" <?php if($edit_customer == 1) { ?> checked="" <?php } ?>/> Edit Customer  
                      </label>
                    </div>                
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="delete_customer" value="1" <?php if($delete_customer == 1) { ?> checked="" <?php } ?>/> Delete Customer  
                      </label>
                    </div>                
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="manage_customer" value="1" <?php if($manage_customer == 1) { ?> checked="" <?php } ?>/> Manage Customer
                      </label>
                    </div>                
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="upload_customer" value="1" <?php if($upload_customer == 1) { ?> checked="" <?php } ?>/> Upload customer 
                      </label>
                    </div>                
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="upload_serial" value="1" <?php if($upload_serial == 1) { ?> checked="" <?php } ?>/> Upload serial  
                      </label>
                    </div>                
                </div>
            </div>
        </div>
        <div id="org" class="tab-pane fade">
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="create_org" value="1" <?php if($create_org == 1) { ?> checked="" <?php } ?>/> Create Organization 
                      </label>
                    </div>                
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="edit_org" value="1" <?php if($edit_org == 1) { ?> checked="" <?php } ?>/> Edit Organization
                      </label>
                    </div>                
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="delete_org" value="1" <?php if($delete_org == 1) { ?> checked="" <?php } ?>/> Delete Organization 
                      </label>
                    </div>                
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="view_org" value="1" <?php if($view_org == 1) { ?> checked="" <?php } ?>/> View Organization 
                      </label>
                    </div>                
                </div>
            </div>
        </div>

        <div id="staff" class="tab-pane fade">
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="create_staff" value="1" <?php if($create_staff == 1) { ?> checked="" <?php } ?>/> Create staff 
                      </label>
                    </div> 
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="edit_staff" value="1" <?php if($edit_staff == 1) { ?> checked="" <?php } ?>/> Edit staff 
                      </label>
                    </div> 
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="delete_staff" value="1" <?php if($delete_staff == 1) { ?> checked="" <?php } ?>/> Delete staff
                      </label>
                    </div> 
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="manage_staff" value="1" <?php if($manage_staff == 1) { ?> checked="" <?php } ?>/> Manage staff
                      </label>
                    </div> 
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="list_staff" value="1" <?php if($list_staff == 1) { ?> checked="" <?php } ?>/> Staff Directory
                      </label>
                    </div> 
                </div>
            </div> 
        </div>
        <div id="dept" class="tab-pane fade">
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                            <input type="checkbox" name="create_dept" value="1" <?php if($create_dept == 1) { ?> checked="" <?php } ?>/> Create Dept  
                      </label>
                    </div>                
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                           <input type="checkbox" name="edit_dept" value="1" <?php if($edit_dept == 1) { ?> checked="" <?php } ?>/> Edit Dept  
                      </label>
                    </div>                
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                           <input type="checkbox" name="delete_dept" value="1" <?php if($delete_dept == 1) { ?> checked="" <?php } ?>/> Delete Dept   
                      </label>
                    </div>                
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                           <input type="checkbox" name="manage_dept" value="1" <?php if($manage_dept == 1) { ?> checked="" <?php } ?>/> Manage Dept    
                      </label>
                    </div>                
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                      <label>
                           <input type="checkbox" name="view_dept" value="1" <?php if($view_dept == 1) { ?> checked="" <?php } ?>/> View Dept    
                      </label>
                    </div>                
                </div>
            </div> 
            <hr />
            <div class="form-group" id="dvDept">
                <label class="col-sm-2" for="int">Extended Department:</label>
                <div class="col-sm-4">
                    <select name="ext_dept_id" id="ext_dept_id" class="form-control">
                        <option value="">select Department</option>
                        
                    </select>
                    <?php echo form_error('dept_id') ?>
                </div>
                <label class="col-sm-2" for="int">Extended Role:</label>
                <div class="col-sm-4">
                    <select name="ext_role_id" id="ext_role_id" class="form-control">
                        <option value="">--Select Role--</option>
                        
                    </select>
                    <?php echo form_error('role_id') ?>
                </div>
                <div class="col-sm-12">
                    <button type="button" class="btn btn-info btn-sm" onclick="addRow(this.form);">Add</button>
                </div>
                <?php
                if($arr_ext_dept_role != "failure") {
                    foreach ($arr_ext_dept_role as $key => $value) {

                        foreach ($dept_data as $dept) {
                            if ($value['dept_id'] == $dept->id) {
                                $dept_name = $dept->name;
                            }
                        }
                        foreach ($role_data as $role) {
                            if ($value['role_id'] == $role->id) {
                                $role_name = $role->name;
                            }
                        }

                    ?>
                    <div class="col-sm-12" id="rowNum<?php echo ($key + 1); ?>">
                    <span class="text-danger">*</span>
                    <input type="hidden" name="add_data[]" value="<?php echo $value['dept_id'].$value['role_id']; ?>">
                    <input type="hidden" name="add_dept_id[]" value="<?php echo $value['dept_id']; ?>"> 
                    <input type="text" placeholder="Department Name" name="add_dept_name[]" value="<?php echo $dept_name; ?>" readonly="">
                        <span class="text-danger">*</span><input type="hidden" name="add_role_id[]" value="<?php echo $value['role_id']; ?>">
                        <input type="text" placeholder="Role" name="add_role[]" value="<?php echo $role_name; ?>" readonly="">
                        <input type="button" value="Remove" onclick="removeRow('<?php echo ($key + 1); ?>');"></div>
                    <?php
                    }
                }

                ?>
            </div>
            <hr />
        </div>	
    </div> 