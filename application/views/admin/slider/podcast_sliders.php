<!DOCTYPE html>
<html lang="en">
<?php admin_header(); ?>

<body>
<?php admin_sidebar(); ?>
<div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0 text-success">Sliders </h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active"> Sliders</li>
                    </ol>
                </div>
            </div>
              <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        	<div class="card-header card-header-primary">
                                <h4 class="card-title text-white">Create Sliders</h4>
                            </div>
                            <div class="alert alert-success" style="display:none" id="smsg"></div>
                            <div class="alert alert-danger" style="display:none" id="emsg"></div>
                            <div class="card-body">
                                <form class="floating-labels mt-4" action="<?php echo base_url() ?>admin/podcast/add" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-3">     
                                                <div class="form-group mb-5">
                                                <label>Type</label>
                                                <select class="form-control p-0" name="types" id="types"   style="width: 100%;" >
                                                        <option>Select Types</option>
                                                        <option value="home-banner">Home Banner</option>
                                                        <option value="featured-guests">Featured Guests</option>
                                                        <option value="host">Host</option>
                                                    </select>
                                                </div>
                                                </select>
                                                <span class="bar"></span>
                                            </div>
                                            <div class="col-md-3">     
                                                <div class="form-group">
                                                <label>Page Name</label>
                                                    <select class="form-control p-0" name="page_name"  style="width: 100%;" required>
                                                        <option>Select Page</option>
                                                            <?php 
                                                                $pages = $this->db->group_by("page_name")->where("deleted",0)->get("tbl_pages")->result(); 
                                                                foreach($pages as $pages){
                                                            ?>
                                                        <option value="<?php echo $pages->page_name ?>"><?php echo $pages->page_name ?></option>
                                                        <?php }?> 
                                                    </select>
                                                    <span class="bar"></span>
                                                </div>
                                            </div>
                                         
                                            <div class="col-md-3 ">
                                                    <div class="form-group mb-5 focused image">
                                                        <input type="file" class="form-control" name="image" id="input1" >
                                                        <span class="bar"></span>
                                                        <!-- <label for="input1">Banner Image</label> -->
                                                    </div>
                                                    
                                            </div>
                                                 <div class="col-md-3 featured-guests"  style='display:none;' >
                                                    <div class="form-group mb-5 focused">
                                                        <textarea class="form-control p-0 " name="desingnation" rows="4" cols="50" ></textarea>
                                                        <span class="bar"></span>
                                                        <label for="input1">Name & Desingnation </label>
                                                    </div>
                                            </div>
                                         <div class="col-md-3 featured-guests"  style='display:none;' >
                                                    <div class="form-group mb-5 focused">
                                                    <input type="text" class="form-control p-0"  name="button_name">
                                                        <span class="bar"></span>
                                                        <label for="input1">Button Name</label>
                                                    </div>
                                            </div> 
                                            <div class="col-md-3 featured-guests"  style='display:none;' >
                                                    <div class="form-group mb-5 focused">
                                                    <input type="text" class="form-control p-0"  name="link" >
                                                        <span class="bar"></span>
                                                        <label for="input1">Link</label>
                                                    </div>
                                            </div>
                                            <div class="col-md-3 featured-guests"  style='display:none;' >
                                                    <div class="form-group mb-5 focused">
                                                    <select class="form-control p-0" id="input6" name="target" required>
                                                 <option>Select Target</option>
                                                 <option value="_blank">Blank</option>
                                                 <option value="_self">Self</option>
                                                    </select><span class="bar"></span>
                                                    <label for="input6">Target</label>
                                                    </div>
                                             </div>
                                            <div class="col-md-12 "  id="short_desc">
                                            <label for="input1">Description</label>
                                                    <div class="form-group mb-5 " >
                                                    <textarea class="form-control p-0 summernote"   name="short_desc"  rows="4" cols="50"></textarea>
                                                        <span class="bar"></span>
                                                        
                                                    </div>
                                            </div>
                                       
                                            <div class="col-md-3">
                                            <button type="submit" class="btn btn-info ">Submit</button>
                                            </div>
                                        </div>
                                </form>
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
                                                <th>Type </th>
                                                <th>Page Names</th>
                                                <th>Image </th>
                                                <th>Name & Desingnation </th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  $i = 0;
                                                    foreach ($slider as $s) {  
                                                    if($s->deleted==0){ 
                                            ?> 
                                        <tr>
                                            <td><?php echo ++$i ?></td>
                                            <td><?php echo $s->type ?></td>
                                            <td><?php echo $s->page_name ?></td>
                                            <td> <? if($s->image){ ?><img class="thumbnail" style="height: 80px; width: 120px;" src="<?php echo base_url(); ?><?php echo $s->image ?>" alt=""><? } ?></td>
                                            <td><?php echo $s->name ?></td>
                                            <td>
                                                <?php if($s->status=="Active"){ ?>
                                                <div class="togglebutton bt-switch">
                                                    <input type="checkbox" data-on-color="info" s_id="<?php echo $s->id ?>" class="check"  name="switch" data-off-color="success"  checked>
                                                </div>
                                                <?php  }elseif($s->status=="Inactive"){ ?>
                                                  <div class="togglebutton bt-switch">
                                                    <label>
                                                      <input type="checkbox" s_id="<?php echo $s->id ?>"  data-on-color="info" class="check"  name="switch" data-off-color="success">
                                                    </label>
                                                  </div>
                                                  <?php } ?> 
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() ?>admin/podcast/edit/<?php echo $s->id ?>" class="text-inverse pr-2" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a>
                                                <a href="#" name="delete"  value="<?php echo $s->id ?>" id="<?php echo $s->id ?>"  onclick="archiveFunction(this.id)" data-toggle="tooltip" title="Remove"><i class="ti-trash"></i></a>
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
                    </div>



<?php admin_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>

$("input[type='checkbox']").bootstrapSwitch({size : 'mini'});
    
$('#file_export').on('switchChange.bootstrapSwitch','input[name="switch"]', function (e, state) {
      //alert(nav_id);
	  var nav_id = $(this).attr("s_id"); 
		var status;
		if ($(this).is(":checked")){
			status = "Active";
		}else{
			status = "Inactive";
		}   
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>admin/podcast/status",
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
        text: 'You will not be able to recover this selected menu!',
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
                url: '<?php echo base_url() ?>admin/podcast/del_slider/'+id,
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
<script>
$('#types').on('change', function () {
    if (this.value == 'home-banner') {
        $(".banner").show();
        $("#short_desc").show();
       
    } else {
        $(".banner").hide();
        
    }

});
$('#types').on('change', function () {
    if (this.value == 'featured-guests') {
     
        $(".featured-guests").show();
        $("#short_desc").show();
    } else {
       
        $(".featured-guests").hide();
    }

});
$('#types').on('change', function () {
    if (this.value == 'host') {
     
        $("#host").show();
        $("#short_desc").hide();
    } else {
       
        $("#host").hide();
       
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
