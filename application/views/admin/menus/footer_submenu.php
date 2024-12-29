<?php admin_header(); ?>
<?php admin_sidebar(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


             <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0">Sub Menus</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>admin/menus">Menus</a></li>
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
                                <h4 class="card-title">Update Sub Menu</h4>
                            </div>
                            <div class="card-body">
                               
                                <form class="floating-labels mt-4" action="<?php echo base_url() ?>admin/menus/insertsubmenufooter" method="post">
                                   
                                <div class="row">
                                <div class="col-md-4">
                                <div class="form-group mb-5 focused">
                                        <input type="text" class="form-control"  name="sub_menu_name" id="input1" required>
                                        <span class="bar"></span>
                                        <label for="input1">Sub Menu Name</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-5">
                                        <input type="text" class="form-control" name="sub_menu_link" id="input2" required>
                                        <span class="bar"></span>
                                        <label for="input2">Sub Menu Link</label>
                                    </div>
                                    </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-5">
                                        <select class="form-control p-0" id="input6" name="sub_menu_target" required>
                                            <option>Select Target</option>
                                            <option value="_blank">Blank</option>
                                            <option value="_self">Self</option>
                                        </select><span class="bar"></span>
                                        <label for="input6">Target</label>
                                    </div>
                                    </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-5">
                                    <label>Menu Type</label>
                                    <select class="select2 form-control" name="menu_type[]"  multiple="multiple"  style="width: 100%;" required>
                                            <option>Select Menu</option>
                                            <option value="Header">Header</option>
                                             <option value="Footer">Footer</option>
                                        </select>
                                    </div>
                                    </div>
                                <div class="col-md-4">
                                    <input type="hidden" name="menu_id" value="<?php echo $n->id ?>">
                                    <button type="submit" class="btn btn-info">Submit</button>
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
                                            <th>S.No</th>
                                              <th>Name</th>
                                              <th>Sub Menu</th>
                                              <th>Link</th>
                                              <th>Menu type</th>
                                              <th>Header</th>
                                              <th>Footer</th>
                                              <th>Status</th>
                                              <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                  $i = 0;

                                                  foreach ($smenu as $u) {   ?> 
                                                  <?php if($u->deleted==0){ ?>
                                            <tr>
                                            <td><?php echo ++$i ?></td>
                                            <td><?php echo $this->db->get_where("tbl_menu",array("id"=>$u->menu_name))->row()->name ?></td>
                                            <td><?php echo $u->sub_menu_name ?></td>
                                            <td><?php echo $u->sub_menu_link ?></td>
                                            <td><?php echo $u->menu_type ?></td>
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
                                            <td style="padding: 0.5rem;">
                                                   
                                                   <?php if($u->status=="Active"){ ?>
                                               <div class="switch">
                                                   <input type="checkbox" data-on-color="info" nav_id="<?php echo $u->id ?>" name="switch" data-off-color="success" class="check" checked>
                                               </div>
                                                   <?php  }elseif($u->status=="Inactive"){ ?>
                                                <div class="switch">
                                                    <input type="checkbox" nav_id="<?php echo $u->id ?>" data-on-color="info" name="switch" data-off-color="success" class="check">
                                                   <?php } ?> 
                                                </div>    
                                                </td>
                                                <td style="padding: 0.5rem;">
                                                      <a href="<?php echo base_url() ?>admin/menus/updatefootersubmenu/<?php echo $u->id ?>"  rel="tooltip" title="Edit menu">
                                                      <i class="ti-marker-alt"></i></a>
                                              <a href="#" value="<?php echo $u->id ?>" id="<?php echo $u->id ?>" onclick="archiveFunction(this.id)" rel="tooltip" title="Remove" ><i class="ti-trash"></i></a>
                                                      &nbsp;&nbsp;
                                                        <!-- <a href="<?php //echo base_url() ?>menus/child-menu/<?php //echo $u->id ?>"><button class="btn btn-primary btn-sm">Child Menu</button></a> -->

                                                  </td> 
                                            </tr>
                                            <?php } ?>
                                            <?php  
                                            //$i++;
                                            } ?> 
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
    $(".select2").select2();	
    $('.mul-select').selectpicker();
</script>
    <script>
    $("[name='switch']").bootstrapSwitch({size : 'mini'});
    
</script>
<script type="text/javascript">
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
        url: '<?php echo base_url() ?>admin/menus/delsubfooter/'+id,
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

$("input[type='checkbox']").bootstrapSwitch({size : 'mini'});
    
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
			url:"<?php echo base_url();?>admin/menus/footerSubmenustatus",
			data:{id:nav_id,status:status},
			success:function (data){
				location. reload(true);
			}

		});  
 });

</script>