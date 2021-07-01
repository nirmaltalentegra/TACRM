<!DOCTYPE html">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HelpDeskZ: Dashboard</title>
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
        	<div  class="current">
            	<span id="m1">Home</span>
            </div>
            <div >
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
        	<ul  id="sm1">
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=dashboard" class="current">Dashboard</a></li>
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=preferences" >My Preferences</a></li>
            </ul>
        	<ul style="display:none;" id="sm2">
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=tickets" >Manage Tickets</a></li>
            	<li><a href="http://localhost/helpdeskz/?v=staff&action=tickets&do=search&status=1" >Open</a></li>
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
	<div id="home_title">Dashboard</div>
<div id="home_content">
    <div id="home_left">
        <div id="avatar"><img src="http://localhost/helpdeskz/images/default_avatar.png" /></div>
        <div id="information">
            <div id="fullname">Administrator</div>
            <div id="extrainfo">
                <div>Username: Administrator</div>
                <div>Email address: support@mysite.com</div>
                <div>Last login: 07 March 2016 07:15 am</div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div id="calendar">
        <div class="top">Mar</div>
        <div class="day">
            <small>Tuesday</small>
            <div>08</div>
        </div>
    </div>
    <div class="clear"></div>
    <h2>Ticket Summary</h2>
    <div class="ticket_summary">
        <ul>
            <li><div onclick="location.href='http://localhost/helpdeskz/?v=staff&action=tickets&do=search&status=1';">Open<span>0</span></div></li>
            <li><div onclick="location.href='http://localhost/helpdeskz/?v=staff&action=tickets&do=search&status=3';">Awaiting Reply<span>0</span></div></li>
            <li><div onclick="location.href='http://localhost/helpdeskz/?v=staff&action=tickets&do=search&status=4';">In Progress<span>0</span></div></li>
            <li><div onclick="location.href='http://localhost/helpdeskz/?v=staff&action=tickets&do=search&status=2';">Answered<span>0</span></div></li>
            <li><div onclick="location.href='http://localhost/helpdeskz/?v=staff&action=tickets&do=search&status=5';">Closed<span>0</span></div></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div id="home_tabs">
        <ul>
            <li id="htab1" class="active">Welcome</li>
            <li id="htab2">Login History</li>
            <li id="htab3">Product Information</li>
        </ul>
    </div>           
    <div id="home_tabs_content">
        <div class="htab1 home_tab_content">
            <table class="home_tab_tbl">
                <tr>
                    <th nowrap="nowrap" rowspan="2" width="auto">News</th>
                    <td> </td>
                </tr>
                <tr>
                    <td class="linetbl">
                    </td>
                </tr>
            </table>
                    </div>
        <div class="htab2 home_tab_content" style="display:none">
            <table class="home_tab_tbl">
                <tr>
                    <th nowrap="nowrap" rowspan="2" width="auto">Login History</th>
                    <td> </td>
                </tr>
                <tr>
                    <td class="linetbl"> </td>
                </tr>
            </table>
            <table width="100%" class="widget-table">
                <thead>
                    <tr>
                        <th>IP Address</th>
                        <th>User Agent</th>
                        <th>Date</th>
                    </tr>
                </thead>
                                                    <tr class="trzebra">
                            <td>127.0.0.1</td>
                            <td>Mozilla/5.0 (Windows NT 6.1; rv:44.0) Gecko/20100101 Firefox/44.0</td>
                            <td>08 March 2016 10:55 am</td>
                        </tr>
                                                    <tr class="">
                            <td>127.0.0.1</td>
                            <td>Mozilla/5.0 (Windows NT 6.1; rv:44.0) Gecko/20100101 Firefox/44.0</td>
                            <td>07 March 2016 07:15 am</td>
                        </tr>
                            </table>
        </div>
        <div class="htab3 home_tab_content" style="display:none">
            <table class="home_tab_tbl">
                <tr>
                    <th nowrap="nowrap" rowspan="2" width="auto">Product Information</th>
                    <td> </td>
                </tr>
                <tr>
                    <td class="linetbl"> </td>
                </tr>
            </table>
            <div>HelpDeskZ version 1.0.2</div>
            <div>Copyright &copy; 2016</div>
            <div>Website: <a href="http://www.helpdeskz.com">http://www.helpdeskz.com</a></div>
            <div>HelpDeskZ was developed by Evolution Script S.A.C. </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
    </div>
    <div id="footer"><a href="http://www.helpdeskz.com">Help Desk Software</a> by HelpDeskZ.</div>
</div>

</body>
</html>