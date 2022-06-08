<?php

class ExamModel extends CI_Model {

    private $table_name = 'Exam';

    function getByID($id){

        $result = $this->db->get_where($this->table_name, ["id" => $id])->result();

        return sizeof($result) > 0 ? $result[0] : [];

    }

    function addExam($title, $subject, $description){
        $this->db->insert($this->table_name, [
            'title' => $title,
            'subject' => $subject,
            'description' => $description
        ]);

        return [
            'id' => $this->db->insert_id(),
            'title' => $title,
            'subject' => $subject,
            'description' => $description
        ];
    }

    function bySubject($subject){
        return $this->db->get_where($this->table_name, ["subject" => $subject])->result();
    }

}