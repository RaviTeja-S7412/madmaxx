<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct(){
				
			parent::__construct();
	}

	public function index(){
        $story = $this->db->get_where("tbl_stories",array("deleted"=> 0))->result();
        $html='';
        $html.='<div class="time-line">';
        foreach($story as $sty){  
        $html.= '<ol class="ps-timeline">
                        <li>
                            <div class="ps-bots">
                            <p><strong>'.$sty->title.'</strong><br/>
                               </p>
                            </div>
                            <span class="ps-sp-top"><img src="'.$sty->image.'" /></span> 
                        </li>
                </ol>';
        }
        $html.= '</div>';    
        $html.= '<div class="clearfix"></div>';
        $html.='</div>';      
        echo json_encode(["story"=>$html]);
    }



    public function team(){
        $html= '';
            $html.=' <div class="container">
                        <div class="head">
                            <h1> The 
                                <span>Team</span>.
                            </h1>
                        </div>
                    </div>';
                    $team = $this->db->get_where("tbl_team",array("status"=> "active","deleted"=> 0))->result(); 
                    foreach($team as $tm){  
            $html.='<div class="row  text-center">
            <div class="col-lg-3 col-md-6 col-12">';
          
           
            $html.='<div class="tbox">';
           
                $html.='<div class="soc">
                <ul>
                  <li><a href="https://www.linkedin.com/in/anil-v-46702211/" target="_blank" ><img src="assets/front/images/linkedin.png"  /></a></li>
                  <li><a href="#costumModal10" data-toggle="modal"><img src="assets/front/images/bio.png"  /></a></li>
                </ul>
              </div>
              <img src="'.$tm->image.'"  class="img-fluid"/>
              <p>'.$tm->name.'</p>
              <small>'.$tm->designation.'</small>';
          
           $html.='</div>';
         $html.='</div>';
        }
         $html.=' <div id="costumModal10" class="modal " data-easein="bounce" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button>
             </div>
             <div class="modal-body">
               <div class="row">
                 <div class="col-lg-3 col-12 text-center"> <img src="assets/front/images/anil.jpg"  class="img-fluid"/><br/>
                   
                   <!--<a target="_blank" href="https://www.linkedin.com/in/anil-v-46702211/"><i class="fa fa-linkedin"></i></a>--> 
                   
                 </div>
                 <div class="col-lg-9 col-12">
                   <div class="team-border">
                     <div id="dc-team-quote">'.$tm->short_desc.'</div>
                     <div class="member-name">'.$tm->name.'</div>
                     <div class="member-job">'.$tm->designation.'</div>
                   </div>
                   <p>'.$tm->long_desc.'</p>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>';

      echo json_encode(["team"=>$html]);
    }
}
		