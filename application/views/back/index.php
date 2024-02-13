<!DOCTYPE html>
<html lang="en">

<style type="text/css">
  /*.content-wrapper, .main-sidebar { */
   .main-sidebar {
    background-color: rebeccapurple !important;
  }
 /* div {
    background: linear-gradient(90deg, rgba(43,32,230,1) 2%, rgba(133,83,120,1) 3%, rgba(14,12,172,1) 3%, rgba(0,212,255,1) 100%);
  }*/
</style>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>upload/logo/logo.jpg" />
  <title> <?php $site = $this->Authenticator_model->setting_data();
   echo $title.' | ' .$site->site_name ; ?> </title>
  <?php include 'include/css.php'; ?>
</head>
<body class="hold-transition sidebar-mini <?php if($title == 'Print Certificate') {echo 'sidebar-collapse'; } ?>">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars "></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">         
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><?php echo $site->site_name ; ?>
        </a>
      </li>

      <?php if($this->session->userdata('usertype') == 'super_admin') { ?>
      <form method="post" action="<?= base_url() ?>Wallet/checktnx">
      <li class="nav-item d-none d-sm-inline-block" style="margin-right: 20px;">
        <div class="input-group" style="width: 250px;" >
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-money-bill"></i>
            </span>
          </div>            
            <input name="mobile" required class="form-control" placeholder="Mobile Number" />
            <div class="input-group-append">
                <div class="input-group-text" >
                  <button style="background: none; border:none; margin:-5px;" type="submit"> <i class="fa fa-arrow-right"></i> </button>
                </div>
            </div>          
        </div>
      </li>
      </form>

      <form method="post" action="<?= base_url() ?>certificates/reissue">
      <li class="nav-item d-none d-sm-inline-block">
        <div class="input-group" style="width: 250px;">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-graduation-cap"></i>
            </span>
          </div>            
            <input name="cid" required type="text" class="form-control" placeholder="Regi No" />
            <div class="input-group-append">
                <div class="input-group-text" >
                  <button style="background: none; border:none; margin:-5px;" type="submit"> <i class="fa fa-arrow-right"></i> </button>
                </div>
            </div>          
        </div>
      </li>
      </form>
    <?php } ?>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu 
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -
            <div class="media">
              <img src="<?php echo base_url() ?>assets/back/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End --
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">0 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
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
    <!-- Brand Logo 
    <a href="<?php echo base_url() ?>assets/back/index3.html" class="brand-link">
      <img src="<?php echo base_url() ?>assets/back/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $site->site_name ; ?></span>
    </a>-->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <?php if ($this->session->userdata('userfile') == NULL) { ?>
           <img src="<?php echo base_url(); ?>upload/logo/logo.jpg" class="img-circle" alt="Image">
         <?php }
         else { ?>
          <img src="<?php echo base_url(); ?>upload/user/<?php echo $this->session->userdata('userfile'); ?>" class="img-circle" alt="Image">
         <?php } ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('name') ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form 
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <?php if($this->session->userdata('usertype') == 'super_admin') { include 'menu.php';}
          if($this->session->userdata('usertype') == 'cert') { include 'cert.php';}
      elseif($this->session->userdata('usertype') == 'admin') { include 'admin.php'; } 

      ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="fixed">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <?php if ($this->session->userdata('message') != NULL || $this->session->userdata('exception') != NULL ) { ?>
        <!--
      <div style="background: #e1fae7; height: 50px; color: red; font-weight: bold;" class="alert hide-it" role="alert" >
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div> -->
     
      <button type="button" class="btn btn-default hide-it" data-toggle="modal" data-target="#modal-default" id="id">      
      </button> 

      <div class="modal fade" id="modal-default" style="margin-top: 10%;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <?php if($this->session->userdata('message')!=NULL) { ?>
                <div class="col-xs-4">
                  <i class="fa fa-check-circle fa-3x" style="color:green;"></i>
                </div>
                <div class="col-xs-8" style="padding-top:10px; padding-left:20px;">
                  <?php 
                    echo $this->session->userdata('message');
                    $this->session->unset_userdata('message');
                   ?>
                </div>                
                <?php } if($this->session->userdata('exception')!=NULL) { ?>
                <div class="col-xs-4">
                  <i class="fa fa-times-circle fa-3x" style="color:red;"></i>
                </div>
                <div class="col-xs-8" style="padding-top:10px; padding-left:20px;">
                  <?php 
                    echo $this->session->userdata('exception');
                    $this->session->unset_userdata('exception');
                   ?>
                </div> 
                <?php } ?>
            </div>
            </div>
            <div class="modal-footer" align="right">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <?php } ?>

  </div>
  <script type="text/javascript">
      $(function() {

     // $(".hide-it").fadeTo(3000, 0).slideUp(500, function(){
      $(".hide-it").fadeTo(0, 0).slideUp(10, function(){
          $(this).remove(); 
      });
  });

   $(document).ready(function(){
   $("#id").trigger("click");
    });

  setTimeout(function() {$('#modal-default').modal('hide');}, 3000);

  </script>
    <!-- Content Header (Page header) 
    <?php if ($title != 'Home') { ?>
    <section class="content-header">
      <div class="container-flcode">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-flcode --
    </section>-->
    <?php } ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-flcode">
        <div class="row">
        	<?php echo $private;?>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-flcode -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print" >
    <div class="float-right d-none d-sm-block">
      <b>Version</b> CMS - 1.0
    </div>
    <strong>Developed by : <a href="https://fb.com/makobirbd">Md. Alamgir Kobir </a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include 'include/js.php'; ?>
</body>
</html>
