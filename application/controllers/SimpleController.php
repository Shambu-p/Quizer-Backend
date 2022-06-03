<?php

class SimpleController extends CI_Controller {

    function index() {
        
        $this->load->model('Users');
        $data = $this->Users->getAll();

        header("Content-type: application/json");
        echo json_encode($data);

    }

}