<section>
    <div class="row">
        <div class="col-md-12">
            <div style="background-color: #f1f1f1;padding: 10px;width:100%">
                <form id="search_job" class="search-form">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="keywords" class="form-control" placeholder="Keywords">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="location" class="form-control" placeholder="Location">
                        </div>
                        <div class="col-md-3">
                            <select name="type" class="form-control">
                                <option value="">All</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Internship">Internship</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Temporary">Temporary</option>
                            </select>
                        </div>
                        <div class="col-md-2 text-right">
                            <input type="submit" name="submit" class="btn btn-primary" value="Search"
                                style="height:40px;font-size: 16px;width:100%;background-color: #203149" />
                        </div>
                    </div>
                </form>
            </div>
            <div style="background-color: #f7f7f7;padding: 10px;width:100%;margin-top:10px;" id="content">

                <!-- <? foreach($jobs as $row){ ?>
                <div class="row">
                    <div class="col-md-1">
                        <img src="<? echo base_url('assets/images/job_icon.png'); ?>" width="100%" />
                    </div>
                    <div class="col-md-6">
                        <h3>
                            <? echo $row->title; ?>
                        </h3>
                    </div>
                    <div class="col-md-4">
                        <h4>
                            <? echo $row->location.", ".$row->type; ?>
                        </h4>
                    </div>
                    <div class="col-md-1 text-right">
                        <button class="btn btn-dark" style="height:30px;font-size: 16px;" data-toggle="collapse"
                            data-target="#c<? echo $row->sno; ?>">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
                <div id="c<? echo $row->sno; ?>" class="collapse" style="background-color:#fff;padding:10px;">
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <h4>Positions</h4>
                            <span class="badge badge-primary">
                                <? echo $row->positions; ?>
                            </span>
                        </div>
                        <div class="col-md-4 text-center">
                            <h4>URL</h4>
                            <span class="badge badge-info">
                                <? echo $row->url; ?>
                            </span>
                        </div>
                        <div class="col-md-4 text-center">
                            <h4>Contact Email</h4>
                            <span class="badge badge-warning">
                                <? echo $row->email; ?>
                            </span>
                        </div>
                        <div class="col-md-2 text-right">
                            <button class="btn btn-danger" style="height:35px !important;font-size:16px"
                                onclick="apply_now('<? echo $row->sno; ?>')">Apply
                                Now</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <? echo $row->long_desc; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <? echo $row->add_info; ?>
                        </div>
                    </div>

                </div>
                <div style="margin-bottom:20px;"></div>
                <? } ?> -->
            </div>
        </div>
    </div>
</section>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" style="background:#fff !important;color:#000 !important">

            <!-- Modal Header -->
            <div class="modal-header" style="padding:10px !important;color:#fff;background:#040404 !important">
                <span style="font-size:18px">Apply Job</span>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <!-- <form action="<? echo base_url(); ?>home/apply_job" method="post" enctype="multipart/form-data"> -->
                <form id="submitJob" enctype="multipart/form-data">
                    <input type="hidden" name="jobid" id="jobid">
                    <div class="row">
                        <div class="col-md-4 search-form">
                            First Name
                            <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="col-md-4 search-form">
                            Last Name
                            <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                        </div>
                        <div class="col-md-4 search-form">
                            Email
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-md-4 search-form">
                            Contact Number
                            <input type="number" name="contact" class="form-control" placeholder="Contact Number"
                                required>
                        </div>
                        <div class="col-md-4 search-form">
                            Current Location
                            <input type="text" name="location" class="form-control" placeholder="Current Location"
                                required>
                        </div>
                        <div class="col-md-4 search-form">
                            Zip code
                            <input type="number" name="zipcode" class="form-control" placeholder="Zip Code" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-md-4 search-form">
                            Relevant Experience
                            <input type="text" name="rexp" class="form-control" placeholder="Relevant Experience"
                                required>
                        </div>
                        <div class="col-md-4 search-form">
                            Total Experience
                            <input type="text" name="texp" class="form-control" placeholder="Total Experience" required>
                        </div>
                        <div class="col-md-4 search-form">
                            Upload Resume
                            <input type="file" name="resume" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-md-12 search-form">
                            Enter Key Skills
                            <textarea name="skills" id="" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px">
                        <div class="col-md-8">
                            <div class="alert alert-danger" id="emsg_error" style="display:none"></div>
                            <div class="alert alert-success" id="smsg_success" style="display:none"></div>
                        </div>
                        <div class="col-md-4 text-right">
                            <input type="submit" name="submit" class="btn btn-danger" value="Apply"
                                style="height:35px;font-size:16px">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
