

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

          <li class="nav-item <?php if($menu == 'Institute Management' || $menu == 'Applications') { echo 'menu-open active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Purchase Register' || $menu == 'All Purchase') { echo 'active'; }?>">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Manage Institute
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>super_admin/ins_approval" class="nav-link <?php if($title == 'Approval'  || $title == 'Center Details') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Approval</p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="<?php echo base_url() ?>super_admin/allcenter" class="nav-link <?php if($title == 'All Centers') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>All Centers </p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="<?php echo base_url() ?>super_admin/terminatedcenter" class="nav-link <?php if($title == 'Terminated Centers') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Terminated Centers </p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item <?php if($menu == 'Course Management') { echo 'menu-open active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Report Manager') { echo 'active'; }?>">
              <i class="nav-icon fas fa-id-card"></i>
              <p>
                Course Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>super_admin/course" class="nav-link <?php if($title == 'Course') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Course</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>super_admin/subject" class="nav-link <?php if($title == 'Subject') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Subjects</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($menu == 'Exam Management' || $menu == 'Exam') { echo 'menu-open active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Report Manager') { echo 'active'; }?>">
              <i class="nav-icon fas fa-question-circle"></i>
              <p>
                Exam Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>exam/trainee" class="nav-link <?php if($title == 'Trainee' || $title == 'Trainee Edit') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Trainee List</p>
                </a>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>exam/examinee" class="nav-link <?php if($title == 'Examinee' || $title == 'Passed' ) { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Examinee List</p>
                </a>
              </li>
              <li class="nav-item <?php if($title == 'Add Question'  or $title == 'Print Question') { echo 'menu-open'; }?>" >
                    <a href="<?= base_url(); ?>super_admin/add_question" class="nav-link <?php if($title == 'Add Question' or $title == 'Print Question') { echo 'active'; }?>">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Question Bank
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url(); ?>super_admin/add_question" class="nav-link <?php if($title == 'Add Question') { echo 'active'; }?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Question</p>
                    </a>
                  </li>
                  <li class="nav-item">
                   <a href="<?= base_url(); ?>super_admin/print_question" class="nav-link <?php if($title == 'Print Question') { echo 'active'; }?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Print Questions</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li><!-- 
        <li class="treeview <?php if($menu == 'Exam') { echo 'active'; } ?>">
            <a href="#">
                <i class="fa fa-check-square-o"></i>
                <span> Exam Management </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?php if($title == 'Add Question') { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>super_admin/add_question"><i class="fa fa-circle-o"></i>  Add Questions </a></li>
                <li class="<?php if($title == 'Exam Results') { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>super_admin/result_info"><i class="fa fa-circle-o"></i>  Exam Results </a></li>
                <li class="<?php if($title == 'Exam Winners') { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>super_admin/winner_info"><i class="fa fa-circle-o"></i>  Exam Winners </a></li>
            </ul>
        </li> -->
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
          <li class="nav-item">
            <a href="<?php echo base_url() ?>wallet/alltnx" class="nav-link <?php if($title == 'All TNX' || $title=='TNX Details') { echo 'active'; }?>">
              <i class="fa fa-money-check nav-icon"></i>
              <p>All Transections</p>
            </a>
          </li>
          <li class="nav-item <?php if($menu == 'Wallet') { echo 'menu-open active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Wallet') { echo 'active'; }?>">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Wallet
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>wallet/wrecharge" class="nav-link <?php if($title == 'Recharge') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Recharge</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>wallet/balance" class="nav-link <?php if($title == 'Balance') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Balance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>wallet/withdraw" class="nav-link <?php if($title == 'Withdraw') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Withdraw</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($menu == 'Charity') { echo 'menu-open active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Report Manager') { echo 'active'; }?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>
                Charity
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link <?php if($title == 'Citizen Application') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Applications</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link <?php if($title == 'Tax Certificate List') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Report</p>
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

          <li class="nav-item <?php if($menu == 'Accounts') { echo 'menu-open active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Accounts') { echo 'active'; }?>">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Accounts
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>super_admin/credit" class="nav-link <?php if($title == 'Credit') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Credit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>super_admin/debit" class="nav-link <?php if($title == 'Debit') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Debit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>" class="nav-link <?php if($title == '') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item <?php if($menu == 'User Manager') { echo 'menu-open  active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'User Manager') { echo 'active'; }?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Manager
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>super_admin/users" class="nav-link <?php if($title == 'Users') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($menu == 'SMS') { echo 'menu-open  active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'SMS') { echo 'active'; }?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                SMS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>super_admin/send_sms" class="nav-link <?php if($title == 'Send SMS') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send SMS</p>
                </a>
              </li><!-- 
              <li class="nav-item">
                <a href="<?php echo base_url() ?>super_admin/users" class="nav-link <?php if($title == 'Users') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SMS History</p>
                </a>
              </li> -->
            </ul>
          </li>

          <li class="nav-item <?php if($menu == 'Announcement') { echo 'menu-open active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Announcement') { echo 'active'; }?>">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>
                Announcement
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="<?php echo base_url() ?>super_admin/new_notice" class="nav-link <?php if($title == 'New Notice') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Notice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>super_admin/new_event" class="nav-link <?php if($title == 'New Event') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Event</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($menu == 'Settings') { echo 'menu-open  active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Settings') { echo 'active'; }?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>super_admin/system_settings" class="nav-link <?php if($title == 'Site Settings') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Site Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>super_admin/profile_settings" class="nav-link <?php if($title == 'Set Commission') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile Settings</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($menu == 'Gallery') { echo 'menu-open  active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Gallery') { echo 'active'; }?>">
              <i class="nav-icon fas fa-camera-retro"></i>
              <p>
                Gallery
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>super_admin/create_gallery" class="nav-link <?php if($title == 'Create Gallery') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Gallery</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>super_admin/gallery_photo" class="nav-link <?php if($title == 'Gallery Photos') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Photos</p>
                </a>
              </li>
            </ul>
          </li>







          <li class="nav-item">
            <a href="<?php echo base_url() ?>super_admin/backup" class="nav-link">
              <i class="nav-icon fa fa-download"></i>
              <p>
                Backup Database
              </p>
            </a>
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