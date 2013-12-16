<?php

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        $this->load->view('upload_form', array('error' => ' '));
    }

    public function do_upload() {
        $config['upload_path'] = './uploads/zip';
        $config['allowed_types'] = 'zip';
        $config['max_size'] = '1000000';
        $config['max_width'] = '1920';
        $config['max_height'] = '1080';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => 'Ce fichier n est pas un zip !'/*$this->upload->display_errors()*/);
            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $data['upload_data'];

            $this->extract_file($upload_data['file_name'], $upload_data['raw_name']);

            $this->load->view('upload_success', $data);
        }
    }

    public function extract_file($file_name, $raw_name) {
        $this->load->library('unzip');
        $this->unzip->allow(array('css', 'js', 'png', 'gif', 'jpeg', 'jpg', 'tpl', 'html', 'swf'));
        $this->unzip->extract('./uploads/zip/' . $file_name, './uploads/' . $raw_name);
        //unlink('./uploads/zip/' . $file_name);
        // $this->descriptor_processing();
    }
    
    public function descriptor_processing(){
        // TO DO
    }

}

?>