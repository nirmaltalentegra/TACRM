<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $title; ?> &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="http://hysedemo.in.net/Stisla/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://hysedemo.in.net/Stisla/assets/modules/fontawesome/css/all.min.css">
  
    <link rel="stylesheet" href="http://hysedemo.in.net/Stisla/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="http://hysedemo.in.net/Stisla/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="http://hysedemo.in.net/Stisla/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

 <!-- Template CSS -->
  <link rel="stylesheet" href="http://hysedemo.in.net/Stisla/assets/css/style.css">
  <link rel="stylesheet" href="http://hysedemo.in.net/Stisla/assets/css/components.css">
  
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<?php
if ($this->uri->segment(2) == "layout_transparent") {
  $this->load->view('_layout/layout-2');
  $this->load->view('_layout/sidebar-2');
} elseif ($this->uri->segment(2) == "layout_top_navigation") {
  $this->load->view('_layout/layout-3');
  $this->load->view('_layout/navbar');
} elseif ($this->uri->segment(2) != "auth_login" && $this->uri->segment(2) != "auth_forgot_password" && $this->uri->segment(2) != "auth_register" && $this->uri->segment(2) != "auth_reset_password" && $this->uri->segment(2) != "errors_503" && $this->uri->segment(2) != "errors_403" && $this->uri->segment(2) != "errors_404" && $this->uri->segment(2) != "errors_500" && $this->uri->segment(2) != "utilities_contact" && $this->uri->segment(2) != "utilities_subscribe") {
  $this->load->view('_layout/layout');
  $this->load->view('_layout/sidebar');
}
?>