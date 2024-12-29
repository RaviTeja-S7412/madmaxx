<?php admin_header(); ?>
<?php admin_sidebar(); ?>
<style>
.note-editable{
    height:150px !important;
}
</style>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" /> -->


             <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0">Jobs</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Job</li>
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
                                    <h4 class="card-title ctitle"><i class="mdi mdi-account-plus"></i> Edit Job</h4>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a href="<? echo base_url(); ?>admin/jobs/" class="btn btn-primary btn-sm"><i class="mdi mdi-apps"></i> JOBS</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                            <!-- <? print_r($row); ?> -->
                            <form id="createJob">
<div class="row">
    <div class="col-md-4">
        Job Title <span style="color:red">*</span>
        <input type="text" name="title" value="<? echo $row->title; ?>" class="form-control" required/>
    </div>
    <div class="col-md-4">
        Type
        <select name="type" id="type" class="form-control">
            <option value="Full Time">Full Time</option>
            <option value="Freelance">Freelance</option>
            <option value="Internship">Internship</option>
            <option value="Part Time">Part Time</option>
            <option value="Temporary">Temporary</option>
        </select>
    </div>
    <div class="col-md-4">
        Location
        <input type="text" name="location" value="<? echo $row->location; ?>" class="form-control"/>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-4">
        No of Positions <span style="color:red">*</span>
        <input type="number" name="positions" min="1" value="<? echo $row->positions; ?>" class="form-control" required/>
    </div>
    <div class="col-md-4">
        URL
        <input type="text" name="url" value="<? echo $row->url; ?>" class="form-control"/>
    </div>
    <div class="col-md-4">
        Email
        <input type="email" name="email" value="<? echo $row->email; ?>" class="form-control"/>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        Requirement Skills
        <textarea id="long_desc" class="form-control p-0 summernote" name="long_desc"><? echo $row->long_desc; ?></textarea>
    </div>
    <div class="col-md-6">
        Additional Information
        <textarea id="add_info" class="form-control p-0 summernote" name="add_info"><? echo $row->add_info; ?></textarea>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-3">
        <select name="status" id="status" class="form-control">
            <option value="Active">Active</option>
            <option value="InActive">In Active</option>
        </select>
    </div>
    <div class="col-md-6">
        <div class="alert alert-danger" style="display: none" id="emsg"></div>
        <div class="alert alert-success" style="display: none" id="smsg"></div>
    </div>
    <div class="col-md-1">
        <img src="<? echo base_url(); ?>assets/loaders/loader.gif" width="35" id="loader" style="display: none"/>
    </div>
    <div class="col-md-2 text-right">
        <input type="submit" name="submit" class="btn btn-primary" value="UPDATE JOB" id="sbtn"/>
    </div>
</div>
                            </form>
                            </div>
                        </div>
                  </div>
              </div>
                
      
<?php admin_footer(); ?> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


<script type="text/javascript">

$(function(){
    $("#status").val('<? echo $row->status; ?>');
    $("#type").val('<? echo $row->type; ?>');
    $("#createJob").on('submit', function(e){
        e.preventDefault();
        var fdata = $("#createJob").serialize();
        $("#sbtn").prop('disabled', true);
        $.ajax({
            url:"<? echo base_url(); ?>admin/jobs/update/<? echo $row->sno; ?>",
            data:fdata,
            type:"post",
            dataType:"json",
            beforeSend: function(){
                $("#loader").show();
            },
            success: function(data){
                $("#sbtn").prop('disabled', false);
                $("#loader").hide();
                $("#emsg").hide();
                $("#smsg").hide();
                if(data.Status == 'Success'){
                    $("#smsg").show();
                    $("#smsg").html(data.Message);
                    setTimeout(()=>{
                        location.href="<? echo base_url(); ?>admin/jobs/";
                        
                    },2000);
                }
            },
            error: function(jqxhr, txtStatus, error){
                $("#sbtn").prop('disabled', false);
                $("#loader").hide();
                $("#emsg").show();
                $("#emsg").html(txtStatus);
            }
        });

    })
})
$("#zero_config").dataTable();
    $(".menu_icon").on("change",function(){
        var menu_id = $(this).attr("menu_id");
        $("#menu_icon").val(menu_id);
        });
	$(".main_icon").on("change",function(){
		var main_id = $(this).attr("main_id");
		$("#main_icon").val(main_id);
	});
	
</script>