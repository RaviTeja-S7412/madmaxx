<!DOCTYPE html>
<html lang="en">
<?php admin_header(); ?>

<body>
<?php admin_sidebar(); ?>
<div class="row page-titles">
    <div class="col-md-5 col-12 align-self-center">
        <h3 class="text-themecolor mb-0 text-success">Category </h3>
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Category</li>
        </ol>
    </div>
</div>
<?php if ($this->session->flashdata('smsg')) : ?>
                <?php echo '<div class="alert alert-success icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled">×</i>
                </button>
                <p><strong>Success! &nbsp;&nbsp;</strong>' . $this->session->flashdata('smsg') . '</p></div>'; ?>
            <?php endif; ?>
            <?php if ($this->session->flashdata('emsg')) : ?>
                <?php echo '<div class="alert alert-danger icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Error! &nbsp;&nbsp;</strong>' . $this->session->flashdata('emsg') . '</p></div>'; ?>
            <?php endif; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title text-white">Create Category</h4>
                </div>
                <div class="alert alert-success" style="display:none" id="smsg"></div>
                <div class="alert alert-danger" style="display:none" id="emsg"></div>
                <div class="card-body">
                    <form class="floating-labels mt-4" action="<?php echo base_url() ?>admin/blogs/createCategory" method="post" enctype="multipart/form-data">
                    <div class="row">
                        
                       
                        <div class="col-md-3">    
                            <div class="form-group mb-5">
                                <input type="text" class="form-control" name="categories" id="input3" required>
                                <span class="bar"></span>
                                <label for="input3">Category</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                        <button type="submit" class="btn btn-info ">Submit</button>
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
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php  $i = 0;
                                        foreach ( $category as $cat) {  
                                        if( $cat->deleted==0){ 
                                    ?> 
                                <tr>
                                    <td><?php echo ++$i ?></td>
                                    <td><?php echo  $cat->category ?></td>
                                    <td>
                                        <?php if( $cat->status=="Active"){ ?>
                                            <div class="togglebutton bt-switch">
                                                <input type="checkbox" data-on-color="info" st_id="<?php echo  $cat->id ?>" class="check"  name="switch" data-off-color="success"  checked>
                                            </div>
                                            <?php  }elseif( $cat->status=="Inactive"){ ?>
                                                <div class="togglebutton bt-switch">
                                                <label>
                                                    <input type="checkbox" st_id="<?php echo  $cat->id ?>"  data-on-color="info" class="check"  name="switch" data-off-color="success">
                                                </label>
                                                </div>
                                        <?php } ?> 
                                    </td>
                                        <td>
                                        <a href="javascript:void(0)" class="text-inverse p-r-10 update_user_button" category="<? echo  $cat->category ?>" tid="<? echo  $cat->id ?>"><i class="ti-marker-alt"></i></a>
                                            &nbsp;&nbsp;
                                            <a href="#" name="delete"  value="<?php echo $cat->id ?>" id="<?php echo $cat->id ?>"  onclick="archiveFunction(this.id)" data-toggle="tooltip" title="Remove"><i class="ti-trash"></i></a>                                        </td>
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


    <div class="modal fade" id="updateModal" role="dialog">
            <div class="modal-dialog">
                <form id="addeditinstitute_update">
                    <div class="modal-content">
                        <div class="alert alert-success" style="display:none" id="smsg"></div>
                        <div class="alert alert-danger" style="display:none" id="emsg"></div>
                        <div class="modal-header">

                          

                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
						<h6 class="modal-title text-center fw-bold">Update Category</h6>
                        <div class="modal-body">

                            <input type="hidden" id="url2" name="url"
                                value="<?php echo base_url('admin/blogs/createCategory');?>">
                            <input type="hidden" class="tid" name="tid">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control categories" name="categories" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Update</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
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
			url:"<?php echo base_url();?>admin/blogs/cat_status",
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
        text: 'You will not be able to recover this selected categort!',
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
                url: '<?php echo base_url() ?>admin/blogs/del_cat/'+id,
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

<script type="text/javascript">

$(document).ready(function() {
    $(".update_user_button").click(function() {
        $(".categories").val($(this).attr('category'));
        $(".tid").val($(this).attr('tid'));
        $("#updateModal").modal();
    });
});

//form submit////////////////////////////////


$(document).ready(function() {
    $("#addeditinstitute_update").on('submit', function(e) {
        
        e.preventDefault();
        var formData = new FormData(this);
        var url = $('#url2').val();
        $.ajax({
            url: url,
            data: formData,
            type: "post",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader").show();
            },
            success: function(str) {
                console.log(str);
                $("#loader").hide();
                if (str.Status == 'Active') {
                    $("#smsg").show();
                    $("#smsg").html(str.Message);
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    $("#emsg").show();
                    $("#emsg").html(str.Message);
                }
            }
        });
    });

});


</script>