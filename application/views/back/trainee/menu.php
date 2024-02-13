

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
            <a href="<?= base_url() ?>institute" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <!--   
          <li class="nav-item">
            <a href="<?php echo base_url() ?>trainee/question_bank" class="nav-link <?php if($title == 'Question Bank') { echo 'active'; }?>">
              <i class="far fa-dot-circle nav-icon"></i>
              <p>Question Bank</p>
            </a>
          </li>  -->        
          <li class="nav-item">
            <a href="<?php echo base_url() ?>trainee/test_enroll" class="nav-link <?php if($title == 'Test Exam') { echo 'active'; }?>">
              <i class="far fa-dot-circle nav-icon"></i>
              <p>Test Exam </p>
            </a>
          </li>     
          <li class="nav-item <?php if($menu == 'Exam' || $menu == 'Exam') { echo 'menu-open active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Exam' || $menu == 'Exam') { echo 'active'; }?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Final Exam 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>trainee/enroll" class="nav-link <?php if($title == 'Enroll') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Enroll Now </p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php echo base_url() ?>trainee/result" class="nav-link <?php if($title == 'Result') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Result</p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="<?php echo base_url() ?>trainee/typingtest" class="nav-link <?php if($title == 'Typing Test') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Typing Test</p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="<?php echo base_url() ?>trainee/marksheet" class="nav-link <?php if($title == 'Marksheet') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Marksheet</p>
                </a>
              </li>  
            </ul>
          </li>      
<!--           <li class="nav-item <?php if($menu == 'Accounts' || $menu == 'Accounts') { echo 'menu-open active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Accounts' || $menu == 'Accounts') { echo 'active'; }?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Accounts 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>trainee/dues" class="nav-link <?php if($title == 'Admission') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Dues </p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php echo base_url() ?>institute/all" class="nav-link <?php if($title == 'All Trainee') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Balance</p>
                </a>
              </li>  
            </ul>
          </li>
 -->



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