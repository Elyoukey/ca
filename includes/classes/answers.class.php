<?php

class answer
{
    var $id;
    var $question_id;
    var $answer;
    var $user_id;
    var $animal_id;

    /* Loading datas */
    function loadFromId( $id ){
        global $db;
        $stmt = $db->prepare( 'SELECT * FROM answers  WHERE id=?' );
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $this->loadFromRow( $row );
        }
    }

    function loadFromRow( $row ){
        $this->id       = $row['id'];
        $this->question_id     = $row['question_id'];
        $this->answer     = $row['answer'];
        $this->user_id   = $row['user_id'];
        $this->animal_id   = $row['animal_id'];
    }

    function save(){
        global $db;
        $query = '
          INSERT INTO answers ( 
            question_id,
            user_id,
            animal_id,
            answer,
            ip_address            
            )
            VALUES
            (
            ?,?,?,?,?
            )
           ';
        $stmt = $db->prepare( $query );
        $stmt->bind_param('iiiss',
            $this->question_id,
            $this->user_id,
            $this->animal_id,
            $this->answer,
            $_SERVER['REMOTE_ADDR']
        );
        return $stmt->execute();
    }


}
?>