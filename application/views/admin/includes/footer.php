<?php $d  = &get_instance(); ?>
</div>
    </div>
    <footer class="footer">
		© 2020 Proxima by utsin.com
	</footer>
	<!-- ============================================================== -->
	<!-- End footer -->
	<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  --> 
   
</div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
   
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<? echo base_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<? echo base_url() ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<? echo base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="<? echo base_url() ?>assets/dist/js/app.min.js"></script>
    <script src="<? echo base_url() ?>assets/dist/js/app.init.mini-sidebar.js"></script>
    <script src="<? echo base_url() ?>assets/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<? echo base_url() ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<? echo base_url() ?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<? echo base_url() ?>assets/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<? echo base_url() ?>assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<? echo base_url() ?>assets/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="<? echo base_url() ?>assets/dist/js/pages/dashboards/dashboard1.js"></script>
    <script src="<? echo base_url() ?>assets/select2/dist/js/select2.full.min.js"></script>
    <script src="<? echo base_url() ?>assets/select2/dist/js/select2.min.js"></script>
    <script src="<? echo base_url() ?>assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<? echo base_url() ?>assets/dist/js/pages/datatable/custom-datatable.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="<? echo base_url() ?>assets/dist/js/pages/datatable/datatable-advanced.init.js"></script>
    <script src="<? echo base_url() ?>assets/summernote/dist/summernote.js"></script>
    <script src="<? echo base_url() ?>assets/js/jasny-bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url();?>assets/sweetalert/sweetalert2.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-switch.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/app-style-switcher.js"></script>
    <script src="<?php echo base_url() ?>assets/pnotify/pnotify.custom.min.js"></script>
    <script>
    var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function() {
                bt()
            }
        }
    }();
    $(document).ready(function() {
        radioswitch.init()
    });
    </script>
</body>

</html>
<script type="text/javascript">

<?php    
if($d->session->flashdata("msg")){
?>
    
$(function(){

new PNotify({
    title: '<?php echo $d->session->flashdata("title");?>',
    text: '<?php echo $d->session->flashdata("msg");?>',
    type:'<?php echo $d->session->flashdata("type");?>',
    animate: {
        animate: true,
        in_class: 'bounceInDown',
        out_class: 'fadeOut'
    }
});     
});

<?php
    }
    ?>
</script>
<script type="text/javascript">  
    $('.summernote').summernote({
		toolbar: [
		['style', ['style']],
		['font', ['bold', 'italic', 'underline', 'clear']],
		['fontname', ['fontname']],
		['color', ['color']],
		['para', ['ul', 'ol', 'paragraph']],
		['height', ['height']],
		['table', ['table']],
		['insert', ['link', 'picture','video', 'hr']],
		['view', ['fullscreen', 'codeview']],
		['help', ['help']],
		[ 'fontsize', [ 'fontsize' ] ],
	  ],
	  height: 350,
	  callbacks: {
			onImageUpload: function(image) {
				
				for (var i = image.length - 1; i >= 0; i--) {
					uploadImage(image[i]);
				}
//				console.log(image);
//				uploadImage(image[0]);
			}
		}		
	});
	
function uploadImage(image) {
    var data = new FormData();
    data.append("files[]", image);
    $.ajax({
        url: "<? echo base_url('admin/blogs/insertImages') ?>",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
//		dataType : "json",
        type: "post",
        success: function(url) {
			
//			console.log(url);
            
//			$( url.images ).each(function( index ) {
				var image = $('<img>').attr('src', url);
				$('.summernote').summernote("insertNode", image[0]);
//			});
			
        },
        error: function(data) {
            console.log(data);
        }
    });
}	

</script>