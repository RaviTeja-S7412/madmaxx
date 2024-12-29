<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<?php
	$id  = $this->uri->segment(1);
	
	if($id == "search"){
		
		echo "<title>Search Results</title>";
		
	}elseif($id == "inner-blog"){
		
		$this->db->where("blog_link",$this->input->get("blog"));
		$inner = $this->db->where("status","Active")->get("tbl_blog")->row();
		echo '<title>'.$inner->meta_title.'</title>';
		echo '<meta name="description" content="'.$inner->meta_description.'">
		<meta name="keywords" content="'.$inner->meta_keywords.'">';
		
	}elseif($id == "sitemap"){
		
		echo "<title>Sitemap | Freedom Bank of Virginia</title>";
		echo '<meta name="description" content="Visit Freedom Bank sitemap to quickly find what you are looking for on our website.">
		<meta name="keywords" content="freedom bank of Virginia, sitemap, site map">';
		
	}elseif($id == "covid-19"){
		
		echo "<title>covid-19</title>";
		
	}elseif($page->meta_title){  
		
?>

  <meta charset="UTF-8">
  <meta name="description" content="<?php echo $page->meta_description  ?>">
  <meta name="keywords" content="<?php echo $page->meta_keyword ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--  <meta name="author" content="<?php //echo $page->meta_title ?>">-->
  <title><?php echo $page->meta_title ?></title>
<?php }else{ ?>

	<title>Welcome to Proxima360</title>

<? } ?>

<link rel="icon" type="image/png" sizes="16x16" href="<? echo base_url() ?>assets/front/proxima.png">
<link href="<? echo base_url() ?>assets/front/style.css" rel="stylesheet">
<link href="<? echo base_url() ?>assets/front/css/asmenu.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!--<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet"  href="<? echo base_url() ?>assets/front/css/styles.css" media="all" />
<link src="<? echo base_url('assets/front/fonts/Proximanova-webfont-kit-Proxima360/Proximanova-webfont-kit-Proxima360.css') ?>">

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

<script> (function(ss,ex){ window.ldfdr=window.ldfdr||function(){(ldfdr._q=ldfdr._q||[]).push([].slice.call(arguments));}; (function(d,s){ fs=d.getElementsByTagName(s)[0]; function ce(src){ var cs=d.createElement(s); cs.src=src; cs.async=1; fs.parentNode.insertBefore(cs,fs); }; ce('https://sc.lfeeder.com/lftracker_v1_'+ss+(ex?'_'+ex:'')+'.js'); })(document,'script'); })('DzLR5a5E3OYaBoQ2'); </script>

<!-- Snitcher analytics code -->
<script>
    !function(s,n,i,t,c,h){s.SnitchObject=i;s[i]||(s[i]=function(){
    (s[i].q=s[i].q||[]).push(arguments)});s[i].l=+new Date;c=n.createElement(t);
    h=n.getElementsByTagName(t)[0];c.src='//snid.snitcher.com/8416062.js';
    h.parentNode.insertBefore(c,h)}(window,document,'snid','script');
       
    snid('verify', '8416062');
</script>

<script>
    (function (w, d, t) {
        _ml = w._ml || {};
        _ml.eid = '81430';
        _ml.cid = '2edfb16e-a9d3-4862-b02b-ddb26636fc4d';
        var s, cd, tag; s = d.getElementsByTagName(t)[0]; cd = new Date();
        tag = d.createElement(t); tag.async = 1;
        tag.src = 'https://ml314.com/tag.aspx?' + cd.getDate() + cd.getMonth();
        s.parentNode.insertBefore(tag, s);
    })(window, document, 'script');

</script>

<script type="text/javascript">
_linkedin_partner_id = "3765482";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
(function(l) {
if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])};
window.lintrk.q=[]}
var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})(window.lintrk);
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=3765482&fmt=gif" />
</noscript>


<? $uri = $this->uri->segment(1); ?>

