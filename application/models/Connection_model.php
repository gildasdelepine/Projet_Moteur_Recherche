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
class Connection_model extends Model {
    //put your code here
    var $title   = '';
    var $content = '';
    var $date    = '';

    function Connection_model()
    {
        // Call the Model constructor
        parent::Model();
    }
    
    function get_user_login()
    {
        //$query = $this->db->get('entries', 10);
        //return $query->result();
    }

    function get_user_password()
    {
        /*$this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);*/
    }

    function update_entry()
    {
        /*$this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));*/
    }

}
