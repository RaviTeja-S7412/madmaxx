<?php include('includes/header.php'); ?>

<div class="clearfix"></div>
<section id="banner">
  <div class="container">
    <div class="ban-img"> <img src="<?php echo base_url();?>assets/front/images/banner.jpg" class="img-fluid" /> <div class="ban-text">
		
		<p>RETAIL</p>
		
		<h1>Human Powered Machine Learning for <span>Finance</span> </h1>
		<a href="#"> See what it can do for you.  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i> </a>
		
		
		</div> </div>
  </div>
</section>

	
<section id="cbz">
<div class="container">
<div class="row">
  <div class="col-md-10 offset-1">
    <div class="row ">
              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="content colour-1" >
                  <h2> Retail FP&A Solution</h2>
                  <h3><strong>Enhancing Financial
                    Decisions with Machine
                    Learning.</strong></h3>
                </div>
              </div>
              <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="content12 colour-3"> <div class="leftcorner"></div><div class="rightcorner"></div> 
                   <img src="<?php echo base_url();?>assets/front/images/advino.jpg"  class="img-fluid"/>
                <div class="post_details"><span><a href="#"><img src="<?php echo base_url();?>assets/front/images/arrow.png"/></a></span>
					                    <h2> ADIVINO </h2>
                    <h3> Human Powered Machine Learning for Finance </h3>
                  </div>
                </div>
              </div>
            </div>
  </div>
	</div>
  </div>
</section>	

<section id="quote">
  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-1">
        <h2>“Whether it’s Retail Finance, Merchandising, Planning, or
          Distribution, Every Decision Fundametally relies on
          Accurately Forecasting the Demand for the Products.” </h2>
        <address>
        - Head, Data Science, MIT
        </address>
      </div>
    </div>
  </div>
</section>
<section id="simply">
  <div class="container">
    <div class="simply">
      <div class="row">
        <div class="col-md-9">
          <h1>We Create Solutions that Simplifies Your Retail Operational Landscape </h1>
        </div>
        <div class="col-md-3"><a href="#">
          <button class="btn btn-outline-light btn-lg">Request for consult </button>
          </a> </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</section>

<section id="solutions">
  
</section>


<section id="abt">
  <div class="container abb">
    <div class="row">
      <div class="col-md-10 offset-1">
        <div class="row no-gutters">
          <div class="col-md-5 col-sm-7 col-xs-12 ">
            <div class="" >
              <h2>About Us</h2>
              <p>Proxima360 is a high impact solutions management consulting company. We address critical business needs within the complex retail landscape. Our holistic approach in implementing retail solutions will optimize operations and improve revenue. </p>
              <a href="#"> Check out Our Journey <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a> </div>
          </div>
          <div class="col-md-5 col-sm-5 col-xs-12 offset-2">
            <div class="content12 colour-2"> 
				
	<a href="#" data-toggle="modal"  data-target="#myModal">   <img src="<?php echo base_url();?>assets/front/images/abt-bg.png"  class="img-fluid"/></a>			
				
				
				
			  
	<div class="modal fade" id="myModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
                <!-- 16:9 aspect ratio -->
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/SSqenk1uLLw"   allowscriptaccess="always" allow="autoplay"></iframe>
        </div>
                
        
      </div>

    </div>
  </div>
</div> 
			  </div>
	<!--<a href="#" data-toggle="modal"  data-target="#myModal">   <img src="images/abt-bg.png"  class="img-fluid"/></a>-->		  
			  </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="ceo">
<div class="container">
<div class="row">
  <div class="col-md-5">
    <div class="ceo-bg"> <img src="<?php echo base_url();?>assets/front/images/anil.png"  class="  img-fluid" />
      <blockquote> I believe in offering creative solutions for complex problems to our customers. <span class="pull-right"> <strong>Anil Varghese</strong> <br/>
        <strong>CEO</strong> </span> </blockquote>
      
      
      <div class="clearfix"></div>
      </div>
  </div>
  <div class="col-md-5 offset-1 ">
    <div class="retail">
      <div class="retext">
        <h2>Retail Corner Podcast</h2>
        <h3> Innovation <span>.</span> Entrepreneurs <span>.</span> Technology </h3>
        <a href="#">
        <button class="pro-btn ">Visit Our Podcast</button>
        </a> </div>
      <img src="<?php echo base_url();?>assets/front/images/carlos.png" class="img-fluid" />
      <div class="clearfix"></div>
    </div>
  </div>
	</div></div>
</section>
<section id="blog">
  <div class="container">
    <h1>Proxima360 Publications</h1>
    <div class="row">
    <?php foreach($publications as $pub){ ?>
      <div class="col-md-4">
        <div class="box-item">
          <div class="box-post">
           <span class="label label-success"> <a href="#" rel="tag"><?php echo $pub->title ?></a> </span>
            <h3 class="post-title"> <a href="#"><?php echo $pub->long_description ?> </a> </h3>
            <span class="meta"> <span><i class="glyphicon glyphicon-comment"></i> <a href="#">No Comments</a></span> <span><i class="glyphicon glyphicon-time"></i> <?php echo date("d-m-Y",strtotime($pub->created_date ))?></span> </span> 
          </div>
          <img src="<?php echo base_url(); ?>uploads/publications/<?php echo $pub->image ?>" alt="" class="img-fluid"> 
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>



<?php include('includes/footer.php'); ?>
