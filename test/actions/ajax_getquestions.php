<?php

/* include bootstrap file */
include '../../bootstrap.php';

$questionslist = new questionslist();
$questionslist->getAll();

echo json_encode($questionslist->list);
