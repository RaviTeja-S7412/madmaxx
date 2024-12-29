<!DOCTYPE html>
<html lang="en">
<?php admin_header(); ?>

<body>
<?php admin_sidebar(); ?>
<div class="row page-titles">
    <div class="col-md-5 col-12 align-self-center">
        <h3 class="text-themecolor mb-0 text-success">Blog </h3>
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Blog</li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title text-white">Create Blog</h4>
                </div>
                <div class="alert alert-success" style="display:none" id="smsg"></div>
                <div class="alert alert-danger" style="display:none" id="emsg"></div>
                <div class="card-body">
                    <form class="floating-labels mt-4" action="<?php echo base_url() ?>admin/blogs/create" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-5 focused">
                            <input type="file" class="form-control" name="image"   id="input2" <? echo isset($bolg_edit->id) ? '' : 'required' ?>>
                            <input type="hidden" name="old_image" class="old_image" value="<?php  echo $bolg_edit->image ?>">
                            <input type="hidden" name="image_id" class="image_id">
                            <span class="bar"></span>
                                <label for="input3" style=" top: -25px;">Blog Image</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-5 focused">
                            <input type="file" class="form-control" name="inner_image"   id="input2" <? echo isset($bolg_edit->id) ? '' : 'required' ?>>
                            <input type="hidden" name="old_inner_image" class="old_inner_image" value="<?php  echo $bolg_edit->blogs_inner_image ?>">
                            <input type="hidden" name="inner_image_id" class="inner_image_id">
                                <label for="input3" style=" top: -25px;">Blog Inner image</label>
                            </div>
                        </div>
                        <div class="col-md-3">    
                            <div class="form-group mb-5">
                                <input type="text" class="form-control" value="<? echo isset($bolg_edit->title) ? $bolg_edit->title : '' ?>" name="title" id="input3" required>
                                <span class="bar"></span>
                                <label for="input3">Title</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                        <?php $category = $this->db->get_where("tbl_categories")->result();
                        
                        
                        ?>
                                    <div class="form-group mb-5">
                                        <select class="form-control p-0" id="input6" name="category" required>
                                            <option>Select Category</option>
                                         <?php foreach($category as $cat){
                                           $cat_sel = ($bolg_edit->category == $cat->category) ? 'selected' : '';

                                           ?>
                                            <option value="<?php echo $cat->category ;?>" <? echo $cat_sel ?> ><?php echo $cat->category ;?></option>
                                            
                                            <?php } ?>
                                        </select><span class="bar"></span>
                                        <label for="input6">Category</label>
                                    </div>
                                    </div>


                        <!-- <div class="col-md-3">    
                            <div class="form-group mb-5">
                                <input type="text" class="form-control" value="<? //echo isset($bolg_edit->category) ? $bolg_edit->category : '' ?>" name="category" id="input3" required>
                                <span class="bar"></span>
                                <label for="input3">Category</label>
                            </div>
                        </div> -->
                        <div class="col-md-3">    
                            <div class="form-group mb-5">
                                <input type="text" class="form-control" value="<? echo isset($bolg_edit->posted_by) ? $bolg_edit->posted_by : '' ?>" name="posted_by" id="input3" required>
                                <span class="bar"></span>
                                <label for="input3">Posted By</label>
                            </div>
                        </div>
                        <div class="col-md-3">    
                            <div class="form-group mb-5">
                            <textarea id="" class="form-control p-0" value="" name="short_desc"  rows="4" cols="50"><? echo isset($bolg_edit->short_desc) ? $bolg_edit->short_desc : '' ?></textarea>
                                <span class="bar"></span>
                                <label for="input3">Short Description</label>
                            </div>
                        </div>
                        <div class="col-md-12">    
                            <div class="form-group mb-5">
                            <label for="input3">Long Description</label>
                            <textarea id="" class="form-control p-0 summernote" value="" height="10" name="long_desc" id="description"  rows="4" cols="50"><? echo isset($bolg_edit->long_desc) ? $bolg_edit->long_desc : '' ?></textarea>
                                <span class="bar"></span>
                                
                            </div>
                        </div>

                        <div class="col-md-3">    
                            <div class="form-group mb-5">
                                <input type="text" class="form-control" value="<? echo isset($bolg_edit->meta_title) ? $bolg_edit->meta_title : '' ?>" name="meta_title" id="input3" required>
                                <span class="bar"></span>
                                <label for="input3">Meta Title</label>
                            </div>
                        </div>           

                        <div class="col-md-4">    
                            <div class="form-group mb-5">
                            
                            <textarea id="" class="form-control p-0" value="" name="meta_description"  rows="4" cols="50"><? echo isset($bolg_edit->meta_description) ? $bolg_edit->meta_description : '' ?></textarea>
                                <span class="bar"></span>
                                <label for="input3">Meta Description</label>
                            </div>
                        </div>                    
                        <div class="col-md-4">    
                            <div class="form-group mb-5">
                            
                            <textarea id="" class="form-control p-0" value="" name="meta_keywords"  rows="4" cols="50"><? echo isset($bolg_edit->meta_keywords) ? $bolg_edit->meta_keywords : '' ?></textarea>
                                <span class="bar"></span>
                                <label for="input3">Meta Keywords</label>
                            </div>
                        </div>                    

                        <div class="col-md-3">
                        <input type="hidden" name="id" value="<? echo isset($bolg_edit->id) ? $bolg_edit->id : '' ?>">
                        <button type="submit" name="submit" class="btn btn-info btnSubmit pull-right">Save as draft </button>
                        <button type="submit" class="btn btn-success btnSubmit pull-right"><? echo isset($bolg_edit->id) ? 'Update' : 'Submit' ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
               <div class="card-body">
                   <div class="table-responsive">
                        <table id="file_export" class="table table-striped table-bordered display">
                            <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Image </th>
                                    <th>Inner image </th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Posted By</th> 
                                    <th>Status</th>
                                    <th>Publish Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php  $i = 0;
                                        foreach ($blog as $blg) {  
                                        if($blg->deleted==0){ 
                                    ?> 
                                <tr>
                                    <td><?php echo ++$i ?></td>
                                    <td> 
                                        <? if($blg->image){ ?>
                                            <img class="thumbnail" style="height: 80px; width: 120px;" src="<?php echo base_url(); ?><?php echo $blg->image ?>" alt="" required>
                                        <? } ?>
                                    </td>
                                    <td> 
                                        <? if($blg->image){ ?>
                                            <img class="thumbnail" style="height: 80px; width: 120px;" src="<?php echo base_url(); ?><?php echo $blg->blogs_inner_image ?>" alt="" required>
                                        <? } ?>
                                    </td>
                                    <td><?php echo $blg->title ?></td>
                                    <td><?php echo $blg->category ?></td>
                                    <td><?php echo $blg->posted_by ?></td>
                                    <td>
                                        <?php if($blg->status=="Active"){ ?>
                                            <div class="togglebutton bt-switch">
                                                <input type="checkbox" data-on-color="info" st_id="<?php echo $blg->id ?>" class="check"  name="switch" data-off-color="success"  checked>
                                            </div>
                                            <?php  }elseif($blg->status=="Inactive"){ ?>
                                                <div class="togglebutton bt-switch">
                                                <label>
                                                    <input type="checkbox" st_id="<?php echo $blg->id ?>"  data-on-color="info" class="check"  name="switch" data-off-color="success">
                                                </label>
                                                </div>
                                        <?php } ?> 
                                    </td>
                                    <td>
                                        <?php if($blg->publish_status== 1){ ?>
                                            <div class="togglebutton bt-switch">
                                                <input type="checkbox" data-on-color="info" st_id1="<?php echo $blg->id ?>" class="check"  name="switch1" data-off-color="success"  checked>
                                            </div>
                                            <?php  }elseif($blg->publish_status== 0){ ?>
                                                <div class="togglebutton bt-switch">
                                                <label>
                                                    <input type="checkbox" st_id1="<?php echo $blg->id ?>"  data-on-color="info" class="check"  name="switch1" data-off-color="success">
                                                </label>
                                                </div>
                                        <?php } ?> 
                                    </td>




                                    <td>
                                        <a href="<?php echo base_url() ?>admin/blogs/publish/<?php echo $blg->id ?>" class="text-inverse pr-2" data-toggle="tooltip" title="view"><i class="ti-eye"></i></a>
                                        <a href="<?php echo base_url() ?>admin/blogs/add_edit_team/<?php echo $blg->id ?>" class="text-inverse pr-2" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a>
                                        <a href="#" name="delete"  value="<?php echo $blg->id ?>" id="<?php echo $blg->id ?>"  onclick="archiveFunction(this.id)" data-toggle="tooltip" title="Remove"><i class="ti-trash"></i></a>
                                    </td>
                                </tr>
                                    <?php } } ?>  
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>
        </div>
    </div>

