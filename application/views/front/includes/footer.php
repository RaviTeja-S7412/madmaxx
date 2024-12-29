<div class="container">
  <div class="foottop">
    <div class="row">
      <?php $menus = $this->db->where('footer','active')->where('status','active')->like('menu_type','footer')->get('tbl_menu');
        foreach($menus->result() as $menu){		
          ?> 
        <div class="col-lg-3 col-md-6 ml-lg-auto">
            <h3> <?php echo $menu->name ?></h3>
            <ul>
              <?php $sub_menus =  $this->db->where('footer','active')->order_by('sort','asc')->where('status','active')->where("menu_name",$menu->id)->like('menu_type','footer')->get('tbl_submenu'); //echo $this->db->last_query(); ?>
              <?php  foreach($sub_menus->result() as $submenu){		?>
                <li><a href="<? echo base_url().$submenu->sub_menu_link ?>" target="<? echo $submenu->sub_menu_target ?>"><? echo $submenu->sub_menu_name ?></a></li>
                <? } ?>  
              </ul>
          </div>
      <?php } ?>

   
      <div class="col-lg-3 col-md-6 bord  justify-content-centers">
        <? $contact = json_decode($this->db->get_where("tbl_options",["option_name"=>"contact"])->row()->option_value);
          $like_our_solutions = $this->db->get_where("tbl_options",["option_name"=>"like_our_solutions"])->row()->option_value; 
        
        ?>
        <h3><?php echo  $like_our_solutions ?></h3>
        <div class=" justify-content-center text-center">
            <div class="tc-fc">
              <i class="fa fa-phone" aria-hidden="true"></i> <?php echo $contact->mobile_number ?> 
          </div>
          <div class="tc-fc">
              <i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:<?php echo trim($contact->email) ?>"><?php echo $contact->email ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 <div class="footbtm">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6 col-xs-12">
        <p> </p>
        <div class="textwidget">
        <? $copyright = $this->db->get_where("tbl_options",["option_name"=>"copyright"])->row()->option_value; ?>

          <p><?php echo $copyright; ?></p>
        </div>
        <p></p>
      </div>
      <!-- <div class="col-md-4 col-sm-6 col-xs-12 navbar-right">
        <div class="textwidget">
          <ul class="navbar-right">
            <li><a href="">Home</a></li>
            <li>|</li>
            <li><a href="#">Privacy Statement</a></li>
            <li>|</li>
            <li><a href="#">EEO Policy</a></li>
            <li>|</li>
            <li><a href="#">Terms of Use</a></li>
          </ul>
        </div>
      </div> -->
    </div>
  </div>
</div>

</div>

<script src="<? echo base_url() ?>assets/front/js/asmenu.js"></script> 
<script type="text/javascript">
         $(document).ready(function () {
             $("#respMenu").aceResponsiveMenu({
                 resizeWidth: '768', // Set the same in Media query       
                 animationSpeed: 'fast', //slow, medium, fast
                 accoridonExpAll: false //Expands all the accordion menu on click
             });
         });
	</script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script> 
<script>
 new WOW().init();
   </script> 
<script src="<? echo base_url() ?>assets/front/js/owl.js"></script>


</body>
</html>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type='text/javascript' src="<? echo base_url('assets/front/js/blocks.js') ?>"></script>
<script>

    $(document).ready(function(){
        $.ajax({
            url:"<?php echo base_url();?>sections/",
            type: 'GET',
            dataType: 'JSON',
            success:function (data) {
              $('#solutions').html(data.solution);
              // console.log(data);
            },
            error:function(data){
              // console.log(data); 
           }
        });   
    });
</script>
<script>
    $(document).ready(function(){
        $.ajax({
            url:"<?php echo base_url();?>sections/aboutStory",
            type: 'GET',
            dataType: 'JSON',
            success:function (data) {
              $('#story').html(data.story);
              console.log(data);
           
            },
            error:function(data){
             console.log(data); 
           }
        });   
    });
</script>


<script>
    $(document).ready(function(){
        $.ajax({
            url:"<?php echo base_url();?>sections/about_team/",
            type: 'GET',
            dataType: 'JSON',
            success:function (data) {
              $('#team').html(data.team);
              // console.log(data);
            },
            error:function(data){
              // console.log(data); 
           }
        });   
   });
</script>
<script>
    $(document).ready(function(){
        $.ajax({
            url:"<?php echo base_url();?>sections/blogs/",
            type: 'GET',
			data:{ category:'<?php echo $this->input->get("category") ?>'},
            dataType: 'JSON',
            success:function (data) {
              $('#blog_pages').html(data.blogs);
               //console.log(data);
            },
            error:function(data){
               //console.log(data); 
           }
        });   
   });
</script>

<script>
    $(document).ready(function(){
        $.ajax({
            url:"<?php echo base_url();?>sections/cartgory/",
            type: 'GET',
            dataType: 'JSON',
            success:function (data) {
              $('#categories').html(data.cartgory);
              // console.log(data);
            },
            error:function(data){
               //console.log(data); 
           }
        });   
   });
</script>

