<?php

class Users extends CI_Model {

    function getAll(){
        return $this->db->get('Users', 5);
    }

}