<?php admin_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>


$("input[type='checkbox']").bootstrapSwitch({size : 'mini'});
    
$('#file_export').on('switchChange.bootstrapSwitch','input[name="switch"]', function (e, state) {
      //alert(nav_id);
	  var nav_id = $(this).attr("st_id"); 

		var status;

		if ($(this).is(":checked")){
			status = "Active";
		}else{
			status = "Inactive";
		}
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>admin/blogs/blog_status",
			data:{id:nav_id,status:status},
			success:function (data){
				location. reload(true);
			}

		});  
 });

</script>

<!-- publish  status -->

<script>


$("input[type='checkbox']").bootstrapSwitch({size : 'mini'});
    
$('#file_export').on('switchChange.bootstrapSwitch','input[name="switch1"]', function (e, state) {
      //alert(nav_id);
	  var nav_id = $(this).attr("st_id1"); 

		var status;

		if ($(this).is(":checked")){
			status = 1;
		}else{
			status = 0;
		}
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>admin/blogs/publish_status",
			data:{id:nav_id,status:status},
			success:function (data){
				location. reload(true);
			}

		});  
 });

</script>








<script type="text/javascript">
    $(".menu_icon").on("change",function(){
        var menu_id = $(this).attr("menu_id");
        $("#menu_icon").val(menu_id);
        });
	$(".main_icon").on("change",function(){
		var main_id = $(this).attr("main_id");
		$("#main_icon").val(main_id);
	});

    function archiveFunction(id) {
         //alert(id);
            Swal({
        title: 'Are you sure?',
        text: 'You will not be able to recover this selected blog!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, keep it'
        }).then((result) => {
        if (result.value) {

            Swal(
            'Deleted!',
            'Your Selected Menu has been deleted.',
            'success'
            )
            $.ajax({
                method: 'POST',
                data: {'id' : id },
                url: '<?php echo base_url() ?>admin/blogs/del_blog/'+id,
                success: function(data) {
                    location.reload();   
                }
            });
        
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal(
            'Cancelled',
            'Your Selected Menu is safe :)',
            'success',
            
            )
        }
    })
    }
	
</script>
