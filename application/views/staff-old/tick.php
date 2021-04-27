<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HelpDeskZ: Manage Tickets</title>
<link href="http://localhost/helpdeskz/css/staff.css" rel="stylesheet" type="text/css" />
<link href="http://localhost/helpdeskz/js/jqueryui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://localhost/helpdeskz/js/jquery.js"></script>
<script type="text/javascript" src="http://localhost/helpdeskz/js/jqueryui/jquery-ui.js"></script>
<script type="text/javascript" src="http://localhost/helpdeskz/js/jrtabs.js"></script>
<script type="text/javascript" src="http://localhost/helpdeskz/js/staff.js"></script>
<script type="text/javascript" src="http://localhost/helpdeskz/js/jquerytreeview/src/jquery.fancytree.js"></script>
<link href="http://localhost/helpdeskz/js/jquerytreeview/src/custom-skin-1/ui.fancytree.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="http://localhost/helpdeskz/js/ztree/zTreeStyle.css" type="text/css">
<script type="text/javascript" src="http://localhost/helpdeskz/js/ztree/jquery.ztree.core-3.5.js"></script>

<script type="text/javascript">
var _baseURL = 'http://localhost/helpdeskz/?v=staff';
</script>
</head>

<body>
<div id="dialog_loader" style="display:none">
<div align="center" style="padding:20px"><h3>Loading</h3></div>
</div>
<div id="container_dialog" title="" style="display:none"></div>

<div id="wrapper">
    <div id="header">
		<div id="logo">
			<a href="http://localhost/helpdeskz/?v=staff"></a>
        </div>
        <div id="navbar">
        	<div >
            	<span id="m1">Home</span>
            </div>
            <div class="current">
            	<span id="m2">Tickets</span>
            </div>
            <div >
            	<span id="m3">Knowledgebase</span>
            </div>
            <div >
            	<span id="m4">News</span>
            </div>
            <div >
            	<span id="m5">Users</span>
            </div>
                        <div >
            	<span id="m6">Settings</span>
            </div>
                    </div>
        <div class="clear"></div>
        <div id="submenu">
        	<ul style="display:none;" id="sm1">
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=dashboard" >Dashboard</a></li>
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=preferences" >My Preferences</a></li>
            </ul>
        	<ul  id="sm2">
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=tickets" >Manage Tickets</a></li>
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=tickets&do=search&status=1" class="current">Open</a></li>
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=tickets&do=search&status=3" >Awaiting Reply</a></li>
				<li><a href="http://localhost/helpdeskz/?v=staff&action=tickets&do=search&status=4" >In Progress</a></li>
				<li><a href="http://localhost/helpdeskz/?v=staff&action=tickets&do=search&status=2" >Answered</a></li>
				<li><a href="http://localhost/helpdeskz/?v=staff&action=tickets&do=search&status=5" >Closed</a></li>
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=tickets&param[]=canned" >Canned Response</a></li>
            </ul>
        	<ul style="display:none;" id="sm3">
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=knowledgebase&param[]=preview" >View Knowledgebase</a></li>
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=knowledgebase&param[]=manage" >Manage Knowledgebase</a></li>
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=knowledgebase&param[]=categories" >Categories</a></li>
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=knowledgebase&param[]=article" >New Article</a></li>
            </ul>
            
        	<ul style="display:none;" id="sm4">
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=news&param[]=view" >View News</a></li>
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=news&param[]=manage" >Manage News</a></li>
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=news&param[]=insert" >Insert News</a></li>
            </ul>
        	<ul style="display:none;" id="sm5">
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=users&param[]=manage" >Manage Users</a></li>
            </ul>
                    	<ul style="display:none;" id="sm6">
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=settings&param[]=general" >General</a></li>
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=settings&param[]=tickets" >Tickets</a></li>
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=settings&param[]=email_template" >Email Template</a></li>
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=settings&param[]=departments" >Departments</a></li>
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=settings&param[]=staff" >Staff</a></li>
            </ul>
                        
            
            <div class="logout"><a href="http://localhost/helpdeskz/?v=staff&action=logout">Logout: Administrator</a></div>
            <div class="clear"></div>
        </div>
    </div>

    <div id="content">
	<script>
	var csrfhash = 'e931beb5def909c77b66b0668ac3f7b3'; 
	$(document).ready(function(){
		$(".csrfhash").val(csrfhash);
	});
