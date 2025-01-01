<?php admin_header(); ?>

<?php admin_sidebar(); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />





             <div class="row page-titles">

                <div class="col-md-5 col-12 align-self-center">

                    <h3 class="text-themecolor mb-0">Settings</h3>

                    <ol class="breadcrumb mb-0 p-0 bg-transparent">

                        <li class="breadcrumb-item"><a href="<?php echo  base_url() ?>admin/dashboard">Home</a></li>

                        <li class="breadcrumb-item active"> Settings</li>

                    </ol>

                </div>

            </div>

            <div class="container-fluid">

                <div class="row">

                    <div class="col-12">

					<div class="card">

          <div class="card-header card-header-primary">

                                <h4 class="card-title">Settings</h4>

                            </div>

                            <div class="card-body">

                                <ul class="nav nav-tabs nav-bordered mb-3 customtab" data-tabs="tabs">

                                    <li class="nav-item">

                                        <a href="#contact" data-toggle="tab" aria-expanded="false" class="nav-link active">

                                            <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>

                                            <span class="d-none d-lg-block">Contact Details</span>

                                        </a>

                                    </li>

                                    <li class="nav-item">

                                        <a href="#profile-b2" data-toggle="tab" aria-expanded="true"

                                            class="nav-link">

                                            <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>

                                            <span class="d-none d-lg-block">Logo</span>

                                        </a>

                                    </li>

                                    <li class="nav-item">

                                        <a href="#settings-b2" data-toggle="tab" aria-expanded="false" class="nav-link">

                                            <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>

                                            <span class="d-none d-lg-block">Social Links</span>

                                        </a>

                                    </li>



                                    <!-- <li class="nav-item">

                                        <a href="#settings-b3" data-toggle="tab" aria-expanded="false" class="nav-link">

                                            <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>

                                            <span class="d-none d-lg-block">Copy Right</span>

                                        </a>

                                    </li>

                                    <li class="nav-item">

                                        <a href="#settings-b4" data-toggle="tab" aria-expanded="false" class="nav-link">

                                            <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>

                                            <span class="d-none d-lg-block">Contact Email</span>

                                        </a>

                                    </li> -->

                                </ul>



                                <div class="tab-content">

                                    <div class="tab-pane show active" id="contact">

										<form id="addeditinstitute" class="floating-labels mt-4" >

											<input type="hidden" id="url" name="url" value="<?php echo base_url("admin/settings/updatecontact"); ?>">

												<div class="row">

													<div class="col-md-3">

														<div class="form-group ">

															<input type="text" class="form-control" name="email"  value="<?php echo $contact->email;?>"   id="input2" >

															<span class="bar"></span>

															<label for="input2">Email</label>

														</div>

													</div>

													<div class="col-md-3">

														<div class="form-group ">

															<input type="text" class="form-control" name="mobile" value="<?php echo $contact->mobile_number; ?>" id="input2" >

															<span class="bar"></span>

															<label for="input2">Mobile Number</label>

														</div>

													</div>
													

													<div class="col-md-4">

														<div class="form-group ">

															<textarea name="details" class="form-control" rows="4" required><?php echo $contact->details;?></textarea>

															<label for="input6">Address</label>

														</div>

													</div>

													<div class="col-md-2">

														<button type="submit" class="btn btn-success" id="msubmit"> <i class="fa fa-check"></i> Update</button>

													</div>

										</form>

											</div>

											</div>

										  <div class="tab-pane" id="profile-b2">

											<form id="fileupload " method="post" action="<?php echo base_url(); ?>admin/settings/imageupload"  enctype="multipart/form-data">

												<div class="row">

													<div class="col-md-3">

														<div class="form-group ">

															<input type="file" class="form-control" name="image"   id="input2" >

														</div>

													</div>

														<input type="hidden" name="old_image" class="old_image">

															<input type="hidden" name="image_id" class="image_id">

													<div class="col-md-2">

														<button type="submit" class="btn btn-success" id="msubmit"> <i class="fa fa-check"></i> Update</button>

													</div>

													<div class="col-lg-3 col-sm-3">

														<img class="thumbnail" style="height: 50px; width: 50px;" src="<?php echo base_url(); ?>uploads/<?php echo $img->option_value ?>" alt="">

													</div>	

											</form>

										</div>

									</div>

                  <div class="tab-pane" id="settings-b2">

										<form id="updatsocial_links" class="floating-labels mt-4" >

												<input type="hidden" id="url1" name="url1" value="<?php echo base_url("admin/settings/updatsocial_links"); ?>">

											<div class="row">

												<!-- <div class="col-md-3">

												<div class="form-group ">

                       <?php   //if (!empty($social->facebook)) { ?>

													 <input type="text" class="form-control" name="facebook"  value="<?php //echo $social->facebook;?>"   id="input2" required>

														<span class="bar"></span>

														<label for="input2">Facebook</label>

                        <?php //} ?>

												</div>

												</div> -->

                        <div class="col-md-3">

													<div class="form-group ">

														<input type="text" name="linkedin" class="form-control" rows="4"  value="<?php echo $social->linkedin;?>">

														<label for="input6">Youtube</label>

													</div>

												</div>

                        <div class="col-md-3">

													<div class="form-group ">

														<input type="text" class="form-control" name="twitter" value="<?php echo $social->twitter;?>" id="input2" >

														<span class="bar"></span>

														<label for="input2">Facebook</label>

													</div>

												</div>

												<div class="col-md-3">

													<div class="form-group ">

														<input type="text" class="form-control" name="instagram" value="<?php echo $social->instagram;?>" id="input2" >

														<span class="bar"></span>

														<label for="input2">Instagram</label>

													</div>

												</div>

											

											

												<div class="col-md-2">

													<button type="submit" class="btn btn-success" id="msubmit"> <i class="fa fa-check"></i> Update</button>

												</div>

											</div>

                    </form>

                </div>

                <div class="tab-pane" id="settings-b3">

										<form id="updatcopy_rights" class="floating-labels mt-4" >

												<input type="hidden" id="url3" name="url3" value="<?php echo base_url("admin/settings/updatecopy_rights"); ?>">

											<div class="row">

												<div class="col-md-3">

													<div class="form-group ">

														<input type="text" class="form-control" name="copy_rights" value="<?php echo $copy_rights->option_value;?>" id="input2" >

														<span class="bar"></span>

														<label for="input2">Copy Rights</label>

													</div>

												</div>

											

											

												<div class="col-md-2">

													<button type="submit" class="btn btn-success" id="msubmit"> <i class="fa fa-check"></i> Update</button>

												</div>

											</div>

                    </form>

                </div>



                <div class="tab-pane" id="settings-b4">

										<form id="contact_email" class="floating-labels mt-4" >

												<input type="hidden" id="url4" name="url4" value="<?php echo base_url("admin/settings/updatecontact_email"); ?>">

											<div class="row">

												<div class="col-md-3">

													<div class="form-group ">

                          <textarea class="form-control p-0" name="contact_email"><?php echo $contact_email->option_value;?></textarea>                                            <span class="bar"></span>



														<!-- <input type="text" class="form-control" name="contact_email" value="<?php //echo $contact_email->option_value;?>" id="input2" > -->

														<span class="bar"></span>

														<label for="input2">Contact Email</label>

													</div>

												</div>

											

											

												<div class="col-md-2">

													<button type="submit" class="btn btn-success" id="msubmit"> <i class="fa fa-check"></i> Update</button>

												</div>

											</div>

                    </form>

                </div>



                

                <div class="tab-pane" id="settings-b5">

										<form id="subscribers" class="floating-labels mt-4" >

												<input type="hidden" id="url5" name="url5" value="<?php echo base_url("admin/settings/updatesubscribers_email"); ?>">

											<div class="row">

												<div class="col-md-3">

													<div class="form-group ">

                          <textarea class="form-control p-0" name="subscribers_email"><?php echo $subscribe->option_value;?></textarea>                                            <span class="bar"></span>



														<!-- <input type="text" class="form-control" name="contact_email" value="<?php //echo $contact_email->option_value;?>" id="input2" > -->

														<span class="bar"></span>

														<label for="input2">Subscribers Email</label>

													</div>

												</div>

											

											

												<div class="col-md-2">

													<button type="submit" class="btn btn-success" id="msubmit"> <i class="fa fa-check"></i> Update</button>

												</div>

											</div>

                    </form>

                </div>









                <div class="tab-pane" id="settings-b6">

                    <form id="like_our_solutions" class="floating-labels mt-4" >

                        <input type="hidden" id="url6" name="url6" value="<?php echo base_url("admin/settings/like_our_solutions"); ?>">

                      <div class="row">

                        <div class="col-md-3">

                          <div class="form-group ">

                          <input class="form-control p-0" type="text" name="like_our_solutions" value="<?php echo $like_our_solutions->option_value;?>">  <span class="bar"></span>



                            <!-- <input type="text" class="form-control" name="contact_email" value="<?php //echo $contact_email->option_value;?>" id="input2" > -->

                            <span class="bar"></span>

                            <!-- <label for="input2">Like Our Solutions?</label> -->

                          </div>

                        </div>

                      

                      

                        <div class="col-md-2">

                          <button type="submit" class="btn btn-success" id="msubmit"> <i class="fa fa-check"></i> Update</button>

                        </div>

                      </div>

                    </form>

                </div>







            </div>



        </div> <!-- end card-body-->

    </div> <!-- end card-->

