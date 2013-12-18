<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FeedBack extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Connection_model');
    }

    public function index() {
        $this->randImg();
    }

    public function setMajDb() {
        $this->load->model('Connection_model', '', TRUE);

        $indexTxt = fopen('E:/wamp/cgi-bin/index.txt', 'r');
        $distanceTxt = fopen('E:/wamp/cgi-bin/color.dist', 'r'); // Possibilité de changer entre color.dist et edge.dist.
        $distanceTab = array();

        if ($indexTxt && $distanceTxt) {

            while (!feof($indexTxt) && !feof($distanceTxt)) {
                $indice = fgets($indexTxt);
                $valDist = fgets($distanceTxt);
                if ($valDist != FALSE) {
                    $distanceTab[$indice] = $valDist;
                    $nameTab[] = $indice;
                }
            }
            fclose($distanceTxt);
            fclose($indexTxt);
        }
        $this->Connection_model->setImgDist($distanceTab, $nameTab);
        $this->randImg();
    }

    public function randImg() {
        $randomImages = array();
        $images = glob("images/*.*", GLOB_BRACE);
        $i = 0;
        if (count($images) != 0) {
            while ($i < 12) {
                array_push($randomImages, $images[array_rand($images)]);
                $i++;
            }
            $data['randomImages'] = $randomImages;
            $this->load->view('feedbackview', $data);
        }
    }

}