</script>

<script type="text/javascript">
$(function(){
		$("#tree").fancytree({
			minExpandLevel: 2,
			activate: function(e, data){
				var node = data.node;
				if(node.data.href){
					location.href=node.data.href;
				}
			},

		});
});
</script>
<SCRIPT type="text/javascript">
	<!--
	var setting = {
		data: {
			simpleData: {
				enable: true
			}
		},
		view: {
			nameIsHTML: true
		}
	};

	var zNodes =[{"id":1,"pId":0,"name":"<strong>General<\/strong>","open":"true","isParent":"true","url":"http:\/\/localhost\/helpdeskz\/?v=staff&action=tickets&do=search&department_id=1","target":"_parent"},{"id":"11","pId":1,"name":"Open ","url":"http:\/\/localhost\/helpdeskz\/?v=staff&action=tickets&do=search&status=1&department_id=1","target":"_parent"},{"id":"12","pId":1,"name":"Awaiting Reply ","url":"http:\/\/localhost\/helpdeskz\/?v=staff&action=tickets&do=search&status=3&department_id=1","target":"_parent"},{"id":"13","pId":1,"name":"In Progress ","url":"http:\/\/localhost\/helpdeskz\/?v=staff&action=tickets&do=search&status=4&department_id=1","target":"_parent"},{"id":"14","pId":1,"name":"Answered ","url":"http:\/\/localhost\/helpdeskz\/?v=staff&action=tickets&do=search&status=2&department_id=1","target":"_parent"},{"id":"15","pId":1,"name":"Closed ","url":"http:\/\/localhost\/helpdeskz\/?v=staff&action=tickets&do=search&status=5&department_id=1","target":"_parent"},];
	$(document).ready(function(){
		$.fn.zTree.init($("#ticketcatlist"), setting, zNodes);
	});
	//-->
</SCRIPT>

<div class="search_block">
    <div id="quicktabs">
        <ul>
            <li>Quick Filter</li>
            <li>Search</li>
        </ul>
        <div id="quickfilter">
            <ul id="ticketcatlist" class="ztree"></ul>
        </div>
        <div id="searchtab">
            <form method="get" action="http://localhost/helpdeskz/?v=staff&action=tickets&#searchtab">
                <input type="hidden" name="do" value="search" />
                <table width="100%" class="widget-table-form">
                    <tr>
                        <td>Search in:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="right">
	                <select name="criteria">
                    <option value="code" >Ticket ID</option>
                    <option value="subject" >Subject</option>
                    <option value="email" >Email</option>
                    <option value="name" >Name</option>
                    </select>
                        </td>
                        <td>
                            <input type="text" name="criteria_value" style="width:100%" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Status:</td>
                        <td><select name="status">
                        <option value="">Any Status</option>
                                                                        <option value="1" selected>Open</option>
                                                                                                <option value="2">Answered</option>
                                                                                                <option value="3">Awaiting Reply</option>
                                                                                                <option value="4">In Progress</option>
                                                                                                <option value="5">Closed</option>
                                                                        </select>
                        </td>
                     </tr>
                     <tr>
                        <td align="right">Department:</td>
                        <td><select name="department_id">
                            <option value=""></option>
                                                                                    <option value="1">General</option>
                                                                                </select></td>
                      </tr>
                      <tr>
                        <td align="right">Priority:</td>
                        <td><select name="priority_id">
                            <option value=""></option>
                                                                                    <option value="1">Low</option>
                                                                                                                <option value="2">Medium</option>
                                                                                                                <option value="3">High</option>
                                                                                                                <option value="4">Urgent</option>
                                                                                                                <option value="5">Emergency</option>
                                                                                                                <option value="6">Critical</option>
                                                                                </select></td>
                    </tr>
                    <tr>
                        <td align="right">From:</td>
                        <td><input type="text" name="date_from" id="date_from" value="" /></td>
                    </tr>
                    <tr>
                        <td align="right">To:</td>
                        <td><input type="text" name="date_to" id="date_to" value="" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="btn" value="Search" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>   
