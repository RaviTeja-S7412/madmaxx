<?php admin_header(); ?>
<?php admin_sidebar(); ?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" /> -->


<div class="row page-titles">
    <div class="col-md-5 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">Jobs</h3>
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Job Applications</li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header cheader">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title ctitle"><i class="mdi mdi-apps"></i> Job Applications</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="<? echo base_url(); ?>admin/jobs/add_job" class="btn btn-primary btn-sm"><i
                                    class="mdi mdi-account-plus"></i> ADD JOB</a>
                                    <a href="<? echo base_url(); ?>admin/jobs/" class="btn btn-primary btn-sm"><i
                                    class="mdi mdi-account-plus"></i> VIEW JOBS</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="file_export">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Location</th>
                                    <th>Zipcode</th>
                                    <th>Experience</th>
                                    <th>Total Experience</th>
                                    <th>Skills</th>
                                </tr>
                            </thead>
                            <tbody>
                                <? foreach($applications as $row){?>
                                <tr>
                                    <td style="text-align: center;white-space:nowrap;width:1px">
              <a href="<? echo base_url(); ?>uploads/jobs/<? echo $row->resume; ?>" target="_blank" download><i class="fa fa-download"></i></a>
              | <a href="#" name="delete" value="<?php echo $row->id ?>"
                                            id="<?php echo $row->id ?>" onclick="archiveFunction(this.id)"
                                            data-toggle="tooltip" title="Remove" style="color:red"><i class="ti-trash"></i></a>
                                    </td>
                                    <td>
                                    <? echo date("m-d-Y h:i:s", strtotime($row->applied)); ?>
                                    </td>
                                    <td>
                                        <? echo $row->fname." ".$row->lname; ?>
                                    </td>
                                    <td>
                                        <? echo $row->email; ?>
                                    </td>
                                    <td>
                                        <? echo $row->contact; ?>
                                    </td>
                                    <td>
                                        <? echo $row->location; ?>
                                    </td>
                                    <td style="text-align:center">
                                    <? echo $row->zipcode; ?>
                                    </td>
                                    <td>
                                    <? echo $row->rexp; ?>
                                    </td>
                                    <td>
                                    <? echo $row->texp; ?>
                                    </td>
                                    <td>
                                    <? echo $row->skills; ?>
                                    </td>
                                </tr>
                                <?}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php admin_footer(); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


    <script type="text/javascript">
    // $("#zero_config").dataTable({
    //     dom: 'Bfrtip',
    //     buttons: [
    //     'copy', 'csv', 'excel', 'pdf', 'print'
    // ]
    // });
    $(".menu_icon").on("change", function() {
        var menu_id = $(this).attr("menu_id");
        $("#menu_icon").val(menu_id);
    });
    $(".main_icon").on("change", function() {
        var main_id = $(this).attr("main_id");
        $("#main_icon").val(main_id);
    });


    function archiveFunction(id) {
        Swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this selected item!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.value) {

                Swal(
                    'Deleted!',
                    'Your Selected item has been deleted.',
                    'success'
                )
                $.ajax({
                    method: 'POST',
                    data: {
                        'id': id
                    },
                    url: '<?php echo base_url() ?>admin/jobs/del_resume/' + id,
                    success: function(data) {
                        location.reload();
                    }
                });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal(
                    'Cancelled',
                    'Your Selected item is safe :)',
                    'success',
                )
            }
        })
    }
    </script>