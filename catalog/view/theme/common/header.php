<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->

    <link rel="stylesheet" href="assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/AdminLTE/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/summernote/summernote-bs4.min.css">





    <!-- jQuery -->
    <script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="assets/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="assets/AdminLTE/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="assets/AdminLTE/plugins/moment/moment.min.js"></script>
    <script src="assets/AdminLTE/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="assets/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>



    <!-- Bootstrap 4 -->
    <script src="assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="assets/AdminLTE/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <!-- <script src="assets/AdminLTE/plugins/sparklines/sparkline.js"></script> -->
    <!-- JQVMap -->
    <!-- <script src="assets/AdminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="assets/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="assets/AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="assets/AdminLTE/plugins/moment/moment.min.js"></script>
    

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="assets/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="assets/AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="assets/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/AdminLTE/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="assets/AdminLTE/dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="assets/AdminLTE/dist/js/pages/dashboard.js"></script> -->
  </head>
  <body class="<?php if(!empty($username)){ ?>hold-transition sidebar-mini layout-fixed<?php } ?>">
    <div class="wrapper">
      <?php if(!empty($username)){ ?>
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <a href="<?php echo $link_th; ?>" class="nav-link" role="button"> 
            <img src="assets/flag/flag_th.jpg" width="30px;">
          </a>
          <a href="<?php echo $link_en; ?>" class="nav-link" role="button"> 
            <img src="assets/flag/flag_en.jpg" width="30px;">
          </a>
          <?php /*
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
              <div class="media">
                  <img src="assets/AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <div class="media">
                  <img src="assets/AdminLTE/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <div class="media">
                  <img src="assets/AdminLTE/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
              </a>
              <div class="dropdown-divider"></div> -->
              <div class="label-head web">&nbsp;&nbsp;Welcome to Tecnical</div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          */ ?>
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i> 
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo $link_home; ?>" class="brand-link">
          <img src="assets/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">TechWeb</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <?php if(!empty($image)){ ?>
                <img src="<?php echo $image; ?>" class="img-circle elevation-2" alt="<?php echo $username; ?>">
              <?php } ?>
            </div>
            <div class="info">
              <a href="#" class="d-block"><?php echo $username; ?></a>
            </div>
          </div>
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <?php if(in_array('Petition',$menu_permission)){ ?>
              <li class="nav-item <?php echo ($page=='board'||$page=='board/addBoard'||$page=='board'?'menu-open':''); ?>">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    <?php echo $menu_petition; ?>
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./index.php?route=board" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?php echo $menu_petition_own?></p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index.php?route=board/addBoard" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?php echo $menu_petition_create?></p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index.php?route=board&type_board=me" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?php echo $menu_petition_list?></p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php } ?>
              <?php if(in_array('Reception',$menu_permission)){ ?>
              <li class="nav-item <?php echo ($page=='purchase'||$page=='purchase/add'||$page=='receive'?'menu-open':''); ?>">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cash-register"></i></i>
                  <p>
                    <?php echo $menu_receive_purchase; ?>
                    <i class="fas fa-angle-left right"></i>
                    <!-- <span class="badge badge-info right">6</span> -->
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./index.php?route=purchase" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?php echo $menu_receive_purchase_list; ?></p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index.php?route=purchase/add" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?php echo $menu_receive_purchase_create; ?> </p>
                    </a>
                  </li> 
                </ul>
              </li>
              <?php } ?>
              <?php if(in_array('Users',$menu_permission)){ ?>
              <li class="nav-item <?php echo ($page=='UserList'||$page=='UserPermission'||$page=='UserListAdd'?'menu-open':''); ?>">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    <?php echo $menu_user; ?>
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./index.php?route=UserList" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?php echo $menu_user_list; ?></p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index.php?route=UserListAdd" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?php echo $menu_user_create; ?> </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index.php?route=UserPermission" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?php echo $menu_user_permission; ?></p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php } ?>
              <?php if(in_array('Setting',$menu_permission)){ ?>
              <li class="nav-item <?php echo ($page=='setting'?'menu-open':''); ?>">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    <?php echo $menu_setting; ?>
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php?route=settings#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?php echo $menu_setting_system; ?></p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?route=settings/layout" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?php echo $menu_setting_layout; ?></p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index.php?route=settings/user" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?php echo $menu_setting_user; ?></p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index.php?route=settings/update" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Update</p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php } ?>
            </ul>
          </nav>
        </div>
      </aside>
      <aside class="control-sidebar control-sidebar-dark">
        <ul class="navbar-nav">
          <li class="nav-item pl-4">
              <a class="nav-link" href="<?php echo $logout_link;?>" role="button">                
                <i class="fas fa-key"></i> <span class="pl-4">Logout</span>
              </a>
            </li>
          
        </ul>
      </aside>
      <?php } ?>