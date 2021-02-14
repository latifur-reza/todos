<?php

    namespace Todo\Controllers;
    use Todo\Database\Database;
    use Todo\Models\NoteModel;
    
    class NoteController extends Database{
        public function get(){
            $sql = 'Select * from notes';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([]);
            $data = $stmt->fetchAll();
            return $data;
        }

        public function post($note){
            $sql = 'Insert into notes(title,status) VALUES(:title,:status)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['title' => $note->getTitle(), 'status' => $note->getStatus()]);
        }

        public function put($note){
            $sql = 'Update notes set title = :title where id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['title' => $note->getTitle(), 'id' => $note->getId()]);
        }

        public function putStatus($note){
            $sql = 'Update notes set status = :status where id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['status' => $note->getStatus(), 'id' => $note->getId()]);
        }

        public function delete($id){
            $sql = 'Delete from notes where id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
        }

        public function deleteByStatus($status){
            $sql = 'Delete from notes where status = :status';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['status' => $status]);
        }
    }