<style>
  .page-loader-wrapper {
    z-index: 99999999;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: #eee;
    overflow: hidden;
    text-align: center;
    display : <? echo ($uri == "") ? 'block' : 'none' ?>;
}

.page-loader-wrapper .loader {
    position: relative;
    top: calc(40% - 30px);
}


.rotate {
  animation: rotation 4s infinite linear;
}

@keyframes rotation {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(359deg);
  }
}

.modal-dialog {
    max-width: 800px;
    margin: 30px auto;
}
.modal-body {
    position: relative;
    padding: 0px;
}
.close {
    position: absolute;
    right: -30px;
    top: 0;
    z-index: 999;
    font-size: 2rem;
    font-weight: normal;
    color: #fff;
    opacity: 1;
}
.logo {
    margin-top: 20px;
}
.social {
    float: right;
    padding-top: 34px;
}
.social ul li {
    display: inline;
    padding: 0px 5px;
}
.social ul li a {
    color: #333;
}
.social ul li a:hover {
    color: red;
}

.logo {
    margin-top: 20px;
}
.modal {
    text-align: left;
}
.modal-content {
    border: none!important;
    border-radius: 2px!important;
    box-shadow: 0 16px 28px 0 rgba(0,0,0,0.22), 0 25px 55px 0 rgba(0,0,0,0.21)!important;
    background-color: #06062d!important;
    color: #fff;
}
.modal-header {
    border-bottom: 0 !important;
    padding-top: 15px !important;
    padding-right: 26px!important;
    padding-left: 26px!important;
    padding-bottom: 0px!important;
}
.modal-title {
    font-size: 34px;
}
.modal-body {
    border-bottom: 0!important;
    padding-top: 5px!important;
    padding-right: 26px!important;
    padding-left: 26px!important;
    padding-bottom: 10px!important;
    font-size: 15px!important;
}
.close {
    float: right;
    font-size: 1.9rem;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-shadow: 0 1px 0 #fff;
    opacity: .9;
}
.fade-scale {
    transform: scale(0);
    opacity: 0;
    -webkit-transition: all .25s linear;
    -o-transition: all .25s linear;
    transition: all .25s linear;
}
.fade-scale.in {
    opacity: 1;
    transform: scale(1);
}
.fade-scale .modal-dialog {
    position: absolute;
    left: 0;
    right: 0;
    top: 50%;
    transform: translateY(-50%) !important;
}
.team-border {
    border-left: solid 2px #f80000;
    padding-left: 15px;
}
.team-border .member-name, .team-border .member-job {
    color: #f80000!important;
    font-weight: 600;
}
.modal-body a {
    padding: 7px 0px 0px 13px;
    background: #f80000!important;
    color: #ffffff!important;
    width: 37px;
    height: 37px;
    border-radius: 50px;
    display: inline-block;
}
.modal-body p {
    padding: 20px 0px;
}





.modal-content {
    border: none!important;
    border-radius: 2px!important;
    box-shadow: 0 16px 28px 0 rgba(0,0,0,0.22), 0 25px 55px 0 rgba(0,0,0,0.21)!important;
    background-color: #06062d!important;
    color: #fff;
}
.modal-header {
    border-bottom: 0 !important;
    padding-top: 15px !important;
    padding-right: 26px!important;
    padding-left: 26px!important;
    padding-bottom: 0px!important;
}
.modal-title {
    font-size: 34px;
}
.modal-body {
    border-bottom: 0!important;
    padding-top: 5px!important;
    padding-right: 26px!important;
    padding-left: 26px!important;
    padding-bottom: 10px!important;
    font-size: 15px!important;
}
.close {
    float: right;
    font-size: 1.9rem;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-shadow: 0 1px 0 #fff;
    opacity: .9;
}
.fade-scale {
    transform: scale(0);
    opacity: 0;
    -webkit-transition: all .25s linear;
    -o-transition: all .25s linear;
    transition: all .25s linear;
}
.fade-scale.in {
    opacity: 1;
    transform: scale(1);
}
.fade-scale .modal-dialog {
    position: absolute;
    left: 0;
    right: 0;
    top: 50%;
    transform: translateY(-50%) !important;
}
.team-border {
    border-left: solid 2px #f80000;
    padding-left: 15px;
}
.team-border .member-name, .team-border .member-job {
    color: #f80000!important;
    font-weight: 600;
}
.modal-body a {
    padding: 7px 0px 0px 13px;
    background: #f80000!important;
    color: #ffffff!important;
    width: 37px;
    height: 37px;
    border-radius: 50px;
    display: inline-block;
}



