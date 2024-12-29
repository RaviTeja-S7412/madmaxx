<?php
	admin_header();

?>


<?php admin_sidebar(); ?>

			<div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0 text-success">Pages</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/pages">Pages</a></li>
                        <li class="breadcrumb-item active">Create Page</li>
                    </ol>
                </div>
            </div>
              <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        	<div class="card-header bg-info">
                                <h4 class="card-title text-white">Create Page</h4>
                            </div>
								<form action="<?php echo base_url() ?>admin/pages/designPage" method="get">
                               
                                <div class="form-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Page Name</label>
													<input type="text" required="" placeholder="Page Name" value="" name="pname" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Template</label>
                                                    <select class="form-control" name="playout" required> 
                                                    	
                                                    	<option value="">Select Template</option>
                                                    	<option value="solution">Solution</option>
                                                    	<option value="product">Product</option>
                                                    	<option value="sample">Sample</option>
                                                    	
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group has-danger" style="margin-top: 20px">
                                                   
                                                   <button type="submit" id="msubmit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>

                                                </div>
                                            </div>
										 </div>
                       				</div>
								</div>
                        </form>
                      </div> 
		
		</div>
		</div>
	
</div>





<?php admin_footer(); ?>