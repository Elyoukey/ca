<?php
class questionslist{

    var $list;

    function getAll(){

      global $db;
      $sql = "SELECT * FROM questions ORDER BY q_order ";

      if (!$result = $db->query($sql)) {
          // to get the error information
          echo "Error: erreur dans la requete de liste de questions \n";
          exit;
      }
      while ($question = $result->fetch_assoc()) {
          $this->list[] = $question;
      }
  }
}
?>