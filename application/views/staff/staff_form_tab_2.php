<h3 class="page-header">Access</h3>
<div class="form-group">
    <label class="col-sm-2" for="int">Organization:</label>
    <div class="col-sm-6">
        <select name="org_id" id="org_id" class="form-control">
            <option value="">select Organization</option>
            <?php
            foreach ($org_data as $org) {
                $org_selected = "";
                if ($org_id == $org->id) {
                    $org_selected = "selected";
                }


                echo '<option value="' . $org->id . '"' . $org_selected . ' >' . $org->name . "</option>";
            }
            ?>
        </select>
        <?php echo form_error('org_id') ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2" for="int">Primary Department:</label>
    <div class="col-sm-6">
        <select name="dept_id" id="dept_id" class="form-control">
            <option value="">select Department</option>
            <?php
            foreach ($dept_data as $dept) {
                $dept_selected = "";
                if ($dept_id == $dept->id) {
                    $dept_selected = "selected";
                }
                echo '<option value="' . $dept->id . '"' . $dept_selected . '>' . $dept->name . "</option>";
            }
            ?>
        </select>
        <?php echo form_error('dept_id') ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2" for="int">Primary Role:</label>
    <div class="col-sm-6">
        <select name="role_id" id="role_id" class="form-control">
            <option value="">--Select Role--</option>
            <?php
            foreach ($role_data as $role) {
                $role_selected = "";
                if ($role_id == $role->id) {
                    $role_selected = "selected";
                }


                echo '<option value="' . $role->id . '"' . $role_selected . '>' . $role->user_role . "</option>";
            }
            ?>
        </select>
        <?php echo form_error('role_id') ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2" for="int">Reporting Manager:</label>
    <div class="col-sm-6">
        <select name="manager_id" id="manager_id" class="form-control">
            <option value="">select Manager</option>
            <?php
            foreach ($staff_data as $staff) {
                $manager_selected = "";
                if ($manager_id == $staff['staff_id']) {
                    $manager_selected = "selected";
                }

                echo '<option value="' . $staff['staff_id'] . '"' . $manager_selected . '>' . $staff['staff_name'] . "</option>";
            }
            ?>
        </select>
        <?php echo form_error('manager_id') ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2" for="int">Designation:</label>
    <div class="col-sm-6">
        <select name="designation_id" id="designation_id" class="form-control">
            <option value="">select Designation</option>
            <?php
            foreach ($designation_data as $desgn) {
                $desgn_selected = "";
                if ($designation_id == $desgn->id) {
                    $desgn_selected = "selected";
                }

                echo '<option value="' . $desgn->id . '"' . $desgn_selected . '>' . $desgn->name . "</option>";
            }
            ?>
        </select>
        <?php echo form_error('designation_id') ?>
    </div>
</div>