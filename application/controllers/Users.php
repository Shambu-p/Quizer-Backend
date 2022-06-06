<?php

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function single_user($id) {
        
        $this->load->model('UsersModel');
        $data = $this->UsersModel->getUser($id);

        header("Content-type: application/json");
        echo json_encode($data);

    }

}