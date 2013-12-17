<?php

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('Connection_model');
    }

    public function index() {
        $this->load->view('upload_form', array('error' => ' '));
    }

    
    
    
//    function do_upload()
//	{
//		$config['upload_path'] = './uploads/';
//		$config['allowed_types'] = 'gif|jpg|png';
//		$config['max_size']	= '100';
//		$config['max_width']  = '1024';
//		$config['max_height']  = '768';
//		
//		$this->load->library('upload', $config);
//	
//		if ( ! $this->upload->do_upload())
//		{
//			$error = array('error' => $this->upload->display_errors());
//			
//			$this->load->view('upload_form', $error);
//		}	
//		else
//		{
//			$data = array('upload_data' => $this->upload->data());
//			
//			$this->load->view('upload_success', $data);
//		}
//	}	
    
    
    public function do_upload() {
        $config['upload_path'] = './images/zip';
        $config['allowed_types'] = 'zip';
        $config['max_size'] = '1000000';
        $config['max_width'] = '1920';
        $config['max_height'] = '1080';

        $this->load->library('upload', $config);
        echo $this->upload->data('file_ext');
        
        if($this->upload->data('file_ext') == ".zip")
            echo " c'est un ZIP !!";
        else
            echo " c'est une IMAGE !!";
        
        if (!$this->upload->do_upload()) {
            $error = array('error' => 'Ce fichier n est pas un zip !'/* $this->upload->display_errors() */);
            $this->load->view('upload_form', $error);
        } else {
            //$data = array('upload_data' => $this->upload->data());
            //$upload_data = $data['upload_data'];

            //$this->extract_file($upload_data['file_name'], $upload_data['raw_name']);

            //$this->load->view('upload_success', $data);
        }
    }

    public function extract_file($file_name, $raw_name) {
        $this->load->library('unzip');
        $this->unzip->allow(array('css', 'js', 'png', 'gif', 'jpeg', 'jpg', 'tpl', 'html', 'swf'));
        $this->unzip->extract('images/zip/' . $file_name, 'images/' . $raw_name);
        //unlink('./images/zip/' . $file_name);
        $this->meta_processing($raw_name);
    }

    public function meta_processing($raw_name) {
        // TO DO
        $imgPath = 'images/' . $raw_name.'/';
        $images = glob($imgPath."*.*", GLOB_BRACE);
        $healthy = array($imgPath, ".jpg");
        $yummy   = array("", "");

        foreach ($images as &$imgName) {
            $fileName = substr($imgName, 7);
            $tmp = str_replace($healthy, $yummy, $imgName);
            $keywords = explode("+", $tmp);
            // TO DO --> Sending to DB.
            $this->Connection_model->setImg($fileName, $keywords);
        }
        unset($imgName);
    }

}

?>