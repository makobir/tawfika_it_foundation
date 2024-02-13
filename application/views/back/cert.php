

<style type="text/css">
  .active_border {
    border-bottom: 3px solid green;
  }
</style>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url() ?>super_admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>       


          <li class="nav-item <?php if($menu == 'Certificates') { echo 'menu-open active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Report Manager') { echo 'active'; }?>">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>
                Certificates
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url()?>certificates/issue" class="nav-link <?php if($title == 'Issue Certificate') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Issue Certificates</p>
                </a>
              </li>             
              <li class="nav-item">
                <a href="<?= base_url()?>certificates/reissueapp" class="nav-link <?php if($title == 'Reissue Application') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Reissue Application</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>certificates/all_cert" class="nav-link <?php if($title == 'All Certificates') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>All Issued Certificates</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item <?php if($menu == 'Courier') { echo 'menu-open active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Courier') { echo 'active'; }?>">
              <i class="nav-icon fas fa-truck-moving"></i>
              <p>
                Courier
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>courier/send" class="nav-link <?php if($title == 'Send') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Send</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>courier/report" class="nav-link <?php if($title == 'Report') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
            </ul>
          </li>






          <li class="nav-item">
            <a href="<?php echo base_url() ?>authenticator/logout" class="nav-link">
              <i class="nav-icon fas fa-trash"></i>
              <p>
                Logout
              </p>
            </a>
          </li>  
        </ul>
      </nav>