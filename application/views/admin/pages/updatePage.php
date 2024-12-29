<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
 	<title>Edit Page</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/images/favicon.png">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!--     <link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet">-->
<!--
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
-->
<!--    <link rel="stylesheet" href="stylesheets/toastr.min.css">-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/grapes.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/grapesjs-preset-webpage.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/tooltip.css">
<!--    <link rel="stylesheet" href="dist/css/grapesjs-plugin-filestack.css">-->
<!--    <link rel="stylesheet" href="dist/css/demos.css">-->

<!--    <script src="http://static.filestackapi.com/v3/filestack.js"></script>-->
    <!-- <script src="js/aviary.js"></script> old //feather.aviary.com/imaging/v3/editor.js -->
<!--    <script src="js/toastr.min.js"></script>-->

<!--    <script src="js/grapes.min.js?v0.14.40"></script>-->
    <script src="<?php echo base_url() ?>assets/dist/js/grapes.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/grapesjs-preset-webpage.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/grapesjs-lory-slider.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/grapesjs-tabs.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/grapesjs-custom-code.min.js"></script>
<!--    <script src="js/grapesjs-touch.min.js?0.1.1"></script>-->
    <script src="<?php echo base_url() ?>assets/dist/js/grapesjs-parser-postcss.min.js"></script>
    
    