</div> 

</div>

</div>

</div>

            

                 <!----tables---->

                 

      

<?php admin_footer(); ?> 

<script>

  $(document).ready(function() {

  $("#addeditinstitute").on('submit', function(e){

     e.preventDefault();

     var formData = new FormData(this);

     var url = $('#url').val();

     $.ajax({

      url:url,

      data:formData,

      type:"post",

      dataType:"json",

      cache:false,

	  contentType: false,

	  processData: false,

      beforeSend: function(){

        $("#loader").show();

      },

      success: function(str){

      

        console.log(str);

        $("#loader").hide();

        if(str.Status == 'Active'){

          $("#smsg").show();

          $("#smsg").html(str.Message);

          setTimeout(function(){ location.reload(); }, 1000);  

        }else{

          $("#emsg").show();

          $("#emsg").html(str.Message);

        }

      },

      error: function(str){

          //alert(str);

        console.log(str);

        

      },

      });

  });



   });

</script>

<script>

  $(document).ready(function() {

	 

  $("#updatsocial_links").on('submit', function(e){

//	alert(url);

     e.preventDefault();

     var formData = new FormData(this);

     var url = $('#url1').val();

     $.ajax({

      url:url,

      data:formData,

      type:"post",

      dataType:"json",

      cache:false,

	  contentType: false,

	  processData: false,

      beforeSend: function(){

        $("#loader").show();

      },

      success: function(str){

        //   alert(str);

        console.log(str);

        $("#loader").hide();

        if(str.Status == 'Active'){

          $("#smsg").show();

          $("#smsg").html(str.Message);

          setTimeout(function(){ location.reload(); }, 1000);  

        }else{

          $("#emsg").show();

          $("#emsg").html(str.Message);

        }

      },

      error: function(str){

          //alert(str);

        console.log(str);

        

      },

      });

  });



   });

