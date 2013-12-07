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

class Ajax {
    //put your code here
    
    function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('Connection_model');
        }
        
    public function getKW($words) {
        //echo "<script type='text/javascript'>alert('dadadadada');</script>";
        $words = filter_input("INPUT_GET", 'words');   
        $arrayOccu = $this->Connection_model->getOccu($words);
        asort($arrayOccu);
        $data['arrayOccu'] = $arrayOccu;
        $this->load->view('welcome_message', $data);
    }
}

?>
