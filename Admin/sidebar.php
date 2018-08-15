  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION['image_path']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['full_name']; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main Navigation</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Users</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="all-users.php"><i class="fa fa-circle-o"></i>All Users</a></li>
            <li><a href="user-new.php"><i class="fa fa-circle-o"></i>Add New</a></li>
            <li><a href="profile.php"><i class="fa fa-circle-o"></i>Your Profile</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Hotels</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="all-hotels.php"><i class="fa fa-circle-o"></i>All Hotels</a></li>
            <li><a href="hotel-new.php"><i class="fa fa-circle-o"></i>Add New</a></li>
            <li><a href="all-room-types.php"><i class="fa fa-circle-o"></i>All Room Types</a></li>
            <li><a href="room-type-new.php"><i class="fa fa-circle-o"></i>Add Room Type</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Tours</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="all-tours.php"><i class="fa fa-circle-o"></i>All Tours</a></li>
            <li><a href="tour-new.php"><i class="fa fa-circle-o"></i>Add New</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Blog</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="all-posts.php"><i class="fa fa-circle-o"></i>All Posts</a></li>
            <li><a href="post-new.php"><i class="fa fa-circle-o"></i>Add New</a></li>
            <li><a href="categories.php"><i class="fa fa-circle-o"></i>Categories</a></li>
            <li><a href="tags.php"><i class="fa fa-circle-o"></i>Tags</a></li>
          </ul>
        </li>
      
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Enquiries</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="all-hotels-enquiry.php"><i class="fa fa-circle-o"></i>Hotel Enquries</a></li>
            <li><a href="all-tours-enquiry.php"><i class="fa fa-circle-o"></i>Tour Enquries</a></li>
          </ul>
        </li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>