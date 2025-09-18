<?php
$permissions = $this->session->userdata('permissions') ?? [];
// print_r($permissions);
?>

<div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b></b>Portal</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Portal</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $this->session->userdata('name'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $this->session->userdata('name'); ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <!-- <a href="<?php echo base_url(); ?>loadChangePass" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a> -->
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Log out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php //echo substr($name, 0, 16); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <?php if (in_array('dashboard_index', $permissions)): ?>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
            <?php endif; ?>

            <?php
            // if($role == ROLE_ADMIN)
            // {
            ?>
            <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Roles & Permissions</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>roles"><i class="fa fa-circle-o"></i> View Roles </a></li>
            <li><a href="<?php echo base_url();?>schoolListing"><i class="fa fa-circle-o"></i> Add Roles</a></li>
            <!-- <li><a href="<?php echo base_url();?>changePass"><i class="fa fa-circle-o"></i> Change Password</a></li> -->
          </ul>
        </li>
        <?php //} ?>
              
        <?php
            // if($role == ROLE_ADMIN)
            // {
            ?>
            <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Category</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo base_url();?>addCategory"><i class="fa fa-circle-o"></i> Add </a></li>
          <li><a href="<?php echo base_url();?>viewCategory"><i class="fa fa-circle-o"></i> View</a></li>
          </ul>
        </li> -->
        <?php //} ?>
           
        <?php if (
            in_array('users_index', $permissions) ||
            in_array('users_add', $permissions)
          ) : ?>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if (in_array('users_index', $permissions)): ?>
            <li><a href="<?php echo base_url();?>users"><i class="fa fa-circle-o"></i> View User</a></li>
            <?php endif ?>
            <?php if (in_array('users_add', $permissions)): ?>
            <li><a href="<?php echo base_url();?>users/add"><i class="fa fa-circle-o"></i> Add User</a></li>
            <?php endif ?>
          </ul>
        </li>
        <?php endif; ?>
        <?php //if($role == ROLE_ADMIN) { ?>
            <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Reports</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>exportData"><i class="fa fa-circle-o"></i> Export Data </a></li>
 
            <li><a href="<?php echo base_url();?>indexCard"><i class="fa fa-circle-o"></i> Index Card </a></li>

          </ul>
        </li> -->
        <?php //} ?>


            <!-- <li class="treeview">
              <a href="#" >
                <i class="fa fa-ticket"></i>
                <span>Add Category</span>
              </a>
            </li> -->
            <?php
            //if($role == ROLE_ADMIN || $role == ROLE_MANAGER)
            //{
            ?>
            <!-- <li class="treeview">
              <a href="#" >
                <i class="fa fa-thumb-tack"></i>
                <span>Task Status</span>
              </a>
            </li> -->
            <!-- <li class="treeview">
              <a href="#" >
                <i class="fa fa-upload"></i>
                <span>Task Uploads</span>
              </a>
            </li> -->
            <?php
            //}
            //if($role == ROLE_ADMIN)
            //{
            ?>
            <!-- <li class="treeview">
              <a href="<?php echo base_url(); ?>userListing">
                <i class="fa fa-users"></i>
                <span>Users</span>
              </a>
            </li> -->
            <!-- <li class="treeview">
              <a href="#" >
                <i class="fa fa-files-o"></i>
                <span>Reports</span>
              </a>
            </li> -->
            <?php
            //}
            ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>