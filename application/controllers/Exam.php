<?php

class Exam extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function view($id)
    {

        $this->load->model("ExamModel");
        $data = $this->ExamModel->getByID($id);

        Response::prepare($data);
        
    }

    function save() {

        try {

            $this->load->model("ExamModel");
            Response::prepare(
                $this->ExamModel->addExam(
                    $this->input->post("title"), 
                    $this->input->post("subject"), 
                    $this->input->post("description")
                )
            );

        } catch (Exception $ex) {
            Response::prepareError($ex->getMessage());
        }

    }
}