/*blog deatils */
.logo {
    margin-top: 20px;
}
	.nav {
    display: -ms-flexbox;
    display: block;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}
	/* Social share widget */

.ssbats-social-share {
  display: flex;
  align-content: center;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: wrap;
}

.ssbats-social-share-label {
  margin-right: 14px;
  font-weight: 700;
}

.ssbats-social-share-buttons a {
  display: inline-block;
  color: #333333;
  background-color: #ffffff;
  text-decoration: none;
  font-size: 14px;
  font-weight: 400;
  border: 1px solid #999999;
  padding: 2px 10px;
  border-radius: 4px;
  margin: 5px 5px 5px 0;
  cursor: pointer;
  box-shadow: 1px 1px 2px rgba(0,0,0,.25);
  transition: 150ms ease-in-out;
}

.ssbats-social-share-buttons a span:before {
  content: '';
  width: 14px;
  height: 14px;
  display: inline-block;
  font-weight: 400;
  margin-right: 5px;
  margin-bottom: -1px;
  background-repeat: none;
  filter: invert(100%) brightness(20%);
  transition: 150ms ease-in-out;
}

.ssbats-social-share-buttons a.ssbats-share-facebook span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/facebook.svg');
}

.ssbats-social-share-buttons a.ssbats-share-twitter span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/twitter.svg');
}

.ssbats-social-share-buttons a.ssbats-share-linkedin span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/linkedin.svg');
}

.ssbats-social-share-buttons a.ssbats-share-pinterest span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/pinterest.svg');
}

.ssbats-social-share-buttons a.ssbats-share-tumblr span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/tumblr.svg');
}

.ssbats-social-share-buttons a.ssbats-share-reddit span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/reddit.svg');
}

.ssbats-social-share-buttons a.ssbats-share-whatsapp span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/whatsapp.svg');
}

.ssbats-social-share-buttons a.ssbats-share-telegram span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/telegram.svg');
}

.ssbats-social-share-buttons a.ssbats-share-pocket span:before {
  background-image: url('https://unpkg.com/simple-icons@latest/icons/pocket.svg');
}

/* Social share widget hover state */

.ssbats-social-share-buttons a:hover {
  background-color: #333333;
  color: #ffffff;
  box-shadow: 0 0 6px rgba(0,0,0,.5);
}

.ssbats-social-share-buttons a:hover span:before {
  filter: invert(100%);
}

.ssbats-social-share-buttons a.ssbats-share-facebook:hover {
  background-color: #1877f2;
  border-color: #1877f2;
}

.ssbats-social-share-buttons a.ssbats-share-twitter:hover {
  background-color: #1da1f2;
  border-color: #1da1f2;
}

.ssbats-social-share-buttons a.ssbats-share-linkedin:hover {
  background-color: #0077b5;
  border-color: #0077b5;
}

.ssbats-social-share-buttons a.ssbats-share-pinterest:hover {
  background-color: #bd081c;
  border-color: #bd081c;
}

.ssbats-social-share-buttons a.ssbats-share-tumblr:hover {
  background-color: #36465d;
  border-color: #36465d;
}

.ssbats-social-share-buttons a.ssbats-share-reddit:hover {
  background-color: #ff4500;
  border-color: #ff4500;
}

.ssbats-social-share-buttons a.ssbats-share-whatsapp:hover {
  background-color: #25d366;
  border-color: #25d366;
}

.ssbats-social-share-buttons a.ssbats-share-telegram:hover {
  background-color: #2ca5e0;
  border-color: #2ca5e0;
}

