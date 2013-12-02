<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connection
 *
 * @author GIZOU
 */
class connection extends Controller {
    //put your code here
    
    
    
    public function index()
    {
	$this->load->model('Connection_model', '', TRUE);
    }
    
}

