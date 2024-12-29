<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<!doctype html>
<html>
<head>
<base href="<? echo base_url() ?>">
<meta charset="utf-8">
<title>Page</title>
<style type="text/css">


	
</style>


</head>

<body>

<div class="clearfix">
</div>
<section id="inbanner">
  <div class="container">
    <img src="uploads/gallery/proxima360_blog_banner_1504x465.jpg" class="img-fluid"/>
  </div>
</section>
<section id="blog-details" class="padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-sm-7">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div id="single-blog1" class="single-blog blog-details two-column">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-5">
        <div class="sidebar blog-sidebar">
          <div id="post" class="sidebar-item recent">
          </div>
          <div id="categories" class="sidebar-item categories">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>

<? 
$uri = $this->uri->segment(1);
if($uri == "admin"){	  
?>
	<script type="text/javascript">

		$(document).ready(function(){

			$('a').bind("click", function (e) {

				e.preventDefault();

			});

		});

	</script>
<? } ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
 $(document).ready(function(){
  
      $.ajax({
          url:"<?php echo base_url();?>admin/blogs/publish_view",
          type: 'GET',
          dataType: 'JSON',
          data:{ id:'<?php echo $this->uri->segment(4); ?>'},
          success:function (data) {
            $('#single-blog1').html(data.innerblogs);
            console.log(data);
          },
          error:function(data){
            //  / console.log(data); 
          }
      });  
    });
</script>



