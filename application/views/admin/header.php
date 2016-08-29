<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
        <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Admin Panel</title>
      <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
      <!-- Datatables-->
      <link href="<?php echo base_url();?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
      <!-- BOOTSTRAP STYLES-->
      <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
       <!-- FONTAWESOME STYLES-->
      <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
          <!-- CUSTOM STYLES-->
      <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
       <!-- GOOGLE FONTS-->
          <!-- MORRIS CHART STYLES-->
      <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
  </head>
  <body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo site_url('admin/welcome/admin');?>">Get My Truck</a> 
          </div>
          <div style="float:left; margin-left:20px;">
            <h2 style="margin-top: 0px;color:white;">Admin Dashboard</h2>   
            <h5 style="color:white;">Welcome <?php echo $user_id_admin;?>, Nice to see you back.</h5>
          </div>
          <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
            
            <a href="<?php echo site_url('admin/welcome/admin_logout');?>" class="btn btn-danger square-btn-adjust">Logout</a>
          </div>
        </nav>   
           <!-- /. NAV TOP  -->
          <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
              <ul class="nav" id="main-menu">
                <li>
                  <a href="<?php echo site_url('admin/vehicle/add_vehicle');?>">Vehicle Types</a>
                </li>
                <li>
                  <a href="<?php echo site_url('admin/company/add_company_type');?>">Company Types</a>
                </li>
                <li>
                  <a href="<?php echo site_url('admin/WorkDesc/add_work_desc');?>">Work Description</a>
                </li>
                <li>
                  <a href="<?php echo site_url('admin/MaterialType/add_material_type');?>">Material Type</a>
                </li>
                <li>
                  <a href="<?php echo site_url('admin/ServiceType/add_service_type');?>">Services</a>
                </li>
              </ul>
            </div>
          </nav>  
        <!-- /. NAV SIDE  -->