

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
            <a href="<?= base_url() ?>admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
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
                <a href="<?php echo base_url() ?>admin/course" class="nav-link <?php if($title == 'Course') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Course</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/subject" class="nav-link <?php if($title == 'Subject') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Subjects</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($menu == 'Exam Management') { echo 'menu-open active_border'; }?> ">
            <a href="#" class="nav-link <?php if($menu == 'Report Manager') { echo 'active'; }?>">
              <i class="nav-icon fas fa-question-circle"></i>
              <p>
                Exam Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">         
              <li class="nav-item <?php if($title == 'Add Question'  or $title == 'Print Question') { echo 'menu-open'; }?>" >
                    <a href="<?= base_url(); ?>admin/add_question" class="nav-link <?php if($title == 'Add Question' or $title == 'Print Question') { echo 'active'; }?>">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Question Bank
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url(); ?>admin/add_question" class="nav-link <?php if($title == 'Add Question') { echo 'active'; }?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Question</p>
                    </a>
                  </li>
                  <li class="nav-item">
                   <a href="<?= base_url(); ?>admin/print_question" class="nav-link <?php if($title == 'Print Question') { echo 'active'; }?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Print Questions</p>
                    </a>
                  </li>
                </ul>
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
                <a href="<?php echo base_url() ?>admin/send" class="nav-link <?php if($title == 'Send') { echo 'active'; }?>">
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
                <a href="<?php echo base_url() ?>admin/new_notice" class="nav-link <?php if($title == 'New Notice') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Notice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/new_event" class="nav-link <?php if($title == 'New Event') { echo 'active'; }?>">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Event</p>
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
                <a href="<?php echo base_url() ?>admin/create_gallery" class="nav-link <?php if($title == 'Create Gallery') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Gallery</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/gallery_photo" class="nav-link <?php if($title == 'Gallery Photos') { echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Photos</p>
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