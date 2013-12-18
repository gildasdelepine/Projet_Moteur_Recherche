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
    var $userFirstname = '';
    var $userLastname = '';
    var $userLogin = '';
    var $userMail = '';

    function Connection_model() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function test_user() {

        if (!empty($_POST["login"]) && !empty($_POST["pass"])) {
            $query = $this->db->query("SELECT * FROM user WHERE login = '" . $_POST["login"] . "' ");
            $result = $query->row();

            // Si Login non présent en BDD
            if (!empty($result) && ($result->password == $_POST["pass"])) {
                $this->userLogin = $result->login;
                $this->userFirstname = $result->firstname;
                $this->userLastname = $result->lastname;
                $this->userMail = $result->email;
                return 0;
            } else {
                return 2;
//                echo "Login ou mot de passe incorrect";             // remplacer par un return errorX;
            }
//            return $result;
        } else if (isset($_POST["login"])) {
            return 1;
//            echo "Veuillez remplir tous les champs";
        } else
            return -1;
    }

    function get_userLogin() {
        return $this->userLogin;
//        $query = $this->db->query("SELECT login FROM user WHERE login = '".$_POST["login"]."' ");
//
//        $this->title   = $_POST['title']; // please read the below note
//        $this->content = $_POST['content'];
//        $this->date    = time();
    }

    function get_userFirstname() {
        return $this->userFirstname;
    }

    function get_userLastname() {
        return $this->userLastname;
    }

    function get_userName() {
        return $this->userFirstname . ' ' . $this->userLastname;
    }

    function get_userMail() {
        return $this->userMail;
    }
    
    
    
    function addUser(){
        
        if(!empty($_POST["login"]) && !empty($_POST["pass"]) && !empty($_POST["firstname"])&& !empty($_POST["lastname"]))
        {
           
            if( !empty($_POST["mail"]) )
                $this->db->query('INSERT INTO user (firstname, lastname, email, login, password) 
                              VALUES("'.$_POST["firstname"].'", "'.$_POST["lastname"].'", "'.$_POST["mail"].'", "'.$_POST["login"].'", "'.$_POST["pass"].'") ;');
            else
                $this->db->query('INSERT INTO user (firstname, lastname, login, password) 
                              VALUES("'.$_POST["firstname"].'", "'.$_POST["lastname"].'", "'.$_POST["login"].'", "'.$_POST["pass"].'") ;');
           
            return 0;
        }
        else
        {
            return 1;
        }
    }
    
    
    
    function update_entry()
    {
        /*$this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

    function update_entry() {
        /* $this->title   = $_POST['title'];
          $this->content = $_POST['content'];
          $this->date    = time();

          $this->db->update('entries', $this, array('id' => $_POST['id'])); */
    }

    function getMediaFile() {
        $array = array();
        $query = $this->db->query('SELECT DISTINCT file FROM media');

        foreach ($query->result() as $row) {
            $array[] = $row->file;
        }
        return $array;
    }

    function getOccu($words) {
        $kwOccu = array();
        $mediaFile = $this->getMediaFile();
        $words = implode('|', $words);
        $query = $this->db->query('SELECT file
                                   FROM media m, media_keywords mkw, keywords kw
                                   WHERE m.id_media = mkw.id_media 
                                        AND mkw.id_keyword = kw.id_keyword
                                        AND kw.name REGEXP "' . $words . '";');

        foreach ($mediaFile as $file) {
            $kwOccu[$file] = 0;
            foreach ($query->result() as $row) {
                if ($file === $row->file) {
                    $kwOccu[$file] ++;
                }
            }
        }
        return $kwOccu;
    }

    function getImgFB($selectedImg) {
        $result = array();
        $selectedImg = implode('", "', $selectedImg);
        $query = $this->db->query('SELECT DISTINCT med.file, dist.value
                                   FROM media med, media_descriptor mdesc, descriptor descr, distance dist
                                   WHERE med.id_media = mdesc.id_media AND descr.id_descr IN (dist.id_descr1, dist.id_descr2)
                                   AND (dist.id_descr1 IN (
                                                           SELECT mdesc.id_descr 
                                                           FROM media med, media_descriptor mdesc
                                                           where med.id_media = mdesc.id_media AND med.file IN ("' . $selectedImg . '")
                                    ) OR dist.id_descr2 IN (
                                                            SELECT mdesc.id_descr 
                                                            FROM media med, media_descriptor mdesc
                                                            where med.id_media = mdesc.id_media AND med.file IN ("' . $selectedImg . '")
                                    )) AND dist.value < 1;');

        foreach ($query->result() as $row) {
            $result[$row->file] = $row->value;
        }


        return $result;
    }

    function setImg($fileName, $keywords) {
        $this->db->query('INSERT INTO media (file) VALUES("' . $fileName . '");');
        $query_id_media = $this->db->query('SELECT id_media FROM media WHERE file = "' . $fileName . '";');
        $row = $query_id_media->row();
        $id_media = $row->id_media;

        foreach ($keywords as $kw) {
            $this->db->query('INSERT INTO keywords (name) VALUES("' . $kw . '");');
            $query_id_keyword = $this->db->query('SELECT id_keyword FROM keywords WHERE name = "' . $kw . '";');
            $row2 = $query_id_keyword->row();
            $id_keyword = $row2->id_keyword;
            $this->db->query('INSERT INTO media_keywords (id_media, id_keyword) VALUES("' . $id_media . '", "' . $id_keyword . '");');
        }
    }

    function setImgDist($distanceTab) {
        /* la distance vaut 'valueDist'
         * l'image 1 vaut 'fileName1'
         * l'image 2 vaut 'fileName2'
         */
        $distanceTabWithIndex = array_values($distanceTab);

        foreach ($distanceTab as $fileName1 => $strDist) {

            $query_id_media1 = $this->db->query('SELECT id_media FROM media WHERE file = "' . $fileName1 . '";');
            $row_id_media1 = $query_id_media1->row();
            $id_media1 = $row_id_media1->id_media;

            $query_id_descr1 = $this->db->query('SELECT id_descr FROM media_descriptor WHERE id_media = "' . $id_media1 . '";');
            $row_id_descr1 = $query_id_descr1->row();
            $id_descr1 = $row_id_descr1->id_descr;

            $distTab = explode(" ", $strDist);
            foreach ($distTab as $indexDistTab => $valueDist) {
                $fileName2 = $distanceTabWithIndex[$indexDistTab];
                //TO DO: SQL


                $query_id_media2 = $this->db->query('SELECT id_media FROM media WHERE file = "' . $fileName2 . '";');
                $row_id_media2 = $query_id_media2->row();
                $id_media2 = $row_id_media2->id_media;

                $query_id_descr2 = $this->db->query('SELECT id_descr FROM media_descriptor WHERE nid_media = "' . $id_media2 . '";');
                $row_id_descr2 = $query_id_descr2->row();
                $id_descr2 = $row_id_descr2->id_descr;
                
                
                
                $this->db->query('INSERT INTO distance (id_descr1, id_descr2, value) VALUES("' . $id_descr1 . '", "'. $id_descr2 . '", "'.$valueDist.'");');
                
                
                
            }
        }
    }

}
