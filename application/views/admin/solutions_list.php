<?php admin_header(); ?>
<?php admin_sidebar(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


             <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0">Subscribers</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Subscribers</li>
                    </ol>
                </div>
            </div>
              <div class="container-fluid">
                <div class="row">
                    
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
                                              <th>Email</th>
                                              <th>Date</th>
                                              <th>Action</th>
                                              </tr>

                                          </thead>
                                          <tbody>
                                        <?php  $i = 0;
                                                foreach ($subscribe as $solu) {  ?> 
                                            <tr>
                                              <td><?php echo ++$i ?></td>
                                              <td><?php echo $solu->email ?></td>
                                              <td><?php echo date("d-m-Y h:i:s a",strtotime($solu->created_date));?></td>

                                              <td>
                                                <a href="#" name="delete"  value="<?php echo $solu->id ?>" id="<?php echo $solu->id ?>"  onclick="archiveFunction(this.id)" data-toggle="tooltip" title="Remove"><i class="ti-trash"></i></a>
                                              </td>
                                            </tr>
                                            <?php }   ?>
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
        text: 'You will not be able to recover this selected Email!',
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
                url: '<?php echo base_url() ?>admin/solutions/del_sub/'+id,
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
