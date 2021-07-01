<?php
if ( ! function_exists('check_access'))
{
	/**
	 * Elements
	 *
	 * Returns only the array items specified. Will return a default value if
	 * it is not set.
	 *
	 * @param	array
	 * @param	array
	 * @param	mixed
	 * @return	mixed	depends on what the array contains
	 */
	function check_access($user_id,$page)
	{
		
		
		$flag = 0;
		//$arr_page_admin = array('leads','enquiry','admission','accounts','timetable','feedback','report','manage');
		//$arr_page_default_admin = array('leads','enquiry','admission','accounts','timetable');
		$CI = &get_instance();
		$grp_arr =array();
		$grp_arr_details = $CI->arbac->get_user_groups($user_id);
		
		foreach ($grp_arr_details as $key=>$val){
		$grp_arr[] = $val->name;
		$flag = $CI->arbac->is_group_allowed($page, $val->name);
		if($flag){
			break;
		}
		}
		
		/*if(in_array("Admin", $grp_arr)){
			if(in_array($page, $arr_page_admin)){
				$flag = 1;
			}
		}
		if(in_array("Default", $grp_arr)){
			if(in_array($page, $arr_page_default_admin)){
				$flag = 1;
			}
		}*/
		/*if(in_array("faculty_admin", $grp_arr)){
			if(in_array($page, $arr_page_faculty_admin)){
				$flag = 1;
			}
		}*/
		return $flag;
	}
	
	
}

if ( ! function_exists('get_default_page'))
{
	/**
	 * get_default_page
	 *
	 * Returns only the array items specified. Will return a default value if
	 * it is not set.
	 *
	 * @param	array
	 * @param	array
	 * @param	mixed
	 * @return	mixed	depends on what the array contains
	 */
	function get_default_page($user_id)
	{
		$CI = &get_instance();
		$grp_arr_details = $CI->arbac->get_user_groups($user_id);
		$grp_arr =array();
		foreach ($grp_arr_details as $key=>$val){
		$grp_arr[] = $val->name;
		}
		if(in_array("admin", $grp_arr)){
			return 'dashboard';
		}
		if(in_array("Default", $grp_arr)){
			return 'staff';
		}
		/*if(in_array("faculty_admin", $grp_arr)){
			return 'faculty';
		}*/
		return 'auth/login';
	}
}


	
if ( ! function_exists('get_user_branch'))
{
	/**
	 * get_user_branch
	 *
	 * Returns only the array items specified. Will return a default value if
	 * it is not set.
	 *
	 * @param	array
	 * @param	array
	 * @param	mixed
	 * @return	mixed	depends on what the array contains
	 */
	function get_user_branch($user_id)
	{	
		$CI = &get_instance();
		$user_groups = $CI->arbac->get_user_groups($user_id);
		$user_is_admin = '0';
		foreach ($user_groups as $u_group){
        if (isset($u_group->name) && $u_group->name == 'Admin'){
			$user_is_admin = '1';
			break;
		}
		}
		
		if(!$user_is_admin){
			//get_banch
			$CI->load->model('Staff_model');
			$login_user_data = $CI->Staff_model->get_by_arbac_users_id($user_id);
			$user_branch_id = $login_user_data->branch_id;
		}
		else{
			$user_branch_id = "";
		}
		return $user_branch_id;
	}
}

if ( ! function_exists('get_user_name'))
{
	/**
	 * get_user_name
	 *
	 * Returns only the array items specified. Will return a default value if
	 * it is not set.
	 *
	 * @param	array
	 * @param	array
	 * @param	mixed
	 * @return	mixed	depends on what the array contains
	 */
	function get_user_details($user_id)
	{	
		$CI = &get_instance();
		$user_groups = $CI->arbac->get_user_groups($user_id);
		$user_is_admin = '0';
		foreach ($user_groups as $u_group){
        if (isset($u_group->name) && $u_group->name == 'Admin'){
			$user_is_admin = '1';
			break;
		}
		}
		
		if(!$user_is_admin){
			//get_banch
			$CI->load->model('Staff_model');
			$login_user_data = $CI->Staff_model->get_details_by_arbac_users_id($user_id);
			$user_data['user_name'] = $login_user_data->staff_name;
			$user_data['user_created'] = $login_user_data->staff_created;
			//$user_data['user'] = $login_user_data->staff_created;
			//$user_data['photo'] = ($login_user_data->photo)?base_url('assets/uploads/staff_photo/'.$login_user_data->photo):'';
		}
		else{
			$user_data['user_name']= "Admin";
                        $user_data['user_created'] = "August 2017";
			//$user_data['photo'] = "";
		}
		return $user_data;
	}
}
