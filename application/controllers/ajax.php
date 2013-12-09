<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ajax
 *
 * @author Marc
 */
//$array = $_GET['words'];
//$words = implode(", ", $array);
//        if($words != '')
//            echo $words;
//        else
//            echo 'BUG';
        
class Ajax extends CI_Controller {
    //put your code here
    
    public function __construct()
        {
           parent::__construct();
           $this->load->helper('url');
           $this->load->model('Connection_model');
        }
        
    public function setKW() {
        $words = $_GET['words'];  
        $arrayOccu = $this->Connection_model->getOccu($words);
        arsort($arrayOccu);
        echo json_encode($arrayOccu);
    }


    public function setFB() {
        $selectedImg = $_GET['selectedImg'];   
        $resultFB = $this->Connection_model->getImgFB($selectedImg);
        asort($resultFB);
        echo json_encode($resultFB);
    }
}
