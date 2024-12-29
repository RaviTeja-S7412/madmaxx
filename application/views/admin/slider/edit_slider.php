<?php admin_header(); ?>
<?php admin_sidebar(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


             <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0">Sliders</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>admin/podcast"> Sliders</a> </li>
                    </ol>
                </div>
            </div>
              <div class="container-fluid">
                <div class="row">
                <div class="col-12">
                        <div class="card">
                        	<div class="card-header card-header-primary">
                                <h4 class="card-title text-white">Update Sliders</h4>
                            </div>
                            <div class="alert alert-success" style="display:none" id="smsg"></div>
                            <div class="alert alert-danger" style="display:none" id="emsg"></div>
                            <div class="card-body">
                                <form class="floating-labels mt-4" action="<?php echo base_url() ?>admin/podcast/update" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $slider->id ?>">
                                   
                                    <div class="row">
                                        <div class="col-md-3">     
                                                <div class="form-group mb-5">
                                                <label>Type</label>
                                                <select class="select2 form-control p-0" name="types" id="types"   style="width: 100%;" >
                                                        <option>Select Types</option>
                                                        <option value="home-banner" <?php if($slider->type == 'home-banner') { ?>  selected="selected"<?php } ?>>Home Banner</option>
                                                        <option value="featured-guests" <?php if($slider->type == 'featured-guests') { ?>  selected="selected"<?php } ?>>Featured Guests</option>
                                                        <option value="host" <?php if($slider->type == 'host') { ?>  selected="selected"<?php } ?>>Host</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">     
                                                <div class="form-group mb-5">
                                                <label>Page Name</label>
                                                    <select class="select2 form-control p-0" name="page_name"  style="width: 100%;" required>
                                                        <option>Select Page</option>
                                                            <?php 
                                                                $pages = $this->db->group_by("page_name")->where("deleted",0)->get("tbl_pages")->result(); 
                                                                foreach($pages as $page){
                                                                    if($slider->page_name==$page->page_name){
                                                            ?>
                                                               <option value="<?php echo $page->page_name ?>" selected><?php echo $page->page_name ?></option> 
                                                                    <?php }else{ ?>
                                                                    <option value="<?php echo $page->page_name ?>"><?php echo $page->page_name ?></option>
                                                                    <?php }} ?>
                                                    </select>
                                                </div>
                                            </div>
                                         
                                            <div class="col-md-3">
                                            <div class="form-group mb-5 focused">
                                                        <input type="file" class="form-control" name="image"   id="input2">
                                                        <input type="hidden" name="old_image" class="old_image" value="<?php echo $slider->image ?>">
                                                        <span class="bar"></span>
                                                        
                                                    </div>
                                            </div>
                                            <div class="col-md-3 featured-guests"  style='display:none;' >
                                                    <div class="form-group mb-5 focused">
                                                    <textarea  type="text" class="form-control p-0"  name="desingnation" rows="4" cols="50" ><?php echo $slider->name ?></textarea> 
                                                        <span class="bar"></span>
                                                        <label for="input1">Name & Desingnation </label>
                                                    </div>
                                            </div>
                                            <div class="col-md-3 featured-guests"  style='display:none;' >
                                                    <div class="form-group mb-5 focused">
                                                    <input type="text" class="form-control p-0"  name="button_name" value="<?php echo $slider->button_name ?>">
                                                        <span class="bar"></span>
                                                        <label for="input1">Button Name</label>
                                                    </div>
                                            </div>
                                            <div class="col-md-3 featured-guests"  style='display:none;' >
                                                    <div class="form-group mb-5 focused">
                                                    <input type="text" class="form-control p-0"  name="link" value="<?php echo $slider->link ?>">
                                                        <span class="bar"></span>
                                                        <label for="input1">Link</label>
                                                    </div>
                                            </div>
                                             <div class="col-md-3 featured-guests"  style='display:none;' >
                                                    <div class="form-group mb-5 focused">
                                                    <select class="form-control custom-select p-0" required name="target">
                                                        <option value="_blank" <?php if($slider->target == '_blank') { ?>  selected="selected"<?php } ?>>Blank</option>
                                                        <option value="_self" <?php if($slider->target == '_self') { ?> selected="selected"<?php } ?>>Self</option>
                                                        </select>
                                                            <label for="input6">Link Target</label>
                                                    </div>
                                            </div>
                                            <div class="col-md-12 " id= "short_desc" >
                                                    <div class="form-group mb-5 focused">
                                                    <textarea class="form-control p-0 summernote"  name="short_desc" id="descriptions"  rows="4" cols="50"><?php echo $slider->short_desc ?></textarea>
                                                        <span class="bar"></span>
                                                        <label for="input1"></label>
                                                    </div>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="hidden" name="id" value="<? echo $this->uri->segment(4) ?>">
                                            <button type="submit" class="btn btn-info ">Submit</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
              </div>
            
                 <!----tables---->
                 
      
<?php admin_footer(); ?> 

<script>

$(document).ready(function(){
        $("select").change(function(){
            $( "select option:selected").each(function(){
                if($(this).attr("value")=="home-banner"){
                    $(".banner").hide();
                    $(".banner").show();
                }
                if($(this).attr("value")=="featured-guests"){
                    $(".featured-guests").hide();
                    $(".featured-guests").show();
                }
                // if($(this).attr("value")=="host"){
                //     $(".host").hide();
                //     $(".host").show();
                // }
                
            });
        }).change();
    });
</script>

<script>
$('#types').on('change', function () {
    if (this.value == 'host') {
     
        $("#host").show();
        $("#short_desc").hide();
    } else {
       
        $("#host").hide();
      
    }

});
$('#types').on('change', function () {
    if (this.value == 'featured-guests') {
     
        $(".featured-guests").show();
    } else {
       
        $(".featured-guests").hide();
    }

});
$('#types').on('change', function () {
    if (this.value == 'host') {
     
        $("#host").show();
    } else {
       
        $("#host").hide();
    }

});


</script>
