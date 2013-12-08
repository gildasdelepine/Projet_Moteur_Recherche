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
        asort($arrayOccu);
        $data['arrayOccu'] = $arrayOccu;
        $this->load->view('welcome_message', $data);
    }


    public function setFB() {
        //echo "<script type='text/javascript'>alert('dadadadada');</script>";
        $selectedImg = filter_input("INPUT_GET", 'selectedImg');   
        $resultFB = $this->Connection_model->getImgFB($selectedImg);
        $data['resultFB'] = $resultFB;
        $this->load->view('feedbackview', $data);
    }
}
