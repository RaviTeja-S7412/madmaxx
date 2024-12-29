<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<!doctype html>
<html>
<head>
<base href="<? echo base_url() ?>">
<meta charset="utf-8">
<title>Page</title>
<style type="text/css">

	<?php echo $page->css ?>
	
</style>


</head>

<body>

	<?php echo $page->html ?>
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