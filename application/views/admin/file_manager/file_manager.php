<?php admin_header(); ?>

<?php

	$id = $this->uri->segment(3);

?>
<style type="text/css">

	.gal{
	
	
	-webkit-column-count: 4; /* Chrome, Safari, Opera */
    -moz-column-count: 4; /* Firefox */
    column-count: 4;
	  
	
	}
	
	.gal img{ width: 100%; padding: 15px 0;}
	@media (max-width: 1500px) {
		
		.gal {


		-webkit-column-count: 1; /* Chrome, Safari, Opera */
		-moz-column-count: 1; /* Firefox */
		column-count: 1;


		}
		
	}

</style>        
        <!-- ============================================================== -->
<?php admin_sidebar() ?> 
			<div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0 text-success">File Manager</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">File Manager</li>
                    </ol>
                </div>
            </div>
              <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        	<div class="card-header card-header-primary">
                                <h4 class="card-title text-white">File Manager</h4>
                            </div>
                            <div class="card-body">
                
                   			<div class="form-horizontal">
                                <div class="card-body">
                                    <!-- <h4 class="card-title">Employee User</h4> -->
                                    <div class="row">
                                        
                                         <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Images
                                                <div class="input-group">
                                                    
														<input type="file" class="form-control" id="files"  name="files" accept="image/png, image/jpeg, image/jpg" required="" multiple>
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                  
                                        
                                         <div class="col-sm-12 col-lg-3 col-md-3" align="right">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12" style="margin-top: 25px;">
                                                  <div id="uploading">
                                                   <button id="submit" class="btn btn-info waves-effect waves-light" style="width: 100%">Save</button>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                              </div>

					   	</div>
                    </div>
           	 	</div>
          	
          	
          	
          	
            
            	<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                
                				<div class="tab-content br-n pn">
									<div id="navpills-1" class="tab-pane active">
              
										<div class="row el-element-overlay">


							  <?php 


								$img = $this->db->query("select * from tbl_gallery order by id desc")->result();
								if(count($img) >= 1){ 
								foreach ($img as $i) {

							  ?>

									   <div class="col-md-2" id="contents" class="image-wrapper">
											<div class="card">
												<div class="el-card-item" style="margin-bottom: -20px; padding-bottom: 0px;">
													<div class="el-card-avatar el-overlay-1">

													  <img class="img" src="<?php echo base_url().$i->img_name ?>" alt="user" style="width: 100%;text-align: center; height: 120px">
													   <p align="center"><strong><?php echo basename($i->img_name) ?></strong></p>
														<div class="el-overlay">
															<ul class="list-style-none el-info">
																<li class="el-item">

																  <a class="btn default btn-outline btn-sm image-popup-vertical-fit el-link" id="<?php echo $i->id; ?>" onclick="getPdflink(this.id)"><i class="fa fa-eye"></i></a>
																</li>
																<li class="el-item">

																  <a class="btn default btn-outline btn-sm image-popup-vertical-fit el-link" id="<?php echo $i->id; ?>" onclick="editImg(this.id)"><i class="fa fa-edit"></i></a>
																</li>
																<li class="el-item">
																  <a class="btn default btn-outline btn-sm el-link" id="<?php echo $i->id; ?>" onclick="delImg(this.id)"><i class="fa fa-trash"></i></a>
																</li>
															</ul>
														</div>
													</div>

												</div>
											</div>
										</div>

						<?php }} ?>
									 </div>
								   </div>	
						
				
   
										</div>

									</div>

								</div>     
							</div> 

						</div>        
				  </div> 
			   </div>        
                        
            </div>
<?php admin_footer(); ?>

            <!-- End footer -->

 <script>
 	
 $('#submit').click(function(){
  var files = $('#files')[0].files;	 
  var err = $("#files").val();


 if(err==""){
   Swal(
      'Error',
      'Please Select File :)',
      'error'
    );
   return false; 
 }
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
//   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg','pdf']) == -1)
//   {
//     Swal(
//      'Error',
//      'Please Select Valid Image File :)',
//      'error'
//    );
//     return false;
//   }
//   else
//   {
    form_data.append("files[]", files[count]); 
//   }
  }
  if(error == '')
  {
   $.ajax({
    beforeSend:function()
    {
     $('#uploading').html('<button class="btn btn-info waves-effect waves-light" style="width: 100%">Uploading</button>');
    },
    url:"<?php echo base_url(); ?>admin/file_manager/insertImages", //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
   
    success:function(data)
    {
       //$('#uploaded_images').html(data);
    //$('#files').val('');
        Swal(
              'success!',
              'Successfully Uploaded.',
              'success'
            )
         //$("#load").html('<div class="alert alert-success">Successfully Uploaded</div>');
         setTimeout(function(){ location.reload(); }, 2000);
    },
    error:function(data){
        console.log(data);
         //$("#load").html('<div class="alert alert-danger">Error Occured While Uploading Images</div>');
         Swal(
              'Error',
              'Error Occured While Uploading Images :)',
              'error'
            );
         return false;
    }   
   })
  }
  else
  {
   alert(error);
  }
 });
	 
	 
 function editImg(id) {
       Swal({
  title: 'Are you sure?',
  text: 'Selected Changes Will Be Reflected At Front End!',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, Update it!',
  cancelButtonText: 'No, Leave it'
}).then((result) => {
  if (result.value) {

    
    $.ajax({
        method: 'POST',
        data: {'id' : id },
        url: '<?php echo base_url() ?>admin/file_manager/updateImg',
        success: function(data) {
          if(data==1){
            Swal(
              'Disabled!',
              'Your Selected File has been Successfully Disabled.',
              'success'
            )
//            setTimeout(function(){ location.reload(); }, 2000);
            console.log(data);
            return false;
           }
           if(data==2){
            Swal(
              'Enabled!',
              'Your Selected File has been Successfully Enabled.',
              'success'
            )
//            setTimeout(function(){ location.reload(); }, 2000);
            console.log(data);
            return false;
           } 
               
        }
    });
 
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal(
      'Cancelled',
      'Your Selected Image Is Not Updated :)',
      'error'
    )
    console.log(data);
  }
})
    }

function delImg(id) {
       Swal({
  title: 'Are you sure?',
  text: 'Selected File Will Be Permanently Deleted!',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, Delete it!',
  cancelButtonText: 'No, Leave it'
}).then((result) => {
  if (result.value) {

    
    $.ajax({
        method: 'POST',
        data: {'id' : id },
        url: '<?php echo base_url() ?>admin/file_manager/delImg',
        success: function(data) {
          console.log(data);
          if(data==1){
            Swal(
              'Deleted!',
              'Your Selected File has been Successfully Deleted.',
              'success'
            )
            setTimeout(function(){ location.reload(); }, 2000);

            console.log(data);
            return false;
           }
           if(data==0){
            Swal(
              'Error!',
              'Error Occured While Deleting File.',
              'error'
            )
            console.log(data);
            return false;
           } 
               
        }
    });
 
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal(
      'Cancelled',
      'Your Selected File Is Not Deleted :)',
      'error'
    )
  }
})
    }    

	 
function getPdflink(id) {
	
    $.ajax({
        method: 'POST',
        data: {'id' : id },
        url: '<?php echo base_url() ?>admin/file_manager/getPdflink',
        success: function(data) {
          
           if(data==0){
            Swal(
              'Error!',
              'File Not Found.',
              'error'
            )
            return false;
           }else{
			   
			Swal(
              'File Path',
               '<p class="copyLink">'+data+'</p>',
              'success'
            ) 
			   
		   } 
               
        }
    });

    } 	 
	 		 
</script>          