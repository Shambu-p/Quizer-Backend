<?php

class UsersModel extends CI_Model {

    function getAll(){
        return $this->db->get('Users')->result();
    }

    function getUser($id){
        return $this->db->get_where('Users', ['id' => $id])->result();
    }
}