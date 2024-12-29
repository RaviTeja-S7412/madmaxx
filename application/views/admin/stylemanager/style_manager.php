<?php admin_header(); ?>
<?php admin_sidebar() ?> 


      		<div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0 text-success">Style Manager</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Style Manager</li>
                    </ol>
                </div>
            </div>
              <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

							 <div class="form-body">
                                 <div class="card-body">
                                     <div class="row">
                                      	
                                      <form method="post" action="<?php echo base_url() ?>admin/stylemanager/updateStyle">	
                                     	<div class="col-9">
                        
					                     <textarea rows="15" cols="450" class="form-control" style="width:100%" name="style">
										   <?php
											$sty = 'assets/front/style.css';
											$myfile = fopen($sty, "r+") or die("Unable to open file!");
											echo fread($myfile,filesize($sty));
											fclose($myfile);
										   ?>
					                     </textarea>                                   
						                                   
						                </div>
						                
						                <div class="form-group" style="margin-left: 10px; margin-top: 10px">
                                   			
                                   			<button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary pull-right">Submit</button>
						                	
						                </div>
						                
						              </form>                              
								     </div>
								 </div>
							 </div>
						</div>
					</div>
				</div>
		   </div>

<?php
	
	admin_footer();

?>


   
