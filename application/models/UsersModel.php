<?php

class UsersModel extends CI_Model {

    private $table_name = 'Users';

    function getAll(){
        return $this->db->get($this->table_name)->result();
    }

    function getUser($id){

        $result = $this->db->get_where($this->table_name, ['id' => $id])->result();
        return (sizeof($result) > 0) ? $result[0] : [];

    }

    function getUserByEmail($email){
        return $this->db->get_where($this->table_name, ['email' => $email])->result();
    }

    function addUser($name, $email, $age, $grade, $password) {

        $this->db->insert($this->table_name, [
            "fullname" => $name,
            "email" => $email,
            "age" => $age,
            "grade" => $grade,
            "password" => $password,
            "role" => "student"
        ]);

        return [
            'id' => $this->db->insert_id(),
            "fullname" => $name,
            "email" => $email,
            "age" => $age,
            "grade" => $grade,
            "password" => $password,
            "role" => "student"
        ];

    }
}