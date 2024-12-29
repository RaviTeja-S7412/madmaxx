<?php admin_header(); ?>
<?php admin_sidebar(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


             <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0">Solutions</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>admin/solutions">Podcast Sliders</a> </li>
                    </ol>
                </div>
            </div>
              <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                    </div>
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header card-header-primary">
                                <h4 class="card-title text-white">Update Slider Images</h4>
                            </div>
                            <div class="card-body">
                               
                                <form class="floating-labels mt-4" action="<?php echo base_url() ?>admin/podcast/update"method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $slider->id ?>">
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-5 focused">
                                        <input type="file" class="form-control" name="slider"   id="input2" >
                                          <input type="hidden" name="old_slider" class="old_slider" value="<?php echo $slider->image ?>">
								        <input type="hidden" name="slider_id" class="slider_id">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-3">
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" name="name" value="<?php echo $slider->name ?>" id="input3" required>
                                        <span class="bar"></span>
                                        <label for="input3">Name</label>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" name="deatils" value="<?php echo $slider->deatils ?>" id="input3" required>
                                        <span class="bar"></span>
                                        <label for="input3">Deatils</label>
                                    </div>
                                    </div>
                                    <div class="col-md-3">   
                                    <div class="form-group mb-5">
                                        <label>Short Description</label>
                                            <input type="text" value="<?php echo $slider->short_desc; ?>" class="form-control p-0" name="short_desc" />
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <img class="thumbnail" style="height: 70px; width: 100px;" src="<?php echo base_url(); ?><?php echo $slider->image ?>" alt="">
                                    </div>
                                    <div class="col-md-3">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                  </div>
                </div>
              </div>
            
                 <!----tables---->
                 
      
<?php admin_footer(); ?> 

