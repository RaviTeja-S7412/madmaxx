<!DOCTYPE html>
<html lang="en">
<?php admin_header(); ?>

<body>
<?php admin_sidebar(); ?>
            <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0 text-success">Team </h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Team</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        	<div class="card-header card-header-primary">
                                <h4 class="card-title text-white">Create Team</h4>
                            </div>
                            <div class="alert alert-success" style="display:none" id="smsg"></div>
                            <div class="alert alert-danger" style="display:none" id="emsg"></div>
                            <div class="card-body">
                                <form class="floating-labels mt-4" action="<?php echo base_url() ?>admin/about/create" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-5 focused">
                                        <input type="file" class="form-control" name="image"   id="input2" required>
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
                                            <input type="text" class="form-control" name="designation" id="input3" required>
                                            <span class="bar"></span>
                                            <label for="input3">Designation</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">   
                                    <div class="form-group mb-5">
                                        <label>LinkdIn</label>
                                            <input type="text" class="form-control p-0" name="linkdin" />
                                    </div>
                                    </div>
                                    <div class="col-md-3">   
                                    <div class="form-group mb-5">
                                        <label>Short Description</label>
                                        <textarea id="w3review" class="form-control p-0" name="short_desc"  rows="4" cols="50"></textarea>
                                    </div>
                                    </div>
                                    <div class="col-md-3">   
                                    <div class="form-group mb-5">
                                        <label>Long Description</label>
                                        <textarea id="w3review" class="form-control p-0" name="long_desc"  rows="4" cols="50"></textarea>
                                    </div>
                                    </div>
                                    <div class="col-md-3">   
										<div class="form-group mb-5">
											<label>Advisor</label>
											<input class="form-control p-0" type="checkbox" name="advisor">
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
                                    <table id="file_export1" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>S.no</th>
                                                <th>Image </th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>short Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <?php  $i = 0;
                                                    foreach ($team as $tm) {  
                                                    if($tm->deleted==0){ 
                                            ?> 
											<tr>
												<td><?php echo ++$i ?></td>
												<td> <? if($tm->image){ ?><img class="thumbnail" style="height: 80px; width: 120px;" src="<?php echo base_url(); ?><?php echo $tm->image ?>" alt=""><? } ?></td>
												<td>
													<?php echo $tm->name ?>
													<input type="hidden" name="module_id[]" id="index1" value="<?php echo $tm->id ?>">
													<input type="hidden" class="sorting" name="sort[]" id="index" value="<?php echo $tm->sorting_order ?>">
												</td>
												<td><?php echo $tm->designation ?></td>
												<td><?php echo $tm->short_desc ?></td>
												<td>
												<?php if($tm->status=="Active"){ ?>
													<div class="togglebutton bt-switch">
														<input type="checkbox" data-on-color="info" s_id="<?php echo $tm->id ?>" class="check"  name="switch" data-off-color="success"  checked>
													</div>
													<?php  }elseif($tm->status=="Inactive"){ ?>
													  <div class="togglebutton bt-switch">
														<label>
														  <input type="checkbox" s_id="<?php echo $tm->id ?>"  data-on-color="info" class="check"  name="switch" data-off-color="success">
														</label>
													  </div>
													  <?php } ?> 
												</td>
												<td>
													<a href="<?php echo base_url() ?>admin/about/edit/<?php echo $tm->id ?>" class="text-inverse pr-2" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a>
													<a href="#" name="delete"  value="<?php echo $tm->id ?>" id="<?php echo $tm->id ?>"  onclick="archiveFunction(this.id)" data-toggle="tooltip" title="Remove"><i class="ti-trash"></i></a>
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
                </div>
<?php admin_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
<script>

	var fixHelperModified = function(e, tr) {
		var $originals = tr.children();
		var $helper = tr.clone();
		$helper.children().each(function(index) {
			$(this).width($originals.eq(index).width())
		});
		return $helper;
	},
	updateIndex = function(e, ui) {
		$('td.index', ui.item.parent()).each(function (i) {
			$(this).html(i+1);
		});
		$('.sorting', ui.item.parent()).each(function (i) {
			$(this).val(i + 1);			
		});
		
		var module_id = $("input[name='module_id[]']").map(function(){return $(this).val();}).get();
		var sort = $("input[name='sort[]']").map(function(){return $(this).val();}).get();
		
		$.ajax({
			type : "post",
			url : "<? echo base_url('admin/about/sort_order') ?>",
			data : {module_id:module_id,sort:sort},
			success : function(data){
				console.log(data);
			},
			error : function(data){
				console.log(data);
			}
		})
		
	};
	$("#file_export1 tbody").sortable({
		helper: fixHelperModified,
		stop: updateIndex
	}).disableSelection();	
	
$("input[type='checkbox']").bootstrapSwitch({size : 'mini'});
$('#file_export1').DataTable({
    dom: 'lBfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ],
});   
$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel, .buttons-page-length').addClass('btn btn-primary mr-1');	
	$('#file_export1').on('switchChange.bootstrapSwitch','input[name="switch"]', function (e, state) {
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
			url:"<?php echo base_url();?>admin/about/status",
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
			text: 'You will not be able to recover this selected team!',
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
					url: '<?php echo base_url() ?>admin/about/del_team/'+id,
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