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

    public function do_upload() {
        $config['upload_path'] = './images/zip';
        $config['allowed_types'] = 'zip';
        $config['max_size'] = '1000000';
        $config['max_width'] = '1920';
        $config['max_height'] = '1080';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => 'Ce fichier n est pas un zip !'/* $this->upload->display_errors() */);
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
        $this->unzip->extract('images/zip/' . $file_name, 'images/' . $raw_name);
        //unlink('./images/zip/' . $file_name);
        $this->meta_processing($raw_name);
    }

    public function meta_processing($raw_name) {
        // TO DO
        $imgPath = 'images/' . $raw_name . '/';
        $images = glob($imgPath . "*.*", GLOB_BRACE);
        $healthy = array($imgPath, ".jpg");
        $yummy = array("", "");
        $healthyForCopy = array($imgPath);
        $yummyForCopy = array("");
        foreach ($images as &$imgName) {
            $tmpForCopy = str_replace($healthyForCopy, $yummyForCopy, $imgName);
            copy($imgName, "E:/wamp/cgi-bin/images/" . $tmpForCopy);
            copy($imgName, "images/" . $tmpForCopy);
            $fileName = substr($imgName, 7);
            $tmp = str_replace($healthy, $yummy, $imgName);
            $keywords = explode("+", $tmp);
            // TO DO --> Sending to DB.
            $this->Connection_model->setImg($fileName, $keywords);
        }
        unset($imgName);
        $this->fb_processing();
    }

    public function fb_processing() {

        $folder = "E:/wamp/cgi-bin/images/";
        $dossier = opendir($folder);
        $f = fopen("E:/wamp/cgi-bin/index.txt", "w");
        ftruncate($f,0);
        while ($Fichier = readdir($dossier)) {
            if ($Fichier != "." && $Fichier != "..") {
              //  $nomFichier = $folder . "/" . $Fichier;
                fwrite($f, $Fichier."\r\n");
            }
        }
        closedir($dossier);
        redirect("http://localhost/cgi-bin/JavaRun.pl");
    }

}

?>