<!--    <script src="https://unpkg.com/grapesjs"></script>-->
    <script src="<?php echo base_url() ?>assets/dist/grapesjs-blocks-basic.min.js"></script>
       <style type="text/css">
		   
        .clearfix{ clear:both}
        .header-banner{
          padding-top: 35px;
          padding-bottom: 100px;
          color: #ffffff;
          font-family: Helvetica, serif;
          font-weight: 100;
          background-image:url("//grapesjs.com/img/bg-gr-v.png"), url("//grapesjs.com/img/work-desk.jpg");
          background-attachment:scroll, scroll;
          background-position:left top, center center;
          background-repeat:repeat-y, no-repeat;
          background-size: contain, cover;
        }
        .container-width{
          width: 90%;
          max-width: 1150px;
          margin: 0 auto;
        }
        .logo-container{
          float: left;
          width: 50%;
        }
        .logo{
          background-color: #fff;
          border-radius: 5px;
          width: 130px;
          padding: 10px;
          min-height: 30px;
          text-align: center;
          line-height: 30px;
          color: #4d114f;
          font-size: 23px;
        }
        .menu {
          float: right;
          width: 50%;
        }
        .menu-item{
          float:right;
          font-size: 15px;
          color:#eee;
          width: 130px;
          padding: 10px;
          min-height: 50px;
          text-align: center;
          line-height: 30px;
          font-weight: 400;
        }
        .lead-title{
          margin: 150px 0 30px 0;
          font-size: 40px;
        }
        .sub-lead-title{
          max-width: 650px;
          line-height:30px;
          margin-bottom:30px;
          color: #c6c6c6;
        }
        .lead-btn{
          margin-top: 15px;
          padding:10px;
          width:190px;
          min-height:30px;
          font-size:20px;
          text-align:center;
          letter-spacing:3px;
          line-height:30px;
          background-color:#d983a6;
          border-radius:5px;
          transition: all 0.5s ease;
          cursor: pointer;
        }
        .lead-btn:hover{
          background-color:#ffffff;
          color:#4c114e;
        }
        .lead-btn:active{
          background-color:#4d114f;
          color:#fff;
        }
        .flex-sect{
          background-color: #fafafa;
          padding: 100px 0;
          font-family: Helvetica, serif;
        }
        .flex-title{
          margin-bottom: 15px;
          font-size: 2em;
          text-align: center;
          font-weight: 700;
          color:#555;
          padding: 5px;
        }
        .flex-desc{
          margin-bottom: 55px;
          font-size: 1em;
          color: rgba(0, 0, 0, 0.5);
          text-align: center;
          padding: 5px;
        }
        .cards{
          padding: 20px 0;
          display: flex;
          justify-content: space-around;
          flex-flow: wrap;
        }
        .card{
          background-color: white;
          height: 300px;
          width:300px;
          margin-bottom:30px;
          box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2);
          border-radius: 2px;
          transition: all 0.5s ease;
          font-weight: 100;
          overflow: hidden;
        }
        .card:hover{
          margin-top: -5px;
          box-shadow: 0 20px 30px 0 rgba(0, 0, 0, 0.2);
        }
        .card-header{
          height: 155px;
          background-image:url("//placehold.it/350x250/78c5d6/fff/image1.jpg");
          background-size:cover;
          background-position:center center;
        }
        .card-header.ch2{
          background-image:url("//placehold.it/350x250/459ba8/fff/image2.jpg");
        }
        .card-header.ch3{
          background-image:url("//placehold.it/350x250/79c267/fff/image3.jpg");
        }
        .card-header.ch4{
          background-image:url("//placehold.it/350x250/c5d647/fff/image4.jpg");
        }
        .card-header.ch5{
          background-image:url("//placehold.it/350x250/f28c33/fff/image5.jpg");
        }
        .card-header.ch6{
          background-image:url("//placehold.it/350x250/e868a2/fff/image6.jpg");
        }
        .card-body{
          padding: 15px 15px 5px 15px;
          color: #555;
        }
        .card-title{
          font-size: 1.4em;
          margin-bottom: 5px;
        }
        .card-sub-title{
          color: #b3b3b3;
          font-size: 1em;
          margin-bottom: 15px;
        }
        .card-desc{
          font-size: 0.85rem;
          line-height: 17px;
        }
        .am-sect{
          padding-top: 100px;
          padding-bottom: 100px;
          font-family: Helvetica, serif;
        }
        .img-phone{
          float: left;
        }
        .am-container{
          display: flex;
          flex-wrap: wrap;
          align-items: center;
          justify-content: space-around;
        }
        /*
        .am-container{
          perspective: 1000px;
        }*/
        .am-content{
          float:left;
          padding:7px;
          width: 490px;
          color: #444;
          font-weight: 100;
          margin-top: 50px;
          /*transform: rotateX(0deg) rotateY(-20deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1);*/
        }
        .am-pre{
          padding:7px;
          color:#b1b1b1;
          font-size:15px;
        }
        .am-title{
          padding:7px;
          font-size:25px;
          font-weight: 400;
        }
        .am-desc{
          padding:7px;
          font-size:17px;
          line-height:25px;
        }
        .am-post{
          padding:7px;
          line-height:25px;
          font-size:13px;
        }
        .blk-sect{
          padding-top: 100px;
          padding-bottom: 100px;
          background-color: #222222;
          font-family: Helvetica, serif;
        }
        .blk-title{
          color:#fff;
          font-size:25px;
          text-align:center;
          margin-bottom: 15px;
        }
        .blk-desc{
          color:#b1b1b1;
          font-size:15px;
          text-align:center;
          max-width:700px;
          margin:0 auto;
          font-weight:100;
        }
        .price-cards{
          margin-top: 70px;
          display: flex;
          flex-wrap: wrap;
          align-items: center;
          justify-content: space-around;
        }
        .price-card-cont{
          width: 300px;
          padding: 7px;
          float:left;
        }
        .price-card{
          margin:0 auto;
          min-height:350px;
          background-color:#d983a6;
          border-radius:5px;
          font-weight: 100;
          color: #fff;
          width: 90%;
        }
        .pc-title{
          font-weight:100;
          letter-spacing:3px;
          text-align:center;
          font-size:25px;
          background-color:rgba(0, 0, 0, 0.1);
          padding:20px;
        }
        .pc-desc{
          padding: 75px 0;
          text-align: center;
        }
        .pc-feature{
          color:rgba(255,255,255,0.5);
          background-color:rgba(0, 0, 0, 0.1);
          letter-spacing:2px;
          font-size:15px;
          padding:10px 20px;
        }
        .pc-feature:nth-of-type(2n){
          background-color:transparent;
        }
        .pc-amount{
          background-color:rgba(0, 0, 0, 0.1);
          font-size: 35px;
          text-align: center;
          padding: 35px 0;
        }
        .pc-regular{
          background-color: #da78a0;
        }
        .pc-enterprise{
          background-color: #d66a96;
        }
        .footer-under{
          background-color: #312833;
          padding-bottom: 100px;
          padding-top: 100px;
          min-height: 500px;
          color:#eee;
          position: relative;
          font-weight: 100;
          font-family: Helvetica,serif;
        }
        .led{
          border-radius: 100%;
          width: 10px;
          height: 10px;
          background-color: rgba(0, 0, 0, 0.15);
          float: left;
          margin: 2px;
          transition: all 5s ease;
        }
        .led:hover{
          background-color: #c29fca;/* #eac229 */
          box-shadow: 0 0 5px #9d7aa5, 0 0 10px #e6c3ee;/* 0 0 10px 0 #efc111 */
          transition: all 0s ease;
        }
        .copyright {
          background-color: rgba(0, 0, 0, 0.15);
          color: rgba(238, 238, 238, 0.5);
          bottom: 0;
          padding: 1em 0;
          position: absolute;
          width: 100%;
          font-size: 0.75em;
        }
        .made-with{
          float: left;
          width: 50%;
          padding: 5px 0;
        }
        .foot-social-btns{
          display: none;
          float: right;
          width: 50%;
          text-align: right;
          padding: 5px 0;
        }
        .footer-container{
          display: flex;
          flex-wrap: wrap;
          align-items: stretch;
          justify-content: space-around;
        }
        .foot-list {
          float: left;
          width: 200px;
        }
        .foot-list-title {
          font-weight: 400;
          margin-bottom: 10px;
          padding: 0.5em 0;
        }
        .foot-list-item {
          color: rgba(238, 238, 238, 0.8);
          font-size: 0.8em;
          padding: 0.5em 0;
        }
        .foot-list-item:hover {
          color: rgba(238, 238, 238, 1);
        }
        .foot-form-cont{
          width: 300px;
          float: right;
        }
        .foot-form-title{
          color: rgba(255,255,255,0.75);
          font-weight: 400;
          margin-bottom: 10px;
          padding: 0.5em 0;
          text-align: right;
          font-size: 2em;
        }
        .foot-form-desc{
          font-size: 0.8em;
          color: rgba(255,255,255,0.55);
          line-height: 20px;
          text-align: right;
          margin-bottom: 15px;
        }

        .form {
          border-radius: 3px;
          padding: 10px 15px;
          background-color: rgba(0,0,0,0.2);
        }

        .input,
        .textarea,
        .select,
        .sub-input {
          width: 100%;
          margin-bottom: 15px;
          padding: 7px 10px;
          border-radius: 2px;
          color:#fff;
          background-color: #554c57;
          border: none;
        }

        .select {
          height: 30px;
        }

        .label {
          width: 100%;
          display: block;
        }

        .button,
        .sub-btn{
          width: 100%;
          margin: 15px 0;
          background-color: #785580;
          border: none;
          color:#fff;
          border-radius: 2px;
          padding: 7px 10px;
          font-size: 1em;
          cursor: pointer;
        }
        .sub-btn:hover{
          background-color: #91699a;
        }
        .sub-btn:active{
          background-color: #573f5c;
        }
        .blk-row::after{
          content: "";
          clear: both;
          display: block;
        }
        .blk-row{
          padding: 10px;
        }
        .blk1{
          width: 100%;
          padding: 10px;
          min-height: 75px;
        }
        .blk2{
          float: left;
          width: 50%;
          padding: 10px;
          min-height: 75px;
        }
        .blk3{
          float: left;
          width: 33.3333%;
          padding: 10px;
          min-height: 75px;
        }
        .blk37l{
          float: left;
          width: 30%;
          padding: 10px;
          min-height: 75px;
        }
        .blk37r{
          float: left;
          width: 70%;
          padding: 10px;
          min-height: 75px;
        }
        .heading{padding: 10px;}
        .paragraph{padding: 10px;}

        .bdg-sect{
          padding-top:100px;
          padding-bottom:100px;
          font-family: Helvetica, serif;
          background-color: #fafafa;
        }
        .bdg-title{
          text-align: center;
          font-size: 2em;
          margin-bottom: 55px;
          color: #555555;
        }
        .badges{
          padding:20px;
          display: flex;
          justify-content: space-around;
          align-items: flex-start;
          flex-wrap: wrap;
        }
        .badge{
          width: 290px;
          font-family: Helvetica, serif;
          background-color: white;
          margin-bottom:30px;
          box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
          border-radius: 3px;
          font-weight: 100;
          overflow: hidden;
          text-align: center;
        }
        .badge-header{
          height: 115px;
          background-image:url("//grapesjs.com/img/bg-gr-v.png"), url("//grapesjs.com/img/work-desk.jpg");
          background-position:left top, center center;
          background-attachment:scroll, fixed;
          overflow: hidden;
        }
        .blurer{
          filter: blur(5px);
        }
        .badge-name{
          font-size: 1.4em;
          margin-bottom: 5px;
        }
        .badge-role{
          color: #777;
          font-size: 1em;
          margin-bottom: 25px;
        }
        .badge-desc{
          font-size: 0.85rem;
          line-height: 20px;
        }
        .badge-avatar{
          width:100px;
          height:100px;
          border-radius: 100%;
          border: 5px solid #fff;
          box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2);
          margin-top: -75px;
          position: relative;
        }
        .badge-body{
          margin: 35px 10px;
        }
        .badge-foot{
          color:#fff;
          background-color:#a290a5;
          padding-top:13px;
          padding-bottom:13px;
          display: flex;
          justify-content: center;
        }
        .badge-link{
          height: 35px;
          width: 35px;
          line-height: 35px;
          font-weight: 700;
          background-color: #fff;
          color: #a290a5;
          display: block;
          border-radius: 100%;
          margin: 0 10px;
        }
        .quote{
          color:#777;
          font-weight: 300;
          padding: 10px;
          box-shadow: -5px 0 0 0 #ccc;
          font-style: italic;
          margin: 20px 30px;
        }

        @media (max-width: 768px){
          .foot-form-cont{
            width:400px;
          }
          .foot-form-title{
            width:autopx;
          }
        }

        @media (max-width: 480px){
          .foot-lists{
            display:none;
          }
        }
		   
      </style>
    
    <style type="text/css">
      body, html{ height: 100%; margin: 0;}

      .gjs-block-svg {
          width: 61%;
      }

      .gjs-block-svg-path {
        fill: white;
      }
    
	  </style>
  </head>
  <body>
 <header align="right" style="padding: 5px; background-color: #041e42">
  
    <a href="<?php echo base_url() ?>pages"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-home"></i> Home</button></a>
    
 </header>
 <?php
	
	$p = $this->db->get_where("pages",array("id"=>$this->uri->segment(3)))->row();
	
	if($p->route == "home"){ 

 ?>
<input type="hidden" class="form-control" name="pname" id="pname" value="<?php echo $p->page_name ?>">
<input type="hidden" class="form-control" name="proute" id="proute" value="<?php echo $p->route ?>">
<?php
															
	}else{
 ?>
 
 
 <div style="background-color: #F3E4E4; padding-left: 30px">

	 <div class="row">

	   <div class="col-md-4">	

		<div class="form-group">
		<label>Page Name:</label>
		
			<input type="text" class="form-control" name="pname" id="pname" value="<?php echo $p->page_name ?>">

		</div>

	   </div>

	   <div class="col-md-4">	

		<label>Page Route:</label>
		<div class="form-group">

			<input type="text" class="form-control" name="proute" id="proute" value="<?php echo $p->route ?>">

		</div>

	   </div>	

	 </div>	

 </div>    
  
 <?php } ?>
      
    <div id="gjs" style="height:0px; overflow:hidden">
    </div>
        

	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
 