</script>



<script>

  $(document).ready(function() {

	 

  $("#updatcopy_rights").on('submit', function(e){

//	alert(url);

     e.preventDefault();

     var formData = new FormData(this);

     var url = $('#url3').val();

     $.ajax({

      url:url,

      data:formData,

      type:"post",

      dataType:"json",

      cache:false,

	  contentType: false,

	  processData: false,

      beforeSend: function(){

        $("#loader").show();

      },

      success: function(str){

        //   alert(str);

        console.log(str);

        $("#loader").hide();

        if(str.Status == 'Active'){

          $("#smsg").show();

          $("#smsg").html(str.Message);

          setTimeout(function(){ location.reload(); }, 1000);  

        }else{

          $("#emsg").show();

          $("#emsg").html(str.Message);

        }

      },

      error: function(str){

          //alert(str);

        console.log(str);

        

      },

      });

  });



   });

</script>



<script>

  $(document).ready(function() {

	 

  $("#contact_email").on('submit', function(e){

//	alert(url);

     e.preventDefault();

     var formData = $(this).serialize();

     var url = $('#url4').val();

     $.ajax({

      url:url,

      data:formData,

      type:"post",

      dataType:"json",

      beforeSend: function(){

        $("#loader").show();

      },

      success: function(str){

        //   alert(str);

        console.log(str);

        $("#loader").hide();

        if(str.Status == 'Active'){

          $("#smsg").show();

          $("#smsg").html(str.Message);

          setTimeout(function(){ location.reload(); }, 1000);  

        }else{

          $("#emsg").show();

          $("#emsg").html(str.Message);

        }

      },

      error: function(str){

          //alert(str);

        console.log(str);

        

      },

      });

  });



   });



   $(document).ready(function() {

	 

   $("#subscribers").on('submit', function(e){

 //	alert(url);

      e.preventDefault();

      var formData = new FormData(this);

      var url = $('#url5').val();

      $.ajax({

       url:url,

       data:formData,

       type:"post",

       dataType:"json",

       cache:false,

     contentType: false,

     processData: false,

       beforeSend: function(){

         $("#loader").show();

       },

       success: function(str){

         //   alert(str);

         console.log(str);

         $("#loader").hide();

         if(str.Status == 'Active'){

           $("#smsg").show();

           $("#smsg").html(str.Message);

           setTimeout(function(){ location.reload(); }, 1000);  

         }else{

           $("#emsg").show();

           $("#emsg").html(str.Message);

         }

       },

       error: function(str){

           //alert(str);

         console.log(str);

         

       },

       });

   });

 

    });





   $(document).ready(function() {

   

   $("#subscribers").on('submit', function(e){

 // alert(url);

      e.preventDefault();

      var formData = new FormData(this);

      var url = $('#url5').val();

      $.ajax({

       url:url,

       data:formData,

       type:"post",

       dataType:"json",

       cache:false,

     contentType: false,

     processData: false,

       beforeSend: function(){

         $("#loader").show();

       },

       success: function(str){

         //   alert(str);

         console.log(str);

         $("#loader").hide();

         if(str.Status == 'Active'){

           $("#smsg").show();

           $("#smsg").html(str.Message);

           setTimeout(function(){ location.reload(); }, 1000);  

         }else{

           $("#emsg").show();

           $("#emsg").html(str.Message);

         }

       },

       error: function(str){

           //alert(str);

         console.log(str);

         

       },

       });

   });

 

    });







$(document).ready(function() {

   

   $("#like_our_solutions").on('submit', function(e){

  // alert(url);

      e.preventDefault();

      var formData = new FormData(this);

      var url = $('#url6').val();

      $.ajax({

       url:url,

       data:formData,

       type:"post",

       dataType:"json",

       cache:false,

     contentType: false,

     processData: false,

       beforeSend: function(){

         $("#loader").show();

       },

       success: function(str){

         //   alert(str);

         console.log(str);

         $("#loader").hide();

         if(str.Status == 'Active'){

           $("#smsg").show();

           $("#smsg").html(str.Message);

           setTimeout(function(){ location.reload(); }, 1000);  

         }else{

           $("#emsg").show();

           $("#emsg").html(str.Message);

         }

       },

       error: function(str){

           //alert(str);

         console.log(str);

         

       },

       });

   });

 

    });















</script>