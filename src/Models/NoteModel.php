<?php

    namespace Todo\Models;

    class NoteModel{
        private $id;
        private $title;
        private $status;

        public function __construct($id, $title, $status){
            $this->id = $id;
            $this->title = $title;
            $this->status = $status;
        }

        public function getId(){
            return $this->id;
        }

        public function getTitle(){
            return $this->title;
        }

        public function getStatus(){
            return $this->status;
        }
    }