<?php admin_header(); ?>
<?php admin_sidebar(); ?>
      
      
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0">Dashboard</h3>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
            
            	<!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div
                                        class="round round-lg text-white d-inline-block text-center rounded-circle bg-info">
                                        <i class="mdi mdi-book-open-page-variant"></i>
                                    </div>
                                    <div class="ml-2 align-self-center">
                                        <h5 class="text-muted mb-0">Theatres</h5>
                                        <h3 class="mb-0 font-weight-light"><?php echo count($this->db->query("select * from tbl_pages where deleted=0")->result()); ?></h3>
                             
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div
                                        class="round round-lg text-white d-inline-block text-center rounded-circle bg-success">
                                        <i class="fab fa-angellist"></i></div>
                                    <div class="ml-2 align-self-center">
                                        <h5 class="text-muted mb-0">Today Bookings</h5>
                                        <h3 class="mb-0 font-weight-light"><?php echo count($this->db->query("select * from tbl_subscribers")->result()); ?></h3>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div
                                        class="round round-lg text-white d-inline-block text-center rounded-circle bg-primary">
                                        <i class="fa fa-users"></i></div>
                                    <div class="ml-2 align-self-center">
                                        <h5 class="text-muted mb-0">Waitlist</h5>
                                        <h3 class="mb-0 font-weight-light"> <?php echo count($this->db->query("select * from tbl_team where deleted=0")->result()); ?> </h3>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div
                                        class="round round-lg text-white d-inline-block text-center rounded-circle bg-danger">
                                        <i class="fas fa-outdent"></i></div>
                                    <div class="ml-2 align-self-center">
                                        <h3 class="text-muted mb-0">Bookings</h3>
                                        <h5 class="text-muted mb-0"><?php echo $this->db->count_all_results('tbl_categories');  ?></h5>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->


			</div>   
      
<?php admin_footer(); ?> 

