<?php
class question{
    var $id;
    var $label;
    var $q_type;
    var $order;

    function render(){

    }

    /* Loading datas */
    function loadFromId( $id ){
        global $db;
        $stmt = $db->prepare( 'SELECT * FROM questions  WHERE id=?' );
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $this->loadFromRow( $row );
        }
    }

    function loadFromRow( $row ){
        $this->id       = $row['id'];
        $this->label     = $row['label'];
        $this->q_type     = $row['q_type'];
        $this->order   = $row['order'];
    }
}
?>