<script type="text/javascript">

	  
      var editor = grapesjs.init({
		  
        height: '100%',
//        storageManager:{ type: 'simple-storage' },
//		  storageManager: {
//			id: 'gjs-',             // Prefix identifier that will be used on parameters
//			type: "local",          // Type of the storage
//			autosave: true,         // Store data automatically
//			autoload: true,         // Autoload stored data on init
//			stepsBeforeSave: 1,     // If autosave enabled, indicates how many changes are necessary before store method is triggered
//		  },
		  
		storageManager: {
              stepsBeforeSave: 2,
			  autosave: true,
              autoload: true,
              type: 'remote',
//              urlStore: '<?php //echo base_url() ?>grape/send',
		<?php if($this->uri->segment(1)){ ?>		
			
              urlLoad: '<?php echo base_url() ?>grape/load/<?php echo $this->uri->segment(3) ?>',
			
		<?php } ?>	
              contentTypeJson: true,
              },
		  
        container : '#gjs',
        fromElement: true,
		showOffsets: 1,
		allowScripts: 1,
		  
		canvas: {
			styles: ['https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
					 '<?php echo base_url() ?>assets/front/css/style.css',
					 '<?php echo base_url() ?>assets/front/css/bootstrap.min.css',
//					 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
					 '<?php echo base_url() ?>assets/front/css/asmenu.css',
					 '<?php echo base_url() ?>assets/front/css/banner.css',
					 '<?php echo base_url() ?>assets/front/css/marquee.css',
					 'https://fonts.googleapis.com/css?family=Raleway:400,300,500',
					 'https://fonts.googleapis.com/css?family=Abel|Roboto:100,100i,300,300i,400,400i,500',
					 '<?php echo base_url() ?>assets/front/css/jquery.selectBoxIt.css',
					 'https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css'
					],
			
			scripts: ['<?php echo base_url() ?>assets/front/js/jquery.min.js',
					  '<?php echo base_url() ?>assets/front/js/bootstrap.min.js',
//					  'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
					  '<?php echo base_url() ?>assets/front/js/jquery-ui.min.js',
					  '<?php echo base_url() ?>assets/front/js/jquery.selectBoxIt.min.js',
					  '<?php echo base_url() ?>assets/front/js/asmenu.js',
//					  '<?php echo base_url() ?>assets/dist/js/grapesjs-preset-webpage.min.js',

					 ],
	    },  
		 script: function () {
			// Do stuff using jquery
			$("#respMenu").aceResponsiveMenu({
                 resizeWidth: '768', // Set the same in Media query       
                 animationSpeed: 'fast', //slow, medium, fast
                 accoridonExpAll: false //Expands all the accordion menu on click
             });

		  },  
		
        assetManager: {
        //  embedAsBase64: 0,
		    // dropzone: 1,
   		// dropzoneContent: '<div class="dropzone-inner">Drop here your assets</div>',
			// upload: 1,
			uploadName: 'files',
			assets: [
     <?php
			$gallery = $this->db->query("select * from fdm_va_gallery where deleted=0 and status='Active' order by id desc")->result();
		  	
		  	foreach($gallery as $g){
				
			if($g->gallery_type == 4){	
		  	}else{
		?>	
		'<?php echo base_url().$g->img_name  ?>',
				
		<?php }} ?>
    ],
        },  
		styleManager: { clearProperties: 1 },  
        plugins: [
			'gjs-blocks-basic',
		 	'gjs-preset-webpage',
//          	'grapesjs-lory-slider',
			'grapesjs-tabs',
			'grapesjs-custom-code',
//			'grapesjs-touch',
			'grapesjs-parser-postcss',
		],
        pluginsOpts: {
          'gjs-blocks-basic': {},
//		  'grapesjs-lory-slider': {
//            sliderBlock: {
//              category: 'Extra'
//            }
//          },
          'grapesjs-tabs': {
            tabsBlock: {
              category: 'Extra'
            }
          },
          'gjs-preset-webpage': {
            modalImportTitle: 'Import Template',
            modalImportLabel: '<div style="margin-bottom: 10px; font-size: 13px;">Paste here your HTML/CSS and click Import</div>',
            modalImportContent: function(editor) {
              return editor.getHtml() + '<style>'+editor.getCss()+'</style>'
            },	
          },
		  'grapesjs-custom-code': {
			  placeholderContent : '<span>Insert here your custom code</span>'
		  },	
	   },
		  
	   customStyleManager: [{
		   
              name: 'General',
              buildProps: ['float', 'display', 'position', 'top', 'right', 'left', 'bottom'],
              properties:[{
                  name: 'Alignment',
                  property: 'float',
                  type: 'radio',
                  defaults: 'none',
                  list: [
                    { value: 'none', className: 'fa fa-times'},
                    { value: 'left', className: 'fa fa-align-left'},
                    { value: 'right', className: 'fa fa-align-right'}
                  ],
                },
                { property: 'position', type: 'select'}
              ],
            },{
                name: 'Dimension',
                open: false,
                buildProps: ['width', 'flex-width', 'height', 'max-width', 'min-height', 'margin', 'padding'],
                properties: [{
                  id: 'flex-width',
                  type: 'integer',
                  name: 'Width',
                  units: ['px', '%'],
                  property: 'flex-basis',
                  toRequire: 1,
                },{
                  property: 'margin',
                  properties:[
                    { name: 'Top', property: 'margin-top'},
                    { name: 'Right', property: 'margin-right'},
                    { name: 'Bottom', property: 'margin-bottom'},
                    { name: 'Left', property: 'margin-left'}
                  ],
                },{
                  property  : 'padding',
                  properties:[
                    { name: 'Top', property: 'padding-top'},
                    { name: 'Right', property: 'padding-right'},
                    { name: 'Bottom', property: 'padding-bottom'},
                    { name: 'Left', property: 'padding-left'}
                  ],
                }],
              },{
                name: 'Typography',
                open: false,
                buildProps: ['font-family', 'font-size', 'font-weight', 'letter-spacing', 'color', 'line-height', 'text-align', 'text-decoration', 'text-shadow'],
                properties:[
                  { name: 'Font', property: 'font-family'},
                  { name: 'Weight', property: 'font-weight'},
                  { name:  'Font color', property: 'color'},
                  {
                    property: 'text-align',
                    type: 'radio',
                    defaults: 'left',
                    list: [
                      { value : 'left',  name : 'Left',    className: 'fa fa-align-left'},
                      { value : 'center',  name : 'Center',  className: 'fa fa-align-center' },
                      { value : 'right',   name : 'Right',   className: 'fa fa-align-right'},
                      { value : 'justify', name : 'Justify',   className: 'fa fa-align-justify'}
                    ],
                  },{
                    property: 'text-decoration',
                    type: 'radio',
                    defaults: 'none',
                    list: [
                      { value: 'none', name: 'None', className: 'fa fa-times'},
                      { value: 'underline', name: 'underline', className: 'fa fa-underline' },
                      { value: 'line-through', name: 'Line-through', className: 'fa fa-strikethrough'}
                    ],
                  },{
                    property: 'text-shadow',
                    properties: [
                      { name: 'X position', property: 'text-shadow-h'},
                      { name: 'Y position', property: 'text-shadow-v'},
                      { name: 'Blur', property: 'text-shadow-blur'},
                      { name: 'Color', property: 'text-shadow-color'}
                    ],
                }],
              },{
                name: 'Decorations',
                open: false,
                buildProps: ['opacity', 'background-color', 'border-radius', 'border', 'box-shadow', 'background'],
                properties: [{
                  type: 'slider',
                  property: 'opacity',
                  defaults: 1,
                  step: 0.01,
                  max: 1,
                  min:0,
                },{
                  property: 'border-radius',
                  properties  : [
                    { name: 'Top', property: 'border-top-left-radius'},
                    { name: 'Right', property: 'border-top-right-radius'},
                    { name: 'Bottom', property: 'border-bottom-left-radius'},
                    { name: 'Left', property: 'border-bottom-right-radius'}
                  ],
                },{
                  property: 'box-shadow',
                  properties: [
                    { name: 'X position', property: 'box-shadow-h'},
                    { name: 'Y position', property: 'box-shadow-v'},
                    { name: 'Blur', property: 'box-shadow-blur'},
                    { name: 'Spread', property: 'box-shadow-spread'},
                    { name: 'Color', property: 'box-shadow-color'},
                    { name: 'Shadow type', property: 'box-shadow-type'}
                  ],
                },{
                  property: 'background',
                  properties: [
                    { name: 'Image', property: 'background-image'},
                    { name: 'Repeat', property:   'background-repeat'},
                    { name: 'Position', property: 'background-position'},
                    { name: 'Attachment', property: 'background-attachment'},
                    { name: 'Size', property: 'background-size'}
                  ],
                },],
              },{
                name: 'Extra',
                open: false,
                buildProps: ['transition', 'perspective', 'transform'],
                properties: [{
                  property: 'transition',
                  properties:[
                    { name: 'Property', property: 'transition-property'},
                    { name: 'Duration', property: 'transition-duration'},
                    { name: 'Easing', property: 'transition-timing-function'}
                  ],
                },{
                  property: 'transform',
                  properties:[
                    { name: 'Rotate X', property: 'transform-rotate-x'},
                    { name: 'Rotate Y', property: 'transform-rotate-y'},
                    { name: 'Rotate Z', property: 'transform-rotate-z'},
                    { name: 'Scale X', property: 'transform-scale-x'},
                    { name: 'Scale Y', property: 'transform-scale-y'},
                    { name: 'Scale Z', property: 'transform-scale-z'}
                  ],
                }]
              },{
                name: 'Flex',
                open: false,
                properties: [{
                  name: 'Flex Container',
                  property: 'display',
                  type: 'select',
                  defaults: 'block',
                  list: [
                    { value: 'block', name: 'Disable'},
                    { value: 'flex', name: 'Enable'}
                  ],
                },{
                  name: 'Flex Parent',
                  property: 'label-parent-flex',
                  type: 'integer',
                },{
                  name      : 'Direction',
                  property  : 'flex-direction',
                  type    : 'radio',
                  defaults  : 'row',
                  list    : [{
                            value   : 'row',
                            name    : 'Row',
                            className : 'icons-flex icon-dir-row',
                            title   : 'Row',
                          },{
                            value   : 'row-reverse',
                            name    : 'Row reverse',
                            className : 'icons-flex icon-dir-row-rev',
                            title   : 'Row reverse',
                          },{
                            value   : 'column',
                            name    : 'Column',
                            title   : 'Column',
                            className : 'icons-flex icon-dir-col',
                          },{
                            value   : 'column-reverse',
                            name    : 'Column reverse',
                            title   : 'Column reverse',
                            className : 'icons-flex icon-dir-col-rev',
                          }],
                },{
                  name      : 'Justify',
                  property  : 'justify-content',
                  type    : 'radio',
                  defaults  : 'flex-start',
                  list    : [{
                            value   : 'flex-start',
                            className : 'icons-flex icon-just-start',
                            title   : 'Start',
                          },{
                            value   : 'flex-end',
                            title    : 'End',
                            className : 'icons-flex icon-just-end',
                          },{
                            value   : 'space-between',
                            title    : 'Space between',
                            className : 'icons-flex icon-just-sp-bet',
                          },{
                            value   : 'space-around',
                            title    : 'Space around',
                            className : 'icons-flex icon-just-sp-ar',
                          },{
                            value   : 'center',
                            title    : 'Center',
                            className : 'icons-flex icon-just-sp-cent',
                          }],
                },{
                  name      : 'Align',
                  property  : 'align-items',
                  type    : 'radio',
                  defaults  : 'center',
                  list    : [{
                            value   : 'flex-start',
                            title    : 'Start',
                            className : 'icons-flex icon-al-start',
                          },{
                            value   : 'flex-end',
                            title    : 'End',
                            className : 'icons-flex icon-al-end',
                          },{
                            value   : 'stretch',
                            title    : 'Stretch',
                            className : 'icons-flex icon-al-str',
                          },{
                            value   : 'center',
                            title    : 'Center',
                            className : 'icons-flex icon-al-center',
                          }],
                },{
                  name: 'Flex Children',
                  property: 'label-parent-flex',
                  type: 'integer',
                },{
                  name:     'Order',
                  property:   'order',
                  type:     'integer',
                  defaults :  0,
                  min: 0
                },{
                  name    : 'Flex',
                  property  : 'flex',
                  type    : 'composite',
                  properties  : [{
                          name:     'Grow',
                          property:   'flex-grow',
                          type:     'integer',
                          defaults :  0,
                          min: 0
                        },{
                          name:     'Shrink',
                          property:   'flex-shrink',
                          type:     'integer',
                          defaults :  0,
                          min: 0
                        },{
                          name:     'Basis',
                          property:   'flex-basis',
                          type:     'integer',
                          units:    ['px','%',''],
                          unit: '',
                          defaults :  'auto',
                        }],
                },{
                  name      : 'Align',
                  property  : 'align-self',
                  type      : 'radio',
                  defaults  : 'auto',
                  list    : [{
                            value   : 'auto',
                            name    : 'Auto',
                          },{
                            value   : 'flex-start',
                            title    : 'Start',
                            className : 'icons-flex icon-al-start',
                          },{
                            value   : 'flex-end',
                            title    : 'End',
                            className : 'icons-flex icon-al-end',
                          },{
                            value   : 'stretch',
                            title    : 'Stretch',
                            className : 'icons-flex icon-al-str',
                          },{
                            value   : 'center',
                            title    : 'Center',
                            className : 'icons-flex icon-al-center',
                          }],
                }]
              }
            ],
         	  
		  
		  
       });
	
