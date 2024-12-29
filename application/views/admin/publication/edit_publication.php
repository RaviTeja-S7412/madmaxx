<?php admin_header(); ?>
<?php admin_sidebar(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


             <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0">Publication</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Publication</li>
                    </ol>
                </div>
            </div>
              <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header card-header-primary">
                                <h4 class="card-title">Update Publication</h4>
                            </div>
                            <div class="card-body">
                                <form class="floating-labels mt-4" action="<?php echo base_url() ?>admin/publication/edit/<?php echo $pub->id; ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-5 focused">
                                        <input type="file" class="form-control" name="image"   id="input2" >
                                        <input type="hidden" name="old_image" class="old_image" value="<?php echo $pub->image; ?>">
								        <input type="hidden" name="image_id" class="image_id">
                                        </div>
                                    </div>
                                    <div class="col-md-3">    
                                        <div class="form-group mb-3">
                                            <input type="text" value="<?php echo $pub->title ?>" class="form-control" name="title" id="input3" required>
                                            <span class="bar"></span>
                                            <label for="input3">Title</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">    
                                        <div class="form-group mb-5">
                                            <input type="text" class="form-control"  value="<?php echo $pub->short_description ?>" name="short_description" id="input4" required>
                                            <span class="bar"></span>
                                            <label for="input4">Short Description</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">    
                                        <div class="form-group mb-5">
                                            <input type="text" class="form-control"  value="<?php echo $pub->long_description ?>" name="long_description" id="input5" required>
                                            <span class="bar"></span>
                                            <label for="input5">Long Description</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                    <img class="thumbnail" style="height: 70px; width: 100px;" src="<?php echo base_url(); ?><?php echo $pub->image ?>" alt="">
                                    </div>
                                    <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $pub->id ?>">
                                </form>
                            </div>
                        </div>
                  </div>
                </div>
<?php admin_footer(); ?> 