function apply_now(id,email) {
    $("#jobid").val(id);
    $("#myModal").modal('show');
}
$(function() {

    $("#search_job").on('submit', function(e){
        e.preventDefault();
        var fdata = $("#search_job").serialize();
        $.ajax({
            url:"<? echo base_url(); ?>home/search_jobs",
            data:fdata,
            type:"post",
            dataType:"json",
            success: function(data){
                console.log(data);
                $("#content").empty();
                if(data.length > 0){
                    var append = '';
                    data.forEach(element => {
                        append +='<div class="row align-items-center"><div class="col-md-1"><img src="assets/proxima.png" width="60" /></div><div class="col-md-5"><h3>'+element.title+'</h3></div><div class="col-md-3"><h4>'+element.location+'</h4></div><div class="col-md-2"><h4>'+element.type+'</h4></div><div class="col-md-1 text-right"><button class="btn btn-dark" style="height:30px;font-size: 16px;" data-toggle="collapse" data-target="#c'+element.sno+'"><i class="fa fa-arrow-right"></i></button></div></div><div id="c'+element.sno+'" class="collapse" style="background-color:#fff;padding:10px;"><div class="row"><div class="col-md-2 text-center"><h4>Positions</h4><span class="badge badge-primary">'+element.positions+'</span></div><div class="col-md-4 text-center"><h4>URL</h4><span class="badge badge-info">'+element.url+'</span></div><div class="col-md-4 text-center"><h4>Contact Email</h4><span class="badge badge-warning">'+element.email+'</span></div><div class="col-md-2 text-right"><button class="btn btn-danger" style="height:35px !important;font-size:16px" onclick="apply_now('+element.sno+')">Apply Now</button></div></div><div class="row"><div class="col-md-12">'+element.long_desc+'</div></div><div class="row"><div class="col-md-12">'+element.add_info+'</div></div></div><div style="margin-bottom:20px;"></div>';
                    });
                    $("#content").html(append);
                }
            }
        })
    });

    
       
        $.ajax({
            url:"<? echo base_url(); ?>home/get_jobs",
            dataType:"json",
            success: function(data){
                console.log(data.length);
                if(data.length > 0){
                    var append = '';
                    data.forEach(element => {
                        append +='<div class="row align-items-center"><div class="col-md-1"><img src="assets/proxima.png" width="60" /></div><div class="col-md-5"><h3>'+element.title+'</h3></div><div class="col-md-3"><h4>'+element.location+'</h4></div><div class="col-md-2" <h4>'+element.type+'</h4></h4></div><div class="col-md-1 text-right"><button class="btn btn-dark" style="height:30px;font-size: 16px;" data-toggle="collapse" data-target="#c'+element.sno+'"><i class="fa fa-arrow-right"></i></button></div></div><div id="c'+element.sno+'" class="collapse" style="background-color:#fff;padding:10px;"><div class="row"><div class="col-md-2 text-center"><h4>Positions</h4><span class="badge badge-primary">'+element.positions+'</span></div><div class="col-md-4 text-center"><h4>URL</h4><span class="badge badge-info">'+element.url+'</span></div><div class="col-md-4 text-center"><h4>Contact Email</h4><span class="badge badge-warning">'+element.email+'</span></div><div class="col-md-2 text-right"><button class="btn btn-danger" style="height:35px !important;font-size:16px" onclick="apply_now('+element.sno+')">Apply Now</button></div></div><div class="row"><div class="col-md-12">'+element.long_desc+'</div></div><div class="row"><div class="col-md-12">'+element.add_info+'</div></div></div><div style="margin-bottom:20px;"></div>';
                    });
                    $("#content").html(append);
                }
            }
        })
    
    $("#submitJob").on('submit', function(e) {
        e.preventDefault();
        var fdata = new FormData($("#submitJob")[0]);
        $.ajax({
            url: "<? echo base_url(); ?>home/apply_job",
            data: fdata,
            type: "post",
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $("#emsg_error").hide();
                $("#smsg_success").hide();
                console.log(data)
                if (data.Status == 'Success') {
                    $("#smsg_success").show();
                    $("#smsg_success").html(data.Message);
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    $("#emsg_error").show();
                    $("#emsg_error").html(data.Message);
                }
            },
            error: function(jqxhr, txtStatus, error) {
                $("#emsg_error").show();
                $("#emsg_error").html(txtStatus);
                console.log(jqxhr);
            }
        });
    });
})
</script>