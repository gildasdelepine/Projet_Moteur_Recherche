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
        $this->load->library('session');
    }
        
    public function index()
    {    
	$this->load->model('Connection_model', '', TRUE);
        
        if( $this->session->userdata('userName') !== NULL )
            $this->load->view('admin_index');            
        else{
        
            $code = $this->Connection_model->test_user();

            switch ($code){
                case -1:
                    $this->load->view('admin');
                    break;

                case 0:
                    session_start();
                    $data['userName'] = $this->Connection_model->get_userName();
                    $data['userLogin'] = $this->Connection_model->get_userLogin();
                    $this->session->set_userdata($data);
                    $this->load->view('admin_index');
                    break;

                case 1:
                    $data['error'] = "Veuillez remplir tous les champs";
                    $this->load->view('admin', $data);
                    break;

                case 2:
                    $data['error'] = "Login ou mot de passe incorrect";
                    $this->load->view('admin', $data);
                    break;
            }
        }
    }
}

?>
