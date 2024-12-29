<!DOCTYPE html>
<html lang="en">
<?php admin_header(); ?>

<body>
<?php admin_sidebar(); ?>
<div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0 text-success">Podcast </h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Podcast Sliders</li>
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
                                        <div class="form-group mb-5 focused">
                                        <input type="file" class="form-control" name="slider"   id="input2" required>
                                        <!-- <input type="hidden" name="old_islider" class="old_slider">
								        <input type="hidden" name="slider_id" class="slider_id"> -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">    
                                        <div class="form-group mb-5">
                                            <input type="text" class="form-control" name="name" id="input3" required>
                                            <span class="bar"></span>
                                            <label for="input3">Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">    
                                        <div class="form-group mb-5">
                                            <input type="text" class="form-control" name="deatils" id="input3" required>
                                            <span class="bar"></span>
                                            <label for="input3">Deatils</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">   
                                    <div class="form-group mb-5">
                                        <label>Short Description</label>
                                            <input type="text" class="form-control p-0" name="short_desc" />
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                    <button type="submit" class="btn btn-info ">Submit</button>
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
                                                <th>Image </th>
                                                <th>Name</th>
                                                <th>Deatils</th>
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
                                            <td> <? if($s->image){ ?><img class="thumbnail" style="height: 80px; width: 120px;" src="<?php echo base_url(); ?><?php echo $s->image ?>" alt=""><? } ?></td>
                                            <td><?php echo $s->name ?></td>
                                            <td><?php echo $s->deatils ?></td>
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