// Remove Blocks You Don't need
	
	const bm = editor.BlockManager;

	bm.remove("countdown");	
	bm.remove("h-navbar");	
	
// End	
		
      // Add Settings Sector
        var traitsSector = $('<div class="gjs-sm-sector no-select">'+
          '<div class="gjs-sm-title"><span class="icon-settings fa fa-cog"></span> Settings</div>' +
          '<div class="gjs-sm-properties" style="display: none;"></div></div>');
        var traitsProps = traitsSector.find('.gjs-sm-properties');
        traitsProps.append($('.gjs-trt-traits'));
        $('.gjs-sm-sectors').before(traitsSector);
        traitsSector.find('.gjs-sm-title').on('click', function(){
          var traitStyle = traitsProps.get(0).style;
          var hidden = traitStyle.display == 'none';
          if (hidden) {
            traitStyle.display = 'block';
          } else {
            traitStyle.display = 'none';
          }
        });	
		
		
//	var domComps = editor.DomComponents;
//		
//	domComps.addType('input', {
//    model: dModel.extend({
//      defaults: Object.assign({}, dModel.prototype.defaults, {
//        traits: [
//          // strings are automatically converted to text types
//          'name',
//          'placeholder',
//          {
//            type: 'select',
//            label: 'Type',
//            name: 'type',
//            options: [
//              {value: 'text', name: 'Text'},
//              {value: 'email', name: 'Email'},
//              {value: 'password', name: 'Password'},
//              {value: 'number', name: 'Number'},
//            ]
//          }, {
//            type: 'checkbox',
//            label: 'Required',
//            name: 'required',
//        }],
//      }),
//    }, {
//      isComponent: function(el) {
//        if(el.tagName == 'INPUT'){
//          return {type: 'input'};
//        }
//      },
//    }),
//
//    view: dView,
//});

