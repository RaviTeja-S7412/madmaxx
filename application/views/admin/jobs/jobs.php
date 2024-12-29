<?php admin_header(); ?>
<?php admin_sidebar(); ?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" /> -->


<div class="row page-titles">
    <div class="col-md-5 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">Jobs</h3>
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Jobs</li>
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
                            <h4 class="card-title ctitle"><i class="mdi mdi-apps"></i> Jobs</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="<? echo base_url(); ?>admin/jobs/add_job" class="btn btn-primary btn-sm"><i
                                    class="mdi mdi-account-plus"></i> ADD JOB</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="zero_config">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Positions</th>
                                    <th>Location</th>
                                    <th>Posted</th>
                                    <th>Applied</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <? foreach($jobs as $job){?>
                                <tr>
                                    <td>
                                        <?
                                        if($job->status == 'Active'){ ?>
                                        <span class="badge badge-primary">Active</span>
                                        <? }else{ ?>
                                        <span class="badge badge-light">In Active</span>
                                        <? } ?>
                                    </td>
                                    <td>
                                        <? echo $job->title; ?>
                                    </td>
                                    <td>
                                        <? echo $job->type; ?>
                                    </td>
                                    <td>
                                        <? echo $job->positions; ?>
                                    </td>
                                    <td>
                                        <? echo $job->location; ?>
                                    </td>
                                    <td>
                                        <? echo date("m-d-Y h:i:s", strtotime($job->created)); ?>
                                    </td>
                                    <td style="text-align:center">
                                        <a href="<? echo base_url(); ?>admin/jobs/jobById/<? echo $job->sno; ?>"><? echo $job->Total; ?></a>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url() ?>admin/jobs/edit/<?php echo $job->sno ?>"
                                            class="text-inverse pr-2" data-toggle="tooltip" title="Edit"><i
                                                class="ti-marker-alt"></i></a>
                                        <a href="#" name="delete" value="<?php echo $jon->sno ?>"
                                            id="<?php echo $job->sno ?>" onclick="archiveFunction(this.id)"
                                            data-toggle="tooltip" title="Remove"><i class="ti-trash"></i></a>
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
    $("#zero_config").dataTable({
        "order": [[ 5, "desc" ]]
    });
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
                    url: '<?php echo base_url() ?>admin/jobs/del_job/' + id,
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