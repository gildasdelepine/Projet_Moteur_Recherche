<?php

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
        $sessionTest = $this->session->userdata('userLogin');
        //echo "TEST !!!!!!!!!!!!!!!!!!!!!!!!    :".$this->session->userdata('session_id');
	
        if( !empty($sessionTest) )
            $this->load->view('admin_index');            
        else{
        
            $code = $this->Connection_model->test_user();

            switch ($code){
                case -1:
                    $this->load->view('admin');
                    break;

                case 0:
                    //session_start();
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
    
    
    
    public function deconnexion(){
        $this->session->unset_userdata('data');
        $this->session->unset_userdata('userName');
        $this->session->unset_userdata('userLogin');
        $this->session->sess_destroy();
        
        redirect($this->load->view('welcome_message'));
    }
    
    
    public function upload(){
	$fileguid=@$_POST["myuploader"];   
	if($fileguid)   
	{   
	    //get the uploaded file based on GUID   
	    $mvcfile=$uploader->GetUploadedFile($fileguid);   
	    if($mvcfile)   
	    {   
		//Gets the name of the file.   
		echo($mvcfile->FileName);   
		//Gets the temp file path.   
		echo($mvcfile->FilePath);   
		//Gets the size of the file.   
		echo($mvcfile->FileSize);    

		//Copys the uploaded file to a new location.   
		$mvcfile->CopyTo("/uploads");   
		//Moves the uploaded file to a new location.   
		$mvcfile->MoveTo("/uploads");   
		//Deletes this instance.   
		$mvcfile->Delete();   
	    }   
	}
    }
}

?>
