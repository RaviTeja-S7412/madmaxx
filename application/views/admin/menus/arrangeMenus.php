<?php admin_header(); ?>
<?php admin_sidebar(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


             <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0">Arrange Menus</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Arrange Menus</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">
            <!-- ============================================================== -->
              <!-- Card -->
            <!-- <div class="card"> -->
              
              <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Header Menu</strong>
                        </div>
                        <br>

                         <div id="accordion" role="tablist">
						  <?php
							  $i = 0;			
							  $mmenu = $this->db->like("menu_type","Header")->where("deleted","0")->where("status","Active")->get("tbl_menu")->result_array();
								 foreach ($mmenu as $row) {
						//         echo '<input type="submit" class="mmname" value="'.$row['name'].'" mid="'.$row['id'].'">';

												?>          

						  <div class="card1">
							<div class="card-header" role="tab" id="heading<?php echo $i ?>" style="background-color: antiquewhite;border: 1px solid white">
							  <h5 class="mb-0">
								<a data-toggle="collapse" class="mmname" mid="<?php echo $row['id'] ?>" href="#collapse<?php echo $i ?>" aria-expanded="true" aria-controls="collapse<?php echo $i ?>">
								 <?php echo $row['name'] ?>
								</a>
							  </h5>
							</div>

							<div id="collapse<?php echo $i ?>" class="collapse <?php echo ($i == 0) ? 'show' : '' ?>" role="tabpanel" aria-labelledby="heading<?php echo $i ?>" data-parent="#accordion">
							  <div class="card-body">
								  <div class="myadmin-dd-empty dd mm">
									 <ol class="dd-list listmenu">


									 </ol>
								  </div>

							  </div>
							</div>
						  </div>

						 <?php 
							$i++;
							} ?> 

						</div>

                        <input type="hidden" id="fid" value="<?php echo $mmenu[0]['id'] ?>">

                      
                    </div>
                   </div>
  					
               
               	   <!--<div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Footer Menu</strong>
                        </div>            
                         
                         <br>

                         <div id="accordion1" role="tablist">
						  <?php
							 $i = 10;			
                             $fmenu = $this->db->like("menu_type","Footer")->where("deleted","0")->where("status","Active")->get("tbl_menu")->result_array();
                             foreach ($fmenu as $row) {

						  ?>          
                          <input type="hidden" id="fmid" value="<?php echo $fmenu[0]['id'] ?>">
                          
						  <div class="card1">
							<div class="card-header" role="tab" id="heading<?php echo $i ?>" style="background-color: antiquewhite;border: 1px solid white">
							  <h5 class="mb-0">
								<a data-toggle="collapse" class="fmname" fmid="<?php echo $row['id'] ?>" href="#collapse<?php echo $i ?>" aria-expanded="true" aria-controls="collapse<?php echo $i ?>">
								 <?php echo $row['name'] ?>
								</a>
							  </h5>
							</div>

							<div id="collapse<?php echo $i ?>" class="collapse <?php echo ($i == 0) ? 'show' : '' ?>" role="tabpanel" aria-labelledby="heading<?php echo $i ?>" data-parent="#accordion1">
							  <div class="card-body">
								  <div class="myadmin-dd dd fm">
                                    <ol class="dd-list listfootermenu">
                                        
                                        
                                    </ol>
                                  </div>
							  </div>
							</div>
						  </div>

						 <?php 
							$i++;
							} ?> 

						</div>
                        
                        
                        
                    </div>
                   </div>-->	
               		
                </div>
             
                <input type="hidden" id="base" value="<?php echo base_url(); ?>">
           
            <!-- End Card  -->
    
            
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->




<?php admin_footer(); ?>
<script src="<?php echo base_url();?>assets/dist/sortable/jquery.nestable.js"></script>
<script src="<?php echo base_url();?>assets/dist/sortable/sortable-nestable-footer.js"></script> 
<script src="<?php echo base_url();?>assets/dist/sortable/sortable-nestable.js"></script> 
            <!-- End footer -->

<script>

$( document ).ready(function() {
	
	var id = $("#fid").val();
	
   
    $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/Arrangemenu/get_submenu",
        data:{id:id},
        success:function(d){
            $(".listmenu").html(d);
            //$('.dd').nestable();
            //alert(d);
			
        }
    });
	
});
	

$( document ).ready(function() {
	
	var id = $("#fmid").val();
	
   
    $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/Arrangemenu/get_footer_submenu",
        data:{id:id},
        success:function(d){
            $(".listfootermenu").html(d);
            //$('.dd').nestable();
            //alert(d);
        }
    });
	
});	
	
	
$(".mmname").on("click",function(){
    var id = $(this).attr('mid');
   
    $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/Arrangemenu/get_submenu",
        data:{id:id},
        success:function(d){
            $(".listmenu").html(d);
            //$('.dd').nestable();
            //alert(d);
			console.log(d);
        },
		error : function(data){
			console.log(data);
		}
    });
});
	
	
$(".fmname").on("click",function(){
    var id = $(this).attr('fmid');
   
    $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/Arrangemenu/get_footer_submenu",
        data:{id:id},
        success:function(d){
            $(".listfootermenu").html(d);
            //$('.dd').nestable();
            //alert(d);
        }
    });
});	
 /*var obj = '[{"id":3},{"id":4},{"id":7},{"id":6},{"id":5},{"id":8},{"id":9},{"id":10}]';
    var output = '';
    function buildItem(item){

        var html = "<li class='dd-item' data-id='" + item.id + "'>";
        html += "<div class='dd-handle'>" + item.id + "</div>";

        if (item.children) {

            html += "<ol class='dd-list'>";
            $.each(item.children, function (index, sub) {
                html += buildItem(sub);
            });
            html += "</ol>";

        }

        html += "</li>";

        return html;
    }

    $.each(JSON.parse(obj), function (index, item) {

        output += buildItem(item);

    });

    $('#dd-empty-placeholder').html(output);*/
    //$('#nestable3').nestable();
</script>
<script>
/*$(document).ready(function()
{
    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };
    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    })
    .on('change', updateOutput);
    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));
    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });
});
*/
</script>         