.ssbats-social-share-buttons a.ssbats-share-pocket:hover {
  background-color: #ef3f56;
  border-color: #ef3f56;
}

	
	.logo {
    margin-top: 20px;
}

  
</style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156136362-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-156136362-1');
</script>

	
	<script>
	$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 1
            }
        }]
    });
});
	
	</script>
</head>
<body>
    
<!--<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30">
            <img class="rotate" src="<? echo base_url('assets/') ?>logo1.gif" width="90" height="90" alt="Compass">
            <br/>
            <img class="" src="<? echo base_url('assets/') ?>logo3.gif" width="100"  alt="Compass">
        </div>
        <p>Please wait...Loading</p>
    </div>
</div>-->    
  
<div id="loadamar" style="display:block<? //echo ($uri != "") ? 'block' : 'none'; ?>">  
    
<div class="header1">
  <div class="container">
	  <div class="social d-none d-sm-block">
  <?php   $social_links = json_decode($this->db->get_where("tbl_options",["option_name"=>"social"])->row()->option_value); //print_r($data['social']);  ?>
	  	  <ul>
			  <!-- <li><a href="<?php //echo $social_links->facebook ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li> -->
        <?php if($social_links->linkedin){ ?><li><a href="<?php echo $social_links->linkedin ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li><? } ?>
        <?php if($social_links->twitter){ ?><li><a href="<?php echo $social_links->twitter ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><? } ?>
        <?php if($social_links->instagram){ ?><li><a href="<?php echo $social_links->instagram ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li><? } ?>
			
		  </ul>
	  </div>
	  
	  
    <div class="row justify-content-md-center12">
   <?php $img = $this->db->get_where("tbl_options",["option_name"=>"image"])->row(); ?>
      <div class="col-md-3 col-xs-12 text-center"> <a class="logo" href="<?php echo base_url() ?>"> <img src="<?php echo base_url(); ?>uploads/<?php echo $img->option_value ?>"  alt="" class=""></a></div>
    
      <div class="col-md-9 col-xs-12 text-center">
        <nav> 
          <!-- Menu Toggle btn-->
         
          <div class="menu-toggle">
            <h3>Menu</h3>
            <button type="button" id="menu-btn"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <!-- Responsive Menu Structure--> 
          <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
          <?php $header = $this->db->where('header','active')->where('status','active')->like('menu_type','header')->get("tbl_menu");
	
          ?> 
          <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
              <?php  foreach($header->result() as $head){ 
                    $sub_menus =  $this->db->where('header','active')
                                                    ->where('status','active')
                                                    ->where("menu_name",$head->id)
                                                    ->like('menu_type','header')
                                                    ->order_by('sort','asc')
                                                    ->get("tbl_submenu");
              ?>
                <li> <a href="<? echo (count($sub_menus->result()) == 0) ? base_url().$head->link : 'javascript:void(0)' ?>" target="<? echo $head->target ?>"> <span class="title"> <?php echo  $head->name; ?></span>  </a>
                      <?php 
														 
						if(count($sub_menus->result()) > 0){ 								 
                      ?>
                      <ul>
                   <?php  foreach($sub_menus->result() as $sub){ ?>
                        
                       
                          <li><a href="<? echo base_url().$sub->sub_menu_link ?>"><?php echo $sub->sub_menu_name ?></a></li>
                         
                        
                        <?php } ?> 
                        </ul>
                     <? } ?>   
                </li>
              <?php } ?>
          </ul>
              
          <!-- =- <span class="login_bar">
        <ul>
          <li class="search"> <a href="#"><i class="fa fa-search"></i></a>
            <div class="search_bar">
              <form>
                <input type="text"s name="search" placeholder="Search">
                <span class="search_icon"><i class="fa fa-search"></i></span>
              </form>
            </div>
          </li>
        </ul>
        </span>--> 
        <?php //} ?>
        </nav>
      </div>
    </div>
  </div>
</div>