//	editor.getSelected()
//    .addStyle({'background-image': 'url(${url})'});  
	  
	var pn = editor.Panels;
      var modal = editor.Modal;
      editor.Commands.add('canvas-clear', function() {
        if(confirm('Are you sure to clean the canvas?')) {
          var comps = editor.DomComponents.clear();
          setTimeout(function(){ localStorage.clear()}, 0)
        }
      });

       // Show borders by default
      pn.getButton('options', 'sw-visibility').set('active', 1);
		
		 // Load and show settings and style manager
        var openTmBtn = pn.getButton('views', 'open-tm');
        openTmBtn && openTmBtn.set('active', 1);
        var openSm = pn.getButton('views', 'open-sm');
        openSm && openSm.set('active', 1);

		

      // Simple warn notifier
//      var origWarn = console.warn;
//      toastr.options = {
//        closeButton: true,
//        preventDuplicates: true,
//        showDuration: 250,
//        hideDuration: 150
//      };
//      console.warn = function (msg) {
//        if (msg.indexOf('[undefined]') == -1) {
//          toastr.warning(msg);
//        }
//        origWarn(msg);
//      };
	
		
		
	// Add and beautify tooltips
      [['sw-visibility', 'Show Borders'], ['preview', 'Preview'], ['fullscreen', 'Fullscreen'],
       ['export-template', 'Export'], ['undo', 'Undo'], ['redo', 'Redo'],
       ['gjs-open-import-webpage', 'Import'], ['canvas-clear', 'Clear canvas']]
      .forEach(function(item) {
        pn.getButton('options', item[0]).set('attributes', {title: item[1], 'data-tooltip-pos': 'bottom'});
      });
      [['open-sm', 'Style Manager'], ['open-layers', 'Layers'], ['open-blocks', 'Blocks']]
      .forEach(function(item) {
        pn.getButton('views', item[0]).set('attributes', {title: item[1], 'data-tooltip-pos': 'bottom'});
      });
      var titles = document.querySelectorAll('*[title]');

      for (var i = 0; i < titles.length; i++) {
        var el = titles[i];
        var title = el.getAttribute('title');
        title = title ? title.trim(): '';
        if(!title)
          break;
        el.setAttribute('data-tooltip', title);
        el.setAttribute('title', '');
      }
		
		
	  
	  

     editor.Panels.addButton
          ('options',
            [{
              id: 'save-db',
              className: 'fa fa-floppy-o',
              command: 'save-db',
              attributes: {title: 'Update'}
            }]
          );
	
 editor.Commands.add
        ('save-db',
        {
            run: function(editor, sender)
            {
              sender && sender.set('active'); // turn off the button
              editor.store();
              var htmldata = editor.getHtml();
			  var cssdata = editor.getCss();
			  var pagename = $("#pname").val();
			  var route = $("#proute").val();
//			  console.log(htmldata);
//			  console.log(cssdata);
				
//			  $.post("<?php //echo base_url() ?>grape/updatePage/<?php //echo $this->uri->segment(3) ?>",
//			  {
//				"page_name" : pagename,
//				"route" : route,  
//				"html": htmldata,
//				"css": cssdata
//			  });
//				window.location = "<?php //echo base_url() ?>pages/all-pages"; 
				
			 $.ajax({
				method: 'POST',
				data: {"pname":pagename,"route":route,"html": htmldata,"css": cssdata },
				url: '<?php echo base_url() ?>grape/updatePage/<?php echo $this->uri->segment(3) ?>',
				success: function(data) {
					window.onbeforeunload = null;
					window.location = "<?php echo base_url() ?>pages"; 
// 					alert("successfully updated");
				},
				error : function(data){
					alert("Error Occured Please Try Again");
				} 
			});			
				
                editor.on('storage:load', function(e) {
                    console.log('Loaded ', e);
              });

              editor.on('storage:store', function(e) {
                    console.log(e);
              });         
            }
        });	
	
	// Here our `simple-storage` implementation
