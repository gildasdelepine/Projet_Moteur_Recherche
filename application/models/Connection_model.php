<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection_model
 *
 * @author GIZOU
 */
class Connection_model extends CI_Model {
    //put your code here
    var $userFirstname   = '';
    var $userLastname   = '';
    var $userLogin  = '';
    var $userMail   = '';

    function Connection_model()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function test_user()
    {

        if(!empty($_POST["login"]) && !empty($_POST["pass"]))
        {
            $query = $this->db->query("SELECT * FROM user WHERE login = '".$_POST["login"]."' ");
            $result = $query->row();
            
            
            // Si Login non présent en BDD
            if(!empty($result) && ($result->password == $_POST["pass"])){                
                $this->userLogin = $result->login;
                $this->userFirstname = $result->firstname; 
                $this->userLastname = $result->lastname; 
                $this->userMail = $result->email; 
                return 0;
            }
            else {
                return 2; 
//                echo "Login ou mot de passe incorrect";             // remplacer par un return errorX;
            }
//            return $result;
        }
        else if(isset($_POST["login"]))
        {
            return 1;
//            echo "Veuillez remplir tous les champs";
        }
        else
            return -1;
        
    }

    function get_userLogin()
    {
        return $this->userLogin;
//        $query = $this->db->query("SELECT login FROM user WHERE login = '".$_POST["login"]."' ");
//
//        $this->title   = $_POST['title']; // please read the below note
//        $this->content = $_POST['content'];
//        $this->date    = time();
    }
    
    function get_userFirstname(){
        return $this->userFirstname;
    }
    
    function get_userLastname(){
        return $this->userLastname;
    }
    
    function get_userName(){
        return $this->userFirstname.' '.$this->userLastname;
    }
    
    function get_userMail(){
        return $this->userMail;
    }
    
    
    
    function update_entry()
    {
        /*$this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));*/
    }
    
    function getMediaFile()
    {
        $array = array();
        $query = $this->db->query('SELECT DISTINCT file FROM media');

        foreach ($query->result() as $row){
            $array[] = $row->file;
        }
        return $array;
    }
    
    function getOccu($words)
    {
        $kwOccu = array();
        $mediaFile = $this->getMediaFile();
        $words = implode('", "', $words);
        $query = $this->db->query('SELECT file
                                   FROM media m, media_keywords mkw, keywords kw
                                   WHERE m.id_media = mkw.id_media 
                                        AND mkw.id_keyword = kw.id_keyword
                                        AND kw.name in("'.$words.'");');

        foreach ($mediaFile as $file){
            $kwOccu[$file] = 0;
            foreach ($query->result() as $row){
                if ($file === $row->file){
                    $kwOccu[$file]++;
                }
            }   
        }
        return $kwOccu;
    }
    
    function getImgFB($selectedImg){
        $result = array();
        $query = $this->db->query('SELECT file, di.distance
                                   FROM media m, media_descriptor md, descriptor d, distance di
                                   WHERE m.id_media = md.id_media
                                    AND md.id_descr = d.id_descr
                                    AND d.id_descr = di.id_descr1 OR d.id_descr = di.id_descr2
                                    AND di.id_descr1 IN ( SELECT md2.id_descr
                                                          FROM media m2, media_descriptor md2
                                                          WHERE m2.id_media = md2.id_media
                                                            AND m2.file = les images selec )
                                    OR  di.id_descr2 IN ( SELECT md3.id_descr
                                                          FROM media m3, media_descriptor md3
                                                          WHERE m3.id_media = md3.id_media
                                                          AND m3.file in("'.implode(",", $selectedImg).'") )
                                    AND di.value < 1 ORDER BY di.value ASC;');
        
           foreach ($query->result() as $row){
               $result[$row->file] = $row->distance;
           } 
        
    
        return $result;
    }

}