</div><div style="margin-left:260px;">

<form method="post" action="http://localhost/helpdeskz/?v=staff&action=tickets&param[]=page&param[]=0&param[]=last_update&param[]=desc&v=staff&action=tickets&do=search&status=1">
<input type="hidden" name="do" value="update" />
<input type="hidden" name="csrfhash" class="csrfhash" />


<table  class="widget-table">
    <thead class="titles">
        <tr>
        	<th><input type="checkbox" id="selectall" /></th>
            <th ><a href="http://localhost/helpdeskz/?v=staff&action=tickets&param[]=page&param[]=0&param[]=code&param[]=desc&v=staff&action=tickets&do=search&status=1">Ticket ID</a></th>
            <th ><a href="http://localhost/helpdeskz/?v=staff&action=tickets&param[]=page&param[]=0&param[]=subject&param[]=desc&v=staff&action=tickets&do=search&status=1">Subject</a></th>
            <th ><a href="http://localhost/helpdeskz/?v=staff&action=tickets&param[]=page&param[]=0&param[]=last_replier&param[]=desc&v=staff&action=tickets&do=search&status=1">Last Replier</a></th>
            <th ><a href="http://localhost/helpdeskz/?v=staff&action=tickets&param[]=page&param[]=0&param[]=replies&param[]=desc&v=staff&action=tickets&do=search&status=1">Replies</a></th>
            <th ><a href="http://localhost/helpdeskz/?v=staff&action=tickets&param[]=page&param[]=0&param[]=priority_id&param[]=desc&v=staff&action=tickets&do=search&status=1">Priority</a></th>
            <th ><a href="http://localhost/helpdeskz/?v=staff&action=tickets&param[]=page&param[]=0&param[]=last_update&param[]=desc&v=staff&action=tickets&do=search&status=1">Last Activity</a></th>
            <th ><a href="http://localhost/helpdeskz/?v=staff&action=tickets&param[]=page&param[]=0&param[]=department_id&param[]=desc&v=staff&action=tickets&do=search&status=1">Department</a></th>
            <th ><a href="http://localhost/helpdeskz/?v=staff&action=tickets&param[]=page&param[]=0&param[]=status&param[]=desc&v=staff&action=tickets&do=search&status=1">Status</a></th>
        </tr>
    </thead>
        <tr><td colspan="9"><i>There is nothing to display here.</i></td></tr></table>
<div id="options" style="margin-top:20px; display:none;">
    <div id="tabs">
        <ul>
            <li>Mass Action</li>
        </ul>
        <div id="tab1">
            <div id="ctab1">
                <table  class="widget-table-form">
                    <tr>
                        <td width="200">Move to department:</td>
                        <td>
                        <select name="department">
                            <option value="">-- No Change --</option>
                                                         <option value="1">General</option>
                                                    </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Change status:</td>
                        <td>
                        <select name="status">
                            <option value="">-- No Change --</option>
                                                        <option value="1">Open</option>
                                                        <option value="2">Answered</option>
                                                        <option value="3">Awaiting Reply</option>
                                                        <option value="4">In Progress</option>
                                                        <option value="5">Closed</option>
                                                    </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Change priority:</td>
                        <td>
                        <select name="priority">
                            <option value="">-- No Change --</option>
                                                        <option value="1">Low</option>
                                                        <option value="2">Medium</option>
                                                        <option value="3">High</option>
                                                        <option value="4">Urgent</option>
                                                        <option value="5">Emergency</option>
                                                        <option value="6">Critical</option>
                                                    </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Remove:</td>
                        <td>
                        <select name="remove">
                            <option value="">-- No --</option>
                            <option value="1">Yes</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="btn" value="Update" /></td>
                    </tr>
                </table>
            </div>
        </div>
	</div>
</div>
</form>

</div>
<div class="clear"></div>
    </div>
    <div id="footer"><a href="http://www.helpdeskz.com">Help Desk Software</a> by HelpDeskZ.</div>
</div>

</body>
</html>