

<style type="text/css">
  .active_border {
    border-bottom: 3px solid green;
    
  }
  .mt-2 {
      background-color:#39117a;
  }
  .sidebar {
      background-color: #097822
  }
</style>
</style>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url() ?>institute" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>       
          <li class="nav-item <?php if($menu == 'Trainee Management' || $menu == 'Applications') { echo 'menu-open active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Trainee Management' ) { echo 'active'; }?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Trainee Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/admission" class="nav-link <?php if($title == 'Admission') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Admission </p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/all" class="nav-link <?php if($title == 'All Trainee') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Trainee List</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/idcard" class="nav-link <?php if($title == 'ID Card') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p> ID Card </p>
                </a>
              </li>  
            </ul>
          </li>         
          <li class="nav-item <?php if($menu == 'Exam') { echo 'menu-open active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Exam') { echo 'active'; }?>">
              <i class="nav-icon fas fa-pager"></i>
              <p>
                Exam
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/formfillup" class="nav-link <?php if($title == 'Form Fillup') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Form Fillup </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/examinee" class="nav-link <?php if($title == 'Examinee') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Examnee List</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/retake" class="nav-link <?php if($title == 'Retake') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p> Retake </p>
                </a>
              </li>  
            </ul>
          </li>
          <!--
          <li class="nav-item <?php if($menu == 'Attendance') { echo 'menu-open  active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Attendance') { echo 'active'; }?>">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>
                Attendance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/trainee_attendance" class="nav-link <?php if($title == 'Trainee Attendance') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trainee Attendance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/my_courses" class="nav-link <?php if($title == 'Staff Attendance') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staff Attendance</p>
                </a>
              </li>
            </ul>
          </li> -->

          <li class="nav-item <?php if($menu == 'Results') { echo 'menu-open  active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Results') { echo 'active'; }?>">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Results
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/marks_entry" class="nav-link <?php if($title == 'Marks Entry') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Practical Marks Entry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/result" class="nav-link <?php if($title == 'Results') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Results</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($menu == 'BTEB') { echo 'menu-open  active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'BTEB') { echo 'active'; }?>">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                BTEB Info
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/bteb_student_add" class="nav-link <?php if($title == 'Student Add') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/bteb_students" class="nav-link <?php if($title == 'BTEB Students') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?php if($menu == 'Certificates') { echo 'menu-open active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Report Manager') { echo 'active'; }?>">
              <i class="nav-icon fas fa-certificate"></i>
              <p>
                Certificates
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>certificates/reissue" class="nav-link <?php if($title == 'Reissue Certificate') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Reissue Certificate</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>certificates/all" class="nav-link <?php if($title == 'All Certificates') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>All Issued Certificates</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($menu == 'Course') { echo 'menu-open  active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Course') { echo 'active'; }?>">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                Course Registration
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/course_registration" class="nav-link <?php if($title == 'Course Registration') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Course Registration</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/my_courses" class="nav-link <?php if($title == 'My Courses') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Courses</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($menu == 'Wallet') { echo 'menu-open  active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Wallet') { echo 'active'; }?>">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                My Wallet
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>wallet/payfee" class="nav-link <?php if($title == 'Pay Fee') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pay Fee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>wallet/mybalance" class="nav-link <?php if($title == 'Balance') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Account Balance </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($menu == 'Courier') { echo 'menu-open  active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Courier') { echo 'active'; }?>">
              <i class="nav-icon fas fa-truck-moving"></i>
              <p>
                Courier Info
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>courier/receive" class="nav-link <?php if($title == 'Receive') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Receive</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>courier/history" class="nav-link <?php if($title == 'History') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($menu == 'Accounts') { echo 'menu-open  active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Accounts') { echo 'active'; }?>">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Accounts
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>accounts/collectfee" class="nav-link <?php if($title == 'Collect Student Fee') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collect Student Fee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/credit" class="nav-link <?php if($title == 'Credit') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/disbursment" class="nav-link <?php if($title == 'Disbursment') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Disbursment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>accounts/due" class="nav-link <?php if($title == 'Due') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dues</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>accounts/balance" class="nav-link <?php if($title == 'Balance') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Balance Sheet</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>accounts/report" class="nav-link <?php if($title == 'Report') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
                  <!--               <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/debit" class="nav-link <?php if($title == 'Debit') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Debit</p>
                </a>
              </li> -->
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
                <a href="<?php echo base_url() ?>institute/home_slider" class="nav-link <?php if($title == 'Home Slider') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/create_gallery" class="nav-link <?php if($title == 'Create Gallery') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Gallery</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/gallery_photo" class="nav-link <?php if($title == 'Gallery Photos') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Photos</p>
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
                <a href="<?php echo base_url() ?>institute/send_sms" class="nav-link <?php if($title == 'Send SMS') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send SMS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/send_due_sms" class="nav-link <?php if($title == 'Due SMS') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Due SMS</p>
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
                <a href="<?php echo base_url() ?>institute/new_notice" class="nav-link <?php if($title == 'New Notice') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Notice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/new_event" class="nav-link <?php if($title == 'New Event') { echo 'active'; }?>">
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
                <a href="<?php echo base_url() ?>institute/system_settings" class="nav-link <?php if($title == 'Site Settings') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Site Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/profile" class="nav-link <?php if($title == 'Profile') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile Settings</p>
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