<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FeedBack extends CI_Controller {
  
        function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
        }
    
	public function index()
	{
		$this->randImg();
	}
        
        public function test()
	{
		echo '<script type="text/javascript">alert("dadadadada");</script>';
	}
        
        public function randImg(){
            $randomImages = array();
            $images = glob("images/*.*", GLOB_BRACE);
            $i = 0;
            while($i < 12){
                array_push($randomImages, $images[array_rand($images)]);
                $i++;
            }
            $data['randomImages'] = $randomImages;
            $this->load->view('feedbackview', $data);
        }
}