//const SimpleStorage = {};
//
//editor.StorageManager.add('simple-storage', {
//  /**
//   * Load the data
//   * @param  {Array} keys Array containing values to load, eg, ['gjs-components', 'gjs-style', ...]
//   * @param  {Function} clb Callback function to call when the load is ended
//   * @param  {Function} clbErr Callback function to call in case of errors
//   */
//  load(keys, clb, clbErr) {
//    const result = {};
//
//    keys.forEach(key => {
//      const value = SimpleStorage[key];
//      if (value) {
//        result[key] = value;
//      }
//    });
//
//    // Might be called inside some async method
//    clb(result);
//  },
//  /**
//   * Store the data
//   * @param  {Object} data Data object to store
//   * @param  {Function} clb Callback function to call when the load is ended
//   * @param  {Function} clbErr Callback function to call in case of errors
//   */
//  store(data, clb, clbErr) {
//    for (let key in data) {
//      SimpleStorage[key] = data[key];
//
//    }
//    // Might be called inside some async method
//    clb();
//  }
//	
//});

//console.log(SimpleStorage);
//editor.load(res => console.log(LandingPage));		
    </script>
    
<script type="text/javascript">
	  
$("#sub").click(function(){
	
	var gs = res;
	var pname = $("#pname").val();
	var route = $("#route").val();
	
	$.ajax({
	
		type: "post",
		url:"<?php echo base_url() ?>grape/send",
		data:{content:gs,pname:pname,route:route},
		success:function(data){
		
			console.log(data);
		}
	
	
	});	
	
});	  
	  
</script>
    
    
  </body>
</html>