<script>
      $.ajax({
          url:"<?php echo base_url();?>sections/innerblog",
          type: 'GET',
          dataType: 'JSON',
          data:{ blog:'<?php echo $this->input->get("blog") ?>'},
          success:function (data) {
            $('#single-blog').html(data.innerblog);
            console.log(data);
          },
          error:function(data){
              //console.log(data); 
          }
      });  
</script>

<script>
    $(document).ready(function(){
      //alert('categories');
        $.ajax({
            url:"<?php echo base_url();?>sections/newpost/",
            type: 'GET',
            dataType: 'JSON',
            success:function (data) {
              $('#post').html(data.newpost);
               //console.log(data);
            },
            error:function(data){
              // console.log(data); 
           }
        });   
   });
</script>
<script type="text/javascript">
function genericSocialShare(url){
  window.location.href = url;
    return true;
}



</script>
<script type="text/javascript" async >
  function shareinsocialmedia(url){
    window.open(url,'sharein','toolbar=0,status=0,width=648,height=395');
    return true;
  }
</script>

<script>
    $(document).ready(function(){
        $.ajax({
            url:"<?php echo base_url();?>sections/captcha/",
            type: 'GET',
            dataType: 'JSON',
          success:function (data) {
              $('#image_captcha').html(data.captcha);
          },
          error:function(data){
            
          }
        });   
   });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#contact-form").on('submit', function(e) {
            e.preventDefault();
            var contactForm = $(this);
            $.ajax({
                url: "<?php echo base_url();?>sections/contact_insert",
                type: 'post',
                data: contactForm.serialize(),
                dataType : "json",
                success: function(response){
                  if(response.status == "success"){
                    $("#message").html(response.message);
                    setTimeout(function() {
                      location.reload();
                    }, 3000);
                  }else{
                    $("#message").html(response.message);
                    setTimeout(function() {
                      location.reload();
                    }, 3000);
                  }
                },
                error:function(data){
                  $("#message").html(data);
					console.log(data);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#subscribe").on('submit', function(e) {
          // /alert("submit");
            e.preventDefault();
            var contactForm = $(this);
            $.ajax({
                url: "<?php echo base_url();?>sections/subscribe",
                type: 'post',
                data: contactForm.serialize(),
                dataType : "json",
                success: function(response){
                  if(response.status == "success"){
                    $("#message").html(response.message);
                    setTimeout(function() {
                      location.reload();
                    }, 3000);
                  }else{
                    $("#message").html(response.message);
                    setTimeout(function() {
                      location.reload();
                    }, 3000);
                  }
                },
                error:function(data){
                  $("#message").html(response.message);
                }
            });
        });
    });
</script>
<script>
 $('.captcha-refresh').click(function() {
    location.reload();
});
</script>
<script>
    $(document).ready(function(){
     
       /* $.ajax({
            url:"<?php echo base_url();?>sections/homebanner/",
            type: 'GET',
            dataType: 'JSON',
            success:function (data) {
              $('#banner').html(data.homebanner);
               //console.log(data);
               
               <? //$uri = $this->uri->segment(1); 
                  //if(!$uri){
               ?>
                    $(".page-loader-wrapper").hide();
                    $("#loadamar").show();
                <? //} ?>
            },
            error:function(data){
              // console.log(data); 
              
               <? //$uri = $this->uri->segment(1); 
                  //if(!$uri){
               ?>
                    $(".page-loader-wrapper").hide();
                    $("#loadamar").show();
                <? //} ?>
           }
        });   */
   });
</script>

<script>
    $(document).ready(function(){
        $.ajax({
            url:"<?php echo base_url();?>sections/feature_banner/",
            type: 'GET',
            dataType: 'JSON',
            success:function (data) {
              $('#feature').html(data.feature_banner);
              
              $('#demo1').carousel({
                  interval: 6000
                })
               //console.log(data);
            },
            error:function(data){
              // console.log(data); 
           }
        }); 
        
   });
</script>

<script>
    $(document).ready(function(){
     
        $.ajax({
            url:"<?php echo base_url();?>sections/host/",
            type: 'GET',
            dataType: 'JSON',
            success:function (data) {
              $('#host').html(data.host);
               //console.log(data);
               $('#demo').carousel({
                  interval: 6000
                })
            },
            error:function(data){
              //console.log(data); 
           }
        });   
   });
</script>

<script>
    $(document).ready(function(){
     
        $.ajax({
            url:"<?php echo base_url();?>sections/solutions_page/",
            type: 'GET',
            dataType: 'JSON',
            success:function (data) {
              $('#solution').html(data.solutions_page);
               console.log(data);
               
            },
            error:function(data){
              console.log(data); 
              
           }
        });   
   });
   
  /* setTimeout(function(){
    $(".page-loader-wrapper").hide();
    $("#loadamar").show();
      
   },5000);*/
//   $(".page-loader-wrapper").hide();
//Added by Raja Sekhar
$(document).ready(function(){
      $("#pageCareer").load("<? echo base_url(); ?>home/career");
   });
   //Added by Raja Sekhar
</script>