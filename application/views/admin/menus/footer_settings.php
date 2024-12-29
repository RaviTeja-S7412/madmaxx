<?php admin_header(); ?>
<?php admin_sidebar(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


             <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0">Menus</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Menus</li>
                    </ol>
                </div>
            </div>
              <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Create Menu</h4>
                            </div>
                            <div class="card-body">
                               
                                <form class="floating-labels mt-4" action="<?php echo base_url() ?>admin/menus/footer_insert" method="post">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-5 focused">
                                            <input type="text" class="form-control" name="name" id="input1" required>
                                            <span class="bar"></span>
                                            <label for="input1">Menu Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">    
                                        <div class="form-group mb-5">
                                            <input type="text" class="form-control" name="link" id="input2" required>
                                            <span class="bar"></span>
                                            <label for="input2">Menu Link</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">     
                                        <div class="form-group mb-5">
                                            <select class="form-control p-0" id="input6" name="target" required>
                                                <option>Select Target</option>
                                                <option value="_blank">Blank</option>
                                                <option value="_self">Self</option>
                                            </select><span class="bar"></span>
                                            <label for="input6">Target</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">     
                                        <div class="form-group mb-5">
                                        <label>Menu Menu</label>
                                        <select class="select2 form-control" name="menu_type[]"  multiple="multiple"  style="width: 100%;" required>
                                                <option>Select Target</option>
                                                <option value="Header">Header</option>
                                                <option value="Footer">Footer</option>
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
                 <!----tables---->
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
                                            <th>Name </th>
                                            <th>Link</th>
                                            <th>Header</th>
                                            <th>Footer</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  $i = 0;
                                                foreach ($header as $u) {  ?> 
                                                <?php if($u->deleted==0){ ?> 
                                            <tr>
                                              <td><?php echo ++$i ?></td>
                                              <td><?php echo $u->name ?></td>
                                              <td><?php echo $u->link ?></td>
                                              <td>
                                              <?php if($u->header=="Active"){ ?>
                                                
                                                    <a href="#" class="badge badge-success">Active </a>
                                                
                                                <?php  }elseif($u->header=="Inactive"){ ?>
                                                    <a href="#" class="badge badge-danger">Inactive </a>
                                                  <?php } ?> 
                                              </td>
                                            </td>
                                            <td>
                                              <?php if($u->footer=="Active"){ ?>
                                                
                                                    <a href="#" class="badge badge-success">Active </a>
                                                
                                                <?php  }elseif($u->footer=="Inactive"){ ?>
                                                    <a href="#" class="badge badge-danger">Inactive </a>
                                                  <?php } ?> 
                                              </td>
                                            </td>
                                              <td>
                                              <?php if($u->status=="Active"){ ?>
                                                <div class="togglebutton bt-switch">
                                                    <input type="checkbox" data-on-color="info" nav_id="<?php echo $u->id ?>" class="check"  name="switch" data-off-color="success"  checked>
                                                </div>
                                                <?php  }elseif($u->status=="Inactive"){ ?>
                                                  <div class="togglebutton bt-switch">
                                                    <label>
                                                      <input type="checkbox" nav_id="<?php echo $u->id ?>"  data-on-color="info" class="check"  name="switch" data-off-color="success">
                                                    </label>
                                                  </div>
                                                  <?php } ?> 
                                              </td>
                                              <td>
                                              <a href="<?php echo base_url() ?>admin/menus/updatefooter/<?php echo $u->id ?>" class="text-inverse pr-2" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i></a>
                                               
                                              <a href="#" name="delete" value="<?php echo $u->id ?>" id="<?php echo $u->id ?>"  onclick="archiveFunction(this.id)" data-toggle="tooltip" title="Remove"><i class="ti-trash"></i></a>
                                             
                                              </td>
                                              <td>
                                                <a href="<?php echo base_url() ?>admin/menus/footer_submenu/<?php echo $u->id ?>"><button class="btn btn-primary btn-sm">Sub Menu</button></a>
                                                </td>
                                                <div class="rename">
                                                <input type="hidden" name="nav_id" rel="<?php echo $u->id ?>" class="nav_id" value="<?php echo $u->id ?>">   
                                                </div>  
                                            </tr>
                                            <?php }  } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
      
<?php admin_footer(); ?> 
<script>
				  
$(".select2").select2();	
	
	
</script>

<script>

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
        // alert(id);
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
                url: '<?php echo base_url() ?>admin/menus/footerdelete/'+id,
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

$("[name='switch']").bootstrapSwitch({size : 'mini'});
    
$('#file_export').on('switchChange.bootstrapSwitch','input[name="switch"]', function (e, state) {
      
	  var nav_id = $(this).attr("nav_id"); 

		var status;

		if ($(this).is(":checked")){
			status = "Active";
		}else{
			status = "Inactive";
		}
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>admin/menus/footerstatus",
			data:{id:nav_id,status:status},
			success:function (data){
				location. reload(true);
			}

		});  
 });

</script>