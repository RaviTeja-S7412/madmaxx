<?php admin_header(); ?>
<?php admin_sidebar(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


             <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0">Menus</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>admin/menus">Menus</a> </li>
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
                                <h4 class="card-title">Update Menu</h4>
                            </div>
                            <div class="card-body">
                               
                                <form class="floating-labels mt-4" action="<?php echo base_url() ?>admin/menus/editfooter" method="post">
                                <input type="hidden" name="id" value="<?php echo $n->id ?>">
                                
                                <div class="row">
                                    <div class="col-md-4">
                                <div class="form-group mb-5">
                                        <input type="text" class="form-control" name="name" value="<?php echo $n->name ?>" id="input2" required>
                                        <span class="bar"></span>
                                        <label for="input2">Menu Name</label>
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" name="link" value="<?php echo $n->link ?>" id="input2" required>
                                        <span class="bar"></span>
                                        <label for="input2">Menu Link</label>
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group mb-5">
                                    <select class="form-control custom-select" required name="target">
                                     <option value="_blank" <?php if($n->target == '_blank') { ?>  selected="selected"<?php } ?>>Blank</option>
                                     <option value="_self" <?php if($n->target == '_self') { ?> selected="selected"<?php } ?>>Self</option>
                                    </select>
                                        <label for="input6">Link Target</label>
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group mb-5">
                                    <label>Menu Type</label>
                                    
                                    <? 
										$menu_types = explode(",",$n->menu_type);
										?>
                                    
                                    <select class="select2 form-control" name="menu_type[]"  multiple="multiple"  style="width: 100%;" required>
                                        <option value="Header" <?php if($n->menu_type == 'Header') { ?>  selected="selected"<?php } ?>>Header</option>
                                        <option value="Footer" <?php if($n->menu_type == 'Footer') { ?> selected="selected"<?php } ?>>Footer</option>
                                    </select>
                                    </div>
                                    </div>
                                    <div class="col-md-4">
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

<script>
				  
$(".select2").select2();
$(".select2").val(<? echo json_encode($menu_types) ?>).trigger("change")	
	
	
</script>

