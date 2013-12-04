<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_controller
 *
 * @author GIZOU
 */
class Admin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
        
    public function index()
    {
	//$this->load->model('Connection_model', '', TRUE);
        $this->load->view('admin');
    }
}

?>
