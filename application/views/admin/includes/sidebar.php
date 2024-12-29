<? 
$d = &get_instance();
$uri = $d->uri->segment(2);
?>
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile position-relative" style="background: url(<?php echo base_url() ?>assets/images/background/user-info.jpg) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="<?php echo base_url() ?>assets/images/users/profile.png" alt="user" class="w-100" /> </div>
                    <!-- User profile text-->
                    <div class="profile-text pt-1"> 
                        <a href="#" class="dropdown-toggle u-dropdown w-100 text-white d-block position-relative" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><? echo $d->admin->get_admin("name") ?></a>
                        <div class="dropdown-menu animated flipInY"> 
                            <a href="<? echo base_url() ?>admin/dashboard/updateProfile" class="dropdown-item"><i class="ti-user"></i>
                                My Profile</a>  
<!--                            <a href="<? //echo base_url('admin/settings') ?>" class="dropdown-item"><i class="ti-settings"></i> Settings</a>-->
                            <div class="dropdown-divider"></div> 
                            <a href="<?php echo base_url("admin/login/logout");?>" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item <? echo ($uri == "dashboard") ? 'active' : ''; ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>admin/dashboard" aria-expanded="false"><i class="mdi mdi-gauge"></i>
                            	<span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                         

                      <li class="sidebar-item <? echo ($uri == "menus") ? 'active' : ''; ?>">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Menus </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="<?php echo base_url(); ?>admin/menus" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Menus </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?php echo base_url(); ?>admin/Arrangemenu" class="sidebar-link">
                                        <i class="mdi mdi-adjust"></i>
                                        <span class="hide-menu"> Arrange Menus </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                       
                        <li class="sidebar-item <? echo ($uri == "stroy") ? 'active' : ''; ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>admin/about/story" aria-expanded="false"><i class="mdi mdi-all-inclusive"></i>
                            	<span class="hide-menu"> Stories</span>
                            </a>
                        </li>
                        <li class="sidebar-item <? echo ($uri == "blogs") ? 'active' : ''; ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>admin/blogs" aria-expanded="false"><i class="icon-tag"></i>
                            	<span class="hide-menu">NEWS & VIEWS</span>
                            </a>
                        </li>
                        <li class="sidebar-item <? echo ($uri == "categories") ? 'active' : ''; ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>admin/blogs/categories" aria-expanded="false"><i class="mdi mdi-language-swift"></i>
                            	<span class="hide-menu">Categories</span>
                            </a>
                        </li>
                        <!--<li class="sidebar-item <? echo ($uri == "publication") ? 'active' : ''; ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>admin/publication" aria-expanded="false"><i class="mdi mdi-directions"></i>
                            	<span class="hide-menu">Publications</span>
                            </a>
                        </li>-->
                        <li class="sidebar-item <? echo ($uri == "solutions") ? 'active' : ''; ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>admin/solutions" aria-expanded="false"><i class=" mdi mdi-laptop-windows"></i>
                            	<span class="hide-menu">Solutions</span>
                            </a>
                        </li>
                        <li class="sidebar-item <? echo ($uri == "about") ? 'active' : ''; ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>admin/about" aria-expanded="false"><i class=" mdi mdi-account-switch"></i>
                            	<span class="hide-menu">Teams</span>
                            </a>
                        </li>
                        <li class="sidebar-item <? echo ($uri == "about") ? 'active' : ''; ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>admin/metadata" aria-expanded="false"><i class=" mdi mdi-account-switch"></i>
                            	<span class="hide-menu">Meta Data</span>
                            </a>
                        </li>
                        <li class="sidebar-item <? echo ($uri == "file_manager") ? 'active' : ''; ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>admin/file_manager" aria-expanded="false"><i class=" mdi mdi-laptop-windows"></i>
                            	<span class="hide-menu">File Manager</span>
                            </a>
                        </li>
                        <li class="sidebar-item <? echo ($uri == "pages") ? 'active' : ''; ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>admin/pages" aria-expanded="false"><i class=" mdi mdi-laptop-windows"></i>
                            	<span class="hide-menu">Pages</span>
                            </a>
                        </li>
                        <li class="sidebar-item <? echo ($uri == "settings") ? 'active' : ''; ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>admin/settings" aria-expanded="false"><i class="icon-settings"></i>
                            	<span class="hide-menu">Settings</span>
                            </a>
                        </li>
                        <li class="sidebar-item <? echo ($uri == "podcast") ? 'active' : ''; ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>admin/podcast" aria-expanded="false"><i class="icon-vector"></i>
                            	<span class="hide-menu">Sliders</span>
                            </a>
                        </li>
                         <li class="sidebar-item <? echo ($uri == "solutions") ? 'active' : ''; ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>admin/solutions/list_new" aria-expanded="false"><i class="mdi mdi-library-plus"></i>
                            	<span class="hide-menu">Subscribers</span>
                            </a>
                        </li>
                        <li class="sidebar-item <? echo ($uri == "solutions") ? 'active' : ''; ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url(); ?>admin/jobs/" aria-expanded="false"><i class="mdi mdi-library-plus"></i>
                            	<span class="hide-menu">Jobs</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url("admin/login/logout");?>" aria-expanded="false"><i class="mdi mdi-directions"></i>
                            	<span class="hide-menu">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points
            <div class="sidebar-footer">
                <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
            <!-- End Bottom points-->
        </aside>
        
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
      
      
    