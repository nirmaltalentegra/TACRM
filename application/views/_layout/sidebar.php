<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url(); ?>dashboard/index">TRAMS</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>dashboard/index">TA</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="dropdown<?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dashboard/index">Leads</a></li>
           </ul>
      </li>
      <li class="menu-header">Starter</li>
      <li class="dropdown<?php echo $this->uri->segment(2) == 'layout_default' || $this->uri->segment(2) == 'layout_transparent' || $this->uri->segment(2) == 'layout_top_navigation' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Timetable</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'layout_default' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>example/layout_default">Default Branch</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>example/layout_transparent">Transparent Sidebar</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>example/layout_top_navigation">Top Navigation</a></li>
        </ul>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'lead' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>lead/index"><i class="far fa-square"></i> <span>Lead</span></a></li>
	  
	  <li class="<?php echo $this->uri->segment(2) == 'admission' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admission/index"><i class="far fa-square"></i> <span>Admission</span></a></li>
	  
		  
	  <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>example/blank"><i class="far fa-square"></i> <span>Accounts</span></a></li>
	  
	  
      <li class="dropdown<?php echo $this->uri->segment(2) == 'bootstrap_alert' || $this->uri->segment(2) == 'bootstrap_badge' || $this->uri->segment(2) == 'bootstrap_breadcrumb' || $this->uri->segment(2) == 'bootstrap_buttons' || $this->uri->segment(2) == 'bootstrap_card' || $this->uri->segment(2) == 'bootstrap_carousel' || $this->uri->segment(2) == 'bootstrap_collapse' || $this->uri->segment(2) == 'bootstrap_dropdown' || $this->uri->segment(2) == 'bootstrap_form' || $this->uri->segment(2) == 'bootstrap_list_group' || $this->uri->segment(2) == 'bootstrap_media_object' || $this->uri->segment(2) == 'bootstrap_modal' || $this->uri->segment(2) == 'bootstrap_nav' || $this->uri->segment(2) == 'bootstrap_navbar' || $this->uri->segment(2) == 'bootstrap_pagination' || $this->uri->segment(2) == 'bootstrap_popover' || $this->uri->segment(2) == 'bootstrap_progress' || $this->uri->segment(2) == 'bootstrap_table' || $this->uri->segment(2) == 'bootstrap_tooltip' || $this->uri->segment(2) == 'bootstrap_typography' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Manage</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'staff' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>staff">Staff</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'bootstrap_badge' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>example/bootstrap_badge">Course</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'branch' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>branch">Branch</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'bootstrap_buttons' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>example/bootstrap_buttons">Configuration</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'bootstrap_card' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>example/bootstrap_card">Settings</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'bootstrap_carousel' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>example/bootstrap_carousel">Report</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'batches' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>batches">Batches</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'bootstrap_dropdown' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>example/bootstrap_dropdown">Batch Feedback</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'bootstrap_form' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>example/bootstrap_form">Form</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'students' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>students">Students</a></li>
        
        </ul>
      </li>
   
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Support
      </a>
    </div>
  </aside>
</div>