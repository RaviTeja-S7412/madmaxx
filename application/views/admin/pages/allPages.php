<!DOCTYPE html>
<html lang="en">
<?php admin_header(); ?>

<body>
<?php admin_sidebar(); ?>
			<div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0 text-success">Pages</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Pages</li>
                    </ol>
                </div>
            </div>
              <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        	<div class="card-header card-header-primary">
                                <h4 class="card-title text-white">All Pages</h4>
                            </div>
                            <div class="card-body">

                               	<a href="<?php echo base_url() ?>admin/pages/createPage"><button type="button" class="btn btn-primary" style="margin-bottom: 10px">Add New Page</button></a>
			  		
                                <div class="table-responsive">
                                    <table class="table product-overview table-striped" id="zero_config">
                                     
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
												<th>Page Name</th>
												<th>Route</th>
												<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
												$i = 0;
												$pages = $this->db->query("select * from tbl_pages where deleted=0 order by id desc")->result();
												foreach($pages as $p){
											?>
                                            <tr>
                                                <td><?php echo ++$i ?></td>
												<td><?php echo $p->page_name ?></td>
												<td><?php echo $p->route ?></td>
												<td>
													<a href="<?php echo base_url() ?>admin/pages/editPage/<?php echo $p->id ?>"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></button></a>
													<a href="<?php echo base_url() ?>admin/pages/viewPage/<?php echo $p->route ?>" target="_blank"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button></a>
													
												<?php 
													if($p->page_name != "home"){
													?>
													<a href="#" id="<?php echo $p->id ?>" onclick="delPage(this.id)"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>	
												<?php } ?>	
													
												</td>
                                            </tr>
                                        <?php } ?>
 
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
	</div>

</div>

</body>
</html>
<?php admin_footer(); ?>


<script type="text/javascript">

$("#zero_config").dataTable();

	
//$(function () {
//    $('#zero_config').editableTableWidget();
//});	

</script>

<script type="text/javascript">




function delPage(id) {
Swal({
  title: 'Are you sure?',
  text: 'You will not be able to recover this selected page!',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, keep it'
}).then((result) => {
  if (result.value) {

    Swal(
      'Deleted!',
      'Your Selected Page has been deleted.',
      'success'
    )
    $.ajax({
        method: 'POST',
        data: {'id' : id },
        url: '<?php echo base_url() ?>admin/pages/delPage/'+id,
        success: function(data) {
            location.reload();
            console.log(data);   
        }
    });
 
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal(
      'Cancelled',
      'Your Selected Page is safe :)',
      'success',
      
    )
  }
})

}
</script>

