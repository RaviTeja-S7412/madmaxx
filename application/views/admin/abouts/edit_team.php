<?php admin_header(); ?>
<?php admin_sidebar(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


             <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0">Team</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>admin/about">Team</a> </li>
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
                                <h4 class="card-title text-white">Update Team</h4>
                            </div>
                            <div class="card-body">
                               
                                <form class="floating-labels mt-4" action="<?php echo base_url() ?>admin/about/update"method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $team_edit->id ?>">
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-5 focused">
                                           <input type="file" class="form-control" name="slider" id="input2"  >
                                           <input type="hidden" name="old_slider" class="old_slider" value="<?php echo $team_edit->image ?>">
								           <input type="hidden" name="slider_id" class="slider_id">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-3">
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" name="name" value="<?php echo $team_edit->name ?>" id="input3" required>
                                        <span class="bar"></span>
                                        <label for="input3">Name</label>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" name="designation" value="<?php echo $team_edit->designation ?>" id="input3" required>
                                        <span class="bar"></span>
                                        <label for="input3">Designation</label>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" name="linkdin" value="<?php echo $team_edit->linkdin_acc ?>" id="input3" required>
                                        <span class="bar"></span>
                                        <label for="input3">LinkdIn</label>
                                    </div>
                                    </div>
                                    <div class="col-md-3">   
                                    <div class="form-group mb-5">
                                        <label>Short Description</label>
                                        <textarea id="w3review" class="form-control p-0" name="short_desc"  rows="4" cols="50"><?php echo $team_edit->short_desc ?></textarea>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="form-group mb-5">
                                    <textarea id="w3review" class="form-control p-0" name="long_desc"  rows="4" cols="50"><?php echo $team_edit->long_desc ?></textarea>
                                        <span class="bar"></span>
                                        <label for="input3">long Description</label>
                                    </div>
                                    </div>
                                    <div class="col-md-3">   
										<div class="form-group mb-5">
											<label>Advisor</label>
											<input class="form-control p-0" type="checkbox" name="advisor" <? echo ($team_edit->advisor == "on") ? 'checked' : '' ?>>
										</div>
                                    </div>
                                   
                                    <div class="col-md-2">
                                    <img class="thumbnail" style="height: 70px; width: 100px;" src="<?php echo base_url(); ?><?php echo $team_edit->image ?>" alt="">
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
            
      
<?php admin_footer(); ?> 
<script>
$("input[type='checkbox']").bootstrapSwitch({size : 'mini'});				  
</script>
