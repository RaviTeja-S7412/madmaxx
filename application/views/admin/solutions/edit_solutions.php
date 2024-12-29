<?php admin_header(); ?>
<?php admin_sidebar(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


             <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0">Solutions</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>admin/solutions">Solutions</a> </li>
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
                                <h4 class="card-title text-white">Update Solutions</h4>
                            </div>
                            <div class="card-body">
                               
                                <form class="floating-labels mt-4" action="<?php echo base_url() ?>admin/solutions/edit"method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $sul->id ?>">
                                
                                <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mb-5">
                                    <select class="form-control p-0" name="type">
                                        <option>Select Type</option>
                                        <option value="Text" <?php if($sul->type == 'Text') { ?>  selected="selected"<?php } ?>>Text</option>
                                        <option value="Image" <?php if($sul->type == 'Image') { ?> selected="selected"<?php } ?>>Image</option>
                                        <option value="Heading" <?php if($sul->type == 'Heading') { ?> selected="selected"<?php } ?>>Heading</option>
                                    </select>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-5 focused">
                                        <input type="file" class="form-control" name="image"   id="input2">
                                        <input type="hidden" name="old_image" class="old_image" value="<?php echo $sul->image ?>">
								        <input type="hidden" name="image_id" class="image_id">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-3">
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" name="text_area" value="<?php echo $sul->title ?>" id="input3" required>
                                        <span class="bar"></span>
                                        <label for="input3">Title</label>
                                    </div>
                                    </div>
                                    <div class="col-md-3">     
                                        <div class="form-group mb-5">
                                        <textarea class="form-control p-0" name="link"><?php echo $sul->link  ?></textarea>                                            <span class="bar"></span>
                                            <label for="input3">Link</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="form-group mb-5">
                                    <label>Select Alignment</label>
                                    <select class="form-control p-0" name="alignment">
                                        <option>Select Alignment</option>
                                        <option value="Left" <?php if($sul->alignment == 'Left') { ?>  selected="selected"<?php } ?>>Left</option>
                                        <option value="Right" <?php if($sul->alignment == 'Right') { ?> selected="selected"<?php } ?>>Right</option>
                                    </select>
                                    </div>
                                    </div>
                                  
                                    <div class="col-md-3">   
                                    <div class="form-group mb-5">
                                        <label>Short Description</label>
                                        <textarea class="form-control p-0" name="short_desc"><?php echo $sul->short_desc; ?></textarea>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <? if($sul->image){ ?>
                                    	<img class="thumbnail" style="height: 70px; width: 100px;" src="<?php echo base_url(); ?><?php echo $sul->image ?>" alt="" required>
                                    <? } ?>	
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

                         </form>
                            </div>
                        </div>
                  </div>
                </div>
              </div>
            
                 <!----tables---->
                 
      
<?php admin_footer(); ?> 

