<?
$slider = $this->db->get_where("tbl_podcast_slider",array("type"=> "home-banner","status"=>"Active","deleted"=>0))->result(); 
			$html='';
				//$link = str_replace(" ","-",$cat->category);
			$html.= '<div class="container">
			<div id="demo" class="carousel slide" data-ride="carousel" data-interval="4000">
		
		  <ul class="carousel-indicators">';
		    foreach($slider as $k1 => $home_slider1 ){
		        $active = ($k1 == 0) ? 'active' : '';
    			$html.= '<li data-target="#demo" data-slide-to="'.$k1.'" class="'.$active.'"></li>';
		    }
		  	$html.= '</ul>';
		  
	
		  $html.= '<div class="carousel-inner">';
		  foreach($slider as $k => $home_slider ){
			$active = ($k == 0) ? 'active' : '';
		  $html.= '<div class="carousel-item '.$active.'">
			 <div class="ban-img"> <img src="'.$home_slider->image.'" class="img-fluid" />
			  <div class="ban-text">
			  '.$home_slider->short_desc.'
				</div>
			</div>
			</div>';
	     }
		$html.= '</div>
		  
		
		  <a class="carousel-control-prev" href="#demo" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		  </a>
		  <a class="carousel-control-next" href="#demo" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		  </a>
		</div>
			 </div>';
			 
		echo $html;	 