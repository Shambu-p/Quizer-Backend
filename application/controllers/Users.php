<?php

class Users extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function single_user($id)
    {

        $this->load->model('UsersModel');
        $data = $this->UsersModel->getUser($id);

        header("Content-type: application/json");
        echo json_encode($data);
    }

    function register() {

        try {

            $this->load->model('UsersModel');
            if ($this->input->post("password") != $this->input->post("confirm_password")) {
                Response::prepareError("password does not match");
                return;
            }

            Response::prepare(
                $this->UsersModel->addUser(
                    $this->input->post("name"),
                    $this->input->post("email"),
                    $this->input->post("age"),
                    $this->input->post("grade"),
                    password_hash($this->input->post("password"), PASSWORD_DEFAULT)
                )
            );

        } catch (Exception $ex) {
            Response::prepare($ex->getMessage());
